<?php

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null) {
        $settings = \Illuminate\Support\Facades\Cache::get('site_settings', []);
        return $settings[$key] ?? $default;
    }
}