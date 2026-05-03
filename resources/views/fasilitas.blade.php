<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas - SMK Negeri 1 Maesan</title>
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
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Fasilitas' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                {{ $sections['hero']->subtitle ?? 'Mendukung ekosistem belajar masa depan dengan infrastruktur modern dan laboratorium berstandar industri.' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Galeri/Fasilitas Cards Section -->
    <section class="max-w-7xl mx-auto px-6 md:px-12 py-16 md:py-24">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            @forelse($fasilitas as $item)
            <!-- Fasilitas Card -->
            <div class="bg-white rounded-[2rem] overflow-hidden shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-50 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="relative h-64 w-full">
                    @if($item->image_path)
                    <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                    @else
                    <img src="https://placehold.co/800x600/e2e8f0/64748b?text={{ urlencode($item->title) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                    @endif
                </div>
                <div class="p-8 flex flex-col flex-1">
                    <div class="flex items-center gap-2 mb-4 text-teal-600">
                        <!-- We use a generic icon if category is present -->
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <span class="text-[10px] font-extrabold uppercase tracking-widest">{{ $item->category ?? 'FASILITAS UMUM' }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 leading-snug">{{ $item->title }}</h3>
                    <p class="text-xs text-gray-500 leading-relaxed mb-8 flex-1">
                        {{ $item->description }}
                    </p>
                    <div class="flex items-center justify-between border-t border-gray-100 pt-5 mt-auto">
                        @if($item->detail_label && $item->detail_value)
                        <span class="text-[11px] text-gray-500 font-medium">{{ $item->detail_label }}: {{ $item->detail_value }}</span>
                        @else
                        <span class="text-[11px] text-gray-500 font-medium">Lihat Detail</span>
                        @endif
                        <div class="w-6 h-6 text-teal-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-12 text-center text-gray-500">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                <p>Belum ada fasilitas yang ditambahkan.</p>
            </div>
            @endforelse

        </div>
    </section>


    <x-footer />

</body>
</html>
