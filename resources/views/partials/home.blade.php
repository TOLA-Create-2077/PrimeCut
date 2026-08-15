<!-- Hero Section with Background Image Animation -->
<section id="home" class="relative w-full h-[calc(100vh-81px)] bg-black flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ !empty($home->hero_image) ? asset('storage/' . $home->hero_image) : asset('images/steak-hero.jpg') }}" 
             alt="Prime Cut Hero" 
             class="w-full h-full object-cover object-center opacity-90 scale-110 transform transition-transform duration-1000 ease-out hero-img-loaded">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-black/65"></div>
    </div>
</section>

<!-- Hero Main Content Section -->
<section class="relative w-full bg-black text-white py-20 px-4 flex flex-col items-center justify-center text-center overflow-hidden">

    <!-- Subtitle -->
    <p class="hero-anim opacity-0 translate-y-6 transition-all duration-700 ease-out font-mono text-[#c41e3a] text-xs tracking-[0.3em] uppercase mb-6">
        {{ $home->subtitle ?? 'Phnom Penh, Cambodia • Est. 2018' }}
    </p>

    <!-- Main Title Built From Split Columns -->
    <h1 class="hero-anim opacity-0 translate-y-8 transition-all duration-700 ease-out delay-150 font-serif text-4xl sm:text-6xl lg:text-7xl tracking-normal max-w-5xl leading-[1.1] mb-6">
        {{ $home->title_line_1 }}<br>
        <span class="text-[#c41e3a] italic">{{ $home->title_highlight }}</span><br>
        {!! $home->title_line_3 ?? 'Delivered Fresh' !!}
    </h1>

    <!-- Description -->
    <p class="hero-anim opacity-0 translate-y-8 transition-all duration-700 ease-out delay-300 text-zinc-400 text-sm sm:text-base max-w-xl font-light mb-10 leading-relaxed">
        {{ $home->description ?? 'Supplying restaurants, hotels, caterers, and families with carefully selected premium meats every day.' }}
    </p>

    <!-- Action Buttons -->
    <div class="hero-anim opacity-0 translate-y-8 transition-all duration-700 ease-out delay-500 flex flex-col sm:flex-row items-center gap-4 mb-24">
        <a href="{{ $home->btn_explore_url ?? '#products' }}" class="bg-[#c41e3a] text-white text-xs tracking-[0.2em] uppercase font-medium px-8 py-4 hover:bg-[#d42040] transition-all transform hover:-translate-y-0.5 w-full sm:w-auto text-center shadow-lg shadow-[#c41e3a]/20">
            {{ $home->btn_explore_text ?? 'Explore Products' }}
        </a>
        <a href="{{ $home->btn_contact_url ?? '#contact' }}" class="border border-zinc-800 text-zinc-300 text-xs tracking-[0.2em] uppercase font-medium px-8 py-4 hover:border-zinc-500 hover:text-white transition-all transform hover:-translate-y-0.5 w-full sm:w-auto text-center">
            {{ $home->btn_contact_text ?? 'Contact Sales' }}
        </a>
    </div>
</section>

<!-- JavaScript for Smooth Animations -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(() => {
            const heroImg = document.querySelector('.hero-img-loaded');
            if (heroImg) {
                heroImg.style.transform = 'scale(1.05)';
            }
        }, 100);

        const animElements = document.querySelectorAll('.hero-anim');
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-6', 'translate-y-8');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        animElements.forEach(el => observer.observe(el));
    });
</script>