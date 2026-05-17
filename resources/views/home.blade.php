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
<div class="w-full px-4 md:px-6 pt-6 pb-2">
    <div class="flex items-center justify-between gap-3 flex-wrap xl:flex-nowrap">

        {{-- ===== ALL TABS IN ONE ROW ===== --}}
        <div class="flex items-center gap-2 flex-wrap">

            <button onclick="switchTab('applications')" id="tab-applications"
                class="tab-nav active group bg-white pl-2 pr-4 py-2 rounded-2xl shadow-sm border border-slate-200 flex items-center gap-2 transition-all hover:shadow-md active:scale-95 cursor-pointer">
                <div class="icon-box pointer-events-none bg-blue-100 p-2 rounded-xl text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <p class="tab-label text-xs font-extrabold text-slate-800 leading-none pointer-events-none">Applications</p>
            </button>

            <button onclick="switchTab('registry')" id="tab-registry"
                class="tab-nav group bg-white pl-2 pr-4 py-2 rounded-2xl shadow-sm border border-slate-200 flex items-center gap-2 transition-all hover:shadow-md active:scale-95 cursor-pointer">
                <div class="icon-box pointer-events-none bg-slate-50 p-2 rounded-xl text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <p class="tab-label text-xs font-extrabold text-slate-400 leading-none pointer-events-none">Registry</p>
            </button>

            <button onclick="switchTab('staff')" id="tab-staff"
                class="tab-nav group bg-white pl-2 pr-4 py-2 rounded-2xl shadow-sm border border-slate-200 flex items-center gap-2 transition-all hover:shadow-md active:scale-95 cursor-pointer">
                <div class="icon-box pointer-events-none bg-slate-50 p-2 rounded-xl text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <p class="tab-label text-xs font-extrabold text-slate-400 leading-none pointer-events-none">Staff</p>
            </button>

            <button onclick="switchTab('officials')" id="tab-officials"
                class="tab-nav group bg-white pl-2 pr-4 py-2 rounded-2xl shadow-sm border border-slate-200 flex items-center gap-2 transition-all hover:shadow-md active:scale-95 cursor-pointer">
                <div class="icon-box pointer-events-none bg-slate-50 p-2 rounded-xl text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <p class="tab-label text-xs font-extrabold text-slate-400 leading-none pointer-events-none">Officials</p>
            </button>

            <button onclick="switchTab('service')" id="tab-service"
                class="tab-nav group bg-white pl-2 pr-4 py-2 rounded-2xl shadow-sm border border-slate-200 flex items-center gap-2 transition-all hover:shadow-md active:scale-95 cursor-pointer">
                <div class="icon-box pointer-events-none bg-slate-50 p-2 rounded-xl text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <p class="tab-label text-xs font-extrabold text-slate-400 leading-none pointer-events-none">Services</p>
            </button>

        </div>

        {{-- ===== RIGHT SIDE: POST ANNOUNCEMENT + STATS ===== --}}
        <div class="flex items-center gap-2 flex-shrink-0">

            {{-- Post Announcement Button --}}
            <button onclick="openAnnouncementModal()"
                class="flex items-center gap-2 bg-white border border-slate-200 text-slate-700 px-4 py-2 rounded-2xl shadow-sm hover:border-blue-300 hover:text-blue-600 transition-all text-xs font-black uppercase tracking-widest whitespace-nowrap">
                <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                </svg>
                Post Announcement
            </button>

            {{-- Residents Count --}}
            <div class="bg-white pl-2 pr-4 py-2 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-2 hover:border-violet-200 transition-colors">
                <div class="bg-violet-100 p-2 rounded-xl text-violet-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[8px] font-bold text-slate-400 uppercase tracking-tighter leading-none mb-0.5">Residents</p>
                    <p class="text-sm font-black text-slate-800 leading-none">{{ $residentCount ?? 0 }}</p>
                </div>
            </div>

            {{-- Staff Count --}}
            <div class="bg-white pl-2 pr-4 py-2 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-2 hover:border-amber-200 transition-colors">
                <div class="bg-amber-100 p-2 rounded-xl text-amber-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[8px] font-bold text-slate-400 uppercase tracking-tighter leading-none mb-0.5">Staff</p>
                    <p class="text-sm font-black text-slate-800 leading-none">{{ $staffCount ?? 0 }}</p>
                </div>
            </div>

        </div>

    </div>
</div>
<div id="panel-applications" class="space-y-6 ">
   {{-- Filters Row --}}
      <div class="w-full px-4 md:px-6 space-y-8 ">
    
<div class="flex flex-col gap-3 mb-6 ">

    {{-- Filter Toggle Bar --}}
    <div class="flex items-center gap-3 justify-center">

      

        {{-- Filter Toggle Button --}}
        <button onclick="toggleFilters()" id="filter-toggle-btn"
            class="flex items-center gap-2 px-4 py-2.5 bg-white border-2 border-slate-200 hover:border-slate-300 rounded-2xl text-xs font-black uppercase tracking-widest text-slate-600 hover:text-slate-800 transition-all shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z" />
            </svg>
            Filters
            {{-- Active indicator dot --}}
            <span id="filter-active-dot" class="hidden w-2 h-2 bg-blue-500 rounded-full"></span>
            {{-- Chevron --}}
            <svg id="filter-chevron" xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-slate-400 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
<div id="app-count-wrapper" class="hidden items-center gap-2 px-4 py-2 bg-slate-800 text-white rounded-2xl shadow-sm">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h8" />
    </svg>
    <p id="app-count" class="text-[11px] font-black text-white uppercase tracking-widest"></p>
</div>
    </div>

            


    {{-- Collapsible Filter Panel --}}
    <div id="filter-panel"
        style="max-height: 0; opacity: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.16,1,0.3,1), opacity 0.3s ease;">
        <div class="bg-white border-2 border-slate-100 rounded-3xl p-4 shadow-sm space-y-4">

            {{-- Status Filter Buttons --}}
     {{-- Status Filter Buttons + Name Search --}}
<div x-data="{ filter: 'all' }">
    <div class="flex items-center gap-1.5 mb-4 overflow-x-auto pb-2 scrollbar-hide">
        @foreach([
            ['key'=>'all',            'label'=>'All',             'dot'=>'bg-slate-400',   'active'=>'bg-slate-100 border-slate-400 text-slate-700'],
            ['key'=>'pending',        'label'=>'Pending',         'dot'=>'bg-yellow-500',  'active'=>'bg-yellow-50 border-yellow-500 text-yellow-800'],
            ['key'=>'approved',       'label'=>'Approved',        'dot'=>'bg-blue-500',    'active'=>'bg-blue-50 border-blue-500 text-blue-800'],
            ['key'=>'processing',     'label'=>'Processing',      'dot'=>'bg-violet-500',  'active'=>'bg-violet-50 border-violet-500 text-violet-800'],
            ['key'=>'ready_to_pickup','label'=>'Ready to Pick Up','dot'=>'bg-emerald-500', 'active'=>'bg-emerald-50 border-emerald-500 text-emerald-800'],
            ['key'=>'released',       'label'=>'Released',        'dot'=>'bg-violet-500',  'active'=>'bg-violet-50 border-violet-500 text-violet-800'],
            ['key'=>'rejected',       'label'=>'Rejected',        'dot'=>'bg-red-500',     'active'=>'bg-red-50 border-red-500 text-red-800'],
            ['key'=>'missed',         'label'=>'Missed',          'dot'=>'bg-slate-400',   'active'=>'bg-slate-100 border-slate-400 text-slate-700'],
        ] as $f)
        <button @click="filter = '{{ $f['key'] }}'; setStatus('{{ $f['key'] }}')"
            :class="filter === '{{ $f['key'] }}' ? '{{ $f['active'] }}' : 'bg-white border-slate-200 hover:bg-slate-50'"
            class="flex items-center gap-1.5 px-3 py-1.5 rounded-3xl border text-[13px] font-semibold whitespace-nowrap transition-all shrink-0 h-13">
            <span class="w-1.5 h-1.5 rounded-full {{ $f['dot'] }} shrink-0"></span>
            {{ $f['label'] }}
        </button>
        @endforeach

        {{-- Search --}}
        <div class="relative ml-2 shrink-0 ml-auto">
            <div class="pointer-events-none absolute left-3 top-8.5 -translate-y-1/2 text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <input type="text" id="name-filter" oninput="applyFilters()"
                placeholder="Search by name..."
                class="pl-9 pr-4 py-1.5 bg-white border border-slate-200 rounded-full outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/10 font-semibold text-[16px] placeholder:text-slate-300 placeholder:font-normal transition-all w-100 h-13">
        </div>
    </div>
</div>

            {{-- Divider --}}
            <div class="h-px bg-slate-100"></div>

            {{-- Document Type + Date --}}
            <div class="flex flex-col sm:flex-row gap-3">

                {{-- Document Type Dropdown --}}
                <div class="relative flex-1">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Document Type</p>
                    <div class="relative">
                        <select id="type-filter" onchange="applyFilters()"
                            class="appearance-none w-full px-4 py-2.5 pr-10 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/10 font-bold text-slate-700 text-sm cursor-pointer transition-all">
                            <option value="all">All Document Types</option>
                            <option value="Barangay Clearance">Barangay Clearance</option>
                            <option value="Certificate of Indigency">Certificate of Indigency</option>
                            <option value="Certificate of Residency">Certificate of Residency</option>
                            <option value="Business Permit">Business Permit</option>
                        </select>
                        <div class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Date Filter --}}
                <div class="flex-1">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Date Requested</p>
                    <div class="flex items-center gap-2">
                        <div class="relative flex-1 group">
                            <div class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="date" id="date-filter"
                                onchange="applyFilters()" oninput="applyFilters()"
                                class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/10 font-bold text-slate-600 text-sm cursor-pointer transition-all" />
                        </div>
                        <button onclick="clearDateFilter()" id="clear-date-btn" type="button"
                            class="hidden items-center gap-1.5 px-3 py-2.5 bg-red-50 text-red-500 border border-red-100 rounded-xl hover:bg-red-500 hover:text-white transition-all text-[10px] font-black uppercase tracking-wider whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Clear
                        </button>
                    </div>
                </div>
            </div>

            {{-- Reset All --}}
            <div class="flex justify-end pt-1">
                <button onclick="resetAllFilters()"
                    class="flex items-center gap-1.5 px-4 py-2 bg-slate-100 hover:bg-red-50 text-slate-500 hover:text-red-500 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all border border-transparent hover:border-red-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Reset All Filters
                </button>
            </div>
        </div>
    </div>
</div>
        {{-- Result Count --}}
       

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
                                    <p class="text-sm font-bold text-slate-700">"{{ $app->serviceType->name }}"</p>
                                    <p class="text-[11px] text-slate-400 mt-0.5 italic">Purpose: {{ $app->purpose }}</p>
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
                                    @if($app->status === 'pending')
                                        <span class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-yellow-100 text-yellow-600 border border-blue-200/50">Pending</span>
                                    @elseif($app->status === 'approved')
                                        <span class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-blue-100 text-blue-600 border border-blue-200/50">Approved</span>
                                    @elseif($app->status === 'processing')
                                        <span class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-cyan-100 text-cyan-600 border border-blue-200/50">Processing</span>
                                    @elseif($app->status === 'ready_to_pickup')
                                        <span class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-emerald-100 text-emerald-600 border border-emerald-200/50">Ready to Pick Up</span>
                                    @elseif($app->status === 'released')
                                        <span class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-violet-100 text-violet-600 border border-violet-200/50">Released</span>
                                    @elseif($app->status === 'rejected')
                                        <span class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-red-100 text-red-600 border border-red-200/50">Rejected</span>
                                    @elseif($app->status === 'missed')
                                        <span class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-gray-100 text-gray-600 border border-red-200/50">Missed</span>
                                    @endif
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-5">
    <div class="flex justify-end items-center gap-2 opacity-0 group-hover:opacity-100 transition-all">
        
        {{-- 1. PENDING -> Move to Processing or Reject --}}
{{-- 1. PENDING -> Approve or Reject --}}
                @if($app->status === 'pending')
                    <form action="{{ route('applications.approve', $app->id) }}" method="POST">
                        @csrf @method('PATCH')
                        <button type="submit" class="flex items-center gap-1.5 px-3 py-2 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition-all text-[10px] font-black uppercase tracking-wider whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Approve
                        </button>
                    </form>
                    <form action="{{ route('applications.reject', $app->id) }}" method="POST" onsubmit="return confirm('Reject this application?')">
                        @csrf @method('PATCH')
                       <button type="button" onclick="openRejectModal({{ $app->id }})" 
                            class="flex items-center gap-1.5 px-3 py-2 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition-all text-[10px] font-black uppercase tracking-wider whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/xl" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Reject
                        </button>
                    </form>

                {{-- 2. APPROVED -> Start Processing --}}
                @elseif($app->status === 'approved')
                    <form action="{{ route('applications.process', $app->id) }}" method="POST">
                        @csrf @method('PATCH')
                        <button type="submit" class="flex items-center gap-1.5 px-3 py-2 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition-all text-[10px] font-black uppercase tracking-wider whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Start Processing
                        </button>
                    </form>

                {{-- 3. PROCESSING -> Ready to Pick Up --}}
                @elseif($app->status === 'processing')
                    <form action="{{ route('applications.ready', $app->id) }}" method="POST">
                        @csrf @method('PATCH')
                        <button type="submit" class="flex items-center gap-1.5 px-3 py-2 bg-emerald-50 text-emerald-600 rounded-xl hover:bg-emerald-600 hover:text-white transition-all text-[10px] font-black uppercase tracking-wider whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8" />
                            </svg>
                            Ready to Pick Up
                        </button>
                    </form>

                {{-- 4. READY TO PICKUP -> Released or Missed --}}
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
                    <form action="{{ route('applications.missed', $app->id) }}" method="POST" onsubmit="return confirm('Mark as Missed?')">
                        @csrf @method('PATCH')
                        <button type="submit" class="flex items-center gap-1.5 px-3 py-2 bg-gray-50 text-gray-600 rounded-xl hover:bg-gray-600 hover:text-white transition-all text-[10px] font-black uppercase tracking-wider whitespace-nowrap">
                            Mark Missed
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

    {{-- Toggle Button --}}
    <div class="flex justify-center">
        <button id="resident-trigger" onclick="toggleResidentForm()"
            class="flex items-center justify-center gap-2.5 bg-blue-700 hover:bg-blue-800 text-white px-6 py-3.5 rounded-2xl font-black uppercase tracking-[0.12em] text-[11px] shadow-xl shadow-blue-200 transition-all active:scale-95 w-full sm:w-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
            <span id="resident-btn-label">Click Here to Add Resident</span>
        </button>
    </div>

    {{-- Collapsible Form --}}
    <div id="resident-form-wrapper" style="max-height:0; overflow:hidden; transition: max-height 0.6s cubic-bezier(0.16,1,0.3,1), opacity 0.4s ease; opacity:0;">
        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">

            {{-- Form Header --}}
            <div class="bg-blue-700 px-6 py-4 flex items-center gap-3">
                <div class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-black text-white text-sm">Add New Resident</p>
                    <p class="text-[11px] text-blue-200">Fill in the details to register</p>
                </div>
            </div>

            <div class="p-6 sm:p-8">
                <form action="{{ route('residents.store') }}" method="POST" class="space-y-4">
    @csrf

    {{-- Row 1: First + Middle + Last --}}
    <div class="grid grid-cols-1 sm:grid-cols-5 gap-4">
        <div class="sm:col-span-2 space-y-1.5">
            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}" required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all">
        </div>
        <div class="sm:col-span-1 space-y-1.5">
            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Middle Name <span class="normal-case font-medium text-slate-300">(Optional)</span></label>
            <input type="text" name="middle_name" value="{{ old('middle_name') }}"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all">
        </div>
        <div class="sm:col-span-2 space-y-1.5">
            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name') }}" required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all">
        </div>
    </div>

    {{-- Row 2: Birthdate + Age + Gender + Civil Status --}}
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <div class="space-y-1.5">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Birth Date</label>
                {{-- Added id="birth_date" and onchange="calculateAge()" --}}
                <input type="date" name="birth_date" id="birth_date" onchange="calculateAge()" value="{{ old('birth_date') }}" required
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all">
            </div>

            <div class="space-y-1.5">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">
                  Age <span class="text-blue-400 normal-case tracking-normal font-medium">(auto)</span>
                </label>
                {{-- Added id="age" and made it readonly so residents can't type random numbers --}}
                <input type="number" name="age" id="age" value="{{ old('age') }}" readonly required 
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all cursor-not-allowed">
            </div>
            <div class="space-y-1.5">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Gender</label>
                <div class="grid grid-cols-2 gap-2 h-[46px]">
                    @foreach(['Male', 'Female'] as $gender)
                    <label class="relative cursor-pointer h-full">
                        <input type="radio" name="gender" value="{{ $gender }}"
                            {{ old('gender') == $gender ? 'checked' : '' }}
                            class="peer sr-only" required>
                        <div class="flex items-center justify-center gap-1 h-full px-2 bg-slate-50 border border-slate-100 rounded-xl text-[10px] font-black text-slate-500 uppercase tracking-wider transition-all peer-checked:bg-blue-700 peer-checked:border-blue-700 peer-checked:text-white hover:border-blue-300 hover:bg-blue-50">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            {{ $gender }}
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>
            <div class="space-y-1.5">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Civil Status</label>
                <div class="relative">
                    <select name="civil_status" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-slate-700 appearance-none cursor-pointer text-sm transition-all">
                        <option value="" disabled selected>Select</option>
                        @foreach(['Single', 'Married', 'Widowed', 'Separated'] as $status)
                            <option value="{{ $status }}" {{ old('civil_status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Row 3: Address --}}
        <div class="space-y-1.5">
            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Home Address</label>
            <input type="text" name="address" value="{{ old('address') }}" placeholder="Purok, Street, Barangay" required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm placeholder:text-slate-400 placeholder:font-normal transition-all">
        </div>

        {{-- Submit --}}
        <div class="flex justify-center pt-2">
            <button type="submit"
                class="flex items-center justify-center gap-2 bg-blue-700 hover:bg-blue-800 text-white px-8 py-3.5 rounded-2xl font-black uppercase tracking-widest text-xs transition-all shadow-lg shadow-blue-100 active:scale-95 w-full sm:w-auto">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
                Add Resident
            </button>
        </div>
    </form>
            </div>
        </div>
    </div>

    {{-- Search --}}
<div class="mb-6">
    <div class="relative group">
       <!-- Background Glow -->
        <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 via-indigo-500 to-cyan-500 rounded-[1.7rem] blur opacity-20 group-focus-within:opacity-40 transition duration-300"></div>
        <!-- Search Container -->
        <div class="relative flex items-center bg-white/90 backdrop-blur-xl border border-slate-200 rounded-[1.7rem] shadow-lg overflow-hidden transition-all duration-300 group-focus-within:shadow-blue-200 group-focus-within:border-blue-400">
            <!-- Search Icon -->
            <div class="pl-5">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 text-slate-400 group-focus-within:text-blue-500 transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round"  stroke-linejoin="round" stroke-width="2"  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <input
                type="text"
                id="table-search-input" oninput="executeSearch()" placeholder="Search resident by name..."
                class="w-full bg-transparent py-5 pl-4 pr-5 text-slate-700 font-semibold text-[15px] placeholder:text-slate-400 outline-none border-none focus:ring-0">
        </div>
    </div>
</div>

{{-- Search counter text box --}}
<p id="search-results-counter" class="text-sm font-semibold text-slate-500 mb-3 hidden"></p>

    {{-- Table --}}
    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100">
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Resident ID</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Fullname</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Birthdate</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Gender</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Address</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Actions</th>
                </tr>
            </thead>
            <tbody id="resident-tbody" class="divide-y divide-slate-50">
    @forelse($residents ?? [] as $res)
        {{-- 🚀 HOOK 1: Added class="resident-tr-row" --}}
        <tr class="resident-tr-row group transition-all hover:bg-slate-50/50">
            <td class="px-8 py-5">
                <span class="text-[11px] font-black text-blue-600 tracking-widest bg-blue-50 px-3 py-1.5 rounded-lg">{{ $res->resident_id }}</span>
            </td>
            
            <td class="px-8 py-5">
                {{-- HOOK 2: Added class="resident-fullname-text" right here --}}
                <p class="resident-fullname-text font-extrabold text-slate-800">
                    {{ strtoupper(trim("{$res->first_name} {$res->middle_name} {$res->last_name}")) }}
                    <span class="text-[10px] font-black px-3 py-1 rounded-full uppercase {{ $res->civil_status === 'Single' ? 'bg-green-50 text-green-600' : 'bg-violet-50 text-violet-600' }}">
                        {{ $res->civil_status ?? 'N/A' }}
                    </span>
                </p>
            </td>
            
            <td class="px-8 py-5">
                <p class="text-sm font-bold text-slate-600 italic">
                    {{ $res->birthdate ? date('M d, Y', strtotime($res->birthdate)) : '—'  }}
                    <span class="text-[10px] font-black px-3 py-1 rounded-full uppercase bg-green-50 text-strong">{{ $res->age ?? '—' }} y/o</span>
                </p>
            </td>
            
            <td class="px-8 py-5">
                <span class="inline-flex items-center px-2.5 py-1 text-[10px] font-black uppercase tracking-wider rounded-xl transition-all border shrink-0 {{ $res->gender === 'Male' ? 'bg-blue-50/60 text-blue-600 border-blue-100/40' : 'bg-rose-50/60 text-rose-600 border-rose-100/40' }}">
                    <span class="w-1.5 h-1.5 rounded-full mr-1.5 shrink-0 {{ $res->gender === 'Male' ? 'bg-blue-500' : 'bg-rose-500' }}"></span>
                    {{ $res->gender ?? 'N/A' }}
                </span>
            </td>
            
            <td class="px-8 py-5">
                <p class="text-sm text-slate-500 font-medium">{{ $res->address ?? '—' }}</p>
            </td>
            
            <td class="px-8 py-5 text-right">
                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all">
                   <button type="button"
                        onclick="openEditResidentModal({{ $res->id }}, '{{ addslashes($res->first_name) }}', '{{ addslashes($res->middle_name ?? '') }}', '{{ addslashes($res->last_name) }}', '{{ addslashes($res->address ?? '') }}', '{{ $res->birth_date ?? '' }}', '{{ $res->age ?? '' }}', '{{ $res->gender ?? '' }}', '{{ $res->civil_status ?? '' }}')"
                        class="p-2.5 bg-blue-50 text-blue-500 rounded-xl hover:bg-blue-500 hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                    </button>
                </div>
            </td>
        </tr>
    @empty
        {{-- 🚀 HOOK 3: Added id="search-empty-state" right here --}}
        <tr id="search-empty-state">
            <td colspan="6" class="px-8 py-12 text-center text-slate-400 font-semibold">
                No residents found.
            </td>
        </tr>
    @endforelse
</tbody>
        </table>
    </div>

    {{-- Edit Modal --}}
    <div id="editModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm">
    <div class="bg-white rounded-[2.5rem] shadow-2xl border border-slate-100 w-full max-w-lg mx-4 p-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-black text-slate-800">Edit Resident</h2>
            <button onclick="closeEditResidentModal()" class="p-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-500 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form id="editForm" method="POST" class="space-y-4">
            @csrf @method('PUT')

            {{-- Name Row --}}
            <div class="grid grid-cols-1 sm:grid-cols-5 gap-3">
                <div class="sm:col-span-2 space-y-1.5">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 block">First Name</label>
                    <input type="text" id="edit_first_name" name="first_name" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all">
                </div>
                <div class="sm:col-span-2 space-y-1.5">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 block">M.N.</label>
                    <input type="text" id="edit_middle_name" name="middle_name" 
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm text-center uppercase transition-all">
                </div>
                <div class="sm:col-span-2 space-y-1.5">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 block">Last Name</label>
                    <input type="text" id="edit_last_name" name="last_name" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all">
               
                    </div>
                    <div class="sm:col-span-2 space-y-1.5">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 block">Birth Date</label>
                    <input type="date" id="edit_birthdate" name="birth_date"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all">
                </div>
            </div>

             <div class="space-y-1.5">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 block">Gender</label>
                    <div class="grid grid-cols-2 gap-2 h-[46px]">
                        @foreach(['Male', 'Female'] as $gender)
                        <label class="relative cursor-pointer h-full">
                            <input type="radio" name="gender" value="{{ $gender }}" class="peer sr-only edit-gender-radio">
                            <div class="flex items-center justify-center h-full px-2 bg-slate-50 border border-slate-100 rounded-xl text-[10px] font-black text-slate-500 uppercase tracking-wider transition-all peer-checked:bg-blue-700 peer-checked:border-blue-700 peer-checked:text-white hover:border-blue-300 hover:bg-blue-50">
                                {{ $gender }}
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>

            {{-- Civil Status --}}
            <div class="grid grid-cols-2 gap-3">
             
                
                <div class="space-y-1.5">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 block">Age</label>
                    <input type="number" id="edit_age" name="age"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 block">Civil Status</label>
                    <div class="relative">
                        <select id="edit_civil_status" name="civil_status"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-slate-700 appearance-none cursor-pointer text-sm transition-all">
                            <option value="" disabled>Select</option>
                            @foreach(['Single', 'Married', 'Widowed', 'Separated'] as $status)
                                <option value="{{ $status }}">{{ $status }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Address --}}
            <div class="space-y-1.5">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 block">Home Address</label>
                <input type="text" id="edit_address" name="address" placeholder="Purok, Street, Barangay"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm placeholder:text-slate-400 placeholder:font-normal transition-all">
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end gap-3 pt-2">
                <button type="button" onclick="closeEditResidentModal()"
                    class="bg-slate-100 hover:bg-slate-200 text-slate-600 px-6 py-3 rounded-2xl font-black uppercase tracking-widest text-xs transition-all">
                    Cancel
                </button>
                <button type="submit"
                    class="bg-blue-700 hover:bg-blue-800 text-white px-8 py-3 rounded-2xl font-black uppercase tracking-widest text-xs transition-all shadow-lg shadow-blue-100 active:scale-95">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

</div>

        {{-- ===== STAFF ACCOUNTS TAB ===== --}}
  <div id="panel-staff" class="hidden space-y-6">
 
 
    {{-- Create Staff Form --}}
    <div class="flex justify-center mb-4">
    <button id="staff-trigger" onclick="toggleStaffForm()"
        class="flex items-center justify-center gap-2.5 bg-blue-700 hover:bg-blue-800 text-white px-6 py-3.5 rounded-2xl font-black uppercase tracking-[0.12em] text-[11px] shadow-xl shadow-blue-200 transition-all active:scale-95 w-full sm:w-auto">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
        </svg>
        <span id="staff-btn-label">Add Staff Account</span>
    </button>
</div>

{{-- Collapsible Form --}}
<div id="staff-form-wrapper" style="max-height:0; overflow:hidden; transition: max-height 0.6s cubic-bezier(0.16,1,0.3,1), opacity 0.4s ease; opacity:0;">
    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden mb-6">

        {{-- Form Header --}}
        <div class="bg-blue-700 px-6 py-4 flex items-center gap-3">
            <div class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
            </div>
            <div>
                <p class="font-black text-white text-sm">Create Staff Account</p>
                <p class="text-[11px] text-blue-200">Fill in the details to create</p>
            </div>
        </div>

        <div class="p-6 sm:p-8">
            <form action="{{ route('staff.store') }}" method="POST" class="space-y-4">
                @csrf

                {{-- First + Last Name --}}
             <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    {{-- FIRST NAME --}}
    <div class="space-y-1.5">
        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">First Name</label>
        <input type="text" name="first_name" value="{{ old('first_name') }}" required
            placeholder="e.g. Juan"
            class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all @error('first_name') ring-2 ring-red-400 @enderror">
        @error('first_name')
            <p class="text-[11px] text-red-500 font-semibold ml-1">{{ $message }}</p>
        @enderror
    </div>
    
    {{-- MIDDLE NAME  --}}
    <div class="space-y-1.5">
        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Middle Name</label>
        <input type="text" name="middle_name" value="{{ old('middle_name') }}"
            placeholder="e.g. Santos"
            class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all @error('middle_name') ring-2 ring-red-400 @enderror">
        @error('middle_name')
            <p class="text-[11px] text-red-500 font-semibold ml-1">{{ $message }}</p>
        @enderror
    </div>
    
    {{-- LAST NAME --}}
    <div class="space-y-1.5">
        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Last Name</label>
        <input type="text" name="last_name" value="{{ old('last_name') }}" required
            placeholder="e.g. Dela Cruz"
            class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all @error('last_name') ring-2 ring-red-400 @enderror">
        @error('last_name')
            <p class="text-[11px] text-red-500 font-semibold ml-1">{{ $message }}</p>
        @enderror
    </div>
</div>

                {{-- Birthdate + Age + Civil Status --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Birthdate</label>
                        <input type="date" name="birthdate" id="staff_birthdate"
                            value="{{ old('birthdate') }}"
                            max="{{ date('Y-m-d') }}"
                            onchange="calcStaffAge(this.value)"
                            required
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all @error('birthdate') ring-2 ring-red-400 @enderror">
                        @error('birthdate')
                            <p class="text-[11px] text-red-500 font-semibold ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">
                            Age <span class="text-blue-400 normal-case tracking-normal font-medium">(auto)</span>
                        </label>
                        <input type="text" id="staff_age_display" readonly
                            placeholder="Filled from birthdate"
                            class="w-full px-4 py-3 bg-slate-100 border border-slate-100 rounded-xl outline-none font-semibold text-slate-500 text-sm cursor-default">
                        <input type="hidden" name="age" id="staff_age_hidden" value="{{ old('age') }}">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Civil Status</label>
                        <div class="relative">
                            <select name="civil_status" required
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-slate-700 appearance-none cursor-pointer text-sm transition-all @error('civil_status') ring-2 ring-red-400 @enderror">
                                <option value="" disabled {{ old('civil_status') ? '' : 'selected' }}>Select status...</option>
                                @foreach(['Single', 'Married', 'Widowed', 'Separated', 'Annulled'] as $cs)
                                    <option value="{{ $cs }}" {{ old('civil_status') === $cs ? 'selected' : '' }}>{{ $cs }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                        @error('civil_status')
                            <p class="text-[11px] text-red-500 font-semibold ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div><div class="space-y-1.5">
    

                {{-- Email --}}
               {{-- Email + Gender --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="space-y-1.5">
        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required
            placeholder="e.g. staff@barangay.gov.ph"
            class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all @error('email') ring-2 ring-red-400 @enderror">
        @error('email')
            <p class="text-[11px] text-red-500 font-semibold ml-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="space-y-1.5">
        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Gender</label>
        <div class="grid grid-cols-2 gap-3">
            @foreach(['Male', 'Female'] as $gender)
            <label class="relative cursor-pointer">
                <input type="radio" name="gender" value="{{ $gender }}"
                    {{ old('gender') == $gender ? 'checked' : '' }}
                    class="peer sr-only" required>
                <div class="flex items-center justify-center gap-2 px-3 py-3 bg-slate-50 border border-slate-100 rounded-xl text-[11px] font-black text-slate-500 uppercase tracking-wider transition-all peer-checked:bg-blue-700 peer-checked:border-blue-700 peer-checked:text-white hover:border-blue-300 hover:bg-blue-50">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    {{ $gender }}
                </div>
            </label>
            @endforeach
        </div>
        @error('gender')
            <p class="text-[11px] text-red-500 font-semibold ml-1">{{ $message }}</p>
        @enderror
    </div>
</div>
</div>

                {{-- Password + Confirm --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Password</label>
                        <div class="relative">
                            <input type="password" name="password" id="staff_password" required
                                class="w-full px-4 py-3 pr-12 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all @error('password') ring-2 ring-red-400 @enderror">
                            <button type="button" onclick="togglePassword('staff_password', 'eye-staff')"
                                class="absolute right-3 top-8 -translate-y-1/2 text-slate-400 hover:text-slate-700 transition-colors">
                                <svg id="eye-staff" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-[11px] text-red-500 font-semibold ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Confirm Password</label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="staff_password_confirm" required
                                class="w-full px-4 py-3 pr-12 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all">
                            <button type="button" onclick="togglePassword('staff_password_confirm', 'eye-staff-confirm')"
                                class="absolute right-3 top-8 -translate-y-1/2 text-slate-400 hover:text-slate-700 transition-colors">
                                <svg id="eye-staff-confirm" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="flex justify-center pt-2">
                    <button type="submit"
                        class="flex items-center justify-center gap-2 bg-blue-700 hover:bg-blue-800 text-white px-8 py-3.5 rounded-2xl font-black uppercase tracking-widest text-xs transition-all shadow-lg shadow-blue-100 active:scale-95 w-full sm:w-auto">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        Create Staff Account
                    </button>
                </div>
            </form>
        </div>
    </div>
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
                                <p class="font-extrabold text-slate-800">
                                        {{ strtoupper(trim("{$staff->first_name} {$staff->middle_name} {$staff->last_name}")) }}
                                </p>
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

{{--Service types tab--}}

<div id="panel-service" class="hidden animate-in fade-in duration-500">

    <!-- Form Section -->
    {{-- Toggle Button --}}
<div class="flex justify-center mb-4">
    <button onclick="toggleServiceForm()"
        id="service-form-trigger"
        class="flex items-center  gap-2.5 bg-blue-700 hover:bg-blue-800 text-white px-6 py-3.5 rounded-2xl font-black uppercase tracking-[0.15em] text-[11px] shadow-xl shadow-blue-200 transition-all active:scale-95">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
        </svg>
        <span id="service-btn-label">Add New Service Type</span>
    </button>
</div>

{{-- Collapsible Form --}}
<div id="service-form-wrapper" style="max-height:0; overflow:hidden; opacity:0; transition: max-height 0.5s cubic-bezier(0.16,1,0.3,1), opacity 0.3s ease;">
    <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-slate-100 mb-8">
        <h3 class="text-lg font-black text-slate-800 mb-6">Service Type</h3>

        <form action="{{ route('services.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Service Name --}}
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Service Name</label>
                    <input type="text" name="name" placeholder="e.g., Barangay Clearance" required
                        class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 transition-all">
                </div>

                {{-- Availability --}}
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Status</label>
                    <select name="is_active"
                        class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 transition-all">
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                </div>

                {{-- Description --}}
                <div class="md:col-span-2 space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Description</label>
                    <textarea name="description" rows="3" placeholder="Brief details about this document..."
                        class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 transition-all"></textarea>
                </div>
            </div>

            <div class="mt-8 flex justify-end gap-3">
                <button type="button" onclick="toggleServiceForm()"
                    class="bg-slate-100 hover:bg-slate-200 text-slate-600 font-black py-4 px-6 rounded-2xl text-xs uppercase tracking-widest transition-all">
                    Cancel
                </button>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-black py-4 px-10 rounded-2xl text-xs uppercase tracking-widest shadow-lg shadow-blue-200 transition-all active:scale-95 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Service
                </button>
            </div>
        </form>
    </div>
</div>

    <!-- Table Section -->
    <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-50">
                    <th class="py-6 px-8 text-[10px] font-black text-slate-300 uppercase tracking-[0.2em]">Service Name</th>
                    <th class="py-6 px-8 text-[10px] font-black text-slate-300 uppercase tracking-[0.2em]">Description</th>
                    <th class="py-6 px-8 text-[10px] font-black text-slate-300 uppercase tracking-[0.2em]">Status</th>
                    <th class="py-6 px-8 text-[10px] font-black text-slate-300 uppercase tracking-[0.2em] text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach($serviceTypes as $service)
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    <td class="py-6 px-8">
                        <p class="text-sm font-black text-slate-800">{{ $service->name }}</p>
                    </td>
                    <td class="py-6 px-8">
                        <p class="text-xs font-bold text-slate-400 line-clamp-1">{{ $service->description ?? 'No description' }}</p>
                    </td>
                    <td class="py-6 px-8">
                        @if($service->is_active)
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-500 text-[10px] font-black uppercase tracking-tighter rounded-lg">Available</span>
                        @else
                            <span class="px-3 py-1 bg-rose-50 text-rose-500 text-[10px] font-black uppercase tracking-tighter rounded-lg">Unavailable</span>
                        @endif
                    </td>
                    <td class="py-6 px-8 text-right">
                        <button
                            onclick="openEditModal({{ json_encode($service) }})"
                            class="text-slate-300 hover:text-blue-600 transition-colors p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="editServiceModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm px-4">
    <div class="relative bg-white w-full max-w-lg rounded-[2.5rem] shadow-2xl p-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-black text-slate-800">Edit Service Type</h3>
            <button onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form id="editServiceForm" method="POST" class="space-y-5">
            @csrf
            @method('PATCH')

            <div class="space-y-1">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Service Name</label>
                <input type="text" name="name" id="edit_name" required
                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="space-y-1">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Availability</label>
                <select name="is_active" id="edit_is_active"
                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500">
                    <option value="1">Available</option>
                    <option value="0">Not Available</option>
                </select>
            </div>

            <div class="space-y-1">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Description</label>
                <textarea name="description" id="edit_description" rows="3"
                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <div class="flex gap-3 mt-8">
                <button type="button" onclick="closeEditModal()"
                    class="flex-1 bg-slate-100 text-slate-600 font-black py-4 rounded-2xl text-xs uppercase tracking-widest hover:bg-slate-200 transition-all">
                    Cancel
                </button>
                <button type="submit"
                    class="flex-1 bg-blue-600 text-white font-black py-4 rounded-2xl text-xs uppercase tracking-widest hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

</div>
<div id="rejectModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4">    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm" onclick="closeRejectModal()"></div>
    
    <div class="relative bg-white w-full max-w-md rounded-[2.5rem] p-8 shadow-2xl border border-slate-100 max-h-[90vh] overflow-y-auto">
        <h3 class="text-xl font-black text-slate-800 mb-1">Reject Request</h3>
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-6">Select a reason or write a custom one</p>

        <form id="rejectForm" method="POST">
            @csrf
            @method('PATCH')
            
        <input type="hidden" name="rejection_reason" id="final_rejection_reason" required>
            <div class="space-y-2 mb-4">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Reasons</label>
                
                <button type="button" onclick="selectReason('The uploaded ID photo is too blurry or unreadable. Please re-apply with a clearer copy.', this)"
                    class="reason-btn w-full text-left bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-bold py-3.5 px-5 rounded-2xl border border-transparent transition-all">
                    
                    Image is blurry / unreadable
                </button>

                <button type="button" onclick="selectReason('The requirements submitted do not match the selected service or are incomplete.', this)"
                    class="reason-btn w-full text-left bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-bold py-3.5 px-5 rounded-2xl border border-transparent transition-all">
                    Incomplete / Wrong requirements
                </button>

                <button type="button" onclick="selectCustomOption(this)"
                    class="reason-btn w-full text-left bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-bold py-3.5 px-5 rounded-2xl border border-transparent transition-all">
                    Other Reason...
                </button>
            </div>

            <div id="customReasonWrapper" class="space-y-2 hidden transition-all duration-200">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2 text-blue-600">Type Reason</label>
                <textarea id="custom_textarea" oninput="updateCustomReasonValue()"
                    placeholder="Type the specific reason why this application is being rejected..."
                    class="w-full bg-slate-50 border border-blue-100 rounded-2xl p-5 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 h-28 resize-none outline-none"></textarea>
            </div>

            <div class="flex gap-3 mt-6">
                <button type="button" onclick="closeRejectModal()" 
                    class="flex-1 py-4 font-black text-xs uppercase tracking-widest text-slate-400 hover:text-slate-600 transition-colors">
                    Cancel
                </button>
                <button type="submit" id="submitRejectBtn" disabled
                    class="flex-1 bg-slate-200 text-slate-400 py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition-all cursor-not-allowed">
                    Confirm Reject
                </button>
            </div>
        </form>
    </div>
</div>
<div id="announcementModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4">
    {{-- Blurred Overlay --}}
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm" onclick="closeAnnouncementModal()"></div>
    
    {{-- Form Container Sheet --}}
    <div class="relative bg-white w-full max-w-md rounded-[2.5rem] p-8 shadow-2xl border border-slate-100 max-h-[95vh] overflow-y-auto">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                </svg>
            </div>
            <div>
                <h3 class="text-base font-black text-slate-800 tracking-tight">Broadcast Announcement</h3>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Send updates live to all resident dashboards</p>
            </div>
        </div>

        <form action="{{ route('announcements.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <div class="space-y-1.5">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Urgency Category</label>
                <div class="relative">
                    <select name="type" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl p-4 text-xs font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 appearance-none outline-none">
                        <option value="info">🔵 General Information Notice</option>
                        <option value="warning">🟡 High Urgency / Warning Alert</option>
                        <option value="success">🟢 Community Event / Program</option>
                    </select>
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Broadcast Headline</label>
                <input type="text" name="title" required placeholder="e.g., General Assembly This Saturday"
                    class="w-full bg-slate-50 border border-slate-100 rounded-2xl p-4 text-xs font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div class="space-y-1.5">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Message Content</label>
                <textarea name="content" required placeholder="Write details regarding dates, venues, guidelines..."
                    class="w-full bg-slate-50 border border-slate-100 rounded-2xl p-5 text-xs font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 h-32 resize-none outline-none"></textarea>
            </div>

            {{-- Form Buttons Controls Row --}}
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeAnnouncementModal()" class="flex-1 py-4 font-black text-xs uppercase tracking-widest text-slate-400 hover:text-slate-600 transition-colors">Cancel</button>
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-2xl font-black text-xs uppercase tracking-widest text-center shadow-lg shadow-blue-100 transition-all">Broadcast 🚀</button>
            </div>
        </form>
    </div>
</div>

{{-- ===== OFFICIALS TAB ===== --}}
{{-- ===== OFFICIALS TAB ===== --}}
{{-- ===== OFFICIALS TAB ===== --}}
<div id="panel-officials" class="hidden space-y-6">

    {{-- Add Official Form --}}
    <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100">
        <h2 class="text-lg font-black text-slate-800 mb-6">Add New Official</h2>
        <form action="{{ route('officials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                </div>
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Position / Title</label>
                    <input type="text" name="position" value="{{ old('position') }}" required
                        placeholder="e.g. Barangay Captain"
                        class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Display Order</label>
                    <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                        class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                    <p class="text-[10px] text-slate-400 ml-1">Lower number appears first (0 = first)</p>
                </div>
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Photo (Optional)</label>
                    <input type="file" name="photo" accept="image/*"
                        class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer bg-slate-50 rounded-2xl px-3 py-3">
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="bg-blue-700 hover:bg-blue-800 text-white px-8 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all shadow-lg shadow-blue-100 active:scale-95">
                    + Add Official
                </button>
            </div>
        </form>
    </div>

    {{-- Officials Grid --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-5">
        @forelse($officials ?? [] as $official)
            <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all overflow-hidden">

                {{-- Photo --}}
                <div class="relative h-44 bg-gradient-to-br from-blue-50 to-slate-100 overflow-hidden">
                    @if($official->photo_path)
                        <img src="{{ asset('storage/' . $official->photo_path) }}"
                            alt="{{ $official->name }}"
                            class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                    @endif

                    {{-- Action Buttons overlay on hover --}}
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-all flex items-center justify-center gap-2">
                        <button type="button"
                            onclick="openOfficialEditModal({{ $official->id }}, '{{ addslashes($official->name) }}', '{{ addslashes($official->position) }}', {{ $official->order }})"
                            class="p-2.5 bg-white text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </button>
                        <form action="{{ route('officials.destroy', $official->id) }}" method="POST"
                            onsubmit="return confirm('Remove this official?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="p-2.5 bg-white text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Info --}}
                <div class="p-4 text-center">
                    <p class="font-black text-slate-900 text-sm leading-tight">{{ $official->name }}</p>
                    <p class="text-[11px] text-blue-600 font-black uppercase tracking-widest mt-1">{{ $official->position }}</p>
                    <p class="text-[10px] text-slate-300 mt-0.5">Order: {{ $official->order }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-4 py-16 text-center text-slate-400 font-semibold">
                No officials added yet. Use the form above to add one.
            </div>
        @endforelse
    </div>
</div>

{{-- ===== EDIT OFFICIAL MODAL ===== --}}
<div id="officialEditModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm">
    <div class="bg-white rounded-[2.5rem] shadow-2xl border border-slate-100 w-full max-w-lg mx-4 p-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-black text-slate-800">Edit Official</h2>
            <button onclick="closeOfficialEditModal()" class="p-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-500 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form id="officialEditForm" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="POST">
            <div class="space-y-4">
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1 block">Full Name</label>
                    <input type="text" id="edit_official_name" name="name" required
                        class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                </div>
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1 block">Position / Title</label>
                    <input type="text" id="edit_official_position" name="position" required
                        class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                </div>
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1 block">Display Order</label>
                    <input type="number" id="edit_official_order" name="order" min="0"
                        class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                </div>
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1 block">Replace Photo (Optional)</label>
                    <input type="file" name="photo" accept="image/*"
                        class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer bg-slate-50 rounded-2xl px-3 py-3">
                    <p class="text-[10px] text-slate-400 ml-1">Leave empty to keep the current photo.</p>
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeOfficialEditModal()"
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

   <script>
    // ===== TAB SWITCHING =====
// ===== DASHBOARD TAB SWITCHER =====
function switchTab(tabId) {
    const tabs = ['applications', 'registry', 'staff', 'service', 'officials'];

    tabs.forEach(t => {
        const panel = document.getElementById('panel-' + t);
        const btn = document.getElementById('tab-' + t);

        if (panel) {
            panel.classList.add('hidden');
        }

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

    const activePanel = document.getElementById('panel-' + tabId);
    if (activePanel) {
        activePanel.classList.remove('hidden');
    }

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

    if (typeof applyFilters === "function") {
        applyFilters();
    }
}

// ===== APPLICATION FILTERS =====
let currentStatus = 'all';
let filtersOpen = false;

function toggleFilters() {
    const panel = document.getElementById('filter-panel');
    const chevron = document.getElementById('filter-chevron');
    filtersOpen = !filtersOpen;

    if (filtersOpen) {
        panel.style.maxHeight = panel.scrollHeight + 200 + 'px';
        panel.style.opacity = '1';
        chevron.style.transform = 'rotate(180deg)';
    } else {
        panel.style.maxHeight = '0';
        panel.style.opacity = '0';
        chevron.style.transform = 'rotate(0deg)';
    }
}

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
    updateFilterDot(); // ← added
    applyFilters();
}

function applyFilters() {
    const selectedType = document.getElementById('type-filter')?.value || 'all';
    const dateInput = document.getElementById('date-filter')?.value || '';
    const nameInput = document.getElementById('name-filter')?.value.toLowerCase().trim() || ''; // ← add
    const clearBtn = document.getElementById('clear-date-btn');
    const rows = document.querySelectorAll('.app-row');
    const noResults = document.getElementById('no-results');
    const countLabel = document.getElementById('app-count');
    let visibleCount = 0;

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

        // ← add name match
        let nameMatch = true;
        if (nameInput) {
            const nameCell = row.querySelector('td:nth-child(1) p:first-child');
            if (nameCell) {
                nameMatch = nameCell.textContent.toLowerCase().includes(nameInput);
            }
        }

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

        if (typeMatch && statusMatch && dateMatch && nameMatch) {
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

        const wrapper = document.getElementById('app-count-wrapper');
        if (wrapper) {
            wrapper.classList.remove('hidden');
            wrapper.classList.add('flex');
        }
    }

    updateFilterDot();
}
function updateFilterDot() {
    const dot = document.getElementById('filter-active-dot');
    const dateInput = document.getElementById('date-filter')?.value || '';
    const typeFilter = document.getElementById('type-filter')?.value || 'all';
    const hasActiveFilter = currentStatus !== 'all' || dateInput !== '' || typeFilter !== 'all';
    if (dot) {
        dot.classList.toggle('hidden', !hasActiveFilter);
    }
}

function resetAllFilters() {
    currentStatus = 'all';
    document.querySelectorAll('.status-btn').forEach(btn => {
        btn.classList.remove('bg-slate-800', 'text-white');
        btn.classList.add('bg-slate-100', 'text-slate-500');
    });
    const allBtn = document.getElementById('status-all');
    if (allBtn) {
        allBtn.classList.remove('bg-slate-100', 'text-slate-500');
        allBtn.classList.add('bg-slate-800', 'text-white');
    }

    const dateInput = document.getElementById('date-filter');
    if (dateInput) dateInput.value = '';

    const typeFilter = document.getElementById('type-filter');
    if (typeFilter) typeFilter.value = 'all';

    const clearBtn = document.getElementById('clear-date-btn');
    if (clearBtn) {
        clearBtn.classList.add('hidden');
        clearBtn.classList.remove('flex');
    }

    updateFilterDot();
    applyFilters();
}

function clearDateFilter() {
    const dateInput = document.getElementById('date-filter');
    const clearBtn = document.getElementById('clear-date-btn');
    if (dateInput) dateInput.value = '';
    if (clearBtn) {
        clearBtn.classList.add('hidden');
        clearBtn.classList.remove('flex');
    }
    updateFilterDot();
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

// ===== STAFF and RESIDENT AGE CALCULATION =====
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

document.addEventListener('DOMContentLoaded', function () {
    const bd = document.getElementById('staff_birthdate');
    if (bd && bd.value) calcStaffAge(bd.value);
});
function calculateAge() {
    const birthdateInput = document.getElementById('birth_date').value;
    const ageInput = document.getElementById('age');

    // Exit early if no date is picked
    if (!birthdateInput) return;

    const birthDate = new Date(birthdateInput);
    const today = new Date();

    // Calculate raw years difference
    let age = today.getFullYear() - birthDate.getFullYear();
    
    // Check if the birthday hasn't happened yet this calendar year
    const monthDifference = today.getMonth() - birthDate.getMonth();
    const dayDifference = today.getDate() - birthDate.getDate();

    if (monthDifference < 0 || (monthDifference === 0 && dayDifference < 0)) {
        age--;
    }

    // Pass the calculated age directly into the field
    ageInput.value = age >= 0 ? age : 0;
}


// ===== EDIT SERVICE TYPE MODAL =====
function toggleServiceForm() {
    const wrapper = document.getElementById('service-form-wrapper');
    const label = document.getElementById('service-btn-label');
    const isOpen = wrapper.style.opacity === '1';

    if (!isOpen) {
        wrapper.style.maxHeight = wrapper.scrollHeight + 'px';
        wrapper.style.opacity = '1';
        label.textContent = 'Close Form';
        setTimeout(() => wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' }), 100);
    } else {
        wrapper.style.maxHeight = '0';
        wrapper.style.opacity = '0';
        label.textContent = 'Add New Service Type';
    }
}
//edit services 
function openEditModal(service) {
    document.getElementById('edit_name').value = service.name;
    document.getElementById('edit_description').value = service.description ?? '';
    document.getElementById('edit_is_active').value = service.is_active ? '1' : '0';
    document.getElementById('editServiceForm').action = '/services/' + service.id;

    const modal = document.getElementById('editServiceModal');
    modal.style.display = 'flex';
}

function closeEditModal() {
    const modal = document.getElementById('editServiceModal');
    modal.style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('editServiceModal')?.addEventListener('click', function(e) {
        if (e.target === this) closeEditModal();
    });
});

function openEditResidentModal(id, firstName, middle_name, lastName, address, birthdate, age, gender, civilStatus) {
    document.getElementById('edit_first_name').value = firstName;
    document.getElementById('edit_middle_name').value = middle_name;
    document.getElementById('edit_last_name').value = lastName;
    document.getElementById('edit_address').value = address;
    document.getElementById('edit_birthdate').value = birthdate;
    document.getElementById('edit_age').value = age;
    document.getElementById('edit_civil_status').value = civilStatus;

    // Set gender radio
    document.querySelectorAll('.edit-gender-radio').forEach(radio => {
        radio.checked = radio.value === gender;
    });

    document.getElementById('editForm').action = '/residents/' + id;
    const modal = document.getElementById('editModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeEditResidentModal() {
    const modal = document.getElementById('editModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('editModal')?.addEventListener('click', function(e) {
        if (e.target === this) closeEditResidentModal();
    });
});

// ===== APPLICATION REJECTION LOGIC WITH QUICK REASONS =====
function openRejectModal(id) {
    const modal = document.getElementById('rejectModal');
    const form = document.getElementById('rejectForm');
    
    if (!modal) {
        console.error("Bug check: Could not find an HTML element with id='rejectModal'");
        return;
    }
    
    form.action = `/applications/${id}/reject`; 
    
    document.getElementById('final_rejection_reason').value = '';
    document.getElementById('custom_textarea').value = '';
    document.getElementById('customReasonWrapper').classList.add('hidden');
    
    resetButtonStyles();
    disableSubmitButton();

    modal.classList.remove('hidden');
}

function closeRejectModal() {
    document.getElementById('rejectModal').classList.add('hidden');
}

function selectReason(textReason, buttonElement) {
    resetButtonStyles();
    document.getElementById('customReasonWrapper').classList.add('hidden');
    
    buttonElement.classList.remove('bg-slate-50', 'border-transparent');
    buttonElement.classList.add('bg-blue-50', 'border-blue-500', 'text-blue-700');
    
    document.getElementById('final_rejection_reason').value = textReason;
    enableSubmitButton();
}

function selectCustomOption(buttonElement) {
    resetButtonStyles();
    
    buttonElement.classList.remove('bg-slate-50', 'border-transparent');
    buttonElement.classList.add('bg-blue-50', 'border-blue-500', 'text-blue-700');
    
    const wrapper = document.getElementById('customReasonWrapper');
    wrapper.classList.remove('hidden');
    
    const textarea = document.getElementById('custom_textarea');
    textarea.focus();
    
    updateCustomReasonValue();
}

function updateCustomReasonValue() {
    const typedText = document.getElementById('custom_textarea').value.trim();
    document.getElementById('final_rejection_reason').value = typedText;
    
    if (typedText.length > 0) {
        enableSubmitButton();
    } else {
        disableSubmitButton();
    }
}

function resetButtonStyles() {
    document.querySelectorAll('.reason-btn').forEach(btn => {
        btn.classList.remove('bg-blue-50', 'border-blue-500', 'text-blue-700');
        btn.classList.add('bg-slate-50', 'border-transparent', 'text-slate-700');
    });
}

function enableSubmitButton() {
    const btn = document.getElementById('submitRejectBtn');
    if (btn) {
        btn.disabled = false;
        btn.classList.remove('bg-slate-200', 'text-slate-400', 'cursor-not-allowed');
        btn.classList.add('bg-rose-600', 'text-white', 'shadow-lg', 'shadow-rose-200', 'hover:bg-rose-700');
    }
}

function disableSubmitButton() {
    const btn = document.getElementById('submitRejectBtn');
    if (btn) {
        btn.disabled = true;
        btn.classList.remove('bg-rose-600', 'text-white', 'shadow-lg', 'shadow-rose-200', 'hover:bg-rose-700');
        btn.classList.add('bg-slate-200', 'text-slate-400', 'cursor-not-allowed');
    }
}
function openAnnouncementModal() {
    const modal = document.getElementById('announcementModal');
    if(modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }
}

function closeAnnouncementModal() {
    const modal = document.getElementById('announcementModal');
    if(modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
}
function toggleResidentForm() {
    const wrapper = document.getElementById('resident-form-wrapper');
    const label = document.getElementById('resident-btn-label');
    const btn = document.getElementById('resident-trigger');
    const isOpen = wrapper.style.opacity === '1';

    if (!isOpen) {
        wrapper.style.maxHeight = wrapper.scrollHeight + 'px';
        wrapper.style.opacity = '1';
        setTimeout(() => wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' }), 100);
        label.textContent = 'Close Form';
        btn.classList.remove('bg-blue-700', 'hover:bg-blue-800', 'shadow-blue-200');
        btn.classList.add('bg-red-500', 'hover:bg-red-600', 'shadow-red-200');
    } else {
        wrapper.style.maxHeight = '0';
        wrapper.style.opacity = '0';
        label.textContent = 'Click Here to Add Resident';
        btn.classList.remove('bg-red-500', 'hover:bg-red-600', 'shadow-red-200');
        btn.classList.add('bg-blue-700', 'hover:bg-blue-800', 'shadow-blue-200');
    }
}
function toggleStaffForm() {
        const wrapper = document.getElementById('staff-form-wrapper');
        const label = document.getElementById('staff-btn-label');
        const btn = document.getElementById('staff-trigger');
        const isOpen = wrapper.style.opacity === '1';

        if (!isOpen) {
            wrapper.style.maxHeight = wrapper.scrollHeight + 'px';
            wrapper.style.opacity = '1';
            setTimeout(() => wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' }), 100);
            label.textContent = 'Close Form';
            btn.classList.remove('bg-blue-700', 'hover:bg-blue-800', 'shadow-blue-200');
            btn.classList.add('bg-red-500', 'hover:bg-red-600', 'shadow-red-200');
        } else {
            wrapper.style.maxHeight = '0';
            wrapper.style.opacity = '0';
            label.textContent = 'Add Staff Account';
            btn.classList.remove('bg-red-500', 'hover:bg-red-600', 'shadow-red-200');
            btn.classList.add('bg-blue-700', 'hover:bg-blue-800', 'shadow-blue-200');
        }
    }
    //live searching for resident
    function executeSearch() {
    const query = document.getElementById('table-search-input').value.toLowerCase().trim();
    const tableBody = document.getElementById('resident-tbody');
    const rows = Array.from(document.querySelectorAll('.resident-tr-row'));
    const counter = document.getElementById('search-results-counter');
    const emptyState = document.getElementById('search-empty-state');
    
    let matchesFound = 0;
    let scoredRows = [];

    rows.forEach(row => {
        // Safe check: find name text or fall back to the whole row's text content
        const nameElement = row.querySelector('.resident-fullname-text');
        const nameText = nameElement ? nameElement.textContent.toLowerCase().trim() : '';
        const fullRowText = row.textContent.toLowerCase();

        // Check if query matches anywhere in the row string context
        if (fullRowText.includes(query)) {
            row.style.display = ''; // Make matching row visible
            matchesFound++;

            let score = 0;
            if (query !== '') {
                if (nameText && nameText.startsWith(query)) {
                    score = 100; // Exact match priority
                } else {
                    const index = nameText.indexOf(query);
                    if (index !== -1) {
                        score = 50 - index; // Substring match priority
                    } else {
                        score = 10; // ID or Address match fallback
                    }
                }
            }
            scoredRows.push({ element: row, score: score });
        } else {
            row.style.display = 'none'; // Cleanly hide non-matching rows
            scoredRows.push({ element: row, score: -1 });
        }
    });

    // Handle element re-ordering if a search query exists
    if (query !== '') {
        scoredRows.sort((a, b) => b.score - a.score);
        scoredRows.forEach(item => {
            if (item.score !== -1 && tableBody) {
                tableBody.appendChild(item.element);
            }
        });

        if (counter) {
            counter.classList.remove('hidden');
            counter.innerHTML = `Showing results closest to <span class="text-blue-600 font-black">"${query}"</span> — ${matchesFound} found`;
        }
    } else {
        // Reset view state when input query is cleared out
        rows.forEach(row => {
            row.style.display = '';
            if (tableBody) tableBody.appendChild(row);
        });
        if (counter) counter.classList.add('hidden');
    }

    // Toggle empty state placeholder safely
    if (emptyState) {
        emptyState.style.display = (matchesFound === 0) ? '' : 'none';
    }
}
// CLEAR SEARCH INTERFACE FUNCTION
function clearSearchTable() {
    const input = document.getElementById('table-search-input');
    if (input) {
        input.value = ''; // Empty out the text bar field string
        executeSearch();  // Re-run search logic to unhide and restore all original rows
    }
}

// ===== EDIT OFFICIAL MODAL =====
function openOfficialEditModal(id, name, position, order) {
    document.getElementById('edit_official_name').value     = name;
    document.getElementById('edit_official_position').value = position;
    document.getElementById('edit_official_order').value    = order;
    document.getElementById('officialEditForm').action      = '/officials/' + id;

    const modal = document.getElementById('officialEditModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeOfficialEditModal() {
    const modal = document.getElementById('officialEditModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

document.getElementById('officialEditModal')?.addEventListener('click', function(e) {
    if (e.target === this) closeOfficialEditModal();
});
</script>
</body>
@endsection
</html>
