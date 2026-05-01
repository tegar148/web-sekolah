@extends('admin.layouts.app')

@section('title', 'Berita & Informasi')
@section('breadcrumb', 'Berita Manager')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Berita & Informasi</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola publikasi artikel dan informasi sekolah.</p>
    </div>
</div>

<!-- Upload Form Card -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 mb-8">
    <h3 class="font-bold text-gray-900 mb-6 flex items-center gap-2">
        <svg class="w-5 h-5 text-[#017A85]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Berita Baru
    </h3>

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <div class="col-span-2">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">JUDUL BERITA <span class="text-red-500">*</span></label>
                <input type="text" name="title" required placeholder="Judul artikel..." class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">KATEGORI <span class="text-red-500">*</span></label>
                <input type="text" name="category" required placeholder="Contoh: ACADEMIC" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">TANGGAL PUBLIKASI <span class="text-red-500">*</span></label>
                <input type="date" name="published_at" required value="{{ date('Y-m-d') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div class="col-span-1 lg:col-span-4">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">FOTO COVER <span class="text-red-500">*</span></label>
                <input type="file" name="image" accept="image/*" required class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#017A85] file:text-white hover:file:bg-[#01656e] transition">
                <div class="flex items-center gap-2 mt-2">
                    <span class="inline-flex items-center gap-1 bg-teal-50 text-teal-700 text-[10px] font-bold px-2.5 py-1 rounded-lg border border-teal-100">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        AUTO COMPRESS
                    </span>
                    <p class="text-[10px] text-gray-400">Format: JPG, PNG, WEBP, GIF. Maks 50MB. Otomatis dikompresi ke WebP (maks 1200px, kualitas 75%).</p>
                </div>
            </div>
            <div class="col-span-1 lg:col-span-4">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">RINGKASAN (EXCERPT) <span class="text-red-500">*</span></label>
                <textarea name="excerpt" rows="2" required placeholder="Tulis ringkasan singkat..." class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition"></textarea>
            </div>
            <div class="col-span-1 lg:col-span-4">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">KONTEN LENGKAP <span class="text-red-500">*</span></label>
                <textarea name="content" rows="6" required placeholder="Tulis isi berita..." class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition"></textarea>
            </div>
        </div>
        <button type="submit" class="mt-2 bg-[#017A85] hover:bg-[#01656e] text-white font-bold text-xs px-6 py-3 rounded-xl transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Simpan Berita
        </button>
    </form>
</div>

<!-- List Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($beritas as $item)
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden group hover:shadow-md transition relative flex flex-col">
        <div class="h-48 bg-gray-100 relative overflow-hidden shrink-0">
            @if($item->image_path)
            <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
            @endif
            <div class="absolute top-3 left-3 bg-[#111827] text-white text-[9px] font-bold tracking-widest uppercase px-3 py-1 rounded shadow">{{ $item->category }}</div>
            
            <!-- Overlay Actions -->
            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-3">
                <form action="{{ route('admin.berita.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-10 h-10 bg-red-500 hover:bg-red-600 text-white rounded-xl flex items-center justify-center transition" title="Hapus Berita">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </form>
            </div>
        </div>
        <div class="p-6 flex-1 flex flex-col">
            <p class="text-[10px] text-gray-400 mb-2 uppercase tracking-widest font-semibold flex items-center gap-2">
                <span class="w-3 h-[1px] bg-gray-300 block"></span> {{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}
            </p>
            <h3 class="text-base font-bold text-gray-900 mb-3 leading-snug line-clamp-2">{{ $item->title }}</h3>
            <p class="text-sm text-gray-500 line-clamp-3">{{ $item->excerpt }}</p>
        </div>
    </div>
    @empty
    <div class="col-span-full bg-white rounded-2xl border border-gray-100 p-12 text-center">
        <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
        <p class="text-gray-500 text-sm">Belum ada berita yang dipublikasikan.</p>
    </div>
    @endforelse
</div>

<!-- Pagination -->
@if($beritas->hasPages())
<div class="mt-8">
    {{ $beritas->links() }}
</div>
@endif
@endsection
