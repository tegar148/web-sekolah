<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pra-PPDB - SMK Negeri 1 Maesan</title>
    <meta name="description" content="Formulir pendataan awal (Pra-PPDB) calon siswa baru SMK Negeri 1 Maesan.">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

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
        <div class="max-w-2xl mx-auto px-4 sm:px-6">

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

                <div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-1">Formulir Pra-PPDB</h1>
                    <p class="text-sm text-gray-500 mb-8">Lengkapi data pendataan awal (Pra-PPDB) Anda di bawah ini.</p>

                    <form action="{{ route('pendaftaran.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="nama">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" id="nama" name="nama"
                                    class="form-input" placeholder="Masukkan nama"
                                    value="{{ old('nama') }}" required>
                                @error('nama')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
                                <div class="flex gap-3">
                                    <label class="radio-card flex-1 {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}" id="label-laki" onclick="selectGender('Laki-laki')">
                                        <input type="radio" name="jenis_kelamin" value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }} required>
                                        <span class="radio-dot"></span>
                                        Laki-laki
                                    </label>
                                    <label class="radio-card flex-1 {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}" id="label-perempuan" onclick="selectGender('Perempuan')">
                                        <input type="radio" name="jenis_kelamin" value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }} required>
                                        <span class="radio-dot"></span>
                                        Perempuan
                                    </label>
                                </div>
                                @error('jenis_kelamin')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="sekolah_asal">Sekolah Asal <span class="text-red-500">*</span></label>
                                <input type="text" id="sekolah_asal" name="sekolah_asal"
                                    class="form-input" placeholder="Contoh: SMP Negeri 1 Maesan"
                                    value="{{ old('sekolah_asal') }}" required>
                                @error('sekolah_asal')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="kota_kabupaten">Kota / Kabupaten</label>
                                <input type="text" id="kota_kabupaten" name="kota_kabupaten"
                                    class="form-input" placeholder="Contoh: Bondowoso"
                                    value="{{ old('kota_kabupaten') }}">
                                @error('kota_kabupaten')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="kelurahan_desa">Kecamatan</label>
                                <input type="text" id="kelurahan_desa" name="kelurahan_desa"
                                    class="form-input" placeholder="Contoh: Maesan"
                                    value="{{ old('kelurahan_desa') }}">
                                @error('kelurahan_desa')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="alamat_lengkap">Alamat Lengkap</label>
                                <textarea id="alamat_lengkap" name="alamat_lengkap"
                                    class="form-input" rows="3"
                                    placeholder="Contoh: Jl. Raya Maesan No. 10, RT 001/RW 002">{{ old('alamat_lengkap') }}</textarea>
                                @error('alamat_lengkap')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="minat_jurusan">Minat Jurusan <span class="text-red-500">*</span></label>
                                <select id="minat_jurusan" name="minat_jurusan" class="form-input" required>
                                    <option value="" disabled {{ old('minat_jurusan') ? '' : 'selected' }}>— Pilih Jurusan —</option>
                                    @foreach($jurusan as $j)
                                        <option value="{{ $j }}" {{ old('minat_jurusan') == $j ? 'selected' : '' }}>{{ $j }}</option>
                                    @endforeach
                                </select>
                                @error('minat_jurusan')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                            </div>

                        </div>

                        <!-- Footer Buttons -->
                        <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-100">
                            <a href="{{ route('info.ppdb') }}" class="btn-outline">Kembali</a>
                            <button type="submit" class="btn-primary">Kirim Formulir Pra-PPDB</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- end card -->

        </div>
    </main>

    <x-footer />

    <script>
        function selectGender(value) {
            document.querySelectorAll('.radio-card').forEach(el => el.classList.remove('selected'));
            const labels = { 'Laki-laki': 'label-laki', 'Perempuan': 'label-perempuan' };
            const target = document.getElementById(labels[value]);
            if (target) {
                target.classList.add('selected');
                target.querySelector('input[type="radio"]').checked = true;
            }
        }
    </script>

</body>
</html>
