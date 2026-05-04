<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PpdbRequirement;
use App\Models\PpdbTimeline;
use App\Models\PpdbStep;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    // Requirements
    public function storeRequirement(Request $request)
    {
        $validated = $request->validate(['description' => 'required|string']);
        PpdbRequirement::create($validated);
        return back()->with('success', 'Persyaratan ditambahkan!');
    }

    public function updateRequirement(Request $request, PpdbRequirement $requirement)
    {
        $validated = $request->validate(['description' => 'required|string']);
        $requirement->update($validated);
        return back()->with('success', 'Persyaratan diperbarui!');
    }

    public function destroyRequirement(PpdbRequirement $requirement)
    {
        $requirement->delete();
        return back()->with('success', 'Persyaratan dihapus!');
    }

    // Timelines
    public function storeTimeline(Request $request)
    {
        $validated = $request->validate([
            'date_label' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string'
        ]);
        PpdbTimeline::create($validated);
        return back()->with('success', 'Jadwal ditambahkan!');
    }

    public function updateTimeline(Request $request, PpdbTimeline $timeline)
    {
        $validated = $request->validate([
            'date_label' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string'
        ]);
        $timeline->update($validated);
        return back()->with('success', 'Jadwal diperbarui!');
    }

    public function destroyTimeline(PpdbTimeline $timeline)
    {
        $timeline->delete();
        return back()->with('success', 'Jadwal dihapus!');
    }

    // Steps
    public function storeStep(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'icon' => 'nullable|string'
        ]);
        PpdbStep::create($validated);
        return back()->with('success', 'Langkah ditambahkan!');
    }

    public function updateStep(Request $request, PpdbStep $step)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'icon' => 'nullable|string'
        ]);
        $step->update($validated);
        return back()->with('success', 'Langkah diperbarui!');
    }

    public function destroyStep(PpdbStep $step)
    {
        $step->delete();
        return back()->with('success', 'Langkah dihapus!');
    }
}
