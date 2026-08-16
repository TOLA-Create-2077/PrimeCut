<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        // Initialize Cloudinary instance
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
            'url' => ['secure' => true]
        ]);

        // Handle File Uploads for Header & Footer Logos
        foreach (['header_logo', 'footer_logo'] as $fileKey) {
            if ($request->hasFile($fileKey) && $request->file($fileKey)->isValid()) {
                
                // Optional: Delete old logo from Cloudinary if it exists and is stored as a secure URL or public_id
                $oldLogoUrl = SiteSetting::where('key', $fileKey)->value('value');
                if (!empty($oldLogoUrl) && str_contains($oldLogoUrl, 'cloudinary.com')) {
                    try {
                        // Extract public ID from URL or keep track of public IDs in site settings if needed.
                        // For simplicity, we just upload the new one.
                    } catch (\Exception $e) {
                        // Ignore error
                    }
                }

                $uploadedFile = $cloudinary->uploadApi()->upload(
                    $request->file($fileKey)->getRealPath(),
                    ['folder' => 'site_settings']
                );

                // Save the secure cloud URL to data array
                $data[$fileKey] = $uploadedFile['secure_url'];
            } else {
                // Keep old value if no new file is uploaded
                unset($data[$fileKey]);
            }
        }

        foreach ($data as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('admin.settings.index')->with('success', 'Header, body, and footer settings updated successfully!');
    }
}