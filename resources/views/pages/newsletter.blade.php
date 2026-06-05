@extends('layouts.app')
@section('title', 'Newsletter — DIVER.ENT')
@section('content')
<section class="pt-32 pb-24 bg-cream min-h-screen flex items-center">
    <div class="max-w-2xl mx-auto px-6 md:px-8 text-center">
        <h1 class="font-serif text-h2 text-charcoal mb-4" data-reveal>Stay in the <span class="italic">loop</span></h1>
        <p class="text-mid text-lg mb-12" data-reveal>Get monthly insights on design, branding, and digital strategy. No spam, just substance.</p>
        <form method="POST" action="{{ route('newsletter.store') }}" class="max-w-md mx-auto" data-reveal>
            @csrf
            <div class="space-y-4">
                <input type="email" name="email" required placeholder="your@email.com" class="w-full px-6 py-4 bg-cream-2 border-2 border-light rounded-full text-charcoal text-lg outline-none focus:border-accent transition-colors">
                <input type="text" name="name" placeholder="Your name (optional)" class="w-full px-6 py-4 bg-cream-2 border-2 border-light rounded-full text-charcoal text-lg outline-none focus:border-accent transition-colors">
                <button type="submit" class="w-full px-8 py-4 bg-accent text-white font-sans font-semibold rounded-full hover:bg-charcoal transition-all duration-300 text-lg">Subscribe</button>
            </div>
        </form>
        @if(session('success'))
        <div class="mt-8 p-4 bg-green-50 text-green-700 rounded-lg">{{ session('success') }}</div>
        @endif
    </div>
</section>
@endsection
