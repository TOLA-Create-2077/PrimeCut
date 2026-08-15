<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::firstOrCreate([
            'id' => 1
        ], [
            'eyebrow' => 'About Prime Cuts',
            'title' => "Phnom Penh's Premium Meat Supplier",
            'highlight_title' => 'Meat Supplier',
            'description_one' => 'Prime Cuts partners with trusted farms...',
            'description_two' => 'From carefully selected ribeye...',
            'badge_year' => 'Since 2018',
            'badge_text' => 'Trusted Quality',
        ]);

        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'eyebrow' => 'required|string|max:255',
            'title' => 'required|string|max:2000',
            'highlight_title' => 'required|string|max:255',
            'description_one' => 'required|string',
            'description_two' => 'required|string',
            'badge_year' => 'required|string|max:50',
            'badge_text' => 'required|string|max:100',
            // Supports all image formats up to 20MB (20480 KB)
            'image_one' => 'nullable|image|mimes:jpeg,png,jpg,webp,bmp,svg,heic,heif|max:20480',
            'image_two' => 'nullable|image|mimes:jpeg,png,jpg,webp,bmp,svg,heic,heif|max:20480',
        ]);

        $about = About::findOrFail(1);

        // Handle Image One Upload
        if ($request->hasFile('image_one')) {
            if ($about->image_one && Storage::disk('public')->exists($about->image_one)) {
                Storage::disk('public')->delete($about->image_one);
            }
            $validated['image_one'] = $request->file('image_one')->store('about', 'public');
        } else {
            // Keep old image path if no new file is uploaded
            $validated['image_one'] = $about->image_one;
        }

        // Handle Image Two Upload
        if ($request->hasFile('image_two')) {
            if ($about->image_two && Storage::disk('public')->exists($about->image_two)) {
                Storage::disk('public')->delete($about->image_two);
            }
            $validated['image_two'] = $request->file('image_two')->store('about', 'public');
        } else {
            // Keep old image path if no new file is uploaded
            $validated['image_two'] = $about->image_two;
        }

        $about->update($validated);

        return redirect()->route('admin.about.index')->with('success', 'About Us section updated successfully!');
    }
}