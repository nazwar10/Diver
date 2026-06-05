@extends('layouts.app')

@section('title', 'DIVER.ENT — Creative Digital Agency')
@section('meta_description', 'Award-winning creative digital agency specializing in web design, branding & digital marketing. We craft beautiful work for brands who refuse to blend in.')

@section('content')

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- SECTION 1: HERO --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<style>
@keyframes aurora-1 {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(10vw, -10vh) scale(1.2); }
    66% { transform: translate(-10vw, 15vh) scale(0.9); }
}
@keyframes aurora-2 {
    0%, 100% { transform: translate(0, 0) scale(1.1); }
    33% { transform: translate(-15vw, 15vh) scale(0.9); }
    66% { transform: translate(15vw, -5vh) scale(1.2); }
}
@keyframes aurora-3 {
    0%, 100% { transform: translate(0, 0) scale(0.9); }
    33% { transform: translate(20vw, 5vh) scale(1.1); }
    66% { transform: translate(-10vw, -15vh) scale(1); }
}
.aurora-blob-1 { animation: aurora-1 15s infinite alternate ease-in-out; }
.aurora-blob-2 { animation: aurora-2 18s infinite alternate ease-in-out; }
.aurora-blob-3 { animation: aurora-3 20s infinite alternate ease-in-out; }

@keyframes levitate {
    0%, 100% { transform: translateY(0) rotate(-1deg); }
    50% { transform: translateY(-12px) rotate(1deg); }
}
.animate-levitate {
    animation: levitate 8s ease-in-out infinite;
}
</style>

<section id="hero" class="relative min-h-screen flex items-center bg-cream-2 pt-32 pb-20 overflow-hidden">
    
    {{-- Aurora Mesh Gradient Background --}}
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none bg-cream" id="fluid-bg">
        {{-- SVG Liquid Filter --}}
        <svg class="hidden">
            <filter id="liquid-goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="40" result="blur" />
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 60 -30" result="goo" />
                <feBlend in="SourceGraphic" in2="goo" />
            </filter>
        </svg>

        {{-- Mesh Blobs Container (Full Screen) --}}
        <div class="absolute inset-0 opacity-85" id="blob-container" style="filter: url(#liquid-goo);">
            
            {{-- Blob 1: Top Right (Accent Coral) --}}
            <div class="absolute top-[-20%] right-[-10%] w-[90vw] h-[90vw] md:w-[65vw] md:h-[65vw] bg-accent rounded-full opacity-60 aurora-blob-1"></div>
            
            {{-- Blob 2: Bottom Left (Accent lighter) --}}
            <div class="absolute bottom-[-30%] left-[-10%] w-[100vw] h-[100vw] md:w-[75vw] md:h-[75vw] bg-accent/50 rounded-full opacity-50 aurora-blob-2"></div>
            
            {{-- Blob 3: Center Offset (Mid/Grey for depth and contrast) --}}
            <div class="absolute top-[10%] left-[20%] w-[70vw] h-[70vw] md:w-[50vw] md:h-[50vw] bg-mid rounded-full opacity-30 aurora-blob-3"></div>
            
            {{-- Blob 4: Center Right (Cream to blend and soften) --}}
            <div class="absolute bottom-[20%] right-[10%] w-[60vw] h-[60vw] md:w-[45vw] md:h-[45vw] bg-cream-2 rounded-full opacity-90 aurora-blob-1" style="animation-delay: -7s;"></div>
            
            {{-- Interactive Cursor Blob --}}
            <div id="cursor-blob" class="absolute top-0 left-0 w-[60vw] h-[60vw] md:w-[40vw] md:h-[40vw] bg-accent rounded-full opacity-80 will-change-transform" style="transform: translate(-50%, -50%);"></div>
        </div>
        
        {{-- Fine Grain Noise Overlay for Premium Texture --}}
        <div class="absolute inset-0 opacity-[0.04] mix-blend-overlay pointer-events-none" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=%220 0 200 200%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cfilter id=%22noiseFilter%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.8%22 numOctaves=%223%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23noiseFilter)%22/%3E%3C/svg%3E');"></div>
    </div>

    <div class="max-w-content mx-auto px-6 md:px-8 w-full relative z-10">
        <h1 class="font-serif text-hero text-charcoal leading-[1.05] max-w-5xl" data-animate="hero-text">
            <span class="split-word pb-2 -mb-2">We</span>
            <span class="split-word pb-2 -mb-2">design</span>
            <span class="split-word pb-2 -mb-2">digital</span>
            <span class="split-word pb-2 -mb-2">experiences</span>
            <span class="split-word pb-2 -mb-2">for</span>
            <span class="split-word pb-2 -mb-2">brands</span>
            <span class="split-word pb-2 -mb-2">who</span>
            <span class="split-word pb-2 -mb-2 font-bold italic text-transparent [-webkit-text-stroke:1px_var(--color-charcoal)] md:[-webkit-text-stroke:2px_var(--color-charcoal)]">refuse&nbsp;to&nbsp;blend&nbsp;in.</span>
        </h1>

        <p class="mt-8 text-body-lg text-mid max-w-xl" data-reveal>
            Award-winning creative agency crafting bold digital experiences from London to the world.
        </p>

        {{-- Award Badges --}}
        <div class="flex items-center gap-8 mt-16" data-reveal>
            <div class="flex items-center gap-2 opacity-60 hover:opacity-100 transition-opacity">
                <svg class="w-8 h-8" viewBox="0 0 40 40" fill="none"><circle cx="20" cy="20" r="18" stroke="#1C1C1A" stroke-width="2"/><text x="20" y="24" text-anchor="middle" fill="#1C1C1A" font-size="10" font-family="DM Sans">DAN</text></svg>
                <span class="font-mono text-label text-charcoal-2 uppercase tracking-wider hidden md:inline">Digital Agency Network</span>
            </div>
            <div class="flex items-center gap-2 opacity-60 hover:opacity-100 transition-opacity">
                <svg class="w-8 h-8" viewBox="0 0 40 40" fill="none"><circle cx="20" cy="20" r="18" stroke="#1C1C1A" stroke-width="2"/><text x="20" y="24" text-anchor="middle" fill="#1C1C1A" font-size="8" font-family="DM Sans">★★★</text></svg>
                <span class="font-mono text-label text-charcoal-2 uppercase tracking-wider hidden md:inline">Clutch Top Agency</span>
            </div>
            <div class="flex items-center gap-2 opacity-60 hover:opacity-100 transition-opacity">
                <svg class="w-8 h-8" viewBox="0 0 40 40" fill="none"><circle cx="20" cy="20" r="18" stroke="#1C1C1A" stroke-width="2"/><text x="20" y="24" text-anchor="middle" fill="#1C1C1A" font-size="7" font-family="DM Sans">AWW</text></svg>
                <span class="font-mono text-label text-charcoal-2 uppercase tracking-wider hidden md:inline">Awwwards</span>
            </div>
            <div class="flex items-center gap-2 opacity-60 hover:opacity-100 transition-opacity">
                <svg class="w-8 h-8" viewBox="0 0 40 40" fill="none"><circle cx="20" cy="20" r="18" stroke="#1C1C1A" stroke-width="2"/><text x="20" y="24" text-anchor="middle" fill="#1C1C1A" font-size="7" font-family="DM Sans">CSS</text></svg>
                <span class="font-mono text-label text-charcoal-2 uppercase tracking-wider hidden md:inline">CSSDA</span>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- SECTION 2: OUR SERVICES --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="services" class="py-24 md:py-32 bg-cream-2">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <div class="mb-16 md:mb-24" data-reveal>
            <h2 class="font-serif text-h2 text-charcoal">Our<br><span class="italic">Services</span></h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-0 border-t border-light">
            @foreach($services as $service)
            <div class="py-10 md:py-12 md:px-8 first:md:pl-0 last:md:pr-0 border-b md:border-b-0 md:border-r last:md:border-r-0 border-light group" data-reveal>
                <h3 class="font-serif text-2xl md:text-3xl text-charcoal mb-6">{{ $service->title }}</h3>
                <div class="flex flex-wrap gap-2 mb-6">
                    @foreach($service->sub_services as $sub)
                    <a href="{{ route('services.show', $service->slug) }}" class="inline-block font-mono text-label uppercase tracking-wider text-mid hover:text-accent transition-colors relative group/link">
                        {{ $sub }}
                        <span class="absolute bottom-0 left-0 w-0 h-px bg-accent transition-all duration-300 group-hover/link:w-full"></span>
                    </a>
                    @if(!$loop->last)<span class="text-light">·</span>@endif
                    @endforeach
                </div>
                <p class="text-mid leading-relaxed mb-8">{{ $service->description }}</p>
                <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-2 font-sans text-sm font-medium text-charcoal hover:text-accent transition-colors group/btn">
                    Find out more
                    <svg class="w-4 h-4 transform transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- SECTION 3: BRAND PILLARS --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="pillars" class="py-24 md:py-40 bg-cream" x-data="{ activePillar: 0 }">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12 w-full">
        {{-- Sticky Header --}}
        <h2 class="font-sans text-[clamp(48px,8vw,110px)] font-medium text-charcoal leading-[1.05] tracking-tight text-center mb-24 md:mb-40" data-reveal>
            Brand-led.<br>Strategically built.
        </h2>

        <div class="relative group/list" @mouseleave="activePillar = 0">
            @foreach($brandPillars as $index => $pillar)
            <div class="group/item relative border-t border-charcoal/20 cursor-pointer transition-colors duration-500"
                 x-data="{ mouseX: 0, mouseY: 0, scrollOffset: 0 }"
                 x-init="scrollOffset = ($el.getBoundingClientRect().top - window.innerHeight / 2) * -0.15"
                 @scroll.window="scrollOffset = ($el.getBoundingClientRect().top - window.innerHeight / 2) * -0.15"
                 @mouseenter="activePillar = {{ $index }}"
                 @mousemove="
                     let rect = $el.getBoundingClientRect();
                     mouseX = ($event.clientX - rect.left - rect.width / 2);
                     mouseY = ($event.clientY - rect.top - rect.height / 2);
                 "
                 @mouseleave="mouseX = 0; mouseY = 0">
                 
                 <div class="flex flex-col md:flex-row items-center justify-between py-12 md:py-0 md:h-[400px] transition-opacity duration-500"
                      :class="activePillar !== {{ $index }} ? 'opacity-30' : 'opacity-100'">
                     
                     {{-- Left: Number & Title --}}
                     <div class="w-full md:w-[30%] z-10 transition-transform duration-500 ease-out"
                          :class="activePillar === {{ $index }} ? 'md:translate-x-8' : 'md:translate-x-0'" data-reveal>
                         <span class="font-mono text-lg text-charcoal/50 mb-4 block">{{ $pillar->number }}/</span>
                         <h3 class="font-sans text-5xl md:text-7xl font-medium text-charcoal leading-none tracking-tight pr-4 pointer-events-none">{{ $pillar->title }}</h3>
                     </div>

                     {{-- Center: Image (Floating) --}}
                     <div class="w-full md:w-[40%] flex justify-center z-0 absolute md:relative top-1/2 left-1/2 md:top-auto md:left-auto -translate-x-1/2 -translate-y-1/2 md:translate-x-0 md:translate-y-0 transition-all duration-700 pointer-events-none"
                          :class="activePillar === {{ $index }} ? 'opacity-100 scale-100 rotate-0' : 'opacity-0 scale-90 rotate-3'">
                         
                         {{-- Mouse & Scroll Parallax Wrapper --}}
                         <div class="transition-transform duration-[600ms] ease-out"
                              :style="`transform: translate3d(${mouseX}px, calc(${mouseY}px + ${scrollOffset}px), 0)`">
                             
                             {{-- Levitation Animation Wrapper --}}
                             <div class="animate-levitate w-[clamp(280px,80vw,380px)] md:w-[clamp(380px,28vw,520px)] aspect-[1.1/1] rounded-[2.5rem] overflow-hidden shadow-2xl">
                                 {{-- Placeholder gradient --}}
                                 <div class="w-full h-full bg-gradient-to-br {{ $index % 2 == 0 ? 'from-[#111826] to-[#31C4F3]' : 'from-[#31C4F3] to-[#CBD5E1]' }} flex items-center justify-center">
                                     <span class="font-sans font-bold text-[140px] text-white/30">{{ $pillar->number }}</span>
                                 </div>
                             </div>
                         </div>
                     </div>

                     {{-- Right: Description --}}
                     <div class="w-full md:w-[30%] flex justify-end z-10 mt-8 md:mt-0 transition-all duration-500 ease-out"
                          :class="activePillar === {{ $index }} ? 'md:-translate-x-8' : 'md:translate-x-0'" data-reveal>
                         <p class="text-charcoal text-xl md:text-2xl leading-[1.3] max-w-sm transition-all duration-500 delay-100"
                            :class="activePillar === {{ $index }} ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4 pointer-events-none'">
                             {{ $pillar->description }}
                         </p>
                     </div>
                 </div>
            </div>
            @endforeach
            {{-- Bottom Border --}}
            <div class="border-t border-charcoal/20"></div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- SECTION 4: OUR WORK — PORTFOLIO CARDS --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="work" class="py-24 md:py-32 bg-cream-2">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-16 md:mb-24 gap-8">
            <h2 class="font-serif text-h2 text-charcoal" data-reveal>Our<br><span class="italic">Work</span></h2>
            <div class="max-w-md" data-reveal>
                <h3 class="font-serif text-xl text-charcoal mb-3">Making brands a damn site better.</h3>
                <p class="text-mid">First impressions matter. Your website's an opportunity to wow your audience—so why choose bad design?</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6" data-reveal-stagger>
            @foreach($featuredProjects as $project)
            <a href="{{ route('work.show', $project->slug) }}"
               class="group relative block overflow-hidden rounded-lg bg-charcoal {{ $loop->first ? 'md:col-span-2 aspect-[16/9]' : 'aspect-[4/3]' }}">
                {{-- Gradient Placeholder Background --}}
                <div class="absolute inset-0 bg-gradient-to-br {{ $loop->index % 3 === 0 ? 'from-charcoal via-charcoal-2 to-accent/20' : ($loop->index % 3 === 1 ? 'from-charcoal-2 via-charcoal to-cream-2/10' : 'from-accent/10 via-charcoal to-charcoal-2') }} transition-transform duration-700 group-hover:scale-105"></div>

                {{-- Content Overlay --}}
                <div class="absolute inset-0 flex flex-col justify-between p-6 md:p-8 z-10">
                    <div class="flex items-start justify-between">
                        <div class="flex gap-2">
                            <span class="font-mono text-label uppercase tracking-wider text-white/60 bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full">{{ $project->service }}</span>
                            <span class="font-mono text-label uppercase tracking-wider text-white/60 bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full">{{ $project->sector }}</span>
                        </div>
                        <svg class="w-5 h-5 text-white/40 group-hover:text-white transition-colors transform group-hover:translate-x-1 group-hover:-translate-y-1 duration-300" fill="currentColor" viewBox="0 0 14.78 14.78"><path d="M13.25 12.18L13.25 0.23 14.78 0.23 14.78 14.76 14.74 14.76 14.74 14.78 0.21 14.78 0.21 13.25 12.18 13.25 0 1.08 1.08 0 13.25 12.18z"/></svg>
                    </div>
                    <div>
                        <p class="font-mono text-label text-white/50 mb-2">{{ $project->year }}</p>
                        <h3 class="font-serif text-2xl md:text-3xl text-white mb-2">{{ $project->title }}</h3>
                        <p class="text-white/70 text-sm max-w-md opacity-0 group-hover:opacity-100 transition-opacity duration-300">{{ $project->tagline }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-12" data-reveal>
            <a href="{{ route('work') }}" class="inline-flex items-center gap-3 px-8 py-4 border-2 border-charcoal text-charcoal font-sans font-medium rounded-full hover:bg-charcoal hover:text-cream transition-all duration-300">
                View all projects
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- SECTION 5: RESULTS — DARK SECTION --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="results" class="py-24 md:py-32 bg-dark-bg text-white">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <h2 class="font-serif text-h2 text-white mb-4" data-reveal>Our <span class="italic">Results</span></h2>
        <p class="text-white/50 text-lg mb-16 max-w-lg" data-reveal>Numbers don't lie. Here's what happens when design meets strategy.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-6">
            @foreach($projectResults as $result)
            <div class="border-t border-white/20 pt-8" data-reveal>
                <div class="flex items-baseline gap-1 mb-4">
                    <span class="font-serif text-5xl md:text-6xl text-white font-bold" data-counter data-target="{{ $result->metric }}">0</span>
                    <span class="font-serif text-3xl text-accent">{{ $result->suffix }}</span>
                </div>
                <p class="text-white/60 text-sm leading-relaxed mb-4">{{ $result->description }}</p>
                <a href="{{ route('work.show', $result->project_slug) }}" class="inline-flex items-center gap-2 font-mono text-label uppercase tracking-wider text-accent hover:text-white transition-colors">
                    View project
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- SECTION 6: PARTNERS — LOGO GRID --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="partners" class="py-24 md:py-32 bg-cream">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <h2 class="font-serif text-h2 text-charcoal mb-16 text-center" data-reveal>Trusted <span class="italic">Partners</span></h2>
        <div class="grid grid-cols-3 sm:grid-cols-5 gap-8 md:gap-12 items-center justify-items-center" data-reveal-stagger>
            @foreach($partners as $partner)
            <div class="flex items-center justify-center h-16 w-full grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition-all duration-400 cursor-default">
                <span class="font-sans text-sm md:text-base font-semibold text-charcoal tracking-wide">{{ $partner }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- SECTION 7: TESTIMONIALS --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="testimonials" class="py-24 md:py-32 bg-cream-2"
    x-data="{
        current: 0,
        total: {{ count($testimonials) }},
        autoplay: null,
        init() {
            this.startAutoplay();
        },
        next() { this.current = (this.current + 1) % this.total; this.restartAutoplay(); },
        prev() { this.current = (this.current - 1 + this.total) % this.total; this.restartAutoplay(); },
        goTo(i) { this.current = i; this.restartAutoplay(); },
        startAutoplay() { this.autoplay = setInterval(() => this.next(), 8000); },
        restartAutoplay() { clearInterval(this.autoplay); this.startAutoplay(); }
    }">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <h2 class="font-serif text-h2 text-charcoal mb-16" data-reveal>What our <span class="italic">clients</span> say</h2>

        <div class="relative overflow-hidden">
            @foreach($testimonials as $index => $testimonial)
            <div x-show="current === {{ $index }}"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 translate-x-8"
                 x-transition:enter-end="opacity-100 translate-x-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0 -translate-x-8"
                 class="min-h-[300px]">
                <blockquote class="mb-10">
                    <p class="font-serif text-2xl md:text-4xl text-charcoal leading-snug max-w-4xl">"{{ $testimonial->quote }}"</p>
                </blockquote>
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div>
                        <p class="font-sans font-semibold text-charcoal">{{ $testimonial->name }}</p>
                        <p class="text-mid text-sm">{{ $testimonial->role }}, {{ $testimonial->company }}</p>
                    </div>
                    <a href="{{ route('work.show', $testimonial->project_slug) }}" class="font-mono text-label uppercase tracking-wider text-accent hover:text-charcoal transition-colors">View project →</a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Navigation --}}
        <div class="flex items-center justify-between mt-12 pt-8 border-t border-light">
            <div class="flex gap-2">
                @foreach($testimonials as $index => $t)
                <button @click="goTo({{ $index }})"
                        :class="current === {{ $index }} ? 'bg-charcoal w-8' : 'bg-light w-3 hover:bg-mid'"
                        class="h-3 rounded-full transition-all duration-300"></button>
                @endforeach
            </div>
            <div class="flex gap-3">
                <button @click="prev()" class="w-12 h-12 rounded-full border-2 border-charcoal flex items-center justify-center hover:bg-charcoal hover:text-cream transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button @click="next()" class="w-12 h-12 rounded-full border-2 border-charcoal flex items-center justify-center hover:bg-charcoal hover:text-cream transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- SECTION 8: LATEST ARTICLES --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="blog" class="py-24 md:py-32 bg-cream">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <h2 class="font-serif text-h2 text-charcoal mb-16" data-reveal>Latest <span class="italic">Articles</span></h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-reveal-stagger>
            @foreach($latestPosts as $post)
            <a href="{{ route('blog.show', $post->slug) }}" class="group block">
                <div class="aspect-[4/3] bg-cream-2 rounded-lg overflow-hidden mb-5">
                    <div class="w-full h-full bg-gradient-to-br from-cream-2 to-light/40 group-hover:scale-105 transition-transform duration-700 flex items-center justify-center">
                        <span class="font-serif text-4xl text-light/40">{{ $loop->iteration }}</span>
                    </div>
                </div>
                <span class="font-mono text-label uppercase tracking-wider text-accent mb-3 block">{{ $post->category }}</span>
                <h3 class="font-serif text-xl text-charcoal mb-2 group-hover:text-accent transition-colors">{{ $post->title }}</h3>
                <p class="text-mid text-sm line-clamp-2">{{ $post->excerpt }}</p>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-12" data-reveal>
            <a href="{{ route('blog') }}" class="inline-flex items-center gap-3 px-8 py-4 border-2 border-charcoal text-charcoal font-sans font-medium rounded-full hover:bg-charcoal hover:text-cream transition-all duration-300">
                View our blog
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- SECTION 9: FAQ ACCORDION --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="faq" class="py-24 md:py-32 bg-cream-2" x-data="{ openItem: null }">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
            <div class="md:col-span-4" data-reveal>
                <h2 class="font-serif text-h2 text-charcoal mb-4">Frequently Asked<br><span class="italic">Questions</span></h2>
                <p class="text-mid">Can't find what you're looking for?</p>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-accent font-medium mt-4 hover:text-charcoal transition-colors">
                    Get in touch
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <div class="md:col-span-8">
                @foreach($faqItems as $index => $faq)
                <div class="border-b border-light" data-reveal>
                    <button @click="openItem = openItem === {{ $index }} ? null : {{ $index }}"
                            class="w-full flex items-center justify-between py-6 text-left group">
                        <h3 class="font-sans text-lg font-medium text-charcoal pr-8 group-hover:text-accent transition-colors">{{ $faq->question }}</h3>
                        <div class="relative w-6 h-6 flex-shrink-0">
                            <span class="absolute top-1/2 left-0 w-6 h-0.5 bg-charcoal transform -translate-y-1/2 transition-transform duration-300"
                                  :class="openItem === {{ $index }} ? 'rotate-45' : ''"></span>
                            <span class="absolute top-1/2 left-0 w-6 h-0.5 bg-charcoal transform -translate-y-1/2 transition-transform duration-300"
                                  :class="openItem === {{ $index }} ? '-rotate-45' : 'rotate-90'"></span>
                        </div>
                    </button>
                    <div x-show="openItem === {{ $index }}"
                         x-collapse
                         x-cloak>
                        <div class="pb-6 pr-12">
                            <p class="text-mid leading-relaxed">{{ $faq->answer }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- CTA SECTION --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section class="py-24 md:py-32 bg-charcoal text-white text-center">
    <div class="max-w-content mx-auto px-6 md:px-8" data-reveal>
        <h2 class="font-serif text-h2 text-white mb-6">Ready to stand out?</h2>
        <p class="text-white/60 text-lg mb-10 max-w-lg mx-auto">Let's build something extraordinary together. Tell us about your project and we'll take it from there.</p>
        <a href="{{ route('start-project') }}" class="inline-flex items-center gap-3 px-10 py-5 bg-accent text-white font-sans font-semibold rounded-full hover:bg-white hover:text-charcoal transition-all duration-300 text-lg">
            Start your project
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Liquid Cursor Tracking for Aurora Mesh
    const hero = document.getElementById('hero');
    const cursorBlob = document.getElementById('cursor-blob');
    
    if (hero && cursorBlob) {
        let targetX = window.innerWidth / 2;
        let targetY = window.innerHeight / 2;
        let currentX = targetX;
        let currentY = targetY;
        
        hero.addEventListener('mousemove', (e) => {
            const rect = hero.getBoundingClientRect();
            targetX = e.clientX - rect.left;
            targetY = e.clientY - rect.top;
        });

        function animateLiquidCursor() {
            // Smooth lerp (friction) for liquid effect
            currentX += (targetX - currentX) * 0.08;
            currentY += (targetY - currentY) * 0.08;
            
            cursorBlob.style.transform = `translate(${currentX}px, ${currentY}px) translate(-50%, -50%)`;
            requestAnimationFrame(animateLiquidCursor);
        }
        
        animateLiquidCursor();
    }
});
</script>
@endsection

@endsection
