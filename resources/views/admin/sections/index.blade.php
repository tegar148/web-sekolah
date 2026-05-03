@extends('admin.layouts.app')

@section('title', 'Landing Editor')
@section('breadcrumb', 'Landing Editor')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Landing Page Editor</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola konten dan visibilitas setiap section pada halaman website.</p>
    </div>
</div>

<!-- Page Tabs -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm mb-8 p-2 flex flex-wrap gap-2">
    @php
        $allPages = [
            'global' => 'Global (Topbar)',
            'welcome' => 'Landing Page',
            'sejarah' => 'Sejarah',
            'visi-misi' => 'Visi & Misi',
            'prestasi' => 'Prestasi',
            'guru' => 'Guru',
            'galeri' => 'Galeri',
            'fasilitas' => 'Fasilitas',
            'jurusan-ruminansia' => 'Ruminansia',
            'jurusan-unggas' => 'Unggas',
            'jurusan-tkj' => 'TKJ',
            'bkk-profile' => 'BKK Profil',
            'bkk-lowongan' => 'Lowongan',
            'siswa-organisasi' => 'Organisasi',
            'siswa-ekstrakurikuler' => 'Ekskul',
            'siswa-kalender' => 'Kalender',
            'info-ppdb' => 'PPDB',
            'berita' => 'Berita',
        ];
    @endphp

    @foreach($allPages as $key => $label)
        <a href="{{ route('admin.sections.index', ['page' => $key]) }}"
           class="px-4 py-2 rounded-xl text-xs font-bold transition
                  {{ $page === $key ? 'bg-[#017A85] text-white shadow-md' : 'text-gray-500 hover:bg-gray-100' }}">
            {{ $label }}
        </a>
    @endforeach
</div>

<!-- Section List -->
<div class="space-y-4">
    @forelse($sections as $section)
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-md transition">
        <div class="p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <div class="flex items-center gap-4 flex-1">
                @if($section->image)
                    <div class="w-12 h-12 rounded-xl overflow-hidden shrink-0 border border-gray-200">
                        <img src="{{ Storage::url($section->image) }}" alt="Thumbnail" class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="w-10 h-10 rounded-xl {{ $section->is_visible ? 'bg-teal-50 text-teal-600' : 'bg-gray-100 text-gray-400' }} flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                    </div>
                @endif
                <div>
                    <h3 class="font-bold text-gray-900 text-[15px]">{{ $section->title ?? ucwords(str_replace('_', ' ', $section->section_key)) }}</h3>
                    <p class="text-[10px] text-gray-400 uppercase tracking-widest mt-0.5">{{ $section->page }} &bull; {{ $section->section_key }}</p>
                    @if($section->subtitle)
                    <p class="text-xs text-gray-500 mt-1 line-clamp-1">{{ Str::limit($section->subtitle, 80) }}</p>
                    @endif
                </div>
            </div>

            <div class="flex items-center gap-3 shrink-0">
                <!-- Show/Hide Toggle -->
                <form action="{{ route('admin.sections.toggle', $section) }}" method="POST" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" title="{{ $section->is_visible ? 'Sembunyikan' : 'Tampilkan' }}" class="relative w-12 h-7 rounded-full transition-colors duration-200 {{ $section->is_visible ? 'bg-[#017A85]' : 'bg-gray-300' }}">
                        <span class="absolute top-0.5 {{ $section->is_visible ? 'left-[22px]' : 'left-0.5' }} w-6 h-6 bg-white rounded-full shadow-sm transition-all duration-200 flex items-center justify-center">
                            @if($section->is_visible)
                            <svg class="w-3 h-3 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            @else
                            <svg class="w-3 h-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                            @endif
                        </span>
                    </button>
                </form>

                <!-- Edit Button -->
                <a href="{{ route('admin.sections.edit', $section) }}" class="bg-[#017A85] hover:bg-[#01656e] text-white text-xs font-bold px-5 py-2.5 rounded-xl transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit
                </a>
            </div>
        </div>
    </div>
    @empty
    <div class="bg-white rounded-2xl border border-gray-100 p-12 text-center">
        <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        <p class="text-gray-500 text-sm">Belum ada section untuk halaman "<strong>{{ $page }}</strong>".</p>
        <p class="text-gray-400 text-xs mt-1">Jalankan <code class="bg-gray-100 px-2 py-0.5 rounded">php artisan db:seed --class=AdminSeeder</code> untuk mengisi data awal.</p>
    </div>
    @endforelse
</div>

@if($page === 'sejarah')
<div class="mt-12">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Konten Timeline Sejarah</h2>
            <p class="text-sm text-gray-500 mt-1">Kelola konten dari tahun ke tahun pada halaman Sejarah.</p>
        </div>
        <button type="button" onclick="document.getElementById('modal-tambah-sejarah').classList.remove('hidden')" class="bg-[#017A85] hover:bg-[#01656e] text-white px-5 py-2.5 rounded-xl font-bold text-sm transition shadow-sm flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Tambah Timeline
        </button>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/50 border-b border-gray-100">
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Tahun</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Judul</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider w-1/3">Deskripsi</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($sejarah_items as $item)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="px-6 py-4 text-sm font-bold text-gray-900">{{ $item->tahun }}</td>
                    <td class="px-6 py-4 text-sm font-semibold text-gray-800">{{ $item->judul }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($item->deskripsi, 80) }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <button type="button" onclick="editSejarah({{ $item->id }}, '{{ addslashes($item->tahun) }}', '{{ addslashes($item->judul) }}', '{{ addslashes($item->deskripsi) }}')" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-blue-600 hover:bg-blue-50 transition">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </button>
                        <form action="{{ route('admin.sejarah-items.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus item ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-red-600 hover:bg-red-50 transition">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center">
                        <p class="text-gray-500 text-sm">Belum ada konten timeline sejarah.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div id="modal-tambah-sejarah" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden border border-gray-100">
        <div class="flex items-center justify-between p-6 border-b border-gray-100">
            <h3 class="text-lg font-bold text-gray-900">Tambah Timeline</h3>
            <button type="button" onclick="document.getElementById('modal-tambah-sejarah').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <form action="{{ route('admin.sejarah-items.store') }}" method="POST" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Tahun</label>
                <input type="text" name="tahun" required class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#017A85] focus:border-transparent transition-all text-sm">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Judul</label>
                <input type="text" name="judul" required class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#017A85] focus:border-transparent transition-all text-sm">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
                <textarea name="deskripsi" required rows="4" class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#017A85] focus:border-transparent transition-all text-sm"></textarea>
            </div>
            <div class="pt-4 flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('modal-tambah-sejarah').classList.add('hidden')" class="px-5 py-2.5 text-sm font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition">Batal</button>
                <button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-[#017A85] hover:bg-[#01656e] rounded-xl transition shadow-sm">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="modal-edit-sejarah" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden border border-gray-100">
        <div class="flex items-center justify-between p-6 border-b border-gray-100">
            <h3 class="text-lg font-bold text-gray-900">Edit Timeline</h3>
            <button type="button" onclick="document.getElementById('modal-edit-sejarah').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <form id="form-edit-sejarah" method="POST" class="p-6 space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Tahun</label>
                <input type="text" name="tahun" id="edit-tahun" required class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#017A85] focus:border-transparent transition-all text-sm">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Judul</label>
                <input type="text" name="judul" id="edit-judul" required class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#017A85] focus:border-transparent transition-all text-sm">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
                <textarea name="deskripsi" id="edit-deskripsi" required rows="4" class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#017A85] focus:border-transparent transition-all text-sm"></textarea>
            </div>
            <div class="pt-4 flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('modal-edit-sejarah').classList.add('hidden')" class="px-5 py-2.5 text-sm font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition">Batal</button>
                <button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-[#017A85] hover:bg-[#01656e] rounded-xl transition shadow-sm">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function editSejarah(id, tahun, judul, deskripsi) {
        document.getElementById('form-edit-sejarah').action = `/admin/sejarah-items/${id}`;
        document.getElementById('edit-tahun').value = tahun;
        document.getElementById('edit-judul').value = judul;
        document.getElementById('edit-deskripsi').value = deskripsi;
        document.getElementById('modal-edit-sejarah').classList.remove('hidden');
    }
</script>
@endif
@endsection
