<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::latest()->paginate(12);
        return view('admin.guru.index', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'subject'    => 'required|string|max:255',
            'nuptk'      => 'nullable|string|max:50',
            'status'     => 'nullable|string|max:50',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:51200',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $filename = Str::uuid() . '.webp';
            $path     = 'guru/' . $filename;

            $manager = new ImageManager(new Driver());
            $image   = $manager->read($file->getPathname());
            // Square crop/fit for avatars is common, but let's just scale down for now
            $image->scaleDown(width: 800, height: 800);
            $encoded = $image->toWebp(80);

            Storage::disk('public')->put($path, (string) $encoded);
        }

        Guru::create([
            'name'       => $request->name,
            'department' => $request->department,
            'subject'    => $request->subject,
            'nuptk'      => $request->nuptk,
            'status'     => $request->status,
            'image_path' => $path,
        ]);

        return back()->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'subject'    => 'required|string|max:255',
            'nuptk'      => 'nullable|string|max:50',
            'status'     => 'nullable|string|max:50',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:51200',
        ]);

        $path = $guru->image_path;
        if ($request->hasFile('image')) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            $file     = $request->file('image');
            $filename = Str::uuid() . '.webp';
            $path     = 'guru/' . $filename;

            $manager = new ImageManager(new Driver());
            $image   = $manager->read($file->getPathname());
            $image->scaleDown(width: 800, height: 800);
            $encoded = $image->toWebp(80);

            Storage::disk('public')->put($path, (string) $encoded);
        }

        $guru->update([
            'name'       => $request->name,
            'department' => $request->department,
            'subject'    => $request->subject,
            'nuptk'      => $request->nuptk,
            'status'     => $request->status,
            'image_path' => $path,
        ]);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy(Guru $guru)
    {
        if ($guru->image_path) {
            Storage::disk('public')->delete($guru->image_path);
        }
        $guru->delete();

        return back()->with('success', 'Data guru berhasil dihapus!');
    }
}
