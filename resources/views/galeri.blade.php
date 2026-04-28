<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - SMK Negeri 1 Maesan</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Instagram overlay effect */
        .ig-overlay {
            opacity: 0;
            transition: opacity 0.2s ease-in-out;
        }
        .ig-card:hover .ig-overlay {
            opacity: 1;
        }
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
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight">{{ $sections['hero']->title ?? 'Galeri' }}</h1>
            <p class="text-gray-300 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                {{ $sections['hero']->subtitle ?? 'Kumpulan dokumentasi kegiatan, fasilitas, dan momen berharga di SMK Negeri 1 Maesan.' }}
            </p>
        </div>
    </header>
    @endif

    <!-- Galeri Content Section -->
    <section class="max-w-5xl mx-auto px-4 md:px-6 py-12 md:py-20">
        
        <!-- Filters -->
        <div class="flex flex-wrap justify-center gap-3 mb-10" id="filter-buttons">
            <button class="filter-btn active px-6 py-2 bg-teal-700 text-white text-sm font-semibold rounded-full shadow-sm" data-filter="all">Semua</button>
            <button class="filter-btn px-6 py-2 bg-blue-100 text-blue-800 text-sm font-medium rounded-full hover:bg-blue-200 transition" data-filter="kegiatan_siswa">Kegiatan Siswa</button>
            <button class="filter-btn px-6 py-2 bg-blue-100 text-blue-800 text-sm font-medium rounded-full hover:bg-blue-200 transition" data-filter="fasilitas_sekolah">Fasilitas Sekolah</button>
            <button class="filter-btn px-6 py-2 bg-blue-100 text-blue-800 text-sm font-medium rounded-full hover:bg-blue-200 transition" data-filter="prestasi">Prestasi</button>
            <button class="filter-btn px-6 py-2 bg-blue-100 text-blue-800 text-sm font-medium rounded-full hover:bg-blue-200 transition" data-filter="guru_staff">Guru & Staff</button>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-1 md:gap-2 mb-12" id="gallery-grid">
            @forelse($galleries as $item)
            <div class="gallery-item relative w-full aspect-square bg-gray-200 overflow-hidden cursor-pointer ig-card group" data-category="{{ $item->collection }}">
                <img src="{{ Storage::url($item->path) }}" onerror="this.src='https://placehold.co/600x600/e2e8f0/64748b'" alt="{{ $item->alt_text ?? $item->original_name }}" class="w-full h-full object-cover">
                <div class="ig-overlay absolute inset-0 bg-black/60 flex flex-col items-center justify-center text-center p-4 text-white">
                    <h3 class="font-bold text-lg mb-1">{{ $item->alt_text ?? 'Galeri' }}</h3>
                    <p class="text-xs font-medium text-gray-300">{{ ucwords(str_replace('_', ' ', $item->collection)) }}</p>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 font-medium">Belum ada foto galeri.</p>
            </div>
            @endforelse
        </div>

        <div class="text-center mt-10">
            <a href="#" class="inline-flex items-center gap-2 text-teal-700 font-bold hover:text-teal-500 transition border-b-2 border-teal-700 pb-1 hover:border-teal-500">
                Lihat Foto Lainnya 
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </section>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.filter-btn');
            const items = document.querySelectorAll('.gallery-item');

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active classes
                    buttons.forEach(btn => {
                        btn.classList.remove('bg-teal-700', 'text-white', 'shadow-sm', 'active');
                        btn.classList.add('bg-blue-100', 'text-blue-800');
                    });
                    
                    // Add active class to clicked
                    button.classList.remove('bg-blue-100', 'text-blue-800');
                    button.classList.add('bg-teal-700', 'text-white', 'shadow-sm', 'active');

                    const filter = button.getAttribute('data-filter');

                    items.forEach(item => {
                        if (filter === 'all' || item.getAttribute('data-category') === filter) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
