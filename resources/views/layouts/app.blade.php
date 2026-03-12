<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'S-Tech Quality Parts — Premium Bolero Spare Parts' }}</title>
    <meta name="description" content="Premium quality Mahindra Bolero spare parts. Engine, suspension, brakes, electrical components with guaranteed fitment.">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Montserrat', 'sans-serif'] },
                    colors: {
                        accent: { DEFAULT: '#2563eb', light: '#3b82f6', dark: '#1d4ed8' },
                    }
                }
            }
        }
    </script>
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    
    @stack('styles')
</head>
<body class="bg-white text-slate-900 font-sans">
    <!-- Loading Screen -->
    <div class="loading-screen" id="loading-screen">
        <div class="text-center space-y-4">
            <div class="gear-spinner relative mx-auto"></div>
            <p class="text-xs uppercase tracking-[0.3em] text-slate-400 font-semibold">S Tech Quality Parts</p>
        </div>
    </div>

    <x-header />

    <main>
        {{ $slot }}
    </main>

    <x-footer />

    <!-- GSAP -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        window.addEventListener('load', () => {
            setTimeout(() => document.getElementById('loading-screen').classList.add('hidden'), 500);
        });

        gsap.registerPlugin(ScrollTrigger);

        document.querySelectorAll('.reveal').forEach(el => {
            gsap.fromTo(el, 
                { opacity: 0, y: 40 },
                {
                    opacity: 1, y: 0, duration: 0.8,
                    ease: 'power3.out',
                    scrollTrigger: { trigger: el, start: 'top 85%', toggleActions: 'play none none none' }
                }
            );
        });

        document.querySelectorAll('[data-counter]').forEach(el => {
            const target = parseInt(el.dataset.counter);
            const suffix = el.dataset.suffix || '';
            gsap.fromTo(el, { innerText: 0 }, {
                innerText: target, duration: 2.5, ease: 'power2.out',
                snap: { innerText: 1 },
                scrollTrigger: { trigger: el, start: 'top 85%' },
                onUpdate() { el.textContent = Math.round(parseFloat(el.textContent)) + suffix; }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
