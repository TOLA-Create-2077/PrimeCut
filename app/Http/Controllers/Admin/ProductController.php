<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:50',
            'grade' => 'required|string|max:50',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,bmp,svg,heic,heif|max:20480',
        ]);

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

            $uploadedFile = $cloudinary->uploadApi()->upload(
                $request->file('image')->getRealPath(),
                ['folder' => 'products']
            );

            $validated['image_path'] = $uploadedFile['secure_url'];
            $validated['image_public_id'] = $uploadedFile['public_id'];
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:50',
            'grade' => 'required|string|max:50',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,bmp,svg,heic,heif|max:20480',
        ]);

        // Handle Cloudinary Image Update
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
            if (!empty($product->image_public_id)) {
                try {
                    $cloudinary->uploadApi()->destroy($product->image_public_id);
                } catch (\Exception $e) {
                    // Ignore error
                }
            }

            $uploadedFile = $cloudinary->uploadApi()->upload(
                $request->file('image')->getRealPath(),
                ['folder' => 'products']
            );

            $validated['image_path'] = $uploadedFile['secure_url'];
            $validated['image_public_id'] = $uploadedFile['public_id'];
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        // លុបរូបភាពចេញពី Cloudinary ពេលលុបទិន្នន័យ
        if (!empty($product->image_public_id)) {
            try {
                $cloudinary = new Cloudinary([
                    'cloud' => [
                        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                        'api_key'    => env('CLOUDINARY_API_KEY'),
                        'api_secret' => env('CLOUDINARY_API_SECRET'),
                    ],
                    'url' => ['secure' => true]
                ]);
                $cloudinary->uploadApi()->destroy($product->image_public_id);
            } catch (\Exception $e) {
                // Ignore error
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}