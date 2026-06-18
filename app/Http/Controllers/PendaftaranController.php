<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranSiswa;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    protected array $jurusan = [
        'Agribisnis Ternak Ruminansia',
        'Agribisnis Ternak Unggas',
        'Teknik Komputer dan Jaringan',
    ];

    // ---------------------------------------------------------------
    // Tampilkan form awal
    // ---------------------------------------------------------------
    public function create(Request $request)
    {
        return view('pendaftaran.index', [
            'jurusan' => $this->jurusan,
        ]);
    }

    // ---------------------------------------------------------------
    // Simpan data pendaftaran
    // ---------------------------------------------------------------
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'              => 'required|string|max:200',
            'jenis_kelamin'     => 'required|in:Laki-laki,Perempuan',
            'sekolah_asal'      => 'required|string|max:200',
            'kota_kabupaten'    => 'nullable|string|max:200',
            'kelurahan_desa'    => 'nullable|string|max:200',
            'alamat_lengkap'    => 'nullable|string|max:1000',
            'minat_jurusan'     => 'required|string|max:200',
        ]);

        $data['status'] = 'terkirim';
        $data['step_terakhir'] = 1;
        $data['submitted_at'] = now();
        $data['kode_pendaftaran'] = PendaftaranSiswa::generateKode();

        $pendaftaran = PendaftaranSiswa::create($data);

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
}
