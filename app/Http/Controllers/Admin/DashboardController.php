<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSection;
use App\Models\Media;
use App\Models\User;
use App\Models\PendaftaranSiswa;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'sections' => SiteSection::count(),
            'media'    => Media::count(),
            'users'    => User::count(),
            'pages'    => SiteSection::distinct('page')->count('page'),
        ];

        $recentSections = SiteSection::latest()->take(5)->get();

        // PPDB Stats for donut charts
        $ppdbTotal    = PendaftaranSiswa::count();
        $ppdbByStatus = PendaftaranSiswa::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        $ppdbByJurusan = PendaftaranSiswa::selectRaw('minat_jurusan, COUNT(*) as total')
            ->whereNotNull('minat_jurusan')
            ->groupBy('minat_jurusan')
            ->pluck('total', 'minat_jurusan')
            ->toArray();

        return view('admin.dashboard', compact(
            'stats', 'recentSections',
            'ppdbTotal', 'ppdbByStatus', 'ppdbByJurusan'
        ));
    }
}
