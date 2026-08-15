<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::orderBy('sort_order')->get();
        return view('admin.features.index', compact('features'));
    }

    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:20480',
        ]);

        $imagePath = $feature->image_path;
        $imagePublicId = $feature->image_public_id ?? null;

        // Handle Cloudinary Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
                'url' => ['secure' => true]
            ]);

            // លុបរូបភាពចាស់ចេញពី Cloudinary បើមាន
            if (!empty($imagePublicId)) {
                try {
                    $cloudinary->uploadApi()->destroy($imagePublicId);
                } catch (\Exception $e) {
                    // Ignore error if not found
                }
            }

            // Upload រូបភាពថ្មីទៅកាន់ Cloudinary
            $uploadedFile = $cloudinary->uploadApi()->upload(
                $request->file('image')->getRealPath(),
                ['folder' => 'features']
            );

            $imagePath = $uploadedFile['secure_url'];
            $imagePublicId = $uploadedFile['public_id'];
        }

        $feature->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image_path' => $imagePath,
            'image_public_id' => $imagePublicId, // រក្សាទុក Public ID សម្រាប់ងាយស្រួលលុបថ្ងៃក្រោយ
        ]);

        return redirect()->route('admin.features.index')->with('success', 'Feature item updated successfully!');
    }
}