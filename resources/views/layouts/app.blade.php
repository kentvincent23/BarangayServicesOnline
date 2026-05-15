<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Mankilam Online Services Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafc] min-h-screen pb-12">

{{-- NAVBAR --}}
<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-100 px-4 md:px-8">
    <div class="max-w-7xl mx-auto flex justify-between items-center h-16">

        {{-- Left: Logo --}}
        <a href="{{ url('/') }}" class="flex items-center gap-2.5 no-underline shrink-0">
            <img src="{{ asset('images/Mankilam Logo.jpg') }}" alt="Mankilam Logo"
                class="h-8 w-auto object-contain rounded-md">
            <div class="flex flex-col leading-tight">
                <span class="text-[9px] font-black uppercase tracking-widest text-blue-600">Barangay Mankilam</span>
                <span class="text-xs font-black text-slate-800 tracking-tight">Online Services Portal</span>
            </div>
        </a>

        {{-- Desktop Right --}}
        <div class="hidden md:flex items-center gap-2">
            @auth
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
               <nav class="flex items-center gap-1  p-1.5">
                    <a href="#about" class="group relative px-4 py-2 text-[11px] font-black uppercase tracking-wider text-slate-500 hover:text-blue-600 transition-all">
                        <span class="relative z-10">About Us</span>
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

        {{-- Mobile Right --}}
        <div class="flex md:hidden items-center gap-2">
            {{-- Burger for both guests and auth users on mobile --}}
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

                {{-- Available Services Link (mobile only) --}}
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
        
              <a href="#about"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-slate-600 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all group">
                    <div class="w-8 h-8 bg-slate-100 group-hover:bg-blue-100 rounded-xl flex items-center justify-center shrink-0 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <span>About Us</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 ml-auto text-slate-300 group-hover:text-blue-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <a href="#foundation"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-slate-600 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all group">
                    <div class="w-8 h-8 bg-slate-100 group-hover:bg-blue-100 rounded-xl flex items-center justify-center shrink-0 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <span>Foundation</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 ml-auto text-slate-300 group-hover:text-blue-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <a href="#services"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-slate-600 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all group">
                    <div class="w-8 h-8 bg-slate-100 group-hover:bg-blue-100 rounded-xl flex items-center justify-center shrink-0 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <span>Services</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 ml-auto text-slate-300 group-hover:text-blue-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <a href="#howitworks"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-slate-600 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all group">
                    <div class="w-8 h-8 bg-slate-100 group-hover:bg-blue-100 rounded-xl flex items-center justify-center shrink-0 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span>How it Works</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 ml-auto text-slate-300 group-hover:text-blue-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            @endauth
        </div>
    </div>
</nav>

{{-- MAIN CONTENT --}}
@yield('content')

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

 <button id="scroll-top-btn" onclick="window.scrollTo({top:0, behavior:'smooth'})"
    style="opacity:0; transform: translateY(20px); transition: all 0.3s ease; pointer-events: none;"
    class="fixed bottom-16 left-1/2 -translate-x-1/2 z-50 w-11 h-11 bg-blue-700 hover:bg-blue-800 text-white rounded-2xl shadow-xl shadow-blue-200 flex items-center justify-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7" />
    </svg>
</button>

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
    const scrollBtn = document.getElementById('scroll-top-btn');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 100) {
            scrollBtn.style.opacity = '1';
            scrollBtn.style.transform = 'translateY(0)';
            scrollBtn.style.pointerEvents = 'auto';
        } else {
            scrollBtn.style.opacity = '0';
            scrollBtn.style.transform = 'translateY(20px)';
            scrollBtn.style.pointerEvents = 'none';
        }
    });
</script>
</body>
</html>