<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // ទាញយក Categories ទាំងអស់មកដើម្បីបង្ហាញលើ Tab Filter
        $categories = Category::all();

        // ពិនិត្យមើលថាតើมีการ Filter តាម category หรือไม่ (ทางเลือกเสริม)
        $query = Product::latest();

        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        // ប្រើប្រាស់ paginate ឬ get (ទីនេះប្រើ get() ស្របតាម Product::all() របស់អ្នក តែអាចប្តូរជា paginate ได้ถ้าต้องการ)
        $products = $query->get(); 

        return view('products', compact('products', 'categories'));
    }
}