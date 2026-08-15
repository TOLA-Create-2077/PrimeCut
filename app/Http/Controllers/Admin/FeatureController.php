<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::orderBy('sort_order')->get();
        return view('admin.features.index', compact('features'));
    }

    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        $imagePath = $feature->image_path;

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            // Store new image
            $imagePath = $request->file('image')->store('features', 'public');
        }

        $feature->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.features.index')->with('success', 'Feature item updated successfully!');
    }
}