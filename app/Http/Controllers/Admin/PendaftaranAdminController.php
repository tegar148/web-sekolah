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
                $sub->where('nama', 'like', "%{$q}%")
                    ->orWhere('kode_pendaftaran', 'like', "%{$q}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('jurusan')) {
            $query->where('minat_jurusan', $request->jurusan);
        }

        $pendaftarans = $query->paginate(15);

        $total    = PendaftaranSiswa::count();
        $terkirim = PendaftaranSiswa::where('status', 'terkirim')->count();
        $draft    = PendaftaranSiswa::where('status', 'draft')->count();
        $diterima = PendaftaranSiswa::where('status', 'diterima')->count();

        // Build JSON data untuk modal di Blade
        $pendaftaranJson = [];
        foreach ($pendaftarans as $p) {
            $pendaftaranJson[$p->id] = [
                'kode'             => $p->kode_pendaftaran ?? '-',
                'status'           => $p->status,
                'submitted_at'     => $p->submitted_at ? $p->submitted_at->format('d F Y, H:i') : '-',
                'created_at'       => $p->created_at->format('d F Y, H:i'),
                'nama'             => $p->nama ?? '-',
                'jenis_kelamin'    => $p->jenis_kelamin ?? '-',
                'sekolah_asal'     => $p->sekolah_asal ?? '-',
                'minat_jurusan'    => $p->minat_jurusan ?? '-',
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
