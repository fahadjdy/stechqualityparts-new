<x-app-layout>
    <section class="pt-32 pb-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="section-label">Category</div>
            <h1 class="section-title mt-4">{{ $category->name }}</h1>
            <p class="text-slate-500 mt-3">{{ $category->products->count() }} products in this category</p>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($category->products as $product)
                    <div class="reveal metallic-card group bg-white">
                        <div class="aspect-square relative overflow-hidden bg-slate-50 flex items-center justify-center">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </div>
                        <div class="p-5 space-y-3">
                            <p class="text-[10px] uppercase tracking-widest text-blue-600 font-bold">{{ $category->name }}</p>
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
                                    <i class="fas fa-phone text-[10px]"></i> Call
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20"><p class="text-slate-400">No products in this category yet.</p></div>
                @endforelse
            </div>
        </div>
    </section>
</x-app-layout>
