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

            <!-- Content (Textarea) -->
            @if($show['content'])
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">KONTEN UTAMA</label>
                @if($contentHint)
                    <p class="text-xs text-gray-500 mb-3">{{ $contentHint }}</p>
                @endif
                <textarea name="content" rows="6" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition resize-y" placeholder="Tulis konten lengkap section...">{{ old('content', $section->content) }}</textarea>
            </div>
            @endif

            @if(count($contentSchema))
            <div class="overflow-hidden rounded-xl border border-gray-200">
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

            <!-- Image Upload -->
            @if($show['image'])
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
                <p class="text-[10px] text-gray-400 mt-2">Format: JPG, PNG, WEBP. Maks 5MB.</p>
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
