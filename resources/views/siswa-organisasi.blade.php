<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisasi Siswa - SMK Negeri 1 Maesan</title>
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
            <span class="bg-[#015B63]/30 border border-[#015B63]/50 text-teal-100 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest mb-6 inline-block">
                STUDENT LIFE
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Organisasi Siswa' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                {{ $sections['hero']->subtitle ?? 'Membangun karakter, kepemimpinan, dan inovasi melalui wadah aspirasi yang dinamis di lingkungan SMK Negeri 1 Maesan.' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Main Content Section (Overlapping Hero) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 -mt-24 md:-mt-32 relative z-20 pb-20">
        
        <!-- Top Cards Content -->
        <div class="flex flex-col lg:flex-row gap-8 mb-20 lg:mb-32">
            
            <!-- Left Card (OSIS) -->
            @if(isset($sections['osis']) && $sections['osis']->is_visible)
            @php $osisData = $sections['osis']->extra_data ?? []; @endphp
            <div class="w-full bg-white rounded-[2rem] shadow-[0_8px_30px_rgba(0,0,0,0.04)] sm:p-4 lg:p-4 flex flex-col md:flex-row gap-4 border border-gray-100">
                
                <div class="w-full md:w-1/2 p-6 lg:p-8 flex flex-col">
                    <div class="w-14 h-14 rounded-2xl bg-[#00BCD4] text-white flex justify-center items-center mb-8 shadow-sm">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
                    </div>
                    
                    <h2 class="text-3xl font-bold text-gray-900 mb-6 tracking-tight">{{ $sections['osis']->title ?? 'OSIS' }}</h2>
                    <p class="text-gray-600 leading-relaxed mb-auto text-[15px]">
                        {{ $sections['osis']->subtitle ?? '' }}
                    </p>
                    
                    <!-- Bottom Info -->
                    <div class="flex items-center gap-4 border-t border-gray-100 pt-6 mt-8">
                        <img src="{{ !empty($osisData['avatar']) && \Illuminate\Support\Facades\Storage::disk('public')->exists($osisData['avatar']) ? \Illuminate\Support\Facades\Storage::url($osisData['avatar']) : (!empty($osisData['avatar']) ? $osisData['avatar'] : 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=200&auto=format&fit=crop') }}" class="w-12 h-12 rounded-full object-cover border border-gray-200" alt="Avatar">
                        <div>
                            <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1">{{ $osisData['avatar_role'] ?? 'KETUA UMUM' }}</p>
                            <p class="font-bold text-gray-900 text-sm">{{ $osisData['avatar_name'] ?? 'Aditya Pratama' }}</p>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/2 relative rounded-[1.5rem] overflow-hidden min-h-[300px] md:min-h-full">
                    <img src="{{ $sections['osis']->image && Storage::disk('public')->exists($sections['osis']->image) ? Storage::url($sections['osis']->image) : 'https://images.unsplash.com/photo-1543269865-cbf427effbad?q=80&w=800&auto=format&fit=crop' }}" onerror="this.src='https://placehold.co/800x1200/F1F5F9/94A3B8?text=OSIS+Meeting'" class="absolute inset-0 w-full h-full object-cover" alt="OSIS Activity">
                    
                    <!-- Overlay Badge bottom -->
                    <div class="absolute inset-x-0 bottom-0 p-6 bg-gradient-to-t from-gray-900/90 to-transparent">
                        <span class="bg-[#015B63] text-white text-[9px] font-bold px-2 py-1 uppercase tracking-widest rounded mb-3 inline-block">{{ $osisData['badge_text'] ?? 'LIVE SESSION' }}</span>
                        <h4 class="text-white font-bold text-lg leading-snug">{{ $osisData['badge_title'] ?? 'Rapat Kerja Program UNIK 2024' }}</h4>
                    </div>
                </div>
            </div>
            @endif


        </div>

        <!-- Kelompok Minat & Bakat Section -->
        @if(isset($sections['minat_bakat_header']) && $sections['minat_bakat_header']->is_visible)
        @php $minatBakatHeaderData = $sections['minat_bakat_header']->extra_data ?? []; @endphp
        <div class="pt-8 mb-6 border-t border-gray-100 flex flex-col md:flex-row md:justify-between md:items-end gap-6 pb-2">
            <div>
                <h5 class="text-[#015B63] font-bold text-[10px] tracking-widest uppercase mb-2">{{ $minatBakatHeaderData['tag'] ?? 'EXTRACURRICULAR' }}</h5>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 tracking-tight">{{ $sections['minat_bakat_header']->title ?? 'Kelompok Minat & Bakat' }}</h2>
            </div>
            <div class="md:w-[45%]">
                <p class="text-gray-500 text-[14px] leading-relaxed relative">
                    <span class="absolute -left-3 -top-2 text-3xl text-gray-200 font-serif">"</span>
                    {{ $sections['minat_bakat_header']->subtitle ?? 'Temukan komunitasmu, asah potensimu, dan jadilah versi terbaik dirimu di SMK Negeri 1 Maesan.' }}
                    <span class="text-gray-200 font-serif self-end">"</span>
                </p>
            </div>
        </div>
        @endif

        <!-- Grid of 3 Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $minat_bakats = \App\Models\MinatBakat::all();
            @endphp
            @foreach($minat_bakats as $minat)
            <!-- EX Card -->
            <div class="bg-[#F8FAFC] md:bg-gray-50/80 rounded-[2rem] p-8 border border-gray-100 flex flex-col hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-10">
                    <div class="w-12 h-12 rounded-full bg-white shadow-sm flex justify-center items-center text-[#015B63]">
                        {!! $minat->icon ?? '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>' !!}
                    </div>
                    @if($minat->category)
                    <span class="bg-[#DCECF5] text-[#0284C7] text-[8px] font-bold px-3 py-1 uppercase tracking-widest rounded-full">{{ $minat->category }}</span>
                    @endif
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $minat->title }}</h3>
                <p class="text-gray-500 text-[13px] leading-relaxed mb-10 flex-1">
                    {{ $minat->description }}
                </p>
                <div class="flex items-center justify-end mt-auto">
                    @if($minat->detail_link)
                    <a href="{{ $minat->detail_link }}" class="text-[#015B63] font-bold text-[11px] hover:gap-2 flex items-center gap-1 transition-all">Lihat Detail <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

    </section>

    <x-footer />

</body>
</html>
