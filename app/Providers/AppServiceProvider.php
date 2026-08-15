<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // បន្ថែម namespace នេះ

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
    }
}