@extends('layouts.app')
@section('title', 'Start Your Project — DIVER.ENT')
@section('content')
<section class="pt-32 pb-24 bg-cream min-h-screen"
    x-data="{
        step: 1,
        totalSteps: 5,
        submitted: false,
        submitting: false,
        errors: {},
        form: {
            company_name: '', website_url: '', contact_name: '', email: '',
            phone: '', project_type: [], budget_range: '', timeline: '',
            project_brief: '', how_found: ''
        },

        validateStep() {
            this.errors = {};
            switch (this.step) {
                case 1:
                    if (!this.form.company_name.trim()) this.errors.company_name = 'Mohon masukkan nama perusahaan.';
                    break;
                case 2:
                    if (this.form.project_type.length === 0) this.errors.project_type = 'Pilih minimal satu layanan.';
                    break;
                case 3:
                    if (!this.form.budget_range) this.errors.budget_range = 'Mohon pilih range budget.';
                    break;
                case 4:
                    if (!this.form.project_brief.trim()) this.errors.project_brief = 'Mohon ceritakan tentang project Anda.';
                    else if (this.form.project_brief.trim().length < 20) this.errors.project_brief = 'Mohon berikan detail lebih (minimal 20 karakter).';
                    break;
                case 5:
                    if (!this.form.contact_name.trim()) this.errors.contact_name = 'Mohon masukkan nama Anda.';
                    if (!this.form.email.trim()) this.errors.email = 'Mohon masukkan email Anda.';
                    else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.form.email)) this.errors.email = 'Masukkan alamat email yang valid.';
                    break;
            }
            return Object.keys(this.errors).length === 0;
        },

        nextStep() {
            if (this.validateStep() && this.step < this.totalSteps) {
                this.step++;
            }
        },

        prevStep() {
            this.errors = {};
            if (this.step > 1) this.step--;
        },

        async submitForm() {
            if (!this.validateStep()) return;
            this.submitting = true;
            try {
                const formData = new FormData(this.$refs.projectForm);
                const response = await fetch(this.$refs.projectForm.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: formData
                });
                if (response.ok) {
                    this.submitted = true;
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                } else if (response.status === 422) {
                    const data = await response.json();
                    if (data.errors) {
                        this.errors = {};
                        Object.keys(data.errors).forEach(key => {
                            this.errors[key] = data.errors[key][0];
                        });
                    }
                }
            } catch (e) {
                this.submitted = true;
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } finally {
                this.submitting = false;
            }
        },

        get progress() {
            if (this.submitted) return 100;
            return (this.step / this.totalSteps) * 100;
        }
    }">
    <div class="max-w-3xl mx-auto px-6 md:px-8">
        <h1 class="font-serif text-h2 text-charcoal mb-4" data-reveal>Start your <span class="italic">project</span></h1>
        <p class="text-mid text-lg mb-12" data-reveal>Tell us about your project and we'll get back to you within 24 hours.</p>

        {{-- ============================================ --}}
        {{-- SUCCESS / THANK YOU SECTION                  --}}
        {{-- ============================================ --}}
        <div x-show="submitted" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
            <div class="text-center py-12">
                {{-- Animated Checkmark --}}
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-green-100 mb-8 animate-bounce-once">
                    <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <h2 class="font-serif text-h3 text-charcoal mb-4">Terima kasih! 🎉</h2>
                <p class="text-mid text-lg mb-2">Project brief Anda sudah kami terima.</p>
                <p class="text-mid text-base mb-10">Kami akan menghubungi Anda dalam 24 jam. Atau hubungi kami langsung via WhatsApp untuk respons lebih cepat:</p>

                {{-- WhatsApp Button --}}
                <a href="https://wa.me/6285940474839?text=Halo%20Admin%20Diver%2C%20saya%20baru%20saja%20mengisi%20form%20project%20di%20website.%20Saya%20ingin%20berdiskusi%20lebih%20lanjut%20tentang%20project%20saya."
                   target="_blank"
                   rel="noopener noreferrer"
                   id="whatsapp-cta-button"
                   class="inline-flex items-center gap-3 px-10 py-4 text-white font-semibold rounded-full transition-all duration-300 text-lg shadow-lg hover:shadow-xl hover:scale-105"
                   style="background-color: #25D366;">
                    {{-- WhatsApp Icon --}}
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    Chat via WhatsApp
                </a>

                {{-- Divider --}}
                <div class="flex items-center gap-4 my-10">
                    <div class="flex-1 h-px bg-light"></div>
                    <span class="font-mono text-label uppercase tracking-wider text-mid">atau</span>
                    <div class="flex-1 h-px bg-light"></div>
                </div>

                {{-- Back to Home --}}
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-8 py-3 border-2 border-charcoal text-charcoal rounded-full hover:bg-charcoal hover:text-cream transition-all">
                    <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>

        {{-- ============================================ --}}
        {{-- MULTI-STEP FORM                              --}}
        {{-- ============================================ --}}
        <div x-show="!submitted" x-cloak>
            {{-- Progress Bar --}}
            <div class="w-full bg-light/50 rounded-full h-1 mb-12">
                <div class="bg-accent h-1 rounded-full transition-all duration-500" :style="{ width: progress + '%' }"></div>
            </div>
            <div class="flex justify-between mb-12">
                <span class="font-mono text-label uppercase tracking-wider text-accent">Step <span x-text="step"></span> of <span x-text="totalSteps"></span></span>
            </div>

            <form method="POST" action="{{ route('start-project.store') }}" x-ref="projectForm" @submit.prevent="submitForm()" novalidate>
                @csrf
                <input type="hidden" name="honeypot" value="">

                {{-- Step 1: About You --}}
                <div x-show="step === 1" x-transition>
                    <h2 class="font-serif text-h3 text-charcoal mb-8">About your company</h2>
                    <div class="space-y-6">
                        <div>
                            <label class="font-mono text-label uppercase tracking-wider text-charcoal-2 block mb-2">Company Name *</label>
                            <input type="text" name="company_name" x-model="form.company_name"
                                class="w-full px-0 py-4 bg-transparent border-0 border-b-2 text-charcoal text-lg outline-none transition-colors"
                                :class="errors.company_name ? 'border-red-400 focus:border-red-500' : 'border-light focus:border-accent'"
                                placeholder="Your company name">
                            <p x-show="errors.company_name" x-text="errors.company_name" class="text-red-500 text-sm mt-2" x-transition></p>
                        </div>
                        <div>
                            <label class="font-mono text-label uppercase tracking-wider text-charcoal-2 block mb-2">Website (if any)</label>
                            <input type="url" name="website_url" x-model="form.website_url" class="w-full px-0 py-4 bg-transparent border-0 border-b-2 border-light focus:border-accent text-charcoal text-lg outline-none transition-colors" placeholder="https://yourwebsite.com">
                        </div>
                    </div>
                </div>

                {{-- Step 2: Services --}}
                <div x-show="step === 2" x-transition>
                    <h2 class="font-serif text-h3 text-charcoal mb-8">What do you need? *</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach(['Web Design & Development', 'Branding & Identity', 'Digital Marketing', 'Ecommerce', 'SEO & Content', 'Brand Strategy'] as $type)
                        <label class="flex items-center gap-4 p-5 rounded-lg border-2 cursor-pointer transition-colors"
                            :class="form.project_type.includes('{{ $type }}') ? 'border-accent bg-accent/5' : (errors.project_type ? 'border-red-300 hover:border-red-400' : 'border-light hover:border-accent')">
                            <input type="checkbox" name="project_type[]" value="{{ $type }}" x-model="form.project_type" class="w-5 h-5 accent-accent">
                            <span class="font-sans text-charcoal">{{ $type }}</span>
                        </label>
                        @endforeach
                    </div>
                    <p x-show="errors.project_type" x-text="errors.project_type" class="text-red-500 text-sm mt-4" x-transition></p>
                </div>

                {{-- Step 3: Budget & Timeline --}}
                <div x-show="step === 3" x-transition>
                    <h2 class="font-serif text-h3 text-charcoal mb-8">Budget & timeline</h2>
                    <div class="space-y-6">
                        <div>
                            <label class="font-mono text-label uppercase tracking-wider text-charcoal-2 block mb-4">Budget Range *</label>
                            <div class="grid grid-cols-2 gap-3">
                                @foreach(['£10k — £25k', '£25k — £50k', '£50k — £100k', '£100k+'] as $budget)
                                <label class="flex items-center gap-3 p-4 rounded-lg border-2 cursor-pointer transition-colors"
                                    :class="form.budget_range === '{{ $budget }}' ? 'border-accent bg-accent/5' : (errors.budget_range ? 'border-red-300 hover:border-red-400' : 'border-light hover:border-accent')">
                                    <input type="radio" name="budget_range" value="{{ $budget }}" x-model="form.budget_range" class="accent-accent">
                                    <span class="font-sans text-charcoal">{{ $budget }}</span>
                                </label>
                                @endforeach
                            </div>
                            <p x-show="errors.budget_range" x-text="errors.budget_range" class="text-red-500 text-sm mt-4" x-transition></p>
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
                    <h2 class="font-serif text-h3 text-charcoal mb-8">Tell us about your project *</h2>
                    <textarea name="project_brief" x-model="form.project_brief" rows="8"
                        class="w-full px-0 py-4 bg-transparent border-0 border-b-2 text-charcoal text-lg outline-none transition-colors resize-none"
                        :class="errors.project_brief ? 'border-red-400 focus:border-red-500' : 'border-light focus:border-accent'"
                        placeholder="What are you looking to achieve? What challenges do you face? What does success look like?"></textarea>
                    <div class="flex justify-between mt-2">
                        <p x-show="errors.project_brief" x-text="errors.project_brief" class="text-red-500 text-sm" x-transition></p>
                        <span class="text-mid text-sm ml-auto" :class="form.project_brief.trim().length < 20 ? 'text-red-400' : 'text-green-500'" x-text="form.project_brief.trim().length + '/20 min'"></span>
                    </div>
                </div>

                {{-- Step 5: Contact Details --}}
                <div x-show="step === 5" x-transition>
                    <h2 class="font-serif text-h3 text-charcoal mb-8">Your contact details</h2>
                    <div class="space-y-6">
                        <div>
                            <label class="font-mono text-label uppercase tracking-wider text-charcoal-2 block mb-2">Your Name *</label>
                            <input type="text" name="contact_name" x-model="form.contact_name"
                                class="w-full px-0 py-4 bg-transparent border-0 border-b-2 text-charcoal text-lg outline-none transition-colors"
                                :class="errors.contact_name ? 'border-red-400 focus:border-red-500' : 'border-light focus:border-accent'"
                                placeholder="Your full name">
                            <p x-show="errors.contact_name" x-text="errors.contact_name" class="text-red-500 text-sm mt-2" x-transition></p>
                        </div>
                        <div>
                            <label class="font-mono text-label uppercase tracking-wider text-charcoal-2 block mb-2">Email Address *</label>
                            <input type="email" name="email" x-model="form.email"
                                class="w-full px-0 py-4 bg-transparent border-0 border-b-2 text-charcoal text-lg outline-none transition-colors"
                                :class="errors.email ? 'border-red-400 focus:border-red-500' : 'border-light focus:border-accent'"
                                placeholder="you@company.com">
                            <p x-show="errors.email" x-text="errors.email" class="text-red-500 text-sm mt-2" x-transition></p>
                        </div>
                        <div>
                            <label class="font-mono text-label uppercase tracking-wider text-charcoal-2 block mb-2">Phone (optional)</label>
                            <input type="tel" name="phone" x-model="form.phone" class="w-full px-0 py-4 bg-transparent border-0 border-b-2 border-light focus:border-accent text-charcoal text-lg outline-none transition-colors" placeholder="+62 ...">
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
                    <button type="submit" x-show="step === totalSteps" :disabled="submitting"
                        class="inline-flex items-center gap-3 px-10 py-4 bg-accent text-white font-semibold rounded-full hover:bg-charcoal transition-all duration-300 text-lg ml-auto disabled:opacity-50 disabled:cursor-not-allowed">
                        <span x-show="!submitting">Submit Project</span>
                        <span x-show="submitting">Mengirim...</span>
                        <svg x-show="!submitting" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <svg x-show="submitting" class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                    </button>
                </div>
            </form>
        </div>

    </div>
</section>
@endsection
