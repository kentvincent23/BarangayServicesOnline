<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Connect | Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(at 0% 0%, rgba(59, 130, 246, 0.15) 0, transparent 50%), 
                        radial-gradient(at 100% 100%, rgba(37, 99, 235, 0.1) 0, transparent 50%),
                        #fdfeff;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 1);
        }

        /* Smooth button shine effect */
        .btn-shine {
            position: relative;
            overflow: hidden;
        }
        .btn-shine::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 20%;
            height: 200%;
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(30deg);
            transition: all 0.5s;
        }
        .btn-shine:hover::after {
            left: 120%;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center px-4 py-10">

    <a href="{{ route('landing') }}" class="fixed top-6 left-6 flex items-center gap-2 text-slate-500 hover:text-blue-600 font-bold text-sm transition-all group">
        <div class="bg-white p-2 rounded-xl shadow-sm border border-slate-100 group-hover:shadow-md group-hover:-translate-x-1 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </div>
        <span class="hidden sm:inline">Back to Home</span>
    </a>

    <div class="w-full max-w-[440px]">
        {{-- Glass Card --}}
        <div class="glass-card p-8 sm:p-12 rounded-[3rem] shadow-[0_32px_64px_-16px_rgba(0,0,0,0.08)]">
            
            {{-- Header --}}
            <div class="text-center mb-10">
                <div class="inline-flex relative mb-6">
                    <div class="absolute inset-0 bg-blue-600 blur-2xl opacity-20"></div>
                    <div class="relative bg-blue-600 text-white p-4 rounded-[1.5rem] shadow-xl shadow-blue-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4v3M12 7h1m-1 4h1" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">Welcome Back</h1>
                <p class="text-slate-400 text-sm font-semibold">Sign in to access Barangay Mankilam Portal</p>
            </div>

            {{-- Alerts --}}
            @if($errors->has('email'))
                <div class="bg-rose-50 text-rose-600 text-[13px] font-bold px-5 py-4 rounded-2xl mb-6 border border-rose-100 flex items-center gap-3">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $errors->first('email') }}
                </div>
            @endif

            @if(session('success'))
                <div class="bg-emerald-50 text-emerald-600 text-[13px] font-bold px-5 py-4 rounded-2xl mb-6 border border-emerald-100 flex items-center gap-3">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form --}}
            <form action="/login" method="POST" class="space-y-6">
                @csrf
                <div class="group space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] ml-2 group-focus-within:text-blue-600 transition-colors">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="name@email.com" required
                        class="w-full px-6 py-4 bg-slate-50/50 border border-slate-100 rounded-2xl outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 focus:bg-white font-bold text-slate-700 transition-all placeholder:text-slate-300">
                </div>

                <div class="group space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] ml-2 group-focus-within:text-blue-600 transition-colors">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="login_password" placeholder="••••••••" required
                            class="w-full px-6 py-4 pr-14 bg-slate-50/50 border border-slate-100 rounded-2xl outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 focus:bg-white font-bold text-slate-700 transition-all placeholder:text-slate-300">
                        <button type="button" onclick="togglePassword('login_password', 'eye-login')"
                            class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-blue-600 transition-colors">
                            <svg id="eye-login" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit"
                    class="btn-shine w-full bg-blue-600 hover:bg-blue-700 text-white py-5 rounded-2xl font-black uppercase tracking-widest text-[11px] transition-all shadow-xl shadow-blue-200 active:scale-[0.98] mt-4 flex items-center justify-center gap-2">
                    Sign in
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </button>
            </form>

            {{-- Footer --}}
            <div class="mt-10 pt-8 border-t border-slate-50 text-center">
                <p class="text-xs text-slate-400 font-bold">
                    New to the portal? 
                    <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 transition-colors ml-1">Create an account &rarr;</a>
                </p>
            </div>
        </div>

        {{-- Footer Credit --}}
        <p class="text-center text-[10px] text-slate-300 font-black uppercase tracking-[0.3em] mt-8">
            &copy; 2026 Barangay Mankilam
        </p>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            const isHidden = input.type === 'password';

            input.type = isHidden ? 'text' : 'password';

            const eyeOpen = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
            const eyeSlash = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            `;

            icon.innerHTML = isHidden ? eyeOpen : eyeSlash;
        }
    </script>
</body>
</html>