<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info PPDB - SMK Negeri 1 Maesan</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#F8FAFC] antialiased text-gray-800 flex flex-col min-h-screen">
    
    <!-- Topbar Component -->
    <div class="sticky top-0 z-50 border-b border-gray-100 shadow-sm bg-white/95 backdrop-blur-sm">
        <x-topbar.navbar />
    </div>

    <!-- Hero Section (Dynamic from Admin) -->
    @if(!isset($sections['hero']) || $sections['hero']->is_visible)
    <header class="bg-[#2D3748] pt-24 pb-48 md:pt-32 md:pb-56 relative text-center text-white overflow-hidden">
        <div class="max-w-4xl mx-auto px-6 relative z-10 flex flex-col items-center">
            <span class="bg-teal-900/30 border border-teal-500/30 text-[#4DD0E1] text-[10px] font-bold px-4 py-1.5 rounded-full uppercase tracking-widest mb-6 inline-block shadow-sm">
                {{ $sections['hero']->button_text ?? 'PENERIMAAN PESERTA DIDIK BARU 2024/2025' }}
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Info PPDB' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                {{ $sections['hero']->subtitle ?? 'Membangun masa depan kompeten melalui pendidikan vokasi berkualitas di SMK Negeri 1 MAESAN.' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Main Content Section (Overlapping Hero) -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 md:px-8 -mt-24 md:-mt-32 relative z-20 pb-20">
        
        <!-- Top Cards (Persyaratan & Bantuan) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-24 md:mb-32">
            
            <!-- Persyaratan Umum -->
            <div class="lg:col-span-8 bg-white rounded-[2.5rem] p-8 md:p-12 shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-100 hover:shadow-md transition">
                <div class="flex items-center gap-4 mb-10">
                    <div class="w-10 h-10 rounded-xl bg-teal-50 border border-teal-100 text-[#015B63] flex justify-center items-center">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Persyaratan Umum</h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    @foreach(\App\Models\PpdbRequirement::all() as $req)
                    <div class="flex gap-3">
                        <div class="w-5 h-5 rounded-full bg-blue-100 text-blue-600 flex justify-center items-center shrink-0 mt-0.5">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <p class="text-[13px] text-gray-600 leading-relaxed">{{ $req->description }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Butuh Bantuan (Dark Card) -->
            @if(isset($sections['bantuan']) && $sections['bantuan']->is_visible)
            @php $bantuanData = is_array($sections['bantuan']->extra_data) ? $sections['bantuan']->extra_data : json_decode($sections['bantuan']->extra_data ?? '{}', true); @endphp
            <div class="lg:col-span-4 bg-[#015B63] rounded-[2.5rem] p-8 md:p-10 shadow-lg border border-[#014a50] text-white relative overflow-hidden flex flex-col justify-center">
                <!-- Abstract Bg Shape -->
                <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-teal-500 rounded-full blur-[60px] opacity-20"></div>
                
                <div class="relative z-10">
                    <p class="text-[9px] text-[#4DD0E1] uppercase font-bold tracking-widest mb-3">HOTLINE PPDB</p>
                    <h2 class="text-2xl lg:text-3xl font-bold mb-4">{{ $sections['bantuan']->title ?? 'Butuh Bantuan?' }}</h2>
                    <p class="text-teal-50 opacity-90 text-[13px] leading-relaxed mb-10 w-[95%]">
                        {{ $sections['bantuan']->subtitle ?? 'Tim panitia kami siap membantu proses pendaftaran Anda setiap hari kerja pukul 08:00 - 15:00 WIB.' }}
                    </p>
                    
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[#4DD0E1]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span class="text-sm font-bold tracking-wide">{{ $bantuanData['phone'] ?? '+62 812-3456-7890' }}</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[#4DD0E1]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span class="text-[13px] font-semibold tracking-wide">{{ $bantuanData['email'] ?? 'ppdb@smkn1maesan.sch.id' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
            
        </div>

        <!-- Jadwal Pelaksanaan (Timeline) -->
        <div class="mb-24 md:mb-32">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 tracking-tight">Jadwal Pelaksanaan</h2>
                <p class="text-gray-500 max-w-xl mx-auto text-[14px]">Catat tanggal penting agar tidak terlewatkan momen berharga Anda.</p>
            </div>

            <div class="relative max-w-4xl mx-auto">
                <!-- Center Vertical Line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 w-0.5 h-full bg-gray-200 hidden md:block"></div>

                <div class="space-y-12">
                    @foreach(\App\Models\PpdbTimeline::orderBy('id')->get() as $index => $timeline)
                    <!-- Item -->
                    <div class="flex flex-col md:flex-row items-center w-full {{ $index > 0 ? 'mt-8 md:mt-0' : '' }}">
                        @if($index % 2 == 0)
                        <!-- Left -->
                        <div class="w-full md:w-1/2 md:pr-12 md:text-right flex flex-col md:items-end border-l-2 border-gray-200 pl-4 md:border-none md:pl-0 ml-4 md:ml-0">
                            <span class="bg-[#E0F2FE] text-[#0284C7] text-[9px] font-bold px-3 py-1 uppercase tracking-widest rounded-full mb-3 w-max">{{ $timeline->date_label }}</span>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $timeline->title }}</h3>
                            <p class="text-gray-500 text-[13px] leading-relaxed">{{ $timeline->description }}</p>
                        </div>
                        <div class="hidden md:flex w-0 h-full items-center justify-center absolute left-1/2 transform -translate-x-1/2">
                            <div class="w-3 h-3 rounded-full bg-[#015B63] ring-4 ring-white z-10 border border-gray-200"></div>
                        </div>
                        <div class="w-full md:w-1/2 hidden md:block pl-12"></div>
                        @else
                        <!-- Right -->
                        <div class="w-full md:w-1/2 hidden md:block pr-12"></div>
                        <div class="hidden md:flex w-0 h-full items-center justify-center absolute left-1/2 transform -translate-x-1/2">
                            <div class="w-3 h-3 rounded-full bg-[#015B63] ring-4 ring-white z-10 border border-gray-200"></div>
                        </div>
                        <div class="w-full md:w-1/2 md:pl-12 flex flex-col items-start mt-6 md:mt-0 border-l-2 border-gray-200 pl-4 md:border-none md:pl-12 ml-4 md:ml-0">
                            <span class="bg-[#E0F2FE] text-[#0284C7] text-[9px] font-bold px-3 py-1 uppercase tracking-widest rounded-full mb-3 w-max">{{ $timeline->date_label }}</span>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $timeline->title }}</h3>
                            <p class="text-gray-500 text-[13px] leading-relaxed">{{ $timeline->description }}</p>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Langkah Pendaftaran -->
        <div class="mb-24 md:mb-32">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 tracking-tight">Langkah Pendaftaran</h2>
                <p class="text-gray-500 max-w-xl mx-auto text-[14px]">Panduan mudah untuk mendaftar di SMK Negeri 1 Maesan.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                @foreach(\App\Models\PpdbStep::orderBy('id')->get() as $step)
                <div class="bg-[#F1F5F9] rounded-[2rem] p-8 hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 rounded-2xl bg-white shadow-sm flex items-center justify-center text-[#015B63] mb-6">
                        {!! $step->icon ?? '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>' !!}
                    </div>
                    <h3 class="font-bold text-gray-900 mb-3">{{ $step->title }}</h3>
                    <p class="text-gray-500 text-[12px] leading-relaxed">{{ $step->description }}</p>
                </div>
                @endforeach

            </div>
        </div>

        <!-- CTA Section -->
        @if(isset($sections['cta']) && $sections['cta']->is_visible)
        @php $ctaData = is_array($sections['cta']->extra_data) ? $sections['cta']->extra_data : json_decode($sections['cta']->extra_data ?? '{}', true); @endphp
        <div>
            <div class="bg-[#E4EEEE] rounded-[2.5rem] relative overflow-hidden flex flex-col md:flex-row items-center shadow-sm">
                <!-- Decorative Graphic -->
                <img src="{{ $sections['cta']->image ? Storage::url($sections['cta']->image) : 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=800&auto=format&fit=crop' }}" onerror="this.src='https://placehold.co/800x400/E4EEEE/E4EEEE'" class="absolute right-0 top-0 h-full w-full md:w-1/2 object-cover opacity-30 mix-blend-multiply" alt="Student collaboration">
                <div class="absolute inset-0 bg-gradient-to-r from-[#E4EEEE] via-[#E4EEEE]/90 to-transparent z-0"></div>
                
                <div class="p-10 md:p-14 relative z-10 w-full md:w-2/3 lg:w-1/2 flex flex-col justify-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8 leading-tight tracking-tight">{{ $sections['cta']->title ?? 'Siap Bergabung dengan Keluarga Besar UNIK?' }}</h2>
                    
                    <div class="flex flex-col sm:flex-row gap-4 mb-6">
                        <a href="{{ route('pendaftaran.create') }}" class="bg-[#017A85] hover:bg-[#01656e] text-white text-sm font-bold px-8 py-3.5 rounded-full transition shadow-lg text-center">{{ $ctaData['button_primary_text'] ?? 'Daftar Online Sekarang' }}</a>
                        <a href="{{ $ctaData['button_secondary_link'] ?? '#' }}" class="bg-white hover:bg-gray-50 text-gray-800 text-sm font-bold px-8 py-3.5 rounded-full transition shadow-sm text-center border border-gray-100">{{ $ctaData['button_secondary_text'] ?? 'Unduh Brosur (PDF)' }}</a>
                    </div>
                    
                    <div class="flex items-center gap-2 text-[#015B63] text-sm">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="font-medium">{{ $ctaData['info_text'] ?? 'Pendaftaran gelombang pertama tersisa 5 hari lagi.' }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </main>

    <x-footer />

</body>
</html>
