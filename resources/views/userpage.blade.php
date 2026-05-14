
@extends('layouts.app')

@section('content')
    
    <div class="w-full px-4 sm:px-6 lg:px-10 max-w-7xl mx-auto ">
       <header class="mb-8 mt-8 sm:mb-10 text-center">


    {{-- Title --}}
    <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight leading-tight mb-2">
        Request a <span class="text-blue-700">Document</span>
    </h1>

    {{-- Subtitle --}}
    <p class="text-sm text-slate-500 max-w-sm mx-auto">
        Submit your details below and we'll process your barangay document request.
    </p>

    {{-- Divider --}}
    <div class="flex items-center justify-center gap-3 mt-5">
        <div class="w-12 h-px bg-slate-200"></div>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <div class="w-12 h-px bg-slate-200"></div>
    </div>
</header>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10 ">

            {{-- LEFT SIDE: Form + My Applications --}}
            <div class="w-full min-w-0 ">
                <div class="flex justify-center mb-4">
                    <button id="request-trigger" onclick="toggleForm()"
                        class="group flex items-center gap-3 bg-blue-700 hover:bg-blue-800 text-white px-8 py-4 rounded-2xl font-black uppercase tracking-[0.2em] text-xs shadow-xl shadow-blue-200 transition-all active:scale-95">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span id="btn-label">Click Here to Request a Service</span>
                    </button>
                </div>
             <div id="form-wrapper" style="max-height: 0; overflow: hidden; transition: max-height 0.6s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.4s ease; opacity: 0;">
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
                               <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Middle Name</label>
                                <input type="text" name="middle_name" value="{{ old('middle_name', Auth::user()->middle_name ?? '') }}"
                                 class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-slate-50 border-none rounded-xl sm:rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm" >            
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
                                    <select name="service_type_id" class="w-full px-4 py-2 border rounded-xl required">
                                        <option value="" disabled selected required>Select a Service</option>
                                        @foreach($serviceTypes as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                    
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
             
         </div>

                {{-- My Applications --}}
                @php $myApps = Auth::user()->applications()->latest()->get(); @endphp
                @if($myApps->count())
                  <div class="mt-6 sm:mt-10" x-data="{ filter: 'all' }">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-4 flex-wrap">
                            <h2 class="text-base sm:text-lg font-black text-slate-800">My Applications</h2>

                            <div class="flex items-center gap-2 flex-wrap">
                                <button @click="filter = 'pending'"
                                    :class="filter === 'pending' ? 'bg-yellow-50 border-yellow-500 text-yellow-800' : 'bg-white border-slate-200 text-slate-500 hover:bg-slate-50'"
                                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-[11px] font-semibold tracking-wide transition-all">
                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> Pending
                                </button>
                                <button @click="filter = 'approved'"
                                    :class="filter === 'approved' ? 'bg-blue-50 border-blue-500 text-blue-800' : 'bg-white border-slate-200 text-slate-500 hover:bg-slate-50'"
                                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-[11px] font-semibold tracking-wide transition-all">
                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Approved
                                </button>
                                <button @click="filter = 'processing'"
                                    :class="filter === 'processing' ? 'bg-violet-50 border-violet-500 text-violet-800' : 'bg-white border-slate-200 text-slate-500 hover:bg-slate-50'"
                                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-[11px] font-semibold tracking-wide transition-all">
                                    <span class="w-1.5 h-1.5 rounded-full bg-violet-500"></span> Processing
                                </button>
                                <button @click="filter = 'ready_to_pickup'"
                                    :class="filter === 'ready_to_pickup' ? 'bg-emerald-50 border-emerald-500 text-emerald-800' : 'bg-white border-slate-200 text-slate-500 hover:bg-slate-50'"
                                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-[11px] font-semibold tracking-wide transition-all">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Ready
                                </button>
                                <button @click="filter = 'released'"
                                    :class="filter === 'released' ? 'bg-violet-50 border-violet-500 text-violet-800' : 'bg-white border-slate-200 text-slate-500 hover:bg-slate-50'"
                                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-[11px] font-semibold tracking-wide transition-all">
                                    <span class="w-1.5 h-1.5 rounded-full bg-violet-500"></span> Released
                                </button>
                                <button @click="filter = 'rejected'"
                                    :class="filter === 'rejected' ? 'bg-red-50 border-red-500 text-red-800' : 'bg-white border-slate-200 text-slate-500 hover:bg-slate-50'"
                                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-[11px] font-semibold tracking-wide transition-all">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Rejected
                                </button>
                                <button @click="filter = 'all'"
                                    :class="filter === 'all' ? 'bg-slate-100 border-slate-400 text-slate-700' : 'bg-white border-slate-200 text-slate-500 hover:bg-slate-50'"
                                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-[11px] font-semibold tracking-wide transition-all">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> All
                                </button>
                            </div>
                        </div>


                        <div class="space-y-3">
                            @foreach($myApps as $app)
                                <div x-show="filter === 'all' || filter === '{{ $app->status }}'"
                                    class="bg-white rounded-xl sm:rounded-2xl px-4 sm:px-6 py-3 sm:py-4 border border-slate-100 shadow-sm flex items-center justify-between gap-3">
                                    <div class="min-w-0">
                                        <p class="font-black text-slate-900 text-sm sm:text-base leading-tight">{{ $app->serviceType->name }}</p>
                                        <p class="text-[11px] text-slate-500 italic mt-0.5 truncate">"{{ $app->purpose }}"</p>
                                        <p class="text-[10px] text-slate-300 mt-1 font-medium">{{ $app->created_at->format('M d, Y h:i A') }}</p>
                                    </div>
                        <div class="flex-shrink-0">
                                @if($app->status === 'pending')
                                    <span class="px-2.5 sm:px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-amber-100 text-amber-600 border border-amber-200/50 whitespace-nowrap">Pending</span>
                                
                                @elseif($app->status === 'processing')
                                    <span class="px-2.5 sm:px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-indigo-100 text-indigo-600 border border-indigo-200/50 whitespace-nowrap">Processing</span>

                                @elseif($app->status === 'approved')
                                    <span class="px-2.5 sm:px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-blue-100 text-blue-600 border border-blue-200/50 whitespace-nowrap">Approved</span>
                                
                                @elseif($app->status === 'ready_to_pickup')
                                    <span class="px-2.5 sm:px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-emerald-100 text-emerald-600 border border-emerald-200/50 animate-pulse whitespace-nowrap">Ready to Pick Up</span>
                                
                                @elseif($app->status === 'released')
                                    <span class="px-2.5 sm:px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-violet-100 text-violet-600 border border-violet-200/50 whitespace-nowrap">Released</span>
                                
                                @elseif($app->status === 'rejected')
                                    <span class="px-2.5 sm:px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-red-100 text-red-600 border border-red-200/50 whitespace-nowrap">Rejected</span>

                                @elseif($app->status === 'missed')
                                    <span class="px-2.5 sm:px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-gray-100 text-gray-600 border border-gray-200/50 whitespace-nowrap">Missed</span>
                                @endif
                            </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- RIGHT SIDE: Available Services --}}
                <div class="bg-white rounded-[1.5rem] p-6 shadow-sm border border-slate-100">

                    {{-- Header --}}
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-lg bg-blue-50 flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h7.5M8.25 12h7.5m-7.5 5.25h7.5"/></svg>
                            </div>
                            <span class="text-[10px] font-semibold text-slate-400 uppercase tracking-widest">Available Services</span>
                        </div>
                        <span class="text-[10px] text-slate-400 bg-slate-50 border border-slate-100 rounded-full px-2.5 py-0.5">
                            {{ $serviceTypes->count() }} {{ Str::plural('service', $serviceTypes->count()) }}
                        </span>
                    </div>

                    {{-- List --}}
                    <div class="flex flex-col gap-2">
                        @forelse($serviceTypes as $service)
                            <div class="flex items-start gap-3 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
                                <div class="w-9 h-9 rounded-lg bg-white border border-slate-100 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75 "><path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l5.653-4.655"/></svg>
                                </div>
                            
                                <div>
                                    <p class="text-l font-semibold text-slate-800">{{ $service->name }}</p>
                                    <p class="text-sm text-slate-400 mt-0.5 leading-relaxed">
                                        {{ $service->description ?? 'No description provided.' }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="py-10 text-center">
                                <svg class="w-7 h-7 text-slate-200 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                                <p class="text-slate-300 text-xs font-medium italic">No services are currently being offered.</p>
                            </div>
                        @endforelse
                    </div>

                </div>

        </div>
    </div>

            <script>
            function toggleForm() {
                const wrapper = document.getElementById('form-wrapper');
                const btn = document.getElementById('request-trigger');
                const isOpen = wrapper.style.opacity === '1';

                if (!isOpen) {
                    wrapper.style.maxHeight = wrapper.scrollHeight + 'px';
                    wrapper.style.opacity = '1';
                    setTimeout(() => {
                        wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }, 100);
                    btn.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Close Form
                    `;
                } else {
                    wrapper.style.maxHeight = '0';
                    wrapper.style.opacity = '0';
                    btn.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Click Here to Request a Service
                    `;
                }
            }
        </script>
@endsection

