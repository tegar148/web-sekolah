<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\LowonganController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\PendaftaranAdminController;
use App\Http\Controllers\PendaftaranController;
use App\Models\SiteSection;

// ============================================================
// PUBLIC ROUTES — Dynamic content from database
// ============================================================

Route::get('/', function () {
    $sections = SiteSection::where('page', 'welcome')->orderBy('sort_order')->get()->keyBy('section_key');
    $beritas = \App\Models\Berita::latest('published_at')->take(3)->get();
    return view('welcome', compact('sections', 'beritas'));
});

Route::get('/sejarah', function () {
    $sections = SiteSection::where('page', 'sejarah')->orderBy('sort_order')->get()->keyBy('section_key');
    $sejarah_items = \App\Models\SejarahItem::orderBy('tahun', 'asc')->get();
    return view('sejarah', compact('sections', 'sejarah_items'));
})->name('sejarah');

Route::get('/visi-misi', function () {
    $sections = SiteSection::where('page', 'visi-misi')->orderBy('sort_order')->get()->keyBy('section_key');
    $visi_items = \App\Models\VisiMisiItem::where('tipe', 'visi')->get();
    $misi_items = \App\Models\VisiMisiItem::where('tipe', 'misi')->get();
    return view('visi-misi', compact('sections', 'visi_items', 'misi_items'));
})->name('visi-misi');

Route::get('/prestasi', function () {
    $sections = SiteSection::where('page', 'prestasi')->orderBy('sort_order')->get()->keyBy('section_key');
    $prestasis = \App\Models\Prestasi::latest()->paginate(9);
    return view('prestasi', compact('sections', 'prestasis'));
})->name('prestasi');

Route::get('/guru', function () {
    $sections = SiteSection::where('page', 'guru')->orderBy('sort_order')->get()->keyBy('section_key');
    $gurus = \App\Models\Guru::all();
    return view('guru', compact('sections', 'gurus'));
})->name('guru');

Route::get('/galeri', function () {
    $sections = SiteSection::where('page', 'galeri')->orderBy('sort_order')->get()->keyBy('section_key');
    $galleries = \App\Models\Media::whereIn('collection', ['kegiatan_siswa', 'fasilitas_sekolah', 'prestasi', 'guru_staff'])->latest()->get();
    return view('galeri', compact('sections', 'galleries'));
})->name('galeri');

Route::get('/fasilitas', function () {
    $sections = SiteSection::where('page', 'fasilitas')->orderBy('sort_order')->get()->keyBy('section_key');
    $fasilitas = \App\Models\Fasilitas::all();
    return view('fasilitas', compact('sections', 'fasilitas'));
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
    $lowongans = \App\Models\Lowongan::latest()->paginate(12);
    return view('bkk-lowongan', compact('sections', 'lowongans'));
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

// ── PENDAFTARAN ONLINE ────────────────────────────────────────────
Route::get('/pendaftaran',              [PendaftaranController::class, 'create'])->name('pendaftaran.create');
Route::post('/pendaftaran/step-1',      [PendaftaranController::class, 'storeStep1'])->name('pendaftaran.store-step1');
Route::get('/pendaftaran/step-2',       [PendaftaranController::class, 'step2'])->name('pendaftaran.step2');
Route::post('/pendaftaran/step-2',      [PendaftaranController::class, 'storeStep2'])->name('pendaftaran.store-step2');
Route::get('/pendaftaran/step-3',       [PendaftaranController::class, 'step3'])->name('pendaftaran.step3');
Route::post('/pendaftaran/step-3',      [PendaftaranController::class, 'storeStep3'])->name('pendaftaran.store-step3');
Route::get('/pendaftaran/step-4',       [PendaftaranController::class, 'step4'])->name('pendaftaran.step4');
Route::post('/pendaftaran/step-4',      [PendaftaranController::class, 'storeStep4'])->name('pendaftaran.store-step4');
Route::get('/pendaftaran/sukses',       [PendaftaranController::class, 'sukses'])->name('pendaftaran.sukses');
Route::post('/pendaftaran/save-draft',  [PendaftaranController::class, 'saveDraft'])->name('pendaftaran.save-draft');

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
    Route::get('/media/{media}/edit', [MediaController::class, 'edit'])->name('admin.media.edit');
    Route::put('/media/{media}', [MediaController::class, 'update'])->name('admin.media.update');
    Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('admin.media.destroy');

    Route::resource('admin/visi-misi', \App\Http\Controllers\Admin\VisiMisiController::class, [
        'as' => 'admin'
    ])->except(['show', 'create', 'edit']);

    Route::resource('admin/fasilitas', \App\Http\Controllers\Admin\FasilitasController::class, [
        'as' => 'admin'
    ])->except(['show', 'create', 'edit']);

    Route::resource('admin/minat-bakat', \App\Http\Controllers\Admin\MinatBakatController::class, [
        'as' => 'admin'
    ])->except(['show', 'create', 'edit']);

    Route::resource('admin/ekstrakurikuler', \App\Http\Controllers\Admin\EkstrakurikulerController::class, [
        'as' => 'admin'
    ])->except(['show', 'create', 'edit']);

    Route::post('/admin/ppdb/requirement', [\App\Http\Controllers\Admin\PpdbController::class, 'storeRequirement'])->name('admin.ppdb.requirement.store');
    Route::put('/admin/ppdb/requirement/{requirement}', [\App\Http\Controllers\Admin\PpdbController::class, 'updateRequirement'])->name('admin.ppdb.requirement.update');
    Route::delete('/admin/ppdb/requirement/{requirement}', [\App\Http\Controllers\Admin\PpdbController::class, 'destroyRequirement'])->name('admin.ppdb.requirement.destroy');

    Route::post('/admin/ppdb/timeline', [\App\Http\Controllers\Admin\PpdbController::class, 'storeTimeline'])->name('admin.ppdb.timeline.store');
    Route::put('/admin/ppdb/timeline/{timeline}', [\App\Http\Controllers\Admin\PpdbController::class, 'updateTimeline'])->name('admin.ppdb.timeline.update');
    Route::delete('/admin/ppdb/timeline/{timeline}', [\App\Http\Controllers\Admin\PpdbController::class, 'destroyTimeline'])->name('admin.ppdb.timeline.destroy');

    Route::post('/admin/ppdb/step', [\App\Http\Controllers\Admin\PpdbController::class, 'storeStep'])->name('admin.ppdb.step.store');
    Route::put('/admin/ppdb/step/{step}', [\App\Http\Controllers\Admin\PpdbController::class, 'updateStep'])->name('admin.ppdb.step.update');
    Route::delete('/admin/ppdb/step/{step}', [\App\Http\Controllers\Admin\PpdbController::class, 'destroyStep'])->name('admin.ppdb.step.destroy');

    Route::get('/berita/fetch-meta', [\App\Http\Controllers\Admin\BeritaController::class, 'fetchMeta'])->name('admin.berita.fetch-meta');
    Route::get('/berita', [\App\Http\Controllers\Admin\BeritaController::class, 'index'])->name('admin.berita.index');
    Route::post('/berita', [\App\Http\Controllers\Admin\BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/berita/{berita}/edit', [\App\Http\Controllers\Admin\BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/berita/{berita}', [\App\Http\Controllers\Admin\BeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('/berita/{berita}', [\App\Http\Controllers\Admin\BeritaController::class, 'destroy'])->name('admin.berita.destroy');

    Route::get('/prestasi', [PrestasiController::class, 'index'])->name('admin.prestasi.index');
    Route::post('/prestasi', [PrestasiController::class, 'store'])->name('admin.prestasi.store');
    Route::get('/prestasi/{prestasi}/edit', [PrestasiController::class, 'edit'])->name('admin.prestasi.edit');
    Route::put('/prestasi/{prestasi}', [PrestasiController::class, 'update'])->name('admin.prestasi.update');
    Route::delete('/prestasi/{prestasi}', [PrestasiController::class, 'destroy'])->name('admin.prestasi.destroy');

    Route::get('/guru', [GuruController::class, 'index'])->name('admin.guru.index');
    Route::post('/guru', [GuruController::class, 'store'])->name('admin.guru.store');
    Route::get('/guru/{guru}/edit', [GuruController::class, 'edit'])->name('admin.guru.edit');
    Route::put('/guru/{guru}', [GuruController::class, 'update'])->name('admin.guru.update');
    Route::delete('/guru/{guru}', [GuruController::class, 'destroy'])->name('admin.guru.destroy');

    Route::get('/lowongan', [LowonganController::class, 'index'])->name('admin.lowongan.index');
    Route::post('/lowongan', [LowonganController::class, 'store'])->name('admin.lowongan.store');
    Route::get('/lowongan/{lowongan}/edit', [LowonganController::class, 'edit'])->name('admin.lowongan.edit');
    Route::put('/lowongan/{lowongan}', [LowonganController::class, 'update'])->name('admin.lowongan.update');
    Route::delete('/lowongan/{lowongan}', [LowonganController::class, 'destroy'])->name('admin.lowongan.destroy');

    // Pendaftaran PPDB (view only)
    Route::get('/pendaftaran', [PendaftaranAdminController::class, 'index'])->name('admin.pendaftaran.index');
    Route::get('/pendaftaran/export-excel', [PendaftaranAdminController::class, 'exportExcel'])->name('admin.pendaftaran.export-excel');

    Route::resource('fasilitas', FasilitasController::class)->except(['show'])->names([
        'index'   => 'admin.fasilitas.index',
        'create'  => 'admin.fasilitas.create',
        'store'   => 'admin.fasilitas.store',
        'edit'    => 'admin.fasilitas.edit',
        'update'  => 'admin.fasilitas.update',
        'destroy' => 'admin.fasilitas.destroy',
    ]);

    Route::post('/sejarah-items', [\App\Http\Controllers\Admin\SejarahItemController::class, 'store'])->name('admin.sejarah-items.store');
    Route::put('/sejarah-items/{sejarah_item}', [\App\Http\Controllers\Admin\SejarahItemController::class, 'update'])->name('admin.sejarah-items.update');
    Route::delete('/sejarah-items/{sejarah_item}', [\App\Http\Controllers\Admin\SejarahItemController::class, 'destroy'])->name('admin.sejarah-items.destroy');

    Route::post('/visi-misi-items', [\App\Http\Controllers\Admin\VisiMisiItemController::class, 'store'])->name('admin.visi-misi-items.store');
    Route::put('/visi-misi-items/{visi_misi_item}', [\App\Http\Controllers\Admin\VisiMisiItemController::class, 'update'])->name('admin.visi-misi-items.update');
    Route::delete('/visi-misi-items/{visi_misi_item}', [\App\Http\Controllers\Admin\VisiMisiItemController::class, 'destroy'])->name('admin.visi-misi-items.destroy');

    Route::resource('minat-bakat', \App\Http\Controllers\Admin\MinatBakatController::class)->except(['show'])->names([
        'index'   => 'admin.minat-bakat.index',
        'create'  => 'admin.minat-bakat.create',
        'store'   => 'admin.minat-bakat.store',
        'edit'    => 'admin.minat-bakat.edit',
        'update'  => 'admin.minat-bakat.update',
        'destroy' => 'admin.minat-bakat.destroy',
    ]);
});
