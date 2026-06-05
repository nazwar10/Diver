{{-- Footer --}}
<footer class="bg-charcoal text-cream pt-24 pb-8" style="background-color: var(--color-charcoal); color: var(--color-cream);">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        {{-- Top Section --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 pb-16 border-b border-white/10">

            {{-- Left: CTA --}}
            <div class="lg:col-span-5">
                {{-- Logo --}}
                <div class="inline-block bg-white px-5 py-3 rounded-xl mb-8">
                    <img src="{{ asset('images/diver-logo.jpg') }}" alt="DIVER.ENT Logo" class="h-8 md:h-10 w-auto mix-blend-multiply" />
                </div>

                <h2 class="font-serif text-4xl md:text-5xl font-bold leading-tight mb-6">
                    Let's make your brand<br>
                    a damn site <span class="italic" style="color: var(--color-accent);">better.</span>
                </h2>
                <p class="text-cream/60 font-sans text-base leading-relaxed mb-8 max-w-md">
                    Ready to start a project? Have a question? Or just want to say hello? We'd love to hear from you.
                </p>

                {{-- Email Copy Button --}}
                <div x-data="{ copied: false }" class="flex items-center gap-3 mb-6">
                    <button @click="navigator.clipboard.writeText('hello@diver-ent.com'); copied = true; setTimeout(() => copied = false, 2000)"
                            class="group flex items-center gap-3 font-mono text-sm text-cream/80 hover:text-accent transition-colors">
                        <span class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center group-hover:border-accent/50 transition-colors">
                            <svg x-show="!copied" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/>
                            </svg>
                            <svg x-show="copied" class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </span>
                        <span x-text="copied ? 'Copied!' : 'hello@diver-ent.com'">hello@diver-ent.com</span>
                    </button>
                </div>

                {{-- Social Icons --}}
                <div class="flex items-center gap-4">
                    <a href="https://instagram.com/diverent" target="_blank" rel="noopener" class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:border-accent hover:text-accent transition-all" aria-label="Instagram">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    <a href="https://linkedin.com/company/diverent" target="_blank" rel="noopener" class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:border-accent hover:text-accent transition-all" aria-label="LinkedIn">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    <a href="https://twitter.com/diverent" target="_blank" rel="noopener" class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:border-accent hover:text-accent transition-all" aria-label="Twitter/X">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="https://dribbble.com/diverent" target="_blank" rel="noopener" class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:border-accent hover:text-accent transition-all" aria-label="Dribbble">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 24C5.385 24 0 18.615 0 12S5.385 0 12 0s12 5.385 12 12-5.385 12-12 12zm10.12-10.358c-.35-.11-3.17-.953-6.384-.438 1.34 3.684 1.887 6.684 1.992 7.308a10.174 10.174 0 004.395-6.87zm-6.115 7.808c-.153-.9-.75-4.032-2.19-7.77l-.066.02c-5.79 2.015-7.86 6.025-8.04 6.4a10.143 10.143 0 006.29 2.166c1.42 0 2.77-.29 4.006-.816zm-11.62-2.58c.232-.4 3.045-5.055 8.332-6.765.135-.045.27-.084.405-.12-.26-.585-.54-1.167-.832-1.74C7.17 11.775 2.206 11.71 1.756 11.7l-.004.312c0 2.633.998 5.037 2.634 6.855zm-2.42-8.955c.46.008 4.683.026 9.477-1.248-1.698-3.018-3.53-5.558-3.8-5.928-2.868 1.35-5.01 3.99-5.676 7.17zm7.275-7.872c.282.394 2.145 2.906 3.822 6 3.645-1.365 5.19-3.44 5.373-3.702A10.15 10.15 0 0012.002 1.8c-.376 0-.745.03-1.11.075zm10.08 4.737c-.214.292-1.89 2.49-5.682 4.032.24.49.47.985.68 1.486.075.18.15.36.22.53 3.41-.43 6.8.26 7.14.33-.02-2.42-.88-4.64-2.36-6.38z"/></svg>
                    </a>
                </div>
            </div>

            {{-- Right: Links Grid --}}
            <div class="lg:col-span-7 grid grid-cols-2 md:grid-cols-3 gap-8">

                {{-- Services --}}
                <div>
                    <h3 class="font-mono text-xs uppercase tracking-widest text-cream/40 mb-5">Services</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('services.show', 'web-design') }}" class="font-sans text-sm text-cream/70 hover:text-accent transition-colors">Web Design</a></li>
                        <li><a href="{{ route('services.show', 'branding') }}" class="font-sans text-sm text-cream/70 hover:text-accent transition-colors">Branding</a></li>
                        <li><a href="{{ route('services.show', 'digital-marketing') }}" class="font-sans text-sm text-cream/70 hover:text-accent transition-colors">Digital Marketing</a></li>
                        <li><a href="{{ route('sitecare') }}" class="font-sans text-sm text-cream/70 hover:text-accent transition-colors">SiteCare</a></li>
                    </ul>
                </div>

                {{-- Company --}}
                <div>
                    <h3 class="font-mono text-xs uppercase tracking-widest text-cream/40 mb-5">Company</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('agency') }}" class="font-sans text-sm text-cream/70 hover:text-accent transition-colors">Agency</a></li>
                        <li><a href="{{ route('work') }}" class="font-sans text-sm text-cream/70 hover:text-accent transition-colors">Work</a></li>
                        <li><a href="{{ route('culture') }}" class="font-sans text-sm text-cream/70 hover:text-accent transition-colors">Culture</a></li>
                        <li><a href="{{ route('blog') }}" class="font-sans text-sm text-cream/70 hover:text-accent transition-colors">Journal</a></li>
                        <li><a href="{{ route('contact') }}" class="font-sans text-sm text-cream/70 hover:text-accent transition-colors">Contact</a></li>
                    </ul>
                </div>

                {{-- Sectors --}}
                <div>
                    <h3 class="font-mono text-xs uppercase tracking-widest text-cream/40 mb-5">Sectors</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('sectors.show', 'hospitality') }}" class="font-sans text-sm text-cream/70 hover:text-accent transition-colors">Hospitality</a></li>
                        <li><a href="{{ route('sectors.show', 'energy') }}" class="font-sans text-sm text-cream/70 hover:text-accent transition-colors">Energy</a></li>
                        <li><a href="{{ route('sectors.show', 'finance') }}" class="font-sans text-sm text-cream/70 hover:text-accent transition-colors">Finance</a></li>
                        <li><a href="{{ route('sectors.show', 'healthcare') }}" class="font-sans text-sm text-cream/70 hover:text-accent transition-colors">Healthcare</a></li>
                        <li><a href="{{ route('sectors.show', 'food-drink') }}" class="font-sans text-sm text-cream/70 hover:text-accent transition-colors">Food & Drink</a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Award Badges Row --}}
        <div class="py-12 border-b border-white/10">
            <div class="flex flex-wrap items-center justify-center gap-8 md:gap-12">
                @foreach(['Awwwards' => 'Site of the Day', 'Clutch' => 'Top UK Agency', 'CSSDA' => 'Best UI Design', 'DAN' => 'Best Website', 'FWA' => 'Site of the Day'] as $award => $title)
                <div class="flex items-center gap-3 text-cream/30">
                    <div class="w-10 h-10 rounded-full border border-cream/20 flex items-center justify-center">
                        <span class="font-mono text-[10px] uppercase">{{ substr($award, 0, 3) }}</span>
                    </div>
                    <div>
                        <span class="font-sans text-xs font-medium text-cream/50 block">{{ $award }}</span>
                        <span class="font-mono text-[10px] text-cream/30">{{ $title }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-6">
                <span class="font-sans text-xs text-cream/30">&copy; {{ date('Y') }} DIVER.ENT. All rights reserved.</span>
            </div>
            <div class="flex items-center gap-6">
                <a href="#" class="font-sans text-xs text-cream/30 hover:text-cream/60 transition-colors">Privacy Policy</a>
                <a href="#" class="font-sans text-xs text-cream/30 hover:text-cream/60 transition-colors">Terms of Service</a>
                <a href="#" class="font-sans text-xs text-cream/30 hover:text-cream/60 transition-colors">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>
