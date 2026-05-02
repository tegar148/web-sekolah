@extends('admin.layouts.app')

@section('title', 'Edit Lowongan BKK')
@section('breadcrumb', 'Edit Lowongan')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Edit Lowongan Kerja</h1>
        <p class="text-sm text-gray-500 mt-1">Perbarui data informasi lowongan kerja untuk BKK.</p>
    </div>
    <a href="{{ route('admin.lowongan.index') }}" class="text-sm font-bold text-[#017A85] hover:text-[#01656e] flex items-center gap-2">
        &larr; Kembali
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 max-w-4xl">
    <form action="{{ route('admin.lowongan.update', $lowongan) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">POSISI / TITLE <span class="text-red-500">*</span></label>
                <input type="text" name="title" required value="{{ old('title', $lowongan->title) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">NAMA PERUSAHAAN <span class="text-red-500">*</span></label>
                <input type="text" name="company" required value="{{ old('company', $lowongan->company) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">LOKASI <span class="text-red-500">*</span></label>
                <input type="text" name="location" required value="{{ old('location', $lowongan->location) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">BATAS WAKTU (DEADLINE) <span class="text-red-500">*</span></label>
                <input type="date" name="deadline" required value="{{ old('deadline', $lowongan->deadline ? $lowongan->deadline->format('Y-m-d') : '') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">TIPE PEKERJAAN <span class="text-red-500">*</span></label>
                <select name="type" required class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 appearance-none focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
                    <option value="Full-time" {{ $lowongan->type == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="Part-time" {{ $lowongan->type == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="Magang" {{ $lowongan->type == 'Magang' ? 'selected' : '' }}>Magang</option>
                    <option value="Contract" {{ $lowongan->type == 'Contract' ? 'selected' : '' }}>Contract</option>
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">RENTANG GAJI</label>
                <input type="text" name="salary_range" value="{{ old('salary_range', $lowongan->salary_range) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">LABEL STATUS</label>
                <input type="text" name="status_label" value="{{ old('status_label', $lowongan->status_label) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">LINK LAMARAN / INFO LEBIH LANJUT</label>
                <input type="url" name="link" value="{{ old('link', $lowongan->link) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div class="md:col-span-2">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">LOGO PERUSAHAAN</label>
                @if($lowongan->logo_path)
                <div class="mb-3">
                    <img src="{{ Storage::url($lowongan->logo_path) }}" alt="{{ $lowongan->company }}" class="w-24 h-24 object-contain border border-gray-200 rounded p-2 bg-gray-50">
                    <p class="text-xs text-gray-400 mt-2">Gambar logo saat ini. Kosongkan input di bawah jika tidak ingin mengubah.</p>
                </div>
                @endif
                <input type="file" name="logo" accept="image/*" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#017A85] file:text-white hover:file:bg-[#01656e] transition">
            </div>
        </div>
        <button type="submit" class="mt-2 bg-[#017A85] hover:bg-[#01656e] text-white font-bold text-xs px-6 py-3 rounded-xl transition flex items-center gap-2">
            Perbarui Lowongan
        </button>
    </form>
</div>
@endsection
