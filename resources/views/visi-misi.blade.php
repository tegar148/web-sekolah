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
            @foreach($visi_items as $item)
            <div class="bg-white p-8 rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-gray-50 flex flex-col items-start hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-teal-600 flex items-center justify-center mb-6">
                    {!! $item->icon !!}
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">{{ $item->judul }}</h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    {{ $item->deskripsi }}
                </p>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Misi Section -->
    <section class="py-16 md:py-24 max-w-6xl mx-auto px-6 md:px-12 border-t border-gray-100">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-12">Misi Strategis Kami</h2>
        
        <div class="space-y-10 relative">
            <!-- Vertical Line -->
            <div class="absolute left-4 top-4 bottom-4 w-px bg-gray-200"></div>

            @foreach($misi_items as $index => $item)
            <div class="flex items-start gap-6 relative z-10">
                <div class="w-8 h-8 rounded-full bg-teal-700 text-white flex items-center justify-center font-bold text-xs shrink-0 mt-1 shadow-sm border-4 border-[#F8FAFC]">
                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                </div>
                <div>
                    <h3 class="text-lg font-bold text-teal-700 mb-2">{{ $item->judul }}</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $item->deskripsi }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <x-footer />

</body>
</html>
