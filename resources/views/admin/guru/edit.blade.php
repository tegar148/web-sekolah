@extends('admin.layouts.app')

@section('title', 'Edit Data Guru')
@section('breadcrumb', 'Edit Guru')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Edit Data Guru</h1>
        <p class="text-sm text-gray-500 mt-1">Perbarui data profil, departemen, dan administrasi guru.</p>
    </div>
    <a href="{{ route('admin.guru.index') }}" class="text-sm font-bold text-[#017A85] hover:text-[#01656e] flex items-center gap-2">
        &larr; Kembali
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 max-w-3xl">
    <form action="{{ route('admin.guru.update', $guru) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="md:col-span-2">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">NAMA LENGKAP & GELAR <span class="text-red-500">*</span></label>
                <input type="text" name="name" required value="{{ old('name', $guru->name) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">DEPARTEMEN / JURUSAN <span class="text-red-500">*</span></label>
                <select name="department" required class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 appearance-none focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
                    <option value="Agribisnis Ruminasia" {{ $guru->department == 'Agribisnis Ruminasia' ? 'selected' : '' }}>Agribisnis Ruminasia</option>
                    <option value="Agribisnis Ternak Unggas" {{ $guru->department == 'Agribisnis Ternak Unggas' ? 'selected' : '' }}>Agribisnis Ternak Unggas</option>
                    <option value="Teknik Komputer & Jaringan" {{ $guru->department == 'Teknik Komputer & Jaringan' ? 'selected' : '' }}>Teknik Komputer & Jaringan</option>
                    <option value="Umum (General Education)" {{ $guru->department == 'Umum (General Education)' ? 'selected' : '' }}>Umum (General Education)</option>
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">MATA PELAJARAN / JABATAN <span class="text-red-500">*</span></label>
                <input type="text" name="subject" required value="{{ old('subject', $guru->subject) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">NUPTK</label>
                <input type="text" name="nuptk" value="{{ old('nuptk', $guru->nuptk) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">STATUS KEPEGAWAIAN</label>
                <select name="status" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 appearance-none focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
                    <option value="PNS" {{ $guru->status == 'PNS' ? 'selected' : '' }}>PNS</option>
                    <option value="PPPK" {{ $guru->status == 'PPPK' ? 'selected' : '' }}>PPPK</option>
                    <option value="GTT" {{ $guru->status == 'GTT' ? 'selected' : '' }}>GTT</option>
                </select>
            </div>
            <div class="md:col-span-2">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">FOTO PROFIL</label>
                @if($guru->image_path)
                <div class="mb-3">
                    <img src="{{ Storage::url($guru->image_path) }}" alt="{{ $guru->name }}" class="w-20 h-20 object-cover rounded-full border-2 border-gray-200 shadow-sm">
                    <p class="text-xs text-gray-400 mt-2">Gambar saat ini. Kosongkan input di bawah jika tidak ingin mengubah.</p>
                </div>
                @endif
                <input type="file" name="image" accept="image/*" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#017A85] file:text-white hover:file:bg-[#01656e] transition">
            </div>
        </div>
        <button type="submit" class="mt-2 bg-[#017A85] hover:bg-[#01656e] text-white font-bold text-xs px-6 py-3 rounded-xl transition flex items-center gap-2">
            Perbarui Data Guru
        </button>
    </form>
</div>
@endsection
