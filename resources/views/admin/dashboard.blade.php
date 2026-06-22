@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')
<!-- Welcome Banner -->
<div class="bg-gradient-to-r from-[#1C2331] to-[#2D3748] rounded-[1.5rem] p-8 md:p-10 mb-8 text-white relative overflow-hidden">
    <div class="absolute right-6 top-6 opacity-10">
        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
    </div>
    <h2 class="text-2xl md:text-3xl font-bold mb-3">Selamat Datang, {{ Auth::user()->name }}!</h2>
    <p class="text-gray-300 text-sm max-w-xl leading-relaxed opacity-90">Kelola konten sekolah Anda dengan mudah di sini. Pantau statistik, perbarui informasi kurikulum, dan kelola media dalam satu dasbor terpadu.</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
        </div>
        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1">TOTAL SECTIONS</p>
        <p class="text-3xl font-bold text-gray-900">{{ $stats['sections'] }}</p>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
        </div>
        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1">TOTAL MEDIA</p>
        <p class="text-3xl font-bold text-gray-900">{{ $stats['media'] }}</p>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
        </div>
        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1">TOTAL USERS</p>
        <p class="text-3xl font-bold text-gray-900">{{ $stats['users'] }}</p>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
        </div>
        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1">TOTAL PAGES</p>
        <p class="text-3xl font-bold text-gray-900">{{ $stats['pages'] }}</p>
    </div>
</div>

<!-- PPDB Summary Stats Row -->
@php
    $ppdbStatuses = [
        'draft'    => ['label' => 'Draft',    'color' => 'bg-gray-100 text-gray-600', 'dot' => 'bg-gray-400'],
        'terkirim' => ['label' => 'Terkirim', 'color' => 'bg-blue-50 text-blue-600',  'dot' => 'bg-blue-500'],
    ];
@endphp

<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
    <div class="bg-gradient-to-br from-[#017A85] to-[#01656e] rounded-2xl p-5 text-white shadow-md shadow-teal-500/20 col-span-1">
        <p class="text-[9px] font-bold uppercase tracking-widest opacity-70 mb-1">Total Pra-PPDB</p>
        <p class="text-4xl font-black">{{ $ppdbTotal }}</p>
        <a href="{{ route('admin.pendaftaran.index') }}" class="mt-3 inline-flex items-center gap-1 text-[10px] font-bold uppercase tracking-wider opacity-80 hover:opacity-100">
            Lihat Semua
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>
    @foreach($ppdbStatuses as $key => $info)
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
        <div class="flex items-center gap-2 mb-2">
            <span class="w-2.5 h-2.5 rounded-full {{ $info['dot'] }} shrink-0"></span>
            <p class="text-[9px] font-bold uppercase tracking-widest text-gray-400">{{ $info['label'] }}</p>
        </div>
        <p class="text-3xl font-black text-gray-900">{{ $ppdbByStatus[$key] ?? 0 }}</p>
    </div>
    @endforeach
</div>

<!-- Donut Charts + Recent Sections -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">

    <!-- Donut: Asal Sekolah -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <div class="flex items-center justify-between mb-5">
            <div>
                <h3 class="font-bold text-gray-900 text-sm">Asal Sekolah</h3>
                <p class="text-[10px] text-gray-400 mt-0.5 uppercase tracking-widest">Pra-PPDB · Distribusi</p>
            </div>
            <div class="w-8 h-8 rounded-lg bg-teal-50 text-teal-600 flex items-center justify-center">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18M10 3v18M14 3v18"/><rect x="3" y="3" width="18" height="18" rx="2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
            </div>
        </div>

        @php
            $sekolahTotal = array_sum($ppdbBySekolah);
            $sekolahPalette = ['bg-teal-500','bg-cyan-500','bg-sky-500','bg-indigo-500','bg-violet-500','bg-pink-500','bg-rose-500','bg-orange-400','bg-amber-400','bg-lime-500'];
            $si = 0;
        @endphp

        @if($sekolahTotal > 0)
        <div class="relative flex items-center justify-center mb-5" style="height:180px">
            <canvas id="chartSekolah" style="width:180px;height:180px;display:block"></canvas>
            <div class="absolute text-center pointer-events-none">
                <p class="text-2xl font-black text-gray-900">{{ count($ppdbBySekolah) }}</p>
                <p class="text-[9px] font-bold text-gray-400 uppercase tracking-wider">Sekolah</p>
            </div>
        </div>

        <!-- Legend -->
        <div style="max-height:144px; overflow-y:auto; padding-right:4px;" class="sekolah-scroll-list space-y-2">
            @foreach($ppdbBySekolah as $sekolah => $count)
            @php $dotClass = $sekolahPalette[$si % count($sekolahPalette)]; $si++; @endphp
            <div class="flex items-center justify-between py-0.5">
                <div class="flex items-center gap-2 min-w-0">
                    <span class="w-2.5 h-2.5 rounded-full {{ $dotClass }} shrink-0"></span>
                    <span class="text-xs text-gray-600 font-medium truncate" title="{{ $sekolah }}">{{ Str::limit($sekolah, 22) }}</span>
                </div>
                <div class="flex items-center gap-2 shrink-0 ml-2">
                    <span class="text-xs font-bold text-gray-800">{{ $count }}</span>
                    <span class="text-[10px] text-gray-400">{{ $sekolahTotal > 0 ? round($count/$sekolahTotal*100) : 0 }}%</span>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="flex flex-col items-center justify-center py-10 text-gray-300">
            <svg class="w-14 h-14 mb-3 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M3 14h18M10 3v18M14 3v18"/></svg>
            <p class="text-sm text-gray-400 font-medium">Belum ada data</p>
        </div>
        @endif
    </div>

    <!-- Donut: Jurusan -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <div class="flex items-center justify-between mb-5">
            <div>
                <h3 class="font-bold text-gray-900 text-sm">Minat Jurusan</h3>
                <p class="text-[10px] text-gray-400 mt-0.5 uppercase tracking-widest">Pra-PPDB · Per Kompetensi</p>
            </div>
            <div class="w-8 h-8 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
        </div>

        @php
            $jurusanTotal = array_sum($ppdbByJurusan);
            $jurusanColors = [
                'dot'     => ['bg-violet-500', 'bg-sky-500', 'bg-rose-500', 'bg-orange-400', 'bg-lime-500'],
            ];
            $ji = 0;
        @endphp

        @if($jurusanTotal > 0)
        <div class="relative flex items-center justify-center mb-5" style="height:180px">
            <canvas id="chartJurusan" style="width:180px;height:180px;display:block"></canvas>
            <div class="absolute text-center pointer-events-none">
                <p class="text-2xl font-black text-gray-900">{{ $jurusanTotal }}</p>
                <p class="text-[9px] font-bold text-gray-400 uppercase tracking-wider">Pilihan</p>
            </div>
        </div>

        <!-- Legend -->
        <div class="space-y-2">
            @foreach($ppdbByJurusan as $jurusan => $count)
            @php $dotClass = $jurusanColors['dot'][$ji % count($jurusanColors['dot'])]; $ji++; @endphp
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2 min-w-0">
                    <span class="w-2.5 h-2.5 rounded-full {{ $dotClass }} shrink-0"></span>
                    <span class="text-xs text-gray-600 font-medium truncate" title="{{ $jurusan }}">{{ Str::limit($jurusan, 24) }}</span>
                </div>
                <div class="flex items-center gap-2 shrink-0 ml-2">
                    <span class="text-xs font-bold text-gray-800">{{ $count }}</span>
                    <span class="text-[10px] text-gray-400">{{ $jurusanTotal > 0 ? round($count/$jurusanTotal*100) : 0 }}%</span>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="flex flex-col items-center justify-center py-10 text-gray-300">
            <svg class="w-14 h-14 mb-3 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            <p class="text-sm text-gray-400 font-medium">Belum ada data</p>
        </div>
        @endif
    </div>

    <!-- Donut: Kecamatan -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <div class="flex items-center justify-between mb-5">
            <div>
                <h3 class="font-bold text-gray-900 text-sm">Kecamatan</h3>
                <p class="text-[10px] text-gray-400 mt-0.5 uppercase tracking-widest">Pra-PPDB · Asal Domisili</p>
            </div>
            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
        </div>

        @php
            $kelurahanTotal = array_sum($ppdbByKelurahan);
            $kelurahanPalette = ['bg-emerald-500','bg-teal-500','bg-cyan-400','bg-green-500','bg-lime-500','bg-sky-500','bg-indigo-400','bg-violet-400','bg-fuchsia-400','bg-rose-400'];
            $ki = 0;
        @endphp

        @if($kelurahanTotal > 0)
        <div class="relative flex items-center justify-center mb-5" style="height:180px">
            <canvas id="chartKelurahan" style="width:180px;height:180px;display:block"></canvas>
            <div class="absolute text-center pointer-events-none">
                <p class="text-2xl font-black text-gray-900">{{ count($ppdbByKelurahan) }}</p>
                <p class="text-[9px] font-bold text-gray-400 uppercase tracking-wider">Kecamatan</p>
            </div>
        </div>

        <!-- Legend -->
        <div style="max-height:144px; overflow-y:auto; padding-right:4px;" class="kelurahan-scroll-list space-y-2">
            @foreach($ppdbByKelurahan as $kelurahan => $count)
            @php $dotKel = $kelurahanPalette[$ki % count($kelurahanPalette)]; $ki++; @endphp
            <div class="flex items-center justify-between py-0.5">
                <div class="flex items-center gap-2 min-w-0">
                    <span class="w-2.5 h-2.5 rounded-full {{ $dotKel }} shrink-0"></span>
                    <span class="text-xs text-gray-600 font-medium truncate" title="{{ $kelurahan }}">{{ Str::limit($kelurahan, 20) }}</span>
                </div>
                <div class="flex items-center gap-2 shrink-0 ml-2">
                    <span class="text-xs font-bold text-gray-800">{{ $count }}</span>
                    <span class="text-[10px] text-gray-400">{{ $kelurahanTotal > 0 ? round($count/$kelurahanTotal*100) : 0 }}%</span>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="flex flex-col items-center justify-center py-10 text-gray-300">
            <svg class="w-14 h-14 mb-3 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <p class="text-sm text-gray-400 font-medium">Belum ada data</p>
        </div>
        @endif
    </div>


</div>

<!-- Quick Actions -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
    <h3 class="font-bold text-gray-900 mb-6 text-sm">Aksi Cepat</h3>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
        <a href="{{ route('admin.sections.index', ['page' => 'welcome']) }}" class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl border border-gray-100 hover:border-teal-200 hover:bg-teal-50">
            <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            </div>
            <div class="flex-1">
                <p class="text-sm font-bold text-gray-800">Edit Landing</p>
                <p class="text-[10px] text-gray-400">Ganti konten halaman utama</p>
            </div>
            <svg class="w-4 h-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </a>

        <a href="{{ route('admin.media.index') }}" class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl border border-gray-100 hover:border-teal-200 hover:bg-teal-50">
            <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
            </div>
            <div class="flex-1">
                <p class="text-sm font-bold text-gray-800">Upload Foto</p>
                <p class="text-[10px] text-gray-400">Tambah koleksi galeri sekolah</p>
            </div>
            <svg class="w-4 h-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </a>

        <a href="{{ route('admin.pendaftaran.index') }}" class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl border border-gray-100 hover:border-teal-200 hover:bg-teal-50">
            <div class="w-10 h-10 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
            <div class="flex-1">
                <p class="text-sm font-bold text-gray-800">Data Pra-PPDB</p>
                <p class="text-[10px] text-gray-400">Kelola data pendaftar masuk</p>
            </div>
            <svg class="w-4 h-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </a>
    </div>
</div>

@endsection

@push('scripts')
<style>
.sekolah-scroll-list::-webkit-scrollbar,
.kelurahan-scroll-list::-webkit-scrollbar {
    width: 4px;
}
.sekolah-scroll-list::-webkit-scrollbar-track,
.kelurahan-scroll-list::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 99px;
}
.sekolah-scroll-list::-webkit-scrollbar-thumb,
.kelurahan-scroll-list::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 99px;
}
.sekolah-scroll-list::-webkit-scrollbar-thumb:hover,
.kelurahan-scroll-list::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
(function () {
    // ── Asal Sekolah Chart ───────────────────────────────────────
    @php
        $sekolahLabels  = array_keys($ppdbBySekolah);
        $sekolahCounts  = array_values($ppdbBySekolah);
        $sekolahPaletteHex = ['#14B8A6','#06B6D4','#0EA5E9','#6366F1','#8B5CF6','#EC4899','#F43F5E','#FB923C','#FBBF24','#84CC16'];
        $sekolahBg = [];
        foreach ($sekolahLabels as $i => $s) {
            $sekolahBg[] = $sekolahPaletteHex[$i % count($sekolahPaletteHex)];
        }
    @endphp

    const sekolahEl = document.getElementById('chartSekolah');
    if (sekolahEl) {
        new Chart(sekolahEl, {
            type: 'doughnut',
            data: {
                labels: @json($sekolahLabels),
                datasets: [{
                    data: @json($sekolahCounts),
                    backgroundColor: @json($sekolahBg),
                    borderWidth: 3,
                    borderColor: '#ffffff',
                }]
            },
            options: {
                cutout: '72%',
                animation: { duration: 600, easing: 'easeInOutQuart' },
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: ctx => ` ${ctx.label}: ${ctx.parsed} (${Math.round(ctx.parsed / ctx.dataset.data.reduce((a,b)=>a+b,0)*100)}%)`
                        }
                    }
                },
            }
        });
    }

    // ── Jurusan Chart ────────────────────────────────────────────
    @php
        $jurusanLabels = array_keys($ppdbByJurusan);
        $jurusanCounts = array_values($ppdbByJurusan);
        $jurusanPalette   = ['#8B5CF6','#0EA5E9','#F43F5E','#FB923C','#84CC16','#14B8A6'];
        $jurusanPaletteHv = ['#7C3AED','#0284C7','#E11D48','#EA580C','#65A30D','#0D9488'];
        $jurusanBg = [];
        $jurusanHv = [];
        foreach ($jurusanLabels as $i => $j) {
            $jurusanBg[] = $jurusanPalette[$i % count($jurusanPalette)];
            $jurusanHv[] = $jurusanPaletteHv[$i % count($jurusanPaletteHv)];
        }
    @endphp

    const jurusanEl = document.getElementById('chartJurusan');
    if (jurusanEl) {
        new Chart(jurusanEl, {
            type: 'doughnut',
            data: {
                labels: @json($jurusanLabels),
                datasets: [{
                    data: @json($jurusanCounts),
                    backgroundColor: @json($jurusanBg),
                    borderWidth: 3,
                    borderColor: '#ffffff',
                }]
            },
            options: {
                cutout: '72%',
                animation: false,
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: ctx => ` ${ctx.label}: ${ctx.parsed} (${Math.round(ctx.parsed / ctx.dataset.data.reduce((a,b)=>a+b,0)*100)}%)`
                        }
                    }
                },
            }
        });
    }

    // ── Kecamatan Chart ─────────────────────────────────────────
    @php
        $kelurahanLabels = array_keys($ppdbByKelurahan);
        $kelurahanCounts = array_values($ppdbByKelurahan);
        $kelurahanPaletteHex = ['#10B981','#14B8A6','#22D3EE','#22C55E','#84CC16','#0EA5E9','#818CF8','#A78BFA','#E879F9','#FB7185'];
        $kelurahanBg = [];
        foreach ($kelurahanLabels as $i => $k) {
            $kelurahanBg[] = $kelurahanPaletteHex[$i % count($kelurahanPaletteHex)];
        }
    @endphp

    const kelurahanEl = document.getElementById('chartKelurahan');
    if (kelurahanEl) {
        new Chart(kelurahanEl, {
            type: 'doughnut',
            data: {
                labels: @json($kelurahanLabels),
                datasets: [{
                    data: @json($kelurahanCounts),
                    backgroundColor: @json($kelurahanBg),
                    borderWidth: 3,
                    borderColor: '#ffffff',
                }]
            },
            options: {
                cutout: '72%',
                animation: { duration: 600, easing: 'easeInOutQuart' },
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: ctx => ` ${ctx.label}: ${ctx.parsed} (${Math.round(ctx.parsed / ctx.dataset.data.reduce((a,b)=>a+b,0)*100)}%)`
                        }
                    }
                },
            }
        });
    }
})();
</script>
@endpush
