<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::latest()->paginate(12);
        return view('admin.prestasi.index', compact('prestasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|in:vokasi,akademik,non-akademik',
            'achievement' => 'required|string|max:100',
            'location'    => 'required|string|max:100',
            'event_date'  => 'required|string|max:50',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:51200',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $filename = Str::uuid() . '.webp';
            $path     = 'prestasi/' . $filename;

            $manager = new ImageManager(new Driver());
            $image   = $manager->read($file->getPathname());
            $image->scaleDown(width: 1200, height: 1200);
            $encoded = $image->toWebp(80);

            Storage::disk('public')->put($path, (string) $encoded);
        }

        Prestasi::create([
            'title'       => $request->title,
            'category'    => $request->category,
            'achievement' => $request->achievement,
            'location'    => $request->location,
            'event_date'  => $request->event_date,
            'image_path'  => $path,
        ]);

        return back()->with('success', 'Prestasi berhasil ditambahkan!');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|in:vokasi,akademik,non-akademik',
            'achievement' => 'required|string|max:100',
            'location'    => 'required|string|max:100',
            'event_date'  => 'required|string|max:50',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:51200',
        ]);

        $path = $prestasi->image_path;
        if ($request->hasFile('image')) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            $file     = $request->file('image');
            $filename = Str::uuid() . '.webp';
            $path     = 'prestasi/' . $filename;

            $manager = new ImageManager(new Driver());
            $image   = $manager->read($file->getPathname());
            $image->scaleDown(width: 1200, height: 1200);
            $encoded = $image->toWebp(80);

            Storage::disk('public')->put($path, (string) $encoded);
        }

        $prestasi->update([
            'title'       => $request->title,
            'category'    => $request->category,
            'achievement' => $request->achievement,
            'location'    => $request->location,
            'event_date'  => $request->event_date,
            'image_path'  => $path,
        ]);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui!');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->image_path) {
            Storage::disk('public')->delete($prestasi->image_path);
        }
        $prestasi->delete();

        return back()->with('success', 'Prestasi berhasil dihapus!');
    }
}
