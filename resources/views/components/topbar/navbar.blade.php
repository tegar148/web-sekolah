<nav class="flex items-center justify-between py-4 px-6 md:px-12 bg-white">
    <!-- Logo -->
    <div class="flex items-center gap-3">
        <div class="h-10 w-10 bg-green-600 rounded-sm flex flex-col justify-center items-center font-bold text-white shadow-sm border border-green-700">
            <span class="text-xl">M</span>
        </div>
        <div>
            <h1 class="text-sm font-bold text-gray-800 leading-tight">SMK Negeri 1 MAESAN</h1>
            <p class="text-[10px] text-gray-500 uppercase tracking-widest">Kreatif, Inovatif, & Berkarakter</p>
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
    <button class="lg:hidden p-2 text-gray-600 hover:bg-gray-100 rounded">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
</nav>
