<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function update(Request $request, ServiceType $serviceType)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active'   => 'nullable|boolean',
        ]);

        $serviceType->update([
            'name'        => $request->name,
            'description' => $request->description,
            'is_active'   => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->back()->with('success', 'Service updated successfully.');
    }
}
