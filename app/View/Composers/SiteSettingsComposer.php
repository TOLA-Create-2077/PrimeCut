<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class SiteSettingsComposer
{
    public function compose(View $view)
    {
        // Fetch all key-value pairs from site_settings table and key them by 'key'
        $settings = DB::table('site_settings')->pluck('value', 'key');

        // Share the settings array with the view
        $view->with('settings', $settings);
    }
}