@php
    $topbar = \App\Models\SiteSection::where('page', 'global')->where('section_key', 'topbar')->first();
    $title = $topbar->title ?? 'SMK Negeri 1 MAESAN';
    $subtitle = $topbar->subtitle ?? 'Kreatif, Inovatif, & Berkarakter';
    $image = $topbar->image ?? null;
@endphp
<nav class="flex items-center justify-between py-4 px-6 md:px-12 bg-white relative z-50">
    <!-- Logo -->
    <div class="flex items-center gap-3">
        @if($image)
        <div class="h-10 w-10 flex flex-col justify-center items-center">
            <img src="{{ Storage::url($image) }}" alt="Logo" class="w-full h-full object-contain">
        </div>
        @else
        <div class="h-10 w-10 bg-green-600 rounded-sm flex flex-col justify-center items-center font-bold text-white shadow-sm border border-green-700">
            <span class="text-xl">M</span>
        </div>
        @endif
        <div>
            <h1 class="text-sm font-bold text-gray-800 leading-tight">{{ $title }}</h1>
            <p class="text-[10px] text-gray-500 uppercase tracking-widest">{{ $subtitle }}</p>
        </div>
    </div>

    <!-- Links -->
    <div class="hidden lg:flex items-center space-x-6 text-sm font-medium text-gray-600">
        <!-- Direct Link: Home -->
        <a href="{{ url('/') }}" class="hover:text-blue-600 py-2 pb-1 border-b-2 border-transparent hover:border-blue-600 transition truncate">Home</a>

        <!-- Dropdown: Profile Sekolah -->
        <div class="relative group">
            <button class="flex items-center gap-1 hover:text-blue-600 py-2 pb-1 border-b-2 border-transparent group-hover:border-blue-600 transition truncate">
                Profile Sekolah
                <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div class="absolute left-0 mt-4 w-48 bg-white border border-gray-100 shadow-xl rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 transform origin-top translate-y-2 group-hover:translate-y-0">
                <div class="py-2 flex flex-col">
                    <a href="{{ route('sejarah') }}" class="px-4 py-2 hover:bg-gray-50 hover:text-blue-600">Sejarah</a>
                    <a href="{{ route('visi-misi') }}" class="px-4 py-2 hover:bg-gray-50 hover:text-blue-600">Visi Misi</a>
                    <a href="{{ route('prestasi') }}" class="px-4 py-2 hover:bg-gray-50 hover:text-blue-600">Prestasi</a>
                    <a href="{{ route('guru') }}" class="px-4 py-2 hover:bg-gray-50 hover:text-blue-600">Guru</a>
                    <a href="{{ route('galeri') }}" class="px-4 py-2 hover:bg-gray-50 hover:text-blue-600">Galeri</a>
                    <a href="{{ route('fasilitas') }}" class="px-4 py-2 hover:bg-gray-50 hover:text-blue-600">Fasilitas</a>
                </div>
            </div>
        </div>

        <!-- Dropdown: Konsentrasi Keahlian -->
        <div class="relative group">
            <button class="flex items-center gap-1 hover:text-blue-600 py-2 pb-1 border-b-2 border-transparent group-hover:border-blue-600 transition truncate">
                Konsentrasi Keahlian
                <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div class="absolute left-0 mt-4 w-60 bg-white border border-gray-100 shadow-xl rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 transform origin-top translate-y-2 group-hover:translate-y-0">
                <div class="py-2 flex flex-col">
                    <a href="{{ route('jurusan.ruminansia') }}" class="px-4 py-2 hover:bg-gray-50 hover:text-blue-600">Agribisnis Ruminansia</a>
                    <a href="{{ route('jurusan.unggas') }}" class="px-4 py-2 hover:bg-gray-50 hover:text-blue-600">Agribisnis Ternak Unggas</a>
                    <a href="{{ route('jurusan.tkj') }}" class="px-4 py-2 hover:bg-gray-50 hover:text-blue-600">Teknik Komputer & Jaringan</a>
                </div>
            </div>
        </div>

        <!-- Dropdown: BKK -->
        <div class="relative group">
            <button class="flex items-center gap-1 hover:text-blue-600 py-2 pb-1 border-b-2 border-transparent group-hover:border-blue-600 transition truncate">
                BKK
                <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div class="absolute left-0 mt-4 w-48 bg-white border border-gray-100 shadow-xl rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 transform origin-top translate-y-2 group-hover:translate-y-0">
                <div class="py-2 flex flex-col">
                    <a href="{{ route('bkk.profile') }}" class="px-4 py-2 hover:bg-gray-50 hover:text-blue-600">Profil BKK Skama</a>
                    <a href="{{ route('bkk.lowongan') }}" class="px-4 py-2 hover:bg-gray-50 hover:text-blue-600">Info Lowongan Kerja</a>
                </div>
            </div>
        </div>

        <!-- Dropdown: Siswa -->
        <div class="relative group">
            <button class="flex items-center gap-1 hover:text-blue-600 py-2 pb-1 border-b-2 border-transparent group-hover:border-blue-600 transition truncate">
                Siswa
                <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div class="absolute left-0 mt-4 w-52 bg-white border border-gray-100 shadow-xl rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 transform origin-top translate-y-2 group-hover:translate-y-0">
                <div class="py-2 flex flex-col">
                    <a href="{{ route('siswa.organisasi') }}" class="px-4 py-2 hover:bg-gray-50 hover:text-blue-600">Organisasi</a>
                    <a href="{{ route('siswa.ekstrakurikuler') }}" class="px-4 py-2 hover:bg-gray-50 hover:text-blue-600">Ekstrakurikuler</a>
                    <a href="{{ route('siswa.kalender') }}" class="px-4 py-2 hover:bg-gray-50 hover:text-blue-600">Kalender Pendidikan</a>
                </div>
            </div>
        </div>

        <!-- Direct Link: Berita -->
        <a href="{{ route('berita') }}" class="hover:text-blue-600 py-2 pb-1 border-b-2 border-transparent hover:border-blue-600 transition truncate">Berita</a>
    </div>

    <!-- Button -->
    <div class="hidden lg:block">
        <a href="{{ route('info.ppdb') }}" class="px-6 py-2 bg-[#1C2331] text-white text-xs tracking-wider shadow-md font-bold rounded-sm hover:bg-gray-800 transition">INFO PPDB</a>
    </div>
    
    <!-- Mobile menu button -->
    <button id="mobile-menu-btn" class="lg:hidden p-2 text-gray-600 hover:bg-gray-100 rounded">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
</nav>

<!-- Mobile Menu Overlay (Hidden by default) -->
<div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100 absolute w-full left-0 z-40 shadow-lg top-full">
    <div class="flex flex-col py-4 px-6 space-y-4 max-h-[80vh] overflow-y-auto">
        <!-- Direct Link: Home -->
        <a href="{{ url('/') }}" class="text-sm font-medium text-gray-600 hover:text-blue-600">Home</a>

        <!-- Dropdown: Profile Sekolah -->
        <div class="flex flex-col space-y-2">
            <button class="flex items-center justify-between text-sm font-medium text-gray-600 w-full" onclick="toggleMobileDropdown('mobile-profile')">
                <span>Profile Sekolah</span>
                <svg id="icon-mobile-profile" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div id="mobile-profile" class="hidden flex-col pl-4 space-y-2 border-l-2 border-gray-100 mt-2">
                <a href="{{ route('sejarah') }}" class="text-sm text-gray-500 hover:text-blue-600 py-1">Sejarah</a>
                <a href="{{ route('visi-misi') }}" class="text-sm text-gray-500 hover:text-blue-600 py-1">Visi Misi</a>
                <a href="{{ route('prestasi') }}" class="text-sm text-gray-500 hover:text-blue-600 py-1">Prestasi</a>
                <a href="{{ route('guru') }}" class="text-sm text-gray-500 hover:text-blue-600 py-1">Guru</a>
                <a href="{{ route('galeri') }}" class="text-sm text-gray-500 hover:text-blue-600 py-1">Galeri</a>
                <a href="{{ route('fasilitas') }}" class="text-sm text-gray-500 hover:text-blue-600 py-1">Fasilitas</a>
            </div>
        </div>

        <!-- Dropdown: Konsentrasi Keahlian -->
        <div class="flex flex-col space-y-2">
            <button class="flex items-center justify-between text-sm font-medium text-gray-600 w-full" onclick="toggleMobileDropdown('mobile-jurusan')">
                <span>Konsentrasi Keahlian</span>
                <svg id="icon-mobile-jurusan" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div id="mobile-jurusan" class="hidden flex-col pl-4 space-y-2 border-l-2 border-gray-100 mt-2">
                <a href="{{ route('jurusan.ruminansia') }}" class="text-sm text-gray-500 hover:text-blue-600 py-1">Agribisnis Ruminansia</a>
                <a href="{{ route('jurusan.unggas') }}" class="text-sm text-gray-500 hover:text-blue-600 py-1">Agribisnis Ternak Unggas</a>
                <a href="{{ route('jurusan.tkj') }}" class="text-sm text-gray-500 hover:text-blue-600 py-1">Teknik Komputer & Jaringan</a>
            </div>
        </div>

        <!-- Dropdown: BKK -->
        <div class="flex flex-col space-y-2">
            <button class="flex items-center justify-between text-sm font-medium text-gray-600 w-full" onclick="toggleMobileDropdown('mobile-bkk')">
                <span>BKK</span>
                <svg id="icon-mobile-bkk" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div id="mobile-bkk" class="hidden flex-col pl-4 space-y-2 border-l-2 border-gray-100 mt-2">
                <a href="{{ route('bkk.profile') }}" class="text-sm text-gray-500 hover:text-blue-600 py-1">Profil BKK Skama</a>
                <a href="{{ route('bkk.lowongan') }}" class="text-sm text-gray-500 hover:text-blue-600 py-1">Info Lowongan Kerja</a>
            </div>
        </div>

        <!-- Dropdown: Siswa -->
        <div class="flex flex-col space-y-2">
            <button class="flex items-center justify-between text-sm font-medium text-gray-600 w-full" onclick="toggleMobileDropdown('mobile-siswa')">
                <span>Siswa</span>
                <svg id="icon-mobile-siswa" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div id="mobile-siswa" class="hidden flex-col pl-4 space-y-2 border-l-2 border-gray-100 mt-2">
                <a href="{{ route('siswa.organisasi') }}" class="text-sm text-gray-500 hover:text-blue-600 py-1">Organisasi</a>
                <a href="{{ route('siswa.ekstrakurikuler') }}" class="text-sm text-gray-500 hover:text-blue-600 py-1">Ekstrakurikuler</a>
                <a href="{{ route('siswa.kalender') }}" class="text-sm text-gray-500 hover:text-blue-600 py-1">Kalender Pendidikan</a>
            </div>
        </div>

        <!-- Direct Link: Berita -->
        <a href="{{ route('berita') }}" class="text-sm font-medium text-gray-600 hover:text-blue-600">Berita</a>

        <!-- Button -->
        <div class="pt-4 pb-2 w-full">
            <a href="{{ route('info.ppdb') }}" class="block text-center w-full py-2.5 bg-[#1C2331] text-white text-xs tracking-wider shadow-md font-bold rounded-sm hover:bg-gray-800 transition">INFO PPDB</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        if (btn && menu) {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                menu.classList.toggle('hidden');
            });
        }

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (menu && !menu.contains(e.target) && btn && !btn.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    });

    function toggleMobileDropdown(id) {
        const element = document.getElementById(id);
        const icon = document.getElementById('icon-' + id);
        
        if (element) {
            if (element.classList.contains('hidden')) {
                element.classList.remove('hidden');
                element.classList.add('flex');
                if(icon) icon.classList.add('rotate-180');
            } else {
                element.classList.add('hidden');
                element.classList.remove('flex');
                if(icon) icon.classList.remove('rotate-180');
            }
        }
    }
</script>
