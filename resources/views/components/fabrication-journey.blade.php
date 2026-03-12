<!-- ========== THE FABRICATION JOURNEY ========== -->
<section class="py-20 lg:py-28 bg-slate-50 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 reveal">
            <div class="section-label justify-center">How We Work</div>
            <h2 class="section-title mt-4">The Fabrication <span class="highlight">Journey</span></h2>
            <p class="text-slate-500 mt-4">From raw material to finished product — every step is precision-controlled.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 reveal">
            @foreach([
                ['icon' => 'fa-drafting-compass', 'title' => 'Design & CAD', 'desc' => 'Precision engineering with CAD modeling for exact specifications.'],
                ['icon' => 'fa-industry', 'title' => 'Raw Material', 'desc' => 'High-grade steel and alloys sourced from certified suppliers.'],
                ['icon' => 'fa-cogs', 'title' => 'CNC Machining', 'desc' => 'Computer-controlled cutting and shaping for accuracy.'],
                ['icon' => 'fa-microscope', 'title' => 'Quality Testing', 'desc' => 'Rigorous inspection and durability testing at every stage.'],
                ['icon' => 'fa-shipping-fast', 'title' => 'Delivery', 'desc' => 'Secure packaging and fast Pan-India shipping.']
            ] as $index => $step)
            <div class="journey-step relative">
                @if($index < 4)
                    <div class="journey-connector hidden lg:block"></div>
                @endif
                <div class="step-icon">
                    <i class="fas {{ $step['icon'] }}"></i>
                </div>
                <div class="text-[10px] uppercase tracking-widest text-blue-600 font-bold mb-2">Step {{ $index + 1 }}</div>
                <h4 class="text-base font-bold text-slate-900 mb-2">{{ $step['title'] }}</h4>
                <p class="text-slate-500 text-sm leading-relaxed">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
