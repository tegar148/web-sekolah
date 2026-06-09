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
        'draft'        => ['label' => 'Draft',        'color' => 'bg-gray-100 text-gray-600',     'dot' => 'bg-gray-400'],
        'terkirim'     => ['label' => 'Terkirim',     'color' => 'bg-blue-50 text-blue-600',      'dot' => 'bg-blue-500'],
        'diverifikasi' => ['label' => 'Diverifikasi', 'color' => 'bg-amber-50 text-amber-600',    'dot' => 'bg-amber-500'],
        'diterima'     => ['label' => 'Diterima',     'color' => 'bg-emerald-50 text-emerald-600','dot' => 'bg-emerald-500'],
        'ditolak'      => ['label' => 'Ditolak',      'color' => 'bg-red-50 text-red-600',        'dot' => 'bg-red-500'],
    ];
@endphp

<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
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

    <!-- Donut: Status -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <div class="flex items-center justify-between mb-5">
            <div>
                <h3 class="font-bold text-gray-900 text-sm">Status Pendaftaran</h3>
                <p class="text-[10px] text-gray-400 mt-0.5 uppercase tracking-widest">Pra-PPDB · Distribusi</p>
            </div>
            <div class="w-8 h-8 rounded-lg bg-teal-50 text-teal-600 flex items-center justify-center">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/></svg>
            </div>
        </div>

        @if($ppdbTotal > 0)
        <div class="relative flex items-center justify-center mb-5" style="height:180px">
            <canvas id="chartStatus" style="width:180px;height:180px;display:block"></canvas>
            <div class="absolute text-center pointer-events-none">
                <p class="text-2xl font-black text-gray-900">{{ $ppdbTotal }}</p>
                <p class="text-[9px] font-bold text-gray-400 uppercase tracking-wider">Total</p>
            </div>
        </div>

        <!-- Legend -->
        <div class="space-y-2">
            @foreach($ppdbStatuses as $key => $info)
            @php $count = $ppdbByStatus[$key] ?? 0; @endphp
            @if($count > 0)
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full {{ $info['dot'] }} shrink-0"></span>
                    <span class="text-xs text-gray-600 font-medium">{{ $info['label'] }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-gray-800">{{ $count }}</span>
                    <span class="text-[10px] text-gray-400">{{ $ppdbTotal > 0 ? round($count/$ppdbTotal*100) : 0 }}%</span>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @else
        <div class="flex flex-col items-center justify-center py-10 text-gray-300">
            <svg class="w-14 h-14 mb-3 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/></svg>
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

    <!-- Recent Sections -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-bold text-gray-900 text-sm">Section Terbaru</h3>
            <a href="{{ route('admin.sections.index') }}" class="text-[11px] font-bold text-[#017A85] hover:underline uppercase tracking-wider">Lihat Semua</a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($recentSections as $s)
            <div class="px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-2 h-2 rounded-full {{ $s->is_visible ? 'bg-teal-500' : 'bg-gray-300' }}"></div>
                    <div>
                        <p class="text-sm font-bold text-gray-800">{{ $s->title ?? $s->section_key }}</p>
                        <p class="text-[10px] text-gray-400 uppercase tracking-wider">{{ $s->page }} &bull; {{ $s->section_key }}</p>
                    </div>
                </div>
                <span class="text-[10px] text-gray-400">{{ $s->updated_at->diffForHumans() }}</span>
            </div>
            @empty
            <div class="px-6 py-8 text-center text-gray-400 text-sm">Belum ada section. Jalankan seeder terlebih dahulu.</div>
            @endforelse
        </div>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
(function () {
    // ── Status Chart ─────────────────────────────────────────────
    @php
        $statusLabels = [];
        $statusCounts = [];
        $statusColors = [
            'draft'        => '#9CA3AF',
            'terkirim'     => '#3B82F6',
            'diverifikasi' => '#F59E0B',
            'diterima'     => '#10B981',
            'ditolak'      => '#EF4444',
        ];
        $statusHover = [
            'draft'        => '#6B7280',
            'terkirim'     => '#2563EB',
            'diverifikasi' => '#D97706',
            'diterima'     => '#059669',
            'ditolak'      => '#DC2626',
        ];
        $statusBg    = [];
        $statusHv    = [];
        foreach ($ppdbByStatus as $key => $count) {
            $statusLabels[] = match($key) {
                'draft'        => 'Draft',
                'terkirim'     => 'Terkirim',
                'diverifikasi' => 'Diverifikasi',
                'diterima'     => 'Diterima',
                'ditolak'      => 'Ditolak',
                default        => ucfirst($key),
            };
            $statusCounts[] = $count;
            $statusBg[]     = $statusColors[$key] ?? '#9CA3AF';
            $statusHv[]     = $statusHover[$key] ?? '#6B7280';
        }
    @endphp

    const statusEl = document.getElementById('chartStatus');
    if (statusEl) {
        new Chart(statusEl, {
            type: 'doughnut',
            data: {
                labels: @json($statusLabels),
                datasets: [{
                    data: @json($statusCounts),
                    backgroundColor: @json($statusBg),
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
})();
</script>
@endpush
