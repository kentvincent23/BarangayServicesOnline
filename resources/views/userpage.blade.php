@extends('layouts.app')

@section('content')

<style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
</style>

{{-- HERO BANNER --}}
<div class="relative bg-blue-50 border-b border-blue-100 overflow-hidden">
    <div class="absolute inset-0 opacity-40"
        style="background-image: radial-gradient(#93c5fd 1px, transparent 1px); background-size: 26px 26px;"></div>
    <div class="absolute -top-10 -left-10 w-48 h-48 bg-blue-200 rounded-full opacity-20 pointer-events-none"></div>
    <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-blue-300 rounded-full opacity-10 pointer-events-none"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-10 sm:py-14 text-center">
        <div class="inline-flex items-center gap-2 bg-white border border-blue-200 text-blue-700 text-[10px] sm:text-[11px] font-black uppercase tracking-widest px-4 py-1.5 rounded-full mb-4 shadow-sm">
            <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
            Barangay Mankilam · Online Services
        </div>
        <h1 class="text-2xl sm:text-4xl md:text-5xl font-black text-slate-900 tracking-tight leading-tight mb-3">
            Request a <span class="text-blue-700">Document</span>
        </h1>
        <p class="text-slate-500 text-xs sm:text-base font-medium max-w-sm mx-auto leading-relaxed">
            Submit your details and we'll process your barangay document request.
        </p>
    </div>
</div>

{{-- MAIN --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-8 sm:py-10">
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 lg:gap-10">

        {{-- LEFT: Form + Applications --}}
        <div class="lg:col-span-3 w-full min-w-0 order-1">

            {{-- Toggle Button --}}
            <div class="flex justify-center mb-6">
                <button id="request-trigger" onclick="toggleForm()"
                    class="flex items-center gap-2.5 bg-blue-700 hover:bg-blue-800 text-white px-6 sm:px-8 py-3.5 sm:py-4 rounded-2xl font-black uppercase tracking-[0.15em] text-[11px] shadow-xl shadow-blue-200 transition-all active:scale-95 w-full sm:w-auto justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span id="btn-label">Click Here to Request a Service</span>
                </button>
            </div>

            {{-- Collapsible Form --}}
            <div id="form-wrapper" style="max-height:0; overflow:hidden; transition: max-height 0.6s cubic-bezier(0.16,1,0.3,1), opacity 0.4s ease; opacity:0;">
                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl shadow-slate-100 border border-slate-100 overflow-hidden mb-6">

                    {{-- Form Header --}}
                    <div class="bg-blue-700 px-5 sm:px-7 py-4 sm:py-5 flex items-center gap-3">
                        <div class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-black text-white text-sm">New Document Request</p>
                            <p class="text-[11px] text-blue-200">Fill in your details to submit</p>
                        </div>
                    </div>

                    <div class="p-5 sm:p-7">
                        <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 sm:space-y-5">
                            @csrf

                            @if($errors->any() && !$errors->has('not_resident'))
                                <div class="bg-red-50 border border-red-200 text-red-700 text-xs sm:text-sm font-semibold px-4 py-3 rounded-xl flex items-center gap-2">
                                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                                    </svg>
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            {{-- Name Fields --}}
                            <div class="grid grid-cols-1 sm:grid-cols-5 gap-3">
                                <div class="sm:col-span-2 space-y-1.5">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">First Name</label>
                                    <input type="text" name="first_name" value="{{ old('first_name', Auth::user()->first_name ?? '') }}"
                                        class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent font-semibold text-sm transition-all" required>
                                </div>
                                <div class="sm:col-span-1 space-y-1.5">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">M.N.</label>
                                    <input type="text" name="middle_name" value="{{ old('middle_name', Auth::user()->middle_name ?? '') }}"
                                        class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent font-semibold text-sm transition-all">
                                </div>
                                <div class="sm:col-span-2 space-y-1.5">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Last Name</label>
                                    <input type="text" name="last_name" value="{{ old('last_name', Auth::user()->last_name ?? '') }}"
                                        class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent font-semibold text-sm transition-all" required>
                                </div>
                            </div>

                            {{-- Age + Civil Status --}}
                            <div class="grid grid-cols-2 gap-3">
    <div class="space-y-1.5">
        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Age</label>
        <input type="number" name="age" value="{{ old('age', Auth::user()->age ?? '') }}"
            class="w-full px-3 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all" required>
    </div>
    <div class="space-y-1.5">
        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Civil Status</label>
        <div class="relative">
            <select name="civil_status" required
                class="w-full px-3 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-slate-700 appearance-none cursor-pointer text-sm transition-all">
                <option value="" disabled {{ old('civil_status', Auth::user()->civil_status ?? '') == '' ? 'selected' : '' }}>Select</option>
                @foreach(['Single', 'Married', 'Widowed', 'Separated'] as $status)
                    <option value="{{ $status }}" {{ old('civil_status', Auth::user()->civil_status ?? '') == $status ? 'selected' : '' }}>{{ $status }}</option>
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

{{-- Gender --}}
<div class="space-y-1.5">
    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Gender</label>
    <div class="grid grid-cols-2 gap-2">
        @foreach(['Male', 'Female'] as $gender)
        <label class="relative cursor-pointer">
            <input type="radio" name="gender" value="{{ $gender }}"
                {{ old('gender', Auth::user()->gender ?? '') == $gender ? 'checked' : '' }}
                class="peer sr-only" required>
            <div class="flex items-center justify-center gap-2 px-3 py-3 bg-slate-50 border border-slate-100 rounded-xl text-[11px] font-black text-slate-500 uppercase tracking-wider transition-all peer-checked:bg-blue-700 peer-checked:border-blue-700 peer-checked:text-white hover:border-blue-300 hover:bg-blue-50">
                @if($gender === 'Male')
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                @else
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                @endif
                {{ $gender }}
            </div>
        </label>
        @endforeach
    </div>
</div>

                            {{-- Service + Purpose --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                                <div class="space-y-1.5">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Service Type</label>
                                    <div class="relative">
                                        <select name="service_type_id" required
                                            class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-slate-700 appearance-none cursor-pointer text-sm transition-all">
                                            <option value="" disabled selected>Select a Service</option>
                                            @foreach($serviceTypes as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-400">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-1.5">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Purpose</label>
                                    <input type="text" name="purpose" value="{{ old('purpose') }}" placeholder="e.g. Job Application"
                                        class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm placeholder:text-slate-400 placeholder:font-normal transition-all" required>
                                </div>
                            </div>

                            {{-- Notes --}}
                            <div class="space-y-1.5">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">
                                    Notes <span class="normal-case font-medium text-slate-300">(Optional)</span>
                                </label>
                                <textarea name="notes" rows="3"
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold resize-none text-sm transition-all">{{ old('notes') }}</textarea>
                            </div>

                            {{-- ID Upload --}}
                            <div class="p-4 bg-blue-50 rounded-2xl border-2 border-dashed border-blue-200">
                                <label class="text-[10px] font-black text-blue-600 uppercase tracking-widest flex items-center gap-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    Attach Valid ID for Verification
                                </label>
                                <input type="file" name="id_image" required
                                    class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer">
                                <p class="text-[10px] text-blue-400 mt-1.5 italic font-medium">*Used for verification only — deleted after processing.</p>
                            </div>

                            {{-- Submit --}}
                            <button type="submit"
                                class="w-full bg-blue-700 hover:bg-blue-800 text-white py-4 rounded-2xl font-black uppercase tracking-[0.15em] text-xs transition-all shadow-xl shadow-blue-100 active:scale-95 flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                                Submit Request
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- MY APPLICATIONS --}}
            @php $myApps = Auth::user()->applications()->latest()->get(); @endphp
            @if($myApps->count())
            <div x-data="{ filter: 'all' }">

                {{-- Section Header --}}
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 bg-blue-700 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-black text-slate-900 text-sm sm:text-base">My Applications</h2>
                        <p class="text-[11px] text-slate-400">Track your document requests</p>
                    </div>
                </div>

                <div class="w-full mb-4">
    {{--  FILTER CONTROL ROW --}}
    <div class="flex items-center justify-between mb-3">
        <h3 class="text-xs font-black uppercase tracking-widest text-slate-400">Applications Management</h3>
        
        {{-- Premium Toggle Button with native onclick trigger --}}
        <button type="button" id="filter-toggle-btn" onclick="toggleFilterTray()"
            class="bg-white border-slate-200 text-slate-600 hover:bg-slate-50 flex items-center gap-2 px-3.5 py-2 border rounded-xl text-xs font-black uppercase tracking-wider transition-all duration-300 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" id="filter-icon-svg"
                class="h-4 w-4 text-slate-400 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
            </svg>
            <span>Filter Status</span>
            <span id="filter-count-badge" class="ml-1 px-1.5 py-0.5 text-[10px] bg-slate-100 rounded-md font-bold text-slate-500 transition-colors duration-300">
                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
</svg>
</span>
            </span>
        </button>
    </div>

    {{-- COLLAPSIBLE SLIDE-DOWN TRAY (Managed by CSS transition rules) --}}
    <div id="filter-tray" 
        style="max-height: 0px; opacity: 0;"
        class="bg-slate-50/50 border border-slate-100 rounded-2xl p-0 overflow-hidden transition-all duration-300 ease-in-out">
        
        {{-- Inner padding wrapper to prevent layout jerking during animation --}}
        <div class="p-3">
            <div class="flex items-center gap-2 overflow-x-auto pb-1 sm:pb-0 sm:flex-wrap scrollbar-hide">
                @foreach([
                    ['key'=>'all',             'label'=>'All',        'dot'=>'bg-slate-400',   'active'=>'bg-slate-100 border-slate-400 text-slate-700'],
                    ['key'=>'pending',         'label'=>'Pending',    'dot'=>'bg-yellow-500',  'active'=>'bg-yellow-50 border-yellow-500 text-yellow-800'],
                    ['key'=>'approved',        'label'=>'Approved',   'dot'=>'bg-blue-500',    'active'=>'bg-blue-50 border-blue-500 text-blue-800'],
                    ['key'=>'processing',      'label'=>'Processing', 'dot'=>'bg-violet-500',  'active'=>'bg-violet-50 border-violet-500 text-violet-800'],
                    ['key'=>'ready_to_pickup','label'=>'Ready',      'dot'=>'bg-emerald-500', 'active'=>'bg-emerald-50 border-emerald-500 text-emerald-800'],
                    ['key'=>'released',        'label'=>'Released',   'dot'=>'bg-violet-500',  'active'=>'bg-violet-50 border-violet-500 text-violet-800'],
                    ['key'=>'rejected',        'label'=>'Rejected',   'dot'=>'bg-red-500',     'active'=>'bg-red-50 border-red-500 text-red-800'],
                    ['key'=>'missed',          'label'=>'Unclaimed',  'dot'=>'bg-slate-400',   'active'=>'bg-slate-100 border-slate-400 text-slate-700'],
                ] as $f)
                <button @click="filter = '{{ $f['key'] }}'"
                    :class="filter === '{{ $f['key'] }}' ? '{{ $f['active'] }}' : 'bg-white border-slate-200 text-slate-500 hover:bg-slate-50'"
                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-[11px] font-bold whitespace-nowrap transition-all shrink-0 shadow-sm cursor-pointer">
                    <span class="w-1.5 h-1.5 rounded-full {{ $f['dot'] }} shrink-0"></span>
                    {{ $f['label'] }}
                </button>
                @endforeach
            </div>
        </div>
    </div>
</div>
                {{-- Application Cards --}}
                <div class="space-y-2.5">
                    @foreach($myApps as $app)
                    <div x-show="filter === 'all' || filter === '{{ $app->status }}'"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="bg-white rounded-2xl px-4 py-3.5 border border-slate-100 shadow-sm hover:shadow-md hover:border-blue-100 transition-all">

                        {{-- Top row --}}
                        <div class="flex items-start justify-between gap-2">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <div class="w-8 h-8 bg-blue-50 rounded-xl flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <p class="font-black text-slate-900 text-sm leading-tight truncate">{{ $app->serviceType->name }}</p>
                            </div>
                            <div class="shrink-0">
                                @if($app->status === 'pending')
                                    <span class="px-2.5 py-1 rounded-lg text-[9px] font-black uppercase tracking-wider bg-amber-50 text-amber-600 border border-amber-200 whitespace-nowrap">Pending</span>
                                @elseif($app->status === 'processing')
                                    <span class="px-2.5 py-1 rounded-lg text-[9px] font-black uppercase tracking-wider bg-violet-50 text-violet-600 border border-violet-200 whitespace-nowrap">Processing</span>
                                @elseif($app->status === 'approved')
                                    <span class="px-2.5 py-1 rounded-lg text-[9px] font-black uppercase tracking-wider bg-blue-50 text-blue-600 border border-blue-200 whitespace-nowrap">Approved</span>
                                @elseif($app->status === 'ready_to_pickup')
                                    <span class="px-2.5 py-1 rounded-lg text-[9px] font-black uppercase tracking-wider bg-emerald-50 text-emerald-600 border border-emerald-200 animate-pulse whitespace-nowrap">Ready to Pick Up</span>
                                @elseif($app->status === 'released')
                                    <span class="px-2.5 py-1 rounded-lg text-[9px] font-black uppercase tracking-wider bg-violet-50 text-violet-600 border border-violet-200 whitespace-nowrap">Released</span>
                                @elseif($app->status === 'rejected')
                                    <span class="px-2.5 py-1 rounded-lg text-[9px] font-black uppercase tracking-wider bg-red-50 text-red-600 border border-red-200 whitespace-nowrap">Rejected</span>
                                @elseif($app->status === 'missed')
                                    <span class="px-2.5 py-1 rounded-lg text-[9px] font-black uppercase tracking-wider bg-slate-50 text-slate-500 border border-slate-200 whitespace-nowrap">Unclaimed</span>
                                @endif
                            </div>
                        </div>

                        {{-- Bottom info --}}
                        <div class="mt-2 pl-10">
                            <p class="text-[11px] text-slate-400 italic truncate">"{{ $app->purpose }}"</p>
                            <p class="text-[10px] text-slate-300 mt-0.5 font-medium">{{ $app->created_at->format('M d, Y h:i A') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        {{-- RIGHT: Available Services --}}
        <div class="lg:col-span-2 order-2" id="services">
            <div class="lg:sticky lg:top-24">
                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl shadow-slate-100 border border-slate-100 overflow-hidden">

                    {{-- Blue Header --}}
                    <div class="bg-blue-700 px-5 sm:px-6 py-4 sm:py-5 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 6.75h7.5M8.25 12h7.5m-7.5 5.25h7.5"/>
                            </svg>
                            <span class="text-[11px] font-black text-blue-100 uppercase tracking-widest">Available Services</span>
                        </div>
                        <span class="text-[10px] font-black text-blue-700 bg-white px-2.5 py-0.5 rounded-full">
                            {{ $serviceTypes->count() }} {{ Str::plural('service', $serviceTypes->count()) }}
                        </span>
                    </div>

                    {{-- Services List --}}
                    <div class="p-3 sm:p-4 flex flex-col gap-2">
                        @forelse($serviceTypes as $service)
                        <div class="group flex items-start gap-3 p-3.5 sm:p-4 rounded-2xl bg-slate-50 hover:bg-blue-50 border border-slate-100 hover:border-blue-200 transition-all duration-200">
                            <div class="w-9 h-9 rounded-xl bg-white group-hover:bg-blue-700 border border-slate-100 group-hover:border-blue-700 flex items-center justify-center shrink-0 transition-all duration-200">
                                <svg class="w-4 h-4 text-blue-600 group-hover:text-white transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-black text-slate-800 group-hover:text-blue-900 transition-colors leading-tight">{{ $service->name }}</p>
                                <p class="text-xs text-slate-400 mt-0.5 leading-relaxed">{{ $service->description ?? 'No description provided.' }}</p>
                            </div>
                        </div>
                        @empty
                        <div class="py-10 text-center">
                            <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-slate-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                </svg>
                            </div>
                            <p class="text-slate-300 text-xs font-medium italic">No services available.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
   function toggleForm() {
    const wrapper = document.getElementById('form-wrapper');
    const label = document.getElementById('btn-label');
    const btn = document.getElementById('request-trigger');
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
        label.textContent = 'Click Here to Request a Service';
        btn.classList.remove('bg-red-500', 'hover:bg-red-600', 'shadow-red-200');
        btn.classList.add('bg-blue-700', 'hover:bg-blue-800', 'shadow-blue-200');
    }
}
function toggleFilterTray() {
    const tray = document.getElementById('filter-tray');
    const icon = document.getElementById('filter-icon-svg');
    const button = document.getElementById('filter-toggle-btn');
    const badge = document.getElementById('filter-count-badge');
    
    // Check if the tray container is currently collapsed
    const isCollapsed = tray.style.maxHeight === '0px' || tray.style.maxHeight === '';

    if (isCollapsed) {
        //  Open Tray: Calculate natural inner height dynamically for a smooth transition
        tray.style.maxHeight = tray.scrollHeight + 'px';
        tray.style.opacity = '1';
        
        // Transform button colors to active blue styles
        button.classList.replace('bg-white', 'bg-blue-50/50');
        button.classList.replace('border-slate-200', 'border-blue-200');
        button.classList.replace('text-slate-600', 'text-blue-600');
        
        badge.classList.replace('bg-slate-100', 'bg-blue-500');
        badge.classList.replace('text-slate-500', 'text-white');
        
        // Rotate the filter SVG icon 180 degrees
        icon.classList.add('rotate-180', 'text-blue-500');
    } else {
        // Close Tray: Reset properties back to hidden defaults
        tray.style.maxHeight = '0px';
        tray.style.opacity = '0';
        
        button.classList.replace('bg-blue-50/50', 'bg-white');
        button.classList.replace('border-blue-200', 'border-slate-200');
        button.classList.replace('text-blue-600', 'text-slate-600');
        
        badge.classList.replace('bg-blue-500', 'bg-slate-100');
        badge.classList.replace('text-white', 'text-slate-500');
        
        icon.classList.remove('rotate-180', 'text-blue-500');
    }
}
</script>

@endsection