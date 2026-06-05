{{-- Navbar — Kota-style minimal: Logo + tagline | Hire us + hamburger --}}
<nav x-data="{
        menuOpen: false,
        scrolled: false,
        servicesExpanded: false,
        init() {
            window.addEventListener('scroll', () => {
                this.scrolled = window.scrollY > 60;
            });
        },
        toggle() {
            this.menuOpen = !this.menuOpen;
            document.body.style.overflow = this.menuOpen ? 'hidden' : '';
        },
        close() {
            this.menuOpen = false;
            document.body.style.overflow = '';
        }
     }"
     @keydown.escape.window="close()"
     class="fixed top-0 left-0 right-0 z-50 transition-all duration-500"
     :class="scrolled && !menuOpen ? 'bg-cream/90 backdrop-blur-xl shadow-[0_1px_0_rgba(0,0,0,0.04)]' : 'bg-transparent'">

    <div class="max-w-[1440px] mx-auto px-5 md:px-8 lg:px-10">
        <div class="flex items-center justify-between h-[72px] md:h-[80px]">

            {{-- LEFT: Logo + Tagline --}}
            <div class="flex items-center gap-4 md:gap-6">
                {{-- Diver Logo Image --}}
                <a href="{{ route('home') }}" class="flex-shrink-0 group flex items-center" aria-label="DIVER.ENT Home">
                    <img src="{{ asset('images/diver-logo.jpg') }}" alt="DIVER.ENT Logo" class="h-10 md:h-12 w-auto mix-blend-multiply opacity-90 transition-opacity duration-300 group-hover:opacity-100" />
                </a>

                {{-- Tagline (desktop only) --}}
                <span class="hidden md:inline-block font-mono text-[11px] tracking-[0.08em] uppercase text-charcoal/60" style="letter-spacing: 0.1em;">
                    Creative Agency · Est. 2013
                </span>
            </div>

            {{-- RIGHT: Hire Us button + Hamburger --}}
            <div class="flex items-center gap-3 md:gap-4">

                {{-- "Hire us" pill button (desktop) --}}
                <a href="{{ route('start-project') }}"
                   class="hidden md:inline-flex items-center gap-2 px-5 py-2.5 bg-charcoal text-cream text-[13px] font-medium rounded-full hover:bg-accent transition-all duration-300 group">
                    Hire us
                    <svg class="w-3.5 h-3.5 transform transition-transform duration-300 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>

                {{-- Hamburger circle button --}}
                <button @click="toggle()"
                        class="relative w-[46px] h-[46px] md:w-[50px] md:h-[50px] rounded-full border-2 border-charcoal flex items-center justify-center hover:bg-charcoal group transition-all duration-300"
                        :class="menuOpen ? 'bg-charcoal' : 'bg-transparent'"
                        aria-label="Toggle navigation menu">
                    {{-- Hamburger lines / X morph --}}
                    <div class="w-[18px] md:w-[20px] h-[12px] relative">
                        <span class="absolute left-0 w-full h-[1.5px] bg-charcoal group-hover:bg-cream transition-all duration-300 origin-center"
                              :class="menuOpen ? 'top-1/2 -translate-y-1/2 rotate-45 bg-cream' : 'top-0'"
                              style="transition: top 0.3s, transform 0.3s, background-color 0.3s;"></span>
                        <span class="absolute left-0 w-full h-[1.5px] bg-charcoal group-hover:bg-cream transition-all duration-300 origin-center"
                              :class="menuOpen ? 'top-1/2 -translate-y-1/2 -rotate-45 bg-cream' : 'bottom-0'"
                              style="transition: bottom 0.3s, top 0.3s, transform 0.3s, background-color 0.3s;"></span>
                    </div>
                </button>
            </div>

        </div>
    </div>

    {{-- ═══════════════════════════════════════════════════════ --}}
    {{-- FLOATING DROPDOWN MENU PANEL (kota-style) --}}
    {{-- ═══════════════════════════════════════════════════════ --}}
    <div x-show="menuOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-[-8px] scale-[0.98]"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-[-8px] scale-[0.98]"
         x-cloak
         class="absolute top-[68px] md:top-[76px] right-4 md:right-8 lg:right-10 w-[280px] md:w-[300px]"
         @click.away="close()">

        <div class="bg-white rounded-2xl shadow-[0_16px_64px_rgba(0,0,0,0.12),0_2px_8px_rgba(0,0,0,0.06)] border border-black/[0.04] overflow-hidden">

            {{-- Close button (inside panel top-right) --}}
            <div class="flex justify-end p-4 pb-0">
                <button @click="close()"
                        class="w-10 h-10 rounded-full border border-charcoal/20 flex items-center justify-center hover:bg-charcoal hover:text-cream hover:border-charcoal transition-all duration-200"
                        aria-label="Close menu">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Navigation Links --}}
            <div class="px-6 pb-2 space-y-0">
                <a href="{{ route('work') }}"
                   @click="close()"
                   class="block py-2.5 font-sans text-[22px] md:text-[24px] font-semibold text-charcoal hover:text-accent transition-colors duration-200 {{ request()->routeIs('work*') ? 'text-accent' : '' }}">
                    Work
                </a>
                <a href="{{ route('agency') }}"
                   @click="close()"
                   class="block py-2.5 font-sans text-[22px] md:text-[24px] font-semibold text-charcoal hover:text-accent transition-colors duration-200 {{ request()->routeIs('agency') ? 'text-accent' : '' }}">
                    Agency
                </a>

                {{-- Services with expand --}}
                <div>
                    <button @click="servicesExpanded = !servicesExpanded"
                            class="w-full flex items-center justify-between py-2.5 font-sans text-[22px] md:text-[24px] font-semibold text-charcoal hover:text-accent transition-colors duration-200 {{ request()->routeIs('services*') || request()->routeIs('sitecare') ? 'text-accent' : '' }}">
                        <span>Services</span>
                        <span class="text-[18px] font-light transition-transform duration-200" :class="servicesExpanded ? 'rotate-45' : ''">+</span>
                    </button>
                    <div x-show="servicesExpanded"
                         x-collapse
                         x-cloak
                         class="pl-4 pb-2 space-y-1 border-l-2 border-cream-2 ml-1">
                        <a href="{{ route('services.show', 'web-design') }}"
                           @click="close()"
                           class="block py-1.5 font-sans text-[15px] text-mid hover:text-accent transition-colors">
                            Web Design & Dev
                        </a>
                        <a href="{{ route('services.show', 'branding') }}"
                           @click="close()"
                           class="block py-1.5 font-sans text-[15px] text-mid hover:text-accent transition-colors">
                            Branding & Identity
                        </a>
                        <a href="{{ route('services.show', 'digital-marketing') }}"
                           @click="close()"
                           class="block py-1.5 font-sans text-[15px] text-mid hover:text-accent transition-colors">
                            Digital Marketing
                        </a>
                        <a href="{{ route('sitecare') }}"
                           @click="close()"
                           class="block py-1.5 font-sans text-[15px] text-mid hover:text-accent transition-colors">
                            SiteCare
                        </a>
                    </div>
                </div>

                <a href="{{ route('blog') }}"
                   @click="close()"
                   class="block py-2.5 font-sans text-[22px] md:text-[24px] font-semibold text-charcoal hover:text-accent transition-colors duration-200 {{ request()->routeIs('blog*') ? 'text-accent' : '' }}">
                    Blog
                </a>
                <a href="{{ route('culture') }}"
                   @click="close()"
                   class="block py-2.5 font-sans text-[22px] md:text-[24px] font-semibold text-charcoal hover:text-accent transition-colors duration-200 {{ request()->routeIs('culture') ? 'text-accent' : '' }}">
                    Culture
                </a>
                <a href="{{ route('contact') }}"
                   @click="close()"
                   class="block py-2.5 font-sans text-[22px] md:text-[24px] font-semibold text-charcoal hover:text-accent transition-colors duration-200 {{ request()->routeIs('contact') ? 'text-accent' : '' }}">
                    Contact
                </a>
            </div>

            {{-- Start Your Project CTA --}}
            <div class="px-6 pt-3 pb-6">
                <a href="{{ route('start-project') }}"
                   @click="close()"
                   class="inline-flex items-center gap-3 px-5 py-3 rounded-full border-2 border-charcoal text-charcoal font-sans text-[15px] font-medium hover:bg-charcoal hover:text-cream transition-all duration-300 group">
                    Start your project
                    {{-- Circle arrow icon like kota --}}
                    <span class="w-7 h-7 rounded-full border border-charcoal/30 flex items-center justify-center group-hover:border-cream/50 transition-colors">
                        <svg class="w-3 h-3 transform transition-transform duration-300 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </span>
                </a>
            </div>

        </div>
    </div>

</nav>
