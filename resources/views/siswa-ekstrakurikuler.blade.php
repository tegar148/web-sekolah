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
            @if(isset($sections['pramuka']) && $sections['pramuka']->is_visible)
            @php $pramukaData = $sections['pramuka']->extra_data ?? []; @endphp
            <div class="md:col-span-8 bg-gray-900 rounded-[2.5rem] p-8 md:p-12 relative overflow-hidden flex flex-col shadow-lg border border-gray-800 min-h-[360px] hover:border-teal-400 group transition duration-500">
                <!-- Abstract Background -->
                <div class="absolute inset-0 z-0 opacity-40 mix-blend-screen bg-cover bg-center" style="background-image: url('{{ $sections['pramuka']->image ? Storage::url($sections['pramuka']->image) : 'https://images.unsplash.com/photo-1506506450630-f421f1d16712?q=80&w=800&auto=format&fit=crop' }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/80 to-teal-900/40 z-0"></div>
                
                <div class="relative z-10 mt-auto w-full max-w-xl text-white">
                    <span class="bg-[#00BCD4] text-white text-[9px] font-bold px-3 py-1 uppercase tracking-widest rounded mb-4 inline-block shadow-sm">{{ $pramukaData['badge'] ?? 'WAJIB' }}</span>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ $sections['pramuka']->title ?? 'Pramuka' }}</h2>
                    <p class="text-gray-300 text-[14px] leading-relaxed mb-8">
                        {{ $sections['pramuka']->subtitle ?? '' }}
                    </p>
                    
                    <div class="flex flex-wrap items-center gap-6 text-[11px] font-medium text-[#4DD0E1]">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $pramukaData['schedule'] ?? 'Jumat, 14:00 WIB' }}
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                            {{ $pramukaData['achievement'] ?? 'Juara Umum Kwarran 2023' }}
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- PMR (Narrow White Card) -->
            @if(isset($sections['pmr']) && $sections['pmr']->is_visible)
            @php $pmrData = $sections['pmr']->extra_data ?? []; @endphp
            <div class="md:col-span-4 bg-white rounded-[2.5rem] p-8 md:p-10 shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="w-14 h-14 rounded-2xl bg-red-50 text-red-500 flex justify-center items-center mb-8 border border-red-100">
                    {!! $pmrData['icon'] ?? '<svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m-14-4V5a2 2 0 012-2h4a2 2 0 012 2v2m-6 0h6"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 0v2m0-2h2m-2 0H10"></path></svg>' !!}
                </div>
                
                <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $sections['pmr']->title ?? 'PMR' }}</h3>
                <p class="text-gray-500 text-[13px] leading-relaxed mb-auto">
                    {{ $sections['pmr']->subtitle ?? '' }}
                </p>
                
                <div class="bg-gray-50 rounded-xl p-4 mt-8 mb-6 border border-gray-100">
                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1">JADWAL</p>
                    <p class="text-xs font-bold text-gray-700">{{ $pmrData['schedule'] ?? 'Sabtu, 08:00 WIB' }}</p>
                </div>
                
                <a href="{{ $pmrData['link'] ?? '#' }}" class="text-[#017A85] font-bold text-xs flex items-center gap-2 hover:gap-3 transition-all">Lihat Detail Program <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
            </div>
            @endif


            @foreach(\App\Models\Ekstrakurikuler::all() as $item)
            <!-- Dynamic Card -->
            <div class="md:col-span-6 bg-white rounded-[2.5rem] p-8 md:p-10 shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-{{ $item->icon_color ?? 'teal' }}-50 text-{{ $item->icon_color ?? 'teal' }}-600 flex justify-center items-center border border-{{ $item->icon_color ?? 'teal' }}-100">
                        {!! $item->icon ?? '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>' !!}
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">{{ $item->title }}</h3>
                </div>
                <p class="text-gray-500 text-[13px] leading-relaxed mb-10 flex-1">
                    {{ $item->description }}
                </p>
                <div class="flex gap-8 border-t border-gray-100 pt-6">
                    <div>
                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1">{{ $item->schedule_label }}</p>
                        <p class="text-xs font-bold text-gray-800">{{ $item->schedule_value }}</p>
                    </div>
                    <div>
                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1">{{ $item->info_label }}</p>
                        <p class="text-xs font-bold text-gray-800">{{ $item->info_value }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </section>



    <x-footer />

</body>
</html>
