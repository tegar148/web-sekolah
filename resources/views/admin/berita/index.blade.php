@extends('admin.layouts.app')

@section('title', 'Berita & Informasi')
@section('breadcrumb', 'Berita Manager')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Berita & Informasi</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola publikasi artikel dan informasi sekolah.</p>
    </div>
</div>

<!-- Upload Form Card -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 mb-8">
    <h3 class="font-bold text-gray-900 mb-6 flex items-center gap-2">
        <svg class="w-5 h-5 text-[#017A85]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Berita Baru
    </h3>

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" id="berita-form">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <div class="col-span-2">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">JUDUL BERITA <span class="text-red-500">*</span></label>
                <input type="text" name="title" required placeholder="Judul artikel..." class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">KATEGORI <span class="text-red-500">*</span></label>
                <input type="text" name="category" required placeholder="Contoh: ACADEMIC" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">TANGGAL PUBLIKASI <span class="text-red-500">*</span></label>
                <input type="date" name="published_at" required value="{{ date('Y-m-d') }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>

            {{-- FOTO COVER --}}
            <div class="col-span-1 lg:col-span-4">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">FOTO COVER <span class="text-red-500">*</span></label>
                
                {{-- Toggle: Upload File vs Link URL --}}
                <div class="flex items-center gap-2 mb-3">
                    <button type="button" onclick="toggleImageMode('upload')" id="btn-mode-upload"
                        class="image-mode-btn text-[11px] font-bold px-4 py-2 rounded-xl border-2 transition-all duration-200 flex items-center gap-2 bg-[#017A85] text-white border-[#017A85]">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                        Upload File
                    </button>
                    <button type="button" onclick="toggleImageMode('url')" id="btn-mode-url"
                        class="image-mode-btn text-[11px] font-bold px-4 py-2 rounded-xl border-2 transition-all duration-200 flex items-center gap-2 bg-white text-gray-500 border-gray-200 hover:border-gray-300">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                        Link URL Eksternal
                    </button>
                </div>

                {{-- Input: Upload File --}}
                <div id="input-upload" class="">
                    <input type="file" name="image" accept="image/*" id="image-file-input" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#017A85] file:text-white hover:file:bg-[#01656e] transition">
                    <div class="flex items-center gap-2 mt-2">
                        <span class="inline-flex items-center gap-1 bg-teal-50 text-teal-700 text-[10px] font-bold px-2.5 py-1 rounded-lg border border-teal-100">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            AUTO COMPRESS
                        </span>
                        <p class="text-[10px] text-gray-400">Format: JPG, PNG, WEBP, GIF. Maks 50MB. Otomatis dikompresi ke WebP (maks 1200px, kualitas 75%).</p>
                    </div>
                </div>

                {{-- Input: URL Eksternal --}}
                <div id="input-url" class="hidden space-y-3">
                    <div>
                        <label class="block text-[10px] font-bold text-blue-500 uppercase tracking-widest mb-1.5">LINK TUJUAN (SUMBER BERITA) <span class="text-red-500">*</span></label>
                        <input type="url" name="external_url" id="external-url-input" placeholder="https://youtube.com/watch?v=... atau https://instagram.com/p/..."
                            class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                        <p class="text-[10px] text-gray-400 mt-1">URL halaman sumber (YouTube, Instagram, dll). Klik berita akan langsung mengarah ke link ini.</p>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-blue-500 uppercase tracking-widest mb-1.5">URL GAMBAR COVER</label>
                        <input type="url" name="image_url" id="image-url-input" placeholder="https://img.youtube.com/vi/.../maxresdefault.jpg"
                            class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                            oninput="previewExternalImage(this.value)">
                        <p class="text-[10px] text-gray-400 mt-1">Opsional. URL gambar thumbnail/cover dari sumber eksternal.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1 bg-blue-50 text-blue-700 text-[10px] font-bold px-2.5 py-1 rounded-lg border border-blue-100">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101"/></svg>
                            EXTERNAL LINK
                        </span>
                        <p class="text-[10px] text-gray-400">Ringkasan & konten tidak diperlukan untuk mode ini.</p>
                    </div>
                    {{-- Preview --}}
                    <div id="url-preview" class="hidden rounded-xl overflow-hidden border border-gray-200 bg-gray-50 max-w-xs">
                        <img id="url-preview-img" src="" alt="Preview" class="w-full h-40 object-cover">
                        <p class="text-[10px] text-gray-400 px-3 py-2 text-center">Preview gambar</p>
                    </div>
                </div>
            </div>

            {{-- EXCERPT & CONTENT (hidden saat link mode) --}}
            <div class="col-span-1 lg:col-span-4" id="section-excerpt">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">RINGKASAN (EXCERPT) <span class="text-red-500">*</span></label>
                <textarea name="excerpt" rows="2" id="input-excerpt" required placeholder="Tulis ringkasan singkat..." class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition"></textarea>
            </div>
            <div class="col-span-1 lg:col-span-4" id="section-content">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">KONTEN LENGKAP <span class="text-red-500">*</span></label>
                <textarea name="content" rows="6" id="input-content" required placeholder="Tulis isi berita..." class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition"></textarea>
            </div>
        </div>
        <button type="submit" class="mt-2 bg-[#017A85] hover:bg-[#01656e] text-white font-bold text-xs px-6 py-3 rounded-xl transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Simpan Berita
        </button>
    </form>
</div>

<!-- List Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($beritas as $item)
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden group hover:shadow-md transition relative flex flex-col">
        <div class="h-48 bg-gray-100 relative overflow-hidden shrink-0">
            @if($item->image_src)
            <img src="{{ $item->image_src }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" referrerpolicy="no-referrer">
            @endif
            <div class="absolute top-3 left-3 bg-[#111827] text-white text-[9px] font-bold tracking-widest uppercase px-3 py-1 rounded shadow">{{ $item->category }}</div>
            @if($item->is_external)
            <div class="absolute top-3 right-3 bg-blue-600 text-white text-[8px] font-bold tracking-wider uppercase px-2.5 py-1 rounded shadow flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                LINK
            </div>
            @endif
            
            <!-- Overlay Actions -->
            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-3">
                <a href="{{ route('admin.berita.edit', $item) }}" class="w-10 h-10 bg-blue-500 hover:bg-blue-600 text-white rounded-xl flex items-center justify-center transition" title="Edit Berita">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </a>
                <form action="{{ route('admin.berita.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-10 h-10 bg-red-500 hover:bg-red-600 text-white rounded-xl flex items-center justify-center transition" title="Hapus Berita">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </form>
            </div>
        </div>
        <div class="p-6 flex-1 flex flex-col">
            <p class="text-[10px] text-gray-400 mb-2 uppercase tracking-widest font-semibold flex items-center gap-2">
                <span class="w-3 h-[1px] bg-gray-300 block"></span> {{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}
            </p>
            <h3 class="text-base font-bold text-gray-900 mb-3 leading-snug line-clamp-2">{{ $item->title }}</h3>
            @if($item->is_external)
                <p class="text-[11px] text-blue-500 font-medium truncate flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    {{ $item->external_url }}
                </p>
            @else
                <p class="text-sm text-gray-500 line-clamp-3">{{ $item->excerpt }}</p>
            @endif
        </div>
    </div>
    @empty
    <div class="col-span-full bg-white rounded-2xl border border-gray-100 p-12 text-center">
        <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
        <p class="text-gray-500 text-sm">Belum ada berita yang dipublikasikan.</p>
    </div>
    @endforelse
</div>

<!-- Pagination -->
@if($beritas->hasPages())
<div class="mt-8">
    {{ $beritas->links() }}
</div>
@endif

<script>
function toggleImageMode(mode) {
    const uploadDiv = document.getElementById('input-upload');
    const urlDiv = document.getElementById('input-url');
    const btnUpload = document.getElementById('btn-mode-upload');
    const btnUrl = document.getElementById('btn-mode-url');
    const fileInput = document.getElementById('image-file-input');
    const urlInput = document.getElementById('image-url-input');
    const externalInput = document.getElementById('external-url-input');
    const sectionExcerpt = document.getElementById('section-excerpt');
    const sectionContent = document.getElementById('section-content');
    const inputExcerpt = document.getElementById('input-excerpt');
    const inputContent = document.getElementById('input-content');

    const activeClass = 'image-mode-btn text-[11px] font-bold px-4 py-2 rounded-xl border-2 transition-all duration-200 flex items-center gap-2 bg-[#017A85] text-white border-[#017A85]';
    const inactiveClass = 'image-mode-btn text-[11px] font-bold px-4 py-2 rounded-xl border-2 transition-all duration-200 flex items-center gap-2 bg-white text-gray-500 border-gray-200 hover:border-gray-300';

    if (mode === 'url') {
        uploadDiv.classList.add('hidden');
        urlDiv.classList.remove('hidden');
        fileInput.value = '';
        // Hide excerpt & content
        sectionExcerpt.classList.add('hidden');
        sectionContent.classList.add('hidden');
        inputExcerpt.removeAttribute('required');
        inputContent.removeAttribute('required');
        inputExcerpt.value = '';
        inputContent.value = '';
        btnUpload.className = inactiveClass;
        btnUrl.className = activeClass;
    } else {
        uploadDiv.classList.remove('hidden');
        urlDiv.classList.add('hidden');
        urlInput.value = '';
        externalInput.value = '';
        document.getElementById('url-preview').classList.add('hidden');
        // Show excerpt & content
        sectionExcerpt.classList.remove('hidden');
        sectionContent.classList.remove('hidden');
        inputExcerpt.setAttribute('required', '');
        inputContent.setAttribute('required', '');
        btnUpload.className = activeClass;
        btnUrl.className = inactiveClass;
    }
}

function previewExternalImage(url) {
    const preview = document.getElementById('url-preview');
    const img = document.getElementById('url-preview-img');

    if (!url || url.length < 10) {
        preview.classList.add('hidden');
        return;
    }

    img.src = url;
    img.onload = function() { preview.classList.remove('hidden'); };
    img.onerror = function() { preview.classList.add('hidden'); };
}

document.addEventListener('DOMContentLoaded', function() {
    const externalInput = document.getElementById('external-url-input');
    const imgInput = document.getElementById('image-url-input');
    let timeout = null;

    if (externalInput) {
        externalInput.addEventListener('input', function(e) {
            const url = e.target.value;
            if (!url || url.length < 10) return;

            clearTimeout(timeout);
            timeout = setTimeout(() => {
                fetch(`/admin/berita/fetch-meta?url=${encodeURIComponent(url)}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.image_url) {
                            imgInput.value = data.image_url;
                            previewExternalImage(data.image_url);
                        }
                    })
                    .catch(err => console.error(err));
            }, 500); // debounce 500ms
        });
    }
});
</script>
@endsection
