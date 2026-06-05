@extends('layouts.app')
@section('title', 'Start Your Project — DIVER.ENT')
@section('content')
<section class="pt-32 pb-24 bg-cream min-h-screen"
    x-data="{
        step: 1,
        totalSteps: 5,
        form: { company_name: '', website_url: '', contact_name: '', email: '', phone: '', project_type: [], budget_range: '', timeline: '', project_brief: '', how_found: '' },
        nextStep() { if (this.step < this.totalSteps) this.step++ },
        prevStep() { if (this.step > 1) this.step-- },
        get progress() { return (this.step / this.totalSteps) * 100 }
    }">
    <div class="max-w-3xl mx-auto px-6 md:px-8">
        <h1 class="font-serif text-h2 text-charcoal mb-4" data-reveal>Start your <span class="italic">project</span></h1>
        <p class="text-mid text-lg mb-12" data-reveal>Tell us about your project and we'll get back to you within 24 hours.</p>

        {{-- Progress Bar --}}
        <div class="w-full bg-light/50 rounded-full h-1 mb-12">
            <div class="bg-accent h-1 rounded-full transition-all duration-500" :style="{ width: progress + '%' }"></div>
        </div>
        <div class="flex justify-between mb-12">
            <span class="font-mono text-label uppercase tracking-wider text-accent">Step <span x-text="step"></span> of <span x-text="totalSteps"></span></span>
        </div>

        <form method="POST" action="{{ route('start-project.store') }}">
            @csrf
            <input type="hidden" name="honeypot" value="">

            {{-- Step 1: About You --}}
            <div x-show="step === 1" x-transition>
                <h2 class="font-serif text-h3 text-charcoal mb-8">About your company</h2>
                <div class="space-y-6">
                    <div>
                        <label class="font-mono text-label uppercase tracking-wider text-charcoal-2 block mb-2">Company Name *</label>
                        <input type="text" name="company_name" x-model="form.company_name" required class="w-full px-0 py-4 bg-transparent border-0 border-b-2 border-light focus:border-accent text-charcoal text-lg outline-none transition-colors" placeholder="Your company name">
                    </div>
                    <div>
                        <label class="font-mono text-label uppercase tracking-wider text-charcoal-2 block mb-2">Website (if any)</label>
                        <input type="url" name="website_url" x-model="form.website_url" class="w-full px-0 py-4 bg-transparent border-0 border-b-2 border-light focus:border-accent text-charcoal text-lg outline-none transition-colors" placeholder="https://yourwebsite.com">
                    </div>
                </div>
            </div>

            {{-- Step 2: Services --}}
            <div x-show="step === 2" x-transition>
                <h2 class="font-serif text-h3 text-charcoal mb-8">What do you need?</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach(['Web Design & Development', 'Branding & Identity', 'Digital Marketing', 'Ecommerce', 'SEO & Content', 'Brand Strategy'] as $type)
                    <label class="flex items-center gap-4 p-5 rounded-lg border-2 border-light hover:border-accent cursor-pointer transition-colors" :class="form.project_type.includes('{{ $type }}') ? 'border-accent bg-accent/5' : ''">
                        <input type="checkbox" name="project_type[]" value="{{ $type }}" x-model="form.project_type" class="w-5 h-5 accent-accent">
                        <span class="font-sans text-charcoal">{{ $type }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Step 3: Budget & Timeline --}}
            <div x-show="step === 3" x-transition>
                <h2 class="font-serif text-h3 text-charcoal mb-8">Budget & timeline</h2>
                <div class="space-y-6">
                    <div>
                        <label class="font-mono text-label uppercase tracking-wider text-charcoal-2 block mb-4">Budget Range *</label>
                        <div class="grid grid-cols-2 gap-3">
                            @foreach(['£10k — £25k', '£25k — £50k', '£50k — £100k', '£100k+'] as $budget)
                            <label class="flex items-center gap-3 p-4 rounded-lg border-2 border-light hover:border-accent cursor-pointer transition-colors" :class="form.budget_range === '{{ $budget }}' ? 'border-accent bg-accent/5' : ''">
                                <input type="radio" name="budget_range" value="{{ $budget }}" x-model="form.budget_range" class="accent-accent">
                                <span class="font-sans text-charcoal">{{ $budget }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <label class="font-mono text-label uppercase tracking-wider text-charcoal-2 block mb-2">Timeline</label>
                        <select name="timeline" x-model="form.timeline" class="w-full px-0 py-4 bg-transparent border-0 border-b-2 border-light focus:border-accent text-charcoal text-lg outline-none transition-colors">
                            <option value="">Select timeline...</option>
                            <option>ASAP</option>
                            <option>1-3 months</option>
                            <option>3-6 months</option>
                            <option>6+ months</option>
                            <option>No rush</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Step 4: Project Brief --}}
            <div x-show="step === 4" x-transition>
                <h2 class="font-serif text-h3 text-charcoal mb-8">Tell us about your project</h2>
                <textarea name="project_brief" x-model="form.project_brief" rows="8" required class="w-full px-0 py-4 bg-transparent border-0 border-b-2 border-light focus:border-accent text-charcoal text-lg outline-none transition-colors resize-none" placeholder="What are you looking to achieve? What challenges do you face? What does success look like?"></textarea>
            </div>

            {{-- Step 5: Contact Details --}}
            <div x-show="step === 5" x-transition>
                <h2 class="font-serif text-h3 text-charcoal mb-8">Your contact details</h2>
                <div class="space-y-6">
                    <div>
                        <label class="font-mono text-label uppercase tracking-wider text-charcoal-2 block mb-2">Your Name *</label>
                        <input type="text" name="contact_name" x-model="form.contact_name" required class="w-full px-0 py-4 bg-transparent border-0 border-b-2 border-light focus:border-accent text-charcoal text-lg outline-none transition-colors" placeholder="Your full name">
                    </div>
                    <div>
                        <label class="font-mono text-label uppercase tracking-wider text-charcoal-2 block mb-2">Email Address *</label>
                        <input type="email" name="email" x-model="form.email" required class="w-full px-0 py-4 bg-transparent border-0 border-b-2 border-light focus:border-accent text-charcoal text-lg outline-none transition-colors" placeholder="you@company.com">
                    </div>
                    <div>
                        <label class="font-mono text-label uppercase tracking-wider text-charcoal-2 block mb-2">Phone (optional)</label>
                        <input type="tel" name="phone" x-model="form.phone" class="w-full px-0 py-4 bg-transparent border-0 border-b-2 border-light focus:border-accent text-charcoal text-lg outline-none transition-colors" placeholder="+44 ...">
                    </div>
                    <div>
                        <label class="font-mono text-label uppercase tracking-wider text-charcoal-2 block mb-2">How did you hear about us?</label>
                        <select name="how_found" x-model="form.how_found" class="w-full px-0 py-4 bg-transparent border-0 border-b-2 border-light focus:border-accent text-charcoal text-lg outline-none transition-colors">
                            <option value="">Select...</option>
                            <option>Google</option>
                            <option>Referral</option>
                            <option>Social Media</option>
                            <option>Award Site</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Navigation Buttons --}}
            <div class="flex justify-between mt-12 pt-8 border-t border-light">
                <button type="button" x-show="step > 1" @click="prevStep()" class="inline-flex items-center gap-2 px-6 py-3 border-2 border-charcoal text-charcoal rounded-full hover:bg-charcoal hover:text-cream transition-all">
                    <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    Previous
                </button>
                <div x-show="step > 1" class="flex-1"></div>
                <button type="button" x-show="step < totalSteps" @click="nextStep()" class="inline-flex items-center gap-2 px-8 py-3 bg-charcoal text-cream rounded-full hover:bg-accent transition-all ml-auto">
                    Next
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </button>
                <button type="submit" x-show="step === totalSteps" class="inline-flex items-center gap-3 px-10 py-4 bg-accent text-white font-semibold rounded-full hover:bg-charcoal transition-all duration-300 text-lg ml-auto">
                    Submit Project
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
