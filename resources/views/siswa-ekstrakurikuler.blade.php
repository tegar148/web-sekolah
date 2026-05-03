<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekstrakurikuler - SMK Negeri 1 Maesan</title>
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
            <span class="bg-white/10 text-gray-200 text-[10px] font-bold px-4 py-1.5 rounded-full uppercase tracking-[0.2em] mb-6 inline-flex items-center gap-2">
                <div class="w-1.5 h-1.5 bg-[#4DD0E1] rounded-full"></div>
                BAKAT & MINAT
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Ekstrakurikuler' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                {{ $sections['hero']->subtitle ?? 'Wadah eksplorasi diri untuk membentuk karakter unggul melalui berbagai bidang minat dan bakat di SMK Negeri 1 Maesan.' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Main Grid Section (Overlapping Hero) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 -mt-24 md:-mt-32 relative z-20 pb-20">
        
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            
            <!-- Pramuka (Wide Dark Card) -->
            <div class="md:col-span-8 bg-gray-900 rounded-[2.5rem] p-8 md:p-12 relative overflow-hidden flex flex-col shadow-lg border border-gray-800 min-h-[360px] hover:border-teal-400 group transition duration-500">
                <!-- Abstract Background -->
                <div class="absolute inset-0 z-0 opacity-40 mix-blend-screen bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1506506450630-f421f1d16712?q=80&w=800&auto=format&fit=crop');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/80 to-teal-900/40 z-0"></div>
                
                <div class="relative z-10 mt-auto w-full max-w-xl text-white">
                    <span class="bg-[#00BCD4] text-white text-[9px] font-bold px-3 py-1 uppercase tracking-widest rounded mb-4 inline-block shadow-sm">WAJIB</span>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Pramuka</h2>
                    <p class="text-gray-300 text-[14px] leading-relaxed mb-8">
                        Pengembangan kedisiplinan, kepemimpinan, dan kemandirian melalui kegiatan kepramukaan yang dinamis.
                    </p>
                    
                    <div class="flex flex-wrap items-center gap-6 text-[11px] font-medium text-[#4DD0E1]">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Jumat, 14:00 WIB
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                            Juara Umum Kwarran 2023
                        </div>
                    </div>
                </div>
            </div>

            <!-- PMR (Narrow White Card) -->
            <div class="md:col-span-4 bg-white rounded-[2.5rem] p-8 md:p-10 shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="w-14 h-14 rounded-2xl bg-red-50 text-red-500 flex justify-center items-center mb-8 border border-red-100">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m-14-4V5a2 2 0 012-2h4a2 2 0 012 2v2m-6 0h6"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 0v2m0-2h2m-2 0H10"></path></svg>
                </div>
                
                <h3 class="text-2xl font-bold text-gray-900 mb-3">PMR</h3>
                <p class="text-gray-500 text-[13px] leading-relaxed mb-auto">
                    Relawan muda dengan misi kemanusiaan dan pelayanan kesehatan sekolah.
                </p>
                
                <div class="bg-gray-50 rounded-xl p-4 mt-8 mb-6 border border-gray-100">
                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1">JADWAL</p>
                    <p class="text-xs font-bold text-gray-700">Sabtu, 08:00 WIB</p>
                </div>
                
                <a href="#" class="text-[#017A85] font-bold text-xs flex items-center gap-2 hover:gap-3 transition-all">Lihat Detail Program <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
            </div>

            <!-- Olahraga (Narrow Dark Card) -->
            <div class="md:col-span-4 bg-[#11293B] rounded-[2.5rem] p-8 relative overflow-hidden flex flex-col min-h-[320px] shadow-lg group hover:shadow-xl transition duration-500">
                <!-- Graphic Graphic Background -->
                <div class="absolute inset-x-0 top-0 h-48 bg-teal-500 rounded-full blur-[80px] opacity-20 group-hover:opacity-40 transition duration-500"></div>
                <img src="https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5?q=80&w=400&auto=format&fit=crop" onerror="this.src='https://placehold.co/400x400/11293B/ffffff?text=Sports'" alt="Sports" class="absolute top-10 right-4 w-40 h-40 object-cover rounded-full border-4 border-[#1A3D57] shadow-xl group-hover:scale-105 transition duration-500 mix-blend-luminosity opacity-80">
                
                <div class="relative z-10 mt-auto">
                    <h3 class="text-3xl font-bold text-white mb-2 dropdown-shadow">Olahraga</h3>
                    <p class="text-gray-400 text-sm font-medium">Futsal, Basket, dan Voli</p>
                </div>
            </div>

            <!-- Seni & Budaya (Wide Light Card) -->
            <div class="md:col-span-8 bg-[#F3F6F8] rounded-[2.5rem] p-8 md:p-12 shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-white flex flex-col md:flex-row gap-8 items-center hover:-translate-y-1 transition duration-300">
                <div class="w-full md:w-2/3 flex flex-col">
                    <span class="bg-blue-100/80 text-blue-700 text-[9px] font-bold px-3 py-1 uppercase tracking-widest rounded-full mb-6 w-max border border-blue-200">KREATIF</span>
                    <h3 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 tracking-tight">Seni & Budaya</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-8">
                        Ekspresikan kreativitasmu melalui Tari Tradisional, Paduan Suara, dan Teater. Kami berfokus pada pelestarian nilai budaya dalam sentuhan modern.
                    </p>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full border-2 border-white bg-blue-50 text-blue-500 flex justify-center items-center shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"></path></svg>
                        </div>
                        <div class="w-10 h-10 rounded-full border-2 border-white bg-pink-50 text-pink-500 flex justify-center items-center shadow-sm -ml-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
                        </div>
                        <div class="w-10 h-10 rounded-full border-2 border-white bg-teal-50 text-teal-500 flex justify-center items-center shadow-sm -ml-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 flex justify-center lg:justify-end">
                    <img src="https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?q=80&w=400&auto=format&fit=crop" onerror="this.src='https://placehold.co/400x400/2D3748/F8FAFC?text=Art'" alt="Seni" class="w-48 h-48 object-cover rounded-[2rem] rounded-tl-sm shadow-xl transform rotate-3 hover:rotate-0 transition duration-500">
                </div>
            </div>

            <!-- ROHIS (Half Card) -->
            <div class="md:col-span-6 bg-white rounded-[2.5rem] p-8 md:p-10 shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex justify-center items-center border border-teal-100">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">ROHIS</h3>
                </div>
                <p class="text-gray-500 text-[13px] leading-relaxed mb-10 flex-1">
                    Pembinaan karakter religius dan akhlak mulia melalui kajian dan kegiatan syiar Islam.
                </p>
                <div class="flex gap-8 border-t border-gray-100 pt-6">
                    <div>
                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1">HARI</p>
                        <p class="text-xs font-bold text-gray-800">Kamis Sore</p>
                    </div>
                    <div>
                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1">LOKASI</p>
                        <p class="text-xs font-bold text-gray-800">Masjid Al-Ilmi</p>
                    </div>
                </div>
            </div>

            <!-- English Club (Half Card) -->
            <div class="md:col-span-6 bg-white rounded-[2.5rem] p-8 md:p-10 shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex justify-center items-center border border-indigo-100">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">English Club</h3>
                </div>
                <p class="text-gray-500 text-[13px] leading-relaxed mb-10 flex-1">
                    Master public speaking, debating, and creative writing in an English-only environment.
                </p>
                <div class="flex gap-8 border-t border-gray-100 pt-6">
                    <div>
                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1">DAY</p>
                        <p class="text-xs font-bold text-gray-800">Wednesday</p>
                    </div>
                    <div>
                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1">ACHIEVEMENTS</p>
                        <p class="text-xs font-bold text-gray-800">Regency Finalist</p>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- Pembimbing Section -->
    <section class="bg-[#F3F6F8] border-t border-gray-200 py-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center md:items-end mb-24 gap-6 text-center md:text-left">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 tracking-tight">Dibimbing oleh Para Ahli</h2>
                    <p class="text-gray-500 max-w-lg text-[15px]">Kami percaya bahwa bimbingan yang tepat adalah kunci pengembangan potensi siswa secara maksimal.</p>
                </div>
                <a href="#" class="text-[#017A85] font-bold text-[13px] flex items-center gap-2 hover:gap-3 transition-all shrink-0">Lihat Semua Pembina <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
            </div>

            <!-- Team Grid with overlapping avatars -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-y-20 gap-x-6">
                
                <!-- Pembina 1 -->
                <div class="bg-white rounded-[2rem] p-8 mt-10 text-center shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 relative hover:-translate-y-2 transition duration-300">
                    <div class="absolute -top-12 left-1/2 transform -translate-x-1/2">
                        <div class="w-24 h-24 rounded-full bg-white p-2 shadow-lg">
                            <div class="w-full h-full rounded-full bg-[#017A85] flex items-center justify-center overflow-hidden">
                                <svg class="w-8 h-8 text-white opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                        </div>
                    </div>
                    <div class="pt-10">
                        <h3 class="text-[17px] font-bold text-gray-900 mb-1">Drs. Ahmad Junaidi</h3>
                        <p class="text-[#017A85] text-[10px] uppercase font-bold tracking-widest mb-4">Pembina Pramuka Utama</p>
                        <p class="text-gray-500 text-xs leading-relaxed max-w-[200px] mx-auto">
                            Berpengalaman lebih dari 15 tahun dalam pengembangan karakter pemuda.
                        </p>
                    </div>
                </div>

                <!-- Pembina 2 -->
                <div class="bg-white rounded-[2rem] p-8 mt-10 text-center shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 relative hover:-translate-y-2 transition duration-300">
                    <div class="absolute -top-12 left-1/2 transform -translate-x-1/2">
                        <div class="w-24 h-24 rounded-full bg-white p-2 shadow-lg">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=200&auto=format&fit=crop" onerror="this.src='https://placehold.co/200x200/F1F5F9/94A3B8?text=MS'" class="w-full h-full rounded-full object-cover">
                        </div>
                    </div>
                    <div class="pt-10">
                        <h3 class="text-[17px] font-bold text-gray-900 mb-1">Maya Sari, M.Pd.</h3>
                        <p class="text-[#017A85] text-[10px] uppercase font-bold tracking-widest mb-4">Pembimbing Seni & Budaya</p>
                        <p class="text-gray-500 text-xs leading-relaxed max-w-[200px] mx-auto">
                            Mendedikasikan diri pada pelestarian tari tradisional di tingkat nasional.
                        </p>
                    </div>
                </div>

                <!-- Pembina 3 -->
                <div class="bg-white rounded-[2rem] p-8 mt-10 text-center shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 relative hover:-translate-y-2 transition duration-300">
                    <div class="absolute -top-12 left-1/2 transform -translate-x-1/2">
                        <div class="w-24 h-24 rounded-full bg-white p-2 shadow-lg">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=200&auto=format&fit=crop" onerror="this.src='https://placehold.co/200x200/F1F5F9/94A3B8?text=RH'" class="w-full h-full rounded-full object-cover">
                        </div>
                    </div>
                    <div class="pt-10">
                        <h3 class="text-[17px] font-bold text-gray-900 mb-1">Rudi Hartono, S.Or</h3>
                        <p class="text-[#017A85] text-[10px] uppercase font-bold tracking-widest mb-4">Koordinator Olahraga</p>
                        <p class="text-gray-500 text-xs leading-relaxed max-w-[200px] mx-auto">
                            Membawa tim futsal sekolah menjuarai berbagai turnamen antar sekolah.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <x-footer />

</body>
</html>
