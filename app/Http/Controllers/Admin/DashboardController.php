<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSection;
use App\Models\Media;
use App\Models\User;

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

        return view('admin.dashboard', compact('stats', 'recentSections'));
    }
}
