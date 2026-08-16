@php
    $bodyBg = $settings['body_bg'] ?? '#0a0808';
@endphp

<!-- Four-Column Feature Bar -->
<section class="w-full border-t border-b border-[#c41e3a]/20 py-8 px-4 overflow-hidden" style="background-color: {{ $bodyBg }};">
    <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-[#c41e3a]/15">
        
        @foreach($features->sortBy('sort_order') as $index => $feature)
        <!-- Feature Item -->
        <div class="space-y-1.5 pt-4 md:pt-0 feature-anim opacity-0 translate-y-6 transition-all duration-700 ease-out" 
             style="transition-delay: {{ ($index + 1) * 100 }}ms;">
            <p class="font-mono text-[#c41e3a] text-[0.65rem] tracking-[0.25em] uppercase">{{ $feature->title }}</p>
            <p class="font-serif text-zinc-100 text-sm sm:text-base tracking-wide">{{ $feature->subtitle }}</p>
        </div>
        @endforeach

    </div>
</section>

<!-- JavaScript for Four-Column Feature Bar Animation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const featureElements = document.querySelectorAll('.feature-anim');
        
        const featureObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-6');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        featureElements.forEach(el => {
            featureObserver.observe(el);
        });
    });
</script>