@extends('admin.layouts.app')

@section('title', 'Media Manager')
@section('breadcrumb', 'Media Manager')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Media Manager</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola gambar dan aset media website sekolah.</p>
    </div>
</div>

<!-- Upload Form Card -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 mb-8">
    <h3 class="font-bold text-gray-900 mb-6 flex items-center gap-2">
        <svg class="w-5 h-5 text-[#017A85]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
        Upload Media Baru
    </h3>

    <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">FILE GAMBAR <span class="text-red-500">*</span></label>
                <input type="file" name="files[]" multiple accept="image/*" required class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#017A85] file:text-white hover:file:bg-[#01656e] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">KOLEKSI <span class="text-red-500">*</span></label>
                <select name="collection" required class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 appearance-none focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
                    <option value="kegiatan_siswa">Kegiatan Siswa</option>
                    <option value="fasilitas_sekolah">Fasilitas Sekolah</option>
                    <option value="prestasi">Prestasi</option>
                    <option value="guru_staff">Guru & Staff</option>
                    <option value="general">General</option>
                    <option value="hero">Hero Background</option>
                    <option value="berita">Berita</option>
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">ALT TEXT</label>
                <input type="text" name="alt_text" placeholder="Deskripsi gambar..." class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
        </div>
        <button type="submit" class="mt-4 bg-[#017A85] hover:bg-[#01656e] text-white font-bold text-xs px-6 py-3 rounded-xl transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
            Upload File
        </button>
    </form>
</div>

<!-- Filter Tabs -->
<div class="flex flex-wrap gap-2 mb-6">
    <a href="{{ route('admin.media.index', ['collection' => 'all']) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $collection === 'all' ? 'bg-[#017A85] text-white shadow-md' : 'bg-white text-gray-500 hover:bg-gray-100 border border-gray-100' }}">
        Semua
    </a>
    @foreach($collections as $col)
    <a href="{{ route('admin.media.index', ['collection' => $col]) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $collection === $col ? 'bg-[#017A85] text-white shadow-md' : 'bg-white text-gray-500 hover:bg-gray-100 border border-gray-100' }}">
        {{ ucfirst($col) }}
    </a>
    @endforeach
</div>

<!-- Media Grid -->
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @forelse($media as $item)
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden group hover:shadow-md transition">
        <div class="aspect-square bg-gray-100 relative overflow-hidden">
            <img src="{{ Storage::url($item->path) }}" alt="{{ $item->alt_text ?? $item->original_name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
            
            <!-- Overlay Actions -->
            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-3">
                <form action="{{ route('admin.media.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus file ini?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-10 h-10 bg-red-500 hover:bg-red-600 text-white rounded-xl flex items-center justify-center transition">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </form>
            </div>
        </div>
        <div class="p-3">
            <p class="text-xs font-bold text-gray-800 truncate">{{ $item->original_name }}</p>
            <div class="flex items-center justify-between mt-1">
                <span class="text-[9px] text-gray-400 uppercase tracking-wider">{{ $item->collection }}</span>
                <span class="text-[9px] text-gray-400">{{ number_format($item->size / 1024, 1) }} KB</span>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full bg-white rounded-2xl border border-gray-100 p-12 text-center">
        <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        <p class="text-gray-500 text-sm">Belum ada media yang diupload.</p>
    </div>
    @endforelse
</div>

<!-- Pagination -->
@if($media->hasPages())
<div class="mt-8">
    {{ $media->appends(['collection' => $collection])->links() }}
</div>
@endif
@endsection
