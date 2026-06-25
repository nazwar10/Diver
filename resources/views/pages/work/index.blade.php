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
        <div class="space-y-5 mb-12" data-reveal>
            <div>
                <p class="mb-3 font-mono text-label text-mid">Filter by service</p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('work') }}" class="px-5 py-2 rounded-full border border-charcoal font-mono text-label uppercase tracking-wider transition-all {{ !$serviceFilter && !$sectorFilter ? 'bg-charcoal text-white' : 'bg-transparent text-charcoal' }}">
                        All
                    </a>
                    @foreach($serviceFilters as $service)
                        <a href="{{ route('work', ['service' => $service, 'sector' => $sectorFilter]) }}" class="px-5 py-2 rounded-full border border-charcoal font-mono text-label uppercase tracking-wider transition-all {{ $serviceFilter === $service ? 'bg-charcoal text-white' : 'bg-transparent text-charcoal' }}">
                            {{ $service }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div>
                <p class="mb-3 font-mono text-label text-mid">Filter by sector</p>
                <div class="flex flex-wrap gap-3">
                    @foreach($sectorFilters as $sector)
                        <a href="{{ route('work', ['service' => $serviceFilter, 'sector' => $sector]) }}" class="px-5 py-2 rounded-full border border-charcoal font-mono text-label uppercase tracking-wider transition-all {{ $sectorFilter === $sector ? 'bg-charcoal text-white' : 'bg-transparent text-charcoal' }}">
                            {{ $sector }}
                        </a>
                    @endforeach
                    @if($sectorFilter)
                        <a href="{{ route('work', ['service' => $serviceFilter]) }}" class="px-5 py-2 rounded-full border border-charcoal font-mono text-label uppercase tracking-wider transition-all bg-transparent text-charcoal">
                            Clear sector
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6" data-reveal-stagger>
            @forelse($projects as $project)
                


                    <a href="{{ route('work.show', $project->slug) }}"
                        class="group relative block overflow-hidden rounded-lg bg-charcoal aspect-[4/3]">

                            @if($project->thumbnail_path)

                                <img
                                    src="{{ $project->thumbnail_path }}"
                                    alt="{{ $project->title }}"
                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                >

                                <div class="absolute inset-0 bg-black/40"></div>

                            @else

                                <div class="absolute inset-0 bg-gradient-to-br from-charcoal via-charcoal-2 to-accent/20 transition-transform duration-700 group-hover:scale-105"></div>

                            @endif

                            <div class="absolute inset-0 flex flex-col justify-between p-6 md:p-8 z-10">

                                <div class="flex gap-2 flex-wrap">
                                    <span class="font-mono text-label uppercase tracking-wider text-white/80 bg-black/30 backdrop-blur-sm px-3 py-1 rounded-full">
                                        {{ $project->service }}
                                    </span>

                                    <span class="font-mono text-label uppercase tracking-wider text-white/80 bg-black/30 backdrop-blur-sm px-3 py-1 rounded-full">
                                        {{ $project->sector }}
                                    </span>
                                </div>

                                <div>
                                    <p class="font-mono text-label text-white/70 mb-2">
                                        {{ $project->year }}
                                    </p>

                                    <h3 class="font-serif text-2xl md:text-3xl text-white mb-1">
                                        {{ $project->title }}
                                    </h3>

                                    <p class="text-white/90 text-sm">
                                        {{ $project->tagline }}
                                    </p>
                                </div>

                            </div>

                    </a>




            @empty
                <div class="md:col-span-2 rounded-3xl border border-light bg-white p-10 text-center text-mid">
                    Tidak ada project yang cocok dengan filter ini.
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
