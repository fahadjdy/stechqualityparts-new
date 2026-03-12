@php
    $profile = \App\Models\CompanyProfile::first();
    $socials = \App\Models\SocialMedia::where('status', 'active')->get();
    $footerCategories = \App\Models\Category::limit(6)->get();
@endphp
<footer class="relative pt-20 pb-8 overflow-hidden bg-slate-900 text-white">
    <div class="animated-border"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <!-- Company -->
            <div class="space-y-6">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    @if($profile && $profile->logo)
                        <img src="{{ $profile->logo_url }}" alt="Logo" class="h-10 w-auto brightness-200">
                    @else
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-400 flex items-center justify-center">
                            <span class="text-white font-black text-lg">S</span>
                        </div>
                    @endif
                    <div>
                        <span class="text-white font-bold text-lg">S Tech</span>
                        <span class="block text-[9px] uppercase tracking-[0.25em] text-slate-400 font-semibold">Quality Parts</span>
                    </div>
                </a>
                <p class="text-slate-400 text-sm leading-relaxed">
                    {{ $profile->about ?? 'Premium manufacturer of Bolero spare parts with 15+ years of industry expertise.' }}
                </p>
                <div class="flex items-center gap-2">
                    @foreach($socials as $social)
                        <a href="{{ $social->url }}" target="_blank" class="w-9 h-9 rounded-lg border border-slate-700 flex items-center justify-center text-slate-400 hover:text-blue-400 hover:border-blue-400/30 transition-all">
                            <i class="fab fa-{{ strtolower($social->platform) }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-6">Quick Links</h4>
                <ul class="space-y-3">
                    @foreach(['Home' => url('/'), 'Products' => route('products.index'), 'Gallery' => route('gallery'), 'About' => route('about'), 'Contact' => route('contact')] as $label => $link)
                        <li><a href="{{ $link }}" class="text-slate-400 hover:text-blue-400 transition-colors text-sm font-medium">{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Categories -->
            <div>
                <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-6">Categories</h4>
                <ul class="space-y-3">
                    @foreach($footerCategories as $cat)
                        <li><a href="{{ route('category.show', $cat->slug) }}" class="text-slate-400 hover:text-blue-400 transition-colors text-sm font-medium">{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-6">Contact Us</h4>
                <ul class="space-y-4 text-slate-400 text-sm">
                    <li class="flex gap-3">
                        <i class="fas fa-map-marker-alt text-blue-400 mt-1"></i>
                        <span>{{ $profile->location ?? $profile->city ?? 'Gujarat, India' }}</span>
                    </li>
                    <li class="flex gap-3">
                        <i class="fas fa-phone text-blue-400 mt-1"></i>
                        <a href="tel:{{ $profile->contact ?? '+918128912711' }}" class="hover:text-blue-400 transition-colors">{{ $profile->contact ?? '+91 8128912711' }}</a>
                    </li>
                    <li class="flex gap-3">
                        <i class="fas fa-envelope text-blue-400 mt-1"></i>
                        <a href="mailto:{{ $profile->email ?? 'info@stechqualityparts.com' }}" class="hover:text-blue-400 transition-colors">{{ $profile->email ?? 'info@stechqualityparts.com' }}</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-slate-500 text-xs">© {{ date('Y') }} S Tech Quality Parts. All Rights Reserved.</p>
            <div class="flex items-center gap-6">
                <a href="#" class="text-slate-500 hover:text-blue-400 text-xs transition-colors">Privacy Policy</a>
                <a href="#" class="text-slate-500 hover:text-blue-400 text-xs transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>

    <!-- WhatsApp -->
    <a href="https://wa.me/{{ $profile->whatsapp ?? '918128912711' }}" target="_blank" class="fixed bottom-6 right-6 w-14 h-14 bg-green-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-green-500/30 hover:scale-110 transition-all z-40">
        <i class="fab fa-whatsapp text-2xl"></i>
    </a>
</footer>
