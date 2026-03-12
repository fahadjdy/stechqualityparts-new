@php
    $profile = \App\Models\CompanyProfile::first();
    $socials = \App\Models\SocialMedia::where('status', 'active')->get();
    $footerCategories = \App\Models\Category::limit(6)->get();
@endphp
<footer class="relative pt-20 pb-8 overflow-hidden bg-slate-950 text-white group">
    <!-- Animated Light Orbs Background -->
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <!-- Subtle dot pattern -->
        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 20px 20px;"></div>
        
        <!-- Moving glowing light (Earth/Star effect) -->
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
    </div>
    
    <style>
        .orb {
            position: absolute;
            border-radius: 50%;
            transition: opacity 1s ease-in-out;
            pointer-events: none;
        }
        .orb-1 {
            width: 600px; height: 600px;
            top: -200px; left: -200px;
            background-color: rgba(37, 99, 235, 0.15); /* blue-600 at 15% opacity */
            filter: blur(100px);
            opacity: 0.4;
            animation: moveOrb1 20s ease-in-out infinite;
        }
        .orb-2 {
            width: 500px; height: 500px;
            bottom: -200px; right: -150px;
            background-color: rgba(56, 189, 248, 0.10); /* sky-400 at 10% opacity */
            filter: blur(80px);
            opacity: 0.2;
            animation: moveOrb2 15s ease-in-out infinite alternate;
        }
        .group:hover .orb-1 { opacity: 0.8; }
        .group:hover .orb-2 { opacity: 0.5; }

        @keyframes moveOrb1 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(150px, 100px) scale(1.1); }
            66% { transform: translate(50px, 200px) scale(0.9); }
        }
        @keyframes moveOrb2 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-100px, -80px) scale(1.2); }
        }
    </style>

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
                        <a href="{{ $social->url }}" target="_blank" class="w-9 h-9 rounded-lg border border-slate-700 flex items-center justify-center text-slate-400 hover:bg-gradient-to-br hover:from-blue-600 hover:to-blue-400 hover:text-white hover:border-transparent transition-all duration-300 hover:shadow-[0_0_15px_rgba(59,130,246,0.5)]">
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
                        <li><a href="{{ $link }}" class="text-slate-400 hover:bg-gradient-to-r hover:from-white hover:to-blue-400 hover:bg-clip-text hover:text-transparent transition-all duration-300 text-sm font-medium">{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Categories -->
            <div>
                <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-6">Categories</h4>
                <ul class="space-y-3">
                    @foreach($footerCategories as $cat)
                        <li><a href="{{ route('category.show', $cat->slug) }}" class="text-slate-400 hover:bg-gradient-to-r hover:from-white hover:to-blue-400 hover:bg-clip-text hover:text-transparent transition-all duration-300 text-sm font-medium">{{ $cat->name }}</a></li>
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
