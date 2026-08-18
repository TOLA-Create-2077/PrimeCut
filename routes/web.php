<?php

use App\Http\Controllers\ProfileController as FrontProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
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
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\ActivityLogController;
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

// --- Public Contact Form Submission (Ajax / Database & Email) ---
Route::post('/send-contact-email', [ContactController::class, 'send'])->name('contact.send');

// --- Custom Authentication Routes ---
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// --- Authenticated Dashboard Shortcut ---
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// --- User Profile Routes (Frontend) ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [FrontProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [FrontProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [FrontProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- Admin Routes (Fully Protected by Auth Middleware) ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Admin Profile Update & Password Change Routes
    Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/password', [AdminProfileController::class, 'updatePassword'])->name('profile.password');

    // Admin Orders Management Routes
    Route::resource('orders', OrderController::class)->except(['create', 'store']);

    // Admin Homepage Content Editor Routes
    Route::get('/home', [HomePageController::class, 'index'])->name('home.index');
    Route::put('/home/{home}', [HomePageController::class, 'update'])->name('home.update');

    // Admin Feature Bar Management Routes
    Route::get('/features', [FeatureController::class, 'index'])->name('features.index');
    Route::put('/features/{feature}', [FeatureController::class, 'update'])->name('features.update');

    // Admin Banners & Sliders Management Routes
    Route::resource('banners', BannerController::class)->except(['show']);

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

    // Admin Category Management Routes
    Route::resource('categories', CategoryController::class)->except(['show']);

    // Admin Product Routes
    Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');

    // Admin Customer Messages (Contact) Routes
    Route::resource('contacts', AdminContactController::class)->only(['index', 'show', 'destroy']);

    // Admin User Management Routes
    Route::resource('users', UserController::class)->except(['show']);

    // Admin Activity Logs Routes
    Route::get('/logs', [ActivityLogController::class, 'index'])->name('logs.index');

    // Admin Settings Management Routes
    Route::get('/settings', [SiteSettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SiteSettingController::class, 'update'])->name('settings.update');
});