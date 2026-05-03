<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agribisnis Ternak Ruminansia - SMK Negeri 1 Maesan</title>
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
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Agribisnis Ternak Ruminansia' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                {{ $sections['hero']->subtitle ?? 'Melatih calon wirausahawan peternakan sapi dan kambing dengan wawasan agroteknologi masa kini untuk ketahanan pangan nasional.' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Tentang Jurusan -->
    <section class="max-w-6xl mx-auto px-6 py-20 flex flex-col md:flex-row gap-16 items-center">
        <div class="w-full md:w-1/2 relative">
            <div class="absolute -inset-4 bg-teal-50 rounded-[2.5rem] -z-10 transform -rotate-3"></div>
            @if(isset($sections['content']) && $sections['content']->image)
                <img class="rounded-3xl shadow-xl aspect-[4/5] object-cover w-full border-4 border-white" src="{{ Storage::url($sections['content']->image) }}" alt="Siswa belajar tentang sapi">
            @else
                <img class="rounded-3xl shadow-xl aspect-[4/5] object-cover w-full border-4 border-white" src="https://images.unsplash.com/photo-1546953282-35beab2881cf?q=80&w=800&auto=format&fit=crop" onerror="this.src='https://placehold.co/800x1000/e2e8f0/64748b?text=Ruminansia'" alt="Siswa belajar tentang sapi">
            @endif
        </div>
        <div class="w-full md:w-1/2">
            <h4 class="text-xs font-extrabold text-teal-600 uppercase tracking-widest mb-3">TENTANG JURUSAN</h4>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">Potensi Besar Industri Ternak Ruminansia Modern.</h2>
            <p class="text-gray-600 mb-4 leading-relaxed">
                Agribisnis Ternak Ruminansia (ATR) berfokus pada teknik pemeliharaan hewan pemamah biak seperti sapi perah, sapi potong, dan kambing. Siswa diajarkan teknologi inseminasi buatan hingga inovasi pakan fermentasi.
            </p>
            <p class="text-gray-600 mb-8 leading-relaxed">
                Dengan pembelajaran praktik lapangan yang kuat, siswa kami disiapkan untuk meningkatkan produktivitas serta mengembangkan produk turunan hewan ternak secara higienis dan berkelanjutan.
            </p>
            <div class="flex flex-wrap gap-12 border-t border-gray-100 pt-8">
                <div>
                    <h3 class="text-2xl md:text-3xl font-bold text-teal-600">92%</h3>
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest mt-1">Lulus Serap Industri</p>
                </div>
                <div>
                    <h3 class="text-2xl md:text-3xl font-bold text-teal-600">Terpadu</h3>
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest mt-1">Sistem Pakan Fermentasi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Prospek Karir -->
    <section class="bg-gray-50 py-20 border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-6 text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Prospek Karir Lulusan</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Bekal kemampuan agribisnis membuka pintu lebatnya lowongan profesional di sektor hulu-hilir industri daging dan susu sapi.</p>
        </div>
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Wide Card -->
            <div class="md:col-span-2 bg-white rounded-[2rem] p-8 shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest border border-gray-100 px-3 py-1 rounded-full">TOP ROLE</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Livestock Farm Manager</h3>
                <p class="text-gray-500 text-sm mb-6 max-w-sm flex-1 leading-relaxed">Merancang dan mengawasi jalannya peternakan besar, memastikan kesejahteraan ternak sesuai prosedur animal welfare, dan merencanakan pendistribusian.</p>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-gray-50 border border-gray-100 text-gray-600 text-[10px] font-bold uppercase px-3 py-1 rounded-md">Kepemimpinan</span>
                    <span class="bg-gray-50 border border-gray-100 text-gray-600 text-[10px] font-bold uppercase px-3 py-1 rounded-md">Bisnis Sapi</span>
                </div>
            </div>

            <!-- Solid Card -->
            <div class="md:col-span-1 bg-[#10705E] rounded-[2rem] p-8 shadow-md text-white relative overflow-hidden flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="absolute -right-16 -bottom-16 w-48 h-48 bg-white/10 rounded-full border-[20px] border-white/5 opacity-50 z-0"></div>
                <div class="z-10 flex-1">
                    <div class="w-10 h-10 rounded-xl bg-white/20 text-white flex items-center justify-center mb-6 backdrop-blur-sm">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Inseminator Buatan (IB)</h3>
                    <p class="text-white/80 text-sm mb-6 leading-relaxed">Melakukan teknik IB untuk memperbaiki mutu reproduksi dan populasi ras unggul sapi potong atau sapi perah.</p>
                </div>
                <div class="z-10 text-[9px] font-bold tracking-widest uppercase border-t border-white/20 pt-4 opacity-90"><a href="#" class="flex items-center gap-1 hover:gap-2 transition-all">Lihat Deskripsi <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a></div>
            </div>

            <!-- Small Card 1 -->
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="w-10 h-10 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center mb-5">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                </div>
                <h3 class="text-sm font-bold text-gray-900 mb-2">Formulator Pakan</h3>
                <p class="text-[11px] text-gray-500 leading-relaxed flex-1">Orkestrasi gizi ransum dan asupan pakan ternak harian agar nutrisi serat dan protein harian tercukupi efektif.</p>
            </div>

            <!-- Small Card 2 -->
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-5">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
                <h3 class="text-sm font-bold text-gray-900 mb-2">Penyuluh Pertanian</h3>
                <p class="text-[11px] text-gray-500 leading-relaxed flex-1">Konsultan edukasi masyarakat tentang metode pemeliharaan pedet (anak sapi) atau teknologi pakan hijau.</p>
            </div>

            <!-- Small Card 3 -->
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="w-10 h-10 rounded-xl bg-pink-50 text-pink-600 flex items-center justify-center mb-5">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                </div>
                <h3 class="text-sm font-bold text-gray-900 mb-2">Mantri Hewan (Medis Ternak)</h3>
                <p class="text-[11px] text-gray-500 leading-relaxed flex-1">Bekerja di bawah dokter hewan memantau suhu, kesehatan kuku, pemberian vaksinasi, dan higienitas populasi sapi.</p>
            </div>

        </div>
    </section>

    <!-- Fasilitas Pembelajaran -->
    <section class="max-w-6xl mx-auto px-6 py-20">
        <div class="mb-12 text-center md:text-left">
            <h2 class="text-3xl font-bold text-gray-900 mb-3">Fasilitas Pembelajaran Khusus</h2>
            <p class="text-gray-500 max-w-xl">Lahan praktik yang siap mendekatkan siswa kepada realita dunia ruminansia sejati.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="group cursor-pointer">
                <div class="relative h-72 rounded-[2rem] overflow-hidden mb-6 shadow-sm border border-gray-100">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=800&auto=format&fit=crop" onerror="this.src='https://placehold.co/800x600/e2e8f0/64748b?text=Kandang+Sapi'" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Farm Sapi">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent flex flex-col justify-end p-8">
                        <span class="bg-teal-500 text-white text-[9px] font-bold px-2 py-1 rounded uppercase tracking-widest w-max mb-3">FARM TERPADU</span>
                        <h3 class="text-2xl font-bold text-white">Laboratorium Kandang Terbuka</h3>
                    </div>
                </div>
                <p class="text-gray-500 text-[11px] leading-relaxed px-2">Kandang edukasi skala industri yang luas, lengkap dengan ruang isolasi mandiri untuk karantina sapi yang terserang penyakit kaki dan mulut.</p>
            </div>
            
            <div class="group cursor-pointer">
                <div class="relative h-72 rounded-[2rem] overflow-hidden mb-6 shadow-sm border border-gray-100">
                    <img src="https://images.unsplash.com/photo-1621217739502-d115e45a0b77?q=80&w=800&auto=format&fit=crop" onerror="this.src='https://placehold.co/800x600/e2e8f0/64748b?text=Pengolahan+Pakan'" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Silo Pakan">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent flex flex-col justify-end p-8">
                        <span class="bg-blue-500 text-white text-[9px] font-bold px-2 py-1 rounded uppercase tracking-widest w-max mb-3">PABRIK MINI</span>
                        <h3 class="text-2xl font-bold text-white">Unit Produksi Pakan Silase</h3>
                    </div>
                </div>
                <p class="text-gray-500 text-[11px] leading-relaxed px-2">Pabrik pakan berskala kecil untuk penelitian silase hijauan, pengolahan limbah kotoran menjadi biogas, dan manufaktur konsentrat.</p>
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
                <h2 class="text-3xl md:text-4xl font-bold mb-6 tracking-tight">Kembangkan Minat di Dunia Peternakan!</h2>
                <p class="text-gray-400 mb-10 max-w-lg mx-auto leading-relaxed text-sm">Pendaftaran peserta didik baru Ruminansia tahun ajaran 2024/2025 telah dibuka. Amankan kursimu sekarang.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#" class="bg-[#00D1B2] hover:bg-[#00bda1] text-gray-900 text-sm font-bold px-8 py-3.5 rounded-full transition shadow-lg shadow-teal-500/20">Daftar Sekarang</a>
                    <a href="#" class="bg-gray-700/50 hover:bg-gray-700 text-white text-sm font-semibold border border-gray-600 px-8 py-3.5 rounded-full transition">Info Cek Disini</a>
                </div>
            </div>
        </div>
    </section>

    <x-footer />

</body>
</html>
