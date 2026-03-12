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
