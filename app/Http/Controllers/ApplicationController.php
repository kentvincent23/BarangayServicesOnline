<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\BarangayResident;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user && $user->role === 'staff') {
            $search        = $request->get('search');
            $applications  = Application::latest()->get();
            $approvedCount = Application::where('status', 'approved')->count();
            $readyCount    = Application::where('status', 'ready_to_pickup')->count();
            $residentCount = BarangayResident::count();

            $residents = BarangayResident::when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->whereRaw('LOWER(first_name) LIKE ?', ['%' . strtolower($search) . '%'])
                        ->orWhereRaw('LOWER(last_name) LIKE ?', ['%' . strtolower($search) . '%'])
                        ->orWhereRaw('LOWER(CONCAT(first_name, " ", last_name)) LIKE ?', ['%' . strtolower($search) . '%']);
                });
            })->latest()->get();

            $staffAccounts = User::where('role', 'staff')->latest()->get();
            $staffCount    = $staffAccounts->count();

            return view('home', compact(
                'applications',
                'approvedCount',
                'readyCount',
                'residents',
                'residentCount',
                'staffAccounts',
                'staffCount',
                'search'
            ));
        }

        return view('home');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'   => 'required|string|max:100',
            'middle_name'  => 'nullable|string|max:100',
            'last_name'    => 'required|string|max:100',
            'age'          => 'required|integer',
            'civil_status' => 'required|string',
            'service_type' => 'required|string',
            'purpose'      => 'required|string|max:255',
            'notes'        => 'nullable|string',
            'id_image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $resident = BarangayResident::whereRaw('LOWER(first_name) = ?', [strtolower($request->first_name)])
            ->whereRaw('LOWER(last_name) = ?', [strtolower($request->last_name)])
            ->first();

        if (!$resident) {
            return back()
                ->withInput()
                ->withErrors(['not_resident' => 'You are not a registered resident. Please visit the barangay hall.']);
        }

        // NEW: Handle File Upload
        $idPath = null;
        if ($request->hasFile('id_image')) {
            // Stores file in storage/app/public/temp_ids
            $idPath = $request->file('id_image')->store('temp_ids', 'public');
        }

        $fullName = trim($request->first_name . ' ' . ($request->middle_name ? $request->middle_name . ' ' : '') . $request->last_name);

        Application::create([
            'user_id'       => Auth::id(),
            'resident_name' => $fullName,
            'resident_id'   => $resident->resident_id,
            'document_type' => $request->service_type,
            'purpose'       => $request->purpose,
            'notes'         => $request->notes,
            'id_image_path' => $idPath, // Save the path to the DB
            'status'        => 'approved',
        ]);

        return back()->with('success', 'Application submitted! Admin will verify your ID shortly.');
    }

    public function markReady(Application $application)
    {
        if ($application->id_image_path) {
            $filePath = storage_path('app/public/' . $application->id_image_path);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $application->update([
            'status' => 'ready_to_pickup',
            'id_image_path' => null
        ]);

        return back()->with('success', 'Verified! ID image purged.');
    }

    public function destroy(Application $application)
    {
        // Safety: Delete the file if it exists before deleting the record
        if ($application->id_image_path) {
            $filePath = storage_path('app/public/' . $application->id_image_path);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $application->delete();
        return back()->with('success', 'Application deleted.');
    }

    public function release(Application $application)
    {
        $application->update(['status' => 'released']);
        return redirect()->back()->with('success', 'Document marked as released.');
    }
}
