<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas - SMK Negeri 1 Maesan</title>
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
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Fasilitas' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                {{ $sections['hero']->subtitle ?? 'Mendukung ekosistem belajar masa depan dengan infrastruktur modern dan laboratorium berstandar industri.' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Galeri/Fasilitas Cards Section -->
    <section class="max-w-7xl mx-auto px-6 md:px-12 py-16 md:py-24">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Card 1 -->
            <div class="bg-white rounded-[2rem] overflow-hidden shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-50 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="relative h-64 w-full">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=800&auto=format&fit=crop" onerror="this.src='https://placehold.co/800x600/e2e8f0/64748b?text=Ruang+Kelas'" alt="Ruang Kelas" class="w-full h-full object-cover">
                </div>
                <div class="p-8 flex flex-col flex-1">
                    <div class="flex items-center gap-2 mb-4 text-teal-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <span class="text-[10px] font-extrabold uppercase tracking-widest">RUANG KELAS</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 leading-snug">Ruang Kelas Smart-Learning</h3>
                    <p class="text-xs text-gray-500 leading-relaxed mb-8 flex-1">
                        Dilengkapi dengan proyektor interaktif dan sirkulasi udara optimal untuk kenyamanan maksimal saat belajar.
                    </p>
                    <div class="flex items-center justify-between border-t border-gray-100 pt-5">
                        <span class="text-[11px] text-gray-500 font-medium">Kapasitas: 36 Siswa</span>
                        <div class="w-6 h-6 text-teal-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-[2rem] overflow-hidden shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-50 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="relative h-64 w-full">
                    <img src="https://images.unsplash.com/photo-1519452314541-6fb73489e218?q=80&w=800&auto=format&fit=crop" onerror="this.src='https://placehold.co/800x600/e2e8f0/64748b?text=Olahraga'" alt="Olahraga" class="w-full h-full object-cover">
                </div>
                <div class="p-8 flex flex-col flex-1">
                    <div class="flex items-center gap-2 mb-4 text-teal-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-[10px] font-extrabold uppercase tracking-widest">OLAHRAGA</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 leading-snug">Gelanggang Olahraga UNIK</h3>
                    <p class="text-xs text-gray-500 leading-relaxed mb-8 flex-1">
                        Fasilitas olahraga indoor serbaguna untuk basket, voli, dan bulutangkis dengan standar kompetisi.
                    </p>
                    <div class="flex items-center justify-between border-t border-gray-100 pt-5">
                        <span class="text-[11px] text-gray-500 font-medium">Luas: 800 m²</span>
                        <div class="w-6 h-6 text-teal-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-[2rem] overflow-hidden shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-50 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="relative h-64 w-full">
                    <img src="https://images.unsplash.com/photo-1598463567115-bfa7cb0628e9?q=80&w=800&auto=format&fit=crop" onerror="this.src='https://placehold.co/800x600/e2e8f0/64748b?text=Workshop'" alt="Workshop" class="w-full h-full object-cover">
                </div>
                <div class="p-8 flex flex-col flex-1">
                    <div class="flex items-center gap-2 mb-4 text-teal-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="text-[10px] font-extrabold uppercase tracking-widest">WORKSHOP</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 leading-snug">Bengkel Otomotif Modern</h3>
                    <p class="text-xs text-gray-500 leading-relaxed mb-8 flex-1">
                        Area praktik khusus Teknik Kendaraan Ringan dengan alat diagnosa komputerisasi terbaru.
                    </p>
                    <div class="flex items-center justify-between border-t border-gray-100 pt-5">
                        <span class="text-[11px] text-gray-500 font-medium">Standar: Industri ISO</span>
                        <div class="w-6 h-6 text-teal-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-[#F0F2F4] border-y border-[#E2E8F0] py-20">
        <div class="max-w-6xl mx-auto px-6 md:px-12 grid grid-cols-2 md:grid-cols-4 gap-12 text-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-4xl md:text-5xl font-extrabold text-[#026773] mb-3">24</span>
                <span class="text-[9px] font-bold text-gray-800 tracking-[0.2em] uppercase">RUANG KELAS</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="text-4xl md:text-5xl font-extrabold text-[#026773] mb-3">12</span>
                <span class="text-[9px] font-bold text-gray-800 tracking-[0.2em] uppercase">LABORATORIUM</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="text-4xl md:text-5xl font-extrabold text-[#026773] mb-3">1.5ha</span>
                <span class="text-[9px] font-bold text-gray-800 tracking-[0.2em] uppercase">LUAS AREA</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="text-4xl md:text-5xl font-extrabold text-[#026773] mb-3">100%</span>
                <span class="text-[9px] font-bold text-gray-800 tracking-[0.2em] uppercase">CAKUPAN WI-FI</span>
            </div>
        </div>
    </section>

    <!-- Footer Content like image -->
    <footer class="bg-[#F8FAFC] pt-16 pb-8 border-t border-gray-100 mt-0">
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
        <div class="max-w-6xl mx-auto px-6 md:px-12 pt-6 border-t border-gray-200 text-center">
            <p class="text-[10px] text-gray-400">© 2024 SMK Negeri 1 MAESAN - UNIK (Unggul, Inovatif, Berkarakter)</p>
        </div>
    </footer>
</body>
</html>
