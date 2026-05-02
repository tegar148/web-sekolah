@extends('admin.layouts.app')

@section('title', 'Prestasi')
@section('breadcrumb', 'Prestasi Manager')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Prestasi Sekolah</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola data prestasi dan penghargaan siswa.</p>
    </div>
</div>

{{-- Form Tambah --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 mb-8">
    <h3 class="font-bold text-gray-900 mb-6 flex items-center gap-2">
        <svg class="w-5 h-5 text-[#017A85]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Prestasi Baru
    </h3>

    <form action="{{ route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
            <div class="lg:col-span-3">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">NAMA PRESTASI / KOMPETISI <span class="text-red-500">*</span></label>
                <input type="text" name="title" required placeholder="Contoh: Olimpiade Sains Nasional Bidang Informatika" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">KATEGORI <span class="text-red-500">*</span></label>
                <select name="category" required class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 appearance-none focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
                    <option value="vokasi">Vokasi</option>
                    <option value="akademik">Akademik</option>
                    <option value="non-akademik">Non-Akademik</option>
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">PENCAPAIAN <span class="text-red-500">*</span></label>
                <input type="text" name="achievement" required placeholder="Contoh: Medali Emas, Juara 1" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">TINGKAT / LOKASI <span class="text-red-500">*</span></label>
                <input type="text" name="location" required placeholder="Contoh: Nasional, Jawa Timur" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">TANGGAL / BULAN & TAHUN <span class="text-red-500">*</span></label>
                <input type="text" name="event_date" required placeholder="Contoh: Oktober 2024" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div class="lg:col-span-2">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">FOTO DOKUMENTASI</label>
                <input type="file" name="image" accept="image/*" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#017A85] file:text-white hover:file:bg-[#01656e] transition">
                <p class="text-[10px] text-gray-400 mt-2">Opsional. Format: JPG, PNG, WEBP. Otomatis dikompresi.</p>
            </div>
        </div>
        <button type="submit" class="mt-2 bg-[#017A85] hover:bg-[#01656e] text-white font-bold text-xs px-6 py-3 rounded-xl transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Simpan Prestasi
        </button>
    </form>
</div>

{{-- List Grid --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($prestasis as $item)
    @php
        $catColor = match($item->category) {
            'akademik'      => 'bg-blue-600',
            'non-akademik'  => 'bg-purple-500',
            default         => 'bg-blue-500',
        };
    @endphp
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden group hover:shadow-md transition relative flex flex-col">
        <div class="h-44 bg-gray-100 relative overflow-hidden shrink-0">
            @if($item->image_path)
            <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
            @else
            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200">
                <svg class="w-12 h-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" /></svg>
            </div>
            @endif
            <div class="absolute top-3 left-3 {{ $catColor }} text-white text-[9px] font-bold tracking-widest uppercase px-3 py-1 rounded shadow">{{ strtoupper($item->category) }}</div>

            {{-- Overlay Actions --}}
            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-3">
                <a href="{{ route('admin.prestasi.edit', $item) }}" class="w-10 h-10 bg-blue-500 hover:bg-blue-600 text-white rounded-xl flex items-center justify-center transition" title="Edit">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </a>
                <form action="{{ route('admin.prestasi.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus data prestasi ini?')" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-10 h-10 bg-red-500 hover:bg-red-600 text-white rounded-xl flex items-center justify-center transition" title="Hapus">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </form>
            </div>
        </div>
        <div class="p-5 flex-1 flex flex-col">
            <p class="text-[10px] text-teal-600 font-bold uppercase tracking-widest mb-1">{{ $item->achievement }}</p>
            <h3 class="text-sm font-bold text-gray-900 mb-3 leading-snug line-clamp-2">{{ $item->title }}</h3>
            <div class="flex justify-between items-center text-[10px] text-gray-400 pt-3 border-t border-gray-50 mt-auto">
                <span>{{ $item->location }}</span>
                <span>{{ $item->event_date }}</span>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full bg-white rounded-2xl border border-gray-100 p-12 text-center">
        <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
        <p class="text-gray-500 text-sm">Belum ada data prestasi.</p>
    </div>
    @endforelse
</div>

@if($prestasis->hasPages())
<div class="mt-8">{{ $prestasis->links() }}</div>
@endif
@endsection
