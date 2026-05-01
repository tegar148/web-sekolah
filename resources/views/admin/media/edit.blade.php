@extends('admin.layouts.app')

@section('title', 'Edit Media')
@section('breadcrumb', 'Edit Media')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Edit Media</h1>
        <p class="text-sm text-gray-500 mt-1">Perbarui detail file media.</p>
    </div>
    <a href="{{ route('admin.media.index') }}" class="text-sm font-bold text-[#017A85] hover:text-[#01656e] flex items-center gap-2">
        &larr; Kembali
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 mb-8 max-w-2xl">
    <div class="mb-6 flex justify-center">
        <div class="w-64 h-64 bg-gray-100 rounded-xl overflow-hidden border border-gray-200 shadow-sm">
            <img src="{{ Storage::url($media->path) }}" alt="{{ $media->alt_text ?? $media->original_name }}" class="w-full h-full object-contain">
        </div>
    </div>
    
    <form action="{{ route('admin.media.update', $media) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">KOLEKSI <span class="text-red-500">*</span></label>
                <select name="collection" required class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 appearance-none focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
                    <option value="kegiatan_siswa" {{ $media->collection === 'kegiatan_siswa' ? 'selected' : '' }}>Kegiatan Siswa</option>
                    <option value="fasilitas_sekolah" {{ $media->collection === 'fasilitas_sekolah' ? 'selected' : '' }}>Fasilitas Sekolah</option>
                    <option value="prestasi" {{ $media->collection === 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                    <option value="guru_staff" {{ $media->collection === 'guru_staff' ? 'selected' : '' }}>Guru & Staff</option>
                    <option value="general" {{ $media->collection === 'general' ? 'selected' : '' }}>General</option>
                    <option value="hero" {{ $media->collection === 'hero' ? 'selected' : '' }}>Hero Background</option>
                    <option value="berita" {{ $media->collection === 'berita' ? 'selected' : '' }}>Berita</option>
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">ALT TEXT</label>
                <input type="text" name="alt_text" value="{{ old('alt_text', $media->alt_text) }}" placeholder="Deskripsi gambar..." class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
        </div>
        <button type="submit" class="mt-6 bg-[#017A85] hover:bg-[#01656e] text-white font-bold text-xs px-6 py-3 rounded-xl transition w-full flex items-center justify-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Perbarui Media
        </button>
    </form>
</div>
@endsection
