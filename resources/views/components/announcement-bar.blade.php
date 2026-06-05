{{-- Announcement Bar --}}
<div x-show="announcementVisible"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 -translate-y-full"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 -translate-y-full"
     class="bg-accent text-white text-center py-2.5 px-4 relative z-50"
     style="background-color: var(--color-accent);">
    <div class="max-w-7xl mx-auto flex items-center justify-center gap-3">
        <p class="text-sm font-sans font-medium tracking-wide">
            <span class="hidden sm:inline">🔥 We've just been named </span>
            <span class="font-semibold">Top UK Creative Agency 2025</span>
            <span class="hidden sm:inline"> by Clutch.</span>
            <a href="{{ route('agency') }}" class="underline ml-2 hover:no-underline">Learn more →</a>
        </p>
        <button @click="announcementVisible = false; localStorage.setItem('announcement_dismissed', 'true')"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-white/80 hover:text-white transition-colors p-1"
                aria-label="Dismiss announcement">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
</div>
