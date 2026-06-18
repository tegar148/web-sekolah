<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->get('page', 'welcome');
        $sections = SiteSection::where('page', $page)->orderBy('sort_order')->get();

        $pages = SiteSection::select('page')->distinct()->pluck('page');

        $sejarah_items = $page === 'sejarah' ? \App\Models\SejarahItem::orderBy('tahun', 'asc')->get() : collect();
        $visi_misi_items = $page === 'visi-misi' ? \App\Models\VisiMisiItem::all() : collect();
        $minat_bakats = $page === 'siswa-organisasi' ? \App\Models\MinatBakat::all() : collect();
        $ekstrakurikulers = $page === 'siswa-ekstrakurikuler' ? \App\Models\Ekstrakurikuler::all() : collect();
        $ppdbRequirements = $page === 'info-ppdb' ? \App\Models\PpdbRequirement::all() : collect();
        $ppdbTimelines = $page === 'info-ppdb' ? \App\Models\PpdbTimeline::orderBy('id')->get() : collect();
        $ppdbSteps = $page === 'info-ppdb' ? \App\Models\PpdbStep::orderBy('id')->get() : collect();

        return view('admin.sections.index', compact('sections', 'page', 'pages', 'sejarah_items', 'visi_misi_items', 'minat_bakats', 'ekstrakurikulers', 'ppdbRequirements', 'ppdbTimelines', 'ppdbSteps'));
    }

    public function edit(SiteSection $section)
    {
        $fieldConfig = $this->buildFieldConfig($section);

        return view('admin.sections.edit', compact('section', 'fieldConfig'));
    }

    public function update(Request $request, SiteSection $section)
    {
        $validated = $request->validate([
            'title'       => 'nullable|string|max:255',
            'subtitle'    => 'nullable|string',
            'content'     => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'is_visible'  => 'boolean',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:51200',
            'images.*'    => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:51200',
            'fasilitas_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:51200',
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        // Handle footer fields
        if ($section->section_key === 'footer' && $request->has('footer_contact')) {
            $validated['content'] = json_encode($request->input('footer_contact'));
        }

        if ($section->section_key === 'prospek_karir' && $request->has('prospek_karir_data')) {
            $validated['content'] = json_encode(array_values($request->input('prospek_karir_data')));
        }

        if ($section->section_key === 'fasilitas_jurusan' && $request->has('fasilitas_data')) {
            $fasilitasItems = array_values($request->input('fasilitas_data'));

            // Handle file uploads per item
            foreach ($fasilitasItems as $i => &$item) {
                // Handle remove_image flag
                if (isset($item['remove_image']) && $item['remove_image'] == '1') {
                    if (!empty($item['image']) && \Illuminate\Support\Facades\Storage::disk('public')->exists($item['image'])) {
                        \Illuminate\Support\Facades\Storage::disk('public')->delete($item['image']);
                    }
                    $item['image'] = null;
                }
                unset($item['remove_image']);

                // Find the original index from the request to match uploaded file
                $originalIndexes = array_keys($request->input('fasilitas_data'));
                $originalIndex = $originalIndexes[$i] ?? $i;

                if ($request->hasFile("fasilitas_images.{$originalIndex}")) {
                    // Delete old file if it's a storage path
                    if (!empty($item['image']) && !str_starts_with($item['image'], 'http') && \Illuminate\Support\Facades\Storage::disk('public')->exists($item['image'])) {
                        \Illuminate\Support\Facades\Storage::disk('public')->delete($item['image']);
                    }

                    $file = $request->file("fasilitas_images.{$originalIndex}");
                    $filename = Str::uuid() . '.webp';
                    $path = 'sections/fasilitas/' . $filename;

                    $manager = new ImageManager(new Driver());
                    $img = $manager->read($file->getPathname());
                    $img->scaleDown(width: 1200, height: 1200);
                    $encoded = $img->toWebp(80);

                    \Illuminate\Support\Facades\Storage::disk('public')->put($path, (string) $encoded);
                    $item['image'] = $path;
                }
            }
            unset($item); // break reference

            $validated['content'] = json_encode($fasilitasItems);
        }

        if ($section->section_key === 'osis' && $request->has('osis_data')) {
            $osisData = $request->input('osis_data');
            
            if (isset($osisData['remove_avatar']) && $osisData['remove_avatar'] == '1') {
                if (isset($osisData['avatar']) && \Illuminate\Support\Facades\Storage::disk('public')->exists($osisData['avatar'])) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($osisData['avatar']);
                }
                $osisData['avatar'] = null;
                unset($osisData['remove_avatar']);
            }

            if ($request->hasFile('osis_avatar')) {
                if (isset($osisData['avatar']) && \Illuminate\Support\Facades\Storage::disk('public')->exists($osisData['avatar'])) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($osisData['avatar']);
                }

                $file = $request->file('osis_avatar');
                $filename = Str::uuid() . '.webp';
                $path = 'sections/avatars/' . $filename;

                $manager = new ImageManager(new Driver());
                $image = $manager->read($file->getPathname());
                $image->cover(400, 400);
                $encoded = $image->toWebp(75);

                \Illuminate\Support\Facades\Storage::disk('public')->put($path, (string) $encoded);
                $osisData['avatar'] = $path;
            }

            $validated['extra_data'] = $osisData;
        }

        if ($section->section_key === 'pramuka' && $request->has('pramuka_data')) {
            $validated['extra_data'] = $request->input('pramuka_data');
        }

        if ($section->section_key === 'pmr' && $request->has('pmr_data')) {
            $validated['extra_data'] = $request->input('pmr_data');
        }

        if ($section->section_key === 'bantuan' && $request->has('bantuan_data')) {
            $validated['extra_data'] = $request->input('bantuan_data');
        }

        if ($section->section_key === 'cta' && $request->has('cta_data')) {
            $validated['extra_data'] = $request->input('cta_data');
        }

        if ($section->section_key === 'hero' && $request->has('hero_data')) {
            $validated['extra_data'] = $request->input('hero_data');
        }

        if ($section->section_key === 'sambutan' && $request->has('sambutan_data')) {
            $existingExtraData = is_array($section->extra_data) ? $section->extra_data : [];
            $validated['extra_data'] = array_merge($existingExtraData, $request->input('sambutan_data'));
        }

        if ($request->has('remove_image') && $section->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($section->image);
            $validated['image'] = null;
        }

        if ($request->hasFile('image')) {
            if ($section->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($section->image);
            }

            $file = $request->file('image');
            $filename = Str::uuid() . '.webp';
            $path = 'sections/' . $filename;

            // Compress and convert image to WebP
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file->getPathname());
            $image->scaleDown(width: 1920, height: 1920);
            $encoded = $image->toWebp(75);

            \Illuminate\Support\Facades\Storage::disk('public')->put($path, (string) $encoded);
            $validated['image'] = $path;
        }

        // Handle multiple images (stored as JSON in content)
        if ($request->has('remove_images')) {
            $existingImages = json_decode($section->content, true);
            if (!is_array($existingImages)) $existingImages = [];
            foreach ($request->remove_images as $imgToRemove) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($imgToRemove);
                $existingImages = array_filter($existingImages, fn($i) => $i !== $imgToRemove);
            }
            $validated['content'] = json_encode(array_values($existingImages));
        }

        if ($request->hasFile('images')) {
            $existingImages = isset($validated['content']) ? json_decode($validated['content'], true) : json_decode($section->content, true);
            if (!is_array($existingImages)) $existingImages = [];

            foreach ($request->file('images') as $file) {
                $filename = Str::uuid() . '.webp';
                $path = 'sections/partners/' . $filename;

                $manager = new ImageManager(new Driver());
                $image = $manager->read($file->getPathname());
                // Scale down logic for partner logo
                $image->scaleDown(width: 400, height: 400);
                $encoded = $image->toWebp(75);

                \Illuminate\Support\Facades\Storage::disk('public')->put($path, (string) $encoded);
                $existingImages[] = $path;
            }
            $validated['content'] = json_encode($existingImages);
        }

        $section->update($validated);

        $message = 'Section berhasil diperbarui!';
        if ($request->hasFile('image')) {
            $message = 'Section berhasil diperbarui! Gambar telah dikompresi ke format WebP.';
        }

        return redirect()->route('admin.sections.index', ['page' => $section->page])
            ->with('success', $message);
    }

    public function toggleVisibility(SiteSection $section)
    {
        $section->update(['is_visible' => !$section->is_visible]);

        return back()->with('success', "Section \"{$section->section_key}\" " .
            ($section->is_visible ? 'ditampilkan' : 'disembunyikan') . '.');
    }

    private function buildFieldConfig(SiteSection $section): array
    {
        $show = [
            'title' => true,
            'subtitle' => false,
            'content' => false,
            'image' => false,
            'images' => false,
            'button_text' => false,
            'button_link' => false,
        ];

        $contentHint = null;
        $contentSchema = [];

        if ($section->section_key === 'topbar') {
            $show['title'] = true;
            $show['subtitle'] = true;
            $show['image'] = true;
        }

        if ($section->section_key === 'footer') {
            $show['title'] = true;
            $show['subtitle'] = true;
            $show['content'] = true;
            $show['image'] = true; // Enable logo editing
            $contentHint = 'Isi berupa JSON object info kontak footer.';
            $contentSchema = [
                ['kolom' => 'address', 'tipe' => 'string', 'keterangan' => 'Alamat Sekolah'],
                ['kolom' => 'phone', 'tipe' => 'string', 'keterangan' => 'Nomor Telepon'],
                ['kolom' => 'email', 'tipe' => 'string', 'keterangan' => 'Email'],
                ['kolom' => 'facebook', 'tipe' => 'string', 'keterangan' => 'Link Facebook (opsional)'],
                ['kolom' => 'instagram', 'tipe' => 'string', 'keterangan' => 'Link Instagram (opsional)'],
                ['kolom' => 'youtube', 'tipe' => 'string', 'keterangan' => 'Link YouTube (opsional)'],
            ];
        }

        if ($section->section_key === 'hero') {
            $show['subtitle'] = true;

            if ($section->page === 'welcome') {
                $show['image'] = true;
                $show['button_text'] = true;
            }

            if (in_array($section->page, ['sejarah', 'visi-misi', 'prestasi', 'guru', 'galeri', 'fasilitas'], true)) {
                $show['image'] = true;
            }

            if ($section->page === 'info-ppdb') {
                $show['button_text'] = true;
            }

            if ($section->page === 'berita') {
                $show['content'] = true;
                $contentHint = 'Konten dipakai sebagai deskripsi hero berita.';
            }
        }

        if ($section->section_key === 'content') {
            $show['content'] = true;

            if (in_array($section->page, ['sejarah'], true)) {
                $show['subtitle'] = true;
                $show['image'] = true;
            }

            if (in_array($section->page, ['jurusan-ruminansia', 'jurusan-unggas', 'jurusan-tkj'], true)) {
                $show['image'] = true;
            }
        }

        if ($section->section_key === 'sambutan') {
            $show['subtitle'] = true;
            $show['content'] = true;
            $show['image'] = true;
        }

        if ($section->section_key === 'cta') {
            $show['button_text'] = true;
            $show['button_link'] = true;
            if ($section->page === 'bkk-profile') {
                $show['subtitle'] = true;
                $show['image'] = true;
                $show['content'] = true;
                $contentHint = 'Isi berupa JSON object untuk tombol kedua (opsional).';
                $contentSchema = [
                    ['kolom' => 'button_2_text', 'tipe' => 'string', 'keterangan' => 'Teks tombol kedua'],
                    ['kolom' => 'button_2_link', 'tipe' => 'string', 'keterangan' => 'Link tombol kedua'],
                ];
            }
        }

        if ($section->section_key === 'tentang_bkk') {
            $show['image'] = true;
            $show['content'] = true;
            $contentHint = 'Isi berupa JSON object tentang BKK.';
            $contentSchema = [
                ['kolom' => 'text_1', 'tipe' => 'string', 'keterangan' => 'Paragraf pertama'],
                ['kolom' => 'text_2', 'tipe' => 'string', 'keterangan' => 'Paragraf kedua'],
                ['kolom' => 'stats', 'tipe' => 'array', 'keterangan' => 'Array object statistik [{value, label}]'],
            ];
        }

        if ($section->section_key === 'layanan') {
            $show['subtitle'] = true;
            $show['content'] = true;
            $contentHint = 'Isi berupa JSON array object layanan unggulan.';
            $contentSchema = [
                ['kolom' => 'title', 'tipe' => 'string', 'keterangan' => 'Judul Layanan'],
                ['kolom' => 'desc', 'tipe' => 'string', 'keterangan' => 'Deskripsi Layanan'],
                ['kolom' => 'tag', 'tipe' => 'string', 'keterangan' => 'Badge Opsional'],
                ['kolom' => 'style', 'tipe' => 'string', 'keterangan' => 'Pilih: wide_white, dark_teal, light_blue, wide_white_2'],
            ];
        }

        if ($section->section_key === 'langkah') {
            $show['subtitle'] = true;
        }

        if ($section->section_key === 'persyaratan') {
            $show['content'] = true;
            $contentHint = 'Isi berupa JSON array string. Satu item mewakili satu poin persyaratan.';
            $contentSchema = [
                ['kolom' => '[0]', 'tipe' => 'string', 'keterangan' => 'Teks persyaratan pertama'],
                ['kolom' => '[1]', 'tipe' => 'string', 'keterangan' => 'Teks persyaratan kedua'],
            ];
        }

        if ($section->section_key === 'jadwal') {
            $show['content'] = true;
            $contentHint = 'Isi berupa JSON array object jadwal.';
            $contentSchema = [
                ['kolom' => 'date', 'tipe' => 'string', 'keterangan' => 'Rentang tanggal'],
                ['kolom' => 'title', 'tipe' => 'string', 'keterangan' => 'Nama agenda'],
                ['kolom' => 'desc', 'tipe' => 'string', 'keterangan' => 'Deskripsi singkat agenda'],
            ];
        }

        if ($section->section_key === 'berita' || ($section->section_key === 'content' && $section->page === 'berita')) {
            $show['content'] = true;
            $contentHint = 'Isi berupa JSON array object berita.';
            $contentSchema = [
                ['kolom' => 'category', 'tipe' => 'string', 'keterangan' => 'Label kategori kartu'],
                ['kolom' => 'date', 'tipe' => 'string', 'keterangan' => 'Tanggal tampil'],
                ['kolom' => 'title', 'tipe' => 'string', 'keterangan' => 'Judul berita'],
                ['kolom' => 'excerpt', 'tipe' => 'string', 'keterangan' => 'Ringkasan konten'],
                ['kolom' => 'image', 'tipe' => 'string|null', 'keterangan' => 'URL gambar opsional'],
            ];
        }

        if ($section->section_key === 'mitra_alumni') {
            $show['subtitle'] = true;
            $show['images'] = true; // Use multiple images field instead of content
        }

        if ($section->section_key === 'stats') {
            $show['subtitle'] = true;
            $show['content'] = true;
            $contentHint = 'Isi berupa JSON array object statistik.';
            $contentSchema = [
                ['kolom' => 'value', 'tipe' => 'string', 'keterangan' => 'Angka utama, contoh: 25+'],
                ['kolom' => 'label', 'tipe' => 'string', 'keterangan' => 'Label statistik'],
                ['kolom' => 'sub', 'tipe' => 'string', 'keterangan' => 'Subteks statistik'],
            ];
        }

        if ($section->section_key === 'content' && $section->page === 'guru') {
            $contentHint = 'Isi berupa JSON array object daftar guru.';
            $contentSchema = [
                ['kolom' => 'name', 'tipe' => 'string', 'keterangan' => 'Nama guru/staff'],
                ['kolom' => 'role', 'tipe' => 'string', 'keterangan' => 'Peran atau jabatan'],
                ['kolom' => 'dept', 'tipe' => 'string', 'keterangan' => 'Bidang/departemen'],
                ['kolom' => 'bio', 'tipe' => 'string', 'keterangan' => 'Deskripsi singkat'],
            ];
        }

        if ($section->section_key === 'content' && $section->page === 'bkk-lowongan') {
            $contentHint = 'Isi berupa JSON array object lowongan.';
            $contentSchema = [
                ['kolom' => 'title', 'tipe' => 'string', 'keterangan' => 'Posisi kerja'],
                ['kolom' => 'company', 'tipe' => 'string', 'keterangan' => 'Nama perusahaan'],
                ['kolom' => 'location', 'tipe' => 'string', 'keterangan' => 'Lokasi kerja'],
                ['kolom' => 'deadline', 'tipe' => 'string', 'keterangan' => 'Batas lamaran'],
                ['kolom' => 'salary', 'tipe' => 'string|null', 'keterangan' => 'Rentang gaji opsional'],
                ['kolom' => 'badge', 'tipe' => 'string|null', 'keterangan' => 'Label badge opsional'],
            ];
        }

        if ($section->section_key === 'content' && $section->page === 'siswa-ekstrakurikuler') {
            $contentHint = 'Isi berupa JSON array object ekstrakurikuler.';
            $contentSchema = [
                ['kolom' => 'name', 'tipe' => 'string', 'keterangan' => 'Nama ekstrakurikuler'],
                ['kolom' => 'type', 'tipe' => 'string', 'keterangan' => 'Kategori ekstrakurikuler'],
                ['kolom' => 'desc', 'tipe' => 'string', 'keterangan' => 'Deskripsi singkat'],
            ];
        }

        if ($section->section_key === 'prospek_karir') {
            $show['subtitle'] = true;
            $show['content'] = true;
            $contentHint = 'Khusus Prospek Karir, Anda hanya bisa mengedit konten yang ada (tidak bisa menambah/menghapus kartu).';
        }

        if ($section->section_key === 'fasilitas_jurusan') {
            $show['subtitle'] = true;
            $show['content'] = true;
            $contentHint = 'Fasilitas bisa ditambah/dihapus (CRUD). Silakan kelola daftar fasilitas di bawah.';
        }

        if ($section->section_key === 'osis') {
            $show['subtitle'] = true;
            $show['image'] = true;
            $show['content'] = true;
            $contentHint = 'Isi detail informasi OSIS.';
        }

        if ($section->section_key === 'minat_bakat_header') {
            $show['subtitle'] = true;
            $show['content'] = true;
            $contentHint = 'Isi berupa JSON object untuk tag.';
            $contentSchema = [
                ['kolom' => 'tag', 'tipe' => 'string', 'keterangan' => 'Tag (e.g., EXTRACURRICULAR)'],
            ];
        }

        if ($section->section_key === 'pramuka') {
            $show['subtitle'] = true;
            $show['image'] = true;
            $show['content'] = true;
            $contentHint = 'Isi detail informasi Pramuka.';
        }

        if ($section->section_key === 'pmr') {
            $show['subtitle'] = true;
            $show['content'] = true;
            $contentHint = 'Isi detail informasi PMR.';
        }

        if ($section->section_key === 'bantuan') {
            $show['subtitle'] = true;
            $show['content'] = true;
            $contentHint = 'Detail Card Bantuan.';
        }

        if ($section->section_key === 'cta') {
            $show['subtitle'] = true;
            $show['image'] = true;
            $show['content'] = true;
            $contentHint = 'Detail CTA Bottom.';
        }

        return [
            'show' => $show,
            'content_hint' => $contentHint,
            'content_schema' => $contentSchema,
        ];
    }
}
