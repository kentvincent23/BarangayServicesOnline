<?php
namespace App\Http\Controllers;

use App\Models\Official;
use Illuminate\Http\Request;

class OfficialController extends Controller {

 public function index() {
        return redirect()->route('home');
    }
    public function store(Request $request) {
        $request->validate([
            'name'     => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
            'order'    => 'nullable|integer',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('officials', 'public');
        }

        Official::create([
            'name'       => $request->name,
            'position'   => $request->position,
            'photo_path' => $photoPath,
            'order'      => $request->order ?? 0,
        ]);

        return back()
            ->with('success', $request->name . ' has been added to the officials list.')
            ->with('open_tab', 'officials');
    }

    public function update(Request $request, Official $official) {
        $request->validate([
            'name'     => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
            'order'    => 'nullable|integer',
        ]);

        $photoPath = $official->photo_path;

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($official->photo_path) {
                \Storage::disk('public')->delete($official->photo_path);
            }
            $photoPath = $request->file('photo')->store('officials', 'public');
        }

        $official->update([
            'name'       => $request->name,
            'position'   => $request->position,
            'photo_path' => $photoPath,
            'order'      => $request->order ?? $official->order,
        ]);

        return back()
            ->with('success', $official->name . '\'s information has been updated.')
            ->with('open_tab', 'officials');
    }

    public function destroy(Official $official) {
        if ($official->photo_path) {
            \Storage::disk('public')->delete($official->photo_path);
        }
        $official->delete();

        return back()
            ->with('success', 'Official removed successfully.')
            ->with('open_tab', 'officials');
    }
}