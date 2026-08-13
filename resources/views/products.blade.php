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
                <p id="hero-subtitle" class="font-mono text-[#8b1e1e] text-[0.6rem] sm:text-[0.7rem] tracking-[0.3em] uppercase">OUR RANGE</p>

                <!-- Main Title -->
                <h1 id="hero-title" class="font-serif text-4xl sm:text-5xl lg:text-6xl text-white tracking-wide">
                    Premium Beef Cuts
                </h1>

                <!-- Description -->
                <p id="hero-desc" class="text-zinc-400 text-sm sm:text-base font-light max-w-xl leading-relaxed">
                    Hand-selected, expertly graded beef from trusted suppliers — marbled, fresh, and ready for your kitchen.
                </p>
            </div>
        </section>

        <!-- Category Filter Tabs Section -->
        <div class="w-full bg-black py-4 px-4 sm:px-6 lg:px-12 border-b border-neutral-900 filter-tabs-anim opacity-0 translate-y-6 transition-all duration-700 ease-out delay-150">
            <div class="max-w-[90rem] mx-auto flex justify-center">
                <div class="inline-flex border border-neutral-800/80 p-1 bg-[#080606]/90 backdrop-blur-sm">
                    <button data-category="beef" class="tab-btn bg-[#8b1e1e] text-white px-6 sm:px-8 py-2.5 text-xs font-mono uppercase tracking-widest transition-all">
                        PREMIUM BEEF
                    </button>
                    <button data-category="chicken" class="tab-btn text-zinc-500 hover:text-zinc-300 px-6 sm:px-8 py-2.5 text-xs font-mono uppercase tracking-widest transition-all">
                        CHICKEN PART
                    </button>
                    <button data-category="duck" class="tab-btn text-zinc-500 hover:text-zinc-300 px-6 sm:px-8 py-2.5 text-xs font-mono uppercase tracking-widest transition-all">
                        FROZEN DUCK
                    </button>
                </div>
            </div>
        </div>

        <!-- Products Grid Section -->
        <section class="scroll-mt-24 w-full bg-black py-16 px-4 sm:px-6 lg:px-12 overflow-hidden">
            <div class="max-w-[90rem] mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- ==================== PREMIUM BEEF PRODUCTS (6 Items) ==================== -->
                <div class="product-item" data-category="beef">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/ribeye.jpg') }}" alt="Ribeye" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">PRIME GRADE</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Ribeye</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Rich marbling delivers exceptional juiciness and deep beef flavour. A classic favourite for true steak enthusiasts.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item" data-category="beef">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/ribeye.jpg') }}" alt="Striploin" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">PRIME GRADE</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Striploin</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Firm yet tender with a bold, clean beef flavour. A reliable favourite among steakhouse chefs for consistent quality.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item" data-category="beef">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/ribeye.jpg') }}" alt="Tenderloin" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">PRIME GRADE</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Tenderloin</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    The most tender cut on the animal. Lean, delicate, and melt-in-the-mouth — ideal for fine-dining menu creation.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item" data-category="beef">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/ribeye.jpg') }}" alt="Short Rib" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">CHOICE GRADE</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Short Rib</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Generously marbled and full of collagen-rich tissue. Slow-braised to a deep, fall-off-the-bone rich texture.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item" data-category="beef">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/ribeye.jpg') }}" alt="Brisket" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">CHOICE GRADE</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Brisket</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Intense depth of flavor designed for low-and-slow smoking or braising to unlock its signature tender character.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item" data-category="beef">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/ribeye.jpg') }}" alt="Ground Beef" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">80/20 BLEND</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Ground Beef</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Our signature lean-to-fat blend gives burgers, sauces, and meatballs the ideal juicy bite and balanced flavour.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ==================== CHICKEN PART PRODUCTS (6 Items) ==================== -->
                <div class="product-item hidden" data-category="chicken">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/steak.jpg') }}" alt="Chicken Breast" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">GRADE A POULTRY</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Chicken Breast</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Clean, skinless, and boneless chicken breasts. High in lean protein and carefully processed for kitchen convenience.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item hidden" data-category="chicken">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/steak.jpg') }}" alt="Chicken Thighs" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">GRADE A POULTRY</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Chicken Thighs</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Juicy and flavorful chicken thighs, perfect for roasting, grilling, or stewing in large culinary operations.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item hidden" data-category="chicken">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/steak.jpg') }}" alt="Chicken Wings" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">GRADE A POULTRY</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Chicken Wings</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Freshly frozen premium chicken wings, well-suited for frying, baking, or signature bar and appetizer menus.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item hidden" data-category="chicken">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/steak.jpg') }}" alt="Chicken Drumsticks" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">GRADE A POULTRY</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Chicken Drumsticks</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Plump and meaty drumsticks packed with savory flavor, excellent for deep frying, barbecuing, and family sets.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item hidden" data-category="chicken">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/steak.jpg') }}" alt="Chicken Feet" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">GRADE A POULTRY</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Chicken Feet</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Cleaned and graded chicken feet ideal for specialty restaurant dishes, soups, and traditional recipes.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item hidden" data-category="chicken">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/steak.jpg') }}" alt="Whole Chicken" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">GRADE A POULTRY</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Whole Chicken</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Uniformly sized whole fresh frozen chicken ready for roasting, rotisserie cooking, or bulk kitchen catering.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ==================== FROZEN DUCK PRODUCTS (6 Items) ==================== -->
                <div class="product-item hidden" data-category="duck">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/ribeye.jpg') }}" alt="Whole Roasted Duck" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">PREMIUM FROZEN</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Whole Frozen Duck</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Plump, high-grade whole frozen duck prepared specifically for authentic roasting and rich traditional recipes.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item hidden" data-category="duck">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/ribeye.jpg') }}" alt="Duck Breast" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">PREMIUM FROZEN</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Duck Breast</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Thick-cut duck breasts featuring rich marbling and a layer of fat designed to crisp up beautifully in the pan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item hidden" data-category="duck">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/ribeye.jpg') }}" alt="Duck Leg Quarters" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">PREMIUM FROZEN</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Duck Leg Quarters</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Tender and flavorful leg quarters ideal for slow-cooking confit or braising in rich aromatic sauces.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item hidden" data-category="duck">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/ribeye.jpg') }}" alt="Duck Wings" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">PREMIUM FROZEN</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Duck Wings</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Substantial and savory duck wings, perfect for deep-flavor braising and specialty bar snack recipes.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item hidden" data-category="duck">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/ribeye.jpg') }}" alt="Duck Necks" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">PREMIUM FROZEN</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Duck Necks</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Clean frozen duck necks packed with flavor, widely used for making rich broths, stocks, and specialty stuffings.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item hidden" data-category="duck">
                    <div class="bg-[#080606] border border-neutral-900 overflow-hidden group hover:border-[#8b1e1e]/50 transition-colors h-full flex flex-col">
                        <div class="h-56 sm:h-64 overflow-hidden relative">
                            <img src="{{ asset('images/ribeye.jpg') }}" alt="Duck Tongues" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="font-mono text-xs text-[#8b1e1e] uppercase tracking-widest">PREMIUM FROZEN</span>
                                <h3 class="font-serif text-3xl sm:text-4xl text-white mt-1">Duck Tongues</h3>
                                <p class="text-zinc-300 text-sm sm:text-base font-light leading-relaxed mt-2">
                                    Delicacy item packaged cleanly and frozen fresh, favored for high-end Asian and fusion appetizer menus.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- JavaScript for Category Tabs Filtering, Dynamic Hero Text updates, and Animations -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Fade in header and tabs
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

                // Hero Content Data Map
                const heroContentData = {
                    beef: {
                        title: "Premium Beef Cuts",
                        desc: "Hand-selected, expertly graded beef from trusted suppliers — marbled, fresh, and ready for your kitchen."
                    },
                    chicken: {
                        title: "Fresh Chicken Parts",
                        desc: "Grade A chicken parts sourced daily and delivered fresh — every cut cleaned, portioned, and ready to cook."
                    },
                    duck: {
                        title: "Frozen Duck Range",
                        desc: "From whole frozen ducks to rendered fat, our duck range brings distinctive richness to elevated menus and home kitchens alike."
                    }
                };

                // Filter Category & Dynamic Header Functionality
                const tabButtons = document.querySelectorAll('.tab-btn');
                const productItems = document.querySelectorAll('.product-item');
                const heroTitle = document.getElementById('hero-title');
                const heroDesc = document.getElementById('hero-desc');

                tabButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        const selectedCategory = this.getAttribute('data-category');

                        // Update active state of buttons
                        tabButtons.forEach(btn => {
                            btn.classList.remove('bg-[#8b1e1e]', 'text-white');
                            btn.classList.add('text-zinc-500', 'hover:text-zinc-300');
                        });
                        this.classList.remove('text-zinc-500', 'hover:text-zinc-300');
                        this.classList.add('bg-[#8b1e1e]', 'text-white');

                        // Update Hero Banner Text dynamically with a smooth fade effect
                        if (heroContentData[selectedCategory]) {
                            heroTitle.style.opacity = '0';
                            heroDesc.style.opacity = '0';
                            setTimeout(() => {
                                heroTitle.textContent = heroContentData[selectedCategory].title;
                                heroDesc.textContent = heroContentData[selectedCategory].desc;
                                heroTitle.style.opacity = '1';
                                heroDesc.style.opacity = '1';
                            }, 150);
                        }

                        // Show/Hide products based on category
                        productItems.forEach(item => {
                            const itemCategory = item.getAttribute('data-category');
                            if (selectedCategory === 'all' || itemCategory === selectedCategory) {
                                item.classList.remove('hidden');
                            } else {
                                item.classList.add('hidden');
                            }
                        });
                    });
                });
            });
        </script>
    </main>

    <!-- Footer Component -->
    <x-footer />

</body>
</html>