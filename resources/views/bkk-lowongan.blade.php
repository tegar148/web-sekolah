<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Lowongan Kerja - SMK Negeri 1 Maesan</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Custom scrollbar for dropdowns or sidebars if needed */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #CBD5E1;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-[#F8FAFC] antialiased text-gray-800">
    
    <!-- Topbar Component -->
    <div class="sticky top-0 z-50 border-b border-gray-100 shadow-sm bg-white/95 backdrop-blur-sm">
        <x-topbar.navbar />
    </div>

    <!-- Hero Section (Dynamic from Admin) -->
    @if(!isset($sections['hero']) || $sections['hero']->is_visible)
    <header class="bg-[#2D3748] pt-24 pb-48 md:pt-32 md:pb-56 relative text-center text-white overflow-hidden">
        <!-- Subdued Background Pattern/Icon -->
        <div class="absolute inset-0 opacity-5 flex items-center justify-center">
            <svg class="w-96 h-96" fill="currentColor" viewBox="0 0 24 24"><path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
        </div>

        <div class="max-w-4xl mx-auto px-6 relative z-10 flex flex-col items-center">
            <span class="text-[#4DD0E1] text-[10px] font-bold px-3 py-1 uppercase tracking-[0.2em] mb-4 inline-flex items-center gap-2">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                BURSA KERJA KHUSUS
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight">Info Lowongan Kerja</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                Menjembatani lulusan SMK Negeri 1 Maesan dengan industri terkemuka. Temukan peluang karir terbaik yang sesuai dengan kompetensi keahlian Anda.
            </p>
        </div>
    </header>
    @endif

    <!-- Main Content Section (Overlapping Hero) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 -mt-24 md:-mt-32 relative z-20 pb-20">
        
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Left Sidebar (Filters & Proc) -->
            <div class="w-full lg:w-1/3 xl:w-1/4 flex flex-col gap-6 shrink-0">
                
                <!-- Filter Box -->
                <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-100 p-6">
                    <div class="flex items-center gap-2 mb-6 text-gray-800">
                        <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                        <h3 class="font-bold text-[15px]">Filter Lowongan</h3>
                    </div>

                    <!-- Search Input -->
                    <div class="mb-6">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">CARI PEKERJAAN</label>
                        <div class="relative relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input type="text" class="w-full bg-gray-50 border border-gray-100 text-sm rounded-xl pl-10 pr-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 transition placeholder-gray-400" placeholder="Keywords...">
                        </div>
                    </div>

                    <!-- Industry Dropdown -->
                    <div class="mb-6">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">INDUSTRI</label>
                        <div class="relative">
                            <select class="w-full bg-gray-50 border border-gray-100 text-sm text-gray-700 rounded-xl px-4 py-2.5 appearance-none focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 transition">
                                <option>Semua Industri</option>
                                <option>Teknologi & IT</option>
                                <option>Otomotif</option>
                                <option>Peternakan</option>
                                <option>Administrasi</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 py-2 pr-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Job Type -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-3">TIPE PEKERJAAN</label>
                        <div class="flex flex-wrap gap-2">
                            <button class="bg-[#E0F2FE] text-blue-700 font-semibold text-xs px-4 py-2 rounded-full border border-blue-100 transition hover:bg-blue-100">Full-time</button>
                            <button class="bg-gray-100 text-gray-600 font-medium text-xs px-4 py-2 rounded-full border border-transparent hover:bg-gray-200 transition">Magang</button>
                            <button class="bg-gray-100 text-gray-600 font-medium text-xs px-4 py-2 rounded-full border border-transparent hover:bg-gray-200 transition">Contract</button>
                        </div>
                    </div>
                </div>

                <!-- Prosedur Box -->
                <div class="bg-[#015B63] rounded-2xl shadow-sm border border-[#014a50] p-6 text-white">
                    <div class="flex items-center gap-2 mb-6">
                        <svg class="w-5 h-5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="font-bold text-[15px]">Prosedur</h3>
                    </div>

                    <div class="space-y-4 mb-8">
                        <div class="flex items-start gap-4">
                            <div class="w-6 h-6 rounded-full bg-white text-[#015B63] flex justify-center items-center font-bold text-xs shrink-0 mt-0.5">1</div>
                            <p class="text-[11px] text-teal-50 w-full leading-relaxed">Daftarkan diri Anda di database Alumni BKK Skama.</p>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-6 h-6 rounded-full bg-white text-[#015B63] flex justify-center items-center font-bold text-xs shrink-0 mt-0.5">2</div>
                            <p class="text-[11px] text-teal-50 w-full leading-relaxed">Siapkan berkas CV dan Portofolio dalam format PDF.</p>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-6 h-6 rounded-full bg-white text-[#015B63] flex justify-center items-center font-bold text-xs shrink-0 mt-0.5">3</div>
                            <p class="text-[11px] text-teal-50 w-full leading-relaxed">Klik "Lihat Detail" dan kirim lamaran melalui portal atau email yang tertera.</p>
                        </div>
                    </div>

                    <a href="#" class="block w-full bg-white text-[#015B63] text-center font-bold text-xs py-3 rounded-xl hover:bg-gray-50 transition shadow-sm">Hubungi BKK Skama</a>
                </div>

            </div>

            <!-- Right Content Area (Jobs List) -->
            <div class="w-full lg:w-2/3 xl:w-3/4 flex flex-col pt-1">
                
                <!-- Section Header -->
                <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-6 pb-2">
                    <h2 class="text-2xl font-bold text-gray-900 (sm:text-white lg:text-gray-900) z-10 hidden md:block" style="color: rgba(255, 255, 255, 0.9);">Lowongan Terbaru</h2>
                    <h2 class="text-2xl font-bold text-gray-900 md:hidden z-10 pt-8 mt-12">Lowongan Terbaru</h2>
                    <p class="text-[11px] text-gray-300 font-medium md:text-gray-400 z-10" style="color: rgba(255, 255, 255, 0.6);">Menampilkan {{ isset($lowongans) ? $lowongans->total() : 0 }} Lowongan Aktif</p>
                </div>
                
                <style>
                    /* A small hack to easily make the text color adaptive depending on overlap */
                    @media (min-width: 768px) {
                        .adaptive-title { color: #f8fafc !important; }
                        .adaptive-subtitle { color: #cbd5e1 !important; }
                    }
                    @media (min-width: 1024px) {
                         /* For lg screens, it might be safe if margin is tight */
                    }
                </style>
                <script>
                    // Apply adaptive classes
                    document.querySelector('h2.hidden').classList.add('adaptive-title');
                    document.querySelector('p.z-10').classList.add('adaptive-subtitle');
                </script>

                <!-- Job List -->
                <div class="flex flex-col gap-4">
                    @if(isset($lowongans) && $lowongans->count() > 0)
                        @foreach($lowongans as $lowongan)
                        <!-- Job Card -->
                        <div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 p-5 flex flex-col md:flex-row gap-5 items-start md:items-center hover:border-teal-100 hover:shadow-md transition duration-300">
                            <div class="w-16 h-16 rounded-xl bg-gray-50 border border-gray-100 flex items-center justify-center p-3 shrink-0">
                                @if($lowongan->logo_path)
                                <img src="{{ Storage::url($lowongan->logo_path) }}" alt="{{ $lowongan->company }}" class="w-full h-full object-contain rounded opacity-90">
                                @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($lowongan->company) }}&background=e2e8f0&color=475569&font-size=0.33" alt="{{ $lowongan->company }}" class="w-full h-full object-contain rounded opacity-70">
                                @endif
                            </div>
                            <div class="flex-1 w-full">
                                <div class="flex items-center gap-3 mb-1">
                                    <h3 class="text-base font-bold text-gray-900">{{ $lowongan->title }}</h3>
                                    @if($lowongan->status_label)
                                    <span class="bg-blue-100 text-blue-700 text-[9px] font-bold uppercase tracking-widest px-2 py-0.5 rounded-md">{{ $lowongan->status_label }}</span>
                                    @endif
                                </div>
                                <p class="text-[13px] text-gray-500 font-medium mb-3">{{ $lowongan->company }}</p>
                                
                                <div class="flex flex-wrap gap-y-2 gap-x-5 text-[11px] text-gray-500">
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        {{ $lowongan->location }}
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Deadline: {{ \Carbon\Carbon::parse($lowongan->deadline)->format('d M Y') }}
                                    </div>
                                    @if($lowongan->salary_range)
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                        {{ $lowongan->salary_range }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-4 md:mt-0 w-full md:w-auto flex justify-end shrink-0">
                                @if($lowongan->link)
                                <a href="{{ $lowongan->link }}" target="_blank" class="bg-[#017A85] hover:bg-[#01656e] text-white text-xs font-bold px-6 py-2.5 rounded-lg transition text-center w-full md:w-auto">Lihat Detail</a>
                                @else
                                <span class="bg-gray-100 text-gray-500 text-xs font-bold px-6 py-2.5 rounded-lg text-center w-full md:w-auto cursor-not-allowed">Ditutup</span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-12 text-center">
                            <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                            <h3 class="text-lg font-bold text-gray-900 mb-1">Belum Ada Lowongan</h3>
                            <p class="text-sm text-gray-500">Saat ini belum ada informasi lowongan kerja yang tersedia.</p>
                        </div>
                    @endif
                </div>

                <!-- Pagination -->
                @if(isset($lowongans) && $lowongans->hasPages())
                <div class="mt-12 flex justify-center items-center gap-2">
                    {{ $lowongans->links() }}
                </div>
                @endif

            </div>
        </div>

    </section>

    <x-footer />

</body>
</html>
