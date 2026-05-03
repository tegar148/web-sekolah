<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - SMK Negeri 1 Maesan</title>
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
    <header class="bg-[#2D3748] pt-24 pb-32 md:pt-32 md:pb-40 relative text-center text-white overflow-hidden">
        <div class="max-w-4xl mx-auto px-6 relative z-10 flex flex-col items-center">
            <span class="text-[#00BCD4] text-[11px] font-bold px-3 py-1 uppercase tracking-widest mb-4 inline-block">
                {{ $sections['hero']->subtitle ?? 'HAPPENINGS AT MAESAN' }}
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Berita & Informasi' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto opacity-90">
                {!! nl2br(e($sections['hero']->content ?? 'Pusat informasi resmi seputar kegiatan, pencapaian akademik, serta berbagai momen penting di lingkungan SMK Negeri 1 Maesan.' )) !!}
            </p>
        </div>
    </header>
    @endif

    <!-- Main Content Section -->
    <main class="w-full">
        <!-- Berita Section copied from welcome.blade.php -->
        <section class="py-20 md:py-32 bg-[#F8FAFC]">
            <div class="max-w-6xl mx-auto px-6 md:px-12">
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse($beritas as $item)
                    <div class="bg-white rounded-lg border border-gray-100 shadow-sm overflow-hidden hover:shadow-xl transition-shadow duration-300 group flex flex-col">
                        <div class="w-full h-56 bg-slate-900 relative overflow-hidden shrink-0">
                            @if($item->image_path)
                            <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover opacity-80 group-hover:scale-105 group-hover:opacity-100 transition-all duration-700">
                            @endif
                            <div class="absolute top-4 left-4 bg-[#111827] text-white text-[9px] font-bold tracking-widest uppercase px-3 py-1 shadow">{{ $item->category }}</div>
                        </div>
                        <div class="p-8 flex-1 flex flex-col">
                            <p class="text-[10px] text-gray-400 mb-3 uppercase tracking-widest font-semibold flex items-center gap-2">
                                <span class="w-4 h-[1px] bg-gray-300 block"></span> {{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}
                            </p>
                            <h3 class="text-xl font-bold text-gray-900 mb-4 leading-snug group-hover:text-blue-600 transition-colors">{{ $item->title }}</h3>
                            <p class="text-sm text-gray-500 line-clamp-3 mb-6">{{ $item->excerpt }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('berita.show', $item->slug) }}" class="text-[11px] font-bold text-gray-900 group-hover:text-blue-600 uppercase tracking-widest border-b border-gray-300 group-hover:border-blue-600 transition-colors pb-1">READ MORE <span class="text-lg leading-none relative top-[1px]">&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-12 text-center text-gray-500">
                        Belum ada berita yang dipublikasikan.
                    </div>
                    @endforelse
                </div>

                @if($beritas->hasPages())
                <div class="mt-16 text-center">
                    {{ $beritas->links() }}
                </div>
                @endif

            </div>
        </section>
    </main>

    <x-footer />

</body>
</html>
