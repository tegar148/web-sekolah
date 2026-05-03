<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->title }} - SMK Negeri 1 Maesan</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; display: flex; flex-direction: column; min-height: 100vh;}
        main { flex: 1; }
        .prose p { margin-bottom: 1.5em; line-height: 1.8; color: #4B5563; }
        .prose h2 { font-size: 1.5rem; font-weight: 700; color: #111827; margin-top: 2em; margin-bottom: 1em; }
        .prose h3 { font-size: 1.25rem; font-weight: 700; color: #111827; margin-top: 1.5em; margin-bottom: 0.75em; }
        .prose ul { list-style-type: disc; padding-left: 1.5em; margin-bottom: 1.5em; color: #4B5563; }
        .prose ol { list-style-type: decimal; padding-left: 1.5em; margin-bottom: 1.5em; color: #4B5563; }
        .prose blockquote { border-left: 4px solid #017A85; padding-left: 1em; font-style: italic; color: #6B7280; margin-bottom: 1.5em; }
    </style>
</head>
<body class="bg-[#F8FAFC] antialiased text-gray-800">
    
    <!-- Topbar Component -->
    <div class="sticky top-0 z-50 border-b border-gray-100 shadow-sm bg-white/95 backdrop-blur-sm">
        <x-topbar.navbar />
    </div>

    <!-- Article Header -->
    <header class="bg-white border-b border-gray-100 pt-16 pb-12 md:pt-24 md:pb-16">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <span class="text-[#017A85] text-[11px] font-bold px-3 py-1 bg-teal-50 border border-teal-100 rounded-full uppercase tracking-widest mb-6 inline-block">
                {{ $berita->category }}
            </span>
            <h1 class="text-3xl md:text-5xl font-bold mb-6 text-gray-900 leading-tight tracking-tight">{{ $berita->title }}</h1>
            <p class="text-gray-500 text-sm font-medium uppercase tracking-widest flex items-center justify-center gap-3">
                <span>{{ \Carbon\Carbon::parse($berita->published_at)->format('d F Y') }}</span>
                <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                <span>SMKN 1 MAESAN</span>
            </p>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="w-full bg-white pb-20 md:pb-32">
        <div class="max-w-4xl mx-auto px-6 -mt-8 relative z-10">
            @if($berita->image_path)
            <div class="w-full aspect-video rounded-2xl overflow-hidden shadow-xl mb-12 bg-gray-100">
                <img src="{{ Storage::url($berita->image_path) }}" alt="{{ $berita->title }}" class="w-full h-full object-cover">
            </div>
            @endif

            <div class="prose max-w-none text-lg">
                {!! nl2br(e($berita->content)) !!}
            </div>

            <!-- Back to News -->
            <div class="mt-16 pt-8 border-t border-gray-100 text-center">
                <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 text-sm font-bold text-gray-600 hover:text-[#017A85] transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar Berita
                </a>
            </div>
        </div>
    </main>

    <x-footer />

</body>
</html>
