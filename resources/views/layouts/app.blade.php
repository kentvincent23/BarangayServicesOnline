<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Mankilam Online Services Portal</title>
    <link rel="icon" type="image/png" href="{{ asset('/images/LOGO.png') }}?v=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafc] min-h-screen pb-12">

{{-- NAVBAR --}}
<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-100 px-4 md:px-8">
    <div class="max-w-7xl mx-auto flex justify-between items-center h-16">

        {{-- Left: Logo --}}
        <a href="{{ url('/') }}" class="flex items-center gap-2.5 no-underline shrink-0">
            <img src="{{ asset('images/LOGO.png') }}" alt="Mankilam Logo"
                class="h-8 w-auto object-contain rounded-md">
            <div class="flex flex-col leading-tight">
                <span class="text-[9px] font-black uppercase tracking-widest text-blue-600">Barangay Mankilam</span>
                <span class="text-xs font-black text-slate-800 tracking-tight">Online Services Portal</span>
            </div>
        </a>

        {{-- Desktop Right --}}
        <div class="hidden md:flex items-center gap-2">
            @auth
                {{--  DESKTOP NOTIFICATION BELL --}}
                @if(Auth::user()->role !== 'staff')
                    <div class="relative mr-2">
                       <button type="button" onclick="toggleMobileSidebar()" class="p-2 text-slate-400 hover:text-blue-600 transition-colors relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            {{--  SMART DESKTOP RED DOT --}}
                            @php
                                $latestNotice = \App\Models\Announcement::latest()->first();
                                $latestReject = Auth::user()->applications->where('status', 'rejected')->sortByDesc('updated_at')->first();
                                $latestTime = max(
                                    $latestNotice ? $latestNotice->updated_at->timestamp : 0, 
                                    $latestReject ? $latestReject->updated_at->timestamp : 0
                                );
                            @endphp
                            @if(($latestNotice || $latestReject) && $latestTime > 0)
                                <span id="desktopDot" data-latest="{{ $latestTime }}" class="hidden absolute top-1.5 right-1.5 h-2 w-2 bg-rose-500 rounded-full ring-2 ring-white"></span>
                            @endif
                        </button>
                    </div>
                @endif

                <div class="flex flex-col items-end mr-2">
                    <span class="text-[10px] font-black uppercase tracking-widest {{ Auth::user()->role === 'staff' ? 'text-amber-500' : 'text-slate-400' }}">
                        {{ Auth::user()->role === 'staff' ? 'Admin' : 'Resident' }}
                    </span>
                    <span class="text-sm font-bold text-slate-700">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 bg-red-50 text-red-600 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-red-600 hover:text-white transition-all">
                        Logout
                    </button>
                </form>
            @else
               <nav class="flex items-center gap-1 p-1.5">
                    <a href="#about" class="group relative px-4 py-2 text-[11px] font-black uppercase tracking-wider text-slate-500 hover:text-blue-600 transition-all">
                        <span class="relative z-10">About Us</span>
                        <div class="absolute inset-0 bg-white rounded-xl scale-90 opacity-0 group-hover:scale-100 group-hover:opacity-100 shadow-sm transition-all duration-200"></div>
                    </a>
                    <a href="#officials" class="group relative px-4 py-2 text-[11px] font-black uppercase tracking-wider text-slate-500 hover:text-blue-600 transition-all">
                        <span class="relative z-10">Officials</span>
                        <div class="absolute inset-0 bg-white rounded-xl scale-90 opacity-0 group-hover:scale-100 group-hover:opacity-100 shadow-sm transition-all duration-200"></div>
                    </a>
                    <a href="#foundation" class="group relative px-4 py-2 text-[11px] font-black uppercase tracking-wider text-slate-500 hover:text-blue-600 transition-all">
                        <span class="relative z-10">Foundation</span>
                        <div class="absolute inset-0 bg-white rounded-xl scale-90 opacity-0 group-hover:scale-100 group-hover:opacity-100 shadow-sm transition-all duration-200"></div>
                    </a>
                    <a href="#services" class="group relative px-4 py-2 text-[11px] font-black uppercase tracking-wider text-slate-500 hover:text-blue-600 transition-all">
                        <span class="relative z-10">Services</span>
                        <div class="absolute inset-0 bg-white rounded-xl scale-90 opacity-0 group-hover:scale-100 group-hover:opacity-100 shadow-sm transition-all duration-200"></div>
                    </a>
                    <a href="#howitworks" class="group relative px-4 py-2 text-[11px] font-black uppercase tracking-wider text-slate-500 hover:text-blue-600 transition-all">
                        <span class="relative z-10">How it works</span>
                        <div class="absolute inset-0 bg-white rounded-xl scale-90 opacity-0 group-hover:scale-100 group-hover:opacity-100 shadow-sm transition-all duration-200"></div>
                    </a>
                </nav>
            @endauth
        </div>

        {{-- Mobile Right Layout Section --}}
        <div class="flex md:hidden items-center gap-1">
            {{--  MOBILE NOTIFICATION BELL: Appears right on the left side of hamburger button --}}
            @auth
                @if(Auth::user()->role !== 'staff')
                    <div class="relative">
                        <button type="button" onclick="toggleMobileSidebar()" class="p-2 text-slate-400 hover:text-slate-600 transition-colors relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            {{--  SMART MOBILE RED DOT --}}
                            @if(($latestNotice || $latestReject) && $latestTime > 0)
                                <span id="mobileDot" data-latest="{{ $latestTime }}" class="hidden absolute top-2 right-2 h-2 w-2 bg-rose-500 rounded-full ring-2 ring-white"></span>
                            @endif
                        </button>
                    </div>
                @endif
            @endauth

            {{-- Hamburger Action Button --}}
            <button id="burger-btn" onclick="toggleMenu()"
                class="p-2 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all">
                <svg id="burger-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Dropdown Menu --}}
    <div id="mobile-menu"
        class="md:hidden overflow-hidden transition-all duration-300 ease-in-out"
        style="max-height: 0; opacity: 0;">
        <div class="pb-4 pt-1 flex flex-col gap-1 border-t border-slate-100 mt-1">

            @auth
                {{-- User Info --}}
                <div class="flex items-center gap-3 px-4 py-3 mb-1 bg-slate-50 rounded-xl mx-1">
                    <div class="w-9 h-9 bg-blue-100 rounded-xl flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[9px] font-black uppercase tracking-widest {{ Auth::user()->role === 'staff' ? 'text-amber-500' : 'text-slate-400' }}">
                            {{ Auth::user()->role === 'staff' ? 'Admin' : 'Resident' }}
                        </p>
                        <p class="text-sm font-bold text-slate-700">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                    </div>
                </div>


                <a href="#services"
                    class="flex items-center gap-2 px-4 py-3 text-sm font-semibold text-slate-600 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Available Services
                </a>

                {{-- Logout --}}
                <form action="{{ route('logout') }}" method="POST" class="mx-1">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-2 px-4 py-3 text-sm font-bold text-red-600 bg-red-50 hover:bg-red-600 hover:text-white rounded-xl transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            @else
                {{-- Guest Links --}}
                <a href="#about" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-slate-600 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all group">
                    <div class="w-8 h-8 bg-slate-100 group-hover:bg-blue-100 rounded-xl flex items-center justify-center shrink-0 transition-all"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" /></svg></div>
                    <span>About Us</span>
                </a>
                <a href="#officials" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-slate-600 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all group">
                    <div class="w-8 h-8 bg-slate-100 group-hover:bg-blue-100 rounded-xl flex items-center justify-center shrink-0 transition-all"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" /></svg></div>
                    <span>Officials</span>
                </a>
                <a href="#foundation" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-slate-600 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all group">
                    <div class="w-8 h-8 bg-slate-100 group-hover:bg-blue-100 rounded-xl flex items-center justify-center shrink-0 transition-all"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg></div>
                    <span>Foundation</span>
                </a>
                <a href="#services" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-slate-600 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all group">
                    <div class="w-8 h-8 bg-slate-100 group-hover:bg-blue-100 rounded-xl flex items-center justify-center shrink-0 transition-all"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg></div>
                    <span>Services</span>
                </a>
                <a href="#howitworks" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-slate-600 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all group">
                    <div class="w-8 h-8 bg-slate-100 group-hover:bg-blue-100 rounded-xl flex items-center justify-center shrink-0 transition-all"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg></div>
                    <span>How it Works</span>
                </a>
            @endauth
        </div>
    </div>
</nav>

{{-- MAIN CONTENT --}}
@yield('content')

{{-- PREMIUM GLASSMORPHIC MOBILE NOTIFICATION CENTER DRAWER --}}
@auth
    @if(Auth::user()->role !== 'staff')
        <div id="mobileSidebar" class="fixed inset-0 z-[100] hidden">
            {{-- Dark Soft Blurred Backdrop --}}
            <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-md transition-opacity duration-300" onclick="toggleMobileSidebar()"></div>
            
            {{-- Sliding Panel Sheet Canvas --}}
            <div class="fixed right-0 top-0 bottom-0 w-[88%] max-w-sm bg-white/95 backdrop-blur-xl shadow-2xl p-6 flex flex-col justify-between border-l border-slate-100 transition-transform duration-300 transform">
                
                <div>
                    {{-- Header Group --}}
                    <div class="flex items-center justify-between pb-5 border-b border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center border border-blue-100/50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-black text-slate-800 tracking-tight">Notification Center</h3>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Updates for {{ Auth::user()->first_name }}</p>
                            </div>
                        </div>
                        <button type="button" onclick="toggleMobileSidebar()" class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-50 rounded-xl transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

{{-- MOBILE SIDEBAR NOTIFICATIONS WRAPPER GROUP --}}
<div class="mt-6">
    <div class="space-y-4 max-h-[62vh] overflow-y-auto pr-1">
        
        @php
            // 1. Fetch both data sets
            $announcements = \App\Models\Announcement::latest()->take(10)->get();
            $rejectedApps = Auth::user()->applications->where('status', 'rejected');

            // 2. Wrap them up into a single unified timeline collection sorted by their updated time
            $timelineFeed = collect()
                ->merge($announcements)
                ->merge($rejectedApps)
                ->sortByDesc('updated_at');
        @endphp

        @if($timelineFeed->count() > 0)
            @foreach($timelineFeed as $item)
                
                {{--  TYPE A: IF THE TIMELINE ITEM IS AN ANNOUNCEMENT --}}
                @if($item instanceof \App\Models\Announcement)
                    @php
                        $typeStyles = [
                            'info' => ['border' => 'border-blue-100', 'bg' => 'bg-blue-50/40', 'badge' => 'bg-blue-50 text-blue-700', 'label' => 'General Notice'],
                            'warning' => ['border' => 'border-amber-100', 'bg' => 'bg-amber-50/40', 'badge' => 'bg-amber-50 text-amber-700', 'label' => 'Urgent Warning'],
                            'success' => ['border' => 'border-emerald-100', 'bg' => 'bg-emerald-50/40', 'badge' => 'bg-emerald-50 text-emerald-700', 'label' => 'Community Update']
                        ][$item->type] ?? ['border' => 'border-slate-100', 'bg' => 'bg-slate-50/40', 'badge' => 'bg-slate-50 text-slate-700', 'label' => 'Notice'];
                    @endphp

                    <div class="bg-white border {{ $typeStyles['border'] }} rounded-[2rem] p-4 shadow-sm relative overflow-hidden transition-all hover:shadow-md">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[9px] font-black uppercase tracking-wider px-2.5 py-0.5 {{ $typeStyles['badge'] }} rounded-lg">
                                 {{ $typeStyles['label'] }}
                            </span>
                            <span class="text-[9px] font-medium text-slate-400">
                                {{ $item->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <div class="space-y-1">
                            <h4 class="text-xs font-black text-slate-800 tracking-tight leading-snug">{{ $item->title }}</h4>
                            <p class="text-[11px] font-bold text-slate-600 leading-relaxed">{{ $item->content }}</p>
                        </div>
                    </div>

                {{--  TYPE B: IF THE TIMELINE ITEM IS A REJECTED APPLICATION --}}
                @else
                    <div class="group relative bg-slate-50/60 hover:bg-rose-50/20 rounded-[2rem] p-5 border border-slate-100 hover:border-rose-100 transition-all duration-300 shadow-sm hover:shadow-md">
                        <div class="flex items-start justify-between gap-2 mb-2">
                            <div class="space-y-0.5">
                                <span class="text-[9px] font-black uppercase tracking-widest text-slate-400 group-hover:text-rose-500 transition-colors">Document Request</span>
                                <h4 class="text-xs font-black text-slate-800 capitalize tracking-tight">“{{ $item->purpose }}”</h4>
                            </div>
                            <span class="text-[9px] font-black uppercase tracking-wider px-2.5 py-1 bg-rose-50 text-rose-600 rounded-xl border border-rose-100/50 shrink-0">
                                Rejected
                            </span>
                        </div>
                        
                        <div class="bg-white/90 border border-slate-100 rounded-2xl p-3.5 mt-3 shadow-inner">
                            <p class="text-[10px] font-black text-rose-600 uppercase tracking-wider mb-1 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                Remarks from Staff:
                            </p>
                            <p class="text-[11px] font-bold text-slate-600 leading-relaxed">
                                {{ $item->rejection_reason ?? 'Incomplete application details or illegible attachments.' }}
                            </p>
                        </div>

                        <div class="flex items-center justify-end gap-1 mt-3 text-slate-400 group-hover:text-rose-400 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-[9px] font-black uppercase tracking-wider">
                                {{ $item->updated_at ? $item->updated_at->diffForHumans() : 'Just now' }}
                            </span>
                        </div>
                    </div>
                @endif

            @endforeach
        @else
            {{-- Global Empty State --}}
            <div class="text-center py-12 px-4 bg-slate-50/50 rounded-[2.5rem] border border-dashed border-slate-200/80 flex flex-col items-center justify-center space-y-3">
                <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-slate-300 shadow-sm border border-slate-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                </div>
                <div class="space-y-0.5">
                    <p class="text-xs font-black text-slate-700 tracking-tight">All caught up!</p>
                    <p class="text-[10px] font-bold text-slate-400 max-w-[180px] leading-normal mx-auto">No current bulletins or transaction notes found.</p>
                </div>
            </div>
        @endif

    </div>
</div>
                </div>

                {{-- Footer Info & Action Controls --}}
                <div class="pt-4 border-t border-slate-100 bg-white/50">
                    <div class="bg-blue-50/50 rounded-2xl p-3.5 mb-4 border border-blue-100/30 flex items-start gap-3">
                        <div class="text-blue-600 mt-0.5 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-[10px] font-bold text-blue-800 leading-normal">
                            Need help fixing a rejected file? Review the staff remarks above, adjust your files, and submit a new request anytime.
                        </p>
                         </div>
        </div>
            </div>
        </div>
    @endif
@endauth
<button id="scroll-top-btn" onclick="window.scrollTo({top:0, behavior:'smooth'})"
    {{--Combined translateX(-50%) with the animated translateY(20px) --}}
    style="opacity: 0; transform: translateX(-50%) translateY(20px); transition: all 0.3s ease; pointer-events: none;"
    {{-- Removed -translate-x-1/2 from class list to prevent styling conflicts --}}
    class="fixed bottom-16 left-1/2 mountaineer z-50 w-11 h-11 bg-blue-700 hover:bg-blue-800 text-white rounded-2xl shadow-xl shadow-blue-200 flex items-center justify-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7" />
    </svg>
</button>

{{-- TOASTS --}}
@if($errors->any())
    <div id="flash-toast" style="position:fixed; bottom:2rem; left:50%; transform:translateX(-50%); max-width: calc(100vw - 2rem);"
        class="z-50 bg-red-600 text-white text-sm font-bold px-6 py-4 rounded-2xl shadow-xl flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
        </svg>
        {{ $errors->first() }}
    </div>
    <script>setTimeout(() => document.getElementById('flash-toast')?.remove(), 4000);</script>
@endif

@if(session('success'))
    <div id="flash-toast" style="position:fixed; bottom:2rem; left:50%; transform:translateX(-50%); max-width: calc(100vw - 2rem);"
        class="z-50 bg-slate-800 text-white text-sm font-bold px-6 py-4 rounded-2xl shadow-xl">
        {{ session('success') }}
    </div>
    <script>setTimeout(() => document.getElementById('flash-toast')?.remove(), 4000);</script>
@endif

@stack('scripts')
<script>
    function toggleMenu() {
        const menu = document.getElementById('mobile-menu');
        const burger = document.getElementById('burger-icon');
        const close = document.getElementById('close-icon');
        const isOpen = menu.style.maxHeight !== '0px' && menu.style.maxHeight !== '';

        if (!isOpen) {
            menu.style.maxHeight = menu.scrollHeight + 'px';
            menu.style.opacity = '1';
            burger.classList.add('hidden');
            close.classList.remove('hidden');
        } else {
            menu.style.maxHeight = '0';
            menu.style.opacity = '0';
            burger.classList.remove('hidden');
            close.classList.add('hidden');
        }
    }

    // 🚀 CONTROL SLIDER PANEL
  function toggleMobileSidebar() {
    const sidebar = document.getElementById('mobileSidebar');
    if (sidebar) {
        if (sidebar.classList.contains('hidden')) {
            sidebar.classList.remove('hidden');
            sidebar.classList.add('flex');
            document.body.style.overflow = 'hidden';
            
            // 💡 When opened, clear the dots and save the current timestamp as read
            const desktopDot = document.getElementById('desktopDot');
            const mobileDot = document.getElementById('mobileDot');
            
            if (desktopDot || mobileDot) {
                const currentLatestTime = (desktopDot || mobileDot).getAttribute('data-latest');
                localStorage.setItem('mankilam_last_read_notice', currentLatestTime);
                
                if(desktopDot) desktopDot.classList.add('hidden');
                if(mobileDot) mobileDot.classList.add('hidden');
            }
        } else {
            sidebar.classList.remove('flex');
            sidebar.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }
}
        document.addEventListener("DOMContentLoaded", function() {
            const desktopDot = document.getElementById('desktopDot');
            const mobileDot = document.getElementById('mobileDot');
            
            if (desktopDot || mobileDot) {
                const currentLatestTime = (desktopDot || mobileDot).getAttribute('data-latest');
                const lastReadTime = localStorage.getItem('mankilam_last_read_notice');
                
                // If the database has a newer timestamp than what the browser saved, show the red dot!
                if (!lastReadTime || parseInt(currentLatestTime) > parseInt(lastReadTime)) {
                    if(desktopDot) desktopDot.classList.remove('hidden');
                    if(mobileDot) mobileDot.classList.remove('hidden');
                }
            }
        });

window.addEventListener('scroll', function() {
    const btn = document.getElementById('scroll-top-btn');
    if (!btn) return;

    if (window.scrollY > 250) {
        // Keep it perfectly centered at -50% while lifting it up to its natural resting state
        btn.style.opacity = "1";
        btn.style.transform = "translateX(-50%) translateY(0px)";
        btn.style.pointerEvents = "auto";
    } else {
        // Push it down and hide it
        btn.style.opacity = "0";
        btn.style.transform = "translateX(-50%) translateY(20px)";
        btn.style.pointerEvents = "none";
    }
});
//title scrolling text 
(function() {
  var title = "Barangay Mankilam Online Services Portal ";
  var pos = 0;
  setInterval(function() {
    document.title = title.substring(pos) + title.substring(0, pos);
    pos = (pos + 1) % title.length;
  }, 250);
})();
    </script>

</body>
</html>