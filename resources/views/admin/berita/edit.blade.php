@extends('admin.layouts.app')

@section('title', 'Edit Berita')
@section('breadcrumb', 'Edit Berita')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Edit Berita</h1>
        <p class="text-sm text-gray-500 mt-1">Perbarui informasi artikel atau berita.</p>
    </div>
    <a href="{{ route('admin.berita.index') }}" class="text-sm font-bold text-[#017A85] hover:text-[#01656e] flex items-center gap-2">
        &larr; Kembali
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 mb-8">
    <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <div class="col-span-2">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">JUDUL BERITA <span class="text-red-500">*</span></label>
                <input type="text" name="title" required value="{{ old('title', $berita->title) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">KATEGORI <span class="text-red-500">*</span></label>
                <input type="text" name="category" required value="{{ old('category', $berita->category) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">TANGGAL PUBLIKASI <span class="text-red-500">*</span></label>
                <input type="date" name="published_at" required value="{{ old('published_at', \Carbon\Carbon::parse($berita->published_at)->format('Y-m-d')) }}" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">
            </div>
            <div class="col-span-1 lg:col-span-4">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">FOTO COVER</label>
                
                {{-- Gambar saat ini --}}
                @if($berita->image_src)
                    <div class="mb-3 flex items-start gap-4">
                        <img src="{{ $berita->image_src }}" alt="{{ $berita->title }}" class="h-32 object-cover rounded-lg border border-gray-200 shadow-sm" referrerpolicy="no-referrer">
                        <div class="pt-1">
                            @if($berita->is_external)
                                <span class="inline-flex items-center gap-1 bg-blue-50 text-blue-700 text-[10px] font-bold px-2.5 py-1 rounded-lg border border-blue-100 mb-1">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    Mode: Link Eksternal
                                </span>
                                <p class="text-[10px] text-gray-400 mt-1 max-w-md break-all">{{ $berita->external_url }}</p>
                            @else
                                <span class="inline-flex items-center gap-1 bg-teal-50 text-teal-700 text-[10px] font-bold px-2.5 py-1 rounded-lg border border-teal-100">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                    Mode: File Lokal
                                </span>
                            @endif
                            <p class="text-xs text-gray-400 mt-1">Kosongkan semua input di bawah jika tidak ingin mengubah gambar.</p>
                        </div>
                    </div>
                @endif

                {{-- Toggle: Upload File vs Link URL --}}
                <div class="flex items-center gap-2 mb-3">
                    <button type="button" onclick="toggleImageMode('upload')" id="btn-mode-upload"
                        class="image-mode-btn text-[11px] font-bold px-4 py-2 rounded-xl border-2 transition-all duration-200 flex items-center gap-2 {{ $berita->is_external ? 'bg-white text-gray-500 border-gray-200' : 'bg-[#017A85] text-white border-[#017A85]' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                        Upload File
                    </button>
                    <button type="button" onclick="toggleImageMode('url')" id="btn-mode-url"
                        class="image-mode-btn text-[11px] font-bold px-4 py-2 rounded-xl border-2 transition-all duration-200 flex items-center gap-2 {{ $berita->is_external ? 'bg-[#017A85] text-white border-[#017A85]' : 'bg-white text-gray-500 border-gray-200' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                        Link URL Eksternal
                    </button>
                </div>

                {{-- Input: Upload File --}}
                <div id="input-upload" class="{{ $berita->is_external ? 'hidden' : '' }}">
                    <input type="file" name="image" accept="image/*" id="image-file-input" class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#017A85] file:text-white hover:file:bg-[#01656e] transition">
                </div>

                {{-- Input: URL Eksternal --}}
                <div id="input-url" class="{{ $berita->is_external ? '' : 'hidden' }} space-y-3">
                    <div>
                        <label class="block text-[10px] font-bold text-blue-500 uppercase tracking-widest mb-1.5">LINK TUJUAN (SUMBER BERITA) <span class="text-red-500">*</span></label>
                        <input type="url" name="external_url" id="external-url-input" value="{{ old('external_url', $berita->external_url) }}" placeholder="https://youtube.com/watch?v=... atau https://instagram.com/p/..."
                            class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                        <p class="text-[10px] text-gray-400 mt-1">URL halaman sumber. Klik berita akan langsung mengarah ke link ini.</p>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-blue-500 uppercase tracking-widest mb-1.5">URL GAMBAR COVER</label>
                        <input type="url" name="image_url" id="image-url-input" value="{{ old('image_url', $berita->image_url) }}" placeholder="https://img.youtube.com/vi/.../maxresdefault.jpg"
                            class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                            oninput="previewExternalImage(this.value)">
                    </div>
                    <div id="url-preview" class="{{ $berita->image_url ? '' : 'hidden' }} rounded-xl overflow-hidden border border-gray-200 bg-gray-50 max-w-xs">
                        <img id="url-preview-img" src="{{ $berita->image_url }}" alt="Preview" class="w-full h-40 object-cover">
                        <p class="text-[10px] text-gray-400 px-3 py-2 text-center">Preview gambar</p>
                    </div>
                </div>
            </div>

            {{-- EXCERPT & CONTENT (hidden saat link mode) --}}
            <div class="col-span-1 lg:col-span-4 {{ $berita->is_external ? 'hidden' : '' }}" id="section-excerpt">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">RINGKASAN (EXCERPT) <span class="text-red-500">*</span></label>
                <textarea name="excerpt" rows="2" id="input-excerpt" {{ $berita->is_external ? '' : 'required' }} class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">{{ old('excerpt', $berita->excerpt) }}</textarea>
            </div>
            <div class="col-span-1 lg:col-span-4 {{ $berita->is_external ? 'hidden' : '' }}" id="section-content">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">KONTEN LENGKAP <span class="text-red-500">*</span></label>
                <textarea name="content" rows="6" id="input-content" {{ $berita->is_external ? '' : 'required' }} class="w-full bg-[#F8FAFC] border border-gray-200 text-gray-800 text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#017A85]/20 focus:border-[#017A85] transition">{{ old('content', $berita->content) }}</textarea>
            </div>
        </div>
        <button type="submit" class="mt-2 bg-[#017A85] hover:bg-[#01656e] text-white font-bold text-xs px-6 py-3 rounded-xl transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Perbarui Berita
        </button>
    </form>
</div>

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
        sectionExcerpt.classList.add('hidden');
        sectionContent.classList.add('hidden');
        inputExcerpt.removeAttribute('required');
        inputContent.removeAttribute('required');
        btnUpload.className = inactiveClass;
        btnUrl.className = activeClass;
    } else {
        uploadDiv.classList.remove('hidden');
        urlDiv.classList.add('hidden');
        urlInput.value = '';
        externalInput.value = '';
        document.getElementById('url-preview').classList.add('hidden');
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
