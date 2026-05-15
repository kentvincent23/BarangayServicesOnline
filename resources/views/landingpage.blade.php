@extends('layouts.app')

@section('content')

{{-- FULL SCREEN HERO --}}
<div class="relative min-h-[calc(100vh-64px)] flex flex-col items-center justify-center text-center px-4 overflow-hidden bg-blue-50">

    {{-- Dot grid --}}
    <div class="absolute inset-0 opacity-40"
        style="background-image: radial-gradient(#93c5fd 1px, transparent 1px); background-size: 26px 26px;"></div>

    {{-- Blob decorations --}}
    <div class="absolute -top-16 -left-16 w-64 h-64 bg-blue-200 rounded-full opacity-20"></div>
    <div class="absolute -bottom-16 -right-16 w-80 h-80 bg-blue-300 rounded-full opacity-10"></div>
    <div class="absolute top-1/2 left-0 w-40 h-40 bg-blue-100 rounded-full opacity-30 -translate-y-1/2"></div>
    <div class="absolute top-1/3 right-0 w-52 h-52 bg-blue-200 rounded-full opacity-20"></div>

    {{-- Content --}}
    <div class="relative z-10 flex flex-col items-center w-full max-w-xl mx-auto">

        {{-- Badge --}}
        <div class="inline-flex items-center gap-2 bg-white border border-blue-200 text-blue-700 text-[11px] font-black uppercase tracking-widest px-4 py-1.5 rounded-full mb-6 shadow-sm">
            <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
            Barangay Mankilam · Tagum City
        </div>

        {{-- Logo --}}
        <img src="{{ asset('images/Mankilam Logo.jpg') }}" alt="Mankilam Logo"
            class="h-24 sm:h-28 w-auto object-contain rounded-2xl shadow-md border border-white mb-6">

        {{-- Title --}}
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-black text-slate-900 tracking-tight leading-tight mb-4">
            Mankilam,<br>
            <span class="text-blue-700">Now Online.</span>
        </h1>

        {{-- Subtitle --}}
        <p class="text-slate-500 text-sm sm:text-base font-medium max-w-sm mx-auto mb-8 leading-relaxed">
            Request documents, track your applications, and access community services — all in one place.
        </p>

        {{-- Buttons --}}
        <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto mb-12">
            <a href="{{ route('register') }}"
                class="w-full sm:w-auto text-center bg-blue-700 text-white px-8 py-4 rounded-2xl font-black uppercase tracking-widest text-xs hover:bg-blue-800 transition-all shadow-lg shadow-blue-200 active:scale-95">
                Create Account
            </a>
            <a href="{{ route('login') }}"
                class="w-full sm:w-auto text-center bg-white text-blue-700 border border-blue-200 px-8 py-4 rounded-2xl font-black uppercase tracking-widest text-xs hover:bg-blue-50 transition-all active:scale-95">
                Sign In
            </a>
        </div>

        {{-- Stats --}}
        <div class="flex items-center justify-center gap-6 sm:gap-12">
            <div class="text-center">
                <p class="text-xl sm:text-2xl font-black text-blue-700">Fast</p>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Processing</p>
            </div>
            <div class="w-px h-8 bg-blue-200"></div>
            <div class="text-center">
                <p class="text-xl sm:text-2xl font-black text-blue-700">24/7</p>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Online Access</p>
            </div>
            <div class="w-px h-8 bg-blue-200"></div>
            <div class="text-center">
                <p class="text-xl sm:text-2xl font-black text-blue-700">100%</p>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Secure</p>
            </div>
        </div>
    </div>
</div>

{{-- ABOUT SECTION --}}
<div id="about" class="bg-white border-t border-slate-100">

    {{-- About Hero --}}
    <div class="max-w-4xl mx-auto px-4 py-16 text-center">
        <div class="inline-flex items-center gap-2 bg-blue-50 border border-blue-200 text-blue-700 text-[11px] font-black uppercase tracking-widest px-4 py-1.5 rounded-full mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Tagum City, Philippines
        </div>
        <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight mb-4">
            About <span class="text-blue-700">Barangay Mankilam</span>
        </h2>
        <p class="text-slate-500 text-sm sm:text-base leading-relaxed max-w-2xl mx-auto">
            Barangay Mankilam is one of the barangays of Tagum City, Davao del Norte, Philippines. 
            It is a thriving community committed to public service, community development, and the 
            well-being of every resident through accessible and modern governance.
        </p>
    </div>

    {{-- Stats Bar --}}
    <div class="bg-blue-700 py-10">
        <div class="max-w-4xl mx-auto px-4 grid grid-cols-2 sm:grid-cols-4 gap-6 text-center">
            <div>
                <p class="text-2xl sm:text-3xl font-black text-white">42,500+</p>
                <p class="text-[10px] font-black text-blue-200 uppercase tracking-widest mt-1">Residents</p>
            </div>
            <div>
                <p class="text-2xl sm:text-3xl font-black text-white">24/7</p>
                <p class="text-[10px] font-black text-blue-200 uppercase tracking-widest mt-1">Online Access</p>
            </div>
            <div>
                <p class="text-2xl sm:text-3xl font-black text-white">10+</p>
                <p class="text-[10px] font-black text-blue-200 uppercase tracking-widest mt-1">Services</p>
            </div>
            <div>
                <p class="text-2xl sm:text-3xl font-black text-white">Fast</p>
                <p class="text-[10px] font-black text-blue-200 uppercase tracking-widest mt-1">Processing</p>
            </div>
        </div>
    </div>

    {{-- Vision Mission Goal --}}
    <div class="max-w-4xl mx-auto px-4 py-14">
        <p class="text-[11px] font-black text-blue-600 uppercase tracking-widest text-center mb-8">Our Foundation</p>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">

            {{-- Vision --}}
            <div class="group bg-slate-50 hover:bg-blue-700 p-6 rounded-3xl border border-slate-100 transition-all duration-300 text-center">
                <div class="flex justify-center mb-4">
                    <div class="bg-blue-100 group-hover:bg-blue-600 p-3 rounded-2xl transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-[11px] font-black text-blue-700 group-hover:text-blue-200 uppercase tracking-[0.2em] mb-3">Vision</h3>
                <p class="text-slate-600 group-hover:text-blue-100 font-medium text-sm leading-relaxed">
                    To be a model barangay that is economically progressive, stable, peaceful, and filled with healthy and empowered constituents.
                </p>
            </div>

            {{-- Mission --}}
            <div class="group bg-slate-50 hover:bg-blue-700 p-6 rounded-3xl border border-slate-100 transition-all duration-300 text-center">
                <div class="flex justify-center mb-4">
                    <div class="bg-blue-100 group-hover:bg-blue-600 p-3 rounded-2xl transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-[11px] font-black text-blue-700 group-hover:text-blue-200 uppercase tracking-[0.2em] mb-3">Mission</h3>
                <p class="text-slate-600 group-hover:text-blue-100 font-medium text-sm leading-relaxed">
                    To unite officials and constituents with strong determination in achieving development across economic, cultural, political, ecological, social, and spiritual aspects.
                </p>
            </div>

            {{-- Goal --}}
            <div class="group bg-slate-50 hover:bg-blue-700 p-6 rounded-3xl border border-slate-100 transition-all duration-300 text-center">
                <div class="flex justify-center mb-4">
                    <div class="bg-blue-100 group-hover:bg-blue-600 p-3 rounded-2xl transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-[11px] font-black text-blue-700 group-hover:text-blue-200 uppercase tracking-[0.2em] mb-3">Goal</h3>
                <p class="text-slate-600 group-hover:text-blue-100 font-medium text-sm leading-relaxed">
                    To provide continuity in delivering quality services needed by the community, ensuring every resident is heard, served, and uplifted.
                </p>
            </div>
        </div>
    </div>

    {{-- Services We Offer --}}
    <div class="bg-slate-50 py-14 border-t border-slate-100">
        <div class="max-w-4xl mx-auto px-4">
            <p class="text-[11px] font-black text-blue-600 uppercase tracking-widest text-center mb-2">What We Offer</p>
            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 text-center mb-10 tracking-tight">Barangay Services</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <div class="bg-white p-5 rounded-2xl border border-slate-100 flex items-start gap-4 hover:border-blue-200 hover:shadow-sm transition-all">
                    <div class="bg-blue-50 p-2.5 rounded-xl shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-black text-slate-800">Barangay Clearance</p>
                        <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">Certifies that a resident has no pending case within the barangay. Required for employment, business, and legal transactions.</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-100 flex items-start gap-4 hover:border-blue-200 hover:shadow-sm transition-all">
                    <div class="bg-blue-50 p-2.5 rounded-xl shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-black text-slate-800">Certificate of Residency</p>
                        <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">Proof that a person is a bonafide resident of the barangay. Commonly used for school enrollment and government transactions.</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-100 flex items-start gap-4 hover:border-blue-200 hover:shadow-sm transition-all">
                    <div class="bg-blue-50 p-2.5 rounded-xl shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-black text-slate-800">Certificate of Indigency</p>
                        <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">Issued to residents who qualify as low-income individuals. Used to avail government assistance, medical aid, and scholarships.</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-100 flex items-start gap-4 hover:border-blue-200 hover:shadow-sm transition-all">
                    <div class="bg-blue-50 p-2.5 rounded-xl shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-black text-slate-800">Barangay Business Permit</p>
                        <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">Required clearance for all businesses operating within the barangay before securing a city business permit.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- How It Works --}}
    <div class="max-w-4xl mx-auto px-4 py-14">
        <p class="text-[11px] font-black text-blue-600 uppercase tracking-widest text-center mb-2">Simple Process</p>
        <h2 class="text-2xl sm:text-3xl font-black text-slate-900 text-center mb-10 tracking-tight">How It Works</h2>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
            <div class="flex flex-col items-center gap-3">
                <div class="w-12 h-12 bg-blue-700 text-white rounded-2xl flex items-center justify-center font-black text-lg shadow-lg shadow-blue-200">1</div>
                <p class="text-sm font-black text-slate-800">Create an Account</p>
                <p class="text-xs text-slate-500 leading-relaxed">Register with your name and basic details to get started, User must be a barangay resident.</p>
            </div>
            <div class="flex flex-col items-center gap-3">
                <div class="w-12 h-12 bg-blue-700 text-white rounded-2xl flex items-center justify-center font-black text-lg shadow-lg shadow-blue-200">2</div>
                <p class="text-sm font-black text-slate-800">Submit a Request</p>
                <p class="text-xs text-slate-500 leading-relaxed">Choose the document you need, fill out the form, and attach a valid ID for verification.</p>
            </div>
            <div class="flex flex-col items-center gap-3">
                <div class="w-12 h-12 bg-blue-700 text-white rounded-2xl flex items-center justify-center font-black text-lg shadow-lg shadow-blue-200">3</div>
                <p class="text-sm font-black text-slate-800">Pick Up Your Document</p>
                <p class="text-xs text-slate-500 leading-relaxed">Track your application online and visit the barangay hall once it's ready for pickup.</p>
            </div>
        </div>
    </div>

    {{-- CTA Banner --}}
    <div class="bg-blue-700 py-14 px-4 text-center">
        <h2 class="text-2xl sm:text-3xl font-black text-white mb-3 tracking-tight">Ready to get started?</h2>
        <p class="text-blue-200 text-sm mb-7 max-w-sm mx-auto">Create your account today and request barangay documents without leaving your home.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-3">
            <a href="{{ route('register') }}"
                class="bg-white text-blue-700 px-8 py-3.5 rounded-2xl font-black uppercase tracking-widest text-xs hover:bg-blue-50 transition-all active:scale-95">
                Create Account
            </a>
            <a href="{{ route('login') }}"
                class="bg-blue-600 text-white border border-blue-500 px-8 py-3.5 rounded-2xl font-black uppercase tracking-widest text-xs hover:bg-blue-500 transition-all active:scale-95">
                Sign In
            </a>
        </div>
    </div>

</div>

{{-- FOOTER --}}
 <footer class="fixed bottom-0 left-0 w-full backdrop-blur-sm py-4 text-center z-50">
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.5em]">&copy; {{ date('Y') }} Barangay Mankilam Online Services Portal</p>
    </footer>

@endsection