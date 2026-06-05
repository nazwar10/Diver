@extends('layouts.app')
@section('title', 'Our Work — DIVER.ENT')
@section('content')
<section class="pt-32 pb-16 bg-cream">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <h1 class="font-serif text-hero text-charcoal" data-animate="hero-text">
            <span class="split-word">Our</span>
            <span class="split-word font-bold italic">Work</span>
        </h1>
        <p class="mt-6 text-body-lg text-mid max-w-xl" data-reveal>A selection of our favourite projects — each one crafted with strategic intent and creative ambition.</p>
    </div>
</section>

<section class="pb-24 bg-cream">
    <div class="max-w-content mx-auto px-6 md:px-8">
        {{-- Filter chips --}}
        <div class="flex flex-wrap gap-3 mb-12" data-reveal x-data="{ active: 'all' }">
            <button @click="active = 'all'" :class="active === 'all' ? 'bg-charcoal text-white' : 'bg-transparent text-charcoal'" class="px-5 py-2 rounded-full border border-charcoal font-mono text-label uppercase tracking-wider transition-all">All</button>
            <button @click="active = 'web'" :class="active === 'web' ? 'bg-charcoal text-white' : 'bg-transparent text-charcoal'" class="px-5 py-2 rounded-full border border-charcoal font-mono text-label uppercase tracking-wider transition-all">Web Design</button>
            <button @click="active = 'branding'" :class="active === 'branding' ? 'bg-charcoal text-white' : 'bg-transparent text-charcoal'" class="px-5 py-2 rounded-full border border-charcoal font-mono text-label uppercase tracking-wider transition-all">Branding</button>
            <button @click="active = 'marketing'" :class="active === 'marketing' ? 'bg-charcoal text-white' : 'bg-transparent text-charcoal'" class="px-5 py-2 rounded-full border border-charcoal font-mono text-label uppercase tracking-wider transition-all">Digital Marketing</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6" data-reveal-stagger>
            @foreach($projects as $project)
            <a href="{{ route('work.show', $project->slug) }}" class="group relative block overflow-hidden rounded-lg bg-charcoal aspect-[4/3]">
                <div class="absolute inset-0 bg-gradient-to-br from-charcoal via-charcoal-2 to-accent/20 transition-transform duration-700 group-hover:scale-105"></div>
                <div class="absolute inset-0 flex flex-col justify-between p-6 md:p-8 z-10">
                    <div class="flex gap-2">
                        <span class="font-mono text-label uppercase tracking-wider text-white/60 bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full">{{ $project->service }}</span>
                        <span class="font-mono text-label uppercase tracking-wider text-white/60 bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full">{{ $project->sector }}</span>
                    </div>
                    <div>
                        <p class="font-mono text-label text-white/50 mb-2">{{ $project->year }}</p>
                        <h3 class="font-serif text-2xl md:text-3xl text-white mb-1">{{ $project->title }}</h3>
                        <p class="text-white/70 text-sm">{{ $project->tagline }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
