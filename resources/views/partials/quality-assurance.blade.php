<!-- Quality Assurance & Process Section -->
<section id="quality" class="scroll-mt-24 w-full bg-black py-24 px-4 sm:px-6 lg:px-8 border-t border-neutral-900 overflow-hidden">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
        
        <!-- Left Column: Title & Steps -->
        <div class="lg:col-span-6 space-y-10">
            <!-- Section Header -->
            <div class="space-y-3 quality-header-anim opacity-0 translate-y-8 transition-all duration-1000 ease-out">
                <p class="font-mono text-[#c41e3a] text-[0.65rem] tracking-[0.3em] uppercase">Quality Assurance</p>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-white leading-[1.15]">
                    From Source to<br>
                    <span class="text-[#c41e3a] italic">Your Kitchen</span>
                </h2>
                <p class="text-zinc-400 text-sm sm:text-base leading-relaxed font-light pt-2">
                    A rigorous multi-stage process ensures every product you receive from Prime Cuts meets the highest standards of freshness, safety, and consistency — without exception.
                </p>
            </div>

            <!-- Steps Timeline -->
            <div class="relative space-y-8 pl-6 sm:pl-8 before:absolute before:left-[11px] before:top-2 before:bottom-2 before:w-[1px] before:bg-[#c41e3a]/30">
                
                <!-- Step 01 -->
                <div class="relative space-y-1.5 quality-step-anim opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-100">
                    <div class="absolute -left-[25px] sm:-left-[33px] top-1 w-3 h-3 bg-black border-2 border-[#c41e3a] rounded-full"></div>
                    <p class="font-mono text-[#c41e3a] text-[0.6rem] tracking-[0.25em] uppercase">Step 01</p>
                    <h3 class="font-serif text-xl text-white">Meat Inspection</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed font-light">All products pass rigorous visual and physical inspection by certified QC specialists before packaging.</p>
                </div>

                <!-- Step 02 -->
                <div class="relative space-y-1.5 quality-step-anim opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200">
                    <div class="absolute -left-[25px] sm:-left-[33px] top-1 w-3 h-3 bg-black border-2 border-[#c41e3a] rounded-full"></div>
                    <p class="font-mono text-[#c41e3a] text-[0.6rem] tracking-[0.25em] uppercase">Step 02</p>
                    <h3 class="font-serif text-xl text-white">Cold Storage Facility</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed font-light">State-of-the-art refrigeration maintains optimal temperature from intake through dispatch.</p>
                </div>

                <!-- Step 03 -->
                <div class="relative space-y-1.5 quality-step-anim opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-300">
                    <div class="absolute -left-[25px] sm:-left-[33px] top-1 w-3 h-3 bg-black border-2 border-[#c41e3a] rounded-full"></div>
                    <p class="font-mono text-[#c41e3a] text-[0.6rem] tracking-[0.25em] uppercase">Step 03</p>
                    <h3 class="font-serif text-xl text-white">Food Safety Standards</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed font-light">Full compliance with international food safety protocols and Cambodian regulatory requirements.</p>
                </div>

                <!-- Step 04 -->
                <div class="relative space-y-1.5 quality-step-anim opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400">
                    <div class="absolute -left-[25px] sm:-left-[33px] top-1 w-3 h-3 bg-black border-2 border-[#c41e3a] rounded-full"></div>
                    <p class="font-mono text-[#c41e3a] text-[0.6rem] tracking-[0.25em] uppercase">Step 04</p>
                    <h3 class="font-serif text-xl text-white">Professional Handling</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed font-light">Trained handlers manage all products with hygienic, HACCP-compliant practices at every stage.</p>
                </div>

            </div>
        </div>

        <!-- Right Column: Image & Commitment Box -->
        <div class="lg:col-span-6 relative w-full h-[520px] sm:h-[600px] overflow-hidden shadow-2xl mt-4 lg:mt-0 quality-image-anim opacity-0 translate-y-10 transition-all duration-1000 ease-out delay-200">
            <img src="{{ asset('images/chef.png') }}" alt="Chef in Professional Kitchen" class="w-full h-full object-cover object-center transform hover:scale-105 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
            <div class="absolute bottom-6 left-6 right-6 bg-black/80 backdrop-blur-md border border-neutral-800 p-6 sm:p-8 space-y-2">
                <p class="font-mono text-[#c41e3a] text-[0.6rem] tracking-[0.3em] uppercase">Our Commitment</p>
                <p class="font-serif italic text-lg sm:text-xl text-zinc-100 tracking-wide">
                    &ldquo;Quality is not an option at Prime Cuts &mdash; it is our only standard.&rdquo;
                </p>
            </div>
        </div>

    </div>
</section>

<!-- JavaScript for Quality Section Animation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const qualityAnimElements = document.querySelectorAll('.quality-header-anim, .quality-step-anim, .quality-image-anim');
        
        const qualityObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-8', 'translate-y-10');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        qualityAnimElements.forEach(el => {
            qualityObserver.observe(el);
        });
    });
</script>