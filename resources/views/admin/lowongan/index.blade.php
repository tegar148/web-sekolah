@extends('admin.layouts.app')

@section('title', 'Lowongan BKK')
@section('breadcrumb', 'Lowongan Manager')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Data Lowongan Kerja</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola data informasi lowongan kerja untuk BKK.</p>
    </div>
</div>

{{-- Form Tambah --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 mb-8">
    <h3 class="font-bold text-gray-900 mb-6 flex items-center gap-2">
        <svg class="w-5 h-5 text-[#017A85]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
        Tambah Lowongan Baru
    </h3>

    <form action="{{ route('admin.lowongan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">POSISI / TITLE <span class="text-red-500">*</span></label>
                <input type="text" name="title" required placeholder="Contoh: Junior Web Developer" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">NAMA PERUSAHAAN <span class="text-red-500">*</span></label>
                <input type="text" name="company" required placeholder="Contoh: PT. Teknologi Nusantara" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">LOKASI <span class="text-red-500">*</span></label>
                <input type="text" name="location" required placeholder="Contoh: Jember, Jawa Timur" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">BATAS WAKTU (DEADLINE) <span class="text-red-500">*</span></label>
                <input type="date" name="deadline" required class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">TIPE PEKERJAAN <span class="text-red-500">*</span></label>
                <select name="type" required class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 appearance-none focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Magang">Magang</option>
                    <option value="Contract">Contract</option>
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">RENTANG GAJI</label>
                <input type="text" name="salary_range" placeholder="Contoh: IDR 3.5M - 5M" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">LABEL STATUS</label>
                <input type="text" name="status_label" placeholder="Contoh: URGENT, NEW, HOT" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">LINK LAMARAN / INFO LEBIH LANJUT</label>
                <input type="url" name="link" placeholder="Contoh: https://example.com/apply" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">LOGO PERUSAHAAN</label>
                <input type="file" name="logo" accept="image/*" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#017A85] file:text-white hover:file:bg-[#01656e] transition">
            </div>
        </div>
        <button type="submit" class="mt-2 bg-[#017A85] hover:bg-[#01656e] text-white font-bold text-xs px-6 py-3 rounded-xl transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Simpan Lowongan
        </button>
    </form>
</div>

{{-- List Table --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-[10px] uppercase tracking-widest text-gray-500">
                    <th class="py-4 px-6 font-bold">Posisi & Perusahaan</th>
                    <th class="py-4 px-6 font-bold">Info Detail</th>
                    <th class="py-4 px-6 font-bold">Link URL</th>
                    <th class="py-4 px-6 font-bold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse($lowongans as $lowongan)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-4 px-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl border border-gray-200 bg-gray-50 flex items-center justify-center p-2 shrink-0">
                                @if($lowongan->logo_path)
                                <img src="{{ Storage::url($lowongan->logo_path) }}" alt="{{ $lowongan->company }}" class="w-full h-full object-contain">
                                @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($lowongan->company) }}&background=e2e8f0&color=475569" alt="{{ $lowongan->company }}" class="w-full h-full object-contain rounded">
                                @endif
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">{{ $lowongan->title }} 
                                    @if($lowongan->status_label)
                                    <span class="ml-2 bg-blue-100 text-blue-700 text-[9px] font-bold uppercase tracking-widest px-2 py-0.5 rounded-md">{{ $lowongan->status_label }}</span>
                                    @endif
                                </p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $lowongan->company }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <p class="text-xs text-gray-500 mb-1"><span class="font-semibold text-gray-700">Tipe:</span> {{ $lowongan->type }}</p>
                        <p class="text-xs text-gray-500 mb-1"><span class="font-semibold text-gray-700">Lokasi:</span> {{ $lowongan->location }}</p>
                        <p class="text-xs text-gray-500 mb-1"><span class="font-semibold text-gray-700">Deadline:</span> {{ \Carbon\Carbon::parse($lowongan->deadline)->format('d M Y') }}</p>
                        @if($lowongan->salary_range)
                        <p class="text-xs text-gray-500"><span class="font-semibold text-gray-700">Gaji:</span> {{ $lowongan->salary_range }}</p>
                        @endif
                    </td>
                    <td class="py-4 px-6">
                        @if($lowongan->link)
                            <a href="{{ $lowongan->link }}" target="_blank" class="text-xs text-blue-600 hover:underline inline-flex items-center gap-1">
                                Kunjungi <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                        @else
                            <span class="text-xs text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.lowongan.edit', $lowongan) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.lowongan.destroy', $lowongan) }}" method="POST" onsubmit="return confirm('Hapus data lowongan ini?')" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-12 text-center">
                        <p class="text-gray-500 text-sm">Belum ada data lowongan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($lowongans->hasPages())
<div class="mt-6">{{ $lowongans->links() }}</div>
@endif
@endsection
