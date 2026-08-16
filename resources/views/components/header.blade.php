@php
    $bodyBg = $settings['body_bg'] ?? '#000000';
    $headerBg = $settings['header_bg'] ?? 'bg-black/90';
@endphp

<header id="site-header" class="w-full backdrop-blur-md text-white px-3 sm:px-6 md:px-8 py-2 flex items-center justify-between border-b border-neutral-900 sticky top-0 z-50 transition-all duration-300 {{ Str::startsWith($headerBg, '#') ? '' : $headerBg }}" @if(Str::startsWith($headerBg, '#')) style="background-color: {{ $headerBg }};" @endif>
    
    <!-- Logo Section -->
    <div class="flex items-center shrink-0">
        <a href="{{ url('/') }}" class="flex items-center focus:outline-none group">
            <img src="{{ asset($settings['header_logo'] ?? 'images/primecutlogo.png') }}" alt="{{ $settings['header_brand_name'] ?? 'Prime Cuts' }} Logo" class="h-14 sm:h-20 md:h-24 w-auto object-contain transition-transform duration-300 group-hover:scale-105" style="mix-blend-mode: screen;">
        </a>
    </div>  

    <!-- Desktop Navigation Links -->
    <nav class="hidden lg:flex items-center space-x-6 xl:space-x-10 text-[11px] xl:text-xs tracking-[0.2em] text-zinc-400 uppercase font-medium">
        <a href="{{ url('/') }}#home" data-target="home" class="nav-link relative py-1 group transition-colors duration-300 hover:text-white">
            {{ $settings['menu_home_text'] ?? 'Home' }}
            <span class="absolute bottom-0 left-0 w-full h-[1.5px] bg-[#8b1e1e] transition-transform duration-300 origin-left scale-x-0 group-hover:scale-x-100 nav-indicator"></span>
        </a>
        <a href="{{ url('/') }}#about" data-target="about" class="nav-link relative py-1 group transition-colors duration-300 hover:text-white">
            {{ $settings['menu_about_text'] ?? 'About' }}
            <span class="absolute bottom-0 left-0 w-full h-[1.5px] bg-[#8b1e1e] transition-transform duration-300 origin-left scale-x-0 group-hover:scale-x-100 nav-indicator"></span>
        </a>
        <a href="{{ url('/products') }}" data-target="products" class="nav-link relative py-1 group transition-colors duration-300 hover:text-white">
            {{ $settings['menu_products_text'] ?? 'Products' }}
            <span class="absolute bottom-0 left-0 w-full h-[1.5px] bg-[#8b1e1e] transition-transform duration-300 origin-left scale-x-0 group-hover:scale-x-100 nav-indicator"></span>
        </a>
        <a href="{{ url('/') }}#solutions" data-target="solutions" class="nav-link relative py-1 group transition-colors duration-300 hover:text-white">
            Solutions
            <span class="absolute bottom-0 left-0 w-full h-[1.5px] bg-[#8b1e1e] transition-transform duration-300 origin-left scale-x-0 group-hover:scale-x-100 nav-indicator"></span>
        </a>
        <a href="{{ url('/') }}#quality" data-target="quality" class="nav-link relative py-1 group transition-colors duration-300 hover:text-white">
            Quality
            <span class="absolute bottom-0 left-0 w-full h-[1.5px] bg-[#8b1e1e] transition-transform duration-300 origin-left scale-x-0 group-hover:scale-x-100 nav-indicator"></span>
        </a>
        <a href="{{ url('/') }}#contact" data-target="contact" class="nav-link relative py-1 group transition-colors duration-300 hover:text-white">
            {{ $settings['menu_contact_text'] ?? 'Contact' }}
            <span class="absolute bottom-0 left-0 w-full h-[1.5px] bg-[#8b1e1e] transition-transform duration-300 origin-left scale-x-0 group-hover:scale-x-100 nav-indicator"></span>
        </a>
    </nav>

    <!-- Actions -->
    <div class="flex items-center space-x-2.5 sm:space-x-4 shrink-0">
        <a href="{{ url('/') }}#contact" class="relative inline-flex items-center justify-center border border-[#8b1e1e] bg-transparent text-zinc-200 text-[10px] sm:text-xs tracking-[0.15em] sm:tracking-[0.2em] uppercase px-3.5 sm:px-5 py-2 sm:py-2.5 overflow-hidden group hover:text-white transition-all duration-300">
            <span class="absolute inset-0 bg-[#8b1e1e] translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
            <span class="relative z-10">Get A Quote</span>
        </a>

        <button id="mobile-menu-button" aria-label="Toggle Menu" class="lg:hidden p-1.5 sm:p-2 text-zinc-400 hover:text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
    </div>
</header>

<!-- Mobile Dropdown -->
<div id="mobile-menu" class="hidden lg:hidden fixed inset-0 top-[65px] sm:top-[76px] bg-black/95 z-40 px-6 py-8 flex flex-col items-center space-y-6 text-xs sm:text-sm tracking-[0.2em] uppercase font-medium">
    <a href="{{ url('/') }}#home" class="mobile-link hover:text-[#8b1e1e] transition-colors">{{ $settings['menu_home_text'] ?? 'Home' }}</a>
    <a href="{{ url('/') }}#about" class="mobile-link hover:text-[#8b1e1e] transition-colors">{{ $settings['menu_about_text'] ?? 'About' }}</a>
    <a href="{{ url('/products') }}" class="mobile-link hover:text-[#8b1e1e] transition-colors">{{ $settings['menu_products_text'] ?? 'Products' }}</a>
    <a href="{{ url('/') }}#solutions" class="mobile-link hover:text-[#8b1e1e] transition-colors">Solutions</a>
    <a href="{{ url('/') }}#quality" class="mobile-link hover:text-[#8b1e1e] transition-colors">Quality</a>
    <a href="{{ url('/') }}#contact" class="mobile-link hover:text-[#8b1e1e] transition-colors">{{ $settings['menu_contact_text'] ?? 'Contact' }}</a>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const header = document.getElementById('site-header');
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const navLinks = document.querySelectorAll('.nav-link');
        const mobileLinks = document.querySelectorAll('.mobile-link');

        // Toggle mobile menu
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking any link
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });

        // Set active link helper
        function setActiveLink(targetId) {
            navLinks.forEach(link => {
                const indicator = link.querySelector('.nav-indicator');
                if (link.getAttribute('data-target') === targetId) {
                    link.classList.add('text-white');
                    link.classList.remove('text-zinc-400');
                    if (indicator) indicator.classList.replace('scale-x-0', 'scale-x-100');
                } else {
                    link.classList.remove('text-white');
                    link.classList.add('text-zinc-400');
                    if (indicator) indicator.classList.replace('scale-x-100', 'scale-x-0');
                }
            });
        }

        // Handle URL Path for Products page
        if (window.location.pathname.includes('products')) {
            setActiveLink('products');
        }

        // Scroll listener for header border
        window.addEventListener('scroll', () => {
            header.classList.toggle('border-neutral-800', window.scrollY > 20);
        }, { passive: true });
    });
</script>