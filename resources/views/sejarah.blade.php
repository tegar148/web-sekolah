<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah - SMK Negeri 1 Maesan</title>
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
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Sejarah' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                {{ $sections['hero']->subtitle ?? 'Menelusuri jejak langkah dan dedikasi SMK Negeri 1 Maesan dalam mencetak generasi unggul sejak tahun 2004.' }}
            </p>
        </div>
    </header>
    @endif

    <!-- History Timeline Section (Admin Toggle) -->
    @if(!isset($sections['content']) || $sections['content']->is_visible)
    <section class="py-20 md:py-32 max-w-7xl mx-auto px-6 md:px-12 grid grid-cols-1 lg:grid-cols-12 gap-16 relative">
        
        <!-- Left Banner: Established & Intro -->
        <div class="lg:col-span-5 h-full relative">
            <div class="sticky top-32">
                <div class="inline-block px-4 py-1.5 bg-blue-100 text-blue-800 text-[10px] font-bold tracking-widest uppercase rounded-full mb-6">
                    {{ $sections['content']->subtitle ?? 'ESTABLISHED 2004' }}
                </div>
                
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                    {{ $sections['content']->title ?? 'Membangun Fondasi Masa Depan Sejak Awal Milenium.' }}
                </h2>
                
                <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-10">
                    {!! nl2br(e($sections['content']->content ?? 'SMK Negeri 1 MAESAN lahir dari visi luhur untuk menyediakan akses pendidikan vokasi berkualitas di wilayah Bondowoso. Dimulai dengan fasilitas terbatas, semangat kami tak pernah padam untuk mencetak generasi yang Unggul, Inovatif, dan Berkarakter.')) !!}
                </p>
                
                <!-- Old vintage document image matching the design -->
                 <div class="relative w-full rounded-lg overflow-hidden shadow-2xl border-4 border-white">
                    @if(isset($sections['content']) && $sections['content']->image)
                        <img src="{{ Storage::url($sections['content']->image) }}" alt="Sejarah SMK" class="w-full h-auto object-cover opacity-90 sepia-[.3]">
                    @else
                        <img src="https://images.unsplash.com/photo-1544812683-9b8830f3f2d2?q=80&w=800&auto=format&fit=crop" onerror="this.src='https://placehold.co/800x1200/cbbba4/695945?text=Old+Document'" alt="Sejarah SMK" class="w-full h-auto object-cover opacity-90 sepia-[.3]">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                </div>
            </div>
        </div>

        <!-- Right Timeline -->
        <div class="lg:col-span-7 relative pl-0 md:pl-10">
            <!-- Central Line -->
            <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-[1px] bg-gray-200 -transform-translate-x-1/2"></div>
            
            <div class="space-y-24 relative z-10">
                @foreach($sejarah_items as $index => $item)
                    @php
                        $mod = $index % 4;
                        $flexDir = in_array($mod, [0, 2]) ? 'flex-row' : 'flex-row-reverse';
                        $yearAlign = in_array($mod, [0, 2]) ? 'md:text-right' : 'md:text-left';
                        $marginClass = in_array($mod, [0, 2]) ? 'ml-auto' : 'mr-auto';
                        $textAlign = in_array($mod, [0, 2]) ? '' : 'text-left md:text-right';
                        
                        $dotColor = match($mod) {
                            0 => 'bg-teal-600',
                            1 => 'bg-gray-600',
                            2 => 'bg-teal-700',
                            3 => 'bg-cyan-400',
                        };
                        
                        $cardBg = $mod === 3 ? 'bg-[#E0F2FE]' : 'bg-white';
                        $textDescColor = $mod === 3 ? 'text-gray-700' : 'text-gray-600';
                        
                        $borderClass = match($mod) {
                            0 => 'border-l-4 border-teal-600',
                            1 => 'border-r-0 md:border-r-4 md:border-l-0 border-l-4 border-gray-600',
                            2 => 'border-l-4 border-teal-700',
                            3 => 'border-r-0 md:border-r-4 md:border-l-0 border-l-4 border-cyan-400',
                        };
                    @endphp

                    <div class="relative flex flex-col md:{{ $flexDir }} items-center justify-between group">
                        <div class="md:w-5/12 text-center {{ $yearAlign }} mb-6 md:mb-0 opacity-20 group-hover:opacity-100 transition-opacity duration-500">
                            <span class="text-6xl font-bold text-gray-300">{{ $item->tahun }}</span>
                        </div>
                        
                        <div class="hidden md:flex absolute left-1/2 -translate-x-1/2 w-4 h-4 {{ $dotColor }} rounded-full border-4 border-white shadow"></div>
                        
                        <div class="md:w-5/12 {{ $marginClass }} w-full">
                            <div class="{{ $cardBg }} p-6 rounded-xl shadow-lg {{ $borderClass }} relative hover:-translate-y-1 transition-transform duration-300">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $item->judul }}</h3>
                                <p class="text-xs {{ $textDescColor }} leading-relaxed {{ $textAlign }}">
                                    {{ $item->deskripsi }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif


    <x-footer />

</body>
</html>
