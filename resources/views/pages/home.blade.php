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

{{-- Global Aurora Mesh Gradient Background --}}
<div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none bg-cream" id="fluid-bg">
        {{-- Formless Mesh Gradient Container --}}
        <div class="absolute inset-0 opacity-85 blur-[120px] md:blur-[160px]" id="blob-container">
            
            {{-- Blob 1: Top Right (Soft Indigo) --}}
            <div class="absolute top-[-20%] right-[-10%] w-[60vw] h-[60vw] md:w-[45vw] md:h-[45vw] bg-indigo-300 rounded-full opacity-60 aurora-blob-1"></div>
            
            {{-- Blob 2: Bottom Left (Soft Teal) --}}
            <div class="absolute bottom-[-30%] left-[-10%] w-[70vw] h-[70vw] md:w-[50vw] md:h-[50vw] bg-teal-300 rounded-full opacity-50 aurora-blob-2"></div>
            
            {{-- Blob 3: Center Offset (Brand Cyan) --}}
            <div class="absolute top-[10%] left-[20%] w-[50vw] h-[50vw] md:w-[35vw] md:h-[35vw] bg-accent rounded-full opacity-30 aurora-blob-3"></div>
            
            {{-- Blob 4: Center Right (Warm Rose) --}}
            <div class="absolute bottom-[20%] right-[10%] w-[40vw] h-[40vw] md:w-[30vw] md:h-[30vw] bg-rose-300 rounded-full opacity-90 aurora-blob-1" style="animation-delay: -7s;"></div>
            
            {{-- Interactive Cursor Blob (Violet) --}}
            <div id="cursor-blob" class="absolute top-0 left-0 w-[40vw] h-[40vw] md:w-[25vw] md:h-[25vw] bg-violet-400 rounded-full opacity-80 will-change-transform" style="transform: translate(-50%, -50%);"></div>
        </div>
        
        {{-- Fine Grain Noise Overlay for Premium Texture --}}
        <div class="absolute inset-0 opacity-[0.04] mix-blend-overlay pointer-events-none" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=%220 0 200 200%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cfilter id=%22noiseFilter%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.8%22 numOctaves=%223%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23noiseFilter)%22/%3E%3C/svg%3E');"></div>
    </div>

<section id="hero" class="relative min-h-screen flex items-center pt-32 pb-40">
    <div class="w-full px-4 md:px-8 relative z-10 flex flex-col items-center justify-center mt-12 md:mt-24 mb-16">
        <h1 class="font-sans font-bold lowercase w-full text-center leading-[0.85] tracking-[-0.06em]" style="font-size: clamp(4rem, 18vw, 340px);" data-reveal>
            <span class="text-charcoal">diver</span><span class="text-accent">.ent</span>
        </h1>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- SECTION 3: SERVICES INTRO & STACKED CARDS --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="services-intro" class="relative pt-32 pb-24 md:pt-48 md:pb-32 overflow-hidden z-20 group/intro" data-reveal>
    <div class="max-w-[1440px] mx-auto px-6 md:px-12 w-full text-center relative z-10">
        <h2 class="font-sans text-[clamp(60px,12vw,180px)] font-medium text-charcoal leading-[0.9] tracking-tighter uppercase">
            <span class="block transition-all duration-700 delay-100 translate-y-8 opacity-0 group-[.revealed]/intro:translate-y-0 group-[.revealed]/intro:opacity-100">Our</span>
            <span class="block transition-all duration-700 delay-300 translate-y-8 opacity-0 group-[.revealed]/intro:translate-y-0 group-[.revealed]/intro:opacity-100">Services</span>
        </h2>
        
        <div class="mt-16 md:mt-24 flex justify-center transition-all duration-700 delay-500 translate-y-8 opacity-0 group-[.revealed]/intro:translate-y-0 group-[.revealed]/intro:opacity-100">
            <div class="w-12 h-12 md:w-16 md:h-16 rounded-full border border-charcoal/20 flex items-center justify-center animate-bounce text-charcoal/50">
                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
            </div>
        </div>
    </div>
    
    {{-- Decorative subtle background blur --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-[150%] max-w-5xl opacity-20 pointer-events-none" style="background: radial-gradient(circle, rgba(255,0,127,0.1) 0%, rgba(20,200,240,0.05) 50%, rgba(255,255,255,0) 80%); filter: blur(60px);"></div>
</section>

<section id="services-cards" class="relative pb-32 md:pb-56 z-30">
    <div class="max-w-[1300px] mx-auto px-6 md:px-12 w-full">
        <div class="relative w-full space-y-12 md:space-y-24">
            @foreach($services as $index => $service)
            {{-- NORMAL CARD CONTAINER (NOT STICKY) --}}
            <div class="w-full rounded-[2rem] md:rounded-[3rem] bg-white shadow-[0_10px_40px_rgba(0,0,0,0.06)] border border-charcoal/5 p-8 md:p-10 lg:p-12 overflow-hidden transition-all duration-700 group/card" 
                 data-reveal="true">
                
                <div class="flex flex-col lg:flex-row gap-10 lg:gap-16 h-full items-center">
                    {{-- Left Content with internal stagger --}}
                    <div class="w-full lg:w-[45%] flex flex-col justify-center">
                        <div class="card-content-stagger">
                            <h3 class="font-sans text-4xl md:text-5xl lg:text-[56px] font-medium text-charcoal mb-6 leading-[1.05] tracking-tight transition-all duration-700 delay-[100ms] translate-y-8 opacity-0 group-[.revealed]/card:translate-y-0 group-[.revealed]/card:opacity-100">{{ $service->title }}</h3>
                            
                            {{-- Tags --}}
                            <div class="flex flex-wrap gap-2 md:gap-3 mb-8 transition-all duration-700 delay-[250ms] translate-y-8 opacity-0 group-[.revealed]/card:translate-y-0 group-[.revealed]/card:opacity-100">
                                @foreach($service->sub_services as $sub)
                                <span class="px-4 py-2 md:px-5 md:py-2.5 border border-charcoal/15 rounded-full text-[13px] md:text-[14px] font-medium text-charcoal bg-transparent hover:border-charcoal/40 hover:bg-charcoal/5 transition-colors duration-300 cursor-default">
                                    {{ $sub }}
                                </span>
                                @endforeach
                            </div>
                            
                            {{-- Description --}}
                            <p class="text-charcoal/70 text-base md:text-lg leading-relaxed mb-10 transition-all duration-700 delay-[400ms] translate-y-8 opacity-0 group-[.revealed]/card:translate-y-0 group-[.revealed]/card:opacity-100">{{ $service->description }}</p>
                        </div>
                        
                        {{-- Button --}}
                        <div class="transition-all duration-700 delay-[550ms] translate-y-8 opacity-0 group-[.revealed]/card:translate-y-0 group-[.revealed]/card:opacity-100 card-content-stagger">
                            <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-3 px-8 py-3.5 bg-transparent border-2 border-charcoal text-charcoal rounded-full font-sans font-medium hover:border-accent hover:shadow-[0_0_20px_rgba(20,200,240,0.15)] transition-all duration-300 group/btn">
                                Find out more
                                <span class="w-8 h-8 rounded-full border border-transparent group-hover/btn:border-accent flex items-center justify-center transition-colors duration-300">
                                    <svg class="w-4 h-4 group-hover/btn:text-accent transform group-hover/btn:translate-x-0.5 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </span>
                            </a>
                        </div>
                    </div>
                    
                    {{-- Right Image Placeholder --}}
                    <div class="w-full lg:w-[55%] rounded-[1.5rem] bg-gradient-to-br {{ $index % 2 == 0 ? 'from-[#F4F6F9] to-[#E9EDF2]' : 'from-[#E9EDF2] to-[#F4F6F9]' }} min-h-[250px] lg:min-h-[350px] flex items-center justify-center relative overflow-hidden group/img transition-all duration-1000 delay-[200ms] translate-y-12 opacity-0 group-[.revealed]/card:translate-y-0 group-[.revealed]/card:opacity-100 scale-95 group-[.revealed]/card:scale-100">
                        <div class="absolute inset-0 opacity-[0.03] mix-blend-multiply" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=%220 0 200 200%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cfilter id=%22noiseFilter%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.8%22 numOctaves=%223%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23noiseFilter)%22/%3E%3C/svg%3E');"></div>
                        <div class="font-serif text-2xl md:text-3xl text-charcoal/20 font-bold mix-blend-multiply group-hover/img:scale-105 transition-transform duration-700 text-center px-8">{{ $service->title }}<br><span class="font-sans text-xl font-normal opacity-50">Visual Asset</span></div>
                    </div>
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- SECTION 4: MANIFESTO (Brand-led) --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="manifesto" class="relative py-24 md:py-32 lg:py-48 bg-transparent z-20 border-t-2 border-charcoal/30 border-b-2">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12 w-full">
        
        {{-- Section Heading --}}
        <div class="w-full mb-32 md:mb-48 text-center md:text-left" data-reveal>
            <h2 class="font-sans text-[12vw] lg:text-[7.5vw] font-medium leading-[0.9] tracking-tight text-charcoal">
                Brand-led.<br>Strategically<br>built.
            </h2>
        </div>

        <div class="flex flex-col">
            
            {{-- Block 01 --}}
            <div class="manifesto-block relative flex flex-col lg:flex-row justify-between items-center py-12 md:py-16 lg:py-20 border-b-2 border-charcoal/30 overflow-visible group/block">
                {{-- Left: Typography --}}
                <div class="w-full lg:w-[45%] z-10 pointer-events-none" data-reveal>
                    <div class="font-sans text-xl md:text-2xl text-charcoal mb-4 md:mb-6 font-medium">01/</div>
                    <h3 class="font-sans text-[10vw] lg:text-[6.5vw] font-medium leading-[0.9] tracking-tight text-charcoal transition-transform duration-700 group-hover/block:translate-x-4">
                        Design with<br>guts.
                    </h3>
                </div>
                
                {{-- Right: Paragraph --}}
                <div class="w-full lg:w-[40%] z-10 mt-12 lg:mt-0 pointer-events-none text-right lg:text-left" data-reveal>
                    <p class="font-sans text-xl md:text-[1.75rem] text-charcoal leading-[1.3] font-normal mix-blend-multiply drop-shadow-sm">
                        We build immersive, brand-led digital experiences that wow and work hard. The kind that raises eyebrows, sparks emotion, and moves people to act.
                    </p>
                </div>

                {{-- Center: Floating Mouse Box --}}
                <div class="manifesto-img absolute top-1/2 left-1/2 w-[200px] md:w-[280px] aspect-square rounded-[2rem] bg-gradient-to-tr from-accent-lime via-[#FFD166] to-accent-pink shadow-2xl overflow-hidden z-0 pointer-events-none transition-transform duration-[50ms] ease-linear" style="transform: translate(-50%, -50%); will-change: transform;">
                    <div class="parallax-shape absolute top-8 right-8 w-24 h-12 bg-white/30 backdrop-blur-md rounded-lg border border-white/40" data-speed="0.1"></div>
                    <div class="parallax-shape absolute bottom-12 left-8 w-32 h-40 bg-charcoal/80 backdrop-blur-md rounded-xl border border-white/10" data-speed="-0.15"></div>
                </div>
            </div>

            {{-- Block 02 --}}
            <div class="manifesto-block relative flex flex-col lg:flex-row justify-between items-center py-12 md:py-16 lg:py-20 border-b-2 border-charcoal/30 overflow-visible group/block">
                {{-- Left: Typography --}}
                <div class="w-full lg:w-[45%] z-10 pointer-events-none" data-reveal>
                    <div class="font-sans text-xl md:text-2xl text-charcoal mb-4 md:mb-6 font-medium">02/</div>
                    <h3 class="font-sans text-[10vw] lg:text-[6.5vw] font-medium leading-[0.9] tracking-tight text-charcoal transition-transform duration-700 group-hover/block:translate-x-4">
                        Nail the<br>process.
                    </h3>
                </div>
                
                {{-- Right: Paragraph --}}
                <div class="w-full lg:w-[40%] z-10 mt-12 lg:mt-0 pointer-events-none text-right lg:text-left" data-reveal>
                    <p class="font-sans text-xl md:text-[1.75rem] text-charcoal leading-[1.3] font-normal mix-blend-multiply drop-shadow-sm">
                        We’re collaborative, decisive, and clear from day one. You’ll feel the momentum. You’ll know where you stand. You’ll have a team that knows when to lead, and when to listen.
                    </p>
                </div>

                {{-- Center: Floating Mouse Box --}}
                <div class="manifesto-img absolute top-1/2 left-1/2 w-[200px] md:w-[280px] aspect-square rounded-[2rem] bg-gradient-to-tr from-cyan-300 via-teal-300 to-emerald-400 shadow-2xl overflow-hidden z-0 pointer-events-none transition-transform duration-[50ms] ease-linear" style="transform: translate(-50%, -50%); will-change: transform;">
                    <div class="parallax-shape absolute top-12 left-12 w-40 h-16 bg-white/30 backdrop-blur-md rounded-xl border border-white/40" data-speed="0.12"></div>
                    <div class="parallax-shape absolute bottom-8 right-8 w-24 h-24 rounded-full bg-white/20 backdrop-blur-md border border-white/30" data-speed="-0.1"></div>
                </div>
            </div>

            {{-- Block 03 --}}
            <div class="manifesto-block relative flex flex-col lg:flex-row justify-between items-center py-12 md:py-16 lg:py-20 border-b-2 border-charcoal/30 overflow-visible group/block">
                {{-- Left: Typography --}}
                <div class="w-full lg:w-[45%] z-10 pointer-events-none" data-reveal>
                    <div class="font-sans text-xl md:text-2xl text-charcoal mb-4 md:mb-6 font-medium">03/</div>
                    <h3 class="font-sans text-[10vw] lg:text-[6.5vw] font-medium leading-[0.9] tracking-tight text-charcoal transition-transform duration-700 group-hover/block:translate-x-4">
                        Build to<br>flex.
                    </h3>
                </div>
                
                {{-- Right: Paragraph --}}
                <div class="w-full lg:w-[40%] z-10 mt-12 lg:mt-0 pointer-events-none text-right lg:text-left" data-reveal>
                    <p class="font-sans text-xl md:text-[1.75rem] text-charcoal leading-[1.3] font-normal mix-blend-multiply drop-shadow-sm">
                        We’re ready for your growth. In fact, we’re rooting for it. Whether it’s a new campaign, product, or pivot, we make sure your digital presence is set up to flex with you.
                    </p>
                </div>

                {{-- Center: Floating Mouse Box --}}
                <div class="manifesto-img absolute top-1/2 left-1/2 w-[200px] md:w-[280px] aspect-square rounded-[2rem] bg-gradient-to-tr from-indigo-300 via-violet-300 to-fuchsia-300 shadow-2xl overflow-hidden z-0 pointer-events-none transition-transform duration-[50ms] ease-linear" style="transform: translate(-50%, -50%); will-change: transform;">
                    <div class="parallax-shape absolute inset-x-8 top-1/2 -translate-y-1/2 h-32 bg-white/20 backdrop-blur-lg rounded-2xl border border-white/40" data-speed="0.08"></div>
                </div>
            </div>

            {{-- Block 04 --}}
            <div class="manifesto-block relative flex flex-col lg:flex-row justify-between items-center py-12 md:py-16 lg:py-20 overflow-visible group/block">
                {{-- Left: Typography --}}
                <div class="w-full lg:w-[45%] z-10 pointer-events-none" data-reveal>
                    <div class="font-sans text-xl md:text-2xl text-charcoal mb-4 md:mb-6 font-medium">04/</div>
                    <h3 class="font-sans text-[10vw] lg:text-[6.5vw] font-medium leading-[0.9] tracking-tight text-charcoal transition-transform duration-700 group-hover/block:translate-x-4">
                        Create to<br>convert.
                    </h3>
                </div>
                
                {{-- Right: Paragraph --}}
                <div class="w-full lg:w-[40%] z-10 mt-12 lg:mt-0 pointer-events-none text-right lg:text-left" data-reveal>
                    <p class="font-sans text-xl md:text-[1.75rem] text-charcoal leading-[1.3] font-normal mix-blend-multiply drop-shadow-sm">
                        We sweat the small stuff. From brand visuals to UX flow, every decision is intentional—designed to boost engagement, drive conversions, and build brand equity.
                    </p>
                </div>

                {{-- Center: Floating Mouse Box --}}
                <div class="manifesto-img absolute top-1/2 left-1/2 w-[200px] md:w-[280px] aspect-square rounded-[2rem] bg-gradient-to-tr from-[#FF9A9E] to-[#FECFEF] shadow-2xl overflow-hidden z-0 pointer-events-none transition-transform duration-[50ms] ease-linear" style="transform: translate(-50%, -50%); will-change: transform;">
                    <div class="parallax-shape absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-48 h-48 bg-white/30 backdrop-blur-md rounded-full border border-white/40" data-speed="-0.12"></div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- SECTION 5: OUR WORK — PORTFOLIO CARDS --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="work" class="py-24 md:py-32">
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
               class="group relative block overflow-hidden rounded-lg bg-dark-bg {{ $loop->first ? 'md:col-span-2 aspect-[16/9]' : 'aspect-[4/3]' }}">
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
            <a href="{{ route('work') }}" class="inline-flex items-center gap-3 px-8 py-4 border-2 border-charcoal text-charcoal font-sans font-medium rounded-full hover:border-accent hover:shadow-[0_0_20px_rgba(20,200,240,0.15)] transition-all duration-300 group/work-btn">
                View all projects
                <span class="w-8 h-8 rounded-full border border-transparent group-hover/work-btn:border-accent flex items-center justify-center transition-colors duration-300">
                    <svg class="w-4 h-4 group-hover/work-btn:text-accent transform group-hover/work-btn:translate-x-0.5 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </span>
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
<section id="partners" class="py-24 md:py-32">
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
<section id="testimonials" class="py-24 md:py-32"
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

        <div class="relative overflow-hidden min-h-[300px] md:min-h-[250px]">
            @foreach($testimonials as $index => $testimonial)
            <div x-show="current === {{ $index }}"
                 x-transition:enter="transition-all ease-out duration-1000"
                 x-transition:enter-start="opacity-0 blur-md translate-y-6"
                 x-transition:enter-end="opacity-100 blur-0 translate-y-0"
                 x-transition:leave="transition-all ease-in duration-500 absolute top-0 left-0 w-full"
                 x-transition:leave-start="opacity-100 blur-0 translate-y-0"
                 x-transition:leave-end="opacity-0 blur-sm -translate-y-6"
                 class="w-full">
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
                <button @click="prev()" class="w-12 h-12 rounded-full border-2 border-charcoal flex items-center justify-center text-charcoal hover:border-accent hover:text-accent hover:shadow-[0_0_20px_rgba(20,200,240,0.15)] transition-all duration-300">
                    <svg class="w-4 h-4 transform -translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button @click="next()" class="w-12 h-12 rounded-full border-2 border-charcoal flex items-center justify-center text-charcoal hover:border-accent hover:text-accent hover:shadow-[0_0_20px_rgba(20,200,240,0.15)] transition-all duration-300">
                    <svg class="w-4 h-4 transform translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
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
            <a href="{{ route('blog') }}" class="inline-flex items-center gap-3 px-8 py-4 border-2 border-charcoal text-charcoal font-sans font-medium rounded-full hover:border-accent hover:shadow-[0_0_20px_rgba(20,200,240,0.15)] transition-all duration-300 group/blog-btn">
                View our blog
                <span class="w-8 h-8 rounded-full border border-transparent group-hover/blog-btn:border-accent flex items-center justify-center transition-colors duration-300">
                    <svg class="w-4 h-4 group-hover/blog-btn:text-accent transform group-hover/blog-btn:translate-x-0.5 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </span>
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
<section class="py-24 md:py-32 bg-dark-bg text-white text-center">
    <div class="max-w-content mx-auto px-6 md:px-8" data-reveal>
        <h2 class="font-serif text-h2 text-white mb-6">Ready to stand out?</h2>
        <p class="text-white/60 text-lg mb-10 max-w-lg mx-auto">Let's build something extraordinary together. Tell us about your project and we'll take it from there.</p>
        <a href="{{ route('start-project') }}" class="inline-flex items-center gap-3 px-10 py-5 bg-accent text-white font-sans font-semibold rounded-full hover:scale-105 hover:bg-accent/90 hover:shadow-[0_0_30px_rgba(20,200,240,0.4)] transition-all duration-300 text-lg group">
            Start your project
            <svg class="w-5 h-5 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
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
        
        document.addEventListener('mousemove', (e) => {
            targetX = e.clientX;
            targetY = e.clientY;
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

    // Services Card Fade-out on scroll up
    const serviceCards = document.querySelectorAll('#services-cards .group\\/card');
    let isTicking = false;
    
    window.addEventListener('scroll', () => {
        if (!isTicking) {
            window.requestAnimationFrame(() => {
                const windowHeight = window.innerHeight;
                const fadeDistance = windowHeight * 0.35; // Distance it takes to fully fade out (35% of screen height)
                
                serviceCards.forEach(card => {
                    const rect = card.getBoundingClientRect();
                    
                    // Only start fading when the top of the card touches or goes above the top of the viewport
                    if (rect.top < 0) {
                        // Math.abs(rect.top) is how far it has scrolled past the top ceiling
                        let scrolledPast = Math.abs(rect.top);
                        let opacity = 1 - (scrolledPast / fadeDistance);
                        opacity = Math.max(0, opacity); // Clamp to 0 min
                        
                        let scale = 1 - (0.05 * (1 - opacity)); // Shrinks from 1 to 0.95
                        
                        // Apply inline styles
                        card.style.opacity = opacity;
                        card.style.transform = `scale(${scale}) translateY(${-(1 - opacity) * 40}px)`;
                        card.style.transition = 'transform 0.15s ease-out, opacity 0.15s ease-out';
                    } else {
                        // Reset styles: Fully visible when anywhere in the middle/bottom of screen
                        card.style.opacity = '';
                        card.style.transform = '';
                        card.style.transition = '';
                    }
                });
                isTicking = false;
            });
            isTicking = true;
        }
    });

    // Manifesto Interactive Hover (Magnetic Mouse Follow)
    const manifestoBlocks = document.querySelectorAll('.manifesto-block');
    manifestoBlocks.forEach(block => {
        const img = block.querySelector('.manifesto-img');
        if(!img) return;
        
        let targetX = 0;
        let targetY = 0;
        let currentX = 0;
        let currentY = 0;
        let isHovering = false;
        
        block.addEventListener('mouseenter', () => {
            isHovering = true;
        });

        block.addEventListener('mousemove', (e) => {
            const rect = block.getBoundingClientRect();
            // Calculate mouse position relative to the center of the block
            targetX = e.clientX - rect.left - (rect.width / 2);
            targetY = e.clientY - rect.top - (rect.height / 2);
            
            // Constrain movement so it doesn't go entirely off screen
            const maxX = rect.width / 3;
            const maxY = rect.height / 3;
            targetX = Math.max(-maxX, Math.min(maxX, targetX));
            targetY = Math.max(-maxY, Math.min(maxY, targetY));
        });
        
        block.addEventListener('mouseleave', () => {
            isHovering = false;
            targetX = 0;
            targetY = 0;
        });

        function animateManifestoImg() {
            // Smooth lerp
            currentX += (targetX - currentX) * 0.08;
            currentY += (targetY - currentY) * 0.08;
            
            // Add a very subtle 3D tilt based on the current offset
            const tiltX = (currentY / (block.offsetHeight / 2)) * -5; 
            const tiltY = (currentX / (block.offsetWidth / 2)) * 5;
            
            img.style.transform = `translate(calc(-50% + ${currentX}px), calc(-50% + ${currentY}px)) perspective(1200px) rotateX(${tiltX}deg) rotateY(${tiltY}deg)`;
            
            requestAnimationFrame(animateManifestoImg);
        }
        animateManifestoImg();
    });

    // Parallax Shapes on Scroll
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        document.querySelectorAll('.parallax-shape').forEach(shape => {
            const speed = parseFloat(shape.getAttribute('data-speed')) || 0.1;
            const yPos = -(scrolled * speed);
            shape.style.transform = `translateY(${yPos}px)`;
        });
    });
});
</script>
@endsection

@endsection
