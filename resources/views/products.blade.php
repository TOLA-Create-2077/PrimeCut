@php
    // 1. ទាញយកតម្លៃពណ៌ពី settings (ឆែកទាំង array និង collection/object)
    $bodyBg = is_array($settings) ? ($settings['body_bg'] ?? '#0a0808') : (data_get($settings, 'body_bg') ?? '#0a0808');

    // 2. រៀបចំទិន្នន័យ categories សម្រាប់ JavaScript នៅក្នុង @php block (ដោះស្រាយ ParseError)
    $mappedCategories = $categories->mapWithKeys(function ($c) {
        return [
            $c->slug => [
                'title' => $c->name,
                'desc' => $c->description ?? 'Explore our high-quality selection.',
                'image' => $c->image ? asset('storage/' . ltrim($c->image, '/')) : null,
            ]
        ];
    })->toArray();

    // 3. Category ដំបូងគេសម្រាប់កំណត់រូបភាព និងចំណងជើង Hero Section
    $firstCategory = $categories->first();
    $bgImage = ($firstCategory && $firstCategory->image) 
        ? asset('storage/' . ltrim($firstCategory->image, '/')) 
        : asset('images/steak.jpg');
@endphp

<body class="text-white selection:bg-[#8b1e1e] selection:text-white" style="background-color: {{ $bodyBg }};">

    <!-- Header Component -->
    <x-header />

    <!-- Main Content Sections -->
    <main>
        <!-- Page Header / Hero Section -->
        <section id="products" class="w-full relative h-64 sm:h-72 lg:h-80 flex flex-col justify-center px-4 sm:px-6 lg:px-12 border-b border-neutral-900 overflow-hidden" style="background-color: {{ $bodyBg }};">
            <!-- Background Image with Dark Overlay -->
            <div class="absolute inset-0 z-0">
                <img id="hero-bg" src="{{ $bgImage }}" alt="Background Cuts" class="w-full h-full object-cover scale-105 transform transition-transform duration-1000 ease-out">
                <!-- Gradient ដែលប្តូរពណ៌តាម Database ស្វ័យប្រវត្តិ -->
                <div class="absolute inset-0" style="background: linear-gradient(to top, {{ $bodyBg }}, rgba(0,0,0,0.4) 40%, rgba(0,0,0,0.65) 100%);"></div>
            </div>

            <!-- Content Container -->
            <div class="max-w-[90rem] mx-auto w-full relative z-10 space-y-2.5 page-header-anim opacity-0 translate-y-6 transition-all duration-700 ease-out">
                <div class="flex items-center space-x-2 font-mono text-[0.6rem] sm:text-[0.7rem] tracking-[0.3em] uppercase text-zinc-500">
                    <a href="{{ url('/') }}" class="hover:text-white transition-colors">HOME</a>
                    <span>/</span>
                    <span class="text-[#8b1e1e]">PRODUCTS</span>
                </div>

                <p id="hero-subtitle" class="font-mono text-[#8b1e1e] text-[0.6rem] sm:text-[0.7rem] tracking-[0.3em] uppercase">OUR RANGE</p>

                <h1 id="hero-title" class="font-serif text-4xl sm:text-5xl lg:text-6xl text-white tracking-wide transition-opacity duration-300">
                    {{ $firstCategory->name ?? 'Our Products' }}
                </h1>

                <p id="hero-desc" class="text-zinc-400 text-sm sm:text-base font-light max-w-xl leading-relaxed transition-opacity duration-300">
                    {{ $firstCategory->description ?? 'Explore our high-quality selection.' }}
                </p>
            </div>
        </section>

        <!-- Category Filter Tabs -->
        <div class="w-full py-4 px-4 sm:px-6 lg:px-12 border-b border-neutral-900 filter-tabs-anim opacity-0 translate-y-6 transition-all duration-700 ease-out delay-150" style="background-color: {{ $bodyBg }};">
            <div class="max-w-[90rem] mx-auto flex justify-center">
                <div class="inline-flex border border-neutral-800/80 p-1 bg-[#080606]/90 backdrop-blur-sm flex-wrap justify-center gap-1">
                    @foreach($categories as $index => $category)
                        <button type="button" 
                                data-category="{{ $category->slug }}" 
                                data-image="{{ $category->image ? asset('storage/' . ltrim($category->image, '/')) : '' }}" 
                                class="tab-btn {{ $index === 0 ? 'bg-[#8b1e1e] text-white' : 'text-zinc-500 hover:text-zinc-300' }} px-6 sm:px-8 py-2.5 text-xs font-mono uppercase tracking-widest transition-all">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <section class="scroll-mt-24 w-full py-16 px-4 sm:px-6 lg:px-12 overflow-hidden" style="background-color: {{ $bodyBg }};">
            <div id="product-grid" class="max-w-[90rem] mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div class="product-item group border border-neutral-800 p-4 transition-all hover:border-[#8b1e1e]" data-category="{{ is_object($product->category) ? $product->category->slug : $product->category }}">
                        <div class="overflow-hidden mb-4 bg-neutral-900 h-64 flex items-center justify-center">
                            @if($product->image_path)
                                <img src="{{ asset('storage/' . ltrim($product->image_path, '/')) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover transform transition-transform duration-500 group-hover:scale-105">
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

        @include('partials.contact')
    </main>

    <x-footer />

    <!-- CSS Styles -->
    <style>
        .hero-anim {
            opacity: 0;
            transform: translateY(20px);
            animation: heroFadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        
        .hero-anim:nth-child(1) { animation-delay: 0.1s; }
        .hero-anim:nth-child(2) { animation-delay: 0.25s; }
        .hero-anim:nth-child(3) { animation-delay: 0.4s; }
        .hero-anim:nth-child(4) { animation-delay: 0.55s; }

        @keyframes heroFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Intersection Observer for animations
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-6');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.page-header-anim, .filter-tabs-anim').forEach(el => observer.observe(el));

            // Hero content logic (ប្រើប្រាស់ Variable ដែលបានរៀបចំរួចពី PHP block)
            const heroData = @json($mappedCategories);

            const tabButtons = document.querySelectorAll('.tab-btn');
            const productItems = document.querySelectorAll('.product-item');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const slug = this.dataset.category;
                    
                    // Update UI Buttons
                    tabButtons.forEach(btn => {
                        btn.classList.remove('bg-[#8b1e1e]', 'text-white');
                        btn.classList.add('text-zinc-500', 'hover:text-zinc-300');
                    });
                    this.classList.remove('text-zinc-500', 'hover:text-zinc-300');
                    this.classList.add('bg-[#8b1e1e]', 'text-white');

                    // Fade out & update Hero Content
                    const titleEl = document.getElementById('hero-title');
                    const descEl = document.getElementById('hero-desc');
                    const bgEl = document.getElementById('hero-bg');

                    if (heroData[slug]) {
                        titleEl.style.opacity = '0';
                        descEl.style.opacity = '0';

                        setTimeout(() => {
                            titleEl.textContent = heroData[slug].title;
                            descEl.textContent = heroData[slug].desc;
                            if (heroData[slug].image && bgEl) {
                                bgEl.src = heroData[slug].image;
                            }
                            
                            titleEl.style.opacity = '1';
                            descEl.style.opacity = '1';
                        }, 150);
                    }

                    // Filter products
                    productItems.forEach(item => {
                        item.classList.toggle('hidden', item.dataset.category !== slug);
                    });
                });
            });
        });
    </script>
</body>