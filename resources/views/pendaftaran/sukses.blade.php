<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil - SMK Negeri 1 Maesan</title>
    <meta name="description" content="Pendaftaran siswa baru berhasil dikirimkan. Simpan kode pendaftaran Anda.">
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

        .kode-box {
            background: #F1F5F9;
            border: 2px dashed #015B63;
            border-radius: 14px;
            padding: 16px 24px;
            text-align: center;
            letter-spacing: 0.15em;
            font-size: 22px;
            font-weight: 800;
            color: #015B63;
        }

        /* ── Elemen yang hanya muncul saat cetak ── */
        .print-only { display: none; }

        /* ══════════════════════════════════════════
           PRINT STYLES — hanya kartu bukti yang tercetak
        ══════════════════════════════════════════ */
        @media print {
            /* Sembunyikan elemen yang tidak perlu */
            .no-print               { display: none !important; }

            /* Reset body & layout */
            body                    { background: #fff !important; }
            main                    { display: block !important; padding: 0 !important; align-items: unset !important; justify-content: unset !important; }
            #print-wrapper          { display: block !important; }

            /* Style kartu saat cetak */
            #print-area             {
                box-shadow: none !important;
                border: 1.5px solid #d1d5db !important;
                border-radius: 16px !important;
                padding: 32px !important;
                max-width: 480px !important;
                margin: 24px auto !important;
                animation: none !important;
            }

            /* Tampilkan elemen print-only */
            .print-only             { display: block !important; }

            /* Pastikan warna latar & teks tercetak */
            * { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        }
    </style>
</head>
<body class="bg-[#F8FAFC] antialiased text-gray-800 flex flex-col min-h-screen">

    <div class="sticky top-0 z-50 border-b border-gray-100 shadow-sm bg-white/95 backdrop-blur-sm no-print">
        <x-topbar.navbar />
    </div>

    {{-- Div ini yang dicetak --}}
    <div id="print-wrapper">
    <main class="flex-1 flex items-center justify-center py-16 px-4">
        <div class="max-w-lg w-full">

            <!-- Success Card -->
            <div id="print-area" class="bg-white rounded-3xl shadow-sm border border-gray-100 p-10 text-center anim-scale">

                <!-- Header sekolah — hanya tampil saat cetak -->
                <div class="print-only mb-6 pb-4" style="border-bottom: 2px solid #015B63;">
                    <p style="font-size:11px; font-weight:800; color:#015B63; letter-spacing:.1em; text-transform:uppercase; margin-bottom:2px;">SMK NEGERI 1 MAESAN</p>
                    <p style="font-size:9px; color:#6b7280;">Bukti Pendaftaran PPDB Online · Dicetak: {{ now()->format('d/m/Y H:i') }} WIB</p>
                </div>
                
                <!-- Check icon -->
                <div class="checkmark-circle">
                    <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <h1 class="text-2xl font-bold text-gray-900 mb-2">Pendaftaran Terkirim! 🎉</h1>
                <p class="text-gray-500 text-sm mb-8 leading-relaxed">
                    Formulir pendaftaran Anda atas nama <strong class="text-gray-800">{{ $pendaftaran->nama_lengkap }}</strong>
                    telah berhasil dikirimkan. Tim panitia PPDB akan segera memverifikasi data Anda.
                </p>

                <!-- Kode Pendaftaran -->
                <div class="mb-8">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Kode Pendaftaran Anda</p>
                    <div class="kode-box" id="kode-pendaftaran">{{ $pendaftaran->kode_pendaftaran }}</div>
                    <p class="text-xs text-gray-400 mt-2">Simpan kode ini untuk memantau status pendaftaran Anda.</p>
                </div>

                <!-- Info Steps -->
                <div class="bg-[#F1F5F9] rounded-2xl p-5 text-left mb-8">
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">Langkah Selanjutnya</p>
                    <div class="space-y-3">
                        @foreach([
                            ['icon' => '📧', 'text' => 'Pantau email atau WhatsApp wali untuk informasi lebih lanjut.'],
                            ['icon' => '✅', 'text' => 'Verifikasi dokumen oleh panitia membutuhkan 1-3 hari kerja.'],
                            ['icon' => '📅', 'text' => 'Pengumuman hasil seleksi akan diumumkan sesuai jadwal PPDB.'],
                        ] as $item)
                        <div class="flex gap-3 items-start">
                            <span class="text-lg">{{ $item['icon'] }}</span>
                            <p class="text-xs text-gray-600 leading-relaxed">{{ $item['text'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Buttons — disembunyikan saat cetak -->
                <div class="flex flex-col sm:flex-row gap-3 no-print">
                    <button onclick="window.print()" class="flex-1 bg-white border border-gray-200 text-gray-700 font-semibold text-sm rounded-full py-3 px-6 hover:bg-gray-50 transition flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                        Cetak Bukti
                    </button>
                    <a href="{{ route('info.ppdb') }}" class="flex-1 bg-[#015B63] text-white font-bold text-sm rounded-full py-3 px-6 hover:bg-[#01474e] transition flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Kembali ke PPDB
                    </a>
                </div>

            </div>

            <!-- Submitted at info -->
            <p class="text-center text-xs text-gray-400 mt-4 no-print">
                Dikirim pada: {{ $pendaftaran->submitted_at?->format('d F Y, H:i') ?? now()->format('d F Y, H:i') }} WIB
            </p>

        </div>
    </main>
    </div>{{-- end #print-wrapper --}}

    <x-footer class="no-print" />

</body>
</html>
