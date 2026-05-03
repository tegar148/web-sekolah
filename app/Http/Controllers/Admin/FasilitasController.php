<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::latest()->paginate(10);
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('admin.fasilitas.edit'); // We'll use one form for create/edit
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'required|string',
            'detail_label' => 'nullable|string|max:255',
            'detail_value' => 'nullable|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $filename = Str::uuid() . '.webp';
            $path = 'fasilitas/' . $filename;

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file->getPathname());
            $image->scaleDown(width: 1200, height: 1200);
            $encoded = $image->toWebp(75);

            \Illuminate\Support\Facades\Storage::disk('public')->put($path, (string) $encoded);
            $validated['image_path'] = $path;
        }

        Fasilitas::create($validated);
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    public function edit(Fasilitas $fasilita)
    {
        return view('admin.fasilitas.edit', ['fasilitas' => $fasilita]);
    }

    public function update(Request $request, Fasilitas $fasilita)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'required|string',
            'detail_label' => 'nullable|string|max:255',
            'detail_value' => 'nullable|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        if ($request->hasFile('image_path')) {
            if ($fasilita->image_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($fasilita->image_path);
            }

            $file = $request->file('image_path');
            $filename = Str::uuid() . '.webp';
            $path = 'fasilitas/' . $filename;

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file->getPathname());
            $image->scaleDown(width: 1200, height: 1200);
            $encoded = $image->toWebp(75);

            \Illuminate\Support\Facades\Storage::disk('public')->put($path, (string) $encoded);
            $validated['image_path'] = $path;
        }

        $fasilita->update($validated);
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui!');
    }

    public function destroy(Fasilitas $fasilita)
    {
        if ($fasilita->image_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($fasilita->image_path);
        }
        $fasilita->delete();
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus!');
    }
}
