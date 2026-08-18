<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- ទាញយកតម្លៃពណ៌ពី database មកដាក់បញ្ចូលជា style បន្ទាន់ទប់ស្កាត់ការញាក់ (Flicker Fix) -->
        <style>
            body {
                background-color: {{ isset($settings) && is_iterable($settings) ? ($settings['body_bg'] ?? '#0a0808') : '#0a0808' }};
            }
        </style>
    </head>
    <body class="font-sans antialiased text-[#f5efef]" style="background-color: {{ isset($settings) && is_iterable($settings) ? ($settings['body_bg'] ?? '#0a0808') : '#0a0808' }};">
        <div class="min-h-screen" style="background-color: {{ isset($settings) && is_iterable($settings) ? ($settings['body_bg'] ?? '#0a0808') : '#0a0808' }};">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-[#0e0909] border-b border-[#c41e3a]/15 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-[#f5efef]">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>