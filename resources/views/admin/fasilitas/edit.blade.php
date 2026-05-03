@extends('admin.layouts.app')

@php
    $isEdit = isset($fasilitas);
    $title = $isEdit ? 'Edit Fasilitas' : 'Tambah Fasilitas';
    $action = $isEdit ? route('admin.fasilitas.update', $fasilitas) : route('admin.fasilitas.store');
@endphp

@section('title', $title)
@section('breadcrumb', 'Fasilitas / ' . $title)

@section('content')
<div class="max-w-4xl">
    <a href="{{ route('admin.fasilitas.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-[#017A85] mb-6 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Kembali ke Daftar Fasilitas
    </a>

    <div class="flex items-center gap-4 mb-8">
        <div class="w-12 h-12 rounded-xl bg-[#017A85] text-white flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
        </div>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $title }}</h1>
            <p class="text-xs text-gray-400 uppercase tracking-widest">INFRASTRUKTUR SEKOLAH</p>
        </div>
    </div>

    @if ($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-600 rounded-xl p-4 mb-6 text-sm">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($isEdit)
            @method('PUT')
        @endif

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">NAMA FASILITAS</label>
                    <input type="text" name="title" value="{{ old('title', $fasilitas->title ?? '') }}" required class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Contoh: Ruang Kelas Smart-Learning">
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">KATEGORI</label>
                    <input type="text" name="category" value="{{ old('category', $fasilitas->category ?? '') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Contoh: RUANG KELAS, OLAHRAGA, dll.">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">DESKRIPSI FASILITAS</label>
                <textarea name="description" rows="4" required class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition resize-y" placeholder="Penjelasan mengenai fasilitas ini...">{{ old('description', $fasilitas->description ?? '') }}</textarea>
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">FOTO FASILITAS</label>
                @if($isEdit && $fasilitas->image_path)
                <div class="mb-3">
                    <img src="{{ Storage::url($fasilitas->image_path) }}" alt="Current Image" class="h-32 rounded-xl border border-gray-200 object-cover">
                </div>
                @endif
                <input type="file" name="image_path" accept="image/*" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#017A85] file:text-white hover:file:bg-[#01656e] transition">
                <p class="text-[10px] text-gray-400 mt-2">Format: JPG, PNG, WEBP. Maks 5MB. Otomatis dikonversi ke WebP untuk performa tinggi.</p>
            </div>

            <hr class="border-gray-100">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Detail Label -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">LABEL SPESIFIKASI</label>
                    <input type="text" name="detail_label" value="{{ old('detail_label', $fasilitas->detail_label ?? '') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Contoh: Kapasitas, Luas, Standar">
                </div>

                <!-- Detail Value -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">NILAI SPESIFIKASI</label>
                    <input type="text" name="detail_value" value="{{ old('detail_value', $fasilitas->detail_value ?? '') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Contoh: 36 Siswa, 800 m², Industri ISO">
                </div>
            </div>

        </div>

        <!-- Submit -->
        <div class="mt-6 flex items-center gap-4">
            <button type="submit" class="bg-[#017A85] hover:bg-[#01656e] text-white font-bold text-sm px-8 py-4 rounded-xl shadow-lg shadow-teal-800/20 transition-all flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                Simpan Fasilitas
            </button>
            <a href="{{ route('admin.fasilitas.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold text-sm px-6 py-4 rounded-xl transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
