@extends('layouts.app')
@section('title', $project->title . ' — DIVER.ENT')
@section('content')
<section class="pt-32 pb-16 bg-cream">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <a href="{{ route('work') }}" class="inline-flex items-center gap-2 font-mono text-label uppercase tracking-wider text-mid hover:text-accent transition-colors mb-8" data-reveal>
            <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            Back to work
        </a>
        <div class="flex flex-wrap gap-3 mb-6" data-reveal>
            <span class="font-mono text-label uppercase tracking-wider text-accent">{{ $project->service }}</span>
            <span class="text-light">·</span>
            <span class="font-mono text-label uppercase tracking-wider text-mid">{{ $project->sector }}</span>
            <span class="text-light">·</span>
            <span class="font-mono text-label uppercase tracking-wider text-mid">{{ $project->year }}</span>
        </div>
        <h1 class="font-serif text-hero text-charcoal mb-6" data-reveal>{{ $project->title }}</h1>
        <p class="text-body-lg text-mid max-w-2xl" data-reveal>{{ $project->tagline }}</p>
    </div>
</section>

<section class="pb-16 bg-cream">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <!-- <div class="aspect-[16/9] bg-cream-2 rounded-xl overflow-hidden mb-16" data-reveal>
            <div class="w-full h-full bg-gradient-to-br from-cream-2 to-light/30 flex items-center justify-center">
                <span class="font-serif text-6xl text-light/40">{{ $project->title }}</span>
            </div>
        </div> -->

                <div class="aspect-[16/9] rounded-xl overflow-hidden mb-16" data-reveal>

                    @if($project->hero_image_path)

                        <img
                            src="{{ $project->hero_image_path }}"
                            alt="{{ $project->title }}"
                            class="w-full h-full object-cover"
                        >

                    @else

                        <div class="w-full h-full bg-gradient-to-br from-cream-2 to-light/30 flex items-center justify-center">
                            <span class="font-serif text-6xl text-light/40">
                                {{ $project->title }}
                            </span>
                        </div>

                    @endif

                </div>

        @if($project->description)
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-20">
            <div class="md:col-span-4" data-reveal>
                <h2 class="font-serif text-h3 text-charcoal mb-4">Overview</h2>
            </div>
            <div class="md:col-span-8" data-reveal>
                <p class="text-mid text-lg leading-relaxed">{{ $project->description }}</p>
            </div>
        </div>
        @endif

        @if(isset($project->challenge))
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-20">
            <div class="md:col-span-4" data-reveal>
                <h2 class="font-serif text-h3 text-charcoal mb-4">The Challenge</h2>
            </div>
            <div class="md:col-span-8" data-reveal>
                <p class="text-mid text-lg leading-relaxed">{{ $project->challenge }}</p>
            </div>
        </div>
        @endif


                @if(!empty($project->gallery_images))

                <section class="pb-20 bg-cream">

                    <div class="max-w-content mx-auto px-6 md:px-8">

                        <h2 class="font-serif text-h3 text-charcoal mb-8" data-reveal>
                            Gallery
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            @foreach($project->gallery_images as $image)

                                <div class="overflow-hidden rounded-xl" data-reveal>
                                    <img
                                        src="{{ $image }}"
                                        alt="{{ $project->title }}"
                                        class="w-full h-full object-cover"
                                    >
                                </div>

                            @endforeach

                        </div>

                    </div>

                </section>

                @endif



        @if(isset($project->solution))
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-20">
            <div class="md:col-span-4" data-reveal>
                <h2 class="font-serif text-h3 text-charcoal mb-4">Our Approach</h2>
            </div>
            <div class="md:col-span-8" data-reveal>
                <p class="text-mid text-lg leading-relaxed">{{ $project->solution }}</p>
            </div>
        </div>
        @endif
    </div>
</section>

{{-- Results --}}
@if(isset($project->results) && count($project->results) > 0)
<section class="py-20 bg-dark-bg text-white">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <h2 class="font-serif text-h3 text-white mb-12" data-reveal>The Results</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($project->results as $result)
            <div class="border-t border-white/20 pt-6" data-reveal>
                <span class="font-serif text-4xl md:text-5xl text-white font-bold">{{ $result->metric }}</span>
                <p class="text-white/60 mt-2">{{ $result->label }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="py-24 bg-charcoal text-center">
    <div class="max-w-content mx-auto px-6 md:px-8" data-reveal>
        <h2 class="font-serif text-h2 text-white mb-8">Like what you see?</h2>
        <a href="{{ route('start-project') }}" class="inline-flex items-center gap-3 px-10 py-5 bg-accent text-white font-sans font-semibold rounded-full hover:bg-white hover:text-charcoal transition-all duration-300 text-lg">Start your project</a>
    </div>
</section>
@endsection
