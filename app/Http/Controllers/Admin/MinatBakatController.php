<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MinatBakat;
use Illuminate\Http\Request;

class MinatBakatController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'detail_link' => 'nullable|string|max:255',
        ]);

        MinatBakat::create($validated);

        return back()->with('success', 'Minat & Bakat berhasil ditambahkan.');
    }

    public function update(Request $request, MinatBakat $minat_bakat)
    {
        $validated = $request->validate([
            'category' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'detail_link' => 'nullable|string|max:255',
        ]);

        $minat_bakat->update($validated);

        return back()->with('success', 'Minat & Bakat berhasil diperbarui.');
    }

    public function destroy(MinatBakat $minat_bakat)
    {
        $minat_bakat->delete();

        return back()->with('success', 'Minat & Bakat berhasil dihapus.');
    }
}
