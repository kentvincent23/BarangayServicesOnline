
@extends('layouts.app')

@section('content')
    
    <div class="w-full px-4 sm:px-6 lg:px-10 max-w-7xl mx-auto ">
        <header class="mb-8 sm:mb-10">
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Request a Document</h1>
            <p class="text-slate-500 mt-2 text-sm sm:text-base">Submit your details below to process your application.</p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10 ">

            {{-- LEFT SIDE: Form + My Applications --}}
            <div class="w-full min-w-0 ">
                <div class="bg-white p-6 sm:p-8 lg:p-10 rounded-2xl sm:rounded-[2.5rem] shadow-2xl shadow-slate-200 border border-white">
                    <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 sm:space-y-6">
                        @csrf

                        @if($errors->any() && !$errors->has('not_resident'))
                            <div class="bg-red-50 border border-red-200 text-red-700 text-sm font-semibold px-5 py-3 rounded-2xl">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <div class="grid grid-cols-1 sm:grid-cols-5 gap-3 sm:gap-4">
                           <div class="sm:col-span-2 space-y-2">
                                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">First Name</label>
                                <input type="text" name="first_name" value="{{ old('first_name', Auth::user()->first_name ?? '') }}"
                                class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-slate-50 border-none rounded-xl sm:rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm" required>
                            </div>

                            <div class="sm:col-span-1 space-y-2">
                                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1 block text-center">M.I.</label>
                                <input type="text" name="middle_initial" maxlength="1"
                                    value="{{ old('middle_initial', isset(Auth::user()->middle_name) ? substr(Auth::user()->middle_name, 0, 1) : '') }}"
                                    class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-slate-50 border-none rounded-xl sm:rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-center uppercase text-sm ">
                            </div>
                            <div class="sm:col-span-2 space-y-2">
                                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Last Name</label>
                                <input type="text" name="last_name" value="{{ old('last_name', Auth::user()->last_name ?? '') }}"
                                    class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-slate-50 border-none rounded-xl sm:rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm "required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                            <div class="space-y-2">
                                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Age</label>
                                <input type="number" name="age" value="{{ old('age', Auth::user()->age ?? '') }}"
                                    class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-slate-50 border-none rounded-xl sm:rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm" required>
                            </div>
                            <div class="space-y-2 relative">
                             <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Civil Status</label>
                            
                            <div class="relative">
                                <select name="civil_status" required
                                    class="w-full px-5 py-4 bg-slate-50 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-bold text-slate-700 border-none appearance-none transition-all cursor-pointer">
                                    
                                    <option value="" disabled {{ old('civil_status', Auth::user()->civil_status ?? '') == '' ? 'selected' : '' }}>
                                        Select Status
                                    </option>
                                    
                                    @foreach(['Single', 'Married', 'Widowed', 'Separated'] as $status)
                                        <option value="{{ $status }}" {{ old('civil_status', Auth::user()->civil_status ?? '') == $status ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>

                                <!-- Custom Chevron Icon -->
                                <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                            <!-- Service Type Dropdown -->
                            <div class="space-y-2">
                                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Service Type</label>
                                <div class="relative group">
                                    <select name="service_type" 
                                        class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-slate-50 border-none rounded-xl sm:rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-bold text-slate-700 text-sm appearance-none transition-all cursor-pointer" 
                                        required>
                                        <option value="" disabled {{ old('service_type') ? '' : 'selected' }}>Select Service</option>
                                        <option value="Barangay Clearance" {{ old('service_type') == 'Barangay Clearance' ? 'selected' : '' }}>Barangay Clearance</option>
                                        <option value="Certificate of Indigency" {{ old('service_type') == 'Certificate of Indigency' ? 'selected' : '' }}>Certificate of Indigency</option>
                                        <option value="Certificate of Residency" {{ old('service_type') == 'Certificate of Residency' ? 'selected' : '' }}>Certificate of Residency</option>
                                        <option value="Business Permit" {{ old('service_type') == 'Business Permit' ? 'selected' : '' }}>Business Permit</option>
                                    </select>
                                    
                                    <!-- Custom Chevron Icon -->
                                    <div class="absolute inset-y-0 right-0 flex items-center px-4 sm:px-5 pointer-events-none">
                                        <svg class="w-4 h-4 text-slate-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Purpose Input -->
                            <div class="space-y-2">
                                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Purpose</label>
                                <input type="text" name="purpose" value="{{ old('purpose') }}" placeholder="e.g. Job Application"
                                    class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-slate-50 border-none rounded-xl sm:rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-bold text-slate-700 text-sm transition-all placeholder:text-slate-400 placeholder:font-normal" 
                                    required>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Additional Notes (Optional)</label>
                            <textarea name="notes" rows="3"
                                class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-slate-50 border-none rounded-xl sm:rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold resize-none text-sm">{{ old('notes') }}</textarea>
                        </div>

                        <div class="space-y-2 p-4 bg-blue-50/50 rounded-2xl border-2 border-dashed border-blue-100">
                            <label class="text-[11px] font-black text-blue-500 uppercase tracking-widest ml-1 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Attach Valid ID for Verification
                            </label>
                            <input type="file" name="id_image" required
                                class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer">
                            <p class="text-[10px] text-slate-400 ml-1 italic font-medium">*This image is used only for verification</p>
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-700 hover:bg-blue-800 text-white py-4 sm:py-5 rounded-[1.25rem] sm:rounded-[1.5rem] font-black uppercase tracking-[0.2em] text-xs transition-all shadow-xl shadow-blue-100 active:scale-95">
                            Submit Request
                        </button>
                    </form>
                </div>

                {{-- My Applications --}}
                @php $myApps = Auth::user()->applications()->latest()->get(); @endphp
                @if($myApps->count())
                    <div class="mt-6 sm:mt-10" x-data="{ filter: 'approved' }">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-4">
                            <h2 class="text-base sm:text-lg font-black text-slate-800">My Applications</h2>
                            <div class="flex items-center gap-2 overflow-x-auto pb-2 sm:pb-0">
                                <div class="flex bg-slate-100 p-1 rounded-xl border border-slate-200">
                                    <button @click="filter = 'approved'"
                                        :class="filter === 'approved' ? 'bg-blue-500 text-white shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                                        class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-wider transition-all">
                                        Approved
                                    </button>
                                    <button @click="filter = 'ready_to_pickup'"
                                        :class="filter === 'ready_to_pickup' ? 'bg-emerald-500 text-white shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                                        class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-wider transition-all">
                                        Ready
                                    </button>
                                    <button @click="filter = 'released'"
                                        :class="filter === 'released' ? 'bg-violet-500 text-white shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                                        class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-wider transition-all">
                                        Released
                                    </button>
                                    <button @click="filter = 'rejected'"
                                        :class="filter === 'rejected' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                                        class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-wider transition-all">
                                        Rejected
                                    </button>
                                    <button @click="filter = 'all'"
                                        :class="filter === 'all' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                                        class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-wider transition-all">
                                        All
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            @foreach($myApps as $app)
                                <div x-show="filter === 'all' || filter === '{{ $app->status }}'"
                                    class="bg-white rounded-xl sm:rounded-2xl px-4 sm:px-6 py-3 sm:py-4 border border-slate-100 shadow-sm flex items-center justify-between gap-3">
                                    <div class="min-w-0">
                                        <p class="font-black text-slate-900 text-sm sm:text-base leading-tight">{{ $app->document_type }}</p>
                                        <p class="text-[11px] text-slate-500 italic mt-0.5 truncate">"{{ $app->purpose }}"</p>
                                        <p class="text-[10px] text-slate-300 mt-1 font-medium">{{ $app->created_at->format('M d, Y h:i A') }}</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        @if($app->status === 'approved')
                                            <span class="px-2.5 sm:px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-blue-100 text-blue-600 border border-blue-200/50 whitespace-nowrap">Approved</span>
                                        @elseif($app->status === 'ready_to_pickup')
                                            <span class="px-2.5 sm:px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-emerald-100 text-emerald-600 border border-emerald-200/50 animate-pulse whitespace-nowrap">Ready to Pick Up</span>
                                        @elseif($app->status === 'released')
                                            <span class="px-2.5 sm:px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-violet-100 text-violet-600 border border-violet-200/50 whitespace-nowrap">Released</span>
                                        @elseif($app->status === 'rejected')
                                            <span class="px-2.5 sm:px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-red-100 text-red-600 border border-red-200/50 whitespace-nowrap">Rejected</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- RIGHT SIDE: Available Services --}}
            <div class="w-full min-w-0">
                <div class="bg-white rounded-2xl sm:rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-100 p-5 sm:p-7">
                    <div class="mb-5">
                        <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Available Services</p>
                        <p class="text-slate-800 font-black text-base sm:text-lg mt-1">What can we help you with?</p>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3 p-4 rounded-xl sm:rounded-2xl bg-blue-50 border border-blue-100">
                            <div class="flex-shrink-0 w-9 h-9 rounded-lg bg-blue-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="font-black text-blue-800 text-sm">Barangay Clearance</p>
                                <p class="text-blue-500 text-xs mt-0.5 leading-relaxed">Certifies that a resident has no pending case within the barangay. Required for employment, business, and legal transactions.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 p-4 rounded-xl sm:rounded-2xl bg-emerald-50 border border-emerald-100">
                            <div class="flex-shrink-0 w-9 h-9 rounded-lg bg-emerald-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="font-black text-emerald-800 text-sm">Certificate of Indigency</p>
                                <p class="text-emerald-600 text-xs mt-0.5 leading-relaxed">For low-income residents needing government assistance, free medical services, scholarships, or social welfare programs.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 p-4 rounded-xl sm:rounded-2xl bg-violet-50 border border-violet-100">
                            <div class="flex-shrink-0 w-9 h-9 rounded-lg bg-violet-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-violet-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="font-black text-violet-800 text-sm">Certificate of Residency</p>
                                <p class="text-violet-600 text-xs mt-0.5 leading-relaxed">Proof of barangay residence. Needed for school enrollment, voter registration, bank accounts, and address verification.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 p-4 rounded-xl sm:rounded-2xl bg-amber-50 border border-amber-100">
                            <div class="flex-shrink-0 w-9 h-9 rounded-lg bg-amber-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="font-black text-amber-800 text-sm">Business Permit</p>
                                <p class="text-amber-600 text-xs mt-0.5 leading-relaxed">Barangay-level clearance required before operating any business. A prerequisite for the Mayor's Permit and official city registration.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
