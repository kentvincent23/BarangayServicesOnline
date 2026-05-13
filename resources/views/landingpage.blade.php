@extends('layouts.app')

@section('content')
    <main class="max-w-6xl mx-auto mt-6 md:mt-10 px-4 md:px-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between md:gap-16 py-6 md:py-7 md:min-h-[70vh]">

            {{-- RIGHT: Logo + Title + Buttons --}}
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

            {{-- LEFT: Vision / Mission / Goal Cards --}}
            <div class="flex-1 grid grid-cols-1 gap-4 md:gap-6 order-2 md:order-1">
                {{-- Vision Card --}}
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

                {{-- Mission Card --}}
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

                {{-- Goal Card --}}
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
        <div class=""></div>
          <footer class="fixed bottom-0 left-0 w-full backdrop-blur-sm py-4 text-center z-50">
    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.5em]"> &copy; {{ date('Y') }} Barangay Online Services Portal </p>
          </footer>
    </main>
@endsection