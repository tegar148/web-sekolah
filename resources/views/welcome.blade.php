<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 1 Maesan</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8FAFC] antialiased text-gray-800">
    
    <!-- Topbar Component -->
    <div class="sticky top-0 z-50 border-b border-gray-100 shadow-sm bg-white/95 backdrop-blur-sm">
        <x-topbar.navbar />
    </div>

    <!-- Hero Section (Dynamic from Admin) -->
    @if(!isset($sections['hero']) || $sections['hero']->is_visible)
    <header class="relative bg-[#E8EDF2] bg-cover bg-center overflow-hidden min-h-[70vh] flex flex-col justify-center"
            style="{{ isset($sections['hero']) && $sections['hero']->image ? 'background-image: url(' . Storage::url($sections['hero']->image) . ');' : '' }}">
        
        @if(isset($sections['hero']) && $sections['hero']->image)
            <div class="absolute inset-0 bg-black/60 z-0"></div>
        @endif

        <!-- Abstract gradient background representing modern tech/education -->
        @if(!isset($sections['hero']) || !$sections['hero']->image)
        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-white to-transparent h-32 z-10 w-full"></div>
        <div class="absolute top-0 right-0 w-1/2 h-full opacity-30 pointer-events-none hidden md:block">
            <svg viewBox="0 0 400 400" fill="none" class="w-full h-full text-blue-100" xmlns="http://www.w3.org/2000/svg">
                <circle cx="200" cy="200" r="180" stroke="currentColor" stroke-width="40"/>
                <circle cx="350" cy="100" r="80" stroke="#E2E8F0" stroke-width="20"/>
            </svg>
        </div>
        @endif
        
        <div class="max-w-6xl mx-auto px-6 md:px-12 relative z-20 w-full py-20 flex flex-col items-center text-center">
            <h3 class="text-[10px] font-bold text-blue-700 uppercase tracking-widest mb-6 bg-blue-100 border border-blue-200 inline-block px-4 py-1.5 rounded shadow-sm">
                {{ $sections['hero']->button_text ?? 'DIGITAL & PREMIUM EXPERIENCE' }}
            </h3>
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-bold {{ isset($sections['hero']) && $sections['hero']->image ? 'text-white' : 'text-[#111827]' }} leading-tight mb-4 tracking-tight">
                {!! nl2br(e($sections['hero']->title ?? 'Nurturing Potential into Professional Mastery')) !!}
            </h1>
            <p class="mt-4 {{ isset($sections['hero']) && $sections['hero']->image ? 'text-gray-200' : 'text-gray-500' }} max-w-2xl text-base md:text-xl font-light">
                {{ $sections['hero']->subtitle ?? 'A sanctuary for technical innovation and academic rigor, SMK Negeri 1 Maesan bridges the gap between traditional learning and modern industry demands.' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Sambutan Component (Admin Toggle) -->
    @if(!isset($sections['sambutan']) || $sections['sambutan']->is_visible)
    <x-about.sambutan />
    @endif

    <!-- Berita Section (Admin Toggle) -->
    @if(!isset($sections['berita']) || $sections['berita']->is_visible)
    <section class="py-16 md:py-32 bg-[#F8FAFC]">
        <div class="max-w-6xl mx-auto px-6 md:px-12">
            <div class="flex justify-between items-end mb-8 md:mb-12 border-b border-gray-200 pb-5">
                <div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">HAPPENINGS AT MAESAN</p>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                        Berita
                    </h2>
                </div>
                <a href="{{ route('berita') }}" class="text-[11px] font-bold text-gray-400 hover:text-blue-600 hidden md:flex tracking-widest uppercase items-center gap-1">
                    EXPLORE ALL ARTICLES <span class="text-lg leading-none">&rarr;</span>
                </a>
            </div>
            
            @php $beritaItems = $beritas->take(3); @endphp
            <div class="{{ $beritaItems->count() > 1 ? 'flex overflow-x-auto snap-x snap-mandatory hide-scrollbar -mx-6 px-6' : 'flex justify-center' }} md:grid md:grid-cols-3 gap-6 md:gap-8 md:mx-0 md:px-0 pb-4 md:pb-0">
                @forelse($beritaItems as $item)
                <div class="{{ $beritaItems->count() > 1 ? 'snap-center shrink-0' : '' }} w-[85vw] max-w-[320px] md:w-auto md:max-w-none bg-white rounded-lg border border-gray-100 shadow-sm overflow-hidden hover:shadow-xl transition-shadow duration-300 group flex flex-col">
                    <div class="w-full h-56 bg-slate-900 relative overflow-hidden shrink-0">
                        @if($item->image_src)
                        <img src="{{ $item->image_src }}" alt="{{ $item->title }}" class="w-full h-full object-cover opacity-80 group-hover:scale-105 group-hover:opacity-100 transition-all duration-700" referrerpolicy="no-referrer">
                        @endif
                        <div class="absolute top-4 left-4 bg-[#111827] text-white text-[9px] font-bold tracking-widest uppercase px-3 py-1 shadow">{{ $item->category }}</div>
                    </div>
                    <div class="p-6 md:p-8 flex-1 flex flex-col">
                        <p class="text-[10px] text-gray-400 mb-3 uppercase tracking-widest font-semibold flex items-center gap-2">
                            <span class="w-4 h-[1px] bg-gray-300 block"></span> {{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}
                        </p>
                        <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-4 leading-snug group-hover:text-blue-600 transition-colors">{{ $item->title }}</h3>
                        @if($item->excerpt)
                        <p class="text-sm text-gray-500 line-clamp-3 mb-6">{{ $item->excerpt }}</p>
                        @endif
                        <div class="mt-auto">
                            <a href="{{ $item->berita_url }}" {{ $item->is_external ? 'target="_blank" rel="noopener noreferrer"' : '' }} class="text-[11px] font-bold text-gray-900 group-hover:text-blue-600 uppercase tracking-widest border-b border-gray-300 group-hover:border-blue-600 transition-colors pb-1">
                                {{ $item->is_external ? 'BUKA LINK' : 'READ MORE' }} <span class="text-lg leading-none relative top-[1px]">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full min-w-full py-12 text-center text-gray-500">
                    Belum ada berita yang dipublikasikan.
                </div>
                @endforelse
            </div>

            <!-- Mobile Explore Button -->
            <div class="mt-6 md:hidden text-center">
                <a href="{{ route('berita') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#1C2331] text-white text-[11px] font-bold tracking-widest uppercase rounded-lg shadow-md hover:bg-gray-800 transition w-full">
                    EXPLORE ALL ARTICLES <span class="text-lg leading-none">&rarr;</span>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Kemitraan / Partners Section (Admin Toggle) -->
    @if(!isset($sections['mitra_alumni']) || $sections['mitra_alumni']->is_visible)
    <section class="py-16 md:py-24 bg-white relative overflow-hidden">
         <div class="max-w-6xl mx-auto px-6 md:px-12 text-center">
             <h4 class="text-[10px] font-bold text-blue-600 uppercase tracking-widest mb-3">KEMITRAAN</h4>
             <h2 class="text-2xl md:text-5xl font-bold text-gray-900 mb-4 md:mb-6">{{ $sections['mitra_alumni']->title ?? 'Mitra & Kerja Sama' }}</h2>
             <p class="text-gray-500 max-w-2xl mx-auto mb-12 md:mb-20 text-sm md:text-base">{{ $sections['mitra_alumni']->subtitle ?? 'Bersama mitra terpercaya kami terus berkembang dan memberikan yang terbaik.' }}</p>
         </div>

         <!-- Auto-Scrolling Marquee -->
         @php
             $rawPartners = isset($sections['mitra_alumni']) && $sections['mitra_alumni']->content ? json_decode($sections['mitra_alumni']->content, true) : [];
             if (!is_array($rawPartners)) $rawPartners = [];
             
             // Filter legacy data (array of objects) to only keep strings (image paths)
             $partners = array_filter($rawPartners, function($item) {
                 return is_string($item);
             });
             
             // Duplicate array multiple times for seamless infinite scroll if items are too few
             $marqueePartners = count($partners) > 0 ? array_merge($partners, $partners, $partners, $partners) : [];
         @endphp

         @if(count($partners) > 0)
         <div class="relative w-full overflow-hidden pb-10">
             <style>
                 @keyframes scroll-left {
                     0% { transform: translateX(0); }
                     100% { transform: translateX(calc(-100% / 4)); }
                 }
                 .animate-marquee {
                     display: flex;
                     width: max-content;
                     animation: scroll-left 40s linear infinite;
                 }
                 .animate-marquee:hover {
                     animation-play-state: paused;
                 }
             </style>
             <div class="animate-marquee gap-4 md:gap-6 px-4 md:px-6">
                 @foreach($marqueePartners as $partnerLogo)
                 <div class="w-40 h-28 md:w-56 md:h-36 bg-white rounded-2xl shadow-sm border border-gray-100 flex items-center justify-center p-6 shrink-0 hover:shadow-md hover:border-gray-200 transition duration-300">
                     <img src="{{ Storage::url($partnerLogo) }}" alt="Partner Logo" class="max-w-full max-h-full object-contain grayscale hover:grayscale-0 transition duration-500">
                 </div>
                 @endforeach
             </div>
         </div>
         @else
         <!-- Placeholder if no images uploaded -->
         <div class="max-w-6xl mx-auto px-6 md:px-12 text-center pb-10">
             <div class="flex justify-center flex-wrap gap-x-12 gap-y-6 opacity-30 grayscale filter">
                 <div class="h-6 w-24 bg-gray-400 rounded-sm"></div>
                 <div class="h-6 w-28 bg-gray-400 rounded-sm"></div>
                 <div class="h-6 w-24 bg-gray-400 rounded-sm"></div>
                 <div class="h-6 w-32 bg-gray-400 rounded-sm"></div>
             </div>
         </div>
         @endif
    </section>
    @endif

    <!-- Minat Jurusan Section -->
    @php
        $jurusanTotal   = array_sum($jurusanStats);
        $jurusanPalette = ['#017A85', '#3B82F6', '#8B5CF6', '#F59E0B', '#10B981', '#EF4444'];
        $jurusanLabels  = array_keys($jurusanStats);
        $jurusanCounts  = array_values($jurusanStats);
        $jurusanBg      = [];
        foreach ($jurusanLabels as $i => $_) {
            $jurusanBg[] = $jurusanPalette[$i % count($jurusanPalette)];
        }
    @endphp
    <section class="py-10 md:py-14 bg-white">
        <div class="max-w-6xl mx-auto px-6 md:px-12">
            <!-- Header -->
            <div class="mb-12 md:mb-16 border-b border-gray-100 pb-6">
                <p class="text-[10px] font-bold text-[#017A85] uppercase tracking-widest mb-2">STATISTIK PRA-PPDB</p>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Minat Jurusan Calon Peserta Didik</h2>
                <p class="text-sm text-gray-500 mt-2 max-w-xl">Distribusi pilihan jurusan berdasarkan data formulir Pra-PPDB yang telah masuk.</p>
            </div>

            @if($jurusanTotal > 0)
            <div class="flex flex-col md:flex-row items-center md:items-start gap-12 md:gap-20">

                <!-- Donut Chart -->
                <div class="shrink-0 flex flex-col items-center">
                    <div class="relative" style="width:220px;height:220px">
                        <canvas id="welcomeChartJurusan" style="width:220px;height:220px;display:block"></canvas>
                        <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                            <p class="text-4xl font-black text-gray-900">{{ $jurusanTotal }}</p>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1">Calon Pendaftar</p>
                        </div>
                    </div>
                    <p class="text-[10px] text-gray-400 uppercase tracking-widest font-bold mt-4">Total Minat Tercatat</p>
                </div>

                <!-- Legend & Bars -->
                <div class="flex-1 w-full space-y-5">
                    @foreach($jurusanStats as $jurusan => $count)
                    @php
                        $idx        = array_search($jurusan, $jurusanLabels);
                        $color      = $jurusanPalette[$idx % count($jurusanPalette)];
                        $pct        = $jurusanTotal > 0 ? round($count / $jurusanTotal * 100) : 0;
                        $isTop      = $loop->first;
                    @endphp
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <div class="flex items-center gap-2.5">
                                <span class="w-3 h-3 rounded-full shrink-0" style="background:{{ $color }}"></span>
                                <span class="text-sm font-{{ $isTop ? 'bold' : 'medium' }} text-gray-{{ $isTop ? '900' : '700' }}">
                                    {{ $jurusan }}
                                    @if($isTop)
                                    <span class="ml-2 text-[9px] font-black uppercase tracking-widest text-[#017A85] bg-teal-50 px-2 py-0.5 rounded-full">TERPOPULER</span>
                                    @endif
                                </span>
                            </div>
                            <div class="text-right shrink-0 ml-4">
                                <span class="text-sm font-bold text-gray-900">{{ $count }}</span>
                                <span class="text-xs text-gray-400 ml-1">{{ $pct }}%</span>
                            </div>
                        </div>
                        <!-- Progress bar -->
                        <div class="w-full bg-gray-100 rounded-full h-2">
                            <div class="h-2 rounded-full" style="width:{{ $pct }}%;background:{{ $color }}"></div>
                        </div>
                    </div>
                    @endforeach

                    <p class="text-[10px] text-gray-400 pt-4 border-t border-gray-100">
                        * Data diambil dari formulir Pra-PPDB yang telah dikirimkan. Angka dapat berubah seiring waktu.
                    </p>
                </div>
            </div>
            @else
            <!-- Empty state -->
            <div class="flex flex-col items-center justify-center py-16 text-center">
                <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/></svg>
                </div>
                <p class="text-sm text-gray-400 font-medium">Data Pra-PPDB belum tersedia.</p>
                <a href="{{ route('pendaftaran.create') }}" class="mt-4 text-[11px] font-bold text-[#017A85] uppercase tracking-widest border-b border-[#017A85] pb-0.5">Daftar Sekarang →</a>
            </div>
            @endif
        </div>
    </section>

    <!-- Chart.js for Jurusan Donut -->
    @if($jurusanTotal > 0)
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
    (function () {
        var el = document.getElementById('welcomeChartJurusan');
        if (!el) return;
        new Chart(el, {
            type: 'doughnut',
            data: {
                labels: @json($jurusanLabels),
                datasets: [{
                    data: @json($jurusanCounts),
                    backgroundColor: @json($jurusanBg),
                    borderWidth: 4,
                    borderColor: '#ffffff',
                }]
            },
            options: {
                cutout: '74%',
                animation: false,
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(ctx) {
                                var total = ctx.dataset.data.reduce(function(a,b){return a+b;}, 0);
                                return ' ' + ctx.label + ': ' + ctx.parsed + ' (' + Math.round(ctx.parsed/total*100) + '%)';
                            }
                        }
                    }
                }
            }
        });
    })();
    </script>
    @endif

    <!-- Stats Banner Section (Admin Toggle) -->
    @if(!isset($sections['stats']) || $sections['stats']->is_visible)
    <section class="bg-[#1C2331] text-white py-24 relative overflow-hidden">
        <!-- Abstract background pattern -->
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#3b82f6 1px, transparent 1px); background-size: 30px 30px;"></div>
        
        <div class="max-w-6xl mx-auto px-6 md:px-12 flex flex-col lg:flex-row gap-16 items-center relative z-10">
            <div class="w-full lg:w-1/2">
                <h4 class="text-[10px] font-bold tracking-widest text-blue-400 uppercase mb-4 opacity-80">PENGABDIAN & PRESTASI</h4>
                <h2 class="text-3xl md:text-5xl font-bold leading-tight mb-6">Membangun Fondasi Peradaban Melalui Keahlian</h2>
                <p class="text-gray-400 text-sm leading-relaxed mb-10 font-light pr-4">SMK Negeri 1 MAESAN menggagas model pembelajaran 'Advanced Digital' di mana kelas kolaboratif klasik bertemu dengan referensi teknologi modern. Kami percaya pada pendidikan vokasional sebagai instrumen vital mencetak masa depan.</p>
                <div class="flex items-center gap-5 bg-[#252E40] border border-white/5 p-5 rounded-sm shadow-xl max-w-sm">
                    <div class="w-12 h-12 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-400 text-lg">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                    </div>
                    <div>
                        <p class="font-bold text-sm text-gray-200">Akreditasi Utama A+</p>
                        <p class="text-[11px] text-gray-500 mt-1">Standar kualitas nasional tertinggi untuk institusi pendidikan vokasi terpadu.</p>
                    </div>
                </div>
            </div>
            
            <div class="w-full lg:w-1/2 grid grid-cols-2 gap-px bg-[#2A3447] border border-[#2A3447]">
                <div class="bg-[#1C2331] p-10 hover:bg-[#202838] transition border-t-2 border-transparent hover:border-blue-500">
                    <h3 class="text-4xl md:text-5xl font-bold text-white mb-2 tracking-tight">25+</h3>
                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">TAHUN DEDIKASI</p>
                    <p class="text-[10px] text-gray-500 mt-2">Pengalaman Edukasi</p>
                </div>
                <div class="bg-[#1C2331] p-10 hover:bg-[#202838] transition border-t-2 border-transparent hover:border-blue-500">
                    <h3 class="text-4xl md:text-5xl font-bold text-white mb-2 tracking-tight">1.2K</h3>
                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">SISWA AKTIF</p>
                    <p class="text-[10px] text-gray-500 mt-2">Duta Vokasi</p>
                </div>
                <div class="bg-[#1C2331] p-10 hover:bg-[#202838] transition border-t-2 border-transparent hover:border-blue-500">
                    <h3 class="text-4xl md:text-5xl font-bold text-white mb-2 tracking-tight">4.5K</h3>
                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">ALUMNI SUKSES</p>
                    <p class="text-[10px] text-gray-500 mt-2">Tersebar di Industri</p>
                </div>
                <div class="bg-[#1C2331] p-10 hover:bg-[#202838] transition border-t-2 border-transparent hover:border-blue-500">
                    <h3 class="text-4xl md:text-5xl font-bold text-white mb-2 tracking-tight">85+</h3>
                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">PENGHARGAAN</p>
                    <p class="text-[10px] text-gray-500 mt-2">Prestasi Nasional</p>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Footer Section -->
    <x-footer />
</body>
</html>
