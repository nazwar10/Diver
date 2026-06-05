<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- SEO Meta --}}
    <title>@yield('title', 'DIVER.ENT — Creative Digital Agency')</title>
    <meta name="description" content="@yield('meta_description', 'DIVER.ENT is a creative digital agency specialising in web design, branding, and digital marketing for brands who refuse to blend in.')">
    <meta name="keywords" content="@yield('meta_keywords', 'web design, branding, digital marketing, creative agency, London')">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('og_title', 'DIVER.ENT — Creative Digital Agency')">
    <meta property="og:description" content="@yield('og_description', 'We design digital experiences for brands who refuse to blend in.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/diver-logo.jpg'))">

    {{-- Favicon --}}
    <link rel="icon" type="image/jpeg" href="{{ asset('images/diver-logo.jpg') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@900,700,500,400,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400&display=swap" rel="stylesheet">

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('meta')

    {{-- Custom Styles --}}
    <style>
        :root {
            --color-cream: #F8FAFC;
            --color-cream-2: #EEF2F6;
            --color-charcoal: #0A192F;
            --color-charcoal-2: #112240;
            --color-mid: #8892B0;
            --color-light: #CCD6F6;
            --color-accent: #14C8F0;
            --color-accent-lime: #A5F56D;
            --color-accent-pink: #FF007F;
            --color-dark-bg: #020C1B;
        }

        * { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }

        body {
            font-family: 'Satoshi', sans-serif;
            background-color: var(--color-cream);
            color: var(--color-charcoal);
        }

        .font-serif { font-family: 'Satoshi', sans-serif; font-weight: 700; letter-spacing: -0.02em; }
        .font-sans { font-family: 'Satoshi', sans-serif; }
        .font-mono { font-family: 'IBM Plex Mono', monospace; }

        .text-cream { color: var(--color-cream); }
        .text-cream-2 { color: var(--color-cream-2); }
        .text-charcoal { color: var(--color-charcoal); }
        .text-charcoal-2 { color: var(--color-charcoal-2); }
        .text-mid { color: var(--color-mid); }
        .text-light { color: var(--color-light); }
        .text-accent { color: var(--color-accent); }

        .bg-cream { background-color: var(--color-cream); }
        .bg-cream-2 { background-color: var(--color-cream-2); }
        .bg-charcoal { background-color: var(--color-charcoal); }
        .bg-charcoal-2 { background-color: var(--color-charcoal-2); }
        .bg-accent { background-color: var(--color-accent); }
        .bg-dark-bg { background-color: var(--color-dark-bg); }

        .border-light { border-color: var(--color-light); }

        /* Selection */
        ::selection { background-color: var(--color-accent); color: white; }

        /* Smooth scroll for anchors */
        html { scroll-behavior: smooth; }

        /* Hide scrollbar but keep functionality */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        /* Fix text clipping on split-word descenders (like g, p, y) */
        .split-word {
            display: inline-block;
            padding-bottom: 0.2em;
            margin-bottom: -0.2em;
        }

        /* Animated underline */
        .animated-underline {
            position: relative;
            display: inline-block;
        }
        .animated-underline::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background-color: currentColor;
            transition: width 0.3s ease;
        }
        .animated-underline:hover::after {
            width: 100%;
        }

        /* Page transitions */
        .page-enter { opacity: 0; transform: translateY(20px); }
        .page-enter-active { opacity: 1; transform: translateY(0); transition: all 0.6s ease; }

        /* Placeholder image styling */
        .placeholder-img {
            background: linear-gradient(135deg, var(--color-cream-2) 0%, var(--color-light) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Counter animation */
        [data-counter] { font-variant-numeric: tabular-nums; }

        /* Scroll reveal base */
        [data-animate], [data-reveal] { opacity: 0; transform: translateY(30px); transition: opacity 0.8s ease, transform 0.8s ease; }
        [data-animate].revealed, [data-reveal].revealed { opacity: 1; transform: translateY(0); }
        [data-reveal-stagger] > * { opacity: 0; transform: translateY(20px); transition: opacity 0.6s ease, transform 0.6s ease; }
        [data-reveal-stagger].revealed > * { opacity: 1; transform: translateY(0); }
        [data-reveal-stagger].revealed > *:nth-child(1) { transition-delay: 0s; }
        [data-reveal-stagger].revealed > *:nth-child(2) { transition-delay: 0.1s; }
        [data-reveal-stagger].revealed > *:nth-child(3) { transition-delay: 0.2s; }
        [data-reveal-stagger].revealed > *:nth-child(4) { transition-delay: 0.3s; }
        [data-reveal-stagger].revealed > *:nth-child(5) { transition-delay: 0.4s; }
        [data-reveal-stagger].revealed > *:nth-child(n+6) { transition-delay: 0.5s; }
    </style>
</head>
<body x-data="{ mobileMenuOpen: false, announcementVisible: localStorage.getItem('announcement_dismissed') !== 'true' }" class="min-h-screen">

    {{-- Announcement Bar --}}
    @include('components.announcement-bar')

    {{-- Navigation --}}
    @include('components.navbar')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Alpine.js CDN --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Scroll Reveal Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Scroll reveal observer
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

            document.querySelectorAll('[data-animate], [data-reveal], [data-reveal-stagger]').forEach(el => observer.observe(el));

            // Hero text word-by-word reveal
            document.querySelectorAll('[data-animate="hero-text"] .split-word').forEach((word, i) => {
                word.style.opacity = '0';
                word.style.transform = 'translateY(40px)';
                word.style.display = 'inline-block';
                word.style.transition = `opacity 0.6s ease ${i * 0.08}s, transform 0.6s ease ${i * 0.08}s`;
                setTimeout(() => {
                    word.style.opacity = '1';
                    word.style.transform = 'translateY(0)';
                }, 300);
            });

            // Counter animation on scroll
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        const target = parseFloat(el.dataset.target || el.dataset.counter || 0);
                        let current = 0;
                        const duration = 2000;
                        const start = performance.now();
                        const animate = (now) => {
                            const elapsed = now - start;
                            const progress = Math.min(elapsed / duration, 1);
                            const eased = 1 - Math.pow(1 - progress, 3);
                            current = target * eased;
                            el.textContent = current.toFixed(target % 1 === 0 ? 0 : (target.toString().split('.')[1]?.length || 1));
                            if (progress < 1) requestAnimationFrame(animate);
                        };
                        requestAnimationFrame(animate);
                        counterObserver.unobserve(el);
                    }
                });
            }, { threshold: 0.5 });

            document.querySelectorAll('[data-counter]').forEach(el => counterObserver.observe(el));
        });
    </script>

    @yield('scripts')
</body>
</html>
