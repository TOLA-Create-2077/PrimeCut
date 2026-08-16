@php
    $bodyBg = $settings['body_bg'] ?? '#0a0808';
@endphp

<!-- Call to Action & Contact Section -->
<section id="contact" class="scroll-mt-24 w-full py-24 px-4 sm:px-6 lg:px-8 border-t border-neutral-900 overflow-hidden" style="background-color: {{ $bodyBg }};">
        
    <!-- Content Box -->
    <div class="relative z-10 max-w-6xl mx-auto space-y-16 cta-anim opacity-0 translate-y-8 transition-all duration-1000 ease-out">
        
        <!-- Top CTA Banner Header -->
        <div class="text-center space-y-6 max-w-4xl mx-auto">
            <p class="font-mono text-[#c41e3a] text-[0.65rem] tracking-[0.3em] uppercase">
                Partner With Us
            </p>

            <h2 class="font-serif text-3xl sm:text-5xl lg:text-6xl text-white leading-[1.15]">
                Your Trusted Partner for<br>
                <span class="text-[#c41e3a] italic">Premium Meat Supply</span>
            </h2>

            <p class="text-zinc-400 text-sm sm:text-base max-w-xl mx-auto leading-relaxed font-light">
                Join hundreds of restaurants, hotels, and businesses across Phnom Penh who rely on Prime Cuts every single day.
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
                <button type="button" id="open-quote-modal" class="bg-[#c41e3a] text-white text-xs tracking-[0.2em] uppercase font-medium px-8 py-4 hover:bg-[#d42040] active:scale-95 transition-all w-full sm:w-auto text-center cursor-pointer">
                    Get a Quote
                </button>
                <button type="button" id="open-contact-section" class="border border-zinc-800 text-zinc-300 text-xs tracking-[0.2em] uppercase font-medium px-8 py-4 hover:border-zinc-500 hover:text-white active:scale-95 transition-all w-full sm:w-auto text-center cursor-pointer">
                    Contact Us Today
                </button>
            </div>
        </div>

        <div id="contact-info-section" class="hidden grid grid-cols-1 lg:grid-cols-12 gap-10 pt-12 border-t border-neutral-900 transition-all duration-500 ease-out">
            
            <!-- Left Column: Contact Information -->
            <div class="lg:col-span-5 space-y-8">
                <div class="space-y-3">
                    <p class="font-mono text-[#c41e3a] text-[0.65rem] tracking-[0.3em] uppercase">Get In Touch</p>
                    <h3 class="font-serif text-3xl text-white">Contact Information</h3>
                    <p class="text-zinc-400 text-sm font-light leading-relaxed">
                        Reach out to our team directly via phone, email, or visit our warehouse location in Phnom Penh.
                    </p>
                </div>

                <div class="space-y-6">
                    <!-- Address -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-[#080606] border border-neutral-800 flex items-center justify-center text-[#c41e3a] shrink-0 mt-1">
                            📍
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-mono text-xs tracking-wider text-zinc-300 uppercase">Address</h4>
                            <p class="text-zinc-400 text-sm font-light leading-relaxed">
                                14 St 308, Tonle Bassac<br>
                                Chamkar Mon<br>
                                Phnom Penh 120101, Cambodia
                            </p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-[#080606] border border-neutral-800 flex items-center justify-center text-[#c41e3a] shrink-0 mt-1">
                            📞
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-mono text-xs tracking-wider text-zinc-300 uppercase">Phone</h4>
                            <p class="text-zinc-400 text-sm font-light leading-relaxed">
                                <a href="tel:+85592663389" class="hover:text-white transition-colors">+855 (0)92 663 389</a> / <a href="tel:+85598663389" class="hover:text-white transition-colors">(0)98 663 389</a>
                            </p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-[#080606] border border-neutral-800 flex items-center justify-center text-[#c41e3a] shrink-0 mt-1">
                            ✉️
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-mono text-xs tracking-wider text-zinc-300 uppercase">Email</h4>
                            <p class="text-zinc-400 text-sm font-light leading-relaxed">
                                <a href="mailto:brokh88888888@gmail.com" class="hover:text-white transition-colors">brokh88888888@gmail.com</a>
                            </p>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-[#080606] border border-neutral-800 flex items-center justify-center text-[#c41e3a] shrink-0 mt-1">
                            🕒
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-mono text-xs tracking-wider text-zinc-300 uppercase">Hours</h4>
                            <p class="text-zinc-400 text-sm font-light leading-relaxed">
                                Monday - Sunday: 11:30AM - 01:00AM
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Send Us a Message Form (Direct Mailto Integration) -->
            <div class="lg:col-span-7 bg-[#080606] border border-neutral-800 p-6 sm:p-10 relative">
                <div class="space-y-3 mb-6">
                    <h3 class="font-serif text-2xl text-white">Send Us a Message</h3>
                    <p class="text-zinc-400 text-xs sm:text-sm font-light">Have a quick question or inquiry? Fill out the form below.</p>
                </div>

                <form id="direct-contact-form" class="space-y-5" onsubmit="handleDirectMailto(event)">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <!-- Full Name -->
                        <div class="space-y-1.5">
                            <label class="block font-mono text-[0.65rem] tracking-[0.2em] text-zinc-300 uppercase">Full Name <span class="text-[#c41e3a]">*</span></label>
                            <input type="text" id="direct-name" required placeholder="Enter your full name" class="w-full bg-black border border-neutral-800 px-4 py-3 text-sm text-white placeholder-zinc-600 focus:outline-none focus:border-[#c41e3a] transition-colors">
                        </div>

                        <!-- Email Address -->
                        <div class="space-y-1.5">
                            <label class="block font-mono text-[0.65rem] tracking-[0.2em] text-zinc-300 uppercase">Email Address <span class="text-[#c41e3a]">*</span></label>
                            <input type="email" id="direct-email" required placeholder="name@example.com" class="w-full bg-black border border-neutral-800 px-4 py-3 text-sm text-white placeholder-zinc-600 focus:outline-none focus:border-[#c41e3a] transition-colors">
                        </div>
                    </div>

                    <!-- Subject -->
                    <div class="space-y-1.5">
                        <label class="block font-mono text-[0.65rem] tracking-[0.2em] text-zinc-300 uppercase">Subject <span class="text-[#c41e3a]">*</span></label>
                        <input type="text" id="direct-subject" required placeholder="What is this regarding?" class="w-full bg-black border border-neutral-800 px-4 py-3 text-sm text-white placeholder-zinc-600 focus:outline-none focus:border-[#c41e3a] transition-colors">
                    </div>

                    <!-- Message -->
                    <div class="space-y-1.5">
                        <label class="block font-mono text-[0.65rem] tracking-[0.2em] text-zinc-300 uppercase">Message <span class="text-[#c41e3a]">*</span></label>
                        <textarea rows="4" id="direct-message" required placeholder="Write your message here..." class="w-full bg-black border border-neutral-800 px-4 py-3 text-sm text-white placeholder-zinc-600 focus:outline-none focus:border-[#c41e3a] transition-colors resize-none"></textarea>
                    </div>

                    <!-- Send Message Button -->
                    <div class="pt-2">
                        <button type="submit" class="w-full bg-[#c41e3a] text-white text-xs tracking-[0.2em] uppercase font-medium py-4 hover:bg-[#d42040] active:scale-[0.98] transition-all cursor-pointer">
                            Send Message
                        </button>
                    </div>
                </form>

                <!-- Direct Form Success Message State (Hidden by default) -->
                <div id="direct-success-message" class="hidden py-12 text-center space-y-4">
                    <div class="w-12 h-12 bg-[#c41e3a]/20 border border-[#c41e3a] text-[#c41e3a] rounded-full flex items-center justify-center mx-auto text-xl">
                        ✓
                    </div>
                    <h4 class="font-serif text-2xl text-white">Opening Your Email Client</h4>
                    <p class="text-zinc-400 text-sm font-light max-w-sm mx-auto">
                        Your message has been formatted to send directly to <strong>brokh88888888@gmail.com</strong>.
                    </p>
                    <div class="pt-4">
                        <button type="button" onclick="resetDirectForm()" class="border border-neutral-700 text-zinc-300 text-xs tracking-[0.2em] uppercase font-medium px-8 py-3 hover:border-white hover:text-white transition-all cursor-pointer">
                            Send Another Message
                        </button>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- ==================== INTERACTIVE MODAL (UI ONLY - NO BACKEND) ==================== -->
<div id="inquiry-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 bg-black/80 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 ease-out">
    
    <!-- Modal Container -->
    <div id="modal-container" class="relative w-full max-w-2xl bg-[#080606] border border-neutral-800 p-6 sm:p-10 transform translate-y-6 transition-all duration-300 ease-out max-h-[90vh] overflow-y-auto shadow-2xl">
        
        <!-- Close Button -->
        <button type="button" id="close-modal" class="absolute top-5 right-5 text-zinc-400 hover:text-white text-xl font-mono p-2 transition-colors cursor-pointer" aria-label="Close modal">
            &times;
        </button>

        <!-- Modal Header -->
        <div class="mb-8 space-y-2">
            <p class="font-mono text-[#c41e3a] text-[0.65rem] tracking-[0.3em] uppercase" id="modal-eyebrow">Request a Quote</p>
            <h3 class="font-serif text-2xl sm:text-3xl text-white" id="modal-title">Get Your Custom Quote</h3>
            <p class="text-zinc-400 text-xs sm:text-sm font-light">Fill out the details below and our team will get back to you shortly.</p>
        </div>

        <!-- Form (UI Only - Routes to brokh88888888@gmail.com) -->
        <form id="quote-contact-form" class="space-y-5" onsubmit="handleModalMailto(event)">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Full Name -->
                <div class="space-y-1.5">
                    <label class="block font-mono text-[0.65rem] tracking-[0.2em] text-zinc-300 uppercase">Full Name <span class="text-[#c41e3a]">*</span></label>
                    <input type="text" id="modal-name" required placeholder="Enter your full name" class="w-full bg-black border border-neutral-800 px-4 py-3 text-sm text-white placeholder-zinc-600 focus:outline-none focus:border-[#c41e3a] transition-colors">
                </div>

                <!-- Company / Restaurant -->
                <div class="space-y-1.5">
                    <label class="block font-mono text-[0.65rem] tracking-[0.2em] text-zinc-300 uppercase">Company / Restaurant <span class="text-[#c41e3a]">*</span></label>
                    <input type="text" id="modal-company" required placeholder="Business or restaurant name" class="w-full bg-black border border-neutral-800 px-4 py-3 text-sm text-white placeholder-zinc-600 focus:outline-none focus:border-[#c41e3a] transition-colors">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Phone -->
                <div class="space-y-1.5">
                    <label class="block font-mono text-[0.65rem] tracking-[0.2em] text-zinc-300 uppercase">Phone Number <span class="text-[#c41e3a]">*</span></label>
                    <input type="tel" id="modal-phone" required placeholder="+855 XX XXX XXX" class="w-full bg-black border border-neutral-800 px-4 py-3 text-sm text-white placeholder-zinc-600 focus:outline-none focus:border-[#c41e3a] transition-colors">
                </div>

                <!-- Email -->
                <div class="space-y-1.5">
                    <label class="block font-mono text-[0.65rem] tracking-[0.2em] text-zinc-300 uppercase">Email Address <span class="text-[#c41e3a]">*</span></label>
                    <input type="email" id="modal-email" required placeholder="name@example.com" class="w-full bg-black border border-neutral-800 px-4 py-3 text-sm text-white placeholder-zinc-600 focus:outline-none focus:border-[#c41e3a] transition-colors">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Product / Meat Type -->
                <div class="space-y-1.5">
                    <label class="block font-mono text-[0.65rem] tracking-[0.2em] text-zinc-300 uppercase">Product / Meat Type</label>
                    <select id="modal-product" class="w-full bg-black border border-neutral-800 px-4 py-3 text-sm text-zinc-300 focus:outline-none focus:border-[#c41e3a] transition-colors">
                        <option value="" disabled selected>Select meat category</option>
                        <option value="Premium Beef (Ribeye, Striploin, etc.)">Premium Beef (Ribeye, Striploin, etc.)</option>
                        <option value="Fresh Chicken Parts">Fresh Chicken Parts</option>
                        <option value="Frozen Duck Range">Frozen Duck Range</option>
                        <option value="Custom Order / Other">Custom Order / Other</option>
                    </select>
                </div>

                <!-- Quantity -->
                <div class="space-y-1.5">
                    <label class="block font-mono text-[0.65rem] tracking-[0.2em] text-zinc-300 uppercase">Estimated Quantity</label>
                    <input type="text" id="modal-quantity" placeholder="e.g. 50 kg / Weekly" class="w-full bg-black border border-neutral-800 px-4 py-3 text-sm text-white placeholder-zinc-600 focus:outline-none focus:border-[#c41e3a] transition-colors">
                </div>
            </div>

            <!-- Message -->
            <div class="space-y-1.5">
                <label class="block font-mono text-[0.65rem] tracking-[0.2em] text-zinc-300 uppercase">Message / Requirements</label>
                <textarea rows="3" id="modal-message-text" placeholder="Tell us about your requirements or delivery schedule..." class="w-full bg-black border border-neutral-800 px-4 py-3 text-sm text-white placeholder-zinc-600 focus:outline-none focus:border-[#c41e3a] transition-colors resize-none"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button type="submit" class="w-full bg-[#c41e3a] text-white text-xs tracking-[0.2em] uppercase font-medium py-4 hover:bg-[#d42040] active:scale-[0.98] transition-all cursor-pointer">
                    Submit Request
                </button>
            </div>

        </form>

        <!-- Success Message State (Hidden by default) -->
        <div id="success-message" class="hidden py-12 text-center space-y-4">
            <div class="w-12 h-12 bg-[#c41e3a]/20 border border-[#c41e3a] text-[#c41e3a] rounded-full flex items-center justify-center mx-auto text-xl">
                ✓
            </div>
            <h4 class="font-serif text-2xl text-white">Opening Your Email Client</h4>
            <p class="text-zinc-400 text-sm font-light max-w-sm mx-auto">
                Your quote request has been prepared for delivery to <strong>brokh88888888@gmail.com</strong>.
            </p>
            <div class="pt-4">
                <button type="button" onclick="closeModal()" class="border border-neutral-700 text-zinc-300 text-xs tracking-[0.2em] uppercase font-medium px-8 py-3 hover:border-white hover:text-white transition-all cursor-pointer">
                    Close Window
                </button>
            </div>
        </div>

    </div>
</div>

<!-- JavaScript for Modal, Animations, and Direct Email Routing -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // CTA Scroll Animation Intersection Observer
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

        // Modal Elements
        const modal = document.getElementById('inquiry-modal');
        const modalContainer = document.getElementById('modal-container');
        const openQuoteBtn = document.getElementById('open-quote-modal');
        const openContactSectionBtn = document.getElementById('open-contact-section');
        const contactInfoSection = document.getElementById('contact-info-section');
        const closeBtn = document.getElementById('close-modal');
        
        const modalEyebrow = document.getElementById('modal-eyebrow');
        const modalTitle = document.getElementById('modal-title');
        const quoteForm = document.getElementById('quote-contact-form');
        const successMessage = document.getElementById('success-message');

        // Open Modal Function
        function openModal(type) {
            if (type === 'quote') {
                modalEyebrow.textContent = "Request a Quote";
                modalTitle.textContent = "Get Your Custom Quote";
            } else {
                modalEyebrow.textContent = "Get in Touch";
                modalTitle.textContent = "Contact Our Team Today";
            }

            // Reset form view
            quoteForm.reset();
            quoteForm.classList.remove('hidden');
            successMessage.classList.add('hidden');

            // Show Modal with smooth animation
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modalContainer.classList.remove('translate-y-6');
            document.body.style.overflow = 'hidden';
        }

        // Close Modal Function
        window.closeModal = function() {
            modal.classList.add('opacity-0', 'pointer-events-none');
            modalContainer.classList.add('translate-y-6');
            document.body.style.overflow = 'auto';
        }

        // Event Listeners for Opening Modal
        if (openQuoteBtn) {
            openQuoteBtn.addEventListener('click', () => openModal('quote'));
        }
        
        // Event Listener for "Contact Us Today" button to toggle the hidden contact section and smooth scroll
        if (openContactSectionBtn && contactInfoSection) {
            openContactSectionBtn.addEventListener('click', () => {
                contactInfoSection.classList.remove('hidden');
                contactInfoSection.scrollIntoView({ behavior: 'smooth' });
                
                const firstInput = document.getElementById('direct-name');
                if (firstInput) {
                    setTimeout(() => firstInput.focus(), 300);
                }
            });
        }

        // Event Listeners for Closing Modal
        if (closeBtn) {
            closeBtn.addEventListener('click', closeModal);
        }

        // Close on clicking backdrop overlay
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Close on pressing ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !modal.classList.contains('pointer-events-none')) {
                closeModal();
            }
        });
    });

    // Direct Form Mailto Handler
    function handleDirectMailto(event) {
        event.preventDefault();
        
        const name = document.getElementById('direct-name').value;
        const email = document.getElementById('direct-email').value;
        const subject = document.getElementById('direct-subject').value;
        const message = document.getElementById('direct-message').value;

        const recipient = "brokh88888888@gmail.com";
        const emailSubject = encodeURIComponent(subject);
        const emailBody = encodeURIComponent(`Name: ${name}\nEmail: ${email}\n\nMessage:\n${message}`);

        // Open user's default mail client pre-filled with recipient brokh88888888@gmail.com
        window.location.href = `mailto:${recipient}?subject=${emailSubject}&body=${emailBody}`;

        // Show success UI state
        const form = document.getElementById('direct-contact-form');
        const success = document.getElementById('direct-success-message');
        
        form.classList.add('hidden');
        success.classList.remove('hidden');
    }

    // Modal Form Mailto Handler
    function handleModalMailto(event) {
        event.preventDefault();
        
        const name = document.getElementById('modal-name').value;
        const company = document.getElementById('modal-company').value;
        const phone = document.getElementById('modal-phone').value;
        const email = document.getElementById('modal-email').value;
        const product = document.getElementById('modal-product').value || 'Not specified';
        const quantity = document.getElementById('modal-quantity').value || 'Not specified';
        const message = document.getElementById('modal-message-text').value;

        const recipient = "brokh88888888@gmail.com";
        const emailSubject = encodeURIComponent(`[Quote Request] From ${name} - ${company}`);
        const emailBody = encodeURIComponent(`--- Quote Request Details ---\nName: ${name}\nCompany: ${company}\nPhone: ${phone}\nEmail: ${email}\nProduct: ${product}\nQuantity: ${quantity}\n\nRequirements/Message:\n${message}`);

        // Open user's default mail client pre-filled with recipient brokh88888888@gmail.com
        window.location.href = `mailto:${recipient}?subject=${emailSubject}&body=${emailBody}`;

        // Show success UI state
        const form = document.getElementById('quote-contact-form');
        const success = document.getElementById('success-message');
        
        form.classList.add('hidden');
        success.classList.remove('hidden');
    }

    // Reset Direct Form Function
    function resetDirectForm() {
        const form = document.getElementById('direct-contact-form');
        const success = document.getElementById('direct-success-message');
        
        form.reset();
        form.classList.remove('hidden');
        success.classList.add('hidden');
    }
</script>