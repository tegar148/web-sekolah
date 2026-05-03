<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SejarahItem;
use Illuminate\Http\Request;

class SejarahItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|string|max:4',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        SejarahItem::create($request->all());

        return redirect()->back()->with('success', 'Item sejarah berhasil ditambahkan.');
    }

    public function update(Request $request, SejarahItem $sejarah_item)
    {
        $request->validate([
            'tahun' => 'required|string|max:4',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $sejarah_item->update($request->all());

        return redirect()->back()->with('success', 'Item sejarah berhasil diperbarui.');
    }

    public function destroy(SejarahItem $sejarah_item)
    {
        $sejarah_item->delete();
        return redirect()->back()->with('success', 'Item sejarah berhasil dihapus.');
    }
}
