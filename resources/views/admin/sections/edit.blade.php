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
</div>
@endsection
