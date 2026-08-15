<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // បង្កើត Slug ស្វ័យប្រវត្តិប្រសិនបើមិនបានបញ្ជាក់
        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);

        // Handle Category Image Upload (រក្សាទុកក្នុងថត categories ស្រដៀងនឹង Product)
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('categories', 'public');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $oldSlug = $category->slug;
        $newSlug = Str::slug($request->slug);
        $validated['slug'] = $newSlug;

        if ($request->hasFile('image')) {
            // លុប Image ចាស់ចេញបើមាន និងមានឯកសារពិតប្រាកដក្នុង Storage
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }
            $validated['image'] = $request->file('image')->store('categories', 'public');
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
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }
        
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }
}