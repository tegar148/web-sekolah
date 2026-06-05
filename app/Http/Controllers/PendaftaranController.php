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
    public function create()
    {
        return view('pendaftaran.index', [
            'step'    => 1,
            'jurusan' => $this->jurusan,
        ]);
    }

    // ---------------------------------------------------------------
    // Step 1: Simpan data pribadi → buat record draft
    // ---------------------------------------------------------------
    public function storeStep1(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap'  => 'required|string|max:200',
            'nik'           => 'nullable|digits:16',
            'tempat_lahir'  => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'sekolah_asal'  => 'nullable|string|max:200',
            'alamat_lengkap'=> 'nullable|string|max:500',
        ]);

        $data['status']       = 'draft';
        $data['step_terakhir']= 1;
        $data['kode_pendaftaran'] = PendaftaranSiswa::generateKode();

        $pendaftaran = PendaftaranSiswa::create($data);

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
            'nama_ayah'      => 'nullable|string|max:200',
            'nama_ibu'       => 'nullable|string|max:200',
            'pekerjaan_ayah' => 'nullable|string|max:100',
            'pekerjaan_ibu'  => 'nullable|string|max:100',
            'no_hp_wali'     => 'nullable|string|max:20',
            'email_wali'     => 'nullable|email|max:100',
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
            'alasan_memilih'    => 'nullable|string|max:1000',
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
            'foto_ijazah' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'foto_kk'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'foto_akta'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'foto_pas'    => 'nullable|file|mimes:jpg,jpeg,png|max:1024',
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
