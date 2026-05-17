<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\BarangayResident;
use App\Models\ServiceType; // Added this
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            $serviceTypes = ServiceType::latest()->get();
            $officials = \App\Models\Official::orderBy('order')->get();

            return view('home', compact(
                'applications',
                'approvedCount',
                'readyCount',
                'residents',
                'residentCount',
                'staffAccounts',
                'staffCount',
                'search',
                'serviceTypes',
                'officials'
            ));
        }

        // If not staff, still fetch service types for the resident's form
        $serviceTypes = ServiceType::where('is_active', true)->get();
        return view('home', compact('serviceTypes'));
    }

    public function store(Request $request)
    {
        // Block if they have an active request in ANY of these stages
        $activeStatuses = [
            'pending',
            'processing',
            'approved',
            'ready_to_pickup'
        ];

        $exists = Application::where('user_id', Auth::id())
            ->where('service_type_id', $request->service_type_id)
            ->whereIn('status', $activeStatuses)
            ->exists();

        if ($exists) {
            return back()->withErrors(['service_type_id' => 'You already have an active request for this service. Please check']);
        }
        $request->validate([
            'first_name'   => 'required|string|max:100',
            'middle_name'  => 'nullable|string|max:100',
            'last_name'    => 'required|string|max:100',
            'age'          => 'required|integer',
            'civil_status' => 'required|string',
            'gender'       => 'required|in:Male,Female',
            'service_type_id' => 'required|exists:service_types,id',
            'purpose'      => 'required|string|max:255',
            'notes'        => 'nullable|string',
            'id_image'     => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $resident = BarangayResident::whereRaw('LOWER(first_name) = ?', [strtolower($request->first_name)])
            ->whereRaw('LOWER(last_name) = ?', [strtolower($request->last_name)])
            ->first();

        if (!$resident) {
            return back()
                ->withInput()
                ->withErrors(['not_resident' => 'You are not a registered resident. Please visit the barangay hall.']);
        }

        $idPath = null;
        if ($request->hasFile('id_image')) {
            $idPath = $request->file('id_image')->store('temp_ids', 'public');
        }

        $fullName = trim($request->first_name . ' ' . ($request->middle_name ? $request->middle_name . ' ' : '') . $request->last_name);

        Application::create([
            'user_id'       => Auth::id(),
            'resident_name' => $fullName,
            'resident_id'   => $resident->resident_id,
            'service_type_id' => $request->service_type_id, // Store the foreign key
            'purpose'       => $request->purpose,
            'notes'         => $request->notes,
            'id_image_path' => $idPath,
            'status'        => 'pending',
        ]);

        return back()->with('success', 'Application submitted! Please wait for I.D verification');
    }
    public function process(Application $application)
    {
        // Ensure we are only processing things that are currently pending
        if ($application->status !== 'approved') {
            return back()->with('error', 'This application is not in a pending state.');
        }

        $application->update(['status' => 'processing']);

        return back()->with('success', 'Application status updated to Processing.');
    }
    public function approve(Application $application)
    {
        // 1. Delete the image from storage if it exists
        if ($application->id_image_path) {
            Storage::disk('public')->delete($application->id_image_path);
        }

        // 2. Update status and clear the database path
        $application->update([
            'status' => 'approved',
            'id_image_path' => null // Set to null so the link is gone
        ]);

        return back()->with('success', 'Application has been approved. ID verified and image purged.');
    }
    public function reject(Request $request, $id)
    {
        // 1. Validate that the staff actually typed a reason
        $request->validate([
            'rejection_reason' => 'required|string|max:500'
        ]);

        // 2. Find the specific request
        $application = \App\Models\Application::findOrFail($id);

        // 3. Update the status and save the reason to the database
        $application->update([
            'status' => 'rejected',
            'rejection_reason' => $request->rejection_reason,
            'id_image_path' => null
        ]);

        return back()->with('success', 'Application rejected and reason sent to resident!');
    }

    public function missed(Application $application)
    {
        // You might want to ensure it can only be marked missed if it was 'ready_to_pickup'
        if ($application->status !== 'ready_to_pickup') {
            return back()->with('error', 'Only applications ready for pickup can be marked as missed.');
        }

        $application->update(['status' => 'missed']);

        return back()->with('success', 'Application marked as missed.');
    }

    public function markReady(Application $application)
    {

        $application->update([
            'status' => 'ready_to_pickup'
        ]);

        return back()->with('success', 'Application marked as ready to pick up.');
    }

    public function release(Application $application)
    {
        $application->update(['status' => 'released']);
        return redirect()->back()->with('success', 'Document marked as released.');
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'required|boolean'
        ]);
        return back()->with('success', 'New service type added successfully!');
    }
}
