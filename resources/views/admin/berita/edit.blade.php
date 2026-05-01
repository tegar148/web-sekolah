@extends('admin.layouts.app')

@section('title', 'Edit Berita')
@section('breadcrumb', 'Edit Berita')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Edit Berita</h1>
        <p class="text-sm text-gray-500 mt-1">Perbarui informasi artikel atau berita.</p>
    </div>
    <a href="{{ route('admin.berita.index') }}" class="text-sm font-bold text-[#017A85] hover:text-[#01656e] flex items-center gap-2">
        &larr; Kembali
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 mb-8">
    <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <div class="col-span-2">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">JUDUL BERITA <span class="text-red-500">*</span></label>
                <input type="text" name="title" required value="{{ old('title', $berita->title) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">KATEGORI <span class="text-red-500">*</span></label>
                <input type="text" name="category" required value="{{ old('category', $berita->category) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">TANGGAL PUBLIKASI <span class="text-red-500">*</span></label>
                <input type="date" name="published_at" required value="{{ old('published_at', \Carbon\Carbon::parse($berita->published_at)->format('Y-m-d')) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div class="col-span-1 lg:col-span-4">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">FOTO COVER</label>
                @if($berita->image_path)
                    <div class="mb-3">
                        <img src="{{ Storage::url($berita->image_path) }}" alt="{{ $berita->title }}" class="h-32 object-cover rounded-lg border border-gray-200 shadow-sm">
                        <p class="text-xs text-gray-400 mt-1">Gambar saat ini. Kosongkan input di bawah jika tidak ingin mengubah gambar.</p>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#017A85] file:text-white hover:file:bg-[#01656e] transition">
            </div>
            <div class="col-span-1 lg:col-span-4">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">RINGKASAN (EXCERPT) <span class="text-red-500">*</span></label>
                <textarea name="excerpt" rows="2" required class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">{{ old('excerpt', $berita->excerpt) }}</textarea>
            </div>
            <div class="col-span-1 lg:col-span-4">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">KONTEN LENGKAP <span class="text-red-500">*</span></label>
                <textarea name="content" rows="6" required class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">{{ old('content', $berita->content) }}</textarea>
            </div>
        </div>
        <button type="submit" class="mt-2 bg-[#017A85] hover:bg-[#01656e] text-white font-bold text-xs px-6 py-3 rounded-xl transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Perbarui Berita
        </button>
    </form>
</div>
@endsection
