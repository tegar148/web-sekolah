<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi & Misi - SMK Negeri 1 Maesan</title>
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
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Visi & Misi' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                {{ $sections['hero']->subtitle ?? 'Arah dan tujuan utama SMK Negeri 1 Maesan dalam mencetak generasi unggul' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Visi Section -->
    <section class="py-16 md:py-24 max-w-6xl mx-auto px-6 md:px-12">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-6">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 border-b-4 border-gray-800 pb-2 inline-block">
                    Visi SMK Negeri 1 Maesan
                </h2>
            </div>
            <div class="bg-[#CCF0EF] text-teal-800 font-bold px-6 py-3 rounded-full text-sm md:text-base whitespace-nowrap shadow-sm">
                "SKAMA UNIK (SMK Maesan Unggul, Inovatif, Berkarakter)"
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-white p-8 rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-gray-50 flex flex-col items-start hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-teal-600 flex items-center justify-center mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Unggul</h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Memiliki kompetensi sikap, pengetahuan, ketrampilan sesuai yang diharapkan industri, berprestasi akademik dan non-akademik, dan berdaya saing global.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-8 rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-gray-50 flex flex-col items-start hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-teal-600 flex items-center justify-center mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Inovatif</h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Memiliki kemampuan bernalar kritis sehingga kreatif dalam menghasilkan inovasi berkelanjutan demi menjawab tantangan masa depan.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-8 rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-gray-50 flex flex-col items-start hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-teal-600 flex items-center justify-center mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Berkarakter</h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Mampu menunjukkan Profil Pelajar Pancasila sebagai landasan moral dan etika dalam bermasyarakat dan berkarya.
                </p>
            </div>
        </div>
    </section>

    <!-- Misi Section -->
    <section class="py-16 md:py-24 max-w-6xl mx-auto px-6 md:px-12 border-t border-gray-100">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-12">Misi Strategis Kami</h2>
        
        <div class="space-y-10 relative">
            <!-- Vertical Line -->
            <div class="absolute left-4 top-4 bottom-4 w-px bg-gray-200"></div>

            <!-- Item 1 -->
            <div class="flex items-start gap-6 relative z-10">
                <div class="w-8 h-8 rounded-full bg-teal-700 text-white flex items-center justify-center font-bold text-xs shrink-0 mt-1 shadow-sm border-4 border-[#F8FAFC]">
                    01
                </div>
                <div>
                    <h3 class="text-lg font-bold text-teal-700 mb-2">Kultur & Akhlak</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Mengembangkan kultur sekolah untuk memberdayakan peserta didik agar menjadi insan yang berakhlak mulia, berkarakter, kreatif, dan kompetitif.</p>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="flex items-start gap-6 relative z-10">
                <div class="w-8 h-8 rounded-full bg-teal-700 text-white flex items-center justify-center font-bold text-xs shrink-0 mt-1 shadow-sm border-4 border-[#F8FAFC]">
                    02
                </div>
                <div>
                    <h3 class="text-lg font-bold text-teal-700 mb-2">Kesiapan Kerja Global</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Meningkatkan kompetensi peserta didik untuk memasuki dunia kerja, baik di tingkat nasional maupun internasional berdasarkan imtak dan iptek.</p>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="flex items-start gap-6 relative z-10">
                <div class="w-8 h-8 rounded-full bg-teal-700 text-white flex items-center justify-center font-bold text-xs shrink-0 mt-1 shadow-sm border-4 border-[#F8FAFC]">
                    03
                </div>
                <div>
                    <h3 class="text-lg font-bold text-teal-700 mb-2">Profesionalisme Pendidik</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Meningkatkan mutu kompetensi pendidik dan tenaga kependidikan yang profesional untuk menjamin standar kualitas pendidikan tinggi.</p>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="flex items-start gap-6 relative z-10">
                <div class="w-8 h-8 rounded-full bg-teal-700 text-white flex items-center justify-center font-bold text-xs shrink-0 mt-1 shadow-sm border-4 border-[#F8FAFC]">
                    04
                </div>
                <div>
                    <h3 class="text-lg font-bold text-teal-700 mb-2">Nasionalisme & Disiplin</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Menanamkan sikap disiplin, kepekaan sosial, semangat nasionalisme dan patriotisme kepada seluruh warga sekolah.</p>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="flex items-start gap-6 relative z-10">
                <div class="w-8 h-8 rounded-full bg-teal-700 text-white flex items-center justify-center font-bold text-xs shrink-0 mt-1 shadow-sm border-4 border-[#F8FAFC]">
                    05
                </div>
                <div>
                    <h3 class="text-lg font-bold text-teal-700 mb-2">Infrastruktur Modern</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Meningkatkan sarana dan prasarana pendidikan untuk mendukung proses pembelajaran yang optimal dan berbasis teknologi.</p>
                </div>
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
