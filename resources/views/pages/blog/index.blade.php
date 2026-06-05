@extends('layouts.app')
@section('title', 'Blog — DIVER.ENT')
@section('content')
<section class="pt-32 pb-16 bg-cream">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <h1 class="font-serif text-hero text-charcoal" data-animate="hero-text">
            <span class="split-word">Our</span>
            <span class="split-word font-bold italic">Blog</span>
        </h1>
        <p class="mt-6 text-body-lg text-mid max-w-xl" data-reveal>Insights, ideas, and inspiration from our team — on design, strategy, and building brands that last.</p>
    </div>
</section>
<section class="pb-24 bg-cream">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-reveal-stagger>
            @foreach($posts as $post)
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
    </div>
</section>
@endsection
