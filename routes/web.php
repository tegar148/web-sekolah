<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\MediaController;
use App\Models\SiteSection;

// ============================================================
// PUBLIC ROUTES — Dynamic content from database
// ============================================================

Route::get('/', function () {
    $sections = SiteSection::where('page', 'welcome')->orderBy('sort_order')->get()->keyBy('section_key');
    return view('welcome', compact('sections'));
});

Route::get('/sejarah', function () {
    $sections = SiteSection::where('page', 'sejarah')->orderBy('sort_order')->get()->keyBy('section_key');
    return view('sejarah', compact('sections'));
})->name('sejarah');

Route::get('/visi-misi', function () {
    $sections = SiteSection::where('page', 'visi-misi')->orderBy('sort_order')->get()->keyBy('section_key');
    return view('visi-misi', compact('sections'));
})->name('visi-misi');

Route::get('/prestasi', function () {
    $sections = SiteSection::where('page', 'prestasi')->orderBy('sort_order')->get()->keyBy('section_key');
    return view('prestasi', compact('sections'));
})->name('prestasi');

Route::get('/guru', function () {
    $sections = SiteSection::where('page', 'guru')->orderBy('sort_order')->get()->keyBy('section_key');
    return view('guru', compact('sections'));
})->name('guru');

Route::get('/galeri', function () {
    $sections = SiteSection::where('page', 'galeri')->orderBy('sort_order')->get()->keyBy('section_key');
    $galleries = \App\Models\Media::whereIn('collection', ['kegiatan_siswa', 'fasilitas_sekolah', 'prestasi', 'guru_staff'])->latest()->get();
    return view('galeri', compact('sections', 'galleries'));
})->name('galeri');

Route::get('/fasilitas', function () {
    $sections = SiteSection::where('page', 'fasilitas')->orderBy('sort_order')->get()->keyBy('section_key');
    return view('fasilitas', compact('sections'));
})->name('fasilitas');

Route::get('/jurusan/ruminansia', function () {
    $sections = SiteSection::where('page', 'jurusan-ruminansia')->orderBy('sort_order')->get()->keyBy('section_key');
    return view('jurusan-ruminansia', compact('sections'));
})->name('jurusan.ruminansia');

Route::get('/jurusan/unggas', function () {
    $sections = SiteSection::where('page', 'jurusan-unggas')->orderBy('sort_order')->get()->keyBy('section_key');
    return view('jurusan-unggas', compact('sections'));
})->name('jurusan.unggas');

Route::get('/jurusan/tkj', function () {
    $sections = SiteSection::where('page', 'jurusan-tkj')->orderBy('sort_order')->get()->keyBy('section_key');
    return view('jurusan-tkj', compact('sections'));
})->name('jurusan.tkj');

Route::get('/bkk/profile', function () {
    $sections = SiteSection::where('page', 'bkk-profile')->orderBy('sort_order')->get()->keyBy('section_key');
    return view('bkk-profile', compact('sections'));
})->name('bkk.profile');

Route::get('/bkk/lowongan', function () {
    $sections = SiteSection::where('page', 'bkk-lowongan')->orderBy('sort_order')->get()->keyBy('section_key');
    return view('bkk-lowongan', compact('sections'));
})->name('bkk.lowongan');

Route::get('/siswa/organisasi', function () {
    $sections = SiteSection::where('page', 'siswa-organisasi')->orderBy('sort_order')->get()->keyBy('section_key');
    return view('siswa-organisasi', compact('sections'));
})->name('siswa.organisasi');

Route::get('/siswa/ekstrakurikuler', function () {
    $sections = SiteSection::where('page', 'siswa-ekstrakurikuler')->orderBy('sort_order')->get()->keyBy('section_key');
    return view('siswa-ekstrakurikuler', compact('sections'));
})->name('siswa.ekstrakurikuler');

Route::get('/info-ppdb', function () {
    $sections = SiteSection::where('page', 'info-ppdb')->orderBy('sort_order')->get()->keyBy('section_key');
    return view('info-ppdb', compact('sections'));
})->name('info.ppdb');

Route::get('/siswa/kalender', function () {
    $sections = SiteSection::where('page', 'siswa-kalender')->orderBy('sort_order')->get()->keyBy('section_key');
    return view('siswa-kalender', compact('sections'));
})->name('siswa.kalender');

Route::get('/berita', function () {
    $sections = SiteSection::where('page', 'berita')->orderBy('sort_order')->get()->keyBy('section_key');
    $beritas = \App\Models\Berita::latest('published_at')->paginate(9);
    return view('berita', compact('sections', 'beritas'));
})->name('berita');

Route::get('/berita/{slug}', function ($slug) {
    $berita = \App\Models\Berita::where('slug', $slug)->firstOrFail();
    return view('berita-show', compact('berita'));
})->name('berita.show');

// ============================================================
// ADMIN ROUTES
// ============================================================

// Auth (Guest)
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Protected Admin Panel
Route::prefix('admin')->middleware(\App\Http\Middleware\AdminAuth::class)->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/sections', [SectionController::class, 'index'])->name('admin.sections.index');
    Route::get('/sections/{section}/edit', [SectionController::class, 'edit'])->name('admin.sections.edit');
    Route::put('/sections/{section}', [SectionController::class, 'update'])->name('admin.sections.update');
    Route::patch('/sections/{section}/toggle', [SectionController::class, 'toggleVisibility'])->name('admin.sections.toggle');

    Route::get('/media', [MediaController::class, 'index'])->name('admin.media.index');
    Route::post('/media', [MediaController::class, 'store'])->name('admin.media.store');
    Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('admin.media.destroy');

    Route::get('/berita', [\App\Http\Controllers\Admin\BeritaController::class, 'index'])->name('admin.berita.index');
    Route::post('/berita', [\App\Http\Controllers\Admin\BeritaController::class, 'store'])->name('admin.berita.store');
    Route::delete('/berita/{berita}', [\App\Http\Controllers\Admin\BeritaController::class, 'destroy'])->name('admin.berita.destroy');
});
