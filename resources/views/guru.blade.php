<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru - SMK Negeri 1 Maesan</title>
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
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Guru' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                {{ $sections['hero']->subtitle ?? 'Daftar tenaga pendidik profesional SMK Negeri 1 Maesan yang berkomitmen mencetak generasi UNIK.' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Content Section (Admin Toggle) -->
    @if(!isset($sections['content']) || $sections['content']->is_visible)
    <section class="max-w-7xl mx-auto px-6 md:px-12 py-16 md:py-24 space-y-24">
        
        <!-- Section 1: Teknik Komputer & Jaringan -->
        <div>
            <div class="flex items-center gap-4 mb-10">
                <h2 class="text-2xl font-bold text-teal-800 shrink-0">Teknik Komputer & Jaringan</h2>
                <div class="h-px bg-teal-100 w-full"></div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-50 flex flex-col hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 rounded-full border-[3px] border-teal-100 p-0.5 mb-4 shrink-0 bg-teal-50">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=200&auto=format&fit=crop" onerror="this.src='https://ui-avatars.com/api/?name=Ahmad&background=e2e8f0&color=475569'" alt="Ahmad Sulaiman" class="w-full h-full rounded-full object-cover">
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 leading-tight">Ahmad Sulaiman, S.Kom</h3>
                    <p class="text-[9px] font-bold text-teal-600 uppercase tracking-wide mb-3 mt-1">HEAD OF TKJ DEPARTMENT</p>
                    <p class="text-[10px] text-gray-500 leading-relaxed">Dedicated to bridging the gap between networking theory and industrial application.</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-50 flex flex-col hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 rounded-full border-[3px] border-teal-100 p-0.5 mb-4 shrink-0 bg-teal-50">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=200&auto=format&fit=crop" onerror="this.src='https://ui-avatars.com/api/?name=Siti&background=e2e8f0&color=475569'" alt="Siti Nurhaliza" class="w-full h-full rounded-full object-cover">
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 leading-tight">Siti Nurhaliza, M.T</h3>
                    <p class="text-[9px] font-bold text-teal-600 uppercase tracking-wide mb-3 mt-1">NETWORK ADMINISTRATION</p>
                    <p class="text-[10px] text-gray-500 leading-relaxed">Specializing in cloud infrastructure and cybersecurity management for modern enterprise.</p>
                </div>
            </div>
        </div>

        <!-- Section 2: Agribisnis -->
        <div>
            <div class="flex items-center gap-4 mb-10">
                <h2 class="text-2xl font-bold text-teal-800 shrink-0">Agribisnis</h2>
                <div class="h-px bg-teal-100 w-full"></div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-50 flex flex-col hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 rounded-full border-[3px] border-teal-100 p-0.5 mb-4 shrink-0 bg-teal-50">
                        <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?q=80&w=150&auto=format&fit=crop" onerror="this.src='https://ui-avatars.com/api/?name=Budi&background=e2e8f0&color=475569'" alt="Budi Santoso" class="w-full h-full rounded-full object-cover">
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 leading-tight">Budi Santoso, S.Pt</h3>
                    <p class="text-[9px] font-bold text-teal-600 uppercase tracking-wide mb-3 mt-1">TERNAK RUMINANSIA</p>
                    <p class="text-[10px] text-gray-500 leading-relaxed">Leading sustainable livestock management programs since 2012.</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-50 flex flex-col hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 rounded-full border-[3px] border-teal-100 p-0.5 mb-4 shrink-0 bg-teal-50">
                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=150&auto=format&fit=crop" onerror="this.src='https://ui-avatars.com/api/?name=Dewi&background=e2e8f0&color=475569'" alt="Dewi Lestari" class="w-full h-full rounded-full object-cover">
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 leading-tight">Dewi Lestari, M.Si</h3>
                    <p class="text-[9px] font-bold text-teal-600 uppercase tracking-wide mb-3 mt-1">TERNAK UNGGAS</p>
                    <p class="text-[10px] text-gray-500 leading-relaxed">Expert in poultry health and industrial-scale production...</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-50 flex flex-col hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 rounded-full border-[3px] border-teal-100 p-0.5 mb-4 shrink-0 bg-teal-50">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=150&auto=format&fit=crop" onerror="this.src='https://ui-avatars.com/api/?name=Hendra&background=e2e8f0&color=475569'" alt="Hendra Wijaya" class="w-full h-full rounded-full object-cover">
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 leading-tight">Hendra Wijaya, S.E</h3>
                    <p class="text-[9px] font-bold text-teal-600 uppercase tracking-wide mb-3 mt-1">AGRIBUSINESS ECONOMY</p>
                    <p class="text-[10px] text-gray-500 leading-relaxed">Empowering students with entrepreneurial skills in modern...</p>
                </div>

                <!-- Card 4 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-50 flex flex-col hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 rounded-full border-[3px] border-teal-100 p-0.5 mb-4 shrink-0 bg-teal-50">
                        <img src="https://images.unsplash.com/photo-1548142813-c348350df52b?q=80&w=150&auto=format&fit=crop" onerror="this.src='https://ui-avatars.com/api/?name=Rizky&background=e2e8f0&color=475569'" alt="Rizky Pratama" class="w-full h-full rounded-full object-cover">
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 leading-tight">Rizky Pratama, S.Pt</h3>
                    <p class="text-[9px] font-bold text-teal-600 uppercase tracking-wide mb-3 mt-1">ANIMAL NUTRITION</p>
                    <p class="text-[10px] text-gray-500 leading-relaxed">Innovating organic feed solutions for livestock sustainability.</p>
                </div>
            </div>
        </div>

        <!-- Section 3: Umum (General Education) -->
        <div>
            <div class="flex items-center gap-4 mb-10">
                <h2 class="text-2xl font-bold text-teal-800 shrink-0">Umum (General Education)</h2>
                <div class="h-px bg-teal-100 w-full"></div>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                <!-- Large Featured Card -->
                <div class="lg:col-span-4 bg-[#EBEFEF] rounded-3xl p-8 relative overflow-hidden flex flex-col hover:shadow-md transition duration-300">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-white/40 rounded-full blur-2xl -translate-y-1/2 translate-x-1/4"></div>
                    <div class="flex-col items-center text-center flex z-10 w-full h-full justify-center mt-6">
                        <div class="w-24 h-24 rounded-full border-4 border-white shadow-xl mb-6 bg-teal-900 border-teal-50/50">
                            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?q=80&w=300&auto=format&fit=crop" onerror="this.src='https://ui-avatars.com/api/?name=Mulyadi&background=e2e8f0&color=475569'" alt="Drs. Mulyadi" class="w-full h-full rounded-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 leading-tight">Drs. Mulyadi</h3>
                        <p class="text-[9px] font-extrabold text-teal-700 uppercase tracking-widest my-2 bg-teal-100/50 px-3 py-1 rounded-full">INDONESIAN LANGUAGE</p>
                        <p class="text-xs text-gray-600 italic leading-relaxed my-6 px-2">
                            "Bahasa adalah jendela dunia. Saya berupaya agar setiap siswa mencintai literasi sebagai kunci kesuksesan."
                        </p>
                        
                        <div class="flex w-full pt-6 mt-auto border-t border-teal-900/10 justify-center gap-8">
                            <div>
                                <h4 class="text-xl font-bold text-teal-800">25+</h4>
                                <p class="text-[8px] font-bold text-gray-500 uppercase tracking-widest mt-1">YEARS EXP</p>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-teal-800">Senior</h4>
                                <p class="text-[8px] font-bold text-gray-500 uppercase tracking-widest mt-1">FACULTY</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grid of 4 Smaller Cards -->
                <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Small Card 1 -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-50 flex gap-5 hover:-translate-y-1 transition duration-300">
                        <div class="w-16 h-16 rounded-xl overflow-hidden shrink-0 bg-gray-100 shadow-inner">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=150&auto=format&fit=crop" onerror="this.src='https://ui-avatars.com/api/?name=Anita&background=e2e8f0&color=475569'" alt="Anita Wijaya" class="w-full h-full object-cover">
                        </div>
                        <div class="flex flex-col justify-center">
                            <h3 class="text-sm font-bold text-gray-900">Anita Wijaya, S.Pd</h3>
                            <p class="text-[8px] font-extrabold text-teal-600 uppercase tracking-widest mt-1 mb-2">MATHEMATICS</p>
                            <p class="text-[10px] text-gray-500 italic leading-relaxed">"Making math logic accessible to everyone."</p>
                        </div>
                    </div>

                    <!-- Small Card 2 -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-50 flex gap-5 hover:-translate-y-1 transition duration-300">
                        <div class="w-16 h-16 rounded-xl overflow-hidden shrink-0 bg-gray-100 shadow-inner">
                            <img src="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?q=80&w=150&auto=format&fit=crop" onerror="this.src='https://ui-avatars.com/api/?name=Yusuf&background=e2e8f0&color=475569'" alt="Yusuf Mansur" class="w-full h-full object-cover">
                        </div>
                        <div class="flex flex-col justify-center">
                            <h3 class="text-sm font-bold text-gray-900">Yusuf Mansur, S.S</h3>
                            <p class="text-[8px] font-extrabold text-teal-600 uppercase tracking-widest mt-1 mb-2">ENGLISH LITERATURE</p>
                            <p class="text-[10px] text-gray-500 italic leading-relaxed">"Global communication for future leaders."</p>
                        </div>
                    </div>

                    <!-- Small Card 3 -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-50 flex gap-5 hover:-translate-y-1 transition duration-300">
                        <div class="w-16 h-16 rounded-xl overflow-hidden shrink-0 bg-gray-100 shadow-inner">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=150&auto=format&fit=crop" onerror="this.src='https://ui-avatars.com/api/?name=Ratna&background=e2e8f0&color=475569'" alt="Ratna Sari" class="w-full h-full object-cover">
                        </div>
                        <div class="flex flex-col justify-center">
                            <h3 class="text-sm font-bold text-gray-900">Ratna Sari, S.Pd</h3>
                            <p class="text-[8px] font-extrabold text-teal-600 uppercase tracking-widest mt-1 mb-2">CIVICS & HISTORY</p>
                            <p class="text-[10px] text-gray-500 italic leading-relaxed">"Understanding our roots to build the future."</p>
                        </div>
                    </div>

                    <!-- Small Card 4 -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-50 flex gap-5 hover:-translate-y-1 transition duration-300">
                        <div class="w-16 h-16 rounded-xl overflow-hidden shrink-0 bg-gray-100 shadow-inner">
                            <img src="https://images.unsplash.com/photo-1544168190-79c15427015f?q=80&w=150&auto=format&fit=crop" onerror="this.src='https://ui-avatars.com/api/?name=Eko&background=e2e8f0&color=475569'" alt="Eko Prasetyo" class="w-full h-full object-cover">
                        </div>
                        <div class="flex flex-col justify-center">
                            <h3 class="text-sm font-bold text-gray-900">Eko Prasetyo, S.Psi</h3>
                            <p class="text-[8px] font-extrabold text-teal-600 uppercase tracking-widest mt-1 mb-2">COUNSELING (BK)</p>
                            <p class="text-[10px] text-gray-500 italic leading-relaxed">"Guiding potential, fostering character."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @endif

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
