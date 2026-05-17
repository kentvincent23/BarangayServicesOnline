<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Connect | Create Account</title>
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

        /* Custom scrollbar for better look during long forms */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center px-4 py-12 sm:py-20">

    <a href="{{ route('landing') }}" class="fixed top-6 left-6 z-50 flex items-center gap-2 text-slate-500 hover:text-blue-600 font-bold text-sm transition-all group">
        <div class="bg-white p-2 rounded-xl shadow-sm border border-slate-100 group-hover:shadow-md group-hover:-translate-x-1 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </div>
        <span class="hidden sm:inline">Back to Home</span>
    </a>

    <div class="w-full max-w-[550px]">
        {{-- Glass Card --}}
        <div class="glass-card p-8 sm:p-12 rounded-[3rem] shadow-[0_32px_64px_-16px_rgba(0,0,0,0.08)]">
            
            {{-- Header --}}
            <div class="text-center mb-10">
                <div class="inline-flex relative mb-6">
                    <div class="absolute inset-0 bg-blue-600 blur-2xl opacity-20"></div>
                    <div class="relative bg-blue-600 text-white p-4 rounded-[1.5rem] shadow-xl shadow-blue-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">Join the Community</h1>
                <p class="text-slate-400 text-sm font-semibold">Create your resident account to get started</p>
            </div>

            {{-- Errors Alert --}}
            @if($errors->any())
                <div class="bg-rose-50 text-rose-600 text-[13px] font-bold px-5 py-4 rounded-2xl mb-8 border border-rose-100 flex items-center gap-3">
                    <svg class="h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="/register" method="POST" class="space-y-7">
                @csrf
                
                {{-- Name Group --}}
                <div class="space-y-4"> 
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="group space-y-1.5">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2 group-focus-within:text-blue-600 transition-colors">First Name</label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" required
                                class="w-full px-6 py-4 bg-slate-50/50 border border-slate-100 rounded-2xl outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 focus:bg-white font-bold text-slate-700 transition-all">
                        </div>
                        <div class="group space-y-1.5">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2 group-focus-within:text-blue-600 transition-colors">Middle Name</label>
                            <input type="text" name="middle_name" value="{{ old('middle_name') }}" placeholder="(Optional)"
                                class="w-full px-6 py-4 bg-slate-50/50 border border-slate-100 rounded-2xl outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 focus:bg-white font-bold text-slate-700 transition-all placeholder:text-slate-300">
                        </div>
                    </div>
                    <div class="group space-y-1.5">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2 group-focus-within:text-blue-600 transition-colors">Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" required
                            class="w-full px-6 py-4 bg-slate-50/50 border border-slate-100 rounded-2xl outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 focus:bg-white font-bold text-slate-700 transition-all">
                    </div>
                </div>

                {{-- Personal Data Group --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="group space-y-1.5">
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
                    <div class="group space-y-1.5">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2 group-focus-within:text-blue-600 transition-colors">Civil Status</label>
                        <div class="relative">
                            <select name="civil_status" required
                                class="w-full px-6 py-4 bg-slate-50/50 border border-slate-100 rounded-2xl outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 focus:bg-white font-bold text-slate-700 appearance-none transition-all cursor-pointer">
                                <option value="" disabled {{ old('civil_status') ? '' : 'selected' }}>Select Status</option>
                                <option value="Single" {{ old('civil_status') == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Married" {{ old('civil_status') == 'Married' ? 'selected' : '' }}>Married</option>
                                <option value="Widowed" {{ old('civil_status') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                <option value="Separated" {{ old('civil_status') == 'Separated' ? 'selected' : '' }}>Separated</option>
                            </select>
                            <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Account Details Group --}}
                <div class="space-y-4 pt-2 border-t border-slate-50">
                    <div class="group space-y-1.5">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2 group-focus-within:text-blue-600 transition-colors">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="name@email.com"
                            class="w-full px-6 py-4 bg-slate-50/50 border border-slate-100 rounded-2xl outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 focus:bg-white font-bold text-slate-700 transition-all placeholder:text-slate-300">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="group space-y-1.5">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2 group-focus-within:text-blue-600 transition-colors">Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="reg_password" required placeholder="••••••••"
                                    class="w-full px-6 py-4 pr-14 bg-slate-50/50 border border-slate-100 rounded-2xl outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 focus:bg-white font-bold text-slate-700 transition-all placeholder:text-slate-300">
                                <button type="button" onclick="togglePassword('reg_password', 'eye-reg')"
                                    class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-blue-600 transition-colors">
                                    <svg id="eye-reg" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="group space-y-1.5">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2 group-focus-within:text-blue-600 transition-colors">Confirm Password</label>
                            <div class="relative">
                                <input type="password" name="password_confirmation" id="reg_password_confirm" required placeholder="••••••••"
                                    class="w-full px-6 py-4 pr-14 bg-slate-50/50 border border-slate-100 rounded-2xl outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 focus:bg-white font-bold text-slate-700 transition-all placeholder:text-slate-300">
                                <button type="button" onclick="togglePassword('reg_password_confirm', 'eye-reg-confirm')"
                                    class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-blue-600 transition-colors">
                                    <svg id="eye-reg-confirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="btn-shine w-full bg-blue-600 hover:bg-blue-700 text-white py-5 rounded-2xl font-black uppercase tracking-widest text-[11px] transition-all shadow-xl shadow-blue-200 active:scale-[0.98] mt-4 flex items-center justify-center gap-2">
                    Create My Account
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </button>
            </form>

            <div class="mt-10 pt-8 border-t border-slate-50 text-center">
                <p class="text-xs text-slate-400 font-bold">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 transition-colors ml-1">Sign in here &rarr;</a>
                </p>
            </div>
        </div>

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
    </script>
</body>
</html>