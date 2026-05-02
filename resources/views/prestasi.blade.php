<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestasi - SMK Negeri 1 Maesan</title>
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
        <div class="max-w-4xl mx-auto px-6 relative z-10">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Prestasi' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                {{ $sections['hero']->subtitle ?? 'Informasi terkini seputar pencapaian dan keunggulan siswa-siswi SMK Negeri 1 Maesan' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Content Section -->
    <section class="py-16 md:py-24 max-w-7xl mx-auto px-6 md:px-12">
        <!-- Header & Filters -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-6">
            <div class="max-w-xl">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Etalase Keunggulan</h2>
                <p class="text-gray-500 text-sm md:text-base leading-relaxed">
                    Koleksi prestasi siswa-siswi terbaik kami dalam berbagai bidang kompetisi dari tingkat kabupaten hingga internasional.
                </p>
            </div>
            <div class="flex flex-wrap items-center bg-white p-1.5 rounded-full shadow-sm border border-gray-100 gap-1">
                <button class="filter-btn px-6 py-2 bg-[#026773] text-white text-sm font-semibold rounded-full shadow-sm transition" data-filter="all">Semua</button>
                <button class="filter-btn px-6 py-2 text-gray-500 hover:bg-gray-50 hover:text-gray-900 text-sm font-medium rounded-full transition" data-filter="vokasi">Vokasi</button>
                <button class="filter-btn px-6 py-2 text-gray-500 hover:bg-gray-50 hover:text-gray-900 text-sm font-medium rounded-full transition" data-filter="akademik">Akademik</button>
                <button class="filter-btn px-6 py-2 text-gray-500 hover:bg-gray-50 hover:text-gray-900 text-sm font-medium rounded-full transition" data-filter="non-akademik">Non-Akademik</button>
            </div>
        </div>

        <!-- Grid of Achievements -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16" id="prestasi-grid">
            @forelse($prestasis as $item)
            @php
                $catColor = match($item->category) {
                    'akademik'      => 'bg-blue-600',
                    'non-akademik'  => 'bg-purple-500',
                    default         => 'bg-blue-500',
                };
                $isNasional = str_contains(strtolower($item->location), 'nasional') || str_contains(strtolower($item->location), 'internasional');
            @endphp
            <div class="prestasi-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 flex flex-col hover:shadow-lg transition-shadow duration-300 group" data-category="{{ $item->category }}">
                <div class="relative h-56 w-full overflow-hidden bg-gray-100">
                    @if($item->image_path)
                    <img src="{{ Storage::url($item->image_path) }}" onerror="this.src='https://placehold.co/600x400/e2e8f0/64748b?text=Prestasi'" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200">
                        <svg class="w-16 h-16 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" /></svg>
                    </div>
                    @endif
                    <div class="absolute top-4 left-4 {{ $catColor }} text-white text-[10px] font-bold tracking-wider uppercase px-3 py-1 rounded shadow-sm">{{ strtoupper($item->category) }}</div>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex items-center gap-2 mb-3 text-teal-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        <span class="text-xs font-bold uppercase tracking-wide">{{ $item->achievement }}</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 leading-snug mb-6 flex-1">{{ $item->title }}</h3>
                    <div class="flex justify-between items-center text-[11px] text-gray-500 pt-4 border-t border-gray-50">
                        <div class="flex items-center gap-1.5">
                            @if($isNasional)
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            @else
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            @endif
                            <span>{{ $item->location }}</span>
                        </div>
                        <span>{{ $item->event_date }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-16 text-center">
                <p class="text-gray-400 text-lg font-medium">Belum ada data prestasi yang ditambahkan.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($prestasis->hasPages())
        <div class="mt-4 border-t border-gray-100 pt-6">
            {{ $prestasis->links() }}
        </div>
        @endif
    </section>

    <!-- Footer Content like image -->
    <footer class="bg-white pt-16 pb-8 border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-6 md:px-12 grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            <div>
                <h4 class="font-bold text-blue-600 mb-4">SMK Negeri 1 MAESAN</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed font-light">
                    Mencetak generasi Unggul, Inovatif, dan Berkarakter siap menghadapi tantangan masa depan.
                </p>
            </div>
            <div>
                <h4 class="font-semibold text-gray-800 text-sm mb-4">Tautan Terkait</h4>
                <ul class="space-y-3 text-[11px] text-gray-500">
                    <li><a href="#" class="hover:text-blue-600 transition">Profil BKK Skama</a></li>
                    <li><a href="#" class="hover:text-blue-600 transition">Info Lowongan Kerja</a></li>
                    <li><a href="#" class="hover:text-blue-600 transition">Kontak</a></li>
                    <li><a href="#" class="hover:text-blue-600 transition">Peta Situs</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-gray-800 text-sm mb-4">Lokasi</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed">
                    Jl. Raya Maesan No. 123<br>
                    Bondowoso, Jawa Timur<br>
                    Indonesia
                </p>
            </div>
            <div>
                <h4 class="font-semibold text-gray-800 text-sm mb-4">Kontak</h4>
                <ul class="space-y-3 text-[11px] text-gray-500">
                    <li>info@smkn1maesan.sch.id</li>
                    <li>+62 (332) 421 000</li>
                </ul>
            </div>
        </div>
        <div class="max-w-6xl mx-auto px-6 md:px-12 pt-6 border-t border-gray-100 text-center">
            <p class="text-[10px] text-gray-400">© 2024 SMK Negeri 1 MAESAN - UNIK (Unggul, Inovatif, Berkarakter)</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const cards = document.querySelectorAll('.prestasi-card');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterBtns.forEach(b => {
                        b.classList.remove('bg-[#026773]', 'text-white', 'shadow-sm');
                        b.classList.add('text-gray-500');
                    });
                    btn.classList.add('bg-[#026773]', 'text-white', 'shadow-sm');
                    btn.classList.remove('text-gray-500');

                    const filter = btn.getAttribute('data-filter');
                    cards.forEach(card => {
                        card.style.display = (filter === 'all' || card.getAttribute('data-category') === filter) ? '' : 'none';
                    });
                });
            });
        });
    </script>
</body>
</html>

            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 flex flex-col hover:shadow-lg transition-shadow duration-300 group">
                <div class="relative h-56 w-full overflow-hidden bg-gray-100">
                    <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=600&auto=format&fit=crop" onerror="this.src='https://placehold.co/600x400/e2e8f0/64748b?text=Vokasi'" alt="Networking" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-blue-500 text-white text-[10px] font-bold tracking-wider uppercase px-3 py-1 rounded shadow-sm">VOKASI</div>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex items-center gap-2 mb-3 text-teal-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        <span class="text-xs font-bold uppercase tracking-wide">Medali Emas</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 leading-snug mb-6 flex-1">Networking Competition Provincial Level</h3>
                    <div class="flex justify-between items-center text-[11px] text-gray-500 pt-4 border-t border-gray-50">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Jawa Timur</span>
                        </div>
                        <span>Oktober 2023</span>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 flex flex-col hover:shadow-lg transition-shadow duration-300 group">
                <div class="relative h-56 w-full overflow-hidden bg-gray-100">
                    <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=600&auto=format&fit=crop" onerror="this.src='https://placehold.co/600x400/e2e8f0/64748b?text=Akademik'" alt="Akademik" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-blue-600 text-white text-[10px] font-bold tracking-wider uppercase px-3 py-1 rounded shadow-sm">AKADEMIK</div>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex items-center gap-2 mb-3 text-teal-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        <span class="text-xs font-bold uppercase tracking-wide">Juara 2</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 leading-snug mb-6 flex-1">Olimpiade Sains Nasional Bidang Informatika</h3>
                    <div class="flex justify-between items-center text-[11px] text-gray-500 pt-4 border-t border-gray-50">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Nasional</span>
                        </div>
                        <span>Agustus 2023</span>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 flex flex-col hover:shadow-lg transition-shadow duration-300 group">
                <div class="relative h-56 w-full overflow-hidden bg-gray-100">
                    <img src="https://images.unsplash.com/photo-1542281286-9e0a16bb7366?q=80&w=600&auto=format&fit=crop" onerror="this.src='https://placehold.co/600x400/e2e8f0/64748b?text=Seni+Budaya'" alt="Seni Budaya" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-purple-500 text-white text-[10px] font-bold tracking-wider uppercase px-3 py-1 rounded shadow-sm">NON-AKADEMIK</div>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex items-center gap-2 mb-3 text-teal-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg>
                        <span class="text-xs font-bold uppercase tracking-wide">Juara Umum</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 leading-snug mb-6 flex-1">Festival Seni Budaya Pelajar Nusantara</h3>
                    <div class="flex justify-between items-center text-[11px] text-gray-500 pt-4 border-t border-gray-50">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Nasional</span>
                        </div>
                        <span>Mei 2023</span>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 flex flex-col hover:shadow-lg transition-shadow duration-300 group">
                <div class="relative h-56 w-full overflow-hidden bg-gray-100">
                    <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=600&auto=format&fit=crop" onerror="this.src='https://placehold.co/600x400/e2e8f0/64748b?text=Vokasi'" alt="Cyber Security" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-blue-500 text-white text-[10px] font-bold tracking-wider uppercase px-3 py-1 rounded shadow-sm">VOKASI</div>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex items-center gap-2 mb-3 text-teal-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        <span class="text-xs font-bold uppercase tracking-wide">Medali Perak</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 leading-snug mb-6 flex-1">Cyber Security Challenge Regionals</h3>
                    <div class="flex justify-between items-center text-[11px] text-gray-500 pt-4 border-t border-gray-50">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Jawa Timur</span>
                        </div>
                        <span>September 2023</span>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 flex flex-col hover:shadow-lg transition-shadow duration-300 group">
                <div class="relative h-56 w-full overflow-hidden bg-gray-100">
                    <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=600&auto=format&fit=crop" onerror="this.src='https://placehold.co/600x400/e2e8f0/64748b?text=Karya+Tulis'" alt="Ilmiah" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-blue-600 text-white text-[10px] font-bold tracking-wider uppercase px-3 py-1 rounded shadow-sm">AKADEMIK</div>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex items-center gap-2 mb-3 text-teal-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        <span class="text-xs font-bold uppercase tracking-wide">Juara 1</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 leading-snug mb-6 flex-1">Lomba Karya Tulis Ilmiah Nasional</h3>
                    <div class="flex justify-between items-center text-[11px] text-gray-500 pt-4 border-t border-gray-50">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Nasional</span>
                        </div>
                        <span>Juni 2023</span>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 flex flex-col hover:shadow-lg transition-shadow duration-300 group">
                <div class="relative h-56 w-full overflow-hidden bg-gray-100">
                    <img src="https://images.unsplash.com/photo-1555597673-f2192634e2f9?q=80&w=600&auto=format&fit=crop" onerror="this.src='https://placehold.co/600x400/e2e8f0/64748b?text=Pencak+Silat'" alt="Silat" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-purple-500 text-white text-[10px] font-bold tracking-wider uppercase px-3 py-1 rounded shadow-sm">NON-AKADEMIK</div>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex items-center gap-2 mb-3 text-teal-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110-4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg>
                        <span class="text-xs font-bold uppercase tracking-wide">Peringkat 3</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 leading-snug mb-6 flex-1">Kejuaraan Pencak Silat Pelajar Se-Jatim</h3>
                    <div class="flex justify-between items-center text-[11px] text-gray-500 pt-4 border-t border-gray-50">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Provinsi</span>
                        </div>
                        <span>Maret 2023</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Pagination -->
        <div class="flex flex-col md:flex-row justify-between items-center py-6 border-t border-gray-100 text-sm text-gray-500">
            <div>
                Showing <span class="font-bold text-gray-900">1</span> to <span class="font-bold text-gray-900">6</span> of <span class="font-bold text-gray-900">24</span> entries
            </div>
            <div class="flex mt-4 md:mt-0 gap-1">
                <button class="px-3 py-1 border border-gray-200 rounded-md text-gray-400 cursor-not-allowed bg-gray-50">&lsaquo; Previous</button>
                <button class="w-8 h-8 flex items-center justify-center bg-[#026773] text-white rounded-md font-medium">1</button>
                <button class="w-8 h-8 flex items-center justify-center border border-gray-200 text-gray-600 hover:bg-gray-50 rounded-md font-medium">2</button>
                <button class="w-8 h-8 flex items-center justify-center border border-gray-200 text-gray-600 hover:bg-gray-50 rounded-md font-medium">3</button>
                <span class="w-8 h-8 flex items-center justify-center text-gray-400">...</span>
                <button class="w-8 h-8 flex items-center justify-center border border-gray-200 text-gray-600 hover:bg-gray-50 rounded-md font-medium">4</button>
                <button class="px-3 py-1 border border-gray-200 rounded-md text-gray-600 hover:bg-gray-50 transition">Next &rsaquo;</button>
            </div>
        </div>
    </section>

    <!-- Footer Content like image -->
    <footer class="bg-white pt-16 pb-8 border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-6 md:px-12 grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            <div>
                <h4 class="font-bold text-blue-600 mb-4">SMK Negeri 1 MAESAN</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed font-light">
                    Mencetak generasi Unggul, Inovatif, dan Berkarakter siap menghadapi tantangan masa depan.
                </p>
            </div>
            <div>
                <h4 class="font-semibold text-gray-800 text-sm mb-4">Tautan Terkait</h4>
                <ul class="space-y-3 text-[11px] text-gray-500">
                    <li><a href="#" class="hover:text-blue-600 transition">Profil BKK Skama</a></li>
                    <li><a href="#" class="hover:text-blue-600 transition">Info Lowongan Kerja</a></li>
                    <li><a href="#" class="hover:text-blue-600 transition">Kontak</a></li>
                    <li><a href="#" class="hover:text-blue-600 transition">Peta Situs</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-gray-800 text-sm mb-4">Lokasi</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed">
                    Jl. Raya Maesan No. 123<br>
                    Bondowoso, Jawa Timur<br>
                    Indonesia
                </p>
            </div>
            <div>
                <h4 class="font-semibold text-gray-800 text-sm mb-4">Kontak</h4>
                <ul class="space-y-3 text-[11px] text-gray-500">
                    <li>info@smkn1maesan.sch.id</li>
                    <li>+62 (332) 421 000</li>
                </ul>
            </div>
        </div>
        <div class="max-w-6xl mx-auto px-6 md:px-12 pt-6 border-t border-gray-100 text-center">
            <p class="text-[10px] text-gray-400">© 2024 SMK Negeri 1 MAESAN - UNIK (Unggul, Inovatif, Berkarakter)</p>
        </div>
    </footer>
</body>
</html>
