@php
    // ទាញយកតម្លៃពណ៌ពី database មកទុកក្នុង variable ដើម្បីងាយស្រួលប្រើប្រាស់
    $bodyBg = $settings['body_bg'] ?? '#0a0808';

    // កំណត់រូបភាព Hero
    $heroImgSrc = asset('images/steak-hero.jpg');
    if (!empty($home->hero_image_url)) {
        $heroImgSrc = $home->hero_image_url;
    } elseif (!empty($home->hero_image)) {
        $heroImgSrc = Str::startsWith($home->hero_image, ['http://', 'https://']) 
            ? $home->hero_image 
            : asset('storage/' . $home->hero_image);
    }
@endphp

<!-- Combined Hero Section (Responsive Optimized for Mobile & Desktop) -->
<section id="home" class="relative w-full min-h-[85vh] sm:h-[calc(100vh-81px)] flex items-center justify-center overflow-hidden py-16 sm:py-20 px-4 sm:px-6 lg:px-12" style="background-color: {{ $bodyBg }};">
    
    <!-- Background Image & Gradient Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ $heroImgSrc }}" 
             alt="Prime Cut Hero" 
             loading="eager"
             class="w-full h-full object-cover object-center opacity-90 scale-100 transition-transform duration-1000 ease-out hero-img-loaded"
             style="will-change: transform;">
             
        <!-- Gradient ដែលប្តូរពណ៌តាម Database ស្វ័យប្រវត្តិ -->
        <div class="absolute inset-0" style="background: linear-gradient(to top, {{ $bodyBg }} 0%, rgba(0,0,0,0.5) 50%, rgba(0,0,0,0.75) 100%);"></div>
    </div>

    <!-- Hero Content Container -->
    <div class="relative z-10 max-w-5xl mx-auto w-full text-white text-center flex flex-col items-center justify-center">

        <!-- Subtitle -->
        <p class="hero-anim font-mono text-[#c41e3a] text-[0.65rem] sm:text-xs tracking-[0.3em] uppercase mb-4 sm:mb-6">
            {{ $home->subtitle ?? 'Phnom Penh, Cambodia • Est. 2018' }}
        </p>

        <!-- Main Title -->
        <h1 class="hero-anim font-serif text-3xl sm:text-5xl lg:text-7xl tracking-normal max-w-4xl leading-[1.15] sm:leading-[1.1] mb-4 sm:mb-6">
            {{ $home->title_line_1 }}<br>
            <span class="text-[#c41e3a] italic">{{ $home->title_highlight }}</span><br>
            {{ $home->title_line_3 ?? 'Delivered Fresh' }}
        </h1>

        <!-- Description -->
        <p class="hero-anim text-zinc-300 sm:text-zinc-400 text-xs sm:text-base max-w-xl font-light mb-8 sm:mb-10 leading-relaxed px-2 sm:px-0">
            {{ $home->description ?? 'Supplying restaurants, hotels, caterers, and families with carefully selected premium meats every day.' }}
        </p>

        <!-- Action Buttons -->
        <div class="hero-anim flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 w-full sm:w-auto px-4 sm:px-0">
            <a href="{{ $home->btn_explore_url ?? '#products' }}" class="bg-[#c41e3a] text-white text-xs tracking-[0.2em] uppercase font-medium px-6 sm:px-8 py-3.5 sm:py-4 hover:bg-[#d42040] transition-all transform hover:-translate-y-0.5 w-full sm:w-auto text-center shadow-lg shadow-[#c41e3a]/20">
                {{ $home->btn_explore_text ?? 'Explore Products' }}
            </a>
            <a href="{{ $home->btn_contact_url ?? '#contact' }}" class="border border-zinc-700 sm:border-zinc-800 bg-black/30 sm:bg-transparent backdrop-blur-sm sm:backdrop-blur-none text-zinc-200 sm:text-zinc-300 text-xs tracking-[0.2em] uppercase font-medium px-6 sm:px-8 py-3.5 sm:py-4 hover:border-zinc-500 hover:text-white transition-all transform hover:-translate-y-0.5 w-full sm:w-auto text-center">
                {{ $home->btn_contact_text ?? 'Contact Sales' }}
            </a>
        </div>
    </div>
</section>

<!-- CSS Styles & Animation Fixes -->
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

<!-- JavaScript for Smooth Image Scale Animation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(() => {
            const heroImg = document.querySelector('.hero-img-loaded');
            if (heroImg) {
                heroImg.style.transform = 'scale(1.05)';
            }
        }, 50);
    });
</script>