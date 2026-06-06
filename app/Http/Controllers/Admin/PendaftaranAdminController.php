<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranSiswa;
use App\Exports\PendaftaranExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PendaftaranAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = PendaftaranSiswa::latest();

        if ($request->filled('search')) {
            $q = $request->search;
            $query->where(function ($sub) use ($q) {
                $sub->where('nama_lengkap', 'like', "%{$q}%")
                    ->orWhere('kode_pendaftaran', 'like', "%{$q}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('jurusan')) {
            $query->where('pilihan_jurusan_1', $request->jurusan);
        }

        $pendaftarans = $query->paginate(15);

        $total    = PendaftaranSiswa::count();
        $terkirim = PendaftaranSiswa::where('status', 'terkirim')->count();
        $draft    = PendaftaranSiswa::where('status', 'draft')->count();
        $diterima = PendaftaranSiswa::where('status', 'diterima')->count();

        // Build JSON data untuk modal di Blade — dilakukan di controller
        // agar tidak ada anonymous function di dalam @json() Blade
        $pendaftaranJson = [];
        foreach ($pendaftarans as $p) {
            $pendaftaranJson[$p->id] = [
                'kode'             => $p->kode_pendaftaran ?? '-',
                'status'           => $p->status,
                'step'             => $p->step_terakhir,
                'submitted_at'     => $p->submitted_at ? $p->submitted_at->format('d F Y, H:i') : '-',
                'created_at'       => $p->created_at->format('d F Y, H:i'),
                'nama_lengkap'     => $p->nama_lengkap ?? '-',
                'nik'              => $p->nik ?? '-',
                'tempat_lahir'     => $p->tempat_lahir ?? '-',
                'tanggal_lahir'    => $p->tanggal_lahir ? $p->tanggal_lahir->format('d M Y') : '-',
                'jenis_kelamin'    => $p->jenis_kelamin ?? '-',
                'sekolah_asal'     => $p->sekolah_asal ?? '-',
                'alamat_lengkap'   => $p->alamat_lengkap ?? '-',
                'nama_ayah'        => $p->nama_ayah ?? '-',
                'nama_ibu'         => $p->nama_ibu ?? '-',
                'pekerjaan_ayah'   => $p->pekerjaan_ayah ?? '-',
                'pekerjaan_ibu'    => $p->pekerjaan_ibu ?? '-',
                'no_hp_wali'       => $p->no_hp_wali ?? '-',
                'email_wali'       => $p->email_wali ?? '-',
                'pilihan_jurusan_1'=> $p->pilihan_jurusan_1 ?? '-',
                'pilihan_jurusan_2'=> $p->pilihan_jurusan_2 ?? '-',
                'alasan_memilih'   => $p->alasan_memilih ?? '-',
                'foto_ijazah'      => $p->foto_ijazah ? Storage::url($p->foto_ijazah) : null,
                'foto_kk'          => $p->foto_kk     ? Storage::url($p->foto_kk)     : null,
                'foto_akta'        => $p->foto_akta   ? Storage::url($p->foto_akta)   : null,
                'foto_pas'         => $p->foto_pas    ? Storage::url($p->foto_pas)    : null,
            ];
        }

        return view('admin.pendaftaran.index', compact(
            'pendaftarans', 'total', 'terkirim', 'draft', 'diterima', 'pendaftaranJson'
        ));
    }

    /**
     * Export data pendaftaran ke file Excel (.xlsx).
     */
    public function exportExcel(Request $request)
    {
        $filename = 'Data_Pendaftaran_PPDB_' . date('Y-m-d_His') . '.xlsx';

        return Excel::download(new PendaftaranExport($request), $filename);
    }
}
