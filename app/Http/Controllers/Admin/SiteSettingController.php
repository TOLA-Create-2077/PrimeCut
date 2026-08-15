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
        $data = $request->except('_token', '_method');

        // Initialize Cloudinary instance
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

        // Handle File/Image uploads if present in settings (e.g., site_logo, favicon)
        foreach ($request->files as $key => $file) {
            if ($file && $file->isValid()) {
                // ស្វែងរក Setting ចាស់ដើម្បីលុប Public ID ចាស់ចោលបើមាន
                $oldSetting = SiteSetting::where('key', $key)->first();
                $oldPublicIdKey = $key . '_public_id';
                $oldPublicIdSetting = SiteSetting::where('key', $oldPublicIdKey)->first();

                if ($oldPublicIdSetting && !empty($oldPublicIdSetting->value)) {
                    try {
                        $cloudinary->uploadApi()->destroy($oldPublicIdSetting->value);
                    } catch (\Exception $e) {
                        // Ignore error
                    }
                }

                // Upload រូបភាពថ្មីទៅ Cloudinary
                $uploadedFile = $cloudinary->uploadApi()->upload(
                    $file->getRealPath(),
                    ['folder' => 'site-settings']
                );

                // ដាក់តម្លៃ URL ចូលក្នុង data array
                $data[$key] = $uploadedFile['secure_url'];
                
                // រក្សាទុក Public ID ក្នុង database ផងដែរដើម្បីងាយស្រួលលុបថ្ងៃក្រោយ
                SiteSetting::updateOrCreate(
                    ['key' => $oldPublicIdKey],
                    ['value' => $uploadedFile['public_id']]
                );
            }
        }

        // រក្សាទុកទិន្នន័យផ្សេងៗទៀត
        foreach ($data as $key => $value) {
            // កុំបញ្ចូល _public_id ជាន់គ្នាពីរដង ព្រោះវាត្រូវបាន handle រួចហើយខាងលើ
            if (str_ends_with($key, '_public_id') && $request->hasFile(str_replace('_public_id', '', $key))) {
                continue;
            }

            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value ?? '']
            );
        }

        return redirect()->route('admin.settings.index')->with('success', 'Contact and site settings updated successfully.');
    }
}