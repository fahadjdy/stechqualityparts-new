@php
    $profile = \App\Models\CompanyProfile::first();
@endphp
<nav id="main-nav" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 py-4 glass-nav">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                @if($profile && $profile->logo)
                    <img src="{{ $profile->logo_url }}" alt="S Tech" class="h-9 w-auto">
                @else
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-blue-500 flex items-center justify-center shadow-lg shadow-blue-500/20">
                        <span class="text-white font-black text-lg">S</span>
                    </div>
                @endif
                <div>
                    <span class="text-slate-900 font-bold text-lg tracking-tight">S Tech</span>
                    <span class="block text-[9px] uppercase tracking-[0.25em] text-slate-400 font-semibold">Quality Parts</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-1">
                @php
                    $menu = [
                        ['label' => 'Home', 'href' => url('/')],
                        ['label' => 'Products', 'href' => route('products.index')],
                        ['label' => 'Gallery', 'href' => route('gallery')],
                        ['label' => 'About', 'href' => route('about')],
                        ['label' => 'Contact', 'href' => route('contact')],
                    ];
                @endphp
                @foreach($menu as $item)
                    <a href="{{ $item['href'] }}" class="relative px-5 py-2 text-sm text-slate-500 hover:text-blue-600 transition-colors duration-300 font-medium group">
                        {{ $item['label'] }}
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-[2px] bg-gradient-to-r from-blue-600 to-blue-400 group-hover:w-2/3 transition-all duration-300 rounded-full"></span>
                    </a>
                @endforeach
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-3">
                <a href="{{ route('products.brochure') }}" target="_blank" class="hidden md:inline-flex items-center gap-2 text-sm px-4 py-2.5 rounded-xl border border-blue-200 text-blue-600 font-bold hover:bg-blue-50 transition-all" title="Download Product Catalogue">
                    <i class="fas fa-file-pdf text-sm"></i> Brochure
                </a>
                <a href="{{ route('contact') }}" class="hidden md:inline-flex btn-primary text-sm px-6 py-2.5">
                    Get in Touch
                </a>
                <button type="button" id="mobile-menu-toggle" class="lg:hidden w-10 h-10 flex items-center justify-center rounded-xl text-slate-500 hover:text-blue-600 hover:bg-blue-50 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" id="menu-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" x2="20" y1="12" y2="12"></line><line x1="4" x2="20" y1="6" y2="6"></line><line x1="4" x2="20" y1="18" y2="18"></line></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" id="close-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="hidden"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden mt-3 mx-4 rounded-2xl overflow-hidden bg-white border border-slate-100 shadow-xl">
        <div class="p-4 space-y-1">
            @foreach($menu as $item)
                <a href="{{ $item['href'] }}" class="block px-5 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50 rounded-xl transition-all text-sm font-medium">{{ $item['label'] }}</a>
            @endforeach
            <a href="{{ route('products.brochure') }}" target="_blank" class="flex items-center justify-center gap-2 px-5 py-3 mt-2 rounded-xl border border-blue-200 text-blue-600 text-sm font-bold">
                <i class="fas fa-file-pdf"></i> Download Brochure
            </a>
            <a href="{{ route('contact') }}" class="flex items-center justify-center gap-2 px-5 py-3 mt-1 rounded-xl bg-gradient-to-r from-blue-600 to-blue-500 text-white text-sm font-bold">
                Get in Touch
            </a>
        </div>
    </div>
</nav>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const nav = document.getElementById('main-nav');
    const toggle = document.getElementById('mobile-menu-toggle');
    const menu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');

    window.addEventListener('scroll', function() {
        if (window.scrollY > 60) {
            nav.classList.remove('py-4');
            nav.classList.add('py-2', 'shadow-lg', 'shadow-slate-200/50');
        } else {
            nav.classList.remove('py-2', 'shadow-lg', 'shadow-slate-200/50');
            nav.classList.add('py-4');
        }
    });

    toggle.addEventListener('click', function() {
        menu.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });
});
</script>
@endpush
