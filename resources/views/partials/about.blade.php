<!-- About Prime Cuts Section -->
<section id="about" class="scroll-mt-24 w-full bg-black py-24 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
        
        <!-- Left Side: Images & Floating Badge -->
        <div class="lg:col-span-6 relative flex flex-col items-center pb-12 about-anim opacity-0 -translate-x-10 transition-all duration-1000 ease-out">
            <div class="w-full flex flex-col sm:flex-row items-center justify-center gap-4">
                <div class="w-full sm:w-1/2 h-[380px] relative overflow-hidden shadow-2xl group">
                    <img src="{{ !empty($about->image_one) ? asset('storage/' . $about->image_one) : asset('images/steak.jpg') }}" alt="Raw Steaks" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                </div>
                <div class="w-full sm:w-1/2 h-[380px] relative overflow-hidden shadow-2xl sm:translate-y-8 group">
                    <img src="{{ !empty($about->image_two) ? asset('storage/' . $about->image_two) : asset('images/chicken.jpg') }}" alt="Whole Chicken" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                </div>
            </div>
            <div class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-[#8b1e1e] text-white py-3 px-8 shadow-2xl flex flex-col items-center justify-center border border-red-900/50 z-10 transform hover:scale-105 transition-transform duration-300">
                <span class="font-mono text-[0.6rem] tracking-[0.3em] uppercase text-red-200">{{ $about->badge_year ?? 'Since 2018' }}</span>
                <span class="font-serif italic text-lg tracking-wide">{{ $about->badge_text ?? 'Trusted Quality' }}</span>
            </div>
        </div>

        <!-- Right Side: Content & Lists -->
        <div class="lg:col-span-6 space-y-6 about-anim opacity-0 translate-x-10 transition-all duration-1000 ease-out">
            <p class="font-mono text-[#c41e3a] text-[0.65rem] tracking-[0.3em] uppercase">{{ $about->eyebrow ?? 'About Prime Cuts' }}</p>
            <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-white leading-[1.15]">
                {!! nl2br(e($about->title ?? "Phnom Penh's Premium\nMeat Supplier")) !!}<br>
                <span class="text-[#c41e3a] italic">{{ $about->highlight_title ?? 'Meat Supplier' }}</span>
            </h2>
            <p class="text-zinc-400 text-sm sm:text-base leading-relaxed font-light">
                {{ $about->description_one }}
            </p>
            @if(!empty($about->description_two))
            <p class="text-zinc-400 text-sm sm:text-base leading-relaxed font-light">
                {{ $about->description_two }}
            </p>
            @endif
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-zinc-900">
                <ul class="space-y-3 text-sm text-zinc-300">
                    <li class="flex items-center gap-3 transform hover:translate-x-1 transition-transform">
                        <span class="w-1.5 h-1.5 bg-[#c41e3a] rounded-full inline-block flex-shrink-0"></span>
                        <span>Premium Beef Cuts</span>
                    </li>
                    <li class="flex items-center gap-3 transform hover:translate-x-1 transition-transform">
                        <span class="w-1.5 h-1.5 bg-[#c41e3a] rounded-full inline-block flex-shrink-0"></span>
                        <span>Premium Duck Range</span>
                    </li>
                </ul>
                <ul class="space-y-3 text-sm text-zinc-300">
                    <li class="flex items-center gap-3 transform hover:translate-x-1 transition-transform">
                        <span class="w-1.5 h-1.5 bg-[#c41e3a] rounded-full inline-block flex-shrink-0"></span>
                        <span>Fresh Chicken Products</span>
                    </li>
                    <li class="flex items-center gap-3 transform hover:translate-x-1 transition-transform">
                        <span class="w-1.5 h-1.5 bg-[#c41e3a] rounded-full inline-block flex-shrink-0"></span>
                        <span>Food Service Solutions</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</section>

<!-- JavaScript for About Section Animation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const aboutElements = document.querySelectorAll('.about-anim');
        
        const aboutObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', '-translate-x-10', 'translate-x-10');
                    entry.target.classList.add('opacity-100', 'translate-x-0');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });

        aboutElements.forEach(el => {
            aboutObserver.observe(el);
        });
    });
</script>