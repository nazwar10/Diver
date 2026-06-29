@extends('layouts.app')
@section('title', 'Contact — DIVER.ENT')
@section('content')
<section class="pt-32 pb-20 bg-cream">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <h1 class="font-serif text-hero text-charcoal mb-8" data-animate="hero-text">
            <span class="split-word">Let's</span>
            <span class="split-word font-bold italic">talk.</span>
        </h1>
    </div>
</section>
<section class="pb-24 bg-cream">
    <div class="max-w-content mx-auto px-6 md:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
            <div data-reveal>
                <h2 class="font-serif text-h3 text-charcoal mb-8">Get in touch</h2>
                <div class="space-y-8">
                    <div>
                        <span class="font-mono text-label uppercase tracking-wider text-accent block mb-2">Linkedin</span>
                        <button onclick="navigator.clipboard.writeText('Diver Ent Infinit'); this.innerText='Copied!'; setTimeout(()=>this.innerText='Diver Ent Infinit', 2000)" class="font-sans text-2xl text-charcoal hover:text-accent transition-colors cursor-pointer">Diver Ent Infinit</button>
                    </div>
                    <div>
                        <span class="font-mono text-label uppercase tracking-wider text-accent block mb-2">Phone</span>
                        <a href="tel:+442079460958" class="font-sans text-2xl text-charcoal hover:text-accent transition-colors">+62 (0) 859-4047-4939</a>
                    </div>
                    <div>
                        <span class="font-mono text-label uppercase tracking-wider text-accent block mb-2">Address</span>
                        <p class="font-sans text-lg text-charcoal">Setia Budi<br>Medan, Sumatera Utara</p>
                    </div>
                    <div class="flex gap-4 pt-4">
                        <a href="https://www.linkedin.com/company/diver-ent-infinit/" target="_blank" rel="noopener noreferrer" class="w-12 h-12 rounded-full border border-light flex items-center justify-center text-charcoal hover:bg-charcoal hover:text-cream hover:border-charcoal transition-all" aria-label="LinkedIn">
                            <span class="text-xs font-mono">LI</span>
                        </a>
                        <a href="https://www.instagram.com/diver.ent/" target="_blank" rel="noopener noreferrer" class="w-12 h-12 rounded-full border border-light flex items-center justify-center text-charcoal hover:bg-charcoal hover:text-cream hover:border-charcoal transition-all" aria-label="Instagram">
                            <span class="text-xs font-mono">IG</span>
                        </a>
                       
                       
                    </div>
                </div>
            </div>
            <div data-reveal>
                <div class="bg-cream-2 rounded-xl p-8 md:p-12">
                    <h3 class="font-serif text-2xl text-charcoal mb-2">Ready to start?</h3>
                    <p class="text-mid mb-8">Tell us about your project and we'll arrange a discovery call.</p>
                    <a href="{{ route('start-project') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-accent text-white font-sans font-semibold rounded-full hover:bg-charcoal transition-all duration-300 w-full justify-center text-lg">
                        Start your project
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection