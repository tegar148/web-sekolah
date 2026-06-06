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
        $isLinkMode = $request->filled('external_url');

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:50',
            'published_at' => 'required|date',
            'excerpt' => $isLinkMode ? 'nullable|string|max:1000' : 'required|string|max:1000',
            'content' => $isLinkMode ? 'nullable|string' : 'required|string',
            'external_url' => 'nullable|url|max:2000',
            'image' => $isLinkMode ? 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:51200' : 'required_without:image_url|nullable|image|mimes:jpeg,png,jpg,gif,webp|max:51200',
            'image_url' => 'nullable|url|max:2000',
        ]);

        $path = null;
        $imageUrl = null;

        if ($request->filled('image_url')) {
            $imageUrl = $request->image_url;
        } elseif ($request->hasFile('image')) {
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
            'image_url' => $imageUrl,
            'external_url' => $request->external_url,
        ]);

        return back()->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $isLinkMode = $request->filled('external_url');

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:50',
            'published_at' => 'required|date',
            'excerpt' => $isLinkMode ? 'nullable|string|max:1000' : 'required|string|max:1000',
            'content' => $isLinkMode ? 'nullable|string' : 'required|string',
            'external_url' => 'nullable|url|max:2000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:51200',
            'image_url' => 'nullable|url|max:2000',
        ]);

        $path = $berita->image_path;
        $imageUrl = $berita->image_url;

        if ($request->filled('image_url')) {
            if ($path) {
                Storage::disk('public')->delete($path);
                $path = null;
            }
            $imageUrl = $request->image_url;
        } elseif ($request->hasFile('image')) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            $file = $request->file('image');
            $filename = Str::uuid() . '.webp';
            $path = 'berita/' . $filename;
            
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file->getPathname());
            $image->scaleDown(width: 1200, height: 1200);
            $encoded = $image->toWebp(75);
            
            Storage::disk('public')->put($path, (string) $encoded);
            $imageUrl = null;
        }

        // Jika beralih ke link mode, hapus excerpt/content
        $excerpt = $isLinkMode ? null : $request->excerpt;
        $content = $isLinkMode ? null : $request->content;

        $berita->update([
            'title' => $request->title,
            'slug' => $berita->title !== $request->title ? Str::slug($request->title) . '-' . Str::random(5) : $berita->slug,
            'category' => $request->category,
            'excerpt' => $excerpt,
            'content' => $content,
            'published_at' => $request->published_at,
            'image_path' => $path,
            'image_url' => $imageUrl,
            'external_url' => $request->external_url,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->image_path) {
            Storage::disk('public')->delete($berita->image_path);
        }
        $berita->delete();

        return back()->with('success', 'Berita berhasil dihapus!');
    }

    public function fetchMeta(Request $request)
    {
        $url = $request->query('url');
        if (!$url || !filter_var($url, FILTER_VALIDATE_URL)) {
            return response()->json(['image_url' => null]);
        }

        // Handle YouTube specially for high-res thumbnails
        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $url, $matches)) {
            return response()->json(['image_url' => "https://img.youtube.com/vi/{$matches[1]}/maxresdefault.jpg"]);
        }

        // Handle other sites via Open Graph (og:image)
        try {
            $response = \Illuminate\Support\Facades\Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
            ])->timeout(5)->get($url);

            if ($response->successful()) {
                $html = $response->body();
                
                // Try format 1: property="og:image" content="..."
                if (preg_match('/<meta\s+(?:property|name)=[\'"]og:image[\'"]\s+content=[\'"]([^\'"]+)[\'"]/i', $html, $matches)) {
                    return response()->json(['image_url' => html_entity_decode($matches[1])]);
                }
                // Try format 2: content="..." property="og:image"
                if (preg_match('/<meta\s+content=[\'"]([^\'"]+)[\'"]\s+(?:property|name)=[\'"]og:image[\'"]/i', $html, $matches)) {
                    return response()->json(['image_url' => html_entity_decode($matches[1])]);
                }
            }
        } catch (\Exception $e) {
            // Silently fail if unable to fetch
        }

        return response()->json(['image_url' => null]);
    }
}
