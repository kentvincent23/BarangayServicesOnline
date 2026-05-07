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
        'address'        => 'required|string|max:255',
    ]);

    // Check duplicate
    $exists = BarangayResident::whereRaw('LOWER(first_name) = ?', [strtolower($request->first_name)])
        ->whereRaw('LOWER(last_name) = ?', [strtolower($request->last_name)])
        ->whereRaw('LOWER(COALESCE(middle_initial, "")) = ?', [strtolower($request->middle_initial ?? '')])
        ->exists();

    if ($exists) {
        return back()->withInput()
            ->withErrors(['duplicate_resident' => 'A resident already exists in the registry.'])
            ->with('open_tab', 'registry');
    }

    // Generate resident ID
    $latest = BarangayResident::latest('id')->first();
    $resId = 'RES-' . date('Y') . '-' . str_pad($latest ? $latest->id + 1 : 1, 3, '0', STR_PAD_LEFT);

    BarangayResident::create(array_merge($request->only([
        'first_name', 'middle_initial', 'last_name',
        'age', 'civil_status', 'address',
    ]), ['resident_id' => $resId]));

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
            'address' => 'required|string|max:255',
        ]);

        $resident->update($request->only([
            'first_name',
            'middle_initial',
            'last_name',
            'age',
            'civil_status',
            'address'
        ]));

        return back()->with('success', 'Resident updated successfully.');
    }

    public function destroy(BarangayResident $resident)
    {
        $resident->forceDelete();
        return back()
            ->with('success', 'Resident removed from registry.')
            ->with('open_tab', 'registry');
    }
}
