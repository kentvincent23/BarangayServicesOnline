<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Connect</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafc] min-h-screen pb-12">

{{-- NAVBAR --}}
<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-100 px-4 md:px-8">
    <div class="max-w-7xl mx-auto flex justify-between items-center h-16">

        {{-- Left: Logo --}}
        <a href="{{ url('/') }}" class="flex items-center gap-3 no-underline shrink-0">
            <img src="{{ asset('images/Mankilam Logo.jpg') }}" alt="Mankilam Logo"
                class="h-9 w-auto object-contain rounded-md">
            <div class="flex flex-col leading-tight">
                <span class="text-[10px] font-black uppercase tracking-widest text-blue-600">Barangay Mankilam</span>
                <span class="text-sm font-black text-slate-800 tracking-tight">Online Services Portal</span>
            </div>
        </a>

        {{-- Desktop Right --}}
        <div class="hidden md:flex items-center gap-2">
            @auth
                {{-- Logged in: user info + logout --}}
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
                {{-- Guest: nav links + auth buttons --}}
                <a href="#about" class="text-xs font-semibold text-slate-500 hover:text-blue-700 px-3 py-2 rounded-lg transition-all">About Us</a>
                <a href="{{ route('login') }}"
                    class="text-xs font-bold text-slate-700 px-4 py-2 rounded-xl border border-slate-200 hover:border-blue-600 hover:text-blue-700 transition-all">
                    Sign In
                </a>
                <a href="{{ route('register') }}"
                    class="text-xs font-bold text-white bg-blue-700 px-4 py-2 rounded-xl hover:bg-blue-800 transition-all shadow-sm shadow-blue-200">
                    Create Account
                </a>
            @endauth
        </div>

        {{-- Mobile: burger (guests) or user info (logged in) --}}
        <div class="flex md:hidden items-center gap-3">
            @auth
                <div class="flex flex-col items-end">
                    <span class="text-[9px] font-black uppercase tracking-widest {{ Auth::user()->role === 'staff' ? 'text-amber-500' : 'text-slate-400' }}">
                        {{ Auth::user()->role === 'staff' ? 'Admin' : 'Resident' }}
                    </span>
                    <span class="text-xs font-bold text-slate-700">{{ Auth::user()->first_name }}</span>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-red-600 hover:text-white transition-all">
                        Logout
                    </button>
                </form>
            @else
                {{-- Burger button --}}
                <button id="burger-btn" onclick="toggleMenu()"
                    class="p-2 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all">
                    <svg id="burger-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            @endauth
        </div>
    </div>

    {{-- Mobile Menu Dropdown (guests only) --}}
    @guest
    <div id="mobile-menu"
        class="md:hidden overflow-hidden transition-all duration-300 ease-in-out"
        style="max-height: 0; opacity: 0;">
        <div class="pb-4 pt-1 flex flex-col gap-1 border-t border-slate-100 mt-1">
            <a href="#about"
                class="flex items-center gap-2 px-4 py-3 text-sm font-semibold text-slate-600 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                About Us
            </a>
            <a href="{{ route('login') }}"
                class="flex items-center gap-2 px-4 py-3 text-sm font-semibold text-slate-600 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14" />
                </svg>
                Sign In
            </a>
            <a href="{{ route('register') }}"
                class="flex items-center gap-2 mx-4 mt-1 px-4 py-3 text-sm font-bold text-white bg-blue-700 hover:bg-blue-800 rounded-xl transition-all justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                Create Account
            </a>
        </div>
    </div>
    @endguest
</nav>

{{-- MAIN CONTENT --}}
@yield('content')

{{-- TOASTS --}}
@if($errors->any())
    <div id="flash-toast" style="position:fixed; bottom:2rem; left:50%; transform:translateX(-50%);"
        class="z-50 w-max bg-red-600 text-white text-sm font-bold px-6 py-4 rounded-2xl shadow-xl flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
        </svg>
        {{ $errors->first() }}
    </div>
    <script>setTimeout(() => document.getElementById('flash-toast')?.remove(), 4000);</script>
@endif

@if(session('success'))
    <div id="flash-toast" style="position:fixed; bottom:2rem; left:50%; transform:translateX(-50%);"
        class="z-50 w-max bg-slate-800 text-white text-sm font-bold px-6 py-4 rounded-2xl shadow-xl">
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
</script>
</body>
</html>