<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Cuts - Products</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body class="bg-black text-white font-sans antialiased m-0 p-0 overflow-x-hidden selection:bg-[#8b1e1e] selection:text-white">

    <!-- Header Component -->
    <x-header />

    <!-- Main Content Sections -->
    <main>
        @include('partials.products')
        @include('partials.contact')
    </main>

    <!-- Footer Component -->
    <x-footer />

</body>
</html>