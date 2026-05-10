<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Connect | Services & Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); }
        .tab-btn { transition: all 0.2s; }
        .tab-btn.active { background: #1d4ed8; color: #fff; }
        .tab-btn:not(.active) { background: #f1f5f9; color: #64748b; }
        
    </style>
</head>

   @extends('layouts.app')

@section('content') {{-- <--- THE SECTION STARTS HERE --}}

    @if(Auth::user()->role === 'staff')
        {{-- Staff Dashboard Code --}}
    @else
        @include('userpage') {{-- This just pastes the HTML inside the section --}}
    @endif

    {{-- ===== STAFF DASHBOARD ===== --}}
    {{-- ===== STAFF DASHBOARD ===== --}}
    {{-- ===== STAFF DASHBOARD ===== --}}
    {{-- ===== STAFF DASHBOARD ===== --}}
    {{-- ===== STAFF DASHBOARD ===== --}}
    {{-- ===== STAFF DASHBOARD ===== --}}
    {{-- ===== STAFF DASHBOARD ===== --}}
    {{-- ===== STAFF DASHBOARD ===== --}}
    {{-- ===== STAFF DASHBOARD ===== --}}

    <div class="w-full px-4 md:px-6 px-4 md:px-6 pt-8">
    
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
        
        <div class="flex items-center gap-4 flex-wrap">
    
    <button onclick="switchTab('applications')" id="tab-applications"
        class="tab-nav active group bg-white pl-2 pr-6 py-2 rounded-[2rem] shadow-sm border border-slate-200 flex items-center gap-3 transition-all hover:shadow-md active:scale-95 cursor-pointer">
        <div class="icon-box pointer-events-none bg-blue-100 p-3 rounded-2xl text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
        </div>
        <div class="text-left pointer-events-none">
            <p class="tab-label text-sm font-extrabold text-slate-800 leading-none">Applications</p>
        </div>
    </button>

    <button onclick="switchTab('registry')" id="tab-registry"
        class="tab-nav group bg-white pl-2 pr-6 py-2 rounded-[2rem] shadow-sm border border-slate-200 flex items-center gap-3 transition-all hover:shadow-md active:scale-95 cursor-pointer">
        <div class="icon-box pointer-events-none bg-slate-50 p-3 rounded-2xl text-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
        <div class="text-left pointer-events-none">
            <p class="tab-label text-sm font-extrabold text-slate-400 leading-none">Resident Registry</p>
        </div>
    </button>

    <button onclick="switchTab('staff')" id="tab-staff"
        class="tab-nav group bg-white pl-2 pr-6 py-2 rounded-[2rem] shadow-sm border border-slate-200 flex items-center gap-3 transition-all hover:shadow-md active:scale-95 cursor-pointer">
        <div class="icon-box pointer-events-none bg-slate-50 p-3 rounded-2xl text-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>
        <div class="text-left pointer-events-none ">
            <p class="tab-label text-sm font-extrabold text-slate-400 leading-none ">Staff Accounts</p>
        </div>
    </button>
</div>
        <div class="flex items-center gap-3">
            <div class="group bg-white pl-2 pr-6 py-2 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-3 hover:border-violet-200 transition-colors">
                <div class="bg-violet-100 p-2.5 rounded-xl text-violet-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[9px] font-bold text-slate-400 uppercase tracking-tighter leading-none mb-1">Residents</p>
                    <p class="text-base font-black text-slate-800 leading-none">{{ $residentCount ?? 0 }}</p>
                </div>
            </div>

            <div class="group bg-white pl-2 pr-6 py-2 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-3 hover:border-amber-200 transition-colors">
                <div class="bg-amber-100 p-2.5 rounded-xl text-amber-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[9px] font-bold text-slate-400 uppercase tracking-tighter leading-none mb-1">Staff</p>
                    <p class="text-base font-black text-slate-800 leading-none">{{ $staffCount ?? 0 }}</p>
                </div>
            </div>
        </div>
        
    </header>
</div>
<div id="panel-applications" class="space-y-6">
   {{-- Filters Row --}}
      <div class="w-full px-4 md:px-6 space-y-8">
    
<div class="flex flex-col gap-4 mb-6">
    {{-- Main Filter Row --}}
    <div class="flex items-center justify-between gap-4 flex-wrap">
        
        {{-- LEFT SIDE: Status Filter Buttons --}}
        <div class="flex gap-2 flex-wrap">
            <button onclick="setStatus('all')" id="status-all"
                class="status-btn px-5 py-2.5 rounded-2xl text-xs font-black uppercase tracking-widest transition-all bg-slate-800 text-white">
                All
            </button>
            <button onclick="setStatus('approved')" id="status-approved"
                class="status-btn px-5 py-2.5 rounded-2xl text-xs font-black uppercase tracking-widest transition-all bg-slate-100 text-slate-500 hover:bg-blue-500 hover:text-white">
                Approved
            </button>
            <button onclick="setStatus('ready_to_pickup')" id="status-ready_to_pickup"
                class="status-btn px-5 py-2.5 rounded-2xl text-xs font-black uppercase tracking-widest transition-all bg-slate-100 text-slate-500 hover:bg-green-500 hover:text-white">
                Ready to Pick Up
            </button>
            <button onclick="setStatus('released')" id="status-released"
                class="status-btn px-5 py-2.5 rounded-2xl text-xs font-black uppercase tracking-widest transition-all bg-slate-100 text-slate-500 hover:bg-violet-500 hover:text-white">
                Released
            </button>
            <button onclick="setStatus('rejected')" id="status-rejected"
                class="status-btn px-5 py-2.5 rounded-2xl text-xs font-black uppercase tracking-widest transition-all bg-slate-100 text-slate-500 hover:bg-red-500 hover:text-white">
                Rejected
            </button>
        </div>

        {{-- RIGHT SIDE: Dropdown + Date Filter grouped together --}}
        <div class="flex items-center gap-3 flex-wrap">
            
            {{-- Document Type Dropdown (Now on the left of Date) --}}
            <div class="relative w-full sm:w-60">
                <select id="type-filter" onchange="applyFilters()"
                    class="appearance-none w-full px-5 py-2.5 pr-10 bg-white border-2 border-slate-200 rounded-2xl outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 font-bold text-slate-700 text-sm cursor-pointer transition-all">
                    <option value="all">All Document Types</option>
                    <option value="Barangay Clearance">Barangay Clearance</option>
                    <option value="Certificate of Indigency">Certificate of Indigency</option>
                    <option value="Certificate of Residency">Certificate of Residency</option>
                    <option value="Business Permit">Business Permit</option>
                </select>
                <div class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

            
          {{-- Date Search with Integrated Clear Button --}}
                <div class="relative group">
                    {{-- Calendar Icon (Left) --}}
                    <div class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-blue-500 transition-colors z-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>

                    <input
                        type="date"
                        id="date-filter"
                        onchange="applyFilters()"
                        class="pl-10 pr-12 py-2.5 bg-white border-2 border-slate-200 rounded-2xl outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 font-bold text-slate-600 text-sm cursor-pointer w-56 transition-all"
                    />
                    <button onclick="clearDateFilter()"
                    id="clear-date-btn"
                    type="button"
                    class="hidden absolute right-2.5 top-1 p-2 m-1 bg-red-50 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition-all z-20"
                    title="Clear Date">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                </div>
        </div>
    </div>
</div>
        {{-- Result Count --}}
        <p id="app-count" class="text-xs font-bold text-slate-400 mb-3 uppercase tracking-widest"></p>

        {{-- Table --}}
        <div class="w-full bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto w-full">
                <table class="w-full text-left table-auto">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest whitespace-nowrap">Resident / ID</th>
                            <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest whitespace-nowrap">Date Requested</th>
                            <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest whitespace-nowrap">Requested Document</th>
                            <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center whitespace-nowrap">Verification</th>
                            <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center whitespace-nowrap">Status</th>
                            <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="app-table-body" class="divide-y divide-slate-100">
                        @forelse($applications ?? [] as $app)
                            <tr class="app-row group transition-all hover:bg-slate-50/70"
                                data-type="{{ $app->document_type }}"
                                data-status="{{ $app->status }}">

                                {{-- Resident / ID --}}
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <p class="font-extrabold text-slate-800 text-sm">{{ $app->resident_name }}</p>
                                    <p class="text-[10px] font-bold text-blue-500 tracking-wider mt-0.5">ID: {{ $app->resident_id }}</p>
                                </td>

                                {{-- Date Requested --}}
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <p class="text-sm font-bold text-slate-700">{{ $app->created_at->format('M d, Y') }}</p>
                                    <p class="text-[10px] text-slate-400 mt-0.5">{{ $app->created_at->format('h:i A') }}</p>
                                </td>

                                {{-- Requested Document --}}
                                <td class="px-6 py-5">
                                    <p class="text-sm font-bold text-slate-700">{{ $app->document_type }}</p>
                                    <p class="text-[11px] text-slate-400 mt-0.5 italic">"{{ $app->purpose }}"</p>
                                </td>

                                {{-- Verification --}}
                                <td class="px-6 py-5 text-center whitespace-nowrap">
                                    @if($app->id_image_path)
                                        <a href="{{ asset('storage/' . $app->id_image_path) }}" target="_blank"
                                            class="inline-flex items-center gap-1.5 px-3 py-2 bg-amber-50 text-amber-600 rounded-xl hover:bg-amber-600 hover:text-white transition-all text-[10px] font-black uppercase tracking-widest border border-amber-200/50">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            View Image
                                        </a>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-2 text-[10px] font-black uppercase tracking-widest text-slate-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                            </svg>
                                            ID Verified
                                        </span>
                                    @endif
                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-5 text-center whitespace-nowrap">
                                    @if($app->status === 'approved')
                                        <span class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-blue-100 text-blue-600 border border-blue-200/50">Approved</span>
                                    @elseif($app->status === 'ready_to_pickup')
                                        <span class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-emerald-100 text-emerald-600 border border-emerald-200/50">Ready to Pick Up</span>
                                    @elseif($app->status === 'released')
                                        <span class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-violet-100 text-violet-600 border border-violet-200/50">Released</span>
                                    @elseif($app->status === 'rejected')
                                        <span class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-red-100 text-red-600 border border-red-200/50">Rejected</span>
                                    @endif
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-5">
                                    <div class="flex justify-end items-center gap-2 opacity-0 group-hover:opacity-100 transition-all">
                                        @if($app->status === 'approved')
                                            <form action="{{ route('applications.ready', $app->id) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <button type="submit" class="flex items-center gap-1.5 px-3 py-2 bg-emerald-50 text-emerald-600 rounded-xl hover:bg-emerald-600 hover:text-white transition-all text-[10px] font-black uppercase tracking-wider whitespace-nowrap">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8" />
                                                    </svg>
                                                    Ready to Pick Up
                                                </button>
                                            </form>
                                            <form action="{{ route('applications.reject', $app->id) }}" method="POST" onsubmit="return confirm('Reject this application?')">
                                                @csrf @method('PATCH')
                                                <button type="submit" class="flex items-center gap-1.5 px-3 py-2 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition-all text-[10px] font-black uppercase tracking-wider whitespace-nowrap">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Reject
                                                </button>
                                            </form>
                                        @elseif($app->status === 'ready_to_pickup')
                                            <form action="{{ route('applications.release', $app->id) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <button type="submit" class="flex items-center gap-1.5 px-3 py-2 bg-violet-50 text-violet-600 rounded-xl hover:bg-violet-600 hover:text-white transition-all text-[10px] font-black uppercase tracking-wider whitespace-nowrap">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    Mark as Released
                                                </button>
                                            </form>
                                        @endif
                                       
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-slate-400 font-semibold">No applications found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- No results after filtering --}}
        <div id="no-results" class="hidden px-8 py-12 text-center text-slate-400 font-semibold">
            No applications match the selected filters.
        </div>
    </div>
        </div>



        {{-- ===== RESIDENT REGISTRY TAB ===== --}}
        <div id="panel-registry" class="hidden space-y-6">
    <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100">
        <h2 class="text-lg font-black text-slate-800 mb-6">Add New Resident to Registry</h2>
        <form action="{{ route('residents.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" required
                        class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                </div>
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Middle Name</label>
                    <input type="text" name="middle_name" value="{{ old('middle_name') }}"
                        class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                <div class="md:col-span-2 space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" required
                        class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                </div>
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Birth Date</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}" required
                        class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                </div>
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Age</label>
                    <input type="number" name="age" value="{{ old('age') }}" required
                        class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Civil Status</label>
                    <select name="civil_status" required
                        class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold appearance-none">
                        <option value="" disabled selected>...</option>
                        <option value="Single" {{ old('civil_status') == 'Single' ? 'selected' : '' }}>Single</option>
                        <option value="Married" {{ old('civil_status') == 'Married' ? 'selected' : '' }}>Married</option>
                        <option value="Widowed" {{ old('civil_status') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                        <option value="Separated" {{ old('civil_status') == 'Separated' ? 'selected' : '' }}>Separated</option>
                    </select>
                </div>
                <div class="md:col-span-2 space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Home Address</label>
                    <input type="text" name="address" value="{{ old('address') }}" placeholder="Purok, Street, Barangay"
                        class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold" required>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="bg-blue-700 hover:bg-blue-800 text-white px-8 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all shadow-lg shadow-blue-100 active:scale-95">
                    + Add Resident
                </button>
            </div>
        </form>
        </div>
    

            <form method="GET" action="/" class="flex gap-3">
                <input type="hidden" name="tab" value="registry">
                <div class="relative flex-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search resident by name..."
                        class="w-full pl-12 pr-5 py-4 bg-white border border-slate-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-slate-700">
                </div>
                <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition-all">Search</button>
                @if($search ?? false)
                    <a href="/?tab=registry" class="bg-slate-100 hover:bg-slate-200 text-slate-600 px-6 py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition-all flex items-center">Clear</a>
                @endif
            </form>

            @if($search ?? false)
                <p class="text-sm font-semibold text-slate-500">
                    Showing results for <span class="text-blue-600 font-black">"{{ $search }}"</span> — {{ $residents->count() }} found
                </p>
            @endif

           <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
    <table class="w-full text-left">
        <thead>
            <tr class="bg-slate-50 border-b border-slate-100">
                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Resident ID</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Full Name</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Birthdate</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Civil Status</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Address</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-50">
            @forelse($residents ?? [] as $res)
                <tr class="group transition-all hover:bg-slate-50/50">
                    <td class="px-8 py-5">
                        <span class="text-[11px] font-black text-blue-600 tracking-widest bg-blue-50 px-3 py-1.5 rounded-lg">{{ $res->resident_id }}</span>
                    </td>
                    <td class="px-8 py-5">
                        <p class="font-extrabold text-slate-800">
                            {{ $res->first_name }} {{ $res->middle_initial ? strtoupper($res->middle_initial) . '.' : '' }} {{ $res->last_name }}
                        </p>
                    </td>
                    <td class="px-8 py-5">
                        <p class="text-sm font-bold text-slate-600 italic">
                            {{ $res->birthdate ? date('M d, Y', strtotime($res->birthdate)) : '—' }}
                        </p>
                    </td>
                    <td class="px-8 py-5">
                        <span class="text-[10px] font-black px-3 py-1 rounded-full uppercase {{ $res->civil_status === 'Single' ? 'bg-green-50 text-green-600' : 'bg-violet-50 text-violet-600' }}">
                            {{ $res->civil_status ?? 'N/A' }}
                        </span>
                    </td>
                    <td class="px-8 py-5">
                        <p class="text-sm text-slate-500 font-medium">{{ $res->address ?? '—' }}</p>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all">
                            <button type="button" 
                                onclick="openEditModal({{ $res->id }}, '{{ addslashes($res->first_name) }}', '{{ addslashes($res->middle_initial) }}', '{{ addslashes($res->last_name) }}', '{{ addslashes($res->address) }}', '{{ $res->birthdate }}', '{{ $res->civil_status }}')"
                                class="p-2.5 bg-blue-50 text-blue-500 rounded-xl hover:bg-blue-500 hover:text-white transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </button>
                            </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-8 py-12 text-center text-slate-400 font-semibold">
                        No residents found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

        {{-- Edit Resident Modal --}}
        <div id="editModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm">
            <div class="bg-white rounded-[2.5rem] shadow-2xl border border-slate-100 w-full max-w-lg mx-4 p-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-black text-slate-800">Edit Resident</h2>
                    <button onclick="closeEditModal()" class="p-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-500 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form id="editForm" method="POST">
                    @csrf @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <div class="md:col-span-2 space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1 block">First Name</label>
                            <input type="text" id="edit_first_name" name="first_name" required
                                class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1 block text-center">M.I.</label>
                            <input type="text" id="edit_middle_initial" name="middle_initial" maxlength="1"
                                class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-center uppercase">
                        </div>
                        <div class="md:col-span-2 space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1 block">Last Name</label>
                            <input type="text" id="edit_last_name" name="last_name" required
                                class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                        </div>
                    </div>
                    <div class="mt-4 space-y-2">
                        <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1 block">Address</label>
                        <input type="text" id="edit_address" name="address" required
                            class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                    </div>
                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" onclick="closeEditModal()"
                            class="bg-slate-100 hover:bg-slate-200 text-slate-600 px-6 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all">
                            Cancel
                        </button>
                        <button type="submit"
                            class="bg-blue-700 hover:bg-blue-800 text-white px-8 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all shadow-lg shadow-blue-100 active:scale-95">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
        </div>

        {{-- ===== STAFF ACCOUNTS TAB ===== --}}
        <div id="panel-staff" class="hidden space-y-6">
 
    {{-- Success / Error Alerts --}}
    @if(session('success') && session('open_tab') === 'staff')
        <div class="flex items-center gap-3 px-6 py-4 bg-emerald-50 border border-emerald-200 rounded-2xl text-emerald-700 text-sm font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ session('success') }}
        </div>
    @endif
 
    @if($errors->has('staff_error'))
        <div class="flex items-center gap-3 px-6 py-4 bg-red-50 border border-red-200 rounded-2xl text-red-700 text-sm font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $errors->first('staff_error') }}
        </div>
    @endif
 
    {{-- Create Staff Form --}}
    <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100">
        <h2 class="text-lg font-black text-slate-800 mb-6">Create Staff Account</h2>
 
        <form action="{{ route('staff.store') }}" method="POST">
            @csrf
 
            {{-- Row 1: First Name + Last Name --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" required
                        placeholder="e.g. Juan"
                        class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold @error('first_name') ring-2 ring-red-400 @enderror">
                    @error('first_name')
                        <p class="text-[11px] text-red-500 font-semibold ml-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" required
                        placeholder="e.g. Dela Cruz"
                        class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold @error('last_name') ring-2 ring-red-400 @enderror">
                    @error('last_name')
                        <p class="text-[11px] text-red-500 font-semibold ml-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
 
            {{-- Row 2: Email --}}
            <div class="mt-4 space-y-2">
                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    placeholder="e.g. staff@barangay.gov.ph"
                    class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold @error('email') ring-2 ring-red-400 @enderror">
                @error('email')
                    <p class="text-[11px] text-red-500 font-semibold ml-1">{{ $message }}</p>
                @enderror
            </div>
 
            {{-- Row 3: Password + Confirm Password --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="staff_password" required
                            class="w-full px-5 py-4 pr-14 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold @error('password') ring-2 ring-red-400 @enderror">
                        <button type="button" onclick="togglePassword('staff_password', 'eye-staff')"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-700 transition-colors">
                            <svg id="eye-staff" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-[11px] text-red-500 font-semibold ml-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Confirm Password</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="staff_password_confirm" required
                            class="w-full px-5 py-4 pr-14 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                        <button type="button" onclick="togglePassword('staff_password_confirm', 'eye-staff-confirm')"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-700 transition-colors">
                            <svg id="eye-staff-confirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
 
            {{-- ↓↓↓ NEW ROW: Birthdate + Age (auto) + Civil Status ↓↓↓ --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
 
                {{-- Birthdate --}}
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Birthdate</label>
                    <input type="date" name="birthdate" id="staff_birthdate"
                        value="{{ old('birthdate') }}"
                        max="{{ date('Y-m-d') }}"
                        onchange="calcStaffAge(this.value)"
                        required
                        class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold @error('birthdate') ring-2 ring-red-400 @enderror">
                    @error('birthdate')
                        <p class="text-[11px] text-red-500 font-semibold ml-1">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Age (auto-calculated, read-only) --}}
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">
                        Age
                        <span class="text-blue-400 normal-case tracking-normal font-semibold">(auto-calculated)</span>
                    </label>
                    <input type="text" id="staff_age_display" readonly
                        placeholder="Filled from birthdate"
                        class="w-full px-5 py-4 bg-slate-100 border-none rounded-2xl outline-none font-semibold text-slate-500 cursor-default">
                    {{-- Hidden input to submit age value --}}
                    <input type="hidden" name="age" id="staff_age_hidden" value="{{ old('age') }}">
                </div>
 
                {{-- Civil Status --}}
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Civil Status</label>
                    <div class="relative">
                        <select name="civil_status" required
                            class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-bold text-slate-700 appearance-none cursor-pointer @error('civil_status') ring-2 ring-red-400 @enderror">
                            <option value="" disabled {{ old('civil_status') ? '' : 'selected' }}>Select status...</option>
                            @foreach(['Single', 'Married', 'Widowed', 'Separated', 'Annulled'] as $cs)
                                <option value="{{ $cs }}" {{ old('civil_status') === $cs ? 'selected' : '' }}>{{ $cs }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                    @error('civil_status')
                        <p class="text-[11px] text-red-500 font-semibold ml-1">{{ $message }}</p>
                    @enderror
                </div>
 
            </div>
            {{-- ↑↑↑ END NEW ROW ↑↑↑ --}}
 
            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="bg-blue-700 hover:bg-blue-800 text-white px-8 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all shadow-lg shadow-blue-100 active:scale-95">
                    + Create Staff Account
                </button>
            </div>
        </form>
    </div>
 
    {{-- Staff Table --}}
    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto w-full">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest whitespace-nowrap">Name</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest whitespace-nowrap">Email</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest whitespace-nowrap">Birthdate</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest whitespace-nowrap">Age</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest whitespace-nowrap">Civil Status</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest whitespace-nowrap">Added</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($staffAccounts ?? [] as $staff)
                        <tr class="group transition-all hover:bg-slate-50/50">
 
                            {{-- Name + You badge --}}
                            <td class="px-8 py-5 whitespace-nowrap">
                                <p class="font-extrabold text-slate-800">{{ $staff->name }}</p>
                                @if($staff->id === Auth::id())
                                    <span class="text-[10px] font-black text-blue-500 bg-blue-50 px-2 py-0.5 rounded-lg">You</span>
                                @endif
                            </td>
 
                            {{-- Email --}}
                            <td class="px-8 py-5 whitespace-nowrap">
                                <p class="text-sm text-slate-500 font-medium">{{ $staff->email }}</p>
                            </td>
 
                            {{-- Birthdate --}}
                            <td class="px-8 py-5 whitespace-nowrap">
                                <p class="text-sm text-slate-600 font-semibold">
                                    {{ $staff->birthdate ? $staff->birthdate->format('M d, Y') : '—' }}
                                </p>
                            </td>
 
                            {{-- Age --}}
                            <td class="px-8 py-5 whitespace-nowrap">
                                @if($staff->birthdate)
                                    <span class="text-[10px] font-black px-3 py-1 rounded-full bg-violet-50 text-violet-600 border border-violet-100">
                                        {{ $staff->birthdate->age }} yrs
                                    </span>
                                @else
                                    <span class="text-slate-300 font-semibold text-sm">—</span>
                                @endif
                            </td>
 
                            {{-- Civil Status --}}
                            <td class="px-8 py-5 whitespace-nowrap">
                                @if($staff->civil_status)
                                    <span class="text-[10px] font-black px-3 py-1 rounded-full uppercase
                                        {{ $staff->civil_status === 'Single'    ? 'bg-green-50 text-green-600 border border-green-100'  : '' }}
                                        {{ $staff->civil_status === 'Married'   ? 'bg-blue-50 text-blue-600 border border-blue-100'     : '' }}
                                        {{ $staff->civil_status === 'Widowed'   ? 'bg-slate-100 text-slate-500 border border-slate-200' : '' }}
                                        {{ $staff->civil_status === 'Separated' ? 'bg-amber-50 text-amber-600 border border-amber-100'  : '' }}
                                        {{ $staff->civil_status === 'Annulled'  ? 'bg-red-50 text-red-500 border border-red-100'        : '' }}
                                    ">
                                        {{ $staff->civil_status }}
                                    </span>
                                @else
                                    <span class="text-slate-300 font-semibold text-sm">—</span>
                                @endif
                            </td>
 
                            {{-- Added date --}}
                            <td class="px-8 py-5 whitespace-nowrap">
                                <p class="text-sm text-slate-400 font-medium">{{ $staff->created_at->format('M d, Y') }}</p>
                            </td>
 
                            {{-- Actions --}}
                            <td class="px-8 py-5">
                                <div class="flex justify-end opacity-0 group-hover:opacity-100 transition-all">
                                    @if($staff->id !== Auth::id())
                                        <form action="{{ route('staff.destroy', $staff->id) }}" method="POST"
                                            onsubmit="return confirm('Delete this staff account?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="p-2.5 bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-[10px] text-slate-300 font-bold">Cannot delete own account</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-8 py-12 text-center text-slate-400 font-semibold">
                                No staff accounts found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

   <script>
    // ===== TAB SWITCHING =====
function switchTab(tabId) {
    // 1. Define all possible tabs/panels
    const tabs = ['applications', 'registry', 'staff'];

    tabs.forEach(t => {
        const panel = document.getElementById('panel-' + t);
        const btn = document.getElementById('tab-' + t);

        // HIDE ALL PANELS
        if (panel) {
            panel.classList.add('hidden');
        }

        // RESET ALL BUTTONS TO INACTIVE (GRAY)
        if (btn) {
            btn.classList.remove('active', 'border-blue-600');
            btn.classList.add('border-slate-200');

            const iconBox = btn.querySelector('.icon-box');
            if (iconBox) {
                iconBox.classList.remove('bg-blue-100', 'text-blue-600');
                iconBox.classList.add('bg-slate-50', 'text-slate-400');
            }

            const label = btn.querySelector('.tab-label');
            if (label) {
                label.classList.remove('text-slate-800');
                label.classList.add('text-slate-400');
            }
        }
    });

    // 2. SHOW THE SELECTED PANEL
    const activePanel = document.getElementById('panel-' + tabId);
    if (activePanel) {
        activePanel.classList.remove('hidden');
    }

    // 3. SET THE SELECTED BUTTON TO ACTIVE (BLUE)
    const activeBtn = document.getElementById('tab-' + tabId);
    if (activeBtn) {
        activeBtn.classList.add('active', 'border-blue-600');
        activeBtn.classList.remove('border-slate-200');

        const activeIconBox = activeBtn.querySelector('.icon-box');
        if (activeIconBox) {
            activeIconBox.classList.replace('bg-slate-50', 'bg-blue-100');
            activeIconBox.classList.replace('text-slate-400', 'text-blue-600');
        }

        const activeLabel = activeBtn.querySelector('.tab-label');
        if (activeLabel) {
            activeLabel.classList.replace('text-slate-400', 'text-slate-800');
        }
    }

    // 4. Trigger your data filters if needed
    if (typeof applyFilters === "function") {
        applyFilters();
    }
}

    // ===== APPLICATION FILTERS =====
    let currentStatus = 'all';

    function setStatus(status) {
        currentStatus = status;
        document.querySelectorAll('.status-btn').forEach(function(btn) {
            btn.classList.remove('bg-slate-800', 'text-white');
            btn.classList.add('bg-slate-100', 'text-slate-500');
        });
        const activeBtn = document.getElementById('status-' + status);
        if (activeBtn) {
            activeBtn.classList.remove('bg-slate-100', 'text-slate-500');
            activeBtn.classList.add('bg-slate-800', 'text-white');
        }
        applyFilters();
    }

    function applyFilters() {
        const selectedType = document.getElementById('type-filter')?.value || 'all';
        const dateInput = document.getElementById('date-filter')?.value || '';
        const clearBtn = document.getElementById('clear-date-btn');
        const rows = document.querySelectorAll('.app-row');
        const noResults = document.getElementById('no-results');
        const countLabel = document.getElementById('app-count');
        let visibleCount = 0;

        // Show/hide clear button
        if (clearBtn) {
            if (dateInput) {
                clearBtn.classList.remove('hidden');
                clearBtn.classList.add('flex');
            } else {
                clearBtn.classList.add('hidden');
                clearBtn.classList.remove('flex');
            }
        }

        rows.forEach(function(row) {
            const rowType = row.getAttribute('data-type');
            const rowStatus = row.getAttribute('data-status');

            const typeMatch = selectedType === 'all' || rowType === selectedType;
            const statusMatch = currentStatus === 'all' || rowStatus === currentStatus;

            let dateMatch = true;
            if (dateInput) {
                const dateCell = row.querySelector('td:nth-child(2) p:first-child');
                if (dateCell) {
                    const cellDate = new Date(dateCell.textContent.trim());
                    const selected = new Date(dateInput);
                    dateMatch =
                        cellDate.getFullYear() === selected.getFullYear() &&
                        cellDate.getMonth() === selected.getMonth() &&
                        cellDate.getDate() === selected.getDate();
                }
            }

            if (typeMatch && statusMatch && dateMatch) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        if (noResults) noResults.classList.toggle('hidden', visibleCount > 0);

        if (countLabel) {
            const typeLabel = selectedType === 'all' ? 'All Types' : selectedType;
            const statusLabel = currentStatus === 'all' ? 'All Statuses' : currentStatus.replace(/_/g, ' ');
            countLabel.textContent = visibleCount + ' result(s) — ' + typeLabel + ' • ' + statusLabel;
        }
    }

    // ===== CLEAR DATE FILTER =====
    function clearDateFilter() {
        const dateInput = document.getElementById('date-filter');
        const clearBtn = document.getElementById('clear-date-btn');
        if (dateInput) dateInput.value = '';
        if (clearBtn) {
            clearBtn.classList.add('hidden');
            clearBtn.classList.remove('flex');
        }
        applyFilters();
    }

    // ===== PASSWORD TOGGLE =====

    
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (!input || !icon) return;
        const isHidden = input.type === 'password';
        input.type = isHidden ? 'text' : 'password';
        const eyeOpen = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
        const eyeSlash = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />`;
        icon.innerHTML = isHidden ? eyeOpen : eyeSlash;
        
    }

    function calcStaffAge(birthdate) {
    if (!birthdate) return;
    const today = new Date();
    const dob = new Date(birthdate);
    let age = today.getFullYear() - dob.getFullYear();
    const m = today.getMonth() - dob.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) age--;
    document.getElementById('staff_age_display').value = age + ' years old';
    document.getElementById('staff_age_hidden').value = age;
}
// Pre-fill age on page load if old() value exists (after validation error)
document.addEventListener('DOMContentLoaded', function () {
    const bd = document.getElementById('staff_birthdate');
    if (bd && bd.value) calcStaffAge(bd.value);
});

    // ===== EDIT RESIDENT MODAL =====
    function openEditModal(id, firstName, middleInitial, lastName, address) {
        document.getElementById('edit_first_name').value = firstName;
        document.getElementById('edit_middle_initial').value = middleInitial;
        document.getElementById('edit_last_name').value = lastName;
        document.getElementById('edit_address').value = address;
        document.getElementById('editForm').action = '/residents/' + id;
        const modal = document.getElementById('editModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeEditModal() {
        const modal = document.getElementById('editModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.getElementById('editModal')?.addEventListener('click', function(e) {
        if (e.target === this) closeEditModal();
    });
</script>
</body>
 
@endsection
</html>
