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
    <header class="bg-[#2D3748] py-24 md:py-32 relative text-center text-white"
            style="{{ isset($sections['hero']) && $sections['hero']->image ? 'background-image: url(' . Storage::url($sections['hero']->image) . '); background-size: cover; background-position: center;' : '' }}">
        
        @if(isset($sections['hero']) && $sections['hero']->image)
            <div class="absolute inset-0 bg-black/60 z-0"></div>
        @endif

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
    @if(!isset($sections['tentang_bkk']) || $sections['tentang_bkk']->is_visible)
    @php
        $tentang = isset($sections['tentang_bkk']) && $sections['tentang_bkk']->content ? json_decode($sections['tentang_bkk']->content, true) : [];
    @endphp
    <section class="max-w-6xl mx-auto px-6 py-20 lg:py-28 flex flex-col lg:flex-row gap-16 lg:gap-24 items-center">
        <!-- Image with offset backdrop -->
        <div class="w-full lg:w-1/2 relative flex justify-center">
            <!-- Decorative backdrop shape -->
            <div class="absolute inset-0 bg-[#E6FFFA] rounded-[2rem] transform translate-y-6 -translate-x-6 z-0"></div>
            <!-- Main Image -->
            <img src="{{ isset($sections['tentang_bkk']) && $sections['tentang_bkk']->image ? Storage::url($sections['tentang_bkk']->image) : 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop' }}" onerror="this.src='https://placehold.co/800x800/1F2937/00D1B2?text=BKK+Team'" alt="BKK Team" class="relative z-10 rounded-[2.5rem] shadow-xl w-full max-w-md object-cover aspect-square bg-[#1F2937]">
            
            <!-- Optional text overlay imitating the badge text "BAKK TEAM SAF&SET TUP BE TODO" -->
            <!-- We will let the image handle it or just leave it clean per photo -->
        </div>

        <div class="w-full lg:w-1/2">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 leading-tight">{{ $sections['tentang_bkk']->title ?? 'Tentang BKK' }}</h2>
            <p class="text-gray-600 mb-6 leading-relaxed text-[15px]">
                {{ $tentang['text_1'] ?? 'Bursa Kerja Khusus (BKK) SMK Negeri 1 MAESAN adalah lembaga yang dibentuk sebagai perantara antara sekolah dengan dunia industri untuk kepentingan penempatan tamatan.' }}
            </p>
            <p class="text-gray-600 mb-10 leading-relaxed text-[15px]">
                {{ $tentang['text_2'] ?? 'Kami berfungsi sebagai pusat informasi lowongan kerja, konseling karir, dan wadah kerjasama industri yang berkelanjutan. Fokus utama kami adalah memastikan setiap lulusan memiliki kompetensi yang relevan dan akses langsung ke peluang karir impian mereka.' }}
            </p>
            
            <div class="flex gap-16 border-t border-gray-100 pt-8">
                @if(isset($tentang['stats']) && is_array($tentang['stats']))
                    @foreach($tentang['stats'] as $stat)
                    <div>
                        <h3 class="text-3xl font-extrabold text-[#00D1B2]">{{ $stat['value'] ?? '' }}</h3>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-2">{{ $stat['label'] ?? '' }}</p>
                    </div>
                    @endforeach
                @else
                    <div>
                        <h3 class="text-3xl font-extrabold text-[#00D1B2]">50+</h3>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-2">MITRA INDUSTRI</p>
                    </div>
                    <div>
                        <h3 class="text-3xl font-extrabold text-[#00D1B2]">90%</h3>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-2">TINGKAT PENYERAPAN</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
    @endif

    <!-- Layanan Unggulan Kami -->
    @if(!isset($sections['layanan']) || $sections['layanan']->is_visible)
    @php
        $layanan = isset($sections['layanan']) && $sections['layanan']->content ? json_decode($sections['layanan']->content, true) : [];
        if (!is_array($layanan)) $layanan = [];
    @endphp
    <section class="bg-[#F8FAFC] py-20 lg:py-28 border-y border-gray-100">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $sections['layanan']->title ?? 'Layanan Unggulan Kami' }}</h2>
                <p class="text-gray-500 max-w-xl mx-auto text-[15px]">{{ $sections['layanan']->subtitle ?? 'Memberikan dukungan komprehensif bagi siswa dan alumni melalui ekosistem karir digital yang terintegrasi.' }}</p>
            </div>

            <!-- Grid Layout representing the 4 cards -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                @foreach($layanan as $index => $item)
                    @if(isset($item['style']) && $item['style'] == 'wide_white')
                    <!-- Card 1 (Wide White) -->
                    <div class="md:col-span-7 bg-white rounded-[2rem] p-10 flex flex-col shadow-sm hover:shadow-md transition">
                        <div class="flex justify-between items-start mb-12">
                            <div class="w-12 h-12 rounded-full bg-[#F0FBFA] text-[#00D1B2] flex items-center justify-center -ml-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                            </div>
                            @if(!empty($item['tag']))
                            <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest border border-gray-100 px-3 py-1 rounded-full">{{ $item['tag'] }}</span>
                            @endif
                        </div>
                        <div class="mt-auto">
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $item['title'] ?? '' }}</h3>
                            <p class="text-[13px] text-gray-500 max-w-sm">{{ $item['desc'] ?? '' }}</p>
                        </div>
                    </div>

                    @elseif(isset($item['style']) && $item['style'] == 'dark_teal')
                    <!-- Card 2 (Dark Teal) -->
                    <div class="md:col-span-5 bg-[#015B63] rounded-[2rem] p-10 flex flex-col text-white shadow-sm hover:-translate-y-1 transition duration-300">
                        <div class="flex justify-between items-start mb-12">
                            <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center -ml-2">
                                <svg class="w-5 h-5 opacity-90" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            @if(!empty($item['tag']))
                            <span class="text-[9px] font-bold text-teal-200 uppercase tracking-widest border border-teal-700 px-3 py-1 rounded-full">{{ $item['tag'] }}</span>
                            @endif
                        </div>
                        <div class="mt-auto">
                            <h3 class="text-xl font-bold mb-3">{{ $item['title'] ?? '' }}</h3>
                            <p class="text-[13px] text-teal-100 opacity-90 leading-relaxed">{{ $item['desc'] ?? '' }}</p>
                        </div>
                    </div>

                    @elseif(isset($item['style']) && $item['style'] == 'light_blue')
                    <!-- Card 3 (Light Blue) -->
                    <div class="md:col-span-5 bg-[#DCECF5] rounded-[2rem] p-10 flex flex-col shadow-sm hover:shadow-md transition">
                        <div class="flex justify-between items-start mb-12">
                            <div class="w-12 h-12 rounded-full bg-black/5 text-[#015B63] flex items-center justify-center -ml-2">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            @if(!empty($item['tag']))
                            <span class="text-[9px] font-bold text-gray-500 uppercase tracking-widest border border-gray-300 px-3 py-1 rounded-full">{{ $item['tag'] }}</span>
                            @endif
                        </div>
                        <div class="mt-auto">
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $item['title'] ?? '' }}</h3>
                            <p class="text-[13px] text-gray-600 max-w-xs leading-relaxed">{{ $item['desc'] ?? '' }}</p>
                        </div>
                    </div>

                    @elseif(isset($item['style']) && $item['style'] == 'wide_white_2')
                    <!-- Card 4 (White Wide) -->
                    <div class="md:col-span-7 bg-white rounded-[2rem] p-10 flex flex-col shadow-sm hover:shadow-md transition">
                        <div class="flex justify-between items-start mb-12">
                            <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center -ml-2">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            @if(!empty($item['tag']))
                            <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest border border-gray-100 px-3 py-1 rounded-full">{{ $item['tag'] }}</span>
                            @endif
                        </div>
                        <div class="mt-auto">
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $item['title'] ?? '' }}</h3>
                            <p class="text-[13px] text-gray-500 max-w-sm leading-relaxed">{{ $item['desc'] ?? '' }}</p>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Mitra Industri Strategis -->
    @php
        $welcomeSections = \App\Models\SiteSection::where('page', 'welcome')->get()->keyBy('section_key');
        $mitraAlumni = $welcomeSections['mitra_alumni'] ?? null;
        $rawPartners = $mitraAlumni && $mitraAlumni->content ? json_decode($mitraAlumni->content, true) : [];
        if (!is_array($rawPartners)) $rawPartners = [];
        
        $partners = array_filter($rawPartners, function($item) {
            return is_string($item);
        });
        
        $marqueePartners = count($partners) > 0 ? array_merge($partners, $partners, $partners, $partners) : [];
    @endphp

    <section class="py-20 lg:py-24 bg-white overflow-hidden">
        <div class="max-w-6xl mx-auto px-6 text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Mitra Industri Strategis</h2>
            <p class="text-gray-500 max-w-xl mx-auto text-[14px]">Berpartner dengan perusahaan nasional dan multinasional untuk mencetak tenaga kerja profesional siap pakai.</p>
        </div>
            
        @if(count($partners) > 0)
        <div class="relative w-full pb-10">
            <style>
                @keyframes scroll-right {
                    0% { transform: translateX(calc(-100% / 4)); }
                    100% { transform: translateX(0); }
                }
                .animate-marquee-right {
                    display: flex;
                    width: max-content;
                    animation: scroll-right 40s linear infinite;
                }
                .animate-marquee-right:hover {
                    animation-play-state: paused;
                }
            </style>
            <div class="animate-marquee-right gap-6 px-6">
                @foreach($marqueePartners as $partnerLogo)
                <div class="w-32 h-20 md:w-48 md:h-28 bg-gray-50 rounded-2xl flex items-center justify-center p-4 shrink-0 hover:shadow-md transition duration-300">
                    <img src="{{ Storage::url($partnerLogo) }}" alt="Partner Logo" class="max-w-full max-h-full object-contain grayscale hover:grayscale-0 transition duration-500">
                </div>
                @endforeach
            </div>
        </div>
        @else
        <!-- Logos placeholder -->
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex flex-wrap justify-center gap-8 md:gap-12 opacity-50 grayscale hover:grayscale-0 transition-all duration-500">
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
        @endif
    </section>

    <!-- Call To Action -->
    @if(!isset($sections['cta']) || $sections['cta']->is_visible)
    @php
        $ctaData = isset($sections['cta']) && $sections['cta']->content ? json_decode($sections['cta']->content, true) : [];
    @endphp
    <section class="max-w-6xl mx-auto px-6 pb-20">
        <div class="bg-[#00BCD4] rounded-[2rem] md:rounded-[3rem] p-10 md:p-16 text-center text-white relative overflow-hidden shadow-2xl"
             style="{{ isset($sections['cta']) && $sections['cta']->image ? 'background-image: url(' . Storage::url($sections['cta']->image) . '); background-size: cover; background-position: center; background-blend-mode: overlay;' : '' }}">
            <!-- Decorative circle -->
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-white opacity-[0.05] rounded-full z-0"></div>
            
            <div class="relative z-10">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">{{ $sections['cta']->title ?? 'Siap Melangkah ke Dunia Kerja?' }}</h2>
                <p class="text-cyan-50 mb-10 max-w-lg mx-auto leading-relaxed text-sm">{{ $sections['cta']->subtitle ?? 'Daftarkan dirimu sekarang untuk mendapatkan informasi lowongan kerja terbaru dan bimbingan karir dari tim ahli kami.' }}</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ $sections['cta']->button_link ?? '#' }}" class="bg-[#015B63] hover:bg-[#014a50] text-white text-[13px] font-bold px-8 py-3.5 rounded-full transition shadow-lg">{{ $sections['cta']->button_text ?? 'Hubungi BKK Skama' }}</a>
                    @if(isset($ctaData['button_2_text']))
                    <a href="{{ $ctaData['button_2_link'] ?? '#' }}" class="bg-[#4DD0E1] hover:bg-[#26c6da] text-cyan-900 border border-[#4DD0E1] text-[13px] font-bold px-8 py-3.5 rounded-full transition">{{ $ctaData['button_2_text'] }}</a>
                    @else
                    <a href="#" class="bg-[#4DD0E1] hover:bg-[#26c6da] text-cyan-900 border border-[#4DD0E1] text-[13px] font-bold px-8 py-3.5 rounded-full transition">Info Lowongan Kerja</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif

    <x-footer />

</body>
</html>
