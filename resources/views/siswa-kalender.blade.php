<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender Pendidikan - SMK Negeri 1 Maesan</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; display: flex; flex-direction: column; min-height: 100vh;}
        main { flex: 1; }
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
            <span class="text-[#00BCD4] text-[11px] font-bold px-3 py-1 uppercase tracking-widest mb-4 inline-block">
                ACADEMIC YEAR 2024/2025
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Kalender Pendidikan' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto opacity-90">
                {{ $sections['hero']->subtitle ?? 'Panduan resmi jadwal akademik, kegiatan sekolah, dan hari libur nasional untuk komunitas SMK Negeri 1 Maesan.' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Main Content Section (Overlapping Hero) -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 -mt-24 md:-mt-32 relative z-20 pb-24 w-full flex justify-center">
        
        <!-- Form Download Card -->
        <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgba(0,0,0,0.08)] border border-gray-100 p-8 md:p-14 w-full max-w-2xl">
            <div class="text-center mb-10">
                <div class="w-16 h-16 bg-[#F1F5F9] text-[#015B63] rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner ring-4 ring-white">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">Unduh Dokumen Kalender</h2>
                <p class="text-gray-500 text-[14px] leading-relaxed max-w-md mx-auto">
                    Dapatkan salinan PDF kalender akademik lengkap dengan rincian jadwal ujian, libur, dan agenda penting sekolah lainnya.
                </p>
            </div>

            <div class="mt-8">
                <a href="#" class="w-full bg-[#015B63] hover:bg-[#014a50] text-white font-bold text-sm py-4 rounded-xl shadow-md transition-all flex justify-center items-center gap-2 group">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Unduh PDF Sekarang
                </a>
                <p class="text-[10px] text-gray-400 mt-4 text-center">Ukuran file: ~2.5 MB (PDF)</p>
            </div>
        </div>

    </main>

    <!-- Generic Footer Component used on all subpages -->
    <footer class="bg-[#F8FAFC] pt-16 pb-8 border-t border-gray-100 mt-auto">
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
                    <li><a href="{{ route('info.ppdb') }}" class="hover:text-blue-600 transition">Info PPDB</a></li>
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
