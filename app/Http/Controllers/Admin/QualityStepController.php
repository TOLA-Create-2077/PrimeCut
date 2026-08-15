<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QualityStep;
use Illuminate\Http\Request;

class QualityStepController extends Controller
{
    public function index()
    {
        $qualitySteps = QualityStep::orderBy('id', 'asc')->get();
        return view('admin.quality.index', compact('qualitySteps'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'step_number' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        QualityStep::create($request->all());

        return redirect()->route('admin.quality.index')->with('success', 'Quality step added successfully.');
    }

    public function update(Request $request, QualityStep $quality)
    {
        $request->validate([
            'step_number' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $quality->update($request->all());

        return redirect()->route('admin.quality.index')->with('success', 'Quality step updated successfully.');
    }

    public function destroy(QualityStep $quality)
    {
        $quality->delete();

        return redirect()->route('admin.quality.index')->with('success', 'Quality step deleted successfully.');
    }
}