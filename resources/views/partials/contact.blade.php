<!-- Call to Action Banner Section -->
<section id="contact" class="scroll-mt-24 w-full bg-black py-24 px-4 sm:px-6 lg:px-8 border-t border-neutral-900 overflow-hidden">
        
    <!-- Content Box -->
    <div class="relative z-10 max-w-4xl mx-auto text-center space-y-6 cta-anim opacity-0 translate-y-8 transition-all duration-1000 ease-out">
        
        <!-- Eyebrow Title -->
        <p class="font-mono text-[#c41e3a] text-[0.65rem] tracking-[0.3em] uppercase">
            Partner With Us
        </p>

        <!-- Main Heading -->
        <h2 class="font-serif text-3xl sm:text-5xl lg:text-6xl text-white leading-[1.15]">
            Your Trusted Partner for<br>
            <span class="text-[#c41e3a] italic">Premium Meat Supply</span>
        </h2>

        <!-- Subtitle Description -->
        <p class="text-zinc-400 text-sm sm:text-base max-w-xl mx-auto leading-relaxed font-light">
            Join hundreds of restaurants, hotels, and businesses across Phnom Penh who rely on Prime Cuts every single day.
        </p>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
            <a href="#quote" class="bg-[#c41e3a] text-white text-xs tracking-[0.2em] uppercase font-medium px-8 py-4 hover:bg-[#d42040] transition-colors w-full sm:w-auto text-center">
                Get a Quote
            </a>
            <a href="#contact" class="border border-zinc-800 text-zinc-300 text-xs tracking-[0.2em] uppercase font-medium px-8 py-4 hover:border-zinc-500 hover:text-white transition-all w-full sm:w-auto text-center">
                Contact Us Today
            </a>
        </div>

    </div>
</section>

<!-- JavaScript for Call to Action Section Animation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctaElement = document.querySelector('.cta-anim');
        
        if (ctaElement) {
            const ctaObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-8');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            ctaObserver.observe(ctaElement);
        }
    });
</script>