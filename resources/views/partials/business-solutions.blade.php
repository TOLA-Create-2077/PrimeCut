<!-- Business Solutions Section -->
<section id="solutions" class="scroll-mt-24 w-full bg-black py-24 px-4 sm:px-6 lg:px-8 border-t border-neutral-900 overflow-hidden">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
        
        <!-- Left Column: Title & Bullet List -->
        <div class="lg:col-span-5 space-y-6 lg:sticky lg:top-8 business-left-anim opacity-0 -translate-x-8 transition-all duration-1000 ease-out">
            <p class="font-mono text-[#c41e3a] text-[0.65rem] tracking-[0.3em] uppercase">Business Solutions</p>
            <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-white leading-[1.15]">
                Serving Every<br>
                <span class="text-[#c41e3a] italic">Food Business</span>
            </h2>
            <p class="text-zinc-400 text-sm sm:text-base leading-relaxed font-light">
                From boutique restaurants to large hotel groups, Prime Cuts builds a supply program around your specific volume, schedule, and product requirements — with pricing that scales with your business.
            </p>
            <ul class="space-y-3 pt-2">
                <li class="flex items-center gap-3 text-sm text-zinc-200">
                    <span class="w-6 h-6 border border-[#c41e3a]/30 flex items-center justify-center text-[#c41e3a] text-xs flex-shrink-0">&rarr;</span>
                    <span>Bulk Ordering Available</span>
                </li>
                <li class="flex items-center gap-3 text-sm text-zinc-200">
                    <span class="w-6 h-6 border border-[#c41e3a]/30 flex items-center justify-center text-[#c41e3a] text-xs flex-shrink-0">&rarr;</span>
                    <span>Custom Supply Programs</span>
                </li>
                <li class="flex items-center gap-3 text-sm text-zinc-200">
                    <span class="w-6 h-6 border border-[#c41e3a]/30 flex items-center justify-center text-[#c41e3a] text-xs flex-shrink-0">&rarr;</span>
                    <span>Scheduled Daily Deliveries</span>
                </li>
                <li class="flex items-center gap-3 text-sm text-zinc-200">
                    <span class="w-6 h-6 border border-[#c41e3a]/30 flex items-center justify-center text-[#c41e3a] text-xs flex-shrink-0">&rarr;</span>
                    <span>Competitive Wholesale Pricing</span>
                </li>
                <li class="flex items-center gap-3 text-sm text-zinc-200">
                    <span class="w-6 h-6 border border-[#c41e3a]/30 flex items-center justify-center text-[#c41e3a] text-xs flex-shrink-0">&rarr;</span>
                    <span>Dedicated Account Manager</span>
                </li>
            </ul>
        </div>

        <!-- Right Column: Cards Grid (Dynamic from Database) -->
        <div class="lg:col-span-7 space-y-4">
            
            @foreach($solutions->sortBy('sort_order') as $index => $solution)
            <div class="business-card-anim opacity-0 translate-y-8 transition-all duration-1000 ease-out bg-[#080606] border border-neutral-900 p-6 sm:p-8 flex items-start gap-6 hover:border-[#c41e3a]/40 transition-colors"
                 style="transition-delay: {{ ($index + 1) * 100 }}ms;">
                <div class="w-12 h-12 border border-[#c41e3a]/30 flex items-center justify-center text-[#c41e3a] flex-shrink-0">
                    {!! $solution->icon_svg !!}
                </div>
                <div class="space-y-1.5">
                    <h3 class="font-serif text-xl text-white">{{ $solution->title }}</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed font-light">{{ $solution->description }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- JavaScript for Business Solutions Section Animation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const businessElements = document.querySelectorAll('.business-left-anim, .business-card-anim');
        
        const businessObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', '-translate-x-8', 'translate-y-8');
                    entry.target.classList.add('opacity-100', 'translate-x-0', 'translate-y-0');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        businessElements.forEach(el => {
            businessObserver.observe(el);
        });
    });
</script>