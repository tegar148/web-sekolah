<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'files.*'    => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'collection' => 'required|string|max:50',
            'alt_text'   => 'nullable|string|max:255',
        ]);

        $uploaded = 0;

        foreach ($request->file('files') as $file) {
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('media/' . $request->collection, $filename, 'public');

            Media::create([
                'filename'      => $filename,
                'original_name' => $file->getClientOriginalName(),
                'path'          => $path,
                'mime_type'     => $file->getMimeType(),
                'size'          => $file->getSize(),
                'alt_text'      => $request->alt_text,
                'collection'    => $request->collection,
            ]);

            $uploaded++;
        }

        return back()->with('success', "{$uploaded} file berhasil diupload!");
    }

    public function destroy(Media $media)
    {
        Storage::disk('public')->delete($media->path);
        $media->delete();

        return back()->with('success', 'File berhasil dihapus!');
    }
}
