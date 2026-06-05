@extends('layouts.app')
@section('title', 'SiteCare — DIVER.ENT')
@section('content')
<section class="pt-32 pb-20 bg-cream">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <h1 class="font-serif text-hero text-charcoal mb-8" data-reveal>Site<span class="italic">Care</span></h1>
        <p class="text-body-lg text-mid max-w-2xl" data-reveal>Your website shouldn't be a set-it-and-forget-it project. Our SiteCare plans keep your digital presence secure, fast, and always improving.</p>
    </div>
</section>
<section class="pb-24 bg-cream-2">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16" data-reveal-stagger>
            @foreach([['Essential', '£500/mo', ['Security monitoring', 'Monthly updates', 'Daily backups', 'Uptime monitoring', 'Email support']], ['Growth', '£1,000/mo', ['Everything in Essential', 'Monthly analytics reports', 'Content updates (2hrs/mo)', 'Performance optimisation', 'Priority support']], ['Enterprise', 'Custom', ['Everything in Growth', 'Dedicated account manager', 'Unlimited content updates', 'A/B testing', '24/7 support']]] as $plan)
            <div class="bg-cream p-8 rounded-xl {{ $loop->index === 1 ? 'ring-2 ring-accent' : '' }}">
                @if($loop->index === 1)<span class="font-mono text-label uppercase tracking-wider text-accent block mb-2">Most Popular</span>@endif
                <h3 class="font-serif text-2xl text-charcoal mb-2">{{ $plan[0] }}</h3>
                <p class="font-serif text-3xl text-charcoal mb-6">{{ $plan[1] }}</p>
                <ul class="space-y-3">
                    @foreach($plan[2] as $feature)
                    <li class="flex items-center gap-3 text-mid"><svg class="w-4 h-4 text-accent flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>{{ $feature }}</li>
                    @endforeach
                </ul>
                <a href="{{ route('contact') }}" class="mt-8 inline-flex items-center justify-center w-full gap-2 px-6 py-3 {{ $loop->index === 1 ? 'bg-accent text-white hover:bg-charcoal' : 'border-2 border-charcoal text-charcoal hover:bg-charcoal hover:text-cream' }} rounded-full font-sans font-medium transition-all">Get started</a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
