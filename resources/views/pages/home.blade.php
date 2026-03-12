<x-app-layout>
    <x-hero-slider />

    <!-- ========== ABOUT ========== -->
    <section id="about" class="py-20 lg:py-28 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
                <div class="reveal relative group">
                    <div class="relative rounded-2xl overflow-hidden shadow-xl shadow-blue-500/5 border border-slate-100">
                        <img src="{{ $profile->company_image_url ?? asset('image/workshop.png') }}" alt="About S Tech" class="w-full h-auto transition-transform duration-700 group-hover:scale-105">
                    </div>
                    <div class="absolute -bottom-4 -right-4 glass-card p-5 rounded-xl shadow-lg hidden lg:block bg-white">
                        <div class="text-2xl font-black text-blue-600">10k+</div>
                        <div class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Parts Delivered</div>
                    </div>
                </div>

                <div class="reveal space-y-8" style="transition-delay: 0.15s;">
                    <div class="space-y-4">
                        <div class="section-label">About Our Company</div>
                        <h2 class="section-title">S Tech Quality <br><span class="highlight">Parts Overview</span></h2>
                    </div>
                    <p class="text-slate-500 text-lg leading-relaxed">
                        {{ $profile->about ?? 'We specialize in manufacturing and distributing premium quality spare parts, ensuring every component meets the highest standards of durability and fitment.' }}
                    </p>
                    <ul class="space-y-4">
                        @foreach(['Guaranteed OEM-level fitment', 'Superior durability materials', 'Precision engineering standards', 'Pan-India delivery network'] as $item)
                        <li class="flex items-center gap-4 text-slate-700 font-medium text-sm">
                            <div class="w-6 h-6 rounded-lg bg-blue-50 flex items-center justify-center shrink-0">
                                <i class="fas fa-check text-blue-600 text-xs"></i>
                            </div>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('contact') }}" class="btn-primary inline-flex">
                        Learn More <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== THE FABRICATION JOURNEY ========== -->
    <section class="py-20 lg:py-28 bg-slate-50 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16 reveal">
                <div class="section-label justify-center">How We Work</div>
                <h2 class="section-title mt-4">The Fabrication <span class="highlight">Journey</span></h2>
                <p class="text-slate-500 mt-4">From raw material to finished product — every step is precision-controlled.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 reveal">
                @foreach([
                    ['icon' => 'fa-drafting-compass', 'title' => 'Design & CAD', 'desc' => 'Precision engineering with CAD modeling for exact specifications.'],
                    ['icon' => 'fa-industry', 'title' => 'Raw Material', 'desc' => 'High-grade steel and alloys sourced from certified suppliers.'],
                    ['icon' => 'fa-cogs', 'title' => 'CNC Machining', 'desc' => 'Computer-controlled cutting and shaping for accuracy.'],
                    ['icon' => 'fa-microscope', 'title' => 'Quality Testing', 'desc' => 'Rigorous inspection and durability testing at every stage.'],
                    ['icon' => 'fa-shipping-fast', 'title' => 'Delivery', 'desc' => 'Secure packaging and fast Pan-India shipping.']
                ] as $index => $step)
                <div class="journey-step relative">
                    @if($index < 4)
                        <div class="journey-connector hidden lg:block"></div>
                    @endif
                    <div class="step-icon">
                        <i class="fas {{ $step['icon'] }}"></i>
                    </div>
                    <div class="text-[10px] uppercase tracking-widest text-blue-600 font-bold mb-2">Step {{ $index + 1 }}</div>
                    <h4 class="text-base font-bold text-slate-900 mb-2">{{ $step['title'] }}</h4>
                    <p class="text-slate-500 text-sm leading-relaxed">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========== CATEGORIES ========== -->
    <section id="categories" class="py-20 lg:py-28 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16 reveal">
                <div class="section-label justify-center">Our Specialties</div>
                <h2 class="section-title mt-4">Product <span class="highlight">Categories</span></h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($categories as $category)
                    <a href="{{ route('category.show', $category->slug) }}" class="reveal group relative rounded-2xl overflow-hidden aspect-[4/5] shadow-lg">
                        <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/30 to-transparent"></div>
                        
                        <div class="absolute bottom-8 left-8 right-8 z-10 space-y-2">
                            <div class="text-[10px] text-blue-400 font-bold uppercase tracking-widest">{{ $category->products_count }}+ Products</div>
                            <h3 class="text-2xl font-black text-white">{{ $category->name }}</h3>
                            <div class="flex items-center gap-2 text-white/50 group-hover:text-blue-400 transition-colors text-xs font-bold uppercase tracking-wider">
                                Explore <i class="fas fa-arrow-right text-[10px] transform group-hover:translate-x-1 transition-transform"></i>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========== FEATURED PRODUCTS ========== -->
    <section id="products" class="py-20 lg:py-28 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16 reveal">
                <div>
                    <div class="section-label">Premium Selection</div>
                    <h2 class="section-title mt-4">Featured <span class="highlight">Products</span></h2>
                </div>
                <a href="{{ route('products.index') }}" class="btn-outline text-sm">View All Products</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($featuredProducts as $product)
                    <div class="reveal metallic-card group bg-white">
                        <div class="aspect-square relative overflow-hidden bg-slate-50 flex items-center justify-center">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </div>
                        <div class="p-5 space-y-3 text-center">
                            <p class="text-[10px] uppercase tracking-widest text-blue-600 font-bold">{{ $product->category->name ?? 'Spare Parts' }}</p>
                            <h3 class="text-sm font-bold text-slate-900 group-hover:text-blue-600 transition-colors leading-tight">
                                <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                            </h3>
                            @if($product->code)
                                <p class="text-slate-400 text-xs font-mono">{{ $product->code }}</p>
                            @endif
                            <div class="flex items-center gap-2 pt-2">
                                <a href="https://wa.me/918128912711?text=Hi, I'm interested in {{ urlencode($product->name) }}" target="_blank" class="flex-1 flex items-center justify-center gap-2 py-2 rounded-lg bg-green-500 text-white text-[10px] font-bold hover:bg-green-600 transition-all">
                                    <i class="fab fa-whatsapp"></i> WhatsApp
                                </a>
                                <a href="tel:+918128912711" class="flex-1 flex items-center justify-center gap-2 py-2 rounded-lg bg-blue-600 text-white text-[10px] font-bold hover:bg-blue-700 transition-all">
                                    <i class="fas fa-phone"></i> Call
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========== WHY CHOOSE US ========== -->
    <section id="why-us" class="py-20 lg:py-28 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="reveal space-y-10">
                    <div>
                        <div class="section-label">The S Tech Standard</div>
                        <h2 class="section-title mt-4">Why Choose <span class="highlight">S Tech</span></h2>
                        <p class="text-slate-500 mt-4">We set the benchmark in automotive spare parts through innovation.</p>
                    </div>

                    <div class="space-y-4">
                        @foreach([
                            ['icon' => 'fa-shield-alt', 'title' => 'Superior Durability', 'desc' => 'Built to withstand the toughest road conditions.'],
                            ['icon' => 'fa-crosshairs', 'title' => 'Precision Engineering', 'desc' => 'Exact fitment guaranteed for seamless replacement.'],
                            ['icon' => 'fa-award', 'title' => 'Industry Expertise', 'desc' => '15+ years of excellence in spare parts manufacturing.'],
                            ['icon' => 'fa-truck', 'title' => 'Pan-India Shipping', 'desc' => 'Fast delivery to every corner of the country.']
                        ] as $f)
                            <div class="flex gap-5 p-5 rounded-xl border border-slate-100 hover:border-blue-200 hover:bg-blue-50/50 transition-all group">
                                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center shrink-0 group-hover:bg-blue-600 transition-all">
                                    <i class="fas {{ $f['icon'] }} text-blue-600 group-hover:text-white transition-colors"></i>
                                </div>
                                <div>
                                    <h4 class="text-slate-900 font-bold mb-1">{{ $f['title'] }}</h4>
                                    <p class="text-slate-500 text-sm">{{ $f['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="reveal relative hidden lg:block">
                    <div class="rounded-2xl overflow-hidden shadow-xl shadow-blue-500/5 border border-slate-100">
                        <img src="{{ asset('image/quality-inspection.png') }}" alt="Quality" class="w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== CTA BANNER ========== -->
    <section class="py-16 px-4 lg:px-8 reveal">
        <div class="relative rounded-3xl overflow-hidden p-12 lg:p-20 text-center" style="background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%);">
            <div class="absolute inset-0 opacity-10 dot-pattern"></div>
            <div class="relative z-10 space-y-6 max-w-3xl mx-auto">
                <h3 class="text-3xl lg:text-5xl font-black text-white">Get the Best Auto Parts for Your Bolero</h3>
                <p class="text-blue-100/80 text-lg">Premium quality spare parts with guaranteed fitment.</p>
                <div class="flex flex-wrap justify-center gap-4 pt-2">
                    <a href="{{ route('products.index') }}" class="px-8 py-4 rounded-xl bg-white text-blue-600 font-bold hover:shadow-xl transition-all hover:-translate-y-1">Browse Parts</a>
                    <a href="{{ route('contact') }}" class="px-8 py-4 rounded-xl bg-white/15 border border-white/30 text-white font-bold backdrop-blur-md hover:bg-white/25 transition-all hover:-translate-y-1">Contact Expert</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== TESTIMONIALS CAROUSEL ========== -->
    @if($testimonials->count())
    <section id="testimonials" class="py-20 lg:py-28 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16 reveal">
                <div class="section-label justify-center">Client Feedback</div>
                <h2 class="section-title mt-4">What Our <span class="highlight">Customers Say</span></h2>
            </div>
            
            <div class="reveal">
                <div class="swiper testimonial-swiper">
                    <div class="swiper-wrapper pb-12">
                        @foreach($testimonials as $t)
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <div class="flex gap-1 mb-4">
                                    @for($i=0; $i<5; $i++)
                                        <i class="fas fa-star star text-sm"></i>
                                    @endfor
                                </div>
                                <p class="text-slate-500 italic text-sm leading-relaxed mb-6">"{{ $t->content }}"</p>
                                <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
                                    <div class="w-11 h-11 rounded-full overflow-hidden border-2 border-blue-100 bg-slate-100">
                                        <img src="{{ $t->image_url }}" class="w-full h-full object-cover" alt="{{ $t->name }}">
                                    </div>
                                    <div>
                                        <h5 class="text-slate-900 font-bold text-sm">{{ $t->name }}</h5>
                                        <p class="text-slate-400 text-xs">{{ $t->designation }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        new Swiper('.testimonial-swiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
            autoplay: { delay: 4000, disableOnInteraction: false },
            pagination: { el: '.swiper-pagination', clickable: true },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });
    </script>
    @endpush
    @endif

    <!-- ========== DOWNLOAD BROCHURE ========== -->
    <section class="py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="reveal relative rounded-[2.5rem] overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
                <div class="absolute inset-0 opacity-10 dot-pattern"></div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 items-center">
                    <!-- Left: Content -->
                    <div class="relative z-10 p-12 lg:p-16 space-y-8">
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-[10px] font-bold uppercase tracking-widest">
                            <i class="fas fa-file-pdf"></i> Free Download
                        </div>
                        <h2 class="text-3xl lg:text-4xl font-black text-white leading-tight">
                            Get Our Complete<br>
                            <span class="bg-gradient-to-r from-blue-400 to-blue-300 bg-clip-text text-transparent">Product Catalogue</span>
                        </h2>
                        <p class="text-slate-400 text-sm leading-relaxed max-w-md">
                            Download our professionally designed product brochure with detailed specifications, product codes, and high-quality images. Perfect for workshop owners and dealers.
                        </p>
                        <div class="flex flex-wrap gap-6 text-xs text-slate-500">
                            <div class="flex items-center gap-2"><i class="fas fa-check-circle text-blue-400"></i> High-res images</div>
                            <div class="flex items-center gap-2"><i class="fas fa-check-circle text-blue-400"></i> Product codes</div>
                            <div class="flex items-center gap-2"><i class="fas fa-check-circle text-blue-400"></i> Category-wise listing</div>
                        </div>
                        <a href="{{ route('products.brochure') }}" target="_blank" class="inline-flex items-center gap-3 px-8 py-4 rounded-2xl bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold text-sm hover:scale-105 transition-transform shadow-xl shadow-blue-500/20">
                            <i class="fas fa-download"></i> Download Brochure (PDF)
                        </a>
                    </div>
                    <!-- Right: Visual -->
                    <div class="relative hidden lg:flex items-center justify-center p-16">
                        <div class="relative">
                            <div class="absolute inset-0 bg-blue-500/10 blur-[60px] rounded-full"></div>
                            <div class="relative bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-10 text-center space-y-6">
                                <i class="fas fa-book-open text-6xl text-blue-400/50"></i>
                                <div>
                                    <div class="text-white font-black text-xl">S Tech Quality Parts</div>
                                    <div class="text-slate-500 text-xs uppercase tracking-widest mt-1">Product Catalogue 2026</div>
                                </div>
                                <div class="flex justify-center gap-4 text-slate-600 text-xs">
                                    <span><i class="fas fa-images mr-1"></i> {{ \App\Models\Product::count() }}+ Products</span>
                                    <span><i class="fas fa-layer-group mr-1"></i> All Categories</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== CONTACT ========== -->
    <section id="contact" class="py-20 lg:py-28 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <div class="reveal space-y-10">
                    <div>
                        <div class="section-label">Get In Touch</div>
                        <h2 class="section-title mt-4">Contact <span class="highlight">Us</span></h2>
                        <p class="text-slate-500 mt-4">Our experts will get back to you within 24 hours.</p>
                    </div>
                    
                    <div class="space-y-6">
                        @foreach([
                            ['label' => 'Address', 'val' => $profile->location ?? $profile->city ?? 'Gujarat, India', 'icon' => 'fa-map-marker-alt'],
                            ['label' => 'Phone', 'val' => $profile->contact ?? '+91 8128912711', 'icon' => 'fa-phone'],
                            ['label' => 'Email', 'val' => $profile->email ?? 'info@stechqualityparts.com', 'icon' => 'fa-envelope']
                        ] as $item)
                        <div class="flex gap-5 group">
                            <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center shrink-0 group-hover:bg-blue-600 transition-all">
                                <i class="fas {{ $item['icon'] }} text-blue-600 group-hover:text-white transition-colors"></i>
                            </div>
                            <div>
                                <div class="text-[10px] uppercase tracking-widest text-slate-400 font-bold mb-1">{{ $item['label'] }}</div>
                                <div class="text-slate-900 font-semibold">{{ $item['val'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="reveal metallic-card bg-white p-8 lg:p-10 !rounded-2xl">
                    <form action="{{ route('inquiries.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="space-y-2">
                                <label class="text-[10px] uppercase font-bold tracking-widest text-slate-400">Full Name</label>
                                <input type="text" name="name" required class="form-input" placeholder="John Doe">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] uppercase font-bold tracking-widest text-slate-400">Email</label>
                                <input type="email" name="email" required class="form-input" placeholder="john@example.com">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] uppercase font-bold tracking-widest text-slate-400">Subject</label>
                            <input type="text" name="subject" required class="form-input" placeholder="Inquiry about parts">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] uppercase font-bold tracking-widest text-slate-400">Message</label>
                            <textarea name="message" required rows="4" class="form-input resize-none" placeholder="Write your message..."></textarea>
                        </div>
                        <button type="submit" class="btn-primary w-full justify-center py-3.5 uppercase tracking-widest text-sm">
                            Send Message <i class="fas fa-paper-plane text-sm"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
