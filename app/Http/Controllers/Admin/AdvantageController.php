<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use Illuminate\Http\Request;

class AdvantageController extends Controller
{
    public function index()
    {
        $advantages = Advantage::orderBy('sort_order')->get();
        return view('admin.advantages.index', compact('advantages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon_svg' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        Advantage::create($request->all());

        return redirect()->route('admin.advantages.index')->with('success', 'Advantage card added successfully!');
    }

    public function update(Request $request, Advantage $advantage)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon_svg' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $advantage->update($request->all());

        return redirect()->route('admin.advantages.index')->with('success', 'Advantage card updated successfully!');
    }

    public function destroy(Advantage $advantage)
    {
        $advantage->delete();
        return redirect()->route('admin.advantages.index')->with('success', 'Advantage card deleted successfully!');
    }
}