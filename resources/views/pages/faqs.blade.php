@extends('layouts.app')
@section('title', 'FAQs — DIVER.ENT')
@section('content')
<section class="pt-32 pb-24 bg-cream" x-data="{ openItem: null }">
    <div class="max-w-3xl mx-auto px-6 md:px-8">
        <h1 class="font-serif text-hero text-charcoal mb-8" data-reveal>Frequently Asked <span class="italic">Questions</span></h1>
        <p class="text-body-lg text-mid mb-16" data-reveal>Everything you need to know about working with us.</p>
        <div class="space-y-0">
            @foreach($faqItems as $index => $faq)
            <div class="border-b border-light" data-reveal>
                <button @click="openItem = openItem === {{ $index }} ? null : {{ $index }}" class="w-full flex items-center justify-between py-6 text-left group">
                    <h3 class="font-sans text-lg font-medium text-charcoal pr-8 group-hover:text-accent transition-colors">{{ $faq->question }}</h3>
                    <div class="relative w-6 h-6 flex-shrink-0">
                        <span class="absolute top-1/2 left-0 w-6 h-0.5 bg-charcoal transform -translate-y-1/2 transition-transform duration-300" :class="openItem === {{ $index }} ? 'rotate-45' : ''"></span>
                        <span class="absolute top-1/2 left-0 w-6 h-0.5 bg-charcoal transform -translate-y-1/2 transition-transform duration-300" :class="openItem === {{ $index }} ? '-rotate-45' : 'rotate-90'"></span>
                    </div>
                </button>
                <div x-show="openItem === {{ $index }}" x-collapse x-cloak>
                    <div class="pb-6 pr-12"><p class="text-mid leading-relaxed">{{ $faq->answer }}</p></div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-16 text-center" data-reveal>
            <p class="text-mid mb-6">Still have questions?</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-accent text-white font-sans font-semibold rounded-full hover:bg-charcoal transition-all duration-300">Get in touch</a>
        </div>
    </div>
</section>
@endsection
