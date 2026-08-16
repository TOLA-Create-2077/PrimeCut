<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Cuts - Luxury Meat Solutions</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white font-sans antialiased m-0 p-0 overflow-x-hidden selection:bg-[#8b1e1e] selection:text-white">

    <!-- Header Component -->
    <x-header />

    <!-- Main Content Sections -->
    <main>
        <!-- Hero Section -->
        @include('partials.home')

        <!-- Feature Bar Section -->
        @include('partials.feature-bar')

        <!-- About Section -->
        @include('partials.about')

        <!-- Advantage / Why Choose Us Section -->
        @include('partials.advantage')

        <!-- Business Solutions Section -->
        @include('partials.business-solutions')

        <!-- Quality Assurance Section -->
        @include('partials.quality-assurance')

        <!-- Contact Section -->
        @include('partials.contact')

    </main>

    <!-- Footer Component -->
    <x-footer />

</body>
</html>