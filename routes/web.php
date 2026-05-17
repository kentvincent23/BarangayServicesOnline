<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\OfficialController;

if (\Illuminate\Support\Facades\Auth::check()) {
    return redirect()->route('home');
}

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// If guest, show landing page. If logged in, redirect to dashboard.
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }

    // FETCH THE SERVICES HERE
    $serviceTypes = \App\Models\ServiceType::where('is_active', true)->get();
     $officials = \App\Models\Official::orderBy('order')->get();
    // PASS THEM TO THE VIEW
    return view('landingpage', compact('serviceTypes', 'officials'));
})->name('landing');

// This is your actual dashboard route
Route::get('/home', [ApplicationController::class, 'index'])->name('home')->middleware('auth');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/residents', [ResidentController::class, 'store'])->name('residents.store');

Route::middleware('auth')->group(function () {
    // Applications
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');

    // Status Updates (Use PATCH or POST consistently)
    Route::patch('/applications/{application}/process', [ApplicationController::class, 'process'])->name('applications.process');
    Route::patch('/applications/{application}/approve', [ApplicationController::class, 'approve'])->name('applications.approve');
    Route::patch('/applications/{application}/ready', [ApplicationController::class, 'markReady'])->name('applications.ready');
    Route::patch('/applications/{application}/missed', [ApplicationController::class, 'missed'])->name('applications.missed');
    Route::patch('/applications/{application}/release', [ApplicationController::class, 'release'])->name('applications.release');
    Route::patch('/applications/{application}/reject', [ApplicationController::class, 'reject'])->name('applications.reject');

    // Resident registry
    Route::get('/residents', [ResidentController::class, 'index'])->name('residents.index');
    Route::post('/residents', [ResidentController::class, 'store'])->name('residents.store');
    Route::put('/residents/{resident}', [ResidentController::class, 'update'])->name('residents.update');
    Route::delete('/residents/{barangayResident}', [ResidentController::class, 'destroy'])->name('residents.destroy');

    // Staff accounts
    Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
    Route::delete('/staff/{user}', [StaffController::class, 'destroy'])->name('staff.destroy');

    //Service types
    Route::post('/services/store', [ApplicationController::class, 'storeService'])->name('services.store');
    Route::patch('/services/{serviceType}', [ServiceController::class, 'update'])->name('services.update');

    //announcement
    Route::post('/announcements', [AnnouncementController::class, 'store'])->name('announcements.store'); 

    //officials
     Route::get('/officials', [OfficialController::class, 'index'])->name('officials.index');
    Route::post('/officials', [OfficialController::class, 'store'])->name('officials.store');
    Route::post('/officials/{official}', [OfficialController::class, 'update'])->name('officials.update');
    Route::delete('/officials/{official}', [OfficialController::class, 'destroy'])->name('officials.destroy');
});
