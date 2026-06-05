@extends('layouts.app')
@section('title', $post->title . ' — DIVER.ENT Blog')
@section('content')
<article class="pt-32 pb-24 bg-cream">
    <div class="max-w-3xl mx-auto px-6 md:px-8">
        <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 font-mono text-label uppercase tracking-wider text-mid hover:text-accent transition-colors mb-8" data-reveal>
            <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            Back to blog
        </a>
        <span class="font-mono text-label uppercase tracking-wider text-accent block mb-4" data-reveal>{{ $post->category }}</span>
        <h1 class="font-serif text-4xl md:text-5xl text-charcoal leading-tight mb-6" data-reveal>{{ $post->title }}</h1>
        <div class="flex items-center gap-4 text-mid text-sm mb-12" data-reveal>
            <span>By {{ $post->author->name ?? 'DIVER.ENT' }}</span>
            <span>·</span>
            <span>{{ $post->published_at?->format('M d, Y') ?? 'Recently' }}</span>
            <span>·</span>
            <span>5 min read</span>
        </div>
        <div class="aspect-[16/9] bg-cream-2 rounded-xl overflow-hidden mb-12" data-reveal>
            <div class="w-full h-full bg-gradient-to-br from-cream-2 to-light/30 flex items-center justify-center">
                <span class="font-serif text-4xl text-light/40">Featured Image</span>
            </div>
        </div>
        <div class="prose prose-lg max-w-none" data-reveal>
            <p class="text-lg text-mid leading-relaxed">{{ $post->excerpt }}</p>
            <p class="text-mid leading-relaxed mt-6">In today's fast-moving digital landscape, the brands that win are the ones bold enough to invest in design that works as hard as it looks. This isn't about following trends—it's about building something that lasts.</p>
            <h2 class="font-serif text-2xl text-charcoal mt-10 mb-4">Why Design Matters More Than Ever</h2>
            <p class="text-mid leading-relaxed">Your website is often the first interaction a potential customer has with your brand. In the time it takes to blink, they've already formed an opinion. Great design doesn't just catch the eye—it builds trust, communicates value, and drives action.</p>
            <p class="text-mid leading-relaxed mt-4">At DIVER.ENT, we believe every pixel should earn its place. Every interaction should feel intentional. Every page should serve a purpose. That's what separates good design from great design—and great design from the kind that actually moves the needle.</p>
            <h2 class="font-serif text-2xl text-charcoal mt-10 mb-4">The Bottom Line</h2>
            <p class="text-mid leading-relaxed">Design isn't a cost—it's an investment. And when done right, it's the single most powerful tool in your marketing arsenal. Don't settle for generic. Don't blend in. Stand out.</p>
        </div>
    </div>
</article>
<section class="py-20 bg-charcoal text-center">
    <div class="max-w-content mx-auto px-6 md:px-8" data-reveal>
        <h2 class="font-serif text-h3 text-white mb-6">Want to see how we can help your brand?</h2>
        <a href="{{ route('start-project') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-accent text-white font-sans font-semibold rounded-full hover:bg-white hover:text-charcoal transition-all duration-300">Start your project</a>
    </div>
</section>
@endsection
