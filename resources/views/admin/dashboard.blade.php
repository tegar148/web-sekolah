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
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition">
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

<!-- Quick Actions & Recent Activity -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Recent Sections -->
    <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-bold text-gray-900">Section Terbaru</h3>
            <a href="{{ route('admin.sections.index') }}" class="text-[11px] font-bold text-[#017A85] hover:underline uppercase tracking-wider">Lihat Semua</a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($recentSections as $s)
            <div class="px-6 py-4 flex items-center justify-between hover:bg-gray-50/50 transition">
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

    <!-- Quick Actions -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <h3 class="font-bold text-gray-900 mb-6">Aksi Cepat</h3>
        <div class="space-y-3">
            <a href="{{ route('admin.sections.index', ['page' => 'welcome']) }}" class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl hover:bg-teal-50 hover:border-teal-100 border border-transparent transition group">
                <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center group-hover:bg-teal-100 group-hover:text-teal-700 transition">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-bold text-gray-800">Edit Landing</p>
                    <p class="text-[10px] text-gray-400">Ganti konten halaman utama</p>
                </div>
                <svg class="w-4 h-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>

            <a href="{{ route('admin.media.index') }}" class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl hover:bg-teal-50 hover:border-teal-100 border border-transparent transition group">
                <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center group-hover:bg-teal-100 group-hover:text-teal-700 transition">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-bold text-gray-800">Upload Foto</p>
                    <p class="text-[10px] text-gray-400">Tambah koleksi galeri sekolah</p>
                </div>
                <svg class="w-4 h-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>

            <a href="{{ route('admin.sections.index', ['page' => 'berita']) }}" class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl hover:bg-teal-50 hover:border-teal-100 border border-transparent transition group">
                <div class="w-10 h-10 rounded-xl bg-green-100 text-green-600 flex items-center justify-center group-hover:bg-teal-100 group-hover:text-teal-700 transition">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-bold text-gray-800">Tambah Berita</p>
                    <p class="text-[10px] text-gray-400">Publikasi pengumuman baru</p>
                </div>
                <svg class="w-4 h-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>
    </div>
</div>
@endsection
