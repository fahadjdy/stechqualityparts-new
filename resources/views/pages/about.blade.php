<x-app-layout>
    <!-- ========== HERO / BREADCRUMB ========== -->
    <section class="pt-32 pb-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="section-label">Our Story</div>
            <h1 class="section-title mt-4">About <span class="highlight">S Tech Quality Parts</span></h1>
            <p class="text-slate-500 mt-3 max-w-2xl">A legacy of precision and quality in the Mahindra Bolero spare parts industry. Registered and trusted across India.</p>
        </div>
    </section>

    <!-- ========== CORE ABOUT ========== -->
    <section class="py-20 lg:py-28 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="reveal relative group">
                    <div class="relative rounded-2xl overflow-hidden shadow-xl shadow-blue-500/5 border border-slate-100 bg-white p-4">
                        <img src="{{ $profile->company_image_url ?? asset('image/workshop.png') }}" alt="Our Facility" class="w-full h-auto rounded-xl">
                    </div>
                    <div class="absolute -bottom-6 -left-6 glass-card p-6 border-l-4 border-blue-600 bg-white">
                        <div class="text-3xl font-black text-slate-900">15+</div>
                        <div class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Years of Experience</div>
                    </div>
                </div>

                <div class="reveal space-y-8">
                    <div class="space-y-4">
                        <div class="section-label">Who We Are</div>
                        <h2 class="section-title">The Foundation of <span class="highlight">Quality</span></h2>
                    </div>
                    <div class="text-slate-500 text-lg leading-relaxed space-y-4 prose prose-slate">
                        @if($profile && $profile->about)
                            {!! strip_tags($profile->about, '<p><br><b><strong><i><em><u><ul><ol><li>') !!}
                        @else
                            <p>S Tech Quality Parts is a leading manufacturer of high-quality Mahindra Bolero body parts and spare components. With a focus on precision engineering and durability, we have established ourselves as a trusted name for distributors and workshop owners across India.</p>
                            <p>Our commitment is simple: providing parts that fit perfectly, last longer, and exceed OEM standards.</p>
                        @endif
                    </div>
                    
                    <div class="grid grid-cols-2 gap-6 pt-4">
                        <div class="p-5 rounded-xl border border-slate-100 bg-slate-50">
                            <h4 class="text-blue-600 font-black text-xl mb-1">Gujarat</h4>
                            <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Manufacturing Hub</p>
                        </div>
                        <div class="p-5 rounded-xl border border-slate-100 bg-slate-50">
                            <h4 class="text-blue-600 font-black text-xl mb-1">ISO 9001</h4>
                            <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Quality Standards</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== MISSION & VISION ========== -->
    <section class="py-20 lg:py-28 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 dot-pattern"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24">
                <div class="reveal space-y-6">
                    <div class="w-16 h-16 rounded-2xl bg-blue-600 flex items-center justify-center text-3xl shadow-lg shadow-blue-500/20">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h2 class="text-4xl font-black italic tracking-tighter">Our <span class="text-blue-400">Mission</span></h2>
                    <p class="text-slate-400 text-lg leading-relaxed">
                        To empower vehicle owners and workshops by providing the highest quality spare parts that ensure safety, longevity, and performance. We strive to innovate our manufacturing processes daily to stay ahead of industry standards.
                    </p>
                </div>

                <div class="reveal space-y-6" style="transition-delay:0.2s">
                    <div class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center text-3xl border border-white/20 backdrop-blur-md">
                        <i class="fas fa-eye text-blue-400"></i>
                    </div>
                    <h2 class="text-4xl font-black italic tracking-tighter">Our <span class="text-blue-400">Vision</span></h2>
                    <p class="text-slate-400 text-lg leading-relaxed">
                        To become the undisputed leader in Mahindra Bolero spare parts worldwide, known for our uncompromising quality, technological superiority, and commitment to the "Make in India" initiative.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== WHY WE EXCEL ========== -->
    <section class="py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-20 reveal">
                <div class="section-label justify-center">The S Tech Difference</div>
                <h2 class="section-title mt-4">Why We <span class="highlight">Excel</span></h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach([
                    ['icon' => 'fa-microchip', 'title' => 'Advanced Robotics', 'desc' => 'State-of-the-art CNC machines for flawless manufacturing.'],
                    ['icon' => 'fa-check-double', 'title' => 'Dual Quality Check', 'desc' => 'Every part undergoes manual and digital inspection.'],
                    ['icon' => 'fa-leaf', 'title' => 'Sustainable Growth', 'desc' => 'Eco-friendly disposal and efficient material usage.']
                ] as $item)
                <div class="reveal p-8 rounded-3xl border border-slate-100 hover:border-blue-200 transition-all group hover:bg-white hover:shadow-xl hover:shadow-blue-500/5">
                    <div class="w-14 h-14 rounded-2xl bg-slate-50 flex items-center justify-center text-blue-600 text-xl font-bold mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all">
                        <i class="fas {{ $item['icon'] }}"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">{{ $item['title'] }}</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========== CTA ========== -->
    <section class="pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="reveal relative rounded-[2.5rem] overflow-hidden p-12 lg:p-20 text-center bg-gradient-to-r from-blue-700 to-blue-500">
                <div class="absolute inset-0 opacity-10 dot-pattern"></div>
                <div class="relative z-10 max-w-2xl mx-auto space-y-8">
                    <h3 class="text-3xl lg:text-5xl font-black text-white italic">Ready to Experience <br>True Quality?</h3>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="{{ route('products.index') }}" class="px-8 py-4 bg-white text-blue-600 font-bold rounded-2xl hover:scale-105 transition-transform">Browse Catalog</a>
                        <a href="{{ route('contact') }}" class="px-8 py-4 bg-white/10 text-white border border-white/30 backdrop-blur-md font-bold rounded-2xl hover:bg-white/20 transition-all">Contact Sales</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
