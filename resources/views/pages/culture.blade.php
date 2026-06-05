@extends('layouts.app')
@section('title', 'Culture — DIVER.ENT')
@section('meta_description', 'Dive into our culture to see how our team values shape everything we do. It\'s not just how we work, it\'s who we are.')

@section('content')

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- HERO SECTION --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section class="relative min-h-[85vh] md:min-h-screen flex flex-col pt-32 pb-8 overflow-hidden" id="culture-hero">
    {{-- Cursor-following gradient background --}}
    <div class="absolute inset-0 z-0 bg-cream">
        <div id="cursor-gradient" class="absolute inset-0 opacity-60 transition-transform duration-75 ease-out"
             style="background: radial-gradient(circle 800px at 50% 50%, var(--color-accent) 0%, transparent 60%);">
        </div>
        {{-- Extra static gradient for depth --}}
        <div class="absolute inset-0 bg-gradient-to-br from-cream/40 via-transparent to-charcoal/5"></div>
    </div>

    {{-- Top: The quote --}}
    <div class="max-w-[1440px] mx-auto px-6 md:px-8 w-full relative z-10 flex-grow flex flex-col pt-8 md:pt-16">
        <h2 class="font-sans text-[clamp(56px,9vw,140px)] font-medium text-charcoal leading-[0.95] tracking-[-0.04em] culture-line-reveal" style="margin-left: -0.05em;">
            Be part of a great<br>
            team, but work<br>
            from anywhere.
        </h2>
    </div>

    {{-- Bottom: | culture --}}
    <div class="max-w-content mx-auto px-6 md:px-8 w-full relative z-10 pb-4">
        <div class="flex items-center gap-3">
            <div class="w-[1.5px] h-6 bg-charcoal/40"></div>
            <h1 class="font-sans text-[clamp(28px,4vw,40px)] font-bold text-charcoal tracking-tight lowercase">
                culture
            </h1>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- VALUES SECTION --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section class="py-24 md:py-32 bg-cream">
    <div class="max-w-content mx-auto px-6 md:px-8">
        {{-- Section intro --}}
        <div class="mb-8 md:mb-12" data-reveal>
            <h3 class="font-serif text-[clamp(24px,3vw,36px)] text-charcoal leading-snug max-w-lg">
                Why we love what we do, <em class="italic">even on a Monday.</em>
            </h3>
        </div>

        {{-- "Our Values" large heading --}}
        <div class="mb-20 md:mb-28" data-reveal>
            <p class="font-serif text-[clamp(48px,10vw,140px)] font-bold text-charcoal leading-[0.95] tracking-tight">Our</p>
            <p class="font-serif text-[clamp(48px,10vw,140px)] font-bold text-charcoal leading-[0.95] tracking-tight italic">Values</p>
        </div>

        {{-- Value rows --}}
        <div class="space-y-0">
            @php
                $values = [
                    ['num' => '01', 'title' => 'Tune In', 'color' => '#a8e1ec', 'desc' => 'We actually listen. We listen to everyone around us and respect each other\'s opinions, whether it\'s our team, our clients, or our community. Two heads are often better than one.'],
                    ['num' => '02', 'title' => 'Get Dirty', 'color' => '#EFB2D9', 'desc' => 'Embrace every challenge. Don\'t be afraid of getting your hands dirty. We have a collective, active curiosity that constantly moves us forwards, keeps us forever learning, and challenges us without any fear of failure.'],
                    ['num' => '03', 'title' => 'Think Diversely', 'color' => '#d7e1d3', 'desc' => 'We embrace how varied life is. Whether it\'s the clients and industries we work in, our interests and inspiration, or our attitudes to life in general. Diversity drives creativity.'],
                    ['num' => '04', 'title' => 'Leave No Crumbs', 'color' => '#f8e5cb', 'desc' => 'Good is the enemy of great. We strive for the best, we care about what we do. We don\'t cut corners, every pixel matters. We don\'t leave it for someone else to tidy up, we leave no crumbs.'],
                    ['num' => '05', 'title' => 'Leave a Legacy', 'color' => '#c4b5f3', 'desc' => 'We care about our legacy and the impact we have. It\'s our duty to leave the world a better place than we found it. Every project is a chance to make a lasting impression.'],
                ];
            @endphp

            @foreach($values as $i => $value)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16 py-12 md:py-20 border-t border-charcoal/10 value-row" data-reveal>
                {{-- Text side --}}
                <div class="flex flex-col justify-center">
                    <div class="value-text-inner">
                        <p class="font-mono text-[13px] text-mid tracking-wider mb-4">{{ $value['num'] }}/</p>
                        <h3 class="inline-block font-sans text-[clamp(28px,4vw,44px)] font-bold text-charcoal px-3 py-1 rounded-[4px] mb-6 leading-tight" style="background-color: {{ $value['color'] }};">
                            {{ $value['title'] }}
                        </h3>
                        <p class="text-charcoal/70 text-[16px] md:text-[18px] leading-relaxed max-w-md">{{ $value['desc'] }}</p>
                    </div>
                </div>

                {{-- Image side --}}
                <div class="aspect-[1/1.04] rounded-lg overflow-hidden value-image">
                    <div class="w-full h-full bg-gradient-to-br transition-transform duration-700 hover:scale-[1.03] flex items-center justify-center"
                         style="background: linear-gradient(135deg, {{ $value['color'] }}40, {{ $value['color'] }}15, var(--color-cream-2));">
                        <span class="font-serif text-[80px] md:text-[120px] font-bold" style="color: {{ $value['color'] }}50;">{{ $value['num'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- IMAGE GALLERY --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section class="bg-cream overflow-hidden">
    {{-- Full width image --}}
    <div class="w-full aspect-[16/7] md:aspect-[16/6] overflow-hidden" data-reveal>
        <div class="w-full h-full bg-gradient-to-r from-charcoal/5 via-accent/10 to-charcoal/5 flex items-center justify-center" style="transform: scale(1.05);">
            <span class="font-serif text-[clamp(32px,6vw,64px)] text-charcoal/10">Team DIVER.ENT</span>
        </div>
    </div>

    {{-- Two column gallery --}}
    <div class="max-w-content mx-auto px-6 md:px-8 py-12 md:py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
            <div class="aspect-[1.1/1] rounded-lg overflow-hidden" data-reveal>
                <div class="w-full h-full bg-gradient-to-br from-cream-2 to-accent/10 flex items-center justify-center hover:scale-[1.02] transition-transform duration-700">
                    <span class="font-serif text-4xl text-light/40">Office Life</span>
                </div>
            </div>
            <div class="aspect-[0.86/1] rounded-lg overflow-hidden mt-0 md:mt-16" data-reveal>
                <div class="w-full h-full bg-gradient-to-br from-accent/10 to-cream-2 flex items-center justify-center hover:scale-[1.02] transition-transform duration-700">
                    <span class="font-serif text-4xl text-light/40">Team Fun</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- PERKS SECTION (Dark) --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section class="py-24 md:py-32 bg-charcoal text-cream relative overflow-hidden"
    x-data="{
        currentPerk: 0,
        perks: [
            { title: '4.5 day week.', desc: 'Finish at 1pm on a Friday!' },
            { title: 'Remote-first culture.', desc: 'Work from anywhere in the world.' },
            { title: 'Learning budget.', desc: '£1,000/year for courses, books & conferences.' },
            { title: 'Quarterly team trips.', desc: 'From London to Lisbon, we explore together.' },
            { title: 'Mental health support.', desc: 'Therapy sessions & wellbeing resources included.' },
            { title: 'Latest tech setup.', desc: 'MacBook Pro, 4K monitor, and all the tools you need.' },
            { title: '30 days holiday.', desc: 'Plus bank holidays. Rest is productive.' },
            { title: 'Profit sharing.', desc: 'When we win, everyone wins.' },
        ],
        next() {
            this.currentPerk = (this.currentPerk + 1) % this.perks.length;
        }
    }">

    {{-- Gradient orb bg --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-to-br from-accent/10 via-transparent to-transparent rounded-full blur-[120px] pointer-events-none"></div>

    <div class="max-w-content mx-auto px-6 md:px-8 relative z-10">
        {{-- Heading --}}
        <div class="mb-16 md:mb-24" data-reveal>
            <p class="font-serif text-[clamp(28px,4vw,48px)] text-cream/90 leading-snug max-w-lg">
                Sorry, no table football, but...
            </p>
        </div>

        {{-- Perk display --}}
        <div class="border-t border-cream/15 pt-12">
            <div class="min-h-[180px] md:min-h-[200px] flex flex-col justify-center">
                <p class="font-serif text-[clamp(36px,6vw,72px)] font-bold text-cream leading-tight mb-4 transition-all duration-500"
                   x-text="perks[currentPerk].title"
                   :key="currentPerk"
                   x-transition:enter="transition ease-out duration-400"
                   x-transition:enter-start="opacity-0 translate-y-4"
                   x-transition:enter-end="opacity-100 translate-y-0">
                </p>
                <p class="text-cream/50 text-lg md:text-xl mb-10"
                   x-text="perks[currentPerk].desc">
                </p>

                <button @click="next()"
                        class="inline-flex items-center gap-3 text-cream/60 hover:text-cream transition-colors group">
                    {{-- Rotating arrow --}}
                    <span class="w-12 h-12 rounded-full border border-cream/20 flex items-center justify-center group-hover:border-cream/50 group-hover:bg-cream/5 transition-all">
                        <svg class="w-4 h-4 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </span>
                    <span class="font-mono text-[13px] tracking-wider uppercase">Show another</span>
                </button>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- JOB CTA SECTION (Dark) --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section class="py-24 md:py-32 bg-charcoal-2 text-cream relative overflow-hidden">
    {{-- Gradient orb --}}
    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-gradient-to-tl from-accent/15 via-transparent to-transparent rounded-full blur-[100px] pointer-events-none"></div>

    <div class="max-w-content mx-auto px-6 md:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 md:gap-24">
            {{-- Left: CTA text --}}
            <div>
                <h3 class="font-serif text-[clamp(24px,3.5vw,40px)] text-cream leading-snug mb-10" data-reveal>
                    Got some cool stuff you'd like to share? We'd love to see it, even if there isn't a fit right now.
                </h3>
                <div data-reveal>
                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center gap-3 px-6 py-3.5 rounded-full border border-cream/30 text-cream font-sans text-[15px] font-medium hover:bg-cream hover:text-charcoal transition-all duration-300 group">
                        Get in touch
                        <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Right: Skills list --}}
            <div data-reveal>
                <p class="font-mono text-[12px] text-cream/40 tracking-wider uppercase mb-6">We're interested in :</p>
                <div class="space-y-0">
                    @foreach(['Webflow', 'WebGL', 'Web Animation', 'Motion Graphics', 'Photography', 'Illustration', 'Creative Strategy', 'Copywriting'] as $skill)
                    <p class="py-3 border-b border-cream/10 font-sans text-[17px] md:text-[19px] text-cream/80 hover:text-accent hover:pl-2 transition-all duration-300 cursor-default">{{ $skill }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Inline script for culture page animations --}}
@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Hero line-by-line reveal
    const lineReveal = document.querySelector('.culture-line-reveal');
    if (lineReveal) {
        lineReveal.style.opacity = '0';
        lineReveal.style.transform = 'translateY(30px)';
        lineReveal.style.transition = 'opacity 0.8s ease 0.2s, transform 0.8s ease 0.2s';
        setTimeout(() => {
            lineReveal.style.opacity = '1';
            lineReveal.style.transform = 'translateY(0)';
        }, 100);
    }

    // Giant "Culture" title mask-in-up reveal
    const titleReveal = document.querySelector('.culture-title-reveal');
    if (titleReveal) {
        titleReveal.style.opacity = '0';
        titleReveal.style.transform = 'translateY(60px)';
        titleReveal.style.transition = 'opacity 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.5s, transform 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.5s';
        setTimeout(() => {
            titleReveal.style.opacity = '1';
            titleReveal.style.transform = 'translateY(0)';
        }, 100);
    }


    // Value rows — stagger text and image
    const valueRows = document.querySelectorAll('.value-row');
    const rowObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const textInner = entry.target.querySelector('.value-text-inner');
                const image = entry.target.querySelector('.value-image');

                if (textInner) {
                    textInner.style.opacity = '0';
                    textInner.style.transform = 'translateY(40px)';
                    textInner.style.transition = 'opacity 0.7s ease, transform 0.7s ease';
                    requestAnimationFrame(() => {
                        textInner.style.opacity = '1';
                        textInner.style.transform = 'translateY(0)';
                    });
                }

                if (image) {
                    image.style.opacity = '0';
                    image.style.transition = 'opacity 0.8s ease 0.2s';
                    requestAnimationFrame(() => {
                        image.style.opacity = '1';
                    });
                }

                rowObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });

    valueRows.forEach(row => rowObserver.observe(row));

    // Cursor gradient tracking
    const heroSection = document.getElementById('culture-hero');
    const cursorGradient = document.getElementById('cursor-gradient');
    
    if (heroSection && cursorGradient) {
        heroSection.addEventListener('mousemove', (e) => {
            const rect = heroSection.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            cursorGradient.style.background = `radial-gradient(circle 800px at ${x}px ${y}px, var(--color-accent) 0%, transparent 60%)`;
        });
    }
});
</script>
@endsection

@endsection
