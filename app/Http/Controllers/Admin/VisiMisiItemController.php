<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisiMisiItem;
use Illuminate\Http\Request;

class VisiMisiItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required|in:visi,misi',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'icon' => 'nullable|string',
        ]);

        VisiMisiItem::create($request->all());

        return redirect()->back()->with('success', 'Item Visi/Misi berhasil ditambahkan.');
    }

    public function update(Request $request, VisiMisiItem $visi_misi_item)
    {
        $request->validate([
            'tipe' => 'required|in:visi,misi',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'icon' => 'nullable|string',
        ]);

        $visi_misi_item->update($request->all());

        return redirect()->back()->with('success', 'Item Visi/Misi berhasil diperbarui.');
    }

    public function destroy(VisiMisiItem $visi_misi_item)
    {
        $visi_misi_item->delete();
        return redirect()->back()->with('success', 'Item Visi/Misi berhasil dihapus.');
    }
}
