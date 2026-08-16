<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use App\View\Composers\SiteSettingsComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // បង្ខំឱ្យ Laravel ប្រើ HTTPS ពេលនៅលើ Production (Railway)
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // ចងភ្ជាប់ View Composer សម្រាប់ទិន្នន័យ site_settings ទៅកាន់គ្រប់ View ទាំងអស់
        View::composer('*', SiteSettingsComposer::class);
    }
}