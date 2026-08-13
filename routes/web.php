<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// ទំព័រដើម (Home Page)
Route::get('/', function () {
    return view('index');
});

// ទំព័រផលិតផល (Products Page)
Route::get('/products', function () {
    return view('products');
});