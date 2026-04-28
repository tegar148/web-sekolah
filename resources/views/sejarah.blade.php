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
                <!-- 2004 -->
                <div class="relative flex flex-col md:flex-row items-center justify-between group">
                    <div class="md:w-5/12 text-center md:text-right mb-6 md:mb-0 opacity-20 group-hover:opacity-100 transition-opacity duration-500">
                        <span class="text-6xl font-bold text-gray-300">2004</span>
                    </div>
                    
                    <div class="hidden md:flex absolute left-1/2 -translate-x-1/2 w-4 h-4 bg-teal-600 rounded-full border-4 border-white shadow"></div>
                    
                    <div class="md:w-5/12 ml-auto w-full">
                        <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-teal-600 relative hover:-translate-y-1 transition-transform duration-300">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Peletakan Batu Pertama</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">
                                Peresmian pendirian sekolah oleh pemerintah daerah dengan komitmen menyediakan pendidikan kejuruan yang relevan dengan kebutuhan industri lokal.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 2010 -->
                <div class="relative flex flex-col md:flex-row-reverse items-center justify-between group">
                    <div class="md:w-5/12 text-center md:text-left mb-6 md:mb-0 opacity-20 group-hover:opacity-100 transition-opacity duration-500">
                        <span class="text-6xl font-bold text-gray-300">2010</span>
                    </div>
                    
                    <div class="hidden md:flex absolute left-1/2 -translate-x-1/2 w-4 h-4 bg-gray-600 rounded-full border-4 border-white shadow"></div>
                    
                    <div class="md:w-5/12 mr-auto w-full">
                        <div class="bg-white p-6 rounded-xl shadow-lg border-r-0 md:border-r-4 md:border-l-0 border-l-4 border-gray-600 relative hover:-translate-y-1 transition-transform duration-300">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Ekspansi Konsentrasi</h3>
                            <p class="text-xs text-gray-600 leading-relaxed text-left md:text-right">
                                Penambahan program keahlian baru di bidang teknologi informasi dan otomotif guna menyambut era digitalisasi industri di Indonesia.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 2018 -->
                <div class="relative flex flex-col md:flex-row items-center justify-between group">
                    <div class="md:w-5/12 text-center md:text-right mb-6 md:mb-0 opacity-20 group-hover:opacity-100 transition-opacity duration-500">
                        <span class="text-6xl font-bold text-gray-300">2018</span>
                    </div>
                    
                    <div class="hidden md:flex absolute left-1/2 -translate-x-1/2 w-4 h-4 bg-teal-700 rounded-full border-4 border-white shadow"></div>
                    
                    <div class="md:w-5/12 ml-auto w-full">
                        <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-teal-700 relative hover:-translate-y-1 transition-transform duration-300">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Sertifikasi & Akreditasi A</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">
                                Pencapaian standar nasional tertinggi melalui akreditasi 'A', mengukuhkan SMK Negeri 1 MAESAN sebagai sekolah rujukan di wilayahnya.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 2024 -->
                <div class="relative flex flex-col md:flex-row-reverse items-center justify-between group">
                    <div class="md:w-5/12 text-center md:text-left mb-6 md:mb-0 opacity-20 group-hover:opacity-100 transition-opacity duration-500">
                        <span class="text-6xl font-bold text-gray-300">2024</span>
                    </div>
                    
                    <div class="hidden md:flex absolute left-1/2 -translate-x-1/2 w-4 h-4 bg-cyan-400 rounded-full border-4 border-white shadow"></div>
                    
                    <div class="md:w-5/12 mr-auto w-full">
                        <div class="bg-[#E0F2FE] p-6 rounded-xl shadow-lg border-r-0 md:border-r-4 md:border-l-0 border-l-4 border-cyan-400 relative hover:-translate-y-1 transition-transform duration-300">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Digital Atheneum Transformation</h3>
                            <p class="text-xs text-gray-700 leading-relaxed text-left md:text-right">
                                Transformasi menjadi sekolah berbasis digital sepenuhnya dengan implementasi smart classroom dan kemitraan industri global.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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
