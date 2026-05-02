@extends('admin.layouts.app')

@section('title', 'Guru & Tenaga Pendidik')
@section('breadcrumb', 'Guru Manager')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Data Guru & Tenaga Pendidik</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola data profil guru, departemen, dan mata pelajaran.</p>
    </div>
</div>

{{-- Form Tambah --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 mb-8">
    <h3 class="font-bold text-gray-900 mb-6 flex items-center gap-2">
        <svg class="w-5 h-5 text-[#017A85]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
        Tambah Data Guru
    </h3>

    <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">NAMA LENGKAP & GELAR <span class="text-red-500">*</span></label>
                <input type="text" name="name" required placeholder="Contoh: Budi Santoso, S.Pd" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">DEPARTEMEN / JURUSAN <span class="text-red-500">*</span></label>
                <select name="department" required class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 appearance-none focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
                    <option value="Agribisnis Ruminasia">Agribisnis Ruminasia</option>
                    <option value="Agribisnis Ternak Unggas">Agribisnis Ternak Unggas</option>
                    <option value="Teknik Komputer & Jaringan">Teknik Komputer & Jaringan</option>
                    <option value="Umum (General Education)">Umum (General Education)</option>
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">MATA PELAJARAN / JABATAN <span class="text-red-500">*</span></label>
                <input type="text" name="subject" required placeholder="Contoh: MATHEMATICS, HEAD OF TKJ" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">NUPTK</label>
                <input type="text" name="nuptk" placeholder="Contoh: 1234567890123456" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">STATUS KEPEGAWAIAN</label>
                <select name="status" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 appearance-none focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
                    <option value="PNS">PNS</option>
                    <option value="PPPK">PPPK</option>
                    <option value="GTT">GTT</option>
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">FOTO PROFIL</label>
                <input type="file" name="image" accept="image/*" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#017A85] file:text-white hover:file:bg-[#01656e] transition">
            </div>
        </div>
        <button type="submit" class="mt-2 bg-[#017A85] hover:bg-[#01656e] text-white font-bold text-xs px-6 py-3 rounded-xl transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Simpan Data Guru
        </button>
    </form>
</div>

{{-- List Table --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-[10px] uppercase tracking-widest text-gray-500">
                    <th class="py-4 px-6 font-bold">Profil Guru</th>
                    <th class="py-4 px-6 font-bold">Departemen & Mapel</th>
                    <th class="py-4 px-6 font-bold">Administrasi</th>
                    <th class="py-4 px-6 font-bold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse($gurus as $guru)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-4 px-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full border-2 border-teal-100 overflow-hidden shrink-0 bg-gray-100">
                                @if($guru->image_path)
                                <img src="{{ Storage::url($guru->image_path) }}" alt="{{ $guru->name }}" class="w-full h-full object-cover">
                                @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($guru->name) }}&background=e2e8f0&color=475569" alt="{{ $guru->name }}" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">{{ $guru->name }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <p class="font-semibold text-gray-800">{{ $guru->department }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">{{ $guru->subject }}</p>
                    </td>
                    <td class="py-4 px-6">
                        <p class="text-xs text-gray-500"><span class="font-semibold">NUPTK:</span> {{ $guru->nuptk ?? '-' }}</p>
                        <p class="text-xs text-gray-500 mt-0.5"><span class="font-semibold">Status:</span> {{ $guru->status ?? '-' }}</p>
                    </td>
                    <td class="py-4 px-6 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.guru.edit', $guru) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.guru.destroy', $guru) }}" method="POST" onsubmit="return confirm('Hapus data guru ini?')" class="inline">
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
                        <p class="text-gray-500 text-sm">Belum ada data guru.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($gurus->hasPages())
<div class="mt-6">{{ $gurus->links() }}</div>
@endif
@endsection
