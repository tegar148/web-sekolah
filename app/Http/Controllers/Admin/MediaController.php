<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $collection = $request->get('collection', 'all');

        $query = Media::latest();
        if ($collection !== 'all') {
            $query->where('collection', $collection);
        }

        $media = $query->paginate(12);
        $collections = Media::select('collection')->distinct()->pluck('collection');

        return view('admin.media.index', compact('media', 'collection', 'collections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'files'      => 'required',
            'files.*'    => 'image|mimes:jpeg,png,jpg,gif,webp|max:51200', // Allow up to 50MB before compression
            'collection' => 'required|string|max:50',
            'alt_text'   => 'nullable|string|max:255',
        ]);

        $uploaded = 0;
        $manager = new ImageManager(new Driver());

        foreach ($request->file('files') as $file) {
            $filename = Str::uuid() . '.webp';
            $path = 'media/' . $request->collection . '/' . $filename;

            // Compress and convert image
            $image = $manager->read($file->getPathname());
            $image->scaleDown(width: 1920, height: 1920);
            $encoded = $image->toWebp(75);

            Storage::disk('public')->put($path, (string) $encoded);

            Media::create([
                'filename'      => $filename,
                'original_name' => $file->getClientOriginalName(),
                'path'          => $path,
                'mime_type'     => 'image/webp',
                'size'          => strlen((string) $encoded),
                'alt_text'      => $request->alt_text,
                'collection'    => $request->collection,
            ]);

            $uploaded++;
        }

        return back()->with('success', "{$uploaded} file berhasil diupload dan dikompresi!");
    }

    public function edit(Media $media)
    {
        return view('admin.media.edit', compact('media'));
    }

    public function update(Request $request, Media $media)
    {
        $request->validate([
            'collection' => 'required|string|max:50',
            'alt_text'   => 'nullable|string|max:255',
        ]);

        $media->update([
            'alt_text'   => $request->alt_text,
            'collection' => $request->collection,
        ]);

        return redirect()->route('admin.media.index')->with('success', 'Detail media berhasil diperbarui!');
    }

    public function destroy(Media $media)
    {
        Storage::disk('public')->delete($media->path);
        $media->delete();

        return back()->with('success', 'File berhasil dihapus!');
    }
}
