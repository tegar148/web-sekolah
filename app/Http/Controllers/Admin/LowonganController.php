<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class LowonganController extends Controller
{
    public function index()
    {
        $lowongans = Lowongan::latest()->paginate(10);
        return view('admin.lowongan.index', compact('lowongans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'company'      => 'required|string|max:255',
            'location'     => 'required|string|max:255',
            'deadline'     => 'required|date',
            'type'         => 'required|string|max:50',
            'salary_range' => 'nullable|string|max:100',
            'status_label' => 'nullable|string|max:50',
            'link'         => 'nullable|url|max:255',
            'logo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:51200',
        ]);

        $path = null;
        if ($request->hasFile('logo')) {
            $file     = $request->file('logo');
            $filename = Str::uuid() . '.webp';
            $path     = 'lowongan/' . $filename;

            $manager = new ImageManager(new Driver());
            $image   = $manager->read($file->getPathname());
            $image->scaleDown(width: 800, height: 800);
            $encoded = $image->toWebp(80);

            Storage::disk('public')->put($path, (string) $encoded);
        }

        Lowongan::create([
            'title'        => $request->title,
            'company'      => $request->company,
            'location'     => $request->location,
            'deadline'     => $request->deadline,
            'type'         => $request->type,
            'salary_range' => $request->salary_range,
            'status_label' => $request->status_label,
            'link'         => $request->link,
            'logo_path'    => $path,
        ]);

        return back()->with('success', 'Data lowongan berhasil ditambahkan!');
    }

    public function edit(Lowongan $lowongan)
    {
        return view('admin.lowongan.edit', compact('lowongan'));
    }

    public function update(Request $request, Lowongan $lowongan)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'company'      => 'required|string|max:255',
            'location'     => 'required|string|max:255',
            'deadline'     => 'required|date',
            'type'         => 'required|string|max:50',
            'salary_range' => 'nullable|string|max:100',
            'status_label' => 'nullable|string|max:50',
            'link'         => 'nullable|url|max:255',
            'logo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:51200',
        ]);

        $path = $lowongan->logo_path;
        if ($request->hasFile('logo')) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            $file     = $request->file('logo');
            $filename = Str::uuid() . '.webp';
            $path     = 'lowongan/' . $filename;

            $manager = new ImageManager(new Driver());
            $image   = $manager->read($file->getPathname());
            $image->scaleDown(width: 800, height: 800);
            $encoded = $image->toWebp(80);

            Storage::disk('public')->put($path, (string) $encoded);
        }

        $lowongan->update([
            'title'        => $request->title,
            'company'      => $request->company,
            'location'     => $request->location,
            'deadline'     => $request->deadline,
            'type'         => $request->type,
            'salary_range' => $request->salary_range,
            'status_label' => $request->status_label,
            'link'         => $request->link,
            'logo_path'    => $path,
        ]);

        return redirect()->route('admin.lowongan.index')->with('success', 'Data lowongan berhasil diperbarui!');
    }

    public function destroy(Lowongan $lowongan)
    {
        if ($lowongan->logo_path) {
            Storage::disk('public')->delete($lowongan->logo_path);
        }
        $lowongan->delete();

        return back()->with('success', 'Data lowongan berhasil dihapus!');
    }
}
