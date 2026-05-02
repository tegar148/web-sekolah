@extends('admin.layouts.app')

@section('title', 'Edit Prestasi')
@section('breadcrumb', 'Edit Prestasi')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Edit Prestasi</h1>
        <p class="text-sm text-gray-500 mt-1">Perbarui data prestasi sekolah.</p>
    </div>
    <a href="{{ route('admin.prestasi.index') }}" class="text-sm font-bold text-[#017A85] hover:text-[#01656e] flex items-center gap-2">
        &larr; Kembali
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 max-w-3xl">
    <form action="{{ route('admin.prestasi.update', $prestasi) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="md:col-span-2">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">NAMA PRESTASI / KOMPETISI <span class="text-red-500">*</span></label>
                <input type="text" name="title" required value="{{ old('title', $prestasi->title) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">KATEGORI <span class="text-red-500">*</span></label>
                <select name="category" required class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 appearance-none focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
                    <option value="vokasi" {{ $prestasi->category === 'vokasi' ? 'selected' : '' }}>Vokasi</option>
                    <option value="akademik" {{ $prestasi->category === 'akademik' ? 'selected' : '' }}>Akademik</option>
                    <option value="non-akademik" {{ $prestasi->category === 'non-akademik' ? 'selected' : '' }}>Non-Akademik</option>
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">PENCAPAIAN <span class="text-red-500">*</span></label>
                <input type="text" name="achievement" required value="{{ old('achievement', $prestasi->achievement) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">TINGKAT / LOKASI <span class="text-red-500">*</span></label>
                <input type="text" name="location" required value="{{ old('location', $prestasi->location) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">TANGGAL / BULAN & TAHUN <span class="text-red-500">*</span></label>
                <input type="text" name="event_date" required value="{{ old('event_date', $prestasi->event_date) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div class="md:col-span-2">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">FOTO DOKUMENTASI</label>
                @if($prestasi->image_path)
                <div class="mb-3">
                    <img src="{{ Storage::url($prestasi->image_path) }}" alt="{{ $prestasi->title }}" class="h-32 object-cover rounded-lg border border-gray-200 shadow-sm">
                    <p class="text-xs text-gray-400 mt-1">Gambar saat ini. Kosongkan input di bawah jika tidak ingin mengubah.</p>
                </div>
                @endif
                <input type="file" name="image" accept="image/*" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#017A85] file:text-white hover:file:bg-[#01656e] transition">
            </div>
        </div>
        <button type="submit" class="mt-2 bg-[#017A85] hover:bg-[#01656e] text-white font-bold text-xs px-6 py-3 rounded-xl transition flex items-center gap-2">
            Perbarui Prestasi
        </button>
    </form>
</div>
@endsection
