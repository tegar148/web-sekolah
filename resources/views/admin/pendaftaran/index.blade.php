@extends('admin.layouts.app')

@section('title', 'Data Pendaftaran')
@section('breadcrumb', 'Pendaftaran Manager')

@section('content')

{{-- Header --}}
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Data Pendaftaran Siswa Baru</h1>
        <p class="text-sm text-gray-500 mt-1">Daftar masuk formulir pendaftaran online PPDB. <span class="font-semibold text-slate-700">View only.</span></p>
    </div>
    <div class="flex items-center gap-3">
        {{-- Statistik ringkas --}}
        <div class="flex items-center gap-2 bg-white border border-slate-200 rounded-2xl px-5 py-3 shadow-sm">
            <div class="text-center px-3 border-r border-slate-100">
                <p class="text-xl font-bold text-slate-800">{{ $total }}</p>
                <p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold">Total</p>
            </div>
            <div class="text-center px-3 border-r border-slate-100">
                <p class="text-xl font-bold text-blue-600">{{ $terkirim }}</p>
                <p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold">Terkirim</p>
            </div>
            <div class="text-center px-3 border-r border-slate-100">
                <p class="text-xl font-bold text-amber-500">{{ $draft }}</p>
                <p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold">Draft</p>
            </div>
            <div class="text-center px-3">
                <p class="text-xl font-bold text-emerald-600">{{ $diterima }}</p>
                <p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold">Diterima</p>
            </div>
        </div>
    </div>
</div>

{{-- Filter & Search --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 mb-6">
    <form method="GET" action="{{ route('admin.pendaftaran.index') }}" class="flex flex-wrap gap-3 items-end">
        <div class="flex-1 min-w-[200px]">
            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Cari Nama / Kode</label>
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari nama atau PPDB-XXXX..."
                class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
        </div>
        <div>
            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Status</label>
            <select name="status" class="bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition appearance-none pr-8">
                <option value="">Semua Status</option>
                <option value="draft"        {{ request('status') == 'draft'        ? 'selected' : '' }}>Draft</option>
                <option value="terkirim"     {{ request('status') == 'terkirim'     ? 'selected' : '' }}>Terkirim</option>
                <option value="diverifikasi" {{ request('status') == 'diverifikasi' ? 'selected' : '' }}>Diverifikasi</option>
                <option value="diterima"     {{ request('status') == 'diterima'     ? 'selected' : '' }}>Diterima</option>
                <option value="ditolak"      {{ request('status') == 'ditolak'      ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>
        <div>
            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Jurusan</label>
            <select name="jurusan" class="bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition appearance-none pr-8">
                <option value="">Semua Jurusan</option>
                <option value="Agribisnis Ternak Ruminansia" {{ request('jurusan') == 'Agribisnis Ternak Ruminansia' ? 'selected' : '' }}>Agribisnis Ternak Ruminansia</option>
                <option value="Agribisnis Ternak Unggas"     {{ request('jurusan') == 'Agribisnis Ternak Unggas'     ? 'selected' : '' }}>Agribisnis Ternak Unggas</option>
                <option value="Teknik Komputer dan Jaringan" {{ request('jurusan') == 'Teknik Komputer dan Jaringan' ? 'selected' : '' }}>Teknik Komputer dan Jaringan</option>
            </select>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-[#017A85] hover:bg-[#01656e] text-white text-xs font-bold px-5 py-2.5 rounded-xl transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/></svg>
                Filter
            </button>
            @if(request()->hasAny(['search','status','jurusan']))
            <a href="{{ route('admin.pendaftaran.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold px-5 py-2.5 rounded-xl transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                Reset
            </a>
            @endif
        </div>
    </form>
</div>

{{-- Tabel Data --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-[10px] uppercase tracking-widest text-gray-500">
                    <th class="py-4 px-6 font-bold">Kode / Tanggal</th>
                    <th class="py-4 px-6 font-bold">Data Pribadi</th>
                    <th class="py-4 px-6 font-bold">Asal Sekolah</th>
                    <th class="py-4 px-6 font-bold">Jurusan Pilihan</th>
                    <th class="py-4 px-6 font-bold">Wali</th>
                    <th class="py-4 px-6 font-bold">Dokumen</th>
                    <th class="py-4 px-6 font-bold text-center">Status</th>
                    <th class="py-4 px-6 font-bold text-center">Detail</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse($pendaftarans as $p)
                <tr class="hover:bg-slate-50/60 transition group">

                    {{-- Kode & Tanggal --}}
                    <td class="py-4 px-6">
                        <p class="font-bold text-[#017A85] text-xs tracking-wider">{{ $p->kode_pendaftaran ?? '-' }}</p>
                        <p class="text-[11px] text-gray-400 mt-0.5">
                            {{ $p->submitted_at ? $p->submitted_at->format('d M Y, H:i') : ($p->created_at->format('d M Y')) }}
                        </p>
                        <p class="text-[10px] text-gray-300 mt-0.5">Step {{ $p->step_terakhir }}/4</p>
                    </td>

                    {{-- Data Pribadi --}}
                    <td class="py-4 px-6">
                        <div class="flex items-center gap-3">
                            {{-- Avatar inisial --}}
                            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-teal-500 to-cyan-700 text-white flex items-center justify-center font-bold text-sm shrink-0 shadow-sm">
                                {{ strtoupper(mb_substr($p->nama_lengkap, 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-[13px]">{{ $p->nama_lengkap }}</p>
                                <p class="text-[11px] text-gray-400 mt-0.5">
                                    {{ $p->jenis_kelamin ?? '—' }}
                                    @if($p->tanggal_lahir)
                                        · {{ $p->tanggal_lahir->format('d M Y') }}
                                    @endif
                                </p>
                                @if($p->nik)
                                <p class="text-[10px] text-gray-300 mt-0.5 font-mono">NIK: {{ $p->nik }}</p>
                                @endif
                            </div>
                        </div>
                    </td>

                    {{-- Sekolah Asal --}}
                    <td class="py-4 px-6">
                        <p class="text-[13px] text-gray-700 font-medium">{{ $p->sekolah_asal ?? '—' }}</p>
                        @if($p->alamat_lengkap)
                        <p class="text-[11px] text-gray-400 mt-0.5 max-w-[160px] line-clamp-2">{{ $p->alamat_lengkap }}</p>
                        @endif
                    </td>

                    {{-- Jurusan Pilihan --}}
                    <td class="py-4 px-6">
                        @if($p->pilihan_jurusan_1)
                        <div class="flex items-center gap-1.5 mb-1">
                            <span class="text-[9px] font-bold text-teal-600 bg-teal-50 border border-teal-100 px-1.5 py-0.5 rounded">1</span>
                            <span class="text-[12px] text-gray-700 font-medium">{{ $p->pilihan_jurusan_1 }}</span>
                        </div>
                        @endif
                        @if($p->pilihan_jurusan_2)
                        <div class="flex items-center gap-1.5">
                            <span class="text-[9px] font-bold text-gray-400 bg-gray-100 border border-gray-200 px-1.5 py-0.5 rounded">2</span>
                            <span class="text-[11px] text-gray-400">{{ $p->pilihan_jurusan_2 }}</span>
                        </div>
                        @endif
                        @if(!$p->pilihan_jurusan_1)
                            <span class="text-xs text-gray-300">—</span>
                        @endif
                    </td>

                    {{-- Data Wali --}}
                    <td class="py-4 px-6">
                        @if($p->nama_ayah || $p->nama_ibu)
                        <p class="text-[12px] text-gray-700 font-medium">{{ $p->nama_ayah ?? $p->nama_ibu }}</p>
                        @if($p->no_hp_wali)
                        <p class="text-[11px] text-gray-400 mt-0.5">{{ $p->no_hp_wali }}</p>
                        @endif
                        @else
                        <span class="text-xs text-gray-300">—</span>
                        @endif
                    </td>

                    {{-- Dokumen --}}
                    <td class="py-4 px-6">
                        <div class="flex flex-wrap gap-1.5">
                            @foreach([
                                ['field' => 'foto_ijazah', 'label' => 'Ijazah'],
                                ['field' => 'foto_kk',     'label' => 'KK'],
                                ['field' => 'foto_akta',   'label' => 'Akta'],
                                ['field' => 'foto_pas',    'label' => 'Foto'],
                            ] as $doc)
                            <span class="text-[9px] font-bold px-2 py-0.5 rounded-md uppercase tracking-wide
                                {{ $p->{$doc['field']} ? 'bg-emerald-50 text-emerald-600 border border-emerald-200' : 'bg-gray-100 text-gray-400 border border-gray-200' }}">
                                {{ $doc['label'] }}
                            </span>
                            @endforeach
                        </div>
                    </td>

                    {{-- Status --}}
                    <td class="py-4 px-6 text-center">
                        @php
                            $statusMap = [
                                'draft'        => ['bg-gray-100',    'text-gray-500',   'Draft'],
                                'terkirim'     => ['bg-blue-50',     'text-blue-600',   'Terkirim'],
                                'diverifikasi' => ['bg-amber-50',    'text-amber-600',  'Diverifikasi'],
                                'diterima'     => ['bg-emerald-50',  'text-emerald-600','Diterima'],
                                'ditolak'      => ['bg-red-50',      'text-red-600',    'Ditolak'],
                            ];
                            $st = $statusMap[$p->status] ?? ['bg-gray-100', 'text-gray-500', ucfirst($p->status)];
                        @endphp
                        <span class="inline-block text-[10px] font-bold px-3 py-1 rounded-full {{ $st[0] }} {{ $st[1] }} border border-current/20">
                            {{ $st[2] }}
                        </span>
                    </td>

                    {{-- Detail --}}
                    <td class="py-4 px-6 text-center">
                        <button onclick="openDetail({{ $p->id }})"
                            class="p-2 text-slate-400 hover:text-[#017A85] hover:bg-teal-50 rounded-lg transition"
                            title="Lihat Detail">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="8" class="py-16 text-center">
                        <div class="flex flex-col items-center gap-3 text-gray-400">
                            <svg class="w-12 h-12 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <p class="text-sm font-medium">Belum ada data pendaftaran</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
@if($pendaftarans->hasPages())
<div class="mt-6">{{ $pendaftarans->withQueryString()->links() }}</div>
@endif


{{-- ═══ MODAL DETAIL ═══════════════════════════════════════════════ --}}
<div id="modal-detail" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm p-4">
    <div class="bg-white rounded-3xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto" id="modal-body">

        {{-- Skeleton loader --}}
        <div id="modal-loading" class="p-10 text-center text-slate-400 text-sm">
            <svg class="w-8 h-8 animate-spin mx-auto mb-3 text-[#017A85]" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
            </svg>
            Memuat data...
        </div>

        <div id="modal-content" class="hidden"></div>

    </div>
</div>

{{-- Data pendaftaran di-encode aman ke JSON oleh PHP --}}
<script>
const pendaftaranData = @json($pendaftaranJson);

const statusLabel = {
    draft:        { text: 'Draft',        cls: 'bg-gray-100 text-gray-600' },
    terkirim:     { text: 'Terkirim',     cls: 'bg-blue-50 text-blue-600' },
    diverifikasi: { text: 'Diverifikasi', cls: 'bg-amber-50 text-amber-600' },
    diterima:     { text: 'Diterima',     cls: 'bg-emerald-50 text-emerald-600' },
    ditolak:      { text: 'Ditolak',      cls: 'bg-red-50 text-red-600' },
};

// Helper: baris label-value
function row(label, val) {
    const empty = !val || val === '-';
    return '<div>'
        + '<p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-0.5">' + label + '</p>'
        + '<p class="text-[13px] ' + (empty ? 'text-slate-300 italic' : 'text-slate-700 font-medium') + '">'
        + (empty ? 'Tidak diisi' : val)
        + '</p></div>';
}

// Helper: card section
function section(num, title, inner) {
    return '<div class="bg-slate-50 rounded-2xl p-5 border border-slate-100">'
        + '<p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4 flex items-center gap-2">'
        + '<span class="w-5 h-5 rounded-full bg-[#017A85] text-white flex items-center justify-center text-[9px] font-black">' + num + '</span>'
        + title + '</p>'
        + inner
        + '</div>';
}

// Helper: kartu dokumen
function docCard(label, url) {
    if (!url) {
        return '<div class="flex items-center gap-2.5 bg-white rounded-xl border border-dashed border-gray-200 px-3 py-4 justify-center">'
            + '<svg class="w-5 h-5 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>'
            + '<div><p class="text-[12px] font-medium text-gray-400">' + label + '</p><p class="text-[10px] text-gray-300">Belum diunggah</p></div>'
            + '</div>';
    }
    const safeUrl  = url.replace(/'/g, "\\'");
    const safeLbl  = label.replace(/'/g, "\\'");
    const isPdf    = url.toLowerCase().endsWith('.pdf');
    if (isPdf) {
        return '<div class="flex flex-col items-center justify-center gap-2 bg-white rounded-2xl border-2 border-blue-200 p-4 cursor-pointer hover:bg-blue-50 transition" onclick="window.open(\'' + safeUrl + '\', \'_blank\')">'
            + '<svg class="w-10 h-10 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6zm-1 1.5L18.5 9H13V3.5zM8 17h8v-1.5H8V17zm0-3h8v-1.5H8V14zm0-3h5v-1.5H8V11z"/></svg>'
            + '<span class="text-[11px] font-bold text-blue-700">' + label + '</span>'
            + '<span class="text-[10px] text-blue-400">Klik untuk buka PDF</span>'
            + '</div>';
    }
    return '<div class="relative group rounded-2xl overflow-hidden border-2 border-emerald-200 bg-white shadow-sm cursor-pointer" onclick="viewDoc(\'' + safeUrl + '\', \'' + safeLbl + '\')">'
        + '<img src="' + url + '" alt="' + label + '" class="w-full h-32 object-cover transition group-hover:scale-105 group-hover:brightness-90">'
        + '<div class="absolute inset-0 flex items-end justify-center p-2 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition">'
        + '<svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>'
        + '</div>'
        + '<div class="absolute top-2 left-2 bg-emerald-500 text-white text-[9px] font-bold px-2 py-0.5 rounded-full">' + label + '</div>'
        + '</div>';
}

function openDetail(id) {
    const d = pendaftaranData[id];
    if (!d) { alert('Data tidak ditemukan (id=' + id + ')'); return; }

    const modal   = document.getElementById('modal-detail');
    const loading = document.getElementById('modal-loading');
    const content = document.getElementById('modal-content');

    modal.classList.remove('hidden');
    modal.classList.add('flex');
    loading.classList.remove('hidden');
    content.classList.add('hidden');

    setTimeout(function () {
        const st = statusLabel[d.status] || { text: d.status, cls: 'bg-gray-100 text-gray-600' };

        var html = '';

        // Header
        html += '<div class="p-8">';
        html += '<div class="flex items-start justify-between mb-6">';
        html +=   '<div>';
        html +=     '<p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Kode Pendaftaran</p>';
        html +=     '<h2 class="text-xl font-bold text-[#017A85] tracking-wider">' + d.kode + '</h2>';
        html +=     '<div class="flex items-center gap-3 mt-2">';
        html +=       '<span class="text-[10px] font-bold px-2.5 py-1 rounded-full ' + st.cls + '">' + st.text + '</span>';
        html +=       '<span class="text-[11px] text-slate-400">Step ' + d.step + '/4 selesai</span>';
        html +=     '</div>';
        html +=   '</div>';
        html +=   '<button onclick="closeDetail()" class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-xl transition">';
        html +=     '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>';
        html +=   '</button>';
        html += '</div>';

        html += '<div class="space-y-5">';

        // Step 1
        html += section(1, 'Data Pribadi',
            '<div class="grid grid-cols-2 gap-x-6 gap-y-3">'
            + row('Nama Lengkap', d.nama_lengkap)
            + row('NIK', d.nik)
            + row('Tempat Lahir', d.tempat_lahir)
            + row('Tanggal Lahir', d.tanggal_lahir)
            + row('Jenis Kelamin', d.jenis_kelamin)
            + row('Sekolah Asal', d.sekolah_asal)
            + '<div class="col-span-2">' + row('Alamat Lengkap', d.alamat_lengkap) + '</div>'
            + '</div>'
        );

        // Step 2
        html += section(2, 'Data Orang Tua / Wali',
            '<div class="grid grid-cols-2 gap-x-6 gap-y-3">'
            + row('Nama Ayah', d.nama_ayah)
            + row('Nama Ibu', d.nama_ibu)
            + row('Pekerjaan Ayah', d.pekerjaan_ayah)
            + row('Pekerjaan Ibu', d.pekerjaan_ibu)
            + row('No. HP Wali', d.no_hp_wali)
            + row('Email Wali', d.email_wali)
            + '</div>'
        );

        // Step 3
        html += section(3, 'Pilihan Program Keahlian',
            '<div class="space-y-3">'
            + row('Pilihan 1', d.pilihan_jurusan_1)
            + row('Pilihan 2', d.pilihan_jurusan_2)
            + row('Alasan Memilih', d.alasan_memilih)
            + '</div>'
        );

        // Step 4 - Dokumen
        html += section(4, 'Dokumen Unggahan',
            '<div class="grid grid-cols-2 gap-3">'
            + docCard('Ijazah/SKL',    d.foto_ijazah)
            + docCard('Kartu Keluarga',d.foto_kk)
            + docCard('Akta Kelahiran',d.foto_akta)
            + docCard('Pas Foto',      d.foto_pas)
            + '</div>'
        );

        html += '</div>';

        // Footer
        html += '<div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-400">';
        html +=   '<span>Dikirim: ' + (d.submitted_at !== '-' ? d.submitted_at : 'Belum dikirim') + '</span>';
        html +=   '<span>Dibuat: ' + d.created_at + '</span>';
        html += '</div>';
        html += '</div>';

        content.innerHTML = html;
        loading.classList.add('hidden');
        content.classList.remove('hidden');
    }, 200);
}

function closeDetail() {
    const modal = document.getElementById('modal-detail');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.getElementById('modal-content').innerHTML = '';
}

function viewDoc(url, label) {
    const lb = document.getElementById('lightbox');
    document.getElementById('lightbox-img').src = url;
    document.getElementById('lightbox-label').textContent = label;
    document.getElementById('lightbox-download').href = url;
    lb.classList.remove('hidden');
    lb.classList.add('flex');
}

function closeLightbox() {
    const lb = document.getElementById('lightbox');
    lb.classList.add('hidden');
    lb.classList.remove('flex');
    document.getElementById('lightbox-img').src = '';
}

document.getElementById('modal-detail').addEventListener('click', function (e) {
    if (e.target === this) closeDetail();
});
</script>


{{-- ═══ LIGHTBOX GAMBAR DOKUMEN ═════════════════════════════════ --}}
<div id="lightbox" class="fixed inset-0 z-[60] hidden items-center justify-center bg-black/80 backdrop-blur-sm p-4"
     onclick="if(event.target===this) closeLightbox()">
    <div class="relative max-w-4xl w-full max-h-[90vh] flex flex-col items-center">

        {{-- Toolbar --}}
        <div class="flex items-center justify-between w-full mb-3 px-1">
            <span id="lightbox-label" class="text-white font-bold text-sm bg-white/10 px-4 py-1.5 rounded-full"></span>
            <div class="flex gap-2">
                <a id="lightbox-download" href="#" download
                   class="flex items-center gap-1.5 bg-white/10 hover:bg-white/20 text-white text-xs font-bold px-3 py-1.5 rounded-full transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Unduh
                </a>
                <button onclick="closeLightbox()"
                    class="flex items-center gap-1.5 bg-white/10 hover:bg-red-500/80 text-white text-xs font-bold px-3 py-1.5 rounded-full transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Tutup
                </button>
            </div>
        </div>

        {{-- Gambar --}}
        <img id="lightbox-img" src="" alt="Dokumen"
             class="max-h-[80vh] max-w-full rounded-2xl shadow-2xl object-contain bg-white/5">
    </div>
</div>

@endsection
