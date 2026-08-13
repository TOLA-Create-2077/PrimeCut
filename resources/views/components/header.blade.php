<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Cuts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        /* Smooth offset padding for sticky header anchor scrolling */
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        /* Reduced motion support for accessibility */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        /* Initial load animation classes */
        .header-entrance {
            opacity: 0;
            transform: translateY(-16px);
            animation: headerEntranceAnim 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes headerEntranceAnim {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Staggered entrance delays */
        .delay-logo { animation-delay: 0.1s; }
        .delay-nav { animation-delay: 0.2s; }
        .delay-cta { animation-delay: 0.3s; }
    </style>
</head>

<body class="bg-black text-white selection:bg-[#8b1e1e] selection:text-white">

<header id="site-header" class="w-full bg-black/90 backdrop-blur-md text-white px-6 md:px-8 py-5 flex items-center justify-between border-b border-neutral-900 sticky top-0 z-50 transition-all duration-300 ease-out header-entrance">

    <!-- Logo Section -->
    <div class="flex items-center space-x-3 header-entrance delay-logo group shrink-0">
        <a href="{{ url('/') }}"
           class="w-3.5 h-3.5 bg-[#8b1e1e] group-hover:scale-110 group-hover:shadow-[0_0_12px_rgba(139,30,30,0.6)] active:scale-90 transition-all duration-300 ease-out inline-block focus:outline-none focus:ring-1 focus:ring-[#8b1e1e]">
        </a>

        <a href="{{ url('/') }}"
           class="font-serif tracking-[0.2em] md:tracking-[0.25em] text-sm md:text-base font-semibold uppercase text-zinc-100 hover:text-white transition-all duration-300 ease-out active:scale-95 focus:outline-none">
            PRIME CUTS
        </a>
    </div>

    <!-- Navigation Links -->
    <nav class="hidden lg:flex items-center space-x-8 xl:space-x-10 text-[11px] xl:text-xs tracking-[0.2em] text-zinc-400 uppercase font-medium header-entrance delay-nav">
        
        <a href="{{ url('/') }}#home" data-target="home"
           class="nav-link relative py-1 group transition-colors duration-300 ease-out text-zinc-400 hover:text-white">
            Home
            <span class="absolute bottom-0 left-0 w-full h-[1.5px] bg-[#8b1e1e] transition-transform duration-300 ease-out origin-left scale-x-0 group-hover:scale-x-100 nav-indicator"></span>
        </a>

        <a href="{{ url('/') }}#about" data-target="about"
           class="nav-link relative py-1 group transition-colors duration-300 ease-out text-zinc-400 hover:text-white">
            About
            <span class="absolute bottom-0 left-0 w-full h-[1.5px] bg-[#8b1e1e] transition-transform duration-300 ease-out origin-left scale-x-0 group-hover:scale-x-100 nav-indicator"></span>
        </a>

        <a href="{{ url('/products') }}" data-target="products"
           class="nav-link relative py-1 group transition-colors duration-300 ease-out text-zinc-400 hover:text-white">
            Products
            <span class="absolute bottom-0 left-0 w-full h-[1.5px] bg-[#8b1e1e] transition-transform duration-300 ease-out origin-left scale-x-0 group-hover:scale-x-100 nav-indicator"></span>
        </a>

        <a href="{{ url('/') }}#solutions" data-target="solutions"
           class="nav-link relative py-1 group transition-colors duration-300 ease-out text-zinc-400 hover:text-white">
            Solutions
            <span class="absolute bottom-0 left-0 w-full h-[1.5px] bg-[#8b1e1e] transition-transform duration-300 ease-out origin-left scale-x-0 group-hover:scale-x-100 nav-indicator"></span>
        </a>

        <a href="{{ url('/') }}#quality" data-target="quality"
           class="nav-link relative py-1 group transition-colors duration-300 ease-out text-zinc-400 hover:text-white">
            Quality
            <span class="absolute bottom-0 left-0 w-full h-[1.5px] bg-[#8b1e1e] transition-transform duration-300 ease-out origin-left scale-x-0 group-hover:scale-x-100 nav-indicator"></span>
        </a>

        <a href="{{ url('/') }}#contact" data-target="contact"
           class="nav-link relative py-1 group transition-colors duration-300 ease-out text-zinc-400 hover:text-white">
            Contact
            <span class="absolute bottom-0 left-0 w-full h-[1.5px] bg-[#8b1e1e] transition-transform duration-300 ease-out origin-left scale-x-0 group-hover:scale-x-100 nav-indicator"></span>
        </a>

    </nav>

    <!-- Call to Action Button with Active/Pressed State Support -->
    <div class="header-entrance delay-cta shrink-0">
        <a href="{{ url('/') }}#contact"
           class="relative inline-flex items-center justify-center border border-[#8b1e1e] bg-transparent text-zinc-200 text-[11px] md:text-xs tracking-[0.2em] uppercase px-4 md:px-5 py-2 md:py-2.5 overflow-hidden group hover:text-white active:scale-[0.96] transition-all duration-300 ease-out focus:outline-none focus:ring-2 focus:ring-[#8b1e1e]/50"
           style="-webkit-tap-highlight-color: transparent;">
            
            <!-- Background fill animation on hover -->
            <span class="absolute inset-0 bg-[#8b1e1e] translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out"></span>
            
            <!-- Button text wrapper -->
            <span class="relative z-10 transition-transform duration-150 ease-out active:scale-95 group-hover:-translate-y-0.5">
                Get A Quote
            </span>
        </a>
    </div>

</header>

<!-- JavaScript for Dynamic Sticky Header, Scroll Spy & Cross-page Anchor Handling -->
<!-- JavaScript for Dynamic Sticky Header, Scroll Spy & Cross-page Anchor Handling -->
<!-- JavaScript for Dynamic Sticky Header, Scroll Spy & Cross-page Anchor Handling -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const header = document.getElementById('site-header');
        
        // Header shrink on scroll
        window.addEventListener('scroll', function () {
            if (window.scrollY > 20) {
                header.classList.remove('py-5');
                header.classList.add('py-3.5', 'border-neutral-800', 'shadow-2xl');
            } else {
                header.classList.remove('py-3.5', 'border-neutral-800', 'shadow-2xl');
                header.classList.add('py-5');
            }
        }, { passive: true });

        const navLinks = document.querySelectorAll('.nav-link');
        const sections = document.querySelectorAll('section[id], div[id]');
        let isClickScrolling = false; // Flag ដើម្បីទប់កុំឱ្យ Scroll Spy មករំខានពេលកំពុងចុច

        // Helper function to set active link explicitly
        function setActiveLink(targetId) {
            navLinks.forEach(link => {
                const indicator = link.querySelector('.nav-indicator');
                if (link.getAttribute('data-target') === targetId) {
                    link.classList.remove('text-zinc-400');
                    link.classList.add('text-white', 'font-semibold');
                    if (indicator) {
                        indicator.classList.remove('scale-x-0');
                        indicator.classList.add('scale-x-100');
                    }
                } else {
                    link.classList.remove('text-white', 'font-semibold');
                    link.classList.add('text-zinc-400');
                    if (indicator) {
                        indicator.classList.remove('scale-x-100');
                        indicator.classList.add('scale-x-0');
                    }
                }
            });
        }

        // Handle Click Events to force Active state immediately
        navLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                const targetAttr = this.getAttribute('data-target');
                const currentPath = window.location.pathname;
                
                // ប្រសិនបើមិនស្ថិតនៅលើទំព័រដើម ហើយចុចលើម៉ឺនុយ Hash ផ្សេងៗ
                if (currentPath !== '/' && currentPath !== '' && targetAttr !== 'products') {
                    e.preventDefault();
                    window.location.href = "{{ url('/') }}#" + targetAttr;
                    return;
                }

                // បង្ខំឱ្យ active ភ្លាមៗពេលចុច និងចាក់សោរមិនឱ្យ Scroll Spy มาแย่งប្តូរ
                if (targetAttr) {
                    isClickScrolling = true;
                    setActiveLink(targetAttr);

                    // បើកដំណើរការ Scroll Spy វិញក្រោយពេល Browser លោតទៅដល់គោលដៅស្ងប់ស្ងាត់ (ឧទាហរណ៍ 600 មីលីវិនាទី)
                    setTimeout(() => {
                        isClickScrolling = false;
                    }, 600);
                }
            });
        });

        // Scroll Spy to activate menu items dynamically
        function updateActiveNav() {
            if (isClickScrolling) return; // បើកំពុងស្ថិតក្នុងការចុច គឺមិនឱ្យ Scroll Spy ធ្វើការកែប្រែទេ

            // បើស្ថិតនៅលើទំព័រ products ឱ្យ active តែ Products ប៊ូតុងមួយគត់
            if (window.location.pathname.includes('products')) {
                setActiveLink('products');
                return;
            }

            let scrollY = window.pageYOffset;

            // ប្រសិនបើស្ថិតនៅផ្នែកខាងលើបង្អស់នៅលើទំព័រដើម (Home)
            if (scrollY < 100) {
                setActiveLink('home');
                return;
            }

            sections.forEach(section => {
                const sectionHeight = section.offsetHeight;
                const sectionTop = section.offsetTop - 120;
                const sectionId = section.getAttribute('id');

                if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                    setActiveLink(sectionId);
                }
            });
        }

        // Check URL Hash on page load
        function checkInitialHash() {
            if (window.location.pathname.includes('products')) {
                setActiveLink('products');
                return;
            }

            const hash = window.location.hash.substring(1);
            if (hash) {
                setActiveLink(hash);
            } else {
                updateActiveNav();
            }
        }

        window.addEventListener('scroll', updateActiveNav, { passive: true });
        
        // Run check on load
        checkInitialHash();
    });
</script>

</body>
</html>