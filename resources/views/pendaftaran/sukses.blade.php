<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil - SMK Negeri 1 Maesan</title>
    <meta name="description" content="Pendaftaran siswa baru berhasil dikirimkan.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.85); }
            to   { opacity: 1; transform: scale(1); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .anim-scale  { animation: scaleIn  0.5s cubic-bezier(.34,1.56,.64,1) both; }
        .anim-fadein { animation: fadeInUp 0.5s ease 0.25s both; }

        .checkmark-circle {
            width: 80px; height: 80px;
            border-radius: 50%;
            background: #015B63;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 24px;
            box-shadow: 0 0 0 12px rgba(1,91,99,0.12);
        }
    </style>
</head>
<body class="bg-[#F8FAFC] antialiased text-gray-800 flex flex-col min-h-screen">

    <div class="sticky top-0 z-50 border-b border-gray-100 shadow-sm bg-white/95 backdrop-blur-sm">
        <x-topbar.navbar />
    </div>

    <main class="flex-1 flex items-center justify-center py-16 px-4">
        <div class="max-w-md w-full">

            <!-- Success Card -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-10 text-center anim-scale">
                
                <!-- Check icon -->
                <div class="checkmark-circle">
                    <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <h1 class="text-2xl font-bold text-gray-900 mb-2">Terima Kasih! 🎉</h1>
                <p class="text-gray-500 text-sm mb-8 leading-relaxed">
                    Data pendataan awal atas nama <strong class="text-gray-800">{{ $pendaftaran->nama ?? 'Siswa' }}</strong>
                    telah berhasil kami terima. Terima kasih atas antusiasme Anda untuk bergabung dengan SMK Negeri 1 Maesan!
                </p>

                <!-- Button -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('info.ppdb') }}" class="flex-1 bg-[#015B63] text-white font-bold text-sm rounded-full py-3 px-6 hover:bg-[#01474e] transition flex items-center justify-center gap-2">
                        Kembali ke Info PPDB
                    </a>
                </div>

            </div>

        </div>
    </main>

    <x-footer />

</body>
</html>
