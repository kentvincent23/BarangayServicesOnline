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

<body class="bg-[#f8fafc] min-h-screen pb-12">

    <nav class="sticky top-0 z-50 glass border-b border-slate-200 px-4 py-3 md:px-6 md:py-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-2 md:gap-3">
                <a href="{{ url('/') }}" class="flex items-center gap-2 no-underline">
                    <img src="{{ asset('images/Mankilam Logo.jpg') }}" alt="Mankilam Logo"
                        class="h-9 w-auto object-contain rounded-md md:h-12">
                </a>
                <span class="font-extrabold text-base md:text-xl tracking-tighter text-slate-800">Barangay Connect</span>
            </div>
            <div class="flex items-center gap-2 md:gap-4">
                @auth
                    <div class="hidden md:block text-right border-r border-slate-200 pr-4 mr-2">
                        <p class="text-s font-bold text-slate-900 uppercase">{{ Auth::user()->name }}</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-white border border-slate-200 text-slate-600 px-3 py-1.5 md:px-4 md:py-2 rounded-xl text-xs font-bold hover:bg-red-50 hover:text-red-600 transition-all">
                            Logout
                        </button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="text-xs font-bold text-slate-600 px-3 py-1.5 md:px-4 md:py-2 hover:bg-blue-700 hover:text-white rounded-xl transition-all">Sign in</a>
                    <a href="{{ route('register') }}" class="text-xs font-bold text-white bg-blue-700 px-3 py-1.5 md:px-4 md:py-2 rounded-xl hover:bg-blue-800 transition-all">Create Account</a>
                @endguest
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto mt-6 md:mt-10 px-4 md:px-6">

        @guest
            <div class="flex flex-col md:flex-row md:items-center md:justify-between md:gap-16 py-6 md:py-7 md:min-h-[70vh]">
                <div class="flex-1 flex flex-col items-center text-center md:items-end md:text-right space-y-5 md:space-y-6 order-1 md:order-2 mb-8 md:mb-0">
                    <div class="inline-flex justify-center md:justify-end">
                        <a href="{{ url('/') }}" class="flex items-center gap-2 no-underline">
                            <img src="{{ asset('images/Mankilam Logo.jpg') }}" alt="Mankilam Logo"
                                class="h-24 w-auto object-contain rounded-md md:h-32">
                        </a>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl md:text-4xl font-black text-slate-900 tracking-tight leading-tight">
                            Barangay Online Services Portal
                        </h1>
                        <p class="text-slate-500 mt-2 md:mt-3 text-base md:text-lg font-medium">
                            Access barangay services online — fast and easy.
                        </p>
                    </div>
                    <div class="flex justify-center md:justify-end gap-3 md:gap-4 w-full">
                        <a href="{{ route('login') }}" class="flex-1 md:flex-none text-center bg-white border border-slate-200 text-slate-700 px-6 py-3 md:px-8 md:py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all hover:bg-blue-700 hover:text-white shadow-sm">Sign In</a>
                        <a href="{{ route('register') }}" class="flex-1 md:flex-none text-center bg-blue-700 text-white px-6 py-3 md:px-8 md:py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all hover:bg-blue-800 shadow-xl shadow-blue-100">Create Account</a>
                    </div>
                </div>

                <div class="flex-1 grid grid-cols-1 gap-4 md:gap-6 order-2 md:order-1">
                    <div class="group bg-white p-5 md:p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="bg-blue-50 p-3 rounded-2xl group-hover:bg-blue-700 transition-colors duration-300 shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-blue-700 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-[11px] font-black text-blue-700 uppercase tracking-[0.2em] mb-1.5 md:mb-2">Vision</h3>
                                <p class="text-slate-600 font-medium text-sm leading-relaxed">To be a model barangay: economically progressive, stable, peaceful and health constituents...</p>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-white p-5 md:p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="bg-blue-50 p-3 rounded-2xl group-hover:bg-blue-700 transition-colors duration-300 shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-blue-700 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-[11px] font-black text-blue-700 uppercase tracking-[0.2em] mb-1.5 md:mb-2">Mission</h3>
                                <p class="text-slate-600 font-medium text-sm leading-relaxed">The officials and constituents have strong determination in attaining development in economic, cultural, political, ecological, social and spiritual aspects.</p>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-white p-5 md:p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="bg-blue-50 p-3 rounded-2xl group-hover:bg-blue-700 transition-colors duration-300 shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-blue-700 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-[11px] font-black text-blue-700 uppercase tracking-[0.2em] mb-1.5 md:mb-2">Goal</h3>
                                <p class="text-slate-600 font-medium text-sm leading-relaxed">To provide continuity in giving different services needed by the community.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endguest
    </main>

    {{-- Alerts --}}
    @if($errors->has('not_resident'))
        <div class="max-w-3xl mx-auto mb-6 bg-red-50 border border-red-200 text-red-700 font-semibold text-sm px-6 py-4 rounded-2xl flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
            </svg>
            {{ $errors->first('not_resident') }}
        </div>
    @endif

    @if($errors->has('duplicate_resident'))
        <div id="err-alert" class="mb-6 bg-red-50 border border-red-200 text-red-700 font-semibold text-sm px-6 py-4 rounded-2xl flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
            </svg>
            {{ $errors->first('duplicate_resident') }}
        </div>
    @endif

    @if($errors->has('staff_error'))
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 font-semibold text-sm px-6 py-4 rounded-2xl flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
            </svg>
            {{ $errors->first('staff_error') }}
        </div>
    @endif

    @if(session('success'))
        <div id="flash-toast" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 bg-slate-800 text-white text-sm font-bold px-6 py-4 rounded-2xl shadow-xl">
            {{ session('success') }}
        </div>
        <script>setTimeout(() => document.getElementById('flash-toast')?.remove(), 4000);</script>
    @endif

    @auth
    @if(Auth::user()->role === 'staff')

    {{-- ===== STAFF DASHBOARD ===== --}}
    {{-- ===== STAFF DASHBOARD ===== --}}
    {{-- ===== STAFF DASHBOARD ===== --}}
    {{-- ===== STAFF DASHBOARD ===== --}}
    {{-- ===== STAFF DASHBOARD ===== --}}
    {{-- ===== STAFF DASHBOARD ===== --}}
    {{-- ===== STAFF DASHBOARD ===== --}}
    {{-- ===== STAFF DASHBOARD ===== --}}
    {{-- ===== STAFF DASHBOARD ===== --}}

   
    <div class="w-full px-4 md:px-6">
    
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
                        class="hidden absolute right-10 top-1/2 -translate-y-1/2 p-1.5 bg-red-50 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition-all z-20"
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
                                                @csrf @method('POST')
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
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="md:col-span-2 space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">First Name</label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" required
                                class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1 block text-center">M.I.</label>
                            <input type="text" name="middle_initial" maxlength="1" value="{{ old('middle_initial') }}"
                                class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-center uppercase">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Last Name</label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" required
                                class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                        </div>
                    </div>
                    <div class="mt-4 space-y-2">
                        <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Home Address</label>
                        <input type="text" name="address" value="{{ old('address') }}" placeholder="e.g. Blk 1 Lot 2, Sampaguita St."
                            class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold" required>
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
                                        {{ $res->first_name }}
                                        {{ $res->middle_initial ? strtoupper($res->middle_initial) . '.' : '' }}
                                        {{ $res->last_name }}
                                    </p>
                                </td>
                                <td class="px-8 py-5">
                                    <p class="text-sm text-slate-500 font-medium">{{ $res->address ?? '—' }}</p>
                                </td>
                                <td class="px-8 py-5">
                                    <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all">
                                        <button type="button"
                                            onclick="openEditModal({{ $res->id }}, '{{ addslashes($res->first_name) }}', '{{ addslashes($res->middle_initial) }}', '{{ addslashes($res->last_name) }}', '{{ addslashes($res->address) }}')"
                                            class="p-2.5 bg-blue-50 text-blue-500 rounded-xl hover:bg-blue-500 hover:text-white transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                        <form action="{{ route('residents.destroy', $res->id) }}" method="POST" onsubmit="return confirm('Remove this resident from the registry?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2.5 bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-8 py-12 text-center text-slate-400 font-semibold">
                                    {{ ($search ?? false) ? 'No residents found matching "' . $search . '".' : 'No residents in the registry yet.' }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
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

        {{-- ===== STAFF ACCOUNTS TAB ===== --}}
        <div id="panel-staff" class="hidden space-y-6">
            <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100">
                <h2 class="text-lg font-black text-slate-800 mb-6">Create Staff Account</h2>
                <form action="{{ route('staff.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">First Name</label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" required
                                class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Last Name</label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" required
                                class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                        </div>
                    </div>
                    <div class="mt-4 space-y-2">
                        <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div class="space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="staff_password" required
                                    class="w-full px-5 py-4 pr-14 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                                <button type="button" onclick="togglePassword('staff_password', 'eye-staff')"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-700 transition-colors">
                                    <svg id="eye-staff" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
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
                    <div class="mt-6 flex justify-end">
                        <button type="submit"
                            class="bg-blue-700 hover:bg-blue-800 text-white px-8 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all shadow-lg shadow-blue-100 active:scale-95">
                            + Create Staff Account
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Name</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Email</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Added</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($staffAccounts ?? [] as $staff)
                            <tr class="group transition-all hover:bg-slate-50/50">
                                <td class="px-8 py-5">
                                    <p class="font-extrabold text-slate-800">{{ $staff->name }}</p>
                                    @if($staff->id === Auth::id())
                                        <span class="text-[10px] font-black text-blue-500 bg-blue-50 px-2 py-0.5 rounded-lg">You</span>
                                    @endif
                                </td>
                                <td class="px-8 py-5">
                                    <p class="text-sm text-slate-500 font-medium">{{ $staff->email }}</p>
                                </td>
                                <td class="px-8 py-5">
                                    <p class="text-sm text-slate-400 font-medium">{{ $staff->created_at->format('M d, Y') }}</p>
                                </td>
                                <td class="px-8 py-5">
                                    <div class="flex justify-end opacity-0 group-hover:opacity-100 transition-all">
                                        @if($staff->id !== Auth::id())
                                            <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" onsubmit="return confirm('Delete this staff account?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="p-2.5 bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all">
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
                                <td colspan="4" class="px-8 py-12 text-center text-slate-400 font-semibold">No staff accounts found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @else

    {{-- ===== RESIDENT VIEW ===== --}}
    <div class="w-full px-4 sm:px-6 lg:px-10 max-w-7xl mx-auto">
        <header class="mb-8 sm:mb-10">
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Request a Document</h1>
            <p class="text-slate-500 mt-2 text-sm sm:text-base">Submit your details below to process your application.</p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10">

            {{-- LEFT SIDE: Form + My Applications --}}
            <div class="w-full min-w-0">
                <div class="bg-white p-6 sm:p-8 lg:p-10 rounded-2xl sm:rounded-[2.5rem] shadow-2xl shadow-slate-200 border border-white">
                    <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 sm:space-y-6">
                        @csrf

                        @if($errors->any() && !$errors->has('not_resident'))
                            <div class="bg-red-50 border border-red-200 text-red-700 text-sm font-semibold px-5 py-3 rounded-2xl">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <div class="grid grid-cols-1 sm:grid-cols-5 gap-3 sm:gap-4">
                           <div class="sm:col-span-2 space-y-2">
                                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">First Name</label>
                                <input type="text" name="first_name" value="{{ old('first_name', Auth::user()->first_name ?? '') }}"
                                class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-slate-50 border-none rounded-xl sm:rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm" required>
                            </div>

                            <div class="sm:col-span-1 space-y-2">
                                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1 block text-center">M.I.</label>
                                <input type="text" name="middle_initial" maxlength="1"
                                    value="{{ old('middle_initial', isset(Auth::user()->middle_name) ? substr(Auth::user()->middle_name, 0, 1) : '') }}"
                                    class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-slate-50 border-none rounded-xl sm:rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-center uppercase text-sm ">
                            </div>
                            <div class="sm:col-span-2 space-y-2">
                                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Last Name</label>
                                <input type="text" name="last_name" value="{{ old('last_name', Auth::user()->last_name ?? '') }}"
                                    class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-slate-50 border-none rounded-xl sm:rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm "required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                            <div class="space-y-2">
                                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Age</label>
                                <input type="number" name="age" value="{{ old('age', Auth::user()->age ?? '') }}"
                                    class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-slate-50 border-none rounded-xl sm:rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm" required>
                            </div>
                            <div class="space-y-2 relative">
                             <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Civil Status</label>
                            
                            <div class="relative">
                                <select name="civil_status" required
                                    class="w-full px-5 py-4 bg-slate-50 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-bold text-slate-700 border-none appearance-none transition-all cursor-pointer">
                                    
                                    <option value="" disabled {{ old('civil_status', Auth::user()->civil_status ?? '') == '' ? 'selected' : '' }}>
                                        Select Status
                                    </option>
                                    
                                    @foreach(['Single', 'Married', 'Widowed', 'Separated'] as $status)
                                        <option value="{{ $status }}" {{ old('civil_status', Auth::user()->civil_status ?? '') == $status ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>

                                <!-- Custom Chevron Icon -->
                                <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                            <!-- Service Type Dropdown -->
                            <div class="space-y-2">
                                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Service Type</label>
                                <div class="relative group">
                                    <select name="service_type" 
                                        class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-slate-50 border-none rounded-xl sm:rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-bold text-slate-700 text-sm appearance-none transition-all cursor-pointer" 
                                        required>
                                        <option value="" disabled {{ old('service_type') ? '' : 'selected' }}>Select Service</option>
                                        <option value="Barangay Clearance" {{ old('service_type') == 'Barangay Clearance' ? 'selected' : '' }}>Barangay Clearance</option>
                                        <option value="Certificate of Indigency" {{ old('service_type') == 'Certificate of Indigency' ? 'selected' : '' }}>Certificate of Indigency</option>
                                        <option value="Certificate of Residency" {{ old('service_type') == 'Certificate of Residency' ? 'selected' : '' }}>Certificate of Residency</option>
                                        <option value="Business Permit" {{ old('service_type') == 'Business Permit' ? 'selected' : '' }}>Business Permit</option>
                                    </select>
                                    
                                    <!-- Custom Chevron Icon -->
                                    <div class="absolute inset-y-0 right-0 flex items-center px-4 sm:px-5 pointer-events-none">
                                        <svg class="w-4 h-4 text-slate-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Purpose Input -->
                            <div class="space-y-2">
                                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Purpose</label>
                                <input type="text" name="purpose" value="{{ old('purpose') }}" placeholder="e.g. Job Application"
                                    class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-slate-50 border-none rounded-xl sm:rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-bold text-slate-700 text-sm transition-all placeholder:text-slate-400 placeholder:font-normal" 
                                    required>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Additional Notes (Optional)</label>
                            <textarea name="notes" rows="3"
                                class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-slate-50 border-none rounded-xl sm:rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold resize-none text-sm">{{ old('notes') }}</textarea>
                        </div>

                        <div class="space-y-2 p-4 bg-blue-50/50 rounded-2xl border-2 border-dashed border-blue-100">
                            <label class="text-[11px] font-black text-blue-500 uppercase tracking-widest ml-1 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Attach Valid ID for Verification
                            </label>
                            <input type="file" name="id_image" required
                                class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer">
                            <p class="text-[10px] text-slate-400 ml-1 italic font-medium">*This image is used only for verification and will be deleted once processed.</p>
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-700 hover:bg-blue-800 text-white py-4 sm:py-5 rounded-[1.25rem] sm:rounded-[1.5rem] font-black uppercase tracking-[0.2em] text-xs transition-all shadow-xl shadow-blue-100 active:scale-95">
                            Submit Request
                        </button>
                    </form>
                </div>

                {{-- My Applications --}}
                @php $myApps = Auth::user()->applications()->latest()->get(); @endphp
                @if($myApps->count())
                    <div class="mt-6 sm:mt-10" x-data="{ filter: 'approved' }">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-4">
                            <h2 class="text-base sm:text-lg font-black text-slate-800">My Applications</h2>
                            <div class="flex items-center gap-2 overflow-x-auto pb-2 sm:pb-0">
                                <div class="flex bg-slate-100 p-1 rounded-xl border border-slate-200">
                                    <button @click="filter = 'approved'"
                                        :class="filter === 'approved' ? 'bg-blue-500 text-white shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                                        class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-wider transition-all">
                                        Approved
                                    </button>
                                    <button @click="filter = 'ready_to_pickup'"
                                        :class="filter === 'ready_to_pickup' ? 'bg-emerald-500 text-white shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                                        class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-wider transition-all">
                                        Ready
                                    </button>
                                    <button @click="filter = 'released'"
                                        :class="filter === 'released' ? 'bg-violet-500 text-white shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                                        class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-wider transition-all">
                                        Released
                                    </button>
                                    <button @click="filter = 'all'"
                                        :class="filter === 'all' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                                        class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-wider transition-all">
                                        All
                                    </button>
                                </div>
                                <div class="p-2 bg-white border border-slate-200 rounded-xl text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            @foreach($myApps as $app)
                                <div x-show="filter === 'all' || filter === '{{ $app->status }}'"
                                    class="bg-white rounded-xl sm:rounded-2xl px-4 sm:px-6 py-3 sm:py-4 border border-slate-100 shadow-sm flex items-center justify-between gap-3">
                                    <div class="min-w-0">
                                        <p class="font-black text-slate-900 text-sm sm:text-base leading-tight">{{ $app->document_type }}</p>
                                        <p class="text-[11px] text-slate-500 italic mt-0.5 truncate">"{{ $app->purpose }}"</p>
                                        <p class="text-[10px] text-slate-300 mt-1 font-medium">{{ $app->created_at->format('M d, Y h:i A') }}</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        @if($app->status === 'approved')
                                            <span class="px-2.5 sm:px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-blue-100 text-blue-600 border border-blue-200/50 whitespace-nowrap">Approved</span>
                                        @elseif($app->status === 'ready_to_pickup')
                                            <span class="px-2.5 sm:px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-emerald-100 text-emerald-600 border border-emerald-200/50 animate-pulse whitespace-nowrap">Ready to Pick Up</span>
                                        @elseif($app->status === 'released')
                                            <span class="px-2.5 sm:px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-violet-100 text-violet-600 border border-violet-200/50 whitespace-nowrap">Released</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- RIGHT SIDE: Available Services --}}
            <div class="w-full min-w-0">
                <div class="bg-white rounded-2xl sm:rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-100 p-5 sm:p-7">
                    <div class="mb-5">
                        <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Available Services</p>
                        <p class="text-slate-800 font-black text-base sm:text-lg mt-1">What can we help you with?</p>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3 p-4 rounded-xl sm:rounded-2xl bg-blue-50 border border-blue-100">
                            <div class="flex-shrink-0 w-9 h-9 rounded-lg bg-blue-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="font-black text-blue-800 text-sm">Barangay Clearance</p>
                                <p class="text-blue-500 text-xs mt-0.5 leading-relaxed">Certifies that a resident has no pending case within the barangay. Required for employment, business, and legal transactions.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 p-4 rounded-xl sm:rounded-2xl bg-emerald-50 border border-emerald-100">
                            <div class="flex-shrink-0 w-9 h-9 rounded-lg bg-emerald-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="font-black text-emerald-800 text-sm">Certificate of Indigency</p>
                                <p class="text-emerald-600 text-xs mt-0.5 leading-relaxed">For low-income residents needing government assistance, free medical services, scholarships, or social welfare programs.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 p-4 rounded-xl sm:rounded-2xl bg-violet-50 border border-violet-100">
                            <div class="flex-shrink-0 w-9 h-9 rounded-lg bg-violet-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-violet-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="font-black text-violet-800 text-sm">Certificate of Residency</p>
                                <p class="text-violet-600 text-xs mt-0.5 leading-relaxed">Proof of barangay residence. Needed for school enrollment, voter registration, bank accounts, and address verification.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 p-4 rounded-xl sm:rounded-2xl bg-amber-50 border border-amber-100">
                            <div class="flex-shrink-0 w-9 h-9 rounded-lg bg-amber-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="font-black text-amber-800 text-sm">Business Permit</p>
                                <p class="text-amber-600 text-xs mt-0.5 leading-relaxed">Barangay-level clearance required before operating any business. A prerequisite for the Mayor's Permit and official city registration.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @endif
    @endauth

    <footer class="mt-12 text-center">
        <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.5em]">&copy; {{ date('Y') }} Barangay Online Services Portal</p>
    </footer>

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
</html>
