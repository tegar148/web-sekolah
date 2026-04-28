<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSection;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->get('page', 'welcome');
        $sections = SiteSection::where('page', $page)->orderBy('sort_order')->get();

        $pages = SiteSection::select('page')->distinct()->pluck('page');

        return view('admin.sections.index', compact('sections', 'page', 'pages'));
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
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        if ($request->has('remove_image') && $section->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($section->image);
            $validated['image'] = null;
        }

        if ($request->hasFile('image')) {
            if ($section->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($section->image);
            }
            $path = $request->file('image')->store('sections', 'public');
            $validated['image'] = $path;
        }

        $section->update($validated);

        return redirect()->route('admin.sections.index', ['page' => $section->page])
            ->with('success', 'Section berhasil diperbarui!');
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
            'button_text' => false,
            'button_link' => false,
        ];

        $contentHint = null;
        $contentSchema = [];

        if ($section->section_key === 'hero') {
            $show['subtitle'] = true;

            if ($section->page === 'welcome') {
                $show['image'] = true;
                $show['button_text'] = true;
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
            $show['content'] = true;
            $contentHint = 'Isi berupa JSON array object testimoni.';
            $contentSchema = [
                ['kolom' => 'name', 'tipe' => 'string', 'keterangan' => 'Nama alumni/mitra'],
                ['kolom' => 'role', 'tipe' => 'string', 'keterangan' => 'Jabatan/instansi'],
                ['kolom' => 'quote', 'tipe' => 'string', 'keterangan' => 'Isi testimoni'],
            ];
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

        return [
            'show' => $show,
            'content_hint' => $contentHint,
            'content_schema' => $contentSchema,
        ];
    }
}
