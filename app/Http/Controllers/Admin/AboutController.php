<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

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
            'image_one' => 'nullable|image|mimes:jpeg,png,jpg,webp,bmp,svg,heic,heif|max:20480',
            'image_two' => 'nullable|image|mimes:jpeg,png,jpg,webp,bmp,svg,heic,heif|max:20480',
        ]);

        $about = About::findOrFail(1);

        // Initialize Cloudinary instance directly from .env
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
            'url' => [
                'secure' => true
            ]
        ]);

        // Handle Image One Upload
        if ($request->hasFile('image_one') && $request->file('image_one')->isValid()) {
            if (!empty($about->image_one_public_id)) {
                try {
                    $cloudinary->uploadApi()->destroy($about->image_one_public_id);
                } catch (\Exception $e) {
                    // Ignore error if old image not found
                }
            }

            $uploadedFile = $cloudinary->uploadApi()->upload(
                $request->file('image_one')->getRealPath(),
                ['folder' => 'about']
            );

            $validated['image_one'] = $uploadedFile['secure_url'];
            // ប្រសិនបើអ្នកមាន column សម្រាប់ URL និង Public ID ផ្ទាល់ខ្លួន អាចបន្ថែមខាងក្រោមនេះបាន (បើគ្មានទេ អាចលុបចេញវិញ)
            // $validated['image_one_url'] = $uploadedFile['secure_url'];
            // $validated['image_one_public_id'] = $uploadedFile['public_id'];
        } else {
            unset($validated['image_one']);
        }

        // Handle Image Two Upload
        if ($request->hasFile('image_two') && $request->file('image_two')->isValid()) {
            if (!empty($about->image_two_public_id)) {
                try {
                    $cloudinary->uploadApi()->destroy($about->image_two_public_id);
                } catch (\Exception $e) {
                    // Ignore error if old image not found
                }
            }

            $uploadedFile = $cloudinary->uploadApi()->upload(
                $request->file('image_two')->getRealPath(),
                ['folder' => 'about']
            );

            $validated['image_two'] = $uploadedFile['secure_url'];
            // $validated['image_two_url'] = $uploadedFile['secure_url'];
            // $validated['image_two_public_id'] = $uploadedFile['public_id'];
        } else {
            unset($validated['image_two']);
        }

        $about->update($validated);

        return redirect()->route('admin.about.index')->with('success', 'About Us section updated successfully!');
    }
}