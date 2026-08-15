<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessSolution;
use Illuminate\Http\Request;

class BusinessSolutionController extends Controller
{
    public function index()
    {
        $solutions = BusinessSolution::orderBy('sort_order')->get();
        return view('admin.business-solutions.index', compact('solutions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon_svg' => 'required|string',
        ]);

        BusinessSolution::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon_svg' => $request->icon_svg,
            'sort_order' => BusinessSolution::max('sort_order') + 1,
        ]);

        return redirect()->route('admin.solutions.index')->with('success', 'Solution added successfully.');
    }

    public function update(Request $request, BusinessSolution $solution)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon_svg' => 'required|string',
        ]);

        $solution->update($request->only(['title', 'description', 'icon_svg']));

        return redirect()->route('admin.solutions.index')->with('success', 'Solution updated successfully.');
    }

    public function destroy(BusinessSolution $solution)
    {
        $solution->delete();
        return redirect()->route('admin.solutions.index')->with('success', 'Solution deleted successfully.');
    }
}