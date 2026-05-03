<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teknik Komputer & Jaringan (TKJ) - SMK Negeri 1 Maesan</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#F8FAFC] antialiased text-gray-800">
    
    <!-- Topbar Component -->
    <div class="sticky top-0 z-50 border-b border-gray-100 shadow-sm bg-white/95 backdrop-blur-sm">
        <x-topbar.navbar />
    </div>

    <!-- Hero Section (Dynamic from Admin) -->
    @if(!isset($sections['hero']) || $sections['hero']->is_visible)
    <header class="bg-[#2D3748] py-24 md:py-32 relative text-center text-white">
        <div class="max-w-4xl mx-auto px-6 relative z-10 flex flex-col items-center">
            <span class="bg-blue-900/50 text-blue-300 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest border border-blue-700/50 mb-6 inline-block">PROGRAM KEAHLIAN</span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Teknik Komputer & Jaringan' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                {{ $sections['hero']->subtitle ?? 'Melangkah ke era digital dengan keahlian implementasi infrastruktur cloud, manajemen keamanan server, dan topologi jaringan canggih.' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Tentang Jurusan -->
    <section class="max-w-6xl mx-auto px-6 py-20 flex flex-col md:flex-row gap-16 items-center">
        <div class="w-full md:w-1/2 relative">
            <div class="absolute -inset-4 bg-blue-50 rounded-[2.5rem] -z-10 transform rotate-3"></div>
            @if(isset($sections['content']) && $sections['content']->image)
                <img class="rounded-3xl shadow-xl aspect-[4/5] object-cover w-full border-4 border-white" src="{{ Storage::url($sections['content']->image) }}" alt="Siswa belajar tentang jaringan">
            @else
                <img class="rounded-3xl shadow-xl aspect-[4/5] object-cover w-full border-4 border-white" src="https://images.unsplash.com/photo-1544197150-b99a580bb7a8?q=80&w=800&auto=format&fit=crop" onerror="this.src='https://placehold.co/800x1000/e2e8f0/64748b?text=Network+Servers'" alt="Siswa belajar tentang jaringan">
            @endif
        </div>
        <div class="w-full md:w-1/2">
            <h4 class="text-xs font-extrabold text-blue-600 uppercase tracking-widest mb-3">TENTANG JURUSAN</h4>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">Teknisi Jaringan yang Siap Mengubah Ekosistem Digital.</h2>
            <p class="text-gray-600 mb-4 leading-relaxed">
                Jurusan Teknik Komputer & Jaringan (TKJ) memfokuskan siswa kami kepada kehebatan rekayasa arsitektur IT. Mulai dari merakit perangkat keras dasar hingga konfigurasi rumit router tingkat provider, semuanya dipelajari di sini.
            </p>
            <p class="text-gray-600 mb-8 leading-relaxed">
                Modul praktik TKJ kami selalu mengikuti panduan dari raksasa IT global. Lulusan diproyeksikan sebagai ujung tombak modernisasi operasional berbasis cloud, merespon pesatnya kebutuhan perusahaan lokal maupun glokal.
            </p>
            <div class="flex flex-wrap gap-12 border-t border-gray-100 pt-8">
                <div>
                    <h3 class="text-2xl md:text-3xl font-bold text-blue-600">Top 5</h3>
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest mt-1">Jurusan Favorit</p>
                </div>
                <div>
                    <h3 class="text-2xl md:text-3xl font-bold text-blue-600">Terbuka</h3>
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest mt-1">Fiber Optic Lab</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Prospek Karir -->
    @if(!isset($sections['prospek_karir']) || $sections['prospek_karir']->is_visible)
    @php
        $prospek_karir_data = isset($sections['prospek_karir']) ? json_decode($sections['prospek_karir']->content, true) : [];
        if (!is_array($prospek_karir_data)) $prospek_karir_data = [];
    @endphp
    <section class="bg-gray-50 py-20 border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-6 text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $sections['prospek_karir']->title ?? 'Prospek Karir Lulusan' }}</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">{{ $sections['prospek_karir']->subtitle ?? 'Setiap perusahaan, perkantoran, dan industri sangat membutuhkan kepiawaian pakar IT dan Jaringan.' }}</p>
        </div>
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($prospek_karir_data as $i => $role)
                @if(($role['type'] ?? '') === 'wide')
                <!-- Wide Card -->
                <div class="md:col-span-2 bg-white rounded-[2rem] p-8 shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                    <div class="flex justify-between items-start mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                        </div>
                        <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest border border-gray-100 px-3 py-1 rounded-full">TOP ROLE</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $role['title'] ?? '' }}</h3>
                    <p class="text-gray-500 text-sm mb-6 max-w-sm flex-1 leading-relaxed">{{ $role['desc'] ?? '' }}</p>
                    <div class="flex flex-wrap gap-2">
                        @if(!empty($role['tags']))
                            @foreach(explode(',', $role['tags']) as $tag)
                                <span class="bg-gray-50 border border-gray-100 text-gray-600 text-[10px] font-bold uppercase px-3 py-1 rounded-md">{{ trim($tag) }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                @elseif(($role['type'] ?? '') === 'solid')
                <!-- Solid Card -->
                <div class="md:col-span-1 bg-[#1A56DB] rounded-[2rem] p-8 shadow-md text-white relative overflow-hidden flex flex-col hover:-translate-y-1 transition duration-300">
                    <div class="absolute -right-16 -bottom-16 w-48 h-48 bg-white/10 rounded-full border-[20px] border-white/5 opacity-50 z-0"></div>
                    <div class="z-10 flex-1">
                        <div class="w-10 h-10 rounded-xl bg-white/20 text-white flex items-center justify-center mb-6 backdrop-blur-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">{{ $role['title'] ?? '' }}</h3>
                        <p class="text-white/80 text-sm leading-relaxed">{{ $role['desc'] ?? '' }}</p>
                    </div>
                </div>
                @else
                <!-- Small Card -->
                <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-5
                        @if($i == 2) bg-gray-100 text-gray-600
                        @elseif($i == 3) bg-red-50 text-red-600
                        @else bg-blue-50 text-blue-600 @endif
                    ">
                        @if($i == 2)
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        @elseif($i == 3)
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                        @else
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                        @endif
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 mb-2">{{ $role['title'] ?? '' }}</h3>
                    <p class="text-[11px] text-gray-500 leading-relaxed flex-1">{{ $role['desc'] ?? '' }}</p>
                </div>
                @endif
            @endforeach
        </div>
    </section>
    @endif

    <!-- Fasilitas Pembelajaran -->
    @if(!isset($sections['fasilitas_jurusan']) || $sections['fasilitas_jurusan']->is_visible)
    @php
        $fasilitas_data = isset($sections['fasilitas_jurusan']) ? json_decode($sections['fasilitas_jurusan']->content, true) : [];
        if (!is_array($fasilitas_data)) $fasilitas_data = [];
    @endphp
    <section class="max-w-6xl mx-auto px-6 py-20 overflow-hidden">
        <div class="mb-12 text-center md:text-left">
            <h2 class="text-3xl font-bold text-gray-900 mb-3">{{ $sections['fasilitas_jurusan']->title ?? 'Fasilitas Pembelajaran IT' }}</h2>
            <p class="text-gray-500 max-w-xl">{{ $sections['fasilitas_jurusan']->subtitle ?? 'Dilengkapi gawai berstrata industri teknologi guna akselerasi kemampuan kognitif digital.' }}</p>
        </div>
        
        <div class="flex overflow-x-auto gap-8 pb-8 snap-x snap-mandatory scrollbar-hide" style="scrollbar-width: none; -ms-overflow-style: none;">
            @foreach($fasilitas_data as $i => $item)
            <div class="flex-none w-[85%] sm:w-[60%] md:w-[45%] lg:w-[40%] snap-center group cursor-pointer">
                <div class="relative h-72 rounded-[2rem] overflow-hidden mb-6 shadow-sm border border-gray-100">
                    <img src="{{ !empty($item['image']) ? $item['image'] : 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?q=80&w=800&auto=format&fit=crop' }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ $item['title'] ?? 'Fasilitas' }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent flex flex-col justify-end p-8">
                        @if(!empty($item['tag']))
                        <span class="bg-blue-500 text-white text-[9px] font-bold px-2 py-1 rounded uppercase tracking-widest w-max mb-3">{{ $item['tag'] }}</span>
                        @endif
                        <h3 class="text-2xl font-bold text-white">{{ $item['title'] ?? '' }}</h3>
                    </div>
                </div>
                <p class="text-gray-500 text-[11px] leading-relaxed px-2">{{ $item['desc'] ?? '' }}</p>
            </div>
            @endforeach
        </div>
        <style>
            .scrollbar-hide::-webkit-scrollbar { display: none; }
        </style>
    </section>
    @endif

    <!-- CTA Section -->
    @if(!isset($sections['cta']) || $sections['cta']->is_visible)
    <section class="max-w-5xl mx-auto px-6 pb-20 mt-10">
        <div class="bg-[#2D3748] rounded-[2.5rem] p-12 md:p-16 text-center text-white relative overflow-hidden shadow-2xl">
            <!-- Decorative blur shapes -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500/20 rounded-full blur-[80px]"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-indigo-500/20 rounded-full blur-[80px]"></div>
            
            <div class="relative z-10">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 tracking-tight">{{ $sections['cta']->title ?? 'Koneksikan Masa Depanmu Disini!' }}</h2>
                <p class="text-gray-400 mb-10 max-w-lg mx-auto leading-relaxed text-sm">{{ $sections['cta']->subtitle ?? 'Pendaftaran peserta didik baru jurusan TKJ 2024/2025 dengan kurikulum merdeka kini dibuka.' }}</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ $sections['cta']->button_link ?? '#' }}" class="bg-blue-600 hover:bg-blue-500 text-white text-sm font-bold px-8 py-3.5 rounded-full transition shadow-lg shadow-blue-500/20">{{ $sections['cta']->button_text ?? 'Daftar Sekarang' }}</a>
                    <a href="#" class="bg-gray-700/50 hover:bg-gray-700 text-white text-sm font-semibold border border-gray-600 px-8 py-3.5 rounded-full transition">Info Tambahan</a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <x-footer />

</body>
</html>
