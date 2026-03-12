<section id="hero" class="relative min-h-screen flex items-center overflow-hidden" style="background: linear-gradient(135deg, #f0f4ff 0%, #e8f0fe 50%, #f8fafc 100%);">
    <!-- Glow Orbs -->
    <div class="glow-orb w-[500px] h-[500px] bg-blue-400 top-[-10%] right-[-5%]"></div>
    <div class="glow-orb w-[400px] h-[400px] bg-indigo-300 bottom-[-10%] left-[-5%]" style="animation-delay: 3s;"></div>

    <!-- Particles -->
    <canvas id="particles-canvas"></canvas>

    <!-- Dot Grid -->
    <div class="absolute inset-0 z-[2] opacity-[0.04] pointer-events-none dot-pattern"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pt-32 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <!-- Text -->
            <div class="space-y-8">
                <div class="section-label">Premium Auto Parts</div>
                <h1 class="text-5xl lg:text-7xl font-black text-slate-900 leading-[1.05] tracking-tight">
                    Premium Quality<br>
                    <span class="bg-gradient-to-r from-blue-600 via-blue-500 to-blue-400 bg-clip-text text-transparent">Bolero Spare</span><br>
                    Parts
                </h1>
                <p class="text-slate-500 text-lg leading-relaxed max-w-lg">
                    India's trusted manufacturer of high-quality Mahindra Bolero body parts — precision engineered for perfect fitment and lasting durability.
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('products.index') }}" class="btn-primary">
                        Browse Parts
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"></path></svg>
                    </a>
                    <a href="{{ route('contact') }}" class="btn-outline">Contact Us</a>
                </div>

                <!-- Quick Stats -->
                <div class="flex gap-10 pt-6 border-t border-slate-200">
                    <div>
                        <div class="counter-value" data-counter="15" data-suffix="+">0</div>
                        <div class="text-xs uppercase tracking-widest text-slate-400 font-semibold mt-1">Years</div>
                    </div>
                    <div>
                        <div class="counter-value" data-counter="5000" data-suffix="+">0</div>
                        <div class="text-xs uppercase tracking-widest text-slate-400 font-semibold mt-1">Parts</div>
                    </div>
                    <div>
                        <div class="counter-value" data-counter="1000" data-suffix="+">0</div>
                        <div class="text-xs uppercase tracking-widest text-slate-400 font-semibold mt-1">Clients</div>
                    </div>
                </div>
            </div>
            
            <!-- 3D Hero Image -->
            <div class="relative hidden lg:block">
                <div class="hero-3d-wrapper">
                    <div class="hero-3d-image relative" id="hero-3d">
                        <div class="relative rounded-[2rem] overflow-hidden border border-white/50 shadow-2xl shadow-blue-500/10 bg-white/30 backdrop-blur-sm p-4">
                            <img src="{{ asset('image/bolero-hero.png') }}" alt="Mahindra Bolero" class="w-full h-auto rounded-xl">
                        </div>
                        <div class="absolute -inset-10 bg-blue-400/8 blur-[60px] rounded-full -z-10"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center gap-3 opacity-40">
        <span class="text-[10px] uppercase tracking-[0.3em] text-slate-400 font-semibold">Scroll</span>
        <div class="w-[1px] h-8 bg-gradient-to-b from-blue-500 to-transparent animate-pulse"></div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 3D Mouse Hover
    const hero3d = document.getElementById('hero-3d');
    if (hero3d) {
        const wrapper = hero3d.closest('.hero-3d-wrapper');
        wrapper.addEventListener('mousemove', (e) => {
            const rect = wrapper.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;
            hero3d.style.transform = `rotateY(${x * 10}deg) rotateX(${-y * 6}deg)`;
        });
        wrapper.addEventListener('mouseleave', () => {
            hero3d.style.transform = 'rotateY(0) rotateX(0)';
        });
    }

    // Particles (light theme - subtle blue dots)
    const canvas = document.getElementById('particles-canvas');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        const particles = [];
        for (let i = 0; i < 40; i++) {
            particles.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                vx: (Math.random() - 0.5) * 0.2,
                vy: (Math.random() - 0.5) * 0.2,
                size: Math.random() * 2 + 0.5,
                opacity: Math.random() * 0.15 + 0.05
            });
        }
        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.x += p.vx; p.y += p.vy;
                if (p.x < 0 || p.x > canvas.width) p.vx *= -1;
                if (p.y < 0 || p.y > canvas.height) p.vy *= -1;
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(37, 99, 235, ${p.opacity})`;
                ctx.fill();
            });
            for (let i = 0; i < particles.length; i++) {
                for (let j = i + 1; j < particles.length; j++) {
                    const dx = particles[i].x - particles[j].x;
                    const dy = particles[i].y - particles[j].y;
                    const dist = Math.sqrt(dx * dx + dy * dy);
                    if (dist < 140) {
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.strokeStyle = `rgba(37, 99, 235, ${0.03 * (1 - dist / 140)})`;
                        ctx.lineWidth = 0.5;
                        ctx.stroke();
                    }
                }
            }
            requestAnimationFrame(animate);
        }
        animate();
        window.addEventListener('resize', () => { canvas.width = window.innerWidth; canvas.height = window.innerHeight; });
    }
});
</script>
@endpush
