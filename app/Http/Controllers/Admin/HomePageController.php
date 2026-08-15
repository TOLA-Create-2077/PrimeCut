<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    /**
     * Display the homepage management view.
     */
    public function index()
    {
        // Find or create default record if it doesn't exist in the database
        $home = HomePage::firstOrCreate([], [
            'subtitle' => 'Phnom Penh, Cambodia • Est. 2018',
            'title_line_1' => 'Premium Beef &',
            'title_highlight' => 'Quality Chicken,',
            'title_line_3' => 'Delivered Fresh',
            'description' => 'Supplying restaurants, hotels, caterers, and families with carefully selected premium meats every day.',
            'btn_explore_text' => 'Explore Products',
            'btn_explore_url' => '#products',
            'btn_contact_text' => 'Contact Sales',
            'btn_contact_url' => '#contact'
        ]);

        return view('admin.home.homepage', compact('home'));
    }

    /**
     * Update the specified homepage content in storage.
     */
    public function update(Request $request, HomePage $home)
    {
        $validated = $request->validate([
            'subtitle' => 'required|string|max:255',
            'title_line_1' => 'required|string|max:255',
            'title_highlight' => 'required|string|max:255',
            'title_line_3' => 'required|string|max:255',
            'description' => 'required|string',
            'btn_explore_text' => 'required|string|max:255',
            'btn_explore_url' => 'required|string|max:255',
            'btn_contact_text' => 'required|string|max:255',
            'btn_contact_url' => 'required|string|max:255',
            // Supports all image formats up to 20MB (20480 KB)
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,bmp,svg,heic,heif|max:20480',
        ]);

        // Handle Hero Image Upload
        if ($request->hasFile('hero_image')) {
            // Delete old image if exists
            if ($home->hero_image && Storage::disk('public')->exists($home->hero_image)) {
                Storage::disk('public')->delete($home->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('hero', 'public');
        } else {
            // Keep the old image if no new image was uploaded
            unset($validated['hero_image']);
        }

        $home->update($validated);

        return redirect()->back()->with('success', 'Homepage content updated successfully.');
    }
}