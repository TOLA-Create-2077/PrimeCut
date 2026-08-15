<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdvantageController;
use App\Http\Controllers\Admin\BusinessSolutionController;
use App\Http\Controllers\Admin\QualityStepController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\HomePage;
use App\Models\SiteSetting;
use App\Models\Feature;
use App\Models\BusinessSolution;
use App\Models\QualityStep;
use App\Models\About;
use Illuminate\Support\Facades\Route;

// --- Public Routes ---
Route::get('/', function () {
    $home = HomePage::first();
    $settings = SiteSetting::all()->pluck('value', 'key');
    $features = Feature::all();
    $solutions = BusinessSolution::all();
    $qualitySteps = QualityStep::all();
    $about = About::first();
    
    return view('index', compact('home', 'settings', 'features', 'solutions', 'qualitySteps', 'about'));
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// --- Custom Authentication Routes ---
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// --- Authenticated Dashboard Shortcut ---
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// --- User Profile Routes ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- Admin Routes (Fully Protected by Auth Middleware) ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Admin Homepage Content Editor Routes (FIXED: Added /{home} for route model binding)
    Route::get('/home', [HomePageController::class, 'index'])->name('home.index');
    Route::put('/home/{home}', [HomePageController::class, 'update'])->name('home.update');

    // Admin Feature Bar Management Routes
    Route::get('/features', [FeatureController::class, 'index'])->name('features.index');
    Route::put('/features/{feature}', [FeatureController::class, 'update'])->name('features.update');

    // Admin About Section Management Routes
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::put('/about', [AboutController::class, 'update'])->name('about.update');

    // Admin Advantage Section Management Routes
    Route::get('/advantages', [AdvantageController::class, 'index'])->name('advantages.index');
    Route::post('/advantages', [AdvantageController::class, 'store'])->name('advantages.store');
    Route::put('/advantages/{advantage}', [AdvantageController::class, 'update'])->name('advantages.update');
    Route::delete('/advantages/{advantage}', [AdvantageController::class, 'destroy'])->name('advantages.destroy');

    // Admin Business Solutions Section Management Routes
    Route::get('/solutions', [BusinessSolutionController::class, 'index'])->name('solutions.index');
    Route::post('/solutions', [BusinessSolutionController::class, 'store'])->name('solutions.store');
    Route::put('/solutions/{solution}', [BusinessSolutionController::class, 'update'])->name('solutions.update');
    Route::delete('/solutions/{solution}', [BusinessSolutionController::class, 'destroy'])->name('solutions.destroy');

    // Admin Quality Process Management Routes
    Route::resource('quality', QualityStepController::class);

    // Admin Category Management Routes (Resource handles index, store, edit, update, destroy)
    Route::resource('categories', CategoryController::class)->except(['show']);

    // Admin Product Routes
    Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');

    // Admin User Management Routes (Resource handles index, create, store, edit, update, destroy)
    Route::resource('users', UserController::class)->except(['show']);

    // Admin Settings Management Routes
    Route::get('/settings', [SiteSettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SiteSettingController::class, 'update'])->name('settings.update');
});