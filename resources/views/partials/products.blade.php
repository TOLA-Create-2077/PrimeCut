<!-- Page Header / Hero Section (Larger Height) -->
<section id="products" class="w-full relative h-64 sm:h-72 lg:h-80 flex flex-col justify-center px-4 sm:px-6 lg:px-12 border-b border-neutral-900 overflow-hidden bg-black">
    <!-- Background Image with Dark Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/steak.jpg') }}" alt="Background Cuts" class="w-full h-full object-cover scale-105 transform transition-transform duration-1000 ease-out">
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
        <p class="font-mono text-[#8b1e1e] text-[0.6rem] sm:text-[0.7rem] tracking-[0.3em] uppercase">OUR RANGE</p>

        <!-- Main Title -->
        <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl text-white tracking-wide">
            Premium Beef Cuts
        </h1>

        <!-- Description -->
        <p class="text-zinc-400 text-sm sm:text-base font-light max-w-xl leading-relaxed">
            Hand-selected, expertly graded beef from trusted suppliers — marbled, fresh, and ready for your kitchen.
        </p>
    </div>
</section>

<!-- Category Filter Tabs Section (Section 2) -->
<div class="w-full bg-black py-4 px-4 sm:px-6 lg:px-12 border-b border-neutral-900 filter-tabs-anim opacity-0 translate-y-6 transition-all duration-700 ease-out delay-150">
    <div class="max-w-[90rem] mx-auto flex justify-center">
        <div class="inline-flex border border-neutral-800/80 p-1 bg-[#080606]/90 backdrop-blur-sm">
            <button class="bg-[#8b1e1e] text-white px-8 py-2.5 text-xs font-mono uppercase tracking-widest transition-all">
                PREMIUM BEEF
            </button>
            <button class="text-zinc-500 hover:text-zinc-300 px-8 py-2.5 text-xs font-mono uppercase tracking-widest transition-all">
                CHICKEN PART
            </button>
            <button class="text-zinc-500 hover:text-zinc-300 px-8 py-2.5 text-xs font-mono uppercase tracking-widest transition-all">
                FROZEN DUCK
            </button>
        </div>
    </div>
</div>

<!-- Products Grid Section (Reduced Image Height & Increased Text Size) -->
<section id="products" class="scroll-mt-24 w-full bg-black py-16 px-4 sm:px-6 lg:px-12 overflow-hidden">
    <div class="max-w-[90rem] mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Product 1: Ribeye Steak -->
        <div class="product-card-anim opacity-0 translate-y-10 transition-all duration-700 ease-out delay-100 bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors">
            <div class="h-56 sm:h-64 overflow-hidden relative">
                <img src="{{ asset('images/ribeye.jpg') }}" alt="Ribeye Steak" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-6 sm:p-8 space-y-3.5">
                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">PRIME GRADE</span>
                <h3 class="font-serif text-3xl sm:text-4xl text-white">Ribeye Steak</h3>
                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed">
                    Richly marbled with exceptional fat distribution, delivering intense beefy flavour and a buttery texture. The crown jewel of any premium menu.
                </p>
            </div>
        </div>

        <!-- Product 2: Striploin -->
        <div class="product-card-anim opacity-0 translate-y-10 transition-all duration-700 ease-out delay-200 bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors">
            <div class="h-56 sm:h-64 overflow-hidden relative">
                <img src="{{ asset('images/ribeye.jpg') }}" alt="Striploin" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-6 sm:p-8 space-y-3.5">
                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">PRIME GRADE</span>
                <h3 class="font-serif text-3xl sm:text-4xl text-white">Striploin</h3>
                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed">
                    Firm yet tender with a bold, clean beef flavour. A reliable favourite among steakhouse chefs for its consistent quality and presentation.
                </p>
            </div>
        </div>

        <!-- Product 3: Tenderloin -->
        <div class="product-card-anim opacity-0 translate-y-10 transition-all duration-700 ease-out delay-300 bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors">
            <div class="h-56 sm:h-64 overflow-hidden relative">
                <img src="{{ asset('images/ribeye.jpg') }}" alt="Tenderloin" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-6 sm:p-8 space-y-3.5">
                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">PRIME GRADE</span>
                <h3 class="font-serif text-3xl sm:text-4xl text-white">Tenderloin</h3>
                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed">
                    The most tender cut on the animal. Lean, delicate, and melt-in-the-mouth — ideal for fine-dining and upscale catering menus.
                </p>
            </div>
        </div>

        <!-- Product 4: Short Rib -->
        <div class="product-card-anim opacity-0 translate-y-10 transition-all duration-700 ease-out delay-100 bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors">
            <div class="h-56 sm:h-64 overflow-hidden relative">
                <img src="{{ asset('images/ribeye.jpg') }}" alt="Short Rib" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-6 sm:p-8 space-y-3.5">
                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">CHOICE GRADE</span>
                <h3 class="font-serif text-3xl sm:text-4xl text-white">Short Rib</h3>
                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed">
                    Generously marbled and full of collagen-rich connective tissue. Slow-braised to a deep, fall-off-the-bone richness adored by chefs.
                </p>
            </div>
        </div>

        <!-- Product 5: Brisket -->
        <div class="product-card-anim opacity-0 translate-y-10 transition-all duration-700 ease-out delay-200 bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors">
            <div class="h-56 sm:h-64 overflow-hidden relative">
                <img src="{{ asset('images/ribeye.jpg') }}" alt="Brisket" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-6 sm:p-8 space-y-3.5">
                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">CHOICE GRADE</span>
                <h3 class="font-serif text-3xl sm:text-4xl text-white">Brisket</h3>
                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed">
                    A hard-working muscle with intense depth of flavour. Low-and-slow smoking or braising unlocks its signature tender, juicy character.
                </p>
            </div>
        </div>

        <!-- Product 6: Ground Beef -->
        <div class="product-card-anim opacity-0 translate-y-10 transition-all duration-700 ease-out delay-300 bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors">
            <div class="h-56 sm:h-64 overflow-hidden relative">
                <img src="{{ asset('images/ribeye.jpg') }}" alt="Ground Beef" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-6 sm:p-8 space-y-3.5">
                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">80/20 BLEND</span>
                <h3 class="font-serif text-3xl sm:text-4xl text-white">Ground Beef</h3>
                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed">
                    Our signature 80/20 lean-to-fat blend gives burgers, sauces, and meatballs the perfect juicy bite and balanced flavour every time.
                </p>
            </div>
        </div>

    </div>
</section>

<!-- JavaScript for Page Header, Filters, and Products Animation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Observer for Header and Filter Tabs
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

        headerAnimElements.forEach(el => {
            headerObserver.observe(el);
        });

        // Observer for Product Cards Grid
        const productElements = document.querySelectorAll('.product-card-anim');
        const productObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        productElements.forEach(el => {
            productObserver.observe(el);
        });
    });
</script>