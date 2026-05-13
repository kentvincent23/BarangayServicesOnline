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
<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200 px-4 py-2 md:px-8">
    <div class="max-w-7xl mx-auto flex justify-between items-center h-16">
        {{-- Left Side: Logo --}}
        <div class="flex items-center gap-3">
            <a href="{{ url('/') }}" class="flex items-center gap-2 no-underline">
                <img src="{{ asset('images/Mankilam Logo.jpg') }}" alt="Mankilam Logo"
                    class="h-10 w-auto object-contain rounded-md">
            </a>
            <span class="font-extrabold text-lg tracking-tighter text-slate-800 hidden sm:block">Barangay Connect</span>
        </div>

        {{-- Right Side: User Info & Logout --}}
        <div class="flex items-center gap-4">
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
                <a href="{{ route('login') }}" class="text-xs font-bold text-slate-600 px-4 py-2 rounded-xl transition-all hover:bg-blue-700 hover:text-white shadow-sm">Sign in</a>
                <a href="{{ route('register') }}" class="text-xs font-bold text-white bg-blue-700 px-4 py-2 rounded-xl hover:bg-blue-800 transition-all">Create Account</a>
            @endauth
        </div>
    </div>
</nav>

    {{-- MAIN CONTENT AREA --}}
    @yield('content')

    {{-- ALERTS & TOASTS (Common to all pages) --}}
          @if($errors->any())
    <div id="flash-toast" style="position:fixed; bottom:2rem; left:50%; transform:translateX(-50%);" class="z-50 w-max bg-red-600 text-white text-sm font-bold px-6 py-4 rounded-2xl shadow-xl flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
        </svg>
        {{ $errors->first() }}
    </div>
    <script>setTimeout(() => document.getElementById('flash-toast')?.remove(), 4000);</script>
@endif

@if(session('success'))
    <div id="flash-toast" style="position:fixed; bottom:2rem; left:50%; transform:translateX(-50%);" class="z-50 w-max bg-slate-800 text-white text-sm font-bold px-6 py-4 rounded-2xl shadow-xl">
        {{ session('success') }}
    </div>
    <script>setTimeout(() => document.getElementById('flash-toast')?.remove(), 4000);</script>
@endif
</body>
</html>