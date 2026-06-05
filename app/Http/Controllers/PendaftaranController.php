<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    protected array $jurusan = [
        'Agribisnis Ternak Ruminansia',
        'Agribisnis Ternak Unggas',
        'Teknik Komputer dan Jaringan',
    ];

    // ---------------------------------------------------------------
    // Step 1: Tampilkan form awal
    // ---------------------------------------------------------------
    public function create(Request $request)
    {
        $pendaftaran = null;
        if ($request->has('id')) {
            $pendaftaran = PendaftaranSiswa::find($request->id);
        }

        return view('pendaftaran.index', [
            'step'        => 1,
            'pendaftaran' => $pendaftaran,
            'jurusan'     => $this->jurusan,
        ]);
    }

    // ---------------------------------------------------------------
    // Step 1: Simpan data pribadi → buat record draft
    // ---------------------------------------------------------------
    public function storeStep1(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap'  => 'required|string|max:200',
            'nik'           => 'required|digits:16',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'sekolah_asal'  => 'required|string|max:200',
            'alamat_lengkap'=> 'required|string|max:500',
        ]);

        if ($request->has('pendaftaran_id') && $request->pendaftaran_id) {
            $pendaftaran = PendaftaranSiswa::findOrFail($request->pendaftaran_id);
            $data['step_terakhir'] = max($pendaftaran->step_terakhir, 1);
            $pendaftaran->update($data);
        } else {
            $data['status']       = 'draft';
            $data['step_terakhir']= 1;
            $data['kode_pendaftaran'] = PendaftaranSiswa::generateKode();
            $pendaftaran = PendaftaranSiswa::create($data);
        }

        return redirect()->route('pendaftaran.step2', ['id' => $pendaftaran->id]);
    }

    // ---------------------------------------------------------------
    // Step 2: Form data wali
    // ---------------------------------------------------------------
    public function step2(Request $request)
    {
        $pendaftaran = PendaftaranSiswa::findOrFail($request->id);
        return view('pendaftaran.index', [
            'step'         => 2,
            'pendaftaran'  => $pendaftaran,
            'jurusan'      => $this->jurusan,
        ]);
    }

    public function storeStep2(Request $request)
    {
        $pendaftaran = PendaftaranSiswa::findOrFail($request->pendaftaran_id);

        $data = $request->validate([
            'nama_ayah'      => 'required|string|max:200',
            'nama_ibu'       => 'required|string|max:200',
            'pekerjaan_ayah' => 'required|string|max:100',
            'pekerjaan_ibu'  => 'required|string|max:100',
            'no_hp_wali'     => 'required|string|max:20',
            'email_wali'     => 'required|email|max:100',
        ]);

        $data['step_terakhir'] = 2;
        $pendaftaran->update($data);

        return redirect()->route('pendaftaran.step3', ['id' => $pendaftaran->id]);
    }

    // ---------------------------------------------------------------
    // Step 3: Form pilihan jurusan
    // ---------------------------------------------------------------
    public function step3(Request $request)
    {
        $pendaftaran = PendaftaranSiswa::findOrFail($request->id);
        return view('pendaftaran.index', [
            'step'        => 3,
            'pendaftaran' => $pendaftaran,
            'jurusan'     => $this->jurusan,
        ]);
    }

    public function storeStep3(Request $request)
    {
        $pendaftaran = PendaftaranSiswa::findOrFail($request->pendaftaran_id);

        $data = $request->validate([
            'pilihan_jurusan_1' => 'required|string|max:200',
            'pilihan_jurusan_2' => 'nullable|string|max:200',
            'alasan_memilih'    => 'required|string|max:1000',
        ]);

        $data['step_terakhir'] = 3;
        $pendaftaran->update($data);

        return redirect()->route('pendaftaran.step4', ['id' => $pendaftaran->id]);
    }

    // ---------------------------------------------------------------
    // Step 4: Form upload dokumen
    // ---------------------------------------------------------------
    public function step4(Request $request)
    {
        $pendaftaran = PendaftaranSiswa::findOrFail($request->id);
        return view('pendaftaran.index', [
            'step'        => 4,
            'pendaftaran' => $pendaftaran,
            'jurusan'     => $this->jurusan,
        ]);
    }

    public function storeStep4(Request $request)
    {
        $pendaftaran = PendaftaranSiswa::findOrFail($request->pendaftaran_id);

        $request->validate([
            'foto_ijazah' => ($pendaftaran->foto_ijazah ? 'nullable' : 'required') . '|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'foto_kk'     => ($pendaftaran->foto_kk ? 'nullable' : 'required') . '|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'foto_akta'   => ($pendaftaran->foto_akta ? 'nullable' : 'required') . '|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'foto_pas'    => ($pendaftaran->foto_pas ? 'nullable' : 'required') . '|file|mimes:jpg,jpeg,png|max:1024',
        ]);

        $data = ['step_terakhir' => 4];

        foreach (['foto_ijazah', 'foto_kk', 'foto_akta', 'foto_pas'] as $field) {
            if ($request->hasFile($field)) {
                // Delete old file if exists
                if ($pendaftaran->$field) {
                    Storage::disk('public')->delete($pendaftaran->$field);
                }
                $data[$field] = $request->file($field)->store('pendaftaran/' . $pendaftaran->id, 'public');
            }
        }

        // Mark as submitted
        $data['status']       = 'terkirim';
        $data['submitted_at'] = now();

        $pendaftaran->update($data);

        return redirect()->route('pendaftaran.sukses', ['id' => $pendaftaran->id]);
    }

    // ---------------------------------------------------------------
    // Halaman sukses
    // ---------------------------------------------------------------
    public function sukses(Request $request)
    {
        $pendaftaran = PendaftaranSiswa::findOrFail($request->id);
        return view('pendaftaran.sukses', compact('pendaftaran'));
    }

    // ---------------------------------------------------------------
    // Simpan sebagai draft (AJAX / redirect)
    // ---------------------------------------------------------------
    public function saveDraft(Request $request)
    {
        if ($request->pendaftaran_id) {
            $pendaftaran = PendaftaranSiswa::find($request->pendaftaran_id);
            if ($pendaftaran) {
                // Update only the fields that were provided
                $pendaftaran->fill($request->except(['_token', 'pendaftaran_id']))->save();
                return redirect()->back()->with('success', 'Draft berhasil disimpan.');
            }
        }
        return redirect()->route('pendaftaran.create')->with('info', 'Silakan mulai formulir terlebih dahulu.');
    }
}
