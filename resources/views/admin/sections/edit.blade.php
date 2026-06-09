@extends('admin.layouts.app')

@section('title', 'Edit Section')
@section('breadcrumb', 'Edit Section')

@section('content')
<div class="max-w-4xl">
    <!-- Back -->
    <a href="{{ route('admin.sections.index', ['page' => $section->page]) }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-[#017A85] mb-6 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Kembali ke {{ ucwords(str_replace('-', ' ', $section->page)) }}
    </a>

    <div class="flex items-center gap-4 mb-8">
        <div class="w-12 h-12 rounded-xl bg-[#017A85] text-white flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
        </div>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Section</h1>
            <p class="text-xs text-gray-400 uppercase tracking-widest">{{ $section->page }} &bull; {{ $section->section_key }}</p>
        </div>
    </div>

    <form action="{{ route('admin.sections.update', $section) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @php
            $show = $fieldConfig['show'] ?? [
                'title' => true,
                'subtitle' => true,
                'content' => true,
                'image' => true,
                'button_text' => true,
                'button_link' => true,
            ];
            $contentHint = $fieldConfig['content_hint'] ?? null;
            $contentSchema = $fieldConfig['content_schema'] ?? [];
        @endphp

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 space-y-6">
            
            <!-- Visibility Toggle -->
            <div class="flex items-center justify-between bg-gray-50 rounded-xl p-4 border border-gray-100">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    <div>
                        <p class="text-sm font-bold text-gray-800">Tampilkan Section</p>
                        <p class="text-[10px] text-gray-400">Section akan {{ $section->is_visible ? 'terlihat' : 'tersembunyi' }} di halaman publik</p>
                    </div>
                </div>
                <label class="relative cursor-pointer">
                    <input type="hidden" name="is_visible" value="0">
                    <input type="checkbox" name="is_visible" value="1" {{ $section->is_visible ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-12 h-7 bg-gray-300 peer-checked:bg-[#017A85] rounded-full transition-colors"></div>
                    <div class="absolute top-0.5 left-0.5 w-6 h-6 bg-white rounded-full shadow-sm transition-transform peer-checked:translate-x-5"></div>
                </label>
            </div>

            <!-- Title -->
            @if($show['title'])
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">JUDUL / HEADING</label>
                <input type="text" name="title" value="{{ old('title', $section->title) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Masukkan judul section...">
            </div>
            @endif

            <!-- Subtitle -->
            @if($show['subtitle'])
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">TAGLINE / DESKRIPSI SINGKAT</label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $section->subtitle) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Masukkan deskripsi...">
            </div>
            @endif

            <!-- Content (Textarea / Custom Fields) -->
            @if($show['content'])
                @if($section->section_key === 'footer')
                    @php
                        $footerData = json_decode($section->content, true);
                        if (!is_array($footerData)) $footerData = [];
                    @endphp
                    <div class="space-y-4">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">INFORMASI KONTAK FOOTER</label>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Alamat Lengkap</label>
                                <textarea name="footer_contact[address]" rows="2" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">{{ old('footer_contact.address', $footerData['address'] ?? '') }}</textarea>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Nomor Telepon</label>
                                <input type="text" name="footer_contact[phone]" value="{{ old('footer_contact.phone', $footerData['phone'] ?? '') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="+62 ...">
                                
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mt-3 mb-1">Alamat Email</label>
                                <input type="email" name="footer_contact[email]" value="{{ old('footer_contact.email', $footerData['email'] ?? '') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="email@sekolah.sch.id">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Link Facebook</label>
                                <input type="url" name="footer_contact[facebook]" value="{{ old('footer_contact.facebook', $footerData['facebook'] ?? '') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="https://facebook.com/...">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Link Instagram</label>
                                <input type="url" name="footer_contact[instagram]" value="{{ old('footer_contact.instagram', $footerData['instagram'] ?? '') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="https://instagram.com/...">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Link YouTube</label>
                                <input type="url" name="footer_contact[youtube]" value="{{ old('footer_contact.youtube', $footerData['youtube'] ?? '') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="https://youtube.com/...">
                            </div>
                        </div>

                        <!-- Navigation Configuration -->
                        <div class="mt-8 pt-6 border-t border-gray-100">
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-4">PENGATURAN NAVIGASI FOOTER</label>
                            
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                <!-- Nav Group 1 -->
                                <div class="bg-gray-50 p-5 rounded-xl border border-gray-200">
                                    <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Judul Navigasi 1</label>
                                    <input type="text" name="footer_contact[nav1_title]" value="{{ old('footer_contact.nav1_title', $footerData['nav1_title'] ?? 'NAVIGASI') }}" class="w-full bg-white border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition mb-4">
                                    
                                    <div class="space-y-2" id="nav1-container">
                                        <div class="flex justify-between items-center mb-2">
                                            <label class="block text-[10px] font-bold text-gray-500 uppercase">Daftar Link Navigasi 1</label>
                                            <button type="button" onclick="addNavLink('nav1')" class="text-[#017A85] hover:text-[#01656e] text-[10px] font-bold uppercase tracking-wider flex items-center gap-1 bg-teal-50 px-2 py-1 rounded border border-teal-100">
                                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg> Tambah Link
                                            </button>
                                        </div>
                                        @php
                                            $nav1Links = isset($footerData['nav1_links']) && is_array($footerData['nav1_links']) ? array_values(array_filter($footerData['nav1_links'], fn($l) => !empty($l['label']))) : [];
                                            if (empty($nav1Links)) {
                                                $nav1Links = [
                                                    ['label' => 'Tentang Kami', 'url' => '/sejarah'],
                                                    ['label' => 'Kurikulum', 'url' => '/jurusan/tkj'],
                                                    ['label' => 'Fasilitas', 'url' => '/fasilitas'],
                                                    ['label' => 'Kemitraan', 'url' => '/bkk/profile']
                                                ];
                                            }
                                        @endphp
                                        @foreach($nav1Links as $i => $link)
                                        <div class="flex gap-2 items-center nav1-row">
                                            <input type="text" name="footer_contact[nav1_links][{{$i}}][label]" value="{{ $link['label'] }}" class="w-[45%] bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-[#017A85] transition" placeholder="Nama Menu">
                                            <input type="text" name="footer_contact[nav1_links][{{$i}}][url]" value="{{ $link['url'] }}" class="w-[45%] bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-[#017A85] transition" placeholder="URL">
                                            <button type="button" onclick="this.parentElement.remove()" class="w-[10%] text-red-400 hover:text-red-600 flex justify-center" title="Hapus">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Nav Group 2 -->
                                <div class="bg-gray-50 p-5 rounded-xl border border-gray-200">
                                    <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Judul Navigasi 2</label>
                                    <input type="text" name="footer_contact[nav2_title]" value="{{ old('footer_contact.nav2_title', $footerData['nav2_title'] ?? 'PROGRAM') }}" class="w-full bg-white border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition mb-4">
                                    
                                    <div class="space-y-2" id="nav2-container">
                                        <div class="flex justify-between items-center mb-2">
                                            <label class="block text-[10px] font-bold text-gray-500 uppercase">Daftar Link Navigasi 2</label>
                                            <button type="button" onclick="addNavLink('nav2')" class="text-[#017A85] hover:text-[#01656e] text-[10px] font-bold uppercase tracking-wider flex items-center gap-1 bg-teal-50 px-2 py-1 rounded border border-teal-100">
                                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg> Tambah Link
                                            </button>
                                        </div>
                                        @php
                                            $nav2Links = isset($footerData['nav2_links']) && is_array($footerData['nav2_links']) ? array_values(array_filter($footerData['nav2_links'], fn($l) => !empty($l['label']))) : [];
                                            if (empty($nav2Links)) {
                                                $nav2Links = [
                                                    ['label' => 'Digital Team', 'url' => '/jurusan/tkj'],
                                                    ['label' => 'Advanced AI Lab', 'url' => '/jurusan/tkj'],
                                                    ['label' => 'Agri-Industry', 'url' => '/jurusan/ruminansia'],
                                                    ['label' => 'Business Hub', 'url' => '/bkk/lowongan']
                                                ];
                                            }
                                        @endphp
                                        @foreach($nav2Links as $i => $link)
                                        <div class="flex gap-2 items-center nav2-row">
                                            <input type="text" name="footer_contact[nav2_links][{{$i}}][label]" value="{{ $link['label'] }}" class="w-[45%] bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-[#017A85] transition" placeholder="Nama Menu">
                                            <input type="text" name="footer_contact[nav2_links][{{$i}}][url]" value="{{ $link['url'] }}" class="w-[45%] bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-[#017A85] transition" placeholder="URL">
                                            <button type="button" onclick="this.parentElement.remove()" class="w-[10%] text-red-400 hover:text-red-600 flex justify-center" title="Hapus">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function addNavLink(type) {
                                const container = document.getElementById(type + '-container');
                                const rows = container.querySelectorAll('.' + type + '-row');
                                let maxIndex = -1;
                                rows.forEach(row => {
                                    const input = row.querySelector('input');
                                    if(input) {
                                        const match = input.name.match(/\[(\d+)\]/);
                                        if(match) {
                                            const idx = parseInt(match[1]);
                                            if(idx > maxIndex) maxIndex = idx;
                                        }
                                    }
                                });
                                const index = maxIndex + 1;
                                
                                const row = document.createElement('div');
                                row.className = 'flex gap-2 items-center ' + type + '-row mt-2';
                                row.innerHTML = `
                                    <input type="text" name="footer_contact[${type}_links][${index}][label]" class="w-[45%] bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-[#017A85] transition" placeholder="Nama Menu">
                                    <input type="text" name="footer_contact[${type}_links][${index}][url]" class="w-[45%] bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-[#017A85] transition" placeholder="URL">
                                    <button type="button" onclick="this.parentElement.remove()" class="w-[10%] text-red-400 hover:text-red-600 flex justify-center" title="Hapus"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                                `;
                                container.appendChild(row);
                            }
                        </script>
                    </div>
                @elseif($section->section_key === 'prospek_karir')
                    @php
                        $prospekData = json_decode($section->content, true);
                        if (!is_array($prospekData)) $prospekData = [];
                    @endphp
                    <div class="space-y-4">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">DAFTAR KARTU PROSPEK KARIR</label>
                        <p class="text-xs text-gray-500 mb-4">Anda hanya dapat mengubah isi konten (Judul, Deskripsi, Badge). Tidak bisa menambah atau menghapus kartu untuk mempertahankan struktur UI.</p>
                        
                        <div class="grid grid-cols-1 gap-6">
                            @foreach($prospekData as $i => $item)
                            <div class="bg-gray-50 p-5 rounded-xl border border-gray-200">
                                <div class="flex justify-between items-center mb-3">
                                    <h4 class="text-xs font-bold text-gray-700 uppercase">Kartu #{{ $i + 1 }} (Tipe: {{ $item['type'] ?? 'small' }})</h4>
                                </div>
                                <input type="hidden" name="prospek_karir_data[{{$i}}][type]" value="{{ $item['type'] ?? 'small' }}">
                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Judul Peran (Role)</label>
                                        <input type="text" name="prospek_karir_data[{{$i}}][title]" value="{{ $item['title'] ?? '' }}" class="w-full bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-4 py-2.5 focus:outline-none focus:border-[#017A85] transition" placeholder="Contoh: Network Engineer">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Deskripsi Pekerjaan</label>
                                        <textarea name="prospek_karir_data[{{$i}}][desc]" rows="2" class="w-full bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-4 py-2.5 focus:outline-none focus:border-[#017A85] transition">{{ $item['desc'] ?? '' }}</textarea>
                                    </div>
                                    @if(isset($item['type']) && $item['type'] === 'wide')
                                    <div>
                                        <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Badge Tags (pisahkan dengan koma)</label>
                                        <input type="text" name="prospek_karir_data[{{$i}}][tags]" value="{{ $item['tags'] ?? '' }}" class="w-full bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-4 py-2.5 focus:outline-none focus:border-[#017A85] transition" placeholder="Contoh: Infrastruktur, Analitik Web">
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @elseif($section->section_key === 'fasilitas_jurusan')
                    @php
                        $fasilitasData = json_decode($section->content, true);
                        if (!is_array($fasilitasData)) $fasilitasData = [];
                    @endphp
                    <div class="space-y-4">
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest">DAFTAR FASILITAS JURUSAN</label>
                            <button type="button" onclick="addFasilitasCard()" class="text-[#017A85] hover:text-[#01656e] text-[10px] font-bold uppercase tracking-wider flex items-center gap-1 bg-teal-50 px-3 py-1.5 rounded-lg border border-teal-100 transition">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg> Tambah Fasilitas
                            </button>
                        </div>
                        
                        <div id="fasilitas-container" class="space-y-4">
                            @foreach($fasilitasData as $i => $item)
                            <div class="bg-gray-50 p-5 rounded-xl border border-gray-200 fasilitas-row relative">
                                <button type="button" onclick="this.parentElement.remove()" class="absolute top-4 right-4 text-red-400 hover:text-red-600 bg-red-50 p-1.5 rounded-md transition" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Nama Fasilitas</label>
                                        <input type="text" name="fasilitas_data[{{$i}}][title]" value="{{ $item['title'] ?? '' }}" class="w-full bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-4 py-2.5 focus:outline-none focus:border-[#017A85] transition mb-3">
                                        
                                        <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Label / Tag (opsional)</label>
                                        <input type="text" name="fasilitas_data[{{$i}}][tag]" value="{{ $item['tag'] ?? '' }}" class="w-full bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-4 py-2.5 focus:outline-none focus:border-[#017A85] transition mb-3" placeholder="Contoh: SMART FARM">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Deskripsi Singkat</label>
                                        <textarea name="fasilitas_data[{{$i}}][desc]" rows="4" class="w-full bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-4 py-2.5 focus:outline-none focus:border-[#017A85] transition">{{ $item['desc'] ?? '' }}</textarea>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">URL Gambar Khusus (Opsional, akan pakai default jika kosong)</label>
                                        <input type="text" name="fasilitas_data[{{$i}}][image]" value="{{ $item['image'] ?? '' }}" class="w-full bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-4 py-2.5 focus:outline-none focus:border-[#017A85] transition" placeholder="https://images.unsplash.com/...">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <script>
                            function addFasilitasCard() {
                                const container = document.getElementById('fasilitas-container');
                                const rows = container.querySelectorAll('.fasilitas-row');
                                let index = 0;
                                if (rows.length > 0) {
                                    const lastRow = rows[rows.length - 1];
                                    const input = lastRow.querySelector('input');
                                    if(input) {
                                        const match = input.name.match(/\[(\d+)\]/);
                                        if(match) index = parseInt(match[1]) + 1;
                                    }
                                }
                                
                                const row = document.createElement('div');
                                row.className = 'bg-gray-50 p-5 rounded-xl border border-gray-200 fasilitas-row relative mt-4';
                                row.innerHTML = `
                                    <button type="button" onclick="this.parentElement.remove()" class="absolute top-4 right-4 text-red-400 hover:text-red-600 bg-red-50 p-1.5 rounded-md transition" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Nama Fasilitas</label>
                                            <input type="text" name="fasilitas_data[${index}][title]" class="w-full bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-4 py-2.5 focus:outline-none focus:border-[#017A85] transition mb-3">
                                            
                                            <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Label / Tag (opsional)</label>
                                            <input type="text" name="fasilitas_data[${index}][tag]" class="w-full bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-4 py-2.5 focus:outline-none focus:border-[#017A85] transition mb-3" placeholder="Contoh: SMART FARM">
                                        </div>
                                        <div>
                                            <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Deskripsi Singkat</label>
                                            <textarea name="fasilitas_data[${index}][desc]" rows="4" class="w-full bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-4 py-2.5 focus:outline-none focus:border-[#017A85] transition"></textarea>
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">URL Gambar Khusus (Opsional)</label>
                                            <input type="text" name="fasilitas_data[${index}][image]" class="w-full bg-white border border-gray-200 text-gray-800 text-sm rounded-lg px-4 py-2.5 focus:outline-none focus:border-[#017A85] transition" placeholder="https://images.unsplash.com/...">
                                        </div>
                                    </div>
                                `;
                                container.appendChild(row);
                            }
                        </script>
                    </div>
                @elseif($section->section_key === 'osis')
                    @php
                        $osisData = $section->extra_data ?? [];
                    @endphp
                    <div class="space-y-4">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">DETAIL PROFIL KETUA & BADGE (OSIS)</label>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Nama Ketua</label>
                                <input type="text" name="osis_data[avatar_name]" value="{{ old('osis_data.avatar_name', $osisData['avatar_name'] ?? '') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Contoh: Aditya Pratama">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Peran / Jabatan</label>
                                <input type="text" name="osis_data[avatar_role]" value="{{ old('osis_data.avatar_role', $osisData['avatar_role'] ?? 'KETUA UMUM') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Contoh: KETUA UMUM">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Foto Profil Ketua</label>
                                @if(!empty($osisData['avatar']) && Storage::disk('public')->exists($osisData['avatar']))
                                    <div class="mb-3 relative inline-block group">
                                        <img src="{{ Storage::url($osisData['avatar']) }}" alt="Avatar" class="h-16 w-16 rounded-full border border-gray-200 object-cover">
                                        <div class="absolute inset-0 bg-black/50 rounded-full opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                            <label class="cursor-pointer text-white text-[8px] font-bold hover:text-red-400 transition">
                                                <input type="checkbox" name="osis_data[remove_avatar]" value="1" class="hidden">
                                                Hapus
                                            </label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="osis_data[avatar]" value="{{ $osisData['avatar'] }}">
                                @elseif(!empty($osisData['avatar']))
                                    <!-- Fallback for old URL -->
                                    <div class="mb-3 flex items-center gap-3">
                                        <img src="{{ $osisData['avatar'] }}" alt="Avatar" class="h-16 w-16 rounded-full border border-gray-200 object-cover">
                                        <input type="hidden" name="osis_data[avatar]" value="{{ $osisData['avatar'] }}">
                                        <label class="cursor-pointer text-red-500 text-[10px] font-bold hover:text-red-700 transition">
                                            <input type="checkbox" name="osis_data[remove_avatar]" value="1" class="hidden">
                                            Hapus URL Lama
                                        </label>
                                    </div>
                                @endif
                                <input type="file" name="osis_avatar" accept="image/*" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#017A85] file:text-white hover:file:bg-[#01656e] transition">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Teks Badge (Overlay Gambar)</label>
                                <input type="text" name="osis_data[badge_text]" value="{{ old('osis_data.badge_text', $osisData['badge_text'] ?? 'LIVE SESSION') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Contoh: LIVE SESSION">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Judul Info Badge</label>
                                <input type="text" name="osis_data[badge_title]" value="{{ old('osis_data.badge_title', $osisData['badge_title'] ?? '') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Contoh: Rapat Kerja Program...">
                            </div>
                        </div>
                    </div>
                @elseif($section->section_key === 'pramuka')
                    @php
                        $pramukaData = is_array($section->extra_data) ? $section->extra_data : json_decode($section->extra_data ?? '{}', true);
                    @endphp
                    <div class="space-y-4">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">INFO DETAIL PRAMUKA</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Teks Badge (Label)</label>
                                <input type="text" name="pramuka_data[badge]" value="{{ old('pramuka_data.badge', $pramukaData['badge'] ?? 'WAJIB') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Contoh: WAJIB">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Jadwal</label>
                                <input type="text" name="pramuka_data[schedule]" value="{{ old('pramuka_data.schedule', $pramukaData['schedule'] ?? 'Jumat, 14:00 WIB') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Contoh: Jumat, 14:00 WIB">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Prestasi / Info Tambahan</label>
                                <input type="text" name="pramuka_data[achievement]" value="{{ old('pramuka_data.achievement', $pramukaData['achievement'] ?? 'Juara Umum Kwarran 2023') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Contoh: Juara Umum Kwarran...">
                            </div>
                        </div>
                    </div>
                @elseif($section->section_key === 'pmr')
                    @php
                        $pmrData = is_array($section->extra_data) ? $section->extra_data : json_decode($section->extra_data ?? '{}', true);
                    @endphp
                    <div class="space-y-4">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">INFO DETAIL PMR</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Jadwal</label>
                                <input type="text" name="pmr_data[schedule]" value="{{ old('pmr_data.schedule', $pmrData['schedule'] ?? 'Sabtu, 08:00 WIB') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Contoh: Sabtu, 08:00 WIB">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Link Detail (Opsional)</label>
                                <input type="text" name="pmr_data[link]" value="{{ old('pmr_data.link', $pmrData['link'] ?? '#') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="https://...">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Ikon (SVG HTML)</label>
                                <textarea name="pmr_data[icon]" rows="3" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm font-mono rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="<svg>...</svg>">{{ old('pmr_data.icon', $pmrData['icon'] ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                @elseif($section->section_key === 'sambutan')
                    @php
                        $sambutan_data = is_array($section->extra_data) ? $section->extra_data : (json_decode($section->extra_data ?? '{}', true) ?? []);
                    @endphp
                    <div class="space-y-4">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">INFO KEPALA SEKOLAH</label>
                        <p class="text-xs text-gray-500 -mt-2 mb-3">Nama dan jabatan yang ditampilkan di bawah isi sambutan pada halaman utama.</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Nama Kepala Sekolah</label>
                                <input type="text" name="sambutan_data[nama_kepala_sekolah]" value="{{ old('sambutan_data.nama_kepala_sekolah', $sambutan_data['nama_kepala_sekolah'] ?? 'Suhartini') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Contoh: Budi Santoso, S.Pd.">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Jabatan / Gelar</label>
                                <input type="text" name="sambutan_data[jabatan_kepala_sekolah]" value="{{ old('sambutan_data.jabatan_kepala_sekolah', $sambutan_data['jabatan_kepala_sekolah'] ?? 'KEPALA SEKOLAH SMK NEGERI 1 MAESAN') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Contoh: KEPALA SEKOLAH SMK NEGERI 1 MAESAN">
                            </div>
                        </div>
                    </div>
                @elseif($section->page === 'info-ppdb' && $section->section_key === 'bantuan')
                    @php
                        $bantuanData = is_array($section->extra_data) ? $section->extra_data : json_decode($section->extra_data ?? '{}', true);
                    @endphp
                    <div class="space-y-4">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">KONTAK BANTUAN</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Nomor Telepon/WA</label>
                                <input type="text" name="bantuan_data[phone]" value="{{ old('bantuan_data.phone', $bantuanData['phone'] ?? '+62 812-3456-7890') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Contoh: +62 812-3456-7890">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Email</label>
                                <input type="email" name="bantuan_data[email]" value="{{ old('bantuan_data.email', $bantuanData['email'] ?? 'ppdb@smkn1maesan.sch.id') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="Contoh: ppdb@smkn1maesan.sch.id">
                            </div>
                        </div>
                    </div>
                @elseif($section->page === 'info-ppdb' && $section->section_key === 'cta')
                    @php
                        $ctaData = is_array($section->extra_data) ? $section->extra_data : json_decode($section->extra_data ?? '{}', true);
                    @endphp
                    <div class="space-y-4">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">INFO TOMBOL & TEKS CTA</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Teks Tombol Primary</label>
                                <input type="text" name="cta_data[button_primary_text]" value="{{ old('cta_data.button_primary_text', $ctaData['button_primary_text'] ?? 'Daftar Online Sekarang') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Link Tombol Primary</label>
                                <input type="text" name="cta_data[button_primary_link]" value="{{ old('cta_data.button_primary_link', $ctaData['button_primary_link'] ?? '#') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Teks Tombol Secondary</label>
                                <input type="text" name="cta_data[button_secondary_text]" value="{{ old('cta_data.button_secondary_text', $ctaData['button_secondary_text'] ?? 'Unduh Brosur (PDF)') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Link Tombol Secondary</label>
                                <input type="text" name="cta_data[button_secondary_link]" value="{{ old('cta_data.button_secondary_link', $ctaData['button_secondary_link'] ?? '#') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Teks Informasi Tambahan (Bawah)</label>
                                <input type="text" name="cta_data[info_text]" value="{{ old('cta_data.info_text', $ctaData['info_text'] ?? 'Pendaftaran gelombang pertama tersisa 5 hari lagi.') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
                            </div>
                        </div>
                    </div>
                @elseif($section->page === 'info-ppdb' && $section->section_key === 'hero')
                    @php
                        $heroData = is_array($section->extra_data) ? $section->extra_data : json_decode($section->extra_data ?? '{}', true);
                    @endphp
                    <div class="space-y-4">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">PENGATURAN LABEL HERO</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Teks Badge / Label Tombol</label>
                                <input type="text" name="hero_data[button_text]" value="{{ old('hero_data.button_text', $heroData['button_text'] ?? 'PENERIMAAN PESERTA DIDIK BARU 2024/2025') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
                            </div>
                        </div>
                    </div>
                @elseif($section->page === 'info-ppdb' && in_array($section->section_key, ['persyaratan', 'jadwal', 'langkah']))
                    <div class="p-4 bg-teal-50 border border-teal-100 rounded-xl mt-4">
                        <p class="text-sm text-teal-700 font-medium">Gunakan form khusus di bagian bawah halaman ini untuk mengelola data item satu per satu.</p>
                    </div>
                @else
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">KONTEN UTAMA</label>
                        @if($contentHint)
                            <p class="text-xs text-gray-500 mb-3">{{ $contentHint }}</p>
                        @endif
                        <textarea name="content" rows="6" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition resize-y" placeholder="Tulis konten lengkap section...">{{ old('content', $section->content) }}</textarea>
                    </div>

                    @if(count($contentSchema))
                    <div class="overflow-hidden rounded-xl border border-gray-200 mt-4">
                        <div class="px-4 py-3 bg-gray-50 border-b border-gray-200">
                            <p class="text-[11px] font-bold text-gray-700 uppercase tracking-wider">Tabel Struktur Konten Section</p>
                        </div>
                        <table class="w-full text-xs">
                            <thead class="bg-white border-b border-gray-100">
                                <tr class="text-left text-gray-500">
                                    <th class="px-4 py-3 font-semibold">Kolom</th>
                                    <th class="px-4 py-3 font-semibold">Tipe</th>
                                    <th class="px-4 py-3 font-semibold">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contentSchema as $row)
                                <tr class="border-b border-gray-100 last:border-b-0">
                                    <td class="px-4 py-3 font-mono text-gray-700">{{ $row['kolom'] }}</td>
                                    <td class="px-4 py-3 text-gray-600">{{ $row['tipe'] }}</td>
                                    <td class="px-4 py-3 text-gray-600">{{ $row['keterangan'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                @endif
            @endif

            <!-- Image Upload -->
            @if(isset($show['image']) && $show['image'])
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">GAMBAR LATAR / MEDIA</label>
                @if($section->image)
                <div class="mb-3 relative inline-block group">
                    <img src="{{ Storage::url($section->image) }}" alt="Current" class="h-32 rounded-xl border border-gray-200 object-cover">
                    <span class="absolute -top-2 -right-2 bg-teal-500 text-white text-[8px] px-2 py-0.5 rounded-full font-bold">CURRENT</span>
                    
                    <div class="absolute inset-0 bg-black/50 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <label class="cursor-pointer bg-red-500 text-white text-[10px] font-bold px-3 py-1.5 rounded-lg flex items-center gap-1 hover:bg-red-600 transition">
                            <input type="checkbox" name="remove_image" value="1" class="w-3 h-3 rounded text-red-600 focus:ring-red-500">
                            Hapus Gambar
                        </label>
                    </div>
                </div>
                @endif
                <input type="file" name="image" accept="image/*" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#017A85] file:text-white hover:file:bg-[#01656e] transition">
                <div class="flex items-center gap-2 mt-2">
                    <span class="inline-flex items-center gap-1 bg-teal-50 text-teal-700 text-[10px] font-bold px-2.5 py-1 rounded-lg border border-teal-100">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        AUTO COMPRESS
                    </span>
                    <p class="text-[10px] text-gray-400">Format: JPG, PNG, WEBP, GIF. Maks 50MB. Otomatis dikompresi ke WebP (maks 1920px, kualitas 75%).</p>
                </div>
            </div>
            @endif

            <!-- Multiple Images Upload -->
            @if(isset($show['images']) && $show['images'])
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">GAMBAR PARTNER / MULTIPLE GAMBAR</label>
                
                @php
                    $rawImages = json_decode($section->content, true);
                    if (!is_array($rawImages)) $rawImages = [];
                    
                    // Filter to prevent legacy data (objects) from causing errors
                    $existingImages = array_filter($rawImages, function($item) {
                        return is_string($item);
                    });
                @endphp
                
                @if(count($existingImages) > 0)
                <div class="mb-4 flex flex-wrap gap-4">
                    @foreach($existingImages as $imgPath)
                    <div class="relative inline-block group">
                        <img src="{{ Storage::url($imgPath) }}" alt="Partner" class="h-24 w-auto rounded-lg border border-gray-200 object-contain bg-gray-50 p-2">
                        <div class="absolute inset-0 bg-black/50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <label class="cursor-pointer bg-red-500 text-white text-[9px] font-bold px-2 py-1 rounded flex items-center gap-1 hover:bg-red-600 transition">
                                <input type="checkbox" name="remove_images[]" value="{{ $imgPath }}" class="w-2.5 h-2.5 rounded text-red-600 focus:ring-red-500">
                                Hapus
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                <input type="file" name="images[]" multiple accept="image/*" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#017A85] file:text-white hover:file:bg-[#01656e] transition">
                <p class="text-[10px] text-gray-400 mt-2">Pilih lebih dari satu gambar (Gunakan Shift / Ctrl saat memilih). Format: JPG, PNG, WEBP. Otomatis dikompresi.</p>
            </div>
            @endif

            <!-- Button Text & Link -->
            @if($show['button_text'] || $show['button_link'])
            <div class="grid grid-cols-1 {{ ($show['button_text'] && $show['button_link']) ? 'md:grid-cols-2' : 'md:grid-cols-1' }} gap-4">
                @if($show['button_text'])
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">LABEL TOMBOL</label>
                    <input type="text" name="button_text" value="{{ old('button_text', $section->button_text) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="cth: Mulai Eksplorasi">
                </div>
                @endif
                @if($show['button_link'])
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">LINK TOMBOL</label>
                    <input type="text" name="button_link" value="{{ old('button_link', $section->button_link) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition" placeholder="cth: /profile-sekolah">
                </div>
                @endif
            </div>
            @endif
        </div>

        <!-- Submit -->
        <div class="mt-6 flex items-center gap-4">
            <button type="submit" class="bg-[#017A85] hover:bg-[#01656e] text-white font-bold text-sm px-8 py-4 rounded-xl shadow-lg shadow-teal-800/20 transition-all flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                Simpan Perubahan
            </button>

            <a href="{{ route('admin.sections.index', ['page' => $section->page]) }}" class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold text-sm px-6 py-4 rounded-xl transition">
                Batal
            </a>
        </div>
    </form>
    
    @if($section->page === 'info-ppdb')
        @if($section->section_key === 'persyaratan')
            @php $ppdbRequirements = \App\Models\PpdbRequirement::all(); @endphp
            <!-- CRUD Tabel Persyaratan PPDB -->
            <div class="mt-8 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">Kelola Item Persyaratan</h2>
                    </div>
                    <button type="button" onclick="document.getElementById('modal-add-req').classList.remove('hidden')" class="bg-[#017A85] hover:bg-[#01656e] text-white px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2 shadow-sm transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg> Tambah
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-600">
                        <thead class="bg-gray-50/50 text-gray-500 uppercase text-[10px] font-bold tracking-wider border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4">Deskripsi Persyaratan</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($ppdbRequirements as $item)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="px-6 py-4">{{ $item->description }}</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <button type="button" onclick="editReq({{ $item->id }}, '{{ addslashes($item->description) }}')" class="p-2 text-blue-500 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </button>
                                        <form action="{{ route('admin.ppdb.requirement.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="2" class="px-6 py-8 text-center text-gray-500 text-sm">Belum ada data.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Add/Edit Req -->
            <div id="modal-add-req" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-900">Tambah Persyaratan</h3>
                        <button type="button" onclick="document.getElementById('modal-add-req').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 transition"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                    </div>
                    <form action="{{ route('admin.ppdb.requirement.store') }}" method="POST" class="p-6 space-y-4">
                        @csrf
                        <div><label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label><input type="text" name="description" required class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-[#017A85] text-sm"></div>
                        <div class="pt-4 flex justify-end gap-3"><button type="button" onclick="document.getElementById('modal-add-req').classList.add('hidden')" class="px-5 py-2.5 text-sm font-bold text-gray-600 bg-gray-100 rounded-xl">Batal</button><button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-[#017A85] rounded-xl">Simpan</button></div>
                    </form>
                </div>
            </div>

            <div id="modal-edit-req" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-900">Edit Persyaratan</h3>
                        <button type="button" onclick="document.getElementById('modal-edit-req').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 transition"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                    </div>
                    <form id="form-edit-req" method="POST" class="p-6 space-y-4">
                        @csrf @method('PUT')
                        <div><label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label><input type="text" name="description" id="edit-req-desc" required class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-[#017A85] text-sm"></div>
                        <div class="pt-4 flex justify-end gap-3"><button type="button" onclick="document.getElementById('modal-edit-req').classList.add('hidden')" class="px-5 py-2.5 text-sm font-bold text-gray-600 bg-gray-100 rounded-xl">Batal</button><button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-[#017A85] rounded-xl">Simpan</button></div>
                    </form>
                </div>
            </div>
            
            <script>
                function editReq(id, desc) {
                    document.getElementById('form-edit-req').action = '/admin/ppdb/requirement/' + id;
                    document.getElementById('edit-req-desc').value = desc;
                    document.getElementById('modal-edit-req').classList.remove('hidden');
                }
            </script>
            
        @elseif($section->section_key === 'jadwal')
            @php $ppdbTimelines = \App\Models\PpdbTimeline::all(); @endphp
            <!-- CRUD Tabel Timeline -->
            <div class="mt-8 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">Kelola Item Jadwal</h2>
                    </div>
                    <button type="button" onclick="document.getElementById('modal-add-tl').classList.remove('hidden')" class="bg-[#017A85] hover:bg-[#01656e] text-white px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2 shadow-sm transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg> Tambah
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-600">
                        <thead class="bg-gray-50/50 text-gray-500 uppercase text-[10px] font-bold tracking-wider border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4">Tanggal / Label</th>
                                <th class="px-6 py-4">Judul</th>
                                <th class="px-6 py-4">Deskripsi</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($ppdbTimelines as $item)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="px-6 py-4 font-bold">{{ $item->date_label }}</td>
                                <td class="px-6 py-4 font-bold">{{ $item->title }}</td>
                                <td class="px-6 py-4">{{ $item->description }}</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <button type="button" onclick="editTl({{ $item->id }}, '{{ addslashes($item->date_label) }}', '{{ addslashes($item->title) }}', '{{ addslashes($item->description) }}')" class="p-2 text-blue-500 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </button>
                                        <form action="{{ route('admin.ppdb.timeline.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="px-6 py-8 text-center text-gray-500 text-sm">Belum ada data.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="modal-add-tl" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-900">Tambah Jadwal</h3>
                        <button type="button" onclick="document.getElementById('modal-add-tl').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 transition"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                    </div>
                    <form action="{{ route('admin.ppdb.timeline.store') }}" method="POST" class="p-6 space-y-4">
                        @csrf
                        <div><label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal (Label)</label><input type="text" name="date_label" required class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-[#017A85] text-sm"></div>
                        <div><label class="block text-sm font-semibold text-gray-700 mb-1">Judul</label><input type="text" name="title" required class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-[#017A85] text-sm"></div>
                        <div><label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label><textarea name="description" required class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-[#017A85] text-sm" rows="3"></textarea></div>
                        <div class="pt-4 flex justify-end gap-3"><button type="button" onclick="document.getElementById('modal-add-tl').classList.add('hidden')" class="px-5 py-2.5 text-sm font-bold text-gray-600 bg-gray-100 rounded-xl">Batal</button><button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-[#017A85] rounded-xl">Simpan</button></div>
                    </form>
                </div>
            </div>

            <div id="modal-edit-tl" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-900">Edit Jadwal</h3>
                        <button type="button" onclick="document.getElementById('modal-edit-tl').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 transition"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                    </div>
                    <form id="form-edit-tl" method="POST" class="p-6 space-y-4">
                        @csrf @method('PUT')
                        <div><label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal (Label)</label><input type="text" name="date_label" id="edit-tl-date" required class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-[#017A85] text-sm"></div>
                        <div><label class="block text-sm font-semibold text-gray-700 mb-1">Judul</label><input type="text" name="title" id="edit-tl-title" required class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-[#017A85] text-sm"></div>
                        <div><label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label><textarea name="description" id="edit-tl-desc" required class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-[#017A85] text-sm" rows="3"></textarea></div>
                        <div class="pt-4 flex justify-end gap-3"><button type="button" onclick="document.getElementById('modal-edit-tl').classList.add('hidden')" class="px-5 py-2.5 text-sm font-bold text-gray-600 bg-gray-100 rounded-xl">Batal</button><button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-[#017A85] rounded-xl">Simpan</button></div>
                    </form>
                </div>
            </div>
            
            <script>
                function editTl(id, date, title, desc) {
                    document.getElementById('form-edit-tl').action = '/admin/ppdb/timeline/' + id;
                    document.getElementById('edit-tl-date').value = date;
                    document.getElementById('edit-tl-title').value = title;
                    document.getElementById('edit-tl-desc').value = desc;
                    document.getElementById('modal-edit-tl').classList.remove('hidden');
                }
            </script>
            
        @elseif($section->section_key === 'langkah')
            @php $ppdbSteps = \App\Models\PpdbStep::all(); @endphp
            <!-- CRUD Tabel Langkah Pendaftaran -->
            <div class="mt-8 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">Kelola Item Langkah Pendaftaran</h2>
                    </div>
                    <button type="button" onclick="document.getElementById('modal-add-st').classList.remove('hidden')" class="bg-[#017A85] hover:bg-[#01656e] text-white px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2 shadow-sm transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg> Tambah
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-600">
                        <thead class="bg-gray-50/50 text-gray-500 uppercase text-[10px] font-bold tracking-wider border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4">Judul Langkah</th>
                                <th class="px-6 py-4">Deskripsi</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($ppdbSteps as $item)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="px-6 py-4 font-bold">{{ $item->title }}</td>
                                <td class="px-6 py-4">{{ $item->description }}</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <button type="button" onclick="editSt({{ $item->id }}, '{{ addslashes($item->title) }}', '{{ addslashes($item->description) }}', '{{ base64_encode($item->icon) }}')" class="p-2 text-blue-500 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </button>
                                        <form action="{{ route('admin.ppdb.step.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="px-6 py-8 text-center text-gray-500 text-sm">Belum ada data.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="modal-add-st" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-900">Tambah Langkah</h3>
                        <button type="button" onclick="document.getElementById('modal-add-st').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 transition"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                    </div>
                    <form action="{{ route('admin.ppdb.step.store') }}" method="POST" class="p-6 space-y-4">
                        @csrf
                        <div><label class="block text-sm font-semibold text-gray-700 mb-1">Judul (misal: 01. Akses Portal)</label><input type="text" name="title" required class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-[#017A85] text-sm"></div>
                        <div><label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label><textarea name="description" required class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-[#017A85] text-sm" rows="3"></textarea></div>
                        <div><label class="block text-sm font-semibold text-gray-700 mb-1">Ikon (SVG HTML)</label><textarea name="icon" class="w-full font-mono px-4 py-2 border rounded-xl focus:ring-2 focus:ring-[#017A85] text-sm" rows="3"></textarea></div>
                        <div class="pt-4 flex justify-end gap-3"><button type="button" onclick="document.getElementById('modal-add-st').classList.add('hidden')" class="px-5 py-2.5 text-sm font-bold text-gray-600 bg-gray-100 rounded-xl">Batal</button><button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-[#017A85] rounded-xl">Simpan</button></div>
                    </form>
                </div>
            </div>

            <div id="modal-edit-st" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-900">Edit Langkah</h3>
                        <button type="button" onclick="document.getElementById('modal-edit-st').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 transition"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                    </div>
                    <form id="form-edit-st" method="POST" class="p-6 space-y-4">
                        @csrf @method('PUT')
                        <div><label class="block text-sm font-semibold text-gray-700 mb-1">Judul</label><input type="text" name="title" id="edit-st-title" required class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-[#017A85] text-sm"></div>
                        <div><label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label><textarea name="description" id="edit-st-desc" required class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-[#017A85] text-sm" rows="3"></textarea></div>
                        <div><label class="block text-sm font-semibold text-gray-700 mb-1">Ikon (SVG HTML)</label><textarea name="icon" id="edit-st-icon" class="w-full font-mono px-4 py-2 border rounded-xl focus:ring-2 focus:ring-[#017A85] text-sm" rows="3"></textarea></div>
                        <div class="pt-4 flex justify-end gap-3"><button type="button" onclick="document.getElementById('modal-edit-st').classList.add('hidden')" class="px-5 py-2.5 text-sm font-bold text-gray-600 bg-gray-100 rounded-xl">Batal</button><button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-[#017A85] rounded-xl">Simpan</button></div>
                    </form>
                </div>
            </div>
            
            <script>
                function editSt(id, title, desc, iconBase64) {
                    document.getElementById('form-edit-st').action = '/admin/ppdb/step/' + id;
                    document.getElementById('edit-st-title').value = title;
                    document.getElementById('edit-st-desc').value = desc;
                    document.getElementById('edit-st-icon').value = atob(iconBase64);
                    document.getElementById('modal-edit-st').classList.remove('hidden');
                }
            </script>
        @endif
    @endif
</div>
@endsection
