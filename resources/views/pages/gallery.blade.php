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
                <div id="lightgallery" class="gallery-masonry">
                    @foreach($images as $image)
                        <a href="{{ $image->image_url }}" class="gallery-item reveal" data-src="{{ $image->image_url }}" data-sub-html="<h4>{{ $image->name ?? 'Spare Part' }}</h4>">
                            <img src="{{ $image->image_url }}" alt="{{ $image->name ?? 'Gallery' }}">
                            <div class="overlay">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-search-plus text-white/70 text-lg"></i>
                                    <span class="text-white font-bold text-sm">{{ $image->name ?? 'Spare Part' }}</span>
                                </div>
                            </div>
                        </a>
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

    @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lightgallery-bundle.min.css">
    <style>
        .lg-backdrop { background-color: rgba(0,0,0,0.92) !important; }
        .lg-toolbar, .lg-actions .lg-next, .lg-actions .lg-prev { background-color: transparent !important; }
    </style>
    @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/lightgallery.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/zoom/lg-zoom.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/thumbnail/lg-thumbnail.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lightGallery(document.getElementById('lightgallery'), {
                selector: '.gallery-item',
                plugins: [lgZoom, lgThumbnail],
                speed: 400,
                download: false,
                mobileSettings: { controls: true, showCloseIcon: true },
            });
        });
    </script>
    @endpush
</x-app-layout>
