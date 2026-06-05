<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa - SMK Negeri 1 Maesan</title>
    <meta name="description" content="Formulir pendaftaran online siswa baru SMK Negeri 1 Maesan. Lengkapi data diri Anda dengan teliti sesuai dokumen resmi.">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* ── Stepper ─────────────────────────────── */
        .step-connector {
            flex: 1;
            height: 2px;
            background: #e5e7eb;
            margin: 0 4px;
            position: relative;
            top: -12px;
            transition: background 0.4s ease;
        }
        .step-connector.active { background: #015B63; }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            border: 2px solid #e5e7eb;
            background: #fff;
            color: #9ca3af;
            transition: all 0.4s ease;
        }
        .step-circle.active {
            background: #015B63;
            border-color: #015B63;
            color: #fff;
            box-shadow: 0 0 0 4px rgba(1,91,99,0.15);
        }
        .step-circle.done {
            background: #015B63;
            border-color: #015B63;
            color: #fff;
        }

        /* ── Form inputs ─────────────────────────── */
        .form-input {
            width: 100%;
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 14px;
            color: #1f2937;
            background: #fff;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .form-input:focus {
            border-color: #015B63;
            box-shadow: 0 0 0 3px rgba(1,91,99,0.1);
        }
        .form-input::placeholder { color: #9ca3af; }

        textarea.form-input { resize: vertical; min-height: 100px; }

        /* ── Radio gender ────────────────────────── */
        .radio-card {
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            padding: 10px 18px;
            cursor: pointer;
            transition: border-color 0.2s ease, background 0.2s ease;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            user-select: none;
        }
        .radio-card:hover { border-color: #015B63; }
        .radio-card input[type="radio"] { display: none; }
        .radio-dot {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid #d1d5db;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: border-color 0.2s;
            flex-shrink: 0;
        }
        .radio-card.selected { border-color: #015B63; background: #f0fafb; }
        .radio-card.selected .radio-dot {
            border-color: #015B63;
        }
        .radio-card.selected .radio-dot::after {
            content: '';
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #015B63;
            display: block;
        }

        /* ── Buttons ─────────────────────────────── */
        .btn-primary {
            background: #015B63;
            color: #fff;
            border-radius: 50px;
            padding: 12px 32px;
            font-size: 14px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.1s ease;
        }
        .btn-primary:hover { background: #01474e; }
        .btn-primary:active { transform: scale(0.98); }

        .btn-outline {
            background: #fff;
            color: #374151;
            border-radius: 50px;
            padding: 12px 28px;
            font-size: 14px;
            font-weight: 600;
            border: 1.5px solid #d1d5db;
            cursor: pointer;
            transition: border-color 0.2s ease;
        }
        .btn-outline:hover { border-color: #9ca3af; }

        .btn-draft {
            background: none;
            border: none;
            color: #015B63;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: underline;
            text-underline-offset: 3px;
        }
        .btn-draft:hover { color: #01474e; }

        /* ── File upload ─────────────────────────── */
        .file-upload-zone {
            border: 2px dashed #d1d5db;
            border-radius: 12px;
            padding: 24px;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.2s ease, background 0.2s ease;
        }
        .file-upload-zone:hover {
            border-color: #015B63;
            background: #f0fafb;
        }
        .file-upload-zone input[type="file"] { display: none; }

        /* ── Step fade animation ─────────────────── */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0);    }
        }
        .step-content { animation: fadeInUp 0.35s ease both; }

        /* ── Select ─────────────────────────────── */
        select.form-input {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 20px;
            padding-right: 40px;
        }
    </style>
</head>
<body class="bg-[#F8FAFC] antialiased text-gray-800 flex flex-col min-h-screen">

    <!-- Topbar -->
    <div class="sticky top-0 z-50 border-b border-gray-100 shadow-sm bg-white/95 backdrop-blur-sm">
        <x-topbar.navbar />
    </div>

    <!-- Main -->
    <main class="flex-1 py-10 md:py-14">
        <div class="max-w-3xl mx-auto px-4 sm:px-6">

            <!-- ═══ STEPPER ══════════════════════════════════════════ -->
            <div class="mb-10">
                <div class="flex items-start justify-between">

                    {{-- Step 1 --}}
                    <div class="flex flex-col items-center text-center min-w-[72px]">
                        <div class="step-circle {{ $step >= 1 ? ($step > 1 ? 'done' : 'active') : '' }}">
                            @if($step > 1)
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            @else
                                1
                            @endif
                        </div>
                        <span class="text-[10px] font-bold mt-2 tracking-wider uppercase {{ $step == 1 ? 'text-[#015B63]' : 'text-gray-400' }}">Data Pribadi</span>
                    </div>

                    <div class="step-connector {{ $step >= 2 ? 'active' : '' }}"></div>

                    {{-- Step 2 --}}
                    <div class="flex flex-col items-center text-center min-w-[72px]">
                        <div class="step-circle {{ $step >= 2 ? ($step > 2 ? 'done' : 'active') : '' }}">
                            @if($step > 2)
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            @else
                                2
                            @endif
                        </div>
                        <span class="text-[10px] font-bold mt-2 tracking-wider uppercase {{ $step == 2 ? 'text-[#015B63]' : 'text-gray-400' }}">Data Wali Murid</span>
                    </div>

                    <div class="step-connector {{ $step >= 3 ? 'active' : '' }}"></div>

                    {{-- Step 3 --}}
                    <div class="flex flex-col items-center text-center min-w-[72px]">
                        <div class="step-circle {{ $step >= 3 ? ($step > 3 ? 'done' : 'active') : '' }}">
                            @if($step > 3)
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            @else
                                3
                            @endif
                        </div>
                        <span class="text-[10px] font-bold mt-2 tracking-wider uppercase {{ $step == 3 ? 'text-[#015B63]' : 'text-gray-400' }}">Pilihan Jurusan</span>
                    </div>

                    <div class="step-connector {{ $step >= 4 ? 'active' : '' }}"></div>

                    {{-- Step 4 --}}
                    <div class="flex flex-col items-center text-center min-w-[72px]">
                        <div class="step-circle {{ $step >= 4 ? 'active' : '' }}">4</div>
                        <span class="text-[10px] font-bold mt-2 tracking-wider uppercase {{ $step == 4 ? 'text-[#015B63]' : 'text-gray-400' }}">Dokumen</span>
                    </div>

                </div>
            </div>

            <!-- ═══ FORM CARD ════════════════════════════════════════ -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 md:p-10 step-content">

                <!-- Alert / Flash -->
                @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3 rounded-xl flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3 rounded-xl">
                    <p class="font-semibold mb-1">Mohon perbaiki kesalahan berikut:</p>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- ── STEP 1: DATA PRIBADI ──────────────────────── -->
                @if($step == 1)
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-1">Formulir Pendaftaran Siswa</h1>
                    <p class="text-sm text-gray-500 mb-8">Lengkapi data diri Anda dengan teliti sesuai dengan dokumen resmi (Kartu Keluarga/Ijazah).</p>

                    <form action="{{ route('pendaftaran.store-step1') }}" method="POST" id="form-step1">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="nama_lengkap">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap"
                                    class="form-input" placeholder="Masukkan nama sesuai ijazah"
                                    value="{{ old('nama_lengkap') }}" required>
                                @error('nama_lengkap')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="nik">NIK (Nomor Induk Kependudukan)</label>
                                <input type="text" id="nik" name="nik"
                                    class="form-input" placeholder="16 digit NIK"
                                    value="{{ old('nik') }}" maxlength="16">
                                @error('nik')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir"
                                    class="form-input" placeholder="Kota/Kabupaten"
                                    value="{{ old('tempat_lahir') }}">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                    class="form-input"
                                    value="{{ old('tanggal_lahir') }}">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kelamin</label>
                                <div class="flex gap-3">
                                    <label class="radio-card flex-1 {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}" id="label-laki" onclick="selectGender('Laki-laki')">
                                        <input type="radio" name="jenis_kelamin" value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}>
                                        <span class="radio-dot"></span>
                                        Laki-laki
                                    </label>
                                    <label class="radio-card flex-1 {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}" id="label-perempuan" onclick="selectGender('Perempuan')">
                                        <input type="radio" name="jenis_kelamin" value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                                        <span class="radio-dot"></span>
                                        Perempuan
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="sekolah_asal">Sekolah Asal</label>
                                <input type="text" id="sekolah_asal" name="sekolah_asal"
                                    class="form-input" placeholder="SMP / MTs Asal"
                                    value="{{ old('sekolah_asal') }}">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="alamat_lengkap">Alamat Lengkap</label>
                                <textarea id="alamat_lengkap" name="alamat_lengkap"
                                    class="form-input" placeholder="Nama jalan, RT/RW, Desa, Kecamatan">{{ old('alamat_lengkap') }}</textarea>
                            </div>

                        </div>

                        <!-- Footer Buttons -->
                        <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-100">
                            <button type="button" class="btn-draft" disabled title="Tidak ada draft untuk disimpan">Simpan Draft</button>
                            <div class="flex gap-3">
                                <a href="{{ route('info.ppdb') }}" class="btn-outline">Sebelumnya</a>
                                <button type="submit" class="btn-primary" id="btn-lanjut-1">Lanjutkan →</button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif

                <!-- ── STEP 2: DATA WALI MURID ───────────────────── -->
                @if($step == 2)
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-1">Data Orang Tua / Wali</h2>
                    <p class="text-sm text-gray-500 mb-8">Isi data orang tua atau wali siswa sebagai kontak darurat dan penanggung jawab.</p>

                    <form action="{{ route('pendaftaran.store-step2') }}" method="POST">
                        @csrf
                        <input type="hidden" name="pendaftaran_id" value="{{ $pendaftaran->id }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="nama_ayah">Nama Ayah</label>
                                <input type="text" id="nama_ayah" name="nama_ayah"
                                    class="form-input" placeholder="Nama lengkap ayah"
                                    value="{{ old('nama_ayah', $pendaftaran->nama_ayah) }}">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="nama_ibu">Nama Ibu</label>
                                <input type="text" id="nama_ibu" name="nama_ibu"
                                    class="form-input" placeholder="Nama lengkap ibu"
                                    value="{{ old('nama_ibu', $pendaftaran->nama_ibu) }}">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah"
                                    class="form-input" placeholder="Misal: Petani, PNS, Wiraswasta"
                                    value="{{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah) }}">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu"
                                    class="form-input" placeholder="Misal: Ibu Rumah Tangga, Guru"
                                    value="{{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu) }}">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="no_hp_wali">No. HP Wali (WhatsApp)</label>
                                <input type="tel" id="no_hp_wali" name="no_hp_wali"
                                    class="form-input" placeholder="08xxxxxxxxxx"
                                    value="{{ old('no_hp_wali', $pendaftaran->no_hp_wali) }}">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="email_wali">Email Wali</label>
                                <input type="email" id="email_wali" name="email_wali"
                                    class="form-input" placeholder="email@contoh.com"
                                    value="{{ old('email_wali', $pendaftaran->email_wali) }}">
                            </div>

                        </div>

                        <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-100">
                            <button type="submit" formaction="{{ route('pendaftaran.save-draft') }}" class="btn-draft">Simpan Draft</button>
                            <div class="flex gap-3">
                                <a href="{{ route('pendaftaran.step2', ['id' => $pendaftaran->id]) }}" class="btn-outline">Sebelumnya</a>
                                <button type="submit" class="btn-primary">Lanjutkan →</button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif

                <!-- ── STEP 3: PILIHAN JURUSAN ───────────────────── -->
                @if($step == 3)
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-1">Pilihan Program Keahlian</h2>
                    <p class="text-sm text-gray-500 mb-8">Pilih jurusan yang sesuai dengan minat dan bakat Anda. Pilihan kedua adalah alternatif jika pilihan pertama penuh.</p>

                    <form action="{{ route('pendaftaran.store-step3') }}" method="POST">
                        @csrf
                        <input type="hidden" name="pendaftaran_id" value="{{ $pendaftaran->id }}">

                        <div class="space-y-5">

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="pilihan_jurusan_1">Pilihan Jurusan 1 <span class="text-red-500">*</span></label>
                                <select id="pilihan_jurusan_1" name="pilihan_jurusan_1" class="form-input" required>
                                    <option value="" disabled {{ old('pilihan_jurusan_1', $pendaftaran->pilihan_jurusan_1) ? '' : 'selected' }}>— Pilih Jurusan —</option>
                                    @foreach($jurusan as $j)
                                        <option value="{{ $j }}" {{ old('pilihan_jurusan_1', $pendaftaran->pilihan_jurusan_1) == $j ? 'selected' : '' }}>{{ $j }}</option>
                                    @endforeach
                                </select>
                                @error('pilihan_jurusan_1')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="pilihan_jurusan_2">Pilihan Jurusan 2 (Opsional)</label>
                                <select id="pilihan_jurusan_2" name="pilihan_jurusan_2" class="form-input">
                                    <option value="">— Tidak ada pilihan kedua —</option>
                                    @foreach($jurusan as $j)
                                        <option value="{{ $j }}" {{ old('pilihan_jurusan_2', $pendaftaran->pilihan_jurusan_2) == $j ? 'selected' : '' }}>{{ $j }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="alasan_memilih">Alasan Memilih Jurusan</label>
                                <textarea id="alasan_memilih" name="alasan_memilih"
                                    class="form-input" placeholder="Ceritakan alasan Anda memilih jurusan tersebut...">{{ old('alasan_memilih', $pendaftaran->alasan_memilih) }}</textarea>
                            </div>

                        </div>

                        <!-- Info Cards -->
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach([
                                ['icon' => '🐄', 'title' => 'Agribisnis Ternak Ruminansia', 'desc' => 'Sapi, kambing, domba & produk peternakan modern.'],
                                ['icon' => '🐓', 'title' => 'Agribisnis Ternak Unggas', 'desc' => 'Ayam, bebek, telur & manajemen peternakan unggas.'],
                                ['icon' => '💻', 'title' => 'Teknik Komputer & Jaringan', 'desc' => 'Jaringan komputer, programming & IT infrastructure.'],
                            ] as $info)
                            <div class="bg-[#F1F5F9] rounded-2xl p-4 flex gap-3">
                                <span class="text-2xl">{{ $info['icon'] }}</span>
                                <div>
                                    <p class="text-[12px] font-bold text-gray-800">{{ $info['title'] }}</p>
                                    <p class="text-[11px] text-gray-500 mt-0.5">{{ $info['desc'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-100">
                            <button type="submit" formaction="{{ route('pendaftaran.save-draft') }}" class="btn-draft">Simpan Draft</button>
                            <div class="flex gap-3">
                                <a href="{{ route('pendaftaran.step2', ['id' => $pendaftaran->id]) }}" class="btn-outline">Sebelumnya</a>
                                <button type="submit" class="btn-primary">Lanjutkan →</button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif

                <!-- ── STEP 4: DOKUMEN ───────────────────────────── -->
                @if($step == 4)
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-1">Upload Dokumen</h2>
                    <p class="text-sm text-gray-500 mb-8">Unggah dokumen pendukung pendaftaran. Format yang diterima: PDF, JPG, PNG (maks. 2MB per file).</p>

                    <form action="{{ route('pendaftaran.store-step4') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="pendaftaran_id" value="{{ $pendaftaran->id }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            @foreach([
                                ['field' => 'foto_ijazah', 'label' => 'Foto / Scan Ijazah atau SKL', 'icon' => '📄', 'existing' => $pendaftaran->foto_ijazah],
                                ['field' => 'foto_kk',     'label' => 'Kartu Keluarga (KK)',         'icon' => '🏠', 'existing' => $pendaftaran->foto_kk],
                                ['field' => 'foto_akta',   'label' => 'Akta Kelahiran',              'icon' => '📋', 'existing' => $pendaftaran->foto_akta],
                                ['field' => 'foto_pas',    'label' => 'Pas Foto 3×4 (JPG/PNG)',      'icon' => '🖼️', 'existing' => $pendaftaran->foto_pas],
                            ] as $doc)
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ $doc['label'] }}</label>
                                <label class="file-upload-zone block" for="upload_{{ $doc['field'] }}">
                                    <input type="file" id="upload_{{ $doc['field'] }}" name="{{ $doc['field'] }}"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        onchange="showFileName(this, '{{ $doc['field'] }}')">
                                    <div id="preview_{{ $doc['field'] }}">
                                        @if($doc['existing'])
                                            <div class="flex items-center justify-center gap-2 text-[#015B63]">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                <span class="text-sm font-semibold">File sudah diunggah</span>
                                            </div>
                                            <p class="text-xs text-gray-400 mt-1">Klik untuk mengganti</p>
                                        @else
                                            <span class="text-3xl block mb-2">{{ $doc['icon'] }}</span>
                                            <p class="text-sm font-semibold text-gray-700">Klik untuk memilih file</p>
                                            <p class="text-xs text-gray-400 mt-1">PDF, JPG, PNG · Maks. 2MB</p>
                                        @endif
                                    </div>
                                </label>
                                @error($doc['field'])<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>
                            @endforeach

                        </div>

                        <!-- Terms notice -->
                        <div class="mt-6 bg-amber-50 border border-amber-200 rounded-xl px-4 py-3 flex gap-3">
                            <svg class="w-5 h-5 text-amber-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <p class="text-xs text-amber-700">Pastikan dokumen yang diunggah jelas, tidak buram, dan sesuai dengan aslinya. Dokumen palsu akan menyebabkan pembatalan pendaftaran.</p>
                        </div>

                        <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-100">
                            <button type="submit" formaction="{{ route('pendaftaran.save-draft') }}" class="btn-draft">Simpan Draft</button>
                            <div class="flex gap-3">
                                <a href="{{ route('pendaftaran.step3', ['id' => $pendaftaran->id]) }}" class="btn-outline">Sebelumnya</a>
                                <button type="submit" class="btn-primary">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        Kirim Pendaftaran
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif

            </div>
            <!-- end card -->

            <!-- Progress label -->
            <p class="text-center text-xs text-gray-400 mt-4">Langkah {{ $step }} dari 4</p>

        </div>
    </main>

    <x-footer />

    <script>
        // ── Gender radio card ─────────────────────────
        function selectGender(value) {
            document.querySelectorAll('.radio-card').forEach(el => el.classList.remove('selected'));
            const labels = { 'Laki-laki': 'label-laki', 'Perempuan': 'label-perempuan' };
            const target = document.getElementById(labels[value]);
            if (target) {
                target.classList.add('selected');
                target.querySelector('input[type="radio"]').checked = true;
            }
        }

        // ── File upload preview ───────────────────────
        function showFileName(input, field) {
            const preview = document.getElementById('preview_' + field);
            if (!preview) return;
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const sizeMB = (file.size / 1024 / 1024).toFixed(2);
                preview.innerHTML = `
                    <div class="flex items-center justify-center gap-2 text-[#015B63]">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="text-sm font-semibold truncate max-w-[160px]">${file.name}</span>
                    </div>
                    <p class="text-xs text-gray-400 mt-1">${sizeMB} MB · Klik untuk mengganti</p>
                `;
            }
        }

        // ── NIK: hanya angka ──────────────────────────
        const nikInput = document.getElementById('nik');
        if (nikInput) {
            nikInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 16);
            });
        }
    </script>

</body>
</html>
