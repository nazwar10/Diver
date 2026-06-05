@extends('layouts.app')
@section('title', $service->title . ' — DIVER.ENT')
@section('content')
<section class="pt-32 pb-20 bg-cream">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <span class="font-mono text-label uppercase tracking-wider text-accent block mb-4" data-reveal>Our Services</span>
        <h1 class="font-serif text-hero text-charcoal mb-8" data-reveal>{{ $service->headline ?? $service->title }}</h1>
        <p class="text-body-lg text-mid max-w-2xl" data-reveal>{{ $service->description }}</p>
    </div>
</section>
<section class="py-20 bg-cream-2">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <h2 class="font-serif text-h3 text-charcoal mb-12" data-reveal>What we <span class="italic">offer</span></h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-20" data-reveal-stagger>
            @foreach($service->sub_services as $sub)
            <div class="bg-cream p-8 rounded-xl group hover:shadow-lg transition-shadow">
                <h3 class="font-serif text-xl text-charcoal mb-3">{{ is_object($sub) ? $sub->name : $sub }}</h3>
                <p class="text-mid text-sm leading-relaxed">{{ is_object($sub) && isset($sub->description) ? $sub->description : 'Expert ' . strtolower(is_object($sub) ? $sub->name : $sub) . ' services tailored to your brand.' }}</p>
            </div>
            @endforeach
        </div>

        @if(isset($service->approach))
        <div class="max-w-3xl mb-20" data-reveal>
            <h2 class="font-serif text-h3 text-charcoal mb-6">Our <span class="italic">Approach</span></h2>
            <p class="text-mid text-lg leading-relaxed">{{ $service->approach }}</p>
        </div>
        @endif

        <div class="text-center" data-reveal>
            <h2 class="font-serif text-h3 text-charcoal mb-6">Ready to get started?</h2>
            <a href="{{ route('start-project') }}" class="inline-flex items-center gap-3 px-10 py-5 bg-accent text-white font-sans font-semibold rounded-full hover:bg-charcoal transition-all duration-300 text-lg">Start your project</a>
        </div>
    </div>
</section>
@endsection
