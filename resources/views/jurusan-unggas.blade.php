<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agribisnis Ternak Unggas - SMK Negeri 1 Maesan</title>
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
            <span class="bg-teal-900/50 text-teal-300 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest border border-teal-700/50 mb-6 inline-block">PROGRAM KEAHLIAN</span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Agribisnis Ternak Unggas' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                {{ $sections['hero']->subtitle ?? 'Mencetak tenaga ahli profesional di bidang pengelolaan unggas modern dengan integrasi teknologi agribisnis berkelanjutan.' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Tentang Jurusan -->
    <section class="max-w-6xl mx-auto px-6 py-20 flex flex-col md:flex-row gap-16 items-center">
        <div class="w-full md:w-1/2 relative">
            <div class="absolute -inset-4 bg-teal-50 rounded-[2.5rem] -z-10 transform rotate-3"></div>
            @if(isset($sections['content']) && $sections['content']->image)
                <img class="rounded-3xl shadow-xl aspect-[4/5] object-cover w-full border-4 border-white" src="{{ Storage::url($sections['content']->image) }}" alt="Siswa belajar tentang unggas">
            @else
                <img class="rounded-3xl shadow-xl aspect-[4/5] object-cover w-full border-4 border-white" src="https://images.unsplash.com/photo-1548142813-c348350df52b?q=80&w=800&auto=format&fit=crop" onerror="this.src='https://placehold.co/800x1000/e2e8f0/64748b?text=Peternakan'" alt="Siswa belajar tentang unggas">
            @endif
        </div>
        <div class="w-full md:w-1/2">
            <h4 class="text-xs font-extrabold text-teal-600 uppercase tracking-widest mb-3">TENTANG JURUSAN</h4>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">Membangun Masa Depan Ketahanan Pangan Melalui Unggas.</h2>
            <p class="text-gray-600 mb-4 leading-relaxed">
                Program keahlian Agribisnis Ternak Unggas (ATU) SMKN 1 Maesan membekali siswa dengan kompetensi komprehensif mulai dari pemilihan bibit unggul, budidaya, manajemen kandang, formulasi pakan, hingga analisis produksi dan strategi pemasaran.
            </p>
            <p class="text-gray-600 mb-8 leading-relaxed">
                Kurikulum kami dirancang untuk memadukan tuntutan industri modern, menggabungkan aspek praktik berwawasan lingkungan dan pengoperasian kandang bersistem presisi.
            </p>
            <div class="flex flex-wrap gap-12 border-t border-gray-100 pt-8">
                <div>
                    <h3 class="text-2xl md:text-3xl font-bold text-teal-600">95%</h3>
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest mt-1">Keterserapan Kerja</p>
                </div>
                <div>
                    <h3 class="text-2xl md:text-3xl font-bold text-teal-600">Industry 4.0</h3>
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest mt-1">Sistem Kandang Terkini</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Prospek Karir -->
    <section class="bg-gray-50 py-20 border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-6 text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Prospek Karir Lulusan</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Lulusan memiliki kompetensi standar industri peternakan yang siap mengisi berbagai posisi strategis dan profesional.</p>
        </div>
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Wide Card -->
            <div class="md:col-span-2 bg-white rounded-[2rem] p-8 shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest border border-gray-100 px-3 py-1 rounded-full">TOP ROLE</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Poultry Specialist</h3>
                <p class="text-gray-500 text-sm mb-6 max-w-sm flex-1 leading-relaxed">Spesialis ahli dalam manajemen biosekuriti kandang, nutrisi hewan, dan pelaporan siklus reproduksi ayam sayur (broiler) dan layer.</p>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-gray-50 border border-gray-100 text-gray-600 text-[10px] font-bold uppercase px-3 py-1 rounded-md">Manajemen</span>
                    <span class="bg-gray-50 border border-gray-100 text-gray-600 text-[10px] font-bold uppercase px-3 py-1 rounded-md">Konsultan</span>
                </div>
            </div>

            <!-- Solid Card -->
            <div class="md:col-span-1 bg-[#0096B3] rounded-[2rem] p-8 shadow-md text-white relative overflow-hidden flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="absolute -right-16 -bottom-16 w-48 h-48 bg-white/10 rounded-full border-[20px] border-white/5 opacity-50 z-0"></div>
                <div class="z-10 flex-1">
                    <div class="w-10 h-10 rounded-xl bg-white/20 text-white flex items-center justify-center mb-6 backdrop-blur-sm">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Hatchery Technician</h3>
                    <p class="text-white/80 text-sm mb-6 leading-relaxed">Menghandle inkubasi dan proses penetasan buatan, menyeleksi bibit unggul secara terstruktur (DOC).</p>
                </div>
                <div class="z-10 text-[9px] font-bold tracking-widest uppercase border-t border-white/20 pt-4 opacity-90"><a href="#" class="flex items-center gap-1 hover:gap-2 transition-all">Lihat Deskripsi <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a></div>
            </div>

            <!-- Small Card 1 -->
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-5">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <h3 class="text-sm font-bold text-gray-900 mb-2">Quality Control Specialist</h3>
                <p class="text-[11px] text-gray-500 leading-relaxed flex-1">Bertanggung jawab atas standar output produk unggas sejalan dengan regulasi pangan.</p>
            </div>

            <!-- Small Card 2 -->
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="w-10 h-10 rounded-xl bg-green-50 text-green-600 flex items-center justify-center mb-5">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                </div>
                <h3 class="text-sm font-bold text-gray-900 mb-2">Agri-Entrepreneur</h3>
                <p class="text-[11px] text-gray-500 leading-relaxed flex-1">Merancang bisnis peternakan mandiri berdaya saing dengan efisiensi tinggi pada pakan.</p>
            </div>

            <!-- Small Card 3 -->
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center mb-5">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-sm font-bold text-gray-900 mb-2">Farm Supervisor</h3>
                <p class="text-[11px] text-gray-500 leading-relaxed flex-1">Memimpin rantai pasok lapangan dan SDM teknis untuk optimalisasi masa panen.</p>
            </div>

        </div>
    </section>

    <!-- Fasilitas Pembelajaran -->
    <section class="max-w-6xl mx-auto px-6 py-20">
        <div class="mb-12 text-center md:text-left">
            <h2 class="text-3xl font-bold text-gray-900 mb-3">Fasilitas Pembelajaran</h2>
            <p class="text-gray-500 max-w-xl">Infrastruktur lengkap guna menyokong simulasi kerja industri yang berstandar nasional.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="group cursor-pointer">
                <div class="relative h-72 rounded-[2rem] overflow-hidden mb-6 shadow-sm border border-gray-100">
                    <img src="https://images.unsplash.com/photo-1549468057-0801a61aa4db?q=80&w=800&auto=format&fit=crop" onerror="this.src='https://placehold.co/800x600/e2e8f0/64748b?text=Kandang+Sistem'" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Feeding Systems">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent flex flex-col justify-end p-8">
                        <span class="bg-teal-500 text-white text-[9px] font-bold px-2 py-1 rounded uppercase tracking-widest w-max mb-3">SMART FARM</span>
                        <h3 class="text-2xl font-bold text-white">Automatic Feeding Systems</h3>
                    </div>
                </div>
                <p class="text-gray-500 text-[11px] leading-relaxed px-2">Eksplorasi utilitas alat pemberi pakan otomatis presisi dikomparasikan dengan efisiensi energi yang disalurkan melalui sistem pendingin closed-house.</p>
            </div>
            
            <div class="group cursor-pointer">
                <div class="relative h-72 rounded-[2rem] overflow-hidden mb-6 shadow-sm border border-gray-100">
                    <img src="https://images.unsplash.com/photo-1628105741697-74291f0fcd6e?q=80&w=800&auto=format&fit=crop" onerror="this.src='https://placehold.co/800x600/e2e8f0/64748b?text=Lab+Unggas'" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Diagnostics Lab">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent flex flex-col justify-end p-8">
                        <span class="bg-blue-500 text-white text-[9px] font-bold px-2 py-1 rounded uppercase tracking-widest w-max mb-3">WET LAB</span>
                        <h3 class="text-2xl font-bold text-white">Poultry Diagnostics Lab</h3>
                    </div>
                </div>
                <p class="text-gray-500 text-[11px] leading-relaxed px-2">Pemeriksaan dan diagnosis kesehatan klinik hewan unggas, identifikasi patologi dasar serta aplikasi mikrobiologi peternakan sebagai mitigasi endemik.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="max-w-5xl mx-auto px-6 pb-20 mt-10">
        <div class="bg-[#2D3748] rounded-[2.5rem] p-12 md:p-16 text-center text-white relative overflow-hidden shadow-2xl">
            <!-- Decorative blur shapes -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-teal-500/20 rounded-full blur-[80px]"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-500/20 rounded-full blur-[80px]"></div>
            
            <div class="relative z-10">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 tracking-tight">Siap Menjadi Ahli Peternakan Modern?</h2>
                <p class="text-gray-400 mb-10 max-w-lg mx-auto leading-relaxed text-sm">Pendaftaran peserta didik baru tahun ajaran 2024/2025 telah dibuka. Amankan karier masa depanmu di industri agroteknologi.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#" class="bg-[#00D1B2] hover:bg-[#00bda1] text-gray-900 text-sm font-bold px-8 py-3.5 rounded-full transition shadow-lg shadow-teal-500/20">Daftar Sekarang</a>
                    <a href="#" class="bg-gray-700/50 hover:bg-gray-700 text-white text-sm font-semibold border border-gray-600 px-8 py-3.5 rounded-full transition">Download Brosur</a>
                </div>
            </div>
        </div>
    </section>

    <x-footer />

</body>
</html>
