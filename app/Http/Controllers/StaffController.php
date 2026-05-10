<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class StaffController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name'   => 'required|string|max:100',
            'last_name'    => 'required|string|max:100',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|string|min:6|confirmed',
            'birthdate'    => 'required|date|before:today',         
            'civil_status' => 'required|in:Single,Married,Widowed,Separated,Annulled', 
        ]);

        // Auto-calculate age from birthdate
        $age = Carbon::parse($request->birthdate)->age;             

        User::create([
            'name'         => $request->first_name . ' ' . $request->last_name,
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'role'         => 'staff',
            'birthdate'    => $request->birthdate,                  
            'civil_status' => $request->civil_status,               
            'age'          => $age,                                  
        ]);

        return back()
            ->with('success', 'Staff account created for ' . $request->first_name . ' ' . $request->last_name . '.')
            ->with('open_tab', 'staff');
    }

    public function destroy(User $user)
    {
        if ($user->getKey() === Auth::id()) {
            return back()
                ->withErrors(['staff_error' => 'You cannot delete your own account.'])
                ->with('open_tab', 'staff');
        }

        User::destroy($user->getKey());

        return back()
            ->with('success', 'Staff account removed.')
            ->with('open_tab', 'staff');
    }
}