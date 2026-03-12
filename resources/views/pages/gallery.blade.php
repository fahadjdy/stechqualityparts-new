<x-app-layout>
    <section class="pt-32 pb-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="section-label">Photo Gallery</div>
            <h1 class="section-title mt-4">Our <span class="highlight">Gallery</span></h1>
            <p class="text-slate-500 mt-3">A showcase of our premium quality spare parts and manufacturing processes.</p>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($images->count())
                <div class="gallery-masonry">
                    @foreach($images as $image)
                        <div class="gallery-item reveal">
                            <img src="{{ $image->image_url }}" alt="{{ $image->name ?? 'Gallery' }}">
                            <div class="overlay">
                                <span class="text-white font-bold text-sm">{{ $image->name ?? 'Spare Part' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20">
                    <i class="fas fa-images text-4xl text-slate-300 mb-4"></i>
                    <p class="text-slate-400 text-lg">No gallery images yet.</p>
                </div>
            @endif
        </div>
    </section>
</x-app-layout>
