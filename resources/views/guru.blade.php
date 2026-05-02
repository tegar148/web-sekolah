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
        
        @php
            $departments = [
                'Agribisnis Ruminasia',
                'Agribisnis Ternak Unggas',
                'Teknik Komputer & Jaringan',
                'Umum (General Education)'
            ];
            $gurusByDept = isset($gurus) ? $gurus->groupBy('department') : collect();
        @endphp

        @foreach($departments as $dept)
            @if(isset($gurusByDept[$dept]) && $gurusByDept[$dept]->count() > 0)
            <div>
                <div class="flex items-center gap-4 mb-10">
                    <h2 class="text-2xl font-bold text-teal-800 shrink-0">{{ $dept }}</h2>
                    <div class="h-px bg-teal-100 w-full"></div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($gurusByDept[$dept] as $guru)
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-50 flex flex-col hover:-translate-y-1 transition duration-300">
                        <div class="w-12 h-12 rounded-full border-[3px] border-teal-100 p-0.5 mb-4 shrink-0 bg-teal-50 overflow-hidden">
                            @if($guru->image_path)
                            <img src="{{ Storage::url($guru->image_path) }}" alt="{{ $guru->name }}" class="w-full h-full rounded-full object-cover">
                            @else
                            <img src="{{ asset('user-icon-simple-design-free-vector.jpg') }}" alt="{{ $guru->name }}" class="w-full h-full rounded-full object-cover">
                            @endif
                        </div>
                        <h3 class="text-sm font-bold text-gray-900 leading-tight">{{ $guru->name }}</h3>
                        <p class="text-[9px] font-bold text-teal-600 uppercase tracking-wide mb-3 mt-1">{{ $guru->subject }}</p>
                        <p class="text-[10px] text-gray-600 font-medium">NUPTK: {{ $guru->nuptk ?? '-' }}<br>Status: {{ $guru->status ?? '-' }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach

        @if(!isset($gurus) || $gurus->isEmpty())
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg font-medium">Belum ada data guru yang ditambahkan.</p>
        </div>
        @endif


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
