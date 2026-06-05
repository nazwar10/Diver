@extends('layouts.app')
@section('title', 'Agency — DIVER.ENT')
@section('content')
<section class="pt-32 pb-20 bg-cream">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <h1 class="font-serif text-hero text-charcoal max-w-4xl mb-8" data-animate="hero-text">
            <span class="split-word">We</span>
            <span class="split-word">believe</span>
            <span class="split-word">in</span>
            <span class="split-word">design</span>
            <span class="split-word">that</span>
            <span class="split-word font-bold italic">means&nbsp;something.</span>
        </h1>
        <p class="text-body-lg text-mid max-w-2xl" data-reveal>DIVER.ENT is a creative digital agency that combines strategic thinking with bold design to build brands and digital experiences that truly stand out.</p>
    </div>
</section>

<section class="py-20 bg-cream-2">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center mb-24">
            <div data-reveal>
                <span class="font-mono text-label uppercase tracking-wider text-accent mb-4 block">Our Story</span>
                <h2 class="font-serif text-h3 text-charcoal mb-6">13 years of pushing creative boundaries</h2>
                <p class="text-mid leading-relaxed mb-4">Founded in 2013, DIVER.ENT has grown from a two-person studio to an award-winning agency with a global client roster. We've stayed true to our founding belief: that great design isn't decoration—it's a business advantage.</p>
                <p class="text-mid leading-relaxed">We work with ambitious brands who understand that standing out requires courage, strategy, and relentless attention to detail.</p>
            </div>
            <div class="aspect-square bg-cream rounded-lg overflow-hidden" data-reveal>
                <div class="w-full h-full bg-gradient-to-br from-accent/10 via-cream to-cream-2 flex items-center justify-center">
                    <span class="font-serif text-8xl text-accent/20">D.E</span>
                </div>
            </div>
        </div>

        {{-- Awards --}}
        <div class="mb-24" data-reveal>
            <h2 class="font-serif text-h3 text-charcoal mb-12">Awards & <span class="italic">Recognition</span></h2>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                @foreach($awards as $award)
                <div class="text-center p-6 bg-cream rounded-lg">
                    <span class="font-serif text-2xl text-charcoal block mb-2">{{ $award->name }}</span>
                    <span class="font-mono text-label text-mid uppercase tracking-wider">{{ $award->year }}</span>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Team --}}
        <div data-reveal>
            <h2 class="font-serif text-h3 text-charcoal mb-12">Meet the <span class="italic">Team</span></h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6" data-reveal-stagger>
                @foreach($teamMembers as $member)
                <div class="group">
                    <div class="aspect-square bg-cream rounded-lg overflow-hidden mb-4">
                        <div class="w-full h-full bg-gradient-to-br from-cream to-light/30 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                            <span class="font-serif text-3xl text-light/50">{{ substr($member->name, 0, 1) }}</span>
                        </div>
                    </div>
                    <h3 class="font-sans font-semibold text-charcoal">{{ $member->name }}</h3>
                    <p class="font-mono text-label text-mid uppercase tracking-wider">{{ $member->role }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
