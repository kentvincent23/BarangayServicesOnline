<?php

namespace App\Http\Controllers;

use App\Models\BarangayResident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'first_name'     => 'required|string|max:255',
        'middle_initial' => 'nullable|string|max:1',
        'last_name'      => 'required|string|max:255',
        'age'            => 'required|integer|min:0|max:150',
        'civil_status'   => 'required|string',
        'home_address'   => 'required|string|max:255',
    ]);

        // Check for duplicate full name
        $firstName = strtolower($request->first_name);
        $middleInitial = strtolower($request->middle_initial ?? '');
        $lastName = strtolower($request->last_name);

        $exists = BarangayResident::whereRaw('LOWER(first_name) = ?', [$firstName], 'and')
            ->whereRaw('LOWER(last_name) = ?', [$lastName], 'and')
            ->whereRaw('LOWER(COALESCE(middle_initial, "")) = ?', [$middleInitial], 'and')
            ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->withErrors(['duplicate_resident' => 'A resident already exists in the registry.'])
                ->with('open_tab', 'registry');
        }

        $year = date('Y');
        $latestResident = BarangayResident::latest('id')->first();
        $nextNumber = $latestResident ? $latestResident->id + 1 : 1;
        $resId = 'RES-' . $year . '-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        BarangayResident::create($request->only([
            'first_name',
            'middle_initial',
            'last_name',
            'age',
            'civil_status',
            'home_address',
        ]) + ['resident_id' => $resId]);

        return back()
            ->with('success', "Resident {$request->first_name} {$request->last_name} added with ID: {$resId}")
            ->with('open_tab', 'registry');
    }
    public function update(Request $request, BarangayResident $resident)
    {
        $request->validate([
            'first_name'   => 'required|string|max:255',
            'middle_initial'  => 'nullable|string|max:1',
            'last_name'    => 'required|string|max:255',
            'age'          => 'required|integer|min:0|max:150',
            'civil_status' => 'required|string',
            'home_address' => 'required|string|max:255',
        ]);

        $resident->update($request->only([
            'first_name',
            'middle_initial',
            'last_name',
            'age',
            'civil_status',
            'home_address'
        ]));

        return redirect()->back()->with('success', 'Resident updated successfully.');
    }

    public function destroy(BarangayResident $resident)
    {
        $resident->forceDelete();
        return back()
            ->with('success', 'Resident removed from registry.')
            ->with('open_tab', 'registry');
    }
}
