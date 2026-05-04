<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'icon_color' => 'nullable|string',
            'schedule_label' => 'nullable|string',
            'schedule_value' => 'nullable|string',
            'info_label' => 'nullable|string',
            'info_value' => 'nullable|string',
        ]);

        Ekstrakurikuler::create($validated);

        return back()->with('success', 'Ekstrakurikuler berhasil ditambahkan!');
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'icon_color' => 'nullable|string',
            'schedule_label' => 'nullable|string',
            'schedule_value' => 'nullable|string',
            'info_label' => 'nullable|string',
            'info_value' => 'nullable|string',
        ]);

        $ekstrakurikuler->update($validated);

        return back()->with('success', 'Ekstrakurikuler berhasil diperbarui!');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->delete();
        return back()->with('success', 'Ekstrakurikuler berhasil dihapus!');
    }
}
