<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil BKK Skama - SMK Negeri 1 Maesan</title>
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
            <span class="text-[#00D1B2] text-[10px] font-bold px-3 py-1 uppercase tracking-[0.2em] mb-4 inline-block">BURSA KERJA KHUSUS (BKK)</span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Profil BKK Skama' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                {{ $sections['hero']->subtitle ?? 'Menjembatani transisi dunia pendidikan ke dunia industri. Kami berkomitmen memfasilitasi penempatan kerja siswa dan pengembangan karir alumni secara profesional.' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Tentang BKK Section -->
    <section class="max-w-6xl mx-auto px-6 py-20 lg:py-28 flex flex-col lg:flex-row gap-16 lg:gap-24 items-center">
        <!-- Image with offset backdrop -->
        <div class="w-full lg:w-1/2 relative flex justify-center">
            <!-- Decorative backdrop shape -->
            <div class="absolute inset-0 bg-[#E6FFFA] rounded-[2rem] transform translate-y-6 -translate-x-6 z-0"></div>
            <!-- Main Image -->
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop" onerror="this.src='https://placehold.co/800x800/1F2937/00D1B2?text=BKK+Team'" alt="BKK Team" class="relative z-10 rounded-[2.5rem] shadow-xl w-full max-w-md object-cover aspect-square bg-[#1F2937]">
            
            <!-- Optional text overlay imitating the badge text "BAKK TEAM SAF&SET TUP BE TODO" -->
            <!-- We will let the image handle it or just leave it clean per photo -->
        </div>

        <div class="w-full lg:w-1/2">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 leading-tight">Tentang BKK</h2>
            <p class="text-gray-600 mb-6 leading-relaxed text-[15px]">
                Bursa Kerja Khusus (BKK) SMK Negeri 1 MAESAN adalah lembaga yang dibentuk sebagai perantara antara sekolah dengan dunia industri untuk kepentingan penempatan tamatan.
            </p>
            <p class="text-gray-600 mb-10 leading-relaxed text-[15px]">
                Kami berfungsi sebagai pusat informasi lowongan kerja, konseling karir, dan wadah kerjasama industri yang berkelanjutan. Fokus utama kami adalah memastikan setiap lulusan memiliki kompetensi yang relevan dan akses langsung ke peluang karir impian mereka.
            </p>
            
            <div class="flex gap-16 border-t border-gray-100 pt-8">
                <div>
                    <h3 class="text-3xl font-extrabold text-[#00D1B2]">50+</h3>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-2">MITRA INDUSTRI</p>
                </div>
                <div>
                    <h3 class="text-3xl font-extrabold text-[#00D1B2]">90%</h3>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-2">TINGKAT PENYERAPAN</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Unggulan Kami -->
    <section class="bg-[#F8FAFC] py-20 lg:py-28 border-y border-gray-100">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Layanan Unggulan Kami</h2>
                <p class="text-gray-500 max-w-xl mx-auto text-[15px]">Memberikan dukungan komprehensif bagi siswa dan alumni melalui ekosistem karir digital yang terintegrasi.</p>
            </div>

            <!-- Grid Layout representing the 4 cards -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                
                <!-- Card 1 (Wide White) -->
                <div class="md:col-span-7 bg-white rounded-[2rem] p-10 flex flex-col shadow-sm hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-12">
                        <div class="w-12 h-12 rounded-full bg-[#F0FBFA] text-[#00D1B2] flex items-center justify-center -ml-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                        </div>
                        <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest border border-gray-100 px-3 py-1 rounded-full">PREMIUM SERVICE</span>
                    </div>
                    <div class="mt-auto">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Career Counseling</h3>
                        <p class="text-[13px] text-gray-500 max-w-sm">Bimbingan karir personal untuk membantu siswa mengenali potensi dan minat bakat dalam memilih jalur karir yang tepat.</p>
                    </div>
                </div>

                <!-- Card 2 (Dark Teal) -->
                <div class="md:col-span-5 bg-[#015B63] rounded-[2rem] p-10 flex flex-col text-white shadow-sm hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center mb-12 -ml-2">
                        <svg class="w-5 h-5 opacity-90" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="mt-auto">
                        <h3 class="text-xl font-bold mb-3">Job Placement</h3>
                        <p class="text-[13px] text-teal-100 opacity-90 leading-relaxed">Penyaluran tenaga kerja langsung ke perusahaan mitra terpilih.</p>
                    </div>
                </div>

                <!-- Card 3 (Light Blue) -->
                <div class="md:col-span-5 bg-[#DCECF5] rounded-[2rem] p-10 flex flex-col shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 rounded-full bg-black/5 text-[#015B63] flex items-center justify-center mb-12 -ml-2">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <div class="mt-auto">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Industrial Partnerships</h3>
                        <p class="text-[13px] text-gray-600 max-w-xs leading-relaxed">Kerjasama strategis kurikulum dan pelatihan dengan industri global.</p>
                    </div>
                </div>

                <!-- Card 4 (White Wide) -->
                <div class="md:col-span-7 bg-white rounded-[2rem] p-10 flex flex-col shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center mb-12 -ml-2">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div class="mt-auto">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Alumni Networking</h3>
                        <p class="text-[13px] text-gray-500 max-w-sm leading-relaxed">Membangun komunitas alumni yang kuat untuk saling mendukung dan berbagi peluang profesional di berbagai sektor industri.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Mitra Industri Strategis -->
    <section class="py-20 lg:py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Mitra Industri Strategis</h2>
            <p class="text-gray-500 max-w-xl mx-auto text-[14px] mb-16">Berpartner dengan perusahaan nasional dan multinasional untuk mencetak tenaga kerja profesional siap pakai.</p>
            
            <div class="flex flex-wrap justify-center gap-8 md:gap-12 opacity-50 grayscale hover:grayscale-0 transition-all duration-500">
                <!-- Logos placeholder -->
                <div class="w-16 h-16 md:w-20 md:h-20 bg-gray-100 rounded-lg flex items-center justify-center">
                    <span class="font-bold text-gray-400">LOGO</span>
                </div>
                <div class="w-16 h-16 md:w-20 md:h-20 bg-gray-100 rounded-lg flex items-center justify-center">
                    <span class="font-bold text-gray-400">LOGO</span>
                </div>
                <div class="w-16 h-16 md:w-20 md:h-20 bg-gray-100 rounded-lg flex items-center justify-center">
                    <span class="font-bold text-gray-400">LOGO</span>
                </div>
                <div class="w-16 h-16 md:w-20 md:h-20 bg-gray-100 rounded-lg flex items-center justify-center">
                    <span class="font-bold text-gray-400">LOGO</span>
                </div>
                <div class="w-16 h-16 md:w-20 md:h-20 bg-gray-100 rounded-lg flex items-center justify-center">
                    <span class="font-bold text-gray-400">LOGO</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Call To Action -->
    <section class="max-w-6xl mx-auto px-6 pb-20">
        <div class="bg-[#00BCD4] rounded-[2rem] md:rounded-[3rem] p-10 md:p-16 text-center text-white relative overflow-hidden shadow-2xl">
            <!-- Decorative circle -->
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-white opacity-[0.05] rounded-full"></div>
            
            <div class="relative z-10">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Siap Melangkah ke Dunia Kerja?</h2>
                <p class="text-cyan-50 mb-10 max-w-lg mx-auto leading-relaxed text-sm">Daftarkan dirimu sekarang untuk mendapatkan informasi lowongan kerja terbaru dan bimbingan karir dari tim ahli kami.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#" class="bg-[#015B63] hover:bg-[#014a50] text-white text-[13px] font-bold px-8 py-3.5 rounded-full transition shadow-lg">Hubungi BKK Skama</a>
                    <a href="#" class="bg-[#4DD0E1] hover:bg-[#26c6da] text-cyan-900 border border-[#4DD0E1] text-[13px] font-bold px-8 py-3.5 rounded-full transition">Info Lowongan Kerja</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Content like image -->
    <footer class="bg-[#F8FAFC] pt-16 pb-8 border-t border-gray-100">
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
                    <li><a href="{{ route('bkk.profile') }}" class="hover:text-blue-600 transition">Profil BKK Skama</a></li>
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
