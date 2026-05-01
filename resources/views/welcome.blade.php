<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 1 Maesan</title>
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
    <header class="relative bg-[#E8EDF2] bg-cover bg-center overflow-hidden min-h-[70vh] flex flex-col justify-center"
            style="{{ isset($sections['hero']) && $sections['hero']->image ? 'background-image: url(' . Storage::url($sections['hero']->image) . ');' : '' }}">
        
        @if(isset($sections['hero']) && $sections['hero']->image)
            <div class="absolute inset-0 bg-black/60 z-0"></div>
        @endif

        <!-- Abstract gradient background representing modern tech/education -->
        @if(!isset($sections['hero']) || !$sections['hero']->image)
        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-white to-transparent h-32 z-10 w-full"></div>
        <div class="absolute top-0 right-0 w-1/2 h-full opacity-30 pointer-events-none hidden md:block">
            <svg viewBox="0 0 400 400" fill="none" class="w-full h-full text-blue-100" xmlns="http://www.w3.org/2000/svg">
                <circle cx="200" cy="200" r="180" stroke="currentColor" stroke-width="40"/>
                <circle cx="350" cy="100" r="80" stroke="#E2E8F0" stroke-width="20"/>
            </svg>
        </div>
        @endif
        
        <div class="max-w-6xl mx-auto px-6 md:px-12 relative z-20 w-full py-20 flex flex-col items-center text-center">
            <h3 class="text-[10px] font-bold text-blue-700 uppercase tracking-widest mb-6 bg-blue-100 border border-blue-200 inline-block px-4 py-1.5 rounded shadow-sm">
                {{ $sections['hero']->button_text ?? 'DIGITAL & PREMIUM EXPERIENCE' }}
            </h3>
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-bold {{ isset($sections['hero']) && $sections['hero']->image ? 'text-white' : 'text-[#111827]' }} leading-tight mb-4 tracking-tight">
                {!! nl2br(e($sections['hero']->title ?? 'Nurturing Potential into Professional Mastery')) !!}
            </h1>
            <p class="mt-4 {{ isset($sections['hero']) && $sections['hero']->image ? 'text-gray-200' : 'text-gray-500' }} max-w-2xl text-base md:text-xl font-light">
                {{ $sections['hero']->subtitle ?? 'A sanctuary for technical innovation and academic rigor, SMK Negeri 1 Maesan bridges the gap between traditional learning and modern industry demands.' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Sambutan Component (Admin Toggle) -->
    @if(!isset($sections['sambutan']) || $sections['sambutan']->is_visible)
    <x-about.sambutan />
    @endif

    <!-- Berita Section (Admin Toggle) -->
    @if(!isset($sections['berita']) || $sections['berita']->is_visible)
    <section class="py-20 md:py-32 bg-[#F8FAFC]">
        <div class="max-w-6xl mx-auto px-6 md:px-12">
            <div class="flex justify-between items-end mb-12 border-b border-gray-200 pb-5">
                <div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">HAPPENINGS AT MAESAN</p>
                    <h2 class="text-3xl font-bold text-gray-900">
                        Berita
                    </h2>
                </div>
                <a href="{{ route('berita') }}" class="text-[11px] font-bold text-gray-400 hover:text-blue-600 hidden md:block tracking-widest uppercase items-center gap-1">
                    EXPLORE ALL ARTICLES <span class="text-lg leading-none">&rarr;</span>
                </a>
            </div>
            
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
        </div>
    </section>
    @endif

    <!-- Mitra dan Alumni Section (Admin Toggle) -->
    @if(!isset($sections['mitra_alumni']) || $sections['mitra_alumni']->is_visible)
    <section class="py-24 bg-white relative">
         <div class="max-w-6xl mx-auto px-6 md:px-12 text-center">
             <h4 class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">KONEKSI INDUSTRI</h4>
             <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-6">Mitra Kerja & Alumni</h2>
             <p class="text-gray-500 max-w-2xl mx-auto mb-20 text-sm md:text-base">Keberhasilan institusi diukur dari kualitas alumni dan kepercayaan yang diberikan oleh mitra industri kami.</p>

             <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                 <!-- Testimonial 1 -->
                 <div class="flex flex-col items-center">
                     <div class="w-20 h-20 bg-[#1C2331] rounded-full mb-8 flex items-center justify-center text-white font-serif text-5xl shadow-lg leading-none pt-4">"</div>
                     <p class="text-gray-500 italic text-sm mb-8 leading-relaxed px-4">"Top talent teknis yang dihasilkan di SMK Maesan Digital menjadi modal utama kami dalam men-develop TIM engineering."</p>
                     <p class="font-bold text-gray-900 text-sm">Aris Software</p>
                     <p class="text-[9px] text-gray-400 uppercase tracking-widest mt-1">SENIOR ENGINEER, PT ASTER INDONESIA</p>
                 </div>
                 <!-- Testimonial 2 -->
                 <div class="flex flex-col items-center">
                     <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=200&auto=format&fit=crop" onerror="this.src='https://placehold.co/200x200/e2e8f0/64748b'" alt="Alumni" class="w-20 h-20 rounded-full grayscale mb-8 object-cover border-4 border-gray-100 shadow-md">
                     <p class="text-gray-500 italic text-sm mb-8 leading-relaxed px-4">"Pendidikan vokasi di sini sangat relevan dengan dinamika industri digital yang sangat cepat."</p>
                     <p class="font-bold text-gray-900 text-sm">Riza Arifin</p>
                     <p class="text-[9px] text-gray-400 uppercase tracking-widest mt-1">PRODUCT MANAGER, TECH GLOBAL</p>
                 </div>
                 <!-- Testimonial 3 -->
                 <div class="flex flex-col items-center">
                     <img src="https://images.unsplash.com/photo-1543610892-0b1f7e6d8ac1?q=80&w=200&auto=format&fit=crop" onerror="this.src='https://placehold.co/200x200/e2e8f0/64748b'" alt="Alumni" class="w-20 h-20 rounded-full grayscale mb-8 object-cover border-4 border-gray-100 shadow-md">
                     <p class="text-gray-500 italic text-sm mb-8 leading-relaxed px-4">"Fasilitas yang disediakan memberikan pengalaman nyata sebelum kami terjun ke dunia kerja."</p>
                     <p class="font-bold text-gray-900 text-sm">Budi Santoso</p>
                     <p class="text-[9px] text-gray-400 uppercase tracking-widest mt-1">FOUNDER & CEO, EDU TECH INOVA</p>
                 </div>
             </div>

             <!-- Logo placeholder row -->
             <p class="mt-20 mb-6 text-[9px] font-bold text-gray-300 uppercase tracking-widest">INDUSTRY PARTNERS</p>
             <div class="flex justify-center flex-wrap gap-x-12 gap-y-6 opacity-30 grayscale filter">
                 <div class="h-6 w-24 bg-gray-400 rounded-sm"></div>
                 <div class="h-6 w-28 bg-gray-400 rounded-sm"></div>
                 <div class="h-6 w-24 bg-gray-400 rounded-sm"></div>
                 <div class="h-6 w-32 bg-gray-400 rounded-sm"></div>
                 <div class="h-6 w-20 bg-gray-400 rounded-sm"></div>
             </div>
         </div>
    </section>
    @endif

    <!-- Stats Banner Section (Admin Toggle) -->
    @if(!isset($sections['stats']) || $sections['stats']->is_visible)
    <section class="bg-[#1C2331] text-white py-24 relative overflow-hidden">
        <!-- Abstract background pattern -->
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#3b82f6 1px, transparent 1px); background-size: 30px 30px;"></div>
        
        <div class="max-w-6xl mx-auto px-6 md:px-12 flex flex-col lg:flex-row gap-16 items-center relative z-10">
            <div class="w-full lg:w-1/2">
                <h4 class="text-[10px] font-bold tracking-widest text-blue-400 uppercase mb-4 opacity-80">PENGABDIAN & PRESTASI</h4>
                <h2 class="text-3xl md:text-5xl font-bold leading-tight mb-6">Membangun Fondasi Peradaban Melalui Keahlian</h2>
                <p class="text-gray-400 text-sm leading-relaxed mb-10 font-light pr-4">SMK Negeri 1 MAESAN menggagas model pembelajaran 'Advanced Digital' di mana kelas kolaboratif klasik bertemu dengan referensi teknologi modern. Kami percaya pada pendidikan vokasional sebagai instrumen vital mencetak masa depan.</p>
                <div class="flex items-center gap-5 bg-[#252E40] border border-white/5 p-5 rounded-sm shadow-xl max-w-sm">
                    <div class="w-12 h-12 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-400 text-lg">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                    </div>
                    <div>
                        <p class="font-bold text-sm text-gray-200">Akreditasi Utama A+</p>
                        <p class="text-[11px] text-gray-500 mt-1">Standar kualitas nasional tertinggi untuk institusi pendidikan vokasi terpadu.</p>
                    </div>
                </div>
            </div>
            
            <div class="w-full lg:w-1/2 grid grid-cols-2 gap-px bg-[#2A3447] border border-[#2A3447]">
                <div class="bg-[#1C2331] p-10 hover:bg-[#202838] transition border-t-2 border-transparent hover:border-blue-500">
                    <h3 class="text-4xl md:text-5xl font-bold text-white mb-2 tracking-tight">25+</h3>
                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">TAHUN DEDIKASI</p>
                    <p class="text-[10px] text-gray-500 mt-2">Pengalaman Edukasi</p>
                </div>
                <div class="bg-[#1C2331] p-10 hover:bg-[#202838] transition border-t-2 border-transparent hover:border-blue-500">
                    <h3 class="text-4xl md:text-5xl font-bold text-white mb-2 tracking-tight">1.2K</h3>
                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">SISWA AKTIF</p>
                    <p class="text-[10px] text-gray-500 mt-2">Duta Vokasi</p>
                </div>
                <div class="bg-[#1C2331] p-10 hover:bg-[#202838] transition border-t-2 border-transparent hover:border-blue-500">
                    <h3 class="text-4xl md:text-5xl font-bold text-white mb-2 tracking-tight">4.5K</h3>
                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">ALUMNI SUKSES</p>
                    <p class="text-[10px] text-gray-500 mt-2">Tersebar di Industri</p>
                </div>
                <div class="bg-[#1C2331] p-10 hover:bg-[#202838] transition border-t-2 border-transparent hover:border-blue-500">
                    <h3 class="text-4xl md:text-5xl font-bold text-white mb-2 tracking-tight">85+</h3>
                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">PENGHARGAAN</p>
                    <p class="text-[10px] text-gray-500 mt-2">Prestasi Nasional</p>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Footer Section -->
    <footer class="bg-white pt-24 pb-10 border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-6 md:px-12 grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">
            <div class="col-span-1 md:col-span-4 pr-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="h-8 w-8 bg-green-600 rounded-sm flex flex-col justify-center items-center font-bold text-white shadow-sm border border-green-700">
                        <span class="text-sm">M</span>
                    </div>
                    <div>
                        <h1 class="text-sm font-bold text-gray-900 leading-tight">SMK Negeri 1 MAESAN</h1>
                    </div>
                </div>
                <p class="text-xs text-gray-500 leading-relaxed font-light pr-4">Lembaga pendidikan vokasional terpadu yang berorientasi pada masa depan, menggabungkan pendidikan vokasi dengan kebutuhan kekinian di industri.</p>
                <div class="flex space-x-3 mt-8">
                    <a href="#" class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:text-blue-600 hover:border-blue-600 transition">
                         <span class="sr-only">LinkedIn</span>
                         <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:text-blue-600 hover:border-blue-600 transition">
                         <span class="sr-only">Instagram</span>
                         <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                </div>
            </div>

            <div class="col-span-1 md:col-span-2">
                 <h4 class="font-bold text-gray-900 mb-6 text-[10px] tracking-widest uppercase">NAVIGASI</h4>
                 <ul class="space-y-4 text-xs text-gray-500">
                     <li><a href="#" class="hover:text-blue-600 transition">Tentang Kami</a></li>
                     <li><a href="#" class="hover:text-blue-600 transition">Kurikulum</a></li>
                     <li><a href="#" class="hover:text-blue-600 transition">Fasilitas</a></li>
                     <li><a href="#" class="hover:text-blue-600 transition">Kemitraan</a></li>
                 </ul>
            </div>
            
            <div class="col-span-1 md:col-span-2">
                 <h4 class="font-bold text-gray-900 mb-6 text-[10px] tracking-widest uppercase">PROGRAM</h4>
                 <ul class="space-y-4 text-xs text-gray-500">
                     <li><a href="#" class="hover:text-blue-600 transition">Digital Team</a></li>
                     <li><a href="#" class="hover:text-blue-600 transition">Advanced AI Lab</a></li>
                     <li><a href="#" class="hover:text-blue-600 transition">Agri-Industry</a></li>
                     <li><a href="#" class="hover:text-blue-600 transition">Business Hub</a></li>
                 </ul>
            </div>

            <div class="col-span-1 md:col-span-4">
                 <h4 class="font-bold text-gray-900 mb-6 text-[10px] tracking-widest uppercase">HUBUNGI KAMI</h4>
                 <ul class="space-y-4 text-xs text-gray-500">
                     <li class="flex gap-3">
                         <span class="text-blue-600 mt-0.5">
                             <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                         </span>
                         <span>Jl. Pendidikan Blok No.1, Kab. Bondowoso, Jawa Timur.</span>
                     </li>
                     <li class="flex gap-3">
                         <span class="text-blue-600 mt-0.5">
                             <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                         </span>
                         <span>+62 (823) 5600 0100</span>
                     </li>
                     <li class="flex gap-3">
                         <span class="text-blue-600 mt-0.5">
                             <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                         </span>
                         <span>info@smkn1maesan.sch.id</span>
                     </li>
                 </ul>
            </div>
        </div>
        
        <div class="max-w-6xl mx-auto px-6 md:px-12 pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center text-[10px] text-gray-400">
            <p>© 2026 SMK Negeri 1 Maesan. Dikembangkan oleh Tim IT SMK.</p>
            <div class="space-x-6 mt-4 md:mt-0 font-medium">
                <a href="#" class="hover:text-gray-600 transition">PRIVACY POLICY</a>
                <a href="#" class="hover:text-gray-600 transition">TERMS OF SERVICE</a>
            </div>
        </div>
    </footer>
</body>
</html>
