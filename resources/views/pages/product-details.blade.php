<x-app-layout>
    <section class="pt-32 pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <div class="flex items-center gap-2 text-sm text-slate-400 mb-10">
                <a href="{{ url('/') }}" class="hover:text-blue-600 transition-colors">Home</a>
                <i class="fas fa-chevron-right text-[10px]"></i>
                <a href="{{ route('products.index') }}" class="hover:text-blue-600 transition-colors">Products</a>
                <i class="fas fa-chevron-right text-[10px]"></i>
                <span class="text-blue-600">{{ $product->name }}</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
                <!-- Image -->
                <div class="metallic-card !rounded-2xl p-8 lg:p-12 sticky top-28 bg-white">
                    <div class="aspect-square flex items-center justify-center bg-slate-50 rounded-xl p-6">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="max-w-full max-h-full object-contain">
                    </div>
                </div>

                <!-- Info -->
                <div class="space-y-8">
                    <div class="space-y-4">
                        <div class="section-label">{{ $product->category->name ?? 'Spare Parts' }}</div>
                        <h1 class="text-3xl lg:text-5xl font-black text-slate-900 leading-tight">{{ $product->name }}</h1>
                        @if($product->code)
                            <p class="text-slate-400 font-mono text-sm">Part Code: {{ $product->code }}</p>
                        @endif
                    </div>

                    @if($product->description)
                    <div class="border-t border-slate-100 pt-8">
                        <h3 class="text-slate-900 font-bold mb-4">Description</h3>
                        <div class="text-slate-500 leading-relaxed text-sm space-y-3 prose prose-sm prose-slate max-w-none">
                            {!! strip_tags($product->description, '<p><br><b><strong><i><em><u><ul><ol><li><h1><h2><h3><h4><h5><h6><a><span><div>') !!}
                        </div>
                    </div>
                    @endif

                    <div class="border-t border-slate-100 pt-8 flex flex-wrap gap-4">
                        <a href="https://wa.me/918128912711?text=Hi, I'm interested in {{ urlencode($product->name) }}" target="_blank" class="btn-primary">
                            <i class="fab fa-whatsapp"></i> Inquire on WhatsApp
                        </a>
                        <a href="{{ route('contact') }}" class="btn-outline">Contact Us</a>
                    </div>
                </div>
            </div>

            @if($related->count())
            <div class="mt-24">
                <div class="section-label mb-4">You May Also Like</div>
                <h2 class="section-title mb-10">Related <span class="highlight">Products</span></h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($related as $rp)
                        <div class="metallic-card group bg-white">
                            <div class="aspect-square relative overflow-hidden bg-slate-50 flex items-center justify-center">
                                <img src="{{ $rp->image_url }}" alt="{{ $rp->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            </div>
                            <div class="p-5 text-center space-y-3">
                                <h3 class="text-sm font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                                    <a href="{{ route('product.show', $rp->slug) }}">{{ $rp->name }}</a>
                                </h3>
                                <div class="flex items-center gap-2 pt-1">
                                    <a href="https://wa.me/918128912711?text=Hi, I'm interested in {{ urlencode($rp->name) }}" target="_blank" class="flex-1 flex items-center justify-center gap-2 py-2 rounded-lg bg-green-500 text-white text-[9px] font-bold hover:bg-green-600 transition-all">
                                        <i class="fab fa-whatsapp"></i> WhatsApp
                                    </a>
                                    <a href="tel:+918128912711" class="flex-1 flex items-center justify-center gap-2 py-2 rounded-lg bg-blue-600 text-white text-[9px] font-bold hover:bg-blue-700 transition-all">
                                        <i class="fas fa-phone"></i> Call
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>
</x-app-layout>
