<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class HomePageController extends Controller
{
    public function index()
    {
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
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,bmp,svg,heic,heif|max:20480',
        ]);

        // เริ่มต้นใช้งาน Cloudinary ໂດຍตรงจาก .env
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

        // Ensure a file was actually uploaded and is valid
        if ($request->hasFile('hero_image') && $request->file('hero_image')->isValid()) {
            
            // Delete existing image on Cloudinary if public_id exists
            if (!empty($home->hero_image_public_id)) {
                try {
                    $cloudinary->uploadApi()->destroy($home->hero_image_public_id);
                } catch (\Exception $e) {
                    // Ignore error if old image is not found
                }
            }

            // Upload new image to Cloudinary in 'hero' folder
            $uploadedFile = $cloudinary->uploadApi()->upload(
                $request->file('hero_image')->getRealPath(),
                ['folder' => 'hero']
            );

            $validated['hero_image'] = $uploadedFile['secure_url'];
            $validated['hero_image_url'] = $uploadedFile['secure_url'];
            $validated['hero_image_public_id'] = $uploadedFile['public_id'];
        } else {
            // Keep existing values if no new file was uploaded
            unset($validated['hero_image']);
        }

        $home->update($validated);

        return redirect()->back()->with('success', 'Homepage content updated successfully.');
    }
}