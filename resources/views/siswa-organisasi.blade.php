<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisasi Siswa - SMK Negeri 1 Maesan</title>
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
    <header class="bg-[#2D3748] pt-24 pb-48 md:pt-32 md:pb-56 relative text-center text-white overflow-hidden">
        <div class="max-w-4xl mx-auto px-6 relative z-10 flex flex-col items-center">
            <span class="bg-[#015B63]/30 border border-[#015B63]/50 text-teal-100 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest mb-6 inline-block">
                STUDENT LIFE
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Organisasi Siswa' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                {{ $sections['hero']->subtitle ?? 'Membangun karakter, kepemimpinan, dan inovasi melalui wadah aspirasi yang dinamis di lingkungan SMK Negeri 1 Maesan.' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Main Content Section (Overlapping Hero) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 -mt-24 md:-mt-32 relative z-20 pb-20">
        
        <!-- Top Cards Content -->
        <div class="flex flex-col lg:flex-row gap-8 mb-20 lg:mb-32">
            
            <!-- Left Card (OSIS) -->
            <div class="w-full lg:w-[65%] bg-white rounded-[2rem] shadow-[0_8px_30px_rgba(0,0,0,0.04)] sm:p-4 lg:p-4 flex flex-col md:flex-row gap-4 border border-gray-100">
                
                <div class="w-full md:w-1/2 p-6 lg:p-8 flex flex-col">
                    <div class="w-14 h-14 rounded-2xl bg-[#00BCD4] text-white flex justify-center items-center mb-8 shadow-sm">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
                    </div>
                    
                    <h2 class="text-3xl font-bold text-gray-900 mb-6 tracking-tight">OSIS</h2>
                    <p class="text-gray-600 leading-relaxed mb-auto text-[15px]">
                        Organisasi Intra Sekolah sebagai pilar utama kegiatan kesiswaan. Fokus pada pengembangan kepemimpinan, pengabdian sosial, dan manajemen acara sekolah yang inklusif.
                    </p>
                    
                    <!-- Bottom Info -->
                    <div class="flex items-center gap-4 border-t border-gray-100 pt-6 mt-8">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=200&auto=format&fit=crop" class="w-12 h-12 rounded-full object-cover border border-gray-200" alt="Avatar">
                        <div>
                            <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1">KETUA UMUM</p>
                            <p class="font-bold text-gray-900 text-sm">Aditya Pratama</p>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/2 relative rounded-[1.5rem] overflow-hidden min-h-[300px] md:min-h-full">
                    <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?q=80&w=800&auto=format&fit=crop" onerror="this.src='https://placehold.co/800x1200/F1F5F9/94A3B8?text=OSIS+Meeting'" class="absolute inset-0 w-full h-full object-cover" alt="OSIS Activity">
                    
                    <!-- Overlay Badge bottom -->
                    <div class="absolute inset-x-0 bottom-0 p-6 bg-gradient-to-t from-gray-900/90 to-transparent">
                        <span class="bg-[#015B63] text-white text-[9px] font-bold px-2 py-1 uppercase tracking-widest rounded mb-3 inline-block">LIVE SESSION</span>
                        <h4 class="text-white font-bold text-lg leading-snug">Rapat Kerja Program UNIK 2024</h4>
                    </div>
                </div>
            </div>

            <!-- Right Card (MPK) -->
            <div class="w-full lg:w-[35%] bg-[#015B63] rounded-[2rem] shadow-lg p-8 lg:p-10 flex flex-col text-white relative overflow-hidden">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-white opacity-[0.03] rounded-full blur-3xl"></div>
                
                <div class="relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-white/10 flex justify-center items-center mb-8 backdrop-blur-sm border border-white/5">
                        <svg class="w-7 h-7 text-white opacity-90" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"></path></svg>
                    </div>
                    
                    <h2 class="text-3xl font-bold text-white mb-6 tracking-tight">MPK</h2>
                    <p class="text-teal-50 text-[15px] opacity-90 leading-relaxed mb-10">
                        Majelis Perwakilan Kelas bertugas sebagai badan legislatif dan pengawas kinerja OSIS, memastikan setiap aspirasi siswa tersampaikan dengan tepat.
                    </p>
                    
                    <div class="border-t border-white/10 pt-8 mt-auto">
                        <h5 class="text-[10px] font-bold text-teal-200 uppercase tracking-widest mb-6">CORE FUNCTIONS</h5>
                        <ul class="space-y-4">
                            <li class="flex items-center gap-3">
                                <svg class="w-4 h-4 text-[#00BCD4]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-xs font-medium text-white/90 tracking-wide">Aspirasi Siswa</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-4 h-4 text-[#00BCD4]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-xs font-medium text-white/90 tracking-wide">Legislasi Siswa</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-4 h-4 text-[#00BCD4]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-xs font-medium text-white/90 tracking-wide">Pengawasan Internal</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Kelompok Minat & Bakat Section -->
        <div class="pt-8 mb-6 border-t border-gray-100 flex flex-col md:flex-row md:justify-between md:items-end gap-6 pb-2">
            <div>
                <h5 class="text-[#015B63] font-bold text-[10px] tracking-widest uppercase mb-2">EXTRACURRICULAR</h5>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 tracking-tight">Kelompok Minat & Bakat</h2>
            </div>
            <div class="md:w-[45%]">
                <p class="text-gray-500 text-[14px] leading-relaxed relative">
                    <span class="absolute -left-3 -top-2 text-3xl text-gray-200 font-serif">"</span>
                    Temukan komunitasmu, asah potensimu, dan jadilah versi terbaik dirimu di SMK Negeri 1 Maesan.
                    <span class="text-gray-200 font-serif self-end">"</span>
                </p>
            </div>
        </div>

        <!-- Grid of 3 Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- EX Card 1 -->
            <div class="bg-[#F8FAFC] md:bg-gray-50/80 rounded-[2rem] p-8 border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-10">
                    <div class="w-12 h-12 rounded-full bg-white shadow-sm flex justify-center items-center text-[#015B63]">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <span class="bg-[#DCECF5] text-[#0284C7] text-[8px] font-bold px-3 py-1 uppercase tracking-widest rounded-full">STEM</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Robotics & IoT Club</h3>
                <p class="text-gray-500 text-[13px] leading-relaxed mb-10 flex-1">
                    Eksplorasi teknologi masa depan melalui pemrograman mikrokontroler dan perakitan robotika industri.
                </p>
                <div class="flex items-center justify-between mt-auto">
                    <!-- Overlapping avatars representation using initials -->
                    <div class="flex -space-x-2 overflow-hidden">
                        <div class="w-8 h-8 rounded-full bg-gray-200 border-2 border-[#F8FAFC] flex items-center justify-center text-[10px] font-bold text-gray-600">JD</div>
                        <div class="w-8 h-8 rounded-full bg-gray-300 border-2 border-[#F8FAFC] flex items-center justify-center text-[10px] font-bold text-gray-700">AS</div>
                    </div>
                    <a href="#" class="text-[#015B63] font-bold text-[11px] hover:gap-2 flex items-center gap-1 transition-all">Lihat Detail <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                </div>
            </div>

            <!-- EX Card 2 -->
            <div class="bg-[#F8FAFC] md:bg-gray-50/80 rounded-[2rem] p-8 border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-10">
                    <div class="w-12 h-12 rounded-full bg-white shadow-sm flex justify-center items-center text-[#015B63]">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <span class="bg-[#DCECF5] text-[#0284C7] text-[8px] font-bold px-3 py-1 uppercase tracking-widest rounded-full">ARTS</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Cinema & Multimedia</h3>
                <p class="text-gray-500 text-[13px] leading-relaxed mb-10 flex-1">
                    Wadah bagi para konten kreator, videografer, dan editor muda untuk berkarya di era digital.
                </p>
                <div class="flex items-center justify-between mt-auto">
                    <div class="flex -space-x-2 overflow-hidden">
                        <div class="w-8 h-8 rounded-full bg-gray-200 border-2 border-[#F8FAFC] flex items-center justify-center text-[10px] font-bold text-gray-600">RL</div>
                        <div class="w-8 h-8 rounded-full bg-gray-300 border-2 border-[#F8FAFC] flex items-center justify-center text-[10px] font-bold text-gray-700">MY</div>
                    </div>
                    <a href="#" class="text-[#015B63] font-bold text-[11px] hover:gap-2 flex items-center gap-1 transition-all">Lihat Detail <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                </div>
            </div>

            <!-- EX Card 3 -->
            <div class="bg-[#F8FAFC] md:bg-gray-50/80 rounded-[2rem] p-8 border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-10">
                    <div class="w-12 h-12 rounded-full bg-white shadow-sm flex justify-center items-center text-[#015B63]">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <span class="bg-[#DCECF5] text-[#0284C7] text-[8px] font-bold px-3 py-1 uppercase tracking-widest rounded-full">NATURE</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Green Ambassadors</h3>
                <p class="text-gray-500 text-[13px] leading-relaxed mb-10 flex-1">
                    Aksi nyata pelestarian lingkungan sekolah melalui program zero waste dan hidroponik mandiri.
                </p>
                <div class="flex items-center justify-between mt-auto">
                    <div class="flex -space-x-2 overflow-hidden">
                        <div class="w-8 h-8 rounded-full bg-gray-200 border-2 border-[#F8FAFC] flex items-center justify-center text-[10px] font-bold text-gray-600">KM</div>
                    </div>
                    <a href="#" class="text-[#015B63] font-bold text-[11px] hover:gap-2 flex items-center gap-1 transition-all">Lihat Detail <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                </div>
            </div>

        </div>

    </section>

    <x-footer />

</body>
</html>
