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
        <!-- Page Header / Hero Section with Dynamic Content -->
        <section id="products" class="w-full relative h-64 sm:h-72 lg:h-80 flex flex-col justify-center px-4 sm:px-6 lg:px-12 border-b border-neutral-900 overflow-hidden bg-black">
            <!-- Background Image with Dark Overlay (Dynamic based on first category or default) -->
            <div class="absolute inset-0 z-0">
                @php
                    $firstCategory = $categories->first();
                    $bgImage = ($firstCategory && $firstCategory->image) ? asset('storage/' . $firstCategory->image) : asset('images/steak.jpg');
                @endphp
                <img id="hero-bg" src="{{ $bgImage }}" alt="Background Cuts" class="w-full h-full object-cover scale-105 transform transition-transform duration-1000 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/85 to-black/70"></div>
            </div>

            <!-- Content Container -->
            <div class="max-w-[90rem] mx-auto w-full relative z-10 space-y-2.5 page-header-anim opacity-0 translate-y-6 transition-all duration-700 ease-out">
                <!-- Breadcrumb -->
                <div class="flex items-center space-x-2 font-mono text-[0.6rem] sm:text-[0.7rem] tracking-[0.3em] uppercase text-zinc-500">
                    <a href="{{ url('/') }}" class="hover:text-white transition-colors">HOME</a>
                    <span>/</span>
                    <span class="text-[#8b1e1e]">PRODUCTS</span>
                </div>

                <!-- Subtitle / Category -->
                <p id="hero-subtitle" class="font-mono text-[#8b1e1e] text-[0.6rem] sm:text-[0.7rem] tracking-[0.3em] uppercase">OUR RANGE</p>

                <!-- Main Title -->
                <h1 id="hero-title" class="font-serif text-4xl sm:text-5xl lg:text-6xl text-white tracking-wide transition-opacity duration-300">
                    {{ $firstCategory->name ?? 'Our Products' }}
                </h1>

                <!-- Description -->
                <p id="hero-desc" class="text-zinc-400 text-sm sm:text-base font-light max-w-xl leading-relaxed transition-opacity duration-300">
                    {{ $firstCategory->description ?? 'Explore our high-quality selection.' }}
                </p>
            </div>
        </section>

        <!-- Category Filter Tabs Section (Dynamic from Database) -->
        <div class="w-full bg-black py-4 px-4 sm:px-6 lg:px-12 border-b border-neutral-900 filter-tabs-anim opacity-0 translate-y-6 transition-all duration-700 ease-out delay-150">
            <div class="max-w-[90rem] mx-auto flex justify-center">
                <div class="inline-flex border border-neutral-800/80 p-1 bg-[#080606]/90 backdrop-blur-sm flex-wrap justify-center gap-1">
                    @foreach($categories as $index => $category)
                        <button type="button" data-category="{{ $category->slug }}" data-image="{{ $category->image ? asset('storage/' . $category->image) : '' }}" class="tab-btn {{ $index === 0 ? 'bg-[#8b1e1e] text-white' : 'text-zinc-500 hover:text-zinc-300' }} px-6 sm:px-8 py-2.5 text-xs font-mono uppercase tracking-widest transition-all">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Products Grid Section (Pulled from Database) -->
        <section class="scroll-mt-24 w-full bg-black py-16 px-4 sm:px-6 lg:px-12 overflow-hidden">
            <div id="product-grid" class="max-w-[90rem] mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    {{-- Supports both relation ($product->category->slug) and direct string/ID matching --}}
                    <div class="product-item group border border-neutral-800 p-4 transition-all hover:border-[#8b1e1e]" data-category="{{ is_object($product->category) ? $product->category->slug : $product->category }}">
                        <div class="overflow-hidden mb-4 bg-neutral-900 h-64 flex items-center justify-center">
                            @if($product->image_path)
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover transform transition-transform duration-500 group-hover:scale-105">
                            @else
                                <span class="text-zinc-600 text-xs font-mono">No Image</span>
                            @endif
                        </div>
                        <div class="space-y-1">
                            <span class="text-[0.6rem] font-mono tracking-widest text-[#8b1e1e]">{{ $product->grade }}</span>
                            <h3 class="text-xl text-white font-serif">{{ $product->name }}</h3>
                            <p class="text-zinc-400 text-sm font-light">{{ $product->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Contact Section -->
        @include('partials.contact')
    </main>

    <!-- Footer Component -->
    <x-footer />

    <!-- Unified JavaScript for Animations, Filtering, and Hero Dynamic Content -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Fade in header and tabs intersection observer
            const headerAnimElements = document.querySelectorAll('.page-header-anim, .filter-tabs-anim');
            const headerObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-6');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            headerAnimElements.forEach(el => headerObserver.observe(el));

            // Dynamically generate the Hero Content Data Map straight from database categories
            const rawCategories = @json($categories);
            const heroContentData = {};
            
            rawCategories.forEach(cat => {
                heroContentData[cat.slug] = {
                    title: cat.name,
                    desc: cat.description ?? "Explore our high-quality selection.",
                    image: cat.image ? "{{ asset('storage') }}/" + cat.image : null
                };
            });

            const tabButtons = document.querySelectorAll('.tab-btn');
            const productItems = document.querySelectorAll('.product-item');
            const heroTitle = document.getElementById('hero-title');
            const heroDesc = document.getElementById('hero-desc');
            const heroBg = document.getElementById('hero-bg');

            // Find the default active category from the first button
            const defaultCategory = tabButtons.length > 0 ? tabButtons[0].getAttribute('data-category') : null;

            // Initial Filter State: Show default category by default
            if (defaultCategory) {
                productItems.forEach(item => {
                    if (item.getAttribute('data-category') !== defaultCategory) {
                        item.classList.add('hidden');
                    }
                });
            }

            // Tab Click Event Listeners
            tabButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const selectedCategory = this.getAttribute('data-category');
                    const selectedImage = this.getAttribute('data-image');

                    // Update active state of buttons
                    tabButtons.forEach(btn => {
                        btn.classList.remove('bg-[#8b1e1e]', 'text-white');
                        btn.classList.add('text-zinc-500', 'hover:text-zinc-300');
                    });
                    this.classList.remove('text-zinc-500', 'hover:text-zinc-300');
                    this.classList.add('bg-[#8b1e1e]', 'text-white');

                    // Update Hero Banner Text & Image dynamically with a smooth fade effect
                    if (heroContentData[selectedCategory]) {
                        heroTitle.style.opacity = '0';
                        heroDesc.style.opacity = '0';
                        setTimeout(() => {
                            heroTitle.textContent = heroContentData[selectedCategory].title;
                            heroDesc.textContent = heroContentData[selectedCategory].desc;
                            if (selectedImage && heroBg) {
                                heroBg.src = selectedImage;
                            }
                            heroTitle.style.opacity = '1';
                            heroDesc.style.opacity = '1';
                        }, 150);
                    }

                    // Show/Hide products based on selected category
                    productItems.forEach(item => {
                        const itemCategory = item.getAttribute('data-category');
                        if (itemCategory === selectedCategory) {
                            item.classList.remove('hidden');
                        } else {
                            item.classList.add('hidden');
                        }
                    });
                });
            });
        });
    </script>

</body>
</html>