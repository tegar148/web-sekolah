<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:50',
            'published_at' => 'required|date',
            'excerpt' => 'required|string|max:1000',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:51200',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::uuid() . '.webp';
            $path = 'berita/' . $filename;
            
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file->getPathname());
            $image->scaleDown(width: 1200, height: 1200);
            $encoded = $image->toWebp(75);
            
            Storage::disk('public')->put($path, (string) $encoded);
        }

        Berita::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::random(5),
            'category' => $request->category,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'published_at' => $request->published_at,
            'image_path' => $path,
        ]);

        return back()->with('success', 'Berita berhasil ditambahkan!');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->image_path) {
            Storage::disk('public')->delete($berita->image_path);
        }
        $berita->delete();

        return back()->with('success', 'Berita berhasil dihapus!');
    }
}
