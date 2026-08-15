<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cloudinary\Cloudinary;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20480',
        ]);

        // បង្កើត Slug ស្វ័យប្រវត្តិប្រសិនបើមិនបានបញ្ជាក់
        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);

        // Handle Category Image Upload with Cloudinary
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
                ['folder' => 'categories']
            );

            $validated['image'] = $uploadedFile['secure_url'];
            $validated['image_public_id'] = $uploadedFile['public_id'];
        }

        $validated['slug'] = $slug;
        $validated['name'] = ucwords($request->name);

        // បង្កើតឬធ្វើបច្ចុប្បន្នភាព Category
        Category::updateOrCreate(
            ['slug' => $slug],
            $validated
        );

        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully!');
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20480',
        ]);

        $oldSlug = $category->slug;
        $newSlug = Str::slug($request->slug);
        $validated['slug'] = $newSlug;
        $validated['name'] = ucwords($request->name);

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
            if (!empty($category->image_public_id)) {
                try {
                    $cloudinary->uploadApi()->destroy($category->image_public_id);
                } catch (\Exception $e) {
                    // Ignore error if not found
                }
            }

            $uploadedFile = $cloudinary->uploadApi()->upload(
                $request->file('image')->getRealPath(),
                ['folder' => 'categories']
            );

            $validated['image'] = $uploadedFile['secure_url'];
            $validated['image_public_id'] = $uploadedFile['public_id'];
        } else {
            // រក្សារូបភាពចាស់ទុក ប្រសិនបើគ្មានការ Upload រូបថ្មី
            unset($validated['image']);
        }

        $category->update($validated);

        // កែប្រែ Slug ក្នុងតារាង Products ផងដែរ ប្រសិនបើមានការប្តូរ Slug
        if ($oldSlug !== $newSlug) {
            Product::where('category', $oldSlug)->update(['category' => $newSlug]);
        }

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        // លុបរូបភាពចេញពី Cloudinary ពេលលុប Category
        if (!empty($category->image_public_id)) {
            try {
                $cloudinary = new Cloudinary([
                    'cloud' => [
                        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                        'api_key'    => env('CLOUDINARY_API_KEY'),
                        'api_secret' => env('CLOUDINARY_API_SECRET'),
                    ],
                    'url' => ['secure' => true]
                ]);
                $cloudinary->uploadApi()->destroy($category->image_public_id);
            } catch (\Exception $e) {
                // Ignore error
            }
        }
        
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }
}