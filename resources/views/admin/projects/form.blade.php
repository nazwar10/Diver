@extends('admin.layouts.app')

@section('title', $mode === 'create' ? 'Tambah Project' : 'Edit Project')

@section('content')
@php
    $serviceSelection = old('service_ids', $selectedServiceIds);
    $sectorSelection = old('sector_ids', $selectedSectorIds);
    $formResults = old('results', collect($results)->map(fn ($result) => [
        'metric' => $result->metric ?? '',
        'label' => $result->label ?? '',
        'period' => $result->period ?? '',
        'direction' => $result->direction ?? 'increase',
    ])->values()->all());

    if ($formResults === []) {
        $formResults = [['metric' => '', 'label' => '', 'period' => '', 'direction' => 'increase']];
    }
@endphp

<div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
    <div>
        <p class="font-mono text-label text-accent">{{ $mode === 'create' ? 'Create' : 'Edit' }}</p>
        <h2 class="font-serif text-4xl">{{ $mode === 'create' ? 'Tambah Project' : $project->title }}</h2>
    </div>

    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center rounded-full border border-charcoal px-5 py-3 text-sm font-medium transition hover:border-accent hover:text-accent">
        Kembali ke daftar
    </a>
</div>

<form
    method="POST"
    action="{{ $mode === 'create' ? route('admin.projects.store') : route('admin.projects.update', $project) }}"
    enctype="multipart/form-data"
    class="space-y-8"
    x-data="{ results: {{ \Illuminate\Support\Js::from($formResults) }} }"
>
    @csrf
    @if ($mode === 'edit')
        @method('PUT')
    @endif

    <div class="grid gap-8 lg:grid-cols-2">
        <section class="rounded-[2rem] border border-light bg-white p-6 shadow-sm">
            <h3 class="font-serif text-2xl">Informasi Utama</h3>

            <div class="mt-6 grid gap-5">
                <div>
                    <label class="mb-2 block font-mono text-label text-charcoal">Title</label>
                    <input name="title" value="{{ old('title', $project->title) }}" required class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent">
                </div>

                <div>
                    <label class="mb-2 block font-mono text-label text-charcoal">Slug</label>
                    <input name="slug" value="{{ old('slug', $project->slug) }}" required class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent">
                </div>

                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label class="mb-2 block font-mono text-label text-charcoal">Year</label>
                        <input name="year" type="number" value="{{ old('year', $project->year) }}" required class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent">
                    </div>
                    <div>
                        <label class="mb-2 block font-mono text-label text-charcoal">Order</label>
                        <input name="order" type="number" value="{{ old('order', $project->order ?? 0) }}" class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent">
                    </div>
                </div>

                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label class="mb-2 block font-mono text-label text-charcoal">Client Name</label>
                        <input name="client_name" value="{{ old('client_name', $project->client_name) }}" class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent">
                    </div>
                    <div>
                        <label class="mb-2 block font-mono text-label text-charcoal">Timeline</label>
                        <input name="timeline" value="{{ old('timeline', $project->timeline) }}" class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent">
                    </div>
                </div>

                <div>
                    <label class="mb-2 block font-mono text-label text-charcoal">Tagline</label>
                    <input name="tagline" value="{{ old('tagline', $project->tagline) }}" class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent">
                </div>

                <div>
                    <label class="mb-2 block font-mono text-label text-charcoal">Description / Overview</label>
                    <textarea name="description" rows="5" class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent">{{ old('description', $project->description) }}</textarea>
                </div>

                <div>
                    <label class="mb-2 block font-mono text-label text-charcoal">Challenge</label>
                    <textarea name="challenge" rows="5" class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent">{{ old('challenge', $project->challenge) }}</textarea>
                </div>

                <div>
                    <label class="mb-2 block font-mono text-label text-charcoal">Solution</label>
                    <textarea name="solution" rows="5" class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent">{{ old('solution', $project->solution) }}</textarea>
                </div>
            </div>
        </section>

        <section class="rounded-[2rem] border border-light bg-white p-6 shadow-sm">
            <h3 class="font-serif text-2xl">Relasi & Publish</h3>

            <div class="mt-6 grid gap-6">
                <div>
                    <label class="mb-3 block font-mono text-label text-charcoal">Services</label>
                    <div class="grid gap-3">
                        @foreach ($services as $service)
                            <label class="flex items-center gap-3 rounded-2xl border border-light px-4 py-3">
                                <input type="checkbox" name="service_ids[]" value="{{ $service->id }}" {{ in_array($service->id, $serviceSelection) ? 'checked' : '' }} class="h-4 w-4 accent-accent">
                                <span>{{ $service->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="mb-3 block font-mono text-label text-charcoal">Sectors</label>
                    <div class="grid gap-3">
                        @foreach ($sectors as $sector)
                            <label class="flex items-center gap-3 rounded-2xl border border-light px-4 py-3">
                                <input type="checkbox" name="sector_ids[]" value="{{ $sector->id }}" {{ in_array($sector->id, $sectorSelection) ? 'checked' : '' }} class="h-4 w-4 accent-accent">
                                <span>{{ $sector->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="mb-2 block font-mono text-label text-charcoal">Published At</label>
                    <input
                        type="datetime-local"
                        name="published_at"
                        value="{{ old('published_at', optional($project->published_at)->format('Y-m-d\TH:i')) }}"
                        class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent"
                    >
                </div>

                <label class="flex items-center gap-3 rounded-2xl border border-light px-4 py-3">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }} class="h-4 w-4 accent-accent">
                    <span>Tampilkan sebagai featured project</span>
                </label>

                <div>
                    <label class="mb-2 block font-mono text-label text-charcoal">
                        Thumbnail Image
                    </label>

                    <input
                        type="file"
                        name="thumbnail"
                        accept="image/*"
                        class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent"
                    >

                    @if($project->thumbnail_path)
                        <img
                            src="{{ $project->thumbnail_path }}"
                            alt="Thumbnail"
                            class="mt-3 h-24 rounded-lg border"
                        >
                    @endif
                </div>

                <div>
                    <label class="mb-2 block font-mono text-label text-charcoal">
                        Hero Image
                    </label>

                    <input
                        type="file"
                        name="hero_image"
                        accept="image/*"
                        class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent"
                    >

                    @if($project->hero_image_path)
                        <img
                            src="{{ $project->hero_image_path }}"
                            alt="Hero"
                            class="mt-3 h-24 rounded-lg border"
                        >
                    @endif
                </div>

                <div>
                    <label class="mb-2 block font-mono text-label text-charcoal">Services Used</label>
                    <textarea name="services_used_text" rows="4" class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent" placeholder="Satu item per baris">{{ old('services_used_text', $servicesUsedText) }}</textarea>
                </div>

                <div>
                    <label class="mb-2 block font-mono text-label text-charcoal">
                        Gallery Images
                    </label>

                    <input
                        type="file"
                        name="gallery_images[]"
                        accept="image/*"
                        multiple
                        class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent"
                    >

                    @if(!empty($project->gallery_images))
                        <div class="mt-3 flex flex-wrap gap-3">
                            @foreach($project->gallery_images as $image)
                                <img
                                    src="{{ $image }}"
                                    alt="Gallery"
                                    class="h-24 rounded-lg border"
                                >
                            @endforeach
                        </div>
                    @endif
                </div>


            </div>
        </section>
    </div>

    <section class="rounded-[2rem] border border-light bg-white p-6 shadow-sm">
        <div class="mb-6 flex items-center justify-between gap-4">
            <div>
                <h3 class="font-serif text-2xl">Project Results</h3>
                <p class="mt-2 text-sm text-mid">Setiap result akan tampil di halaman detail project sebagai metrik utama.</p>
            </div>

            <button
                type="button"
                @click="results.push({ metric: '', label: '', period: '', direction: 'increase' })"
                class="rounded-full border border-charcoal px-4 py-2 text-sm font-medium transition hover:border-accent hover:text-accent"
            >
                Tambah Result
            </button>
        </div>

        <div class="space-y-4">
            <template x-for="(row, index) in results" :key="index">
                <div class="rounded-[1.5rem] border border-light bg-cream p-4">
                    <div class="grid gap-4 lg:grid-cols-12">
                        <div class="lg:col-span-2">
                            <label class="mb-2 block font-mono text-label text-charcoal">Metric</label>
                            <input :name="`results[${index}][metric]`" x-model="row.metric" class="w-full rounded-2xl border border-light bg-white px-4 py-3 outline-none transition focus:border-accent" placeholder="67.6%">
                        </div>

                        <div class="lg:col-span-5">
                            <label class="mb-2 block font-mono text-label text-charcoal">Label</label>
                            <input :name="`results[${index}][label]`" x-model="row.label" class="w-full rounded-2xl border border-light bg-white px-4 py-3 outline-none transition focus:border-accent" placeholder="Increase in direct bookings">
                        </div>

                        <div class="lg:col-span-3">
                            <label class="mb-2 block font-mono text-label text-charcoal">Period</label>
                            <input :name="`results[${index}][period]`" x-model="row.period" class="w-full rounded-2xl border border-light bg-white px-4 py-3 outline-none transition focus:border-accent" placeholder="Q1 2024">
                        </div>

                        <div class="lg:col-span-2">
                            <label class="mb-2 block font-mono text-label text-charcoal">Direction</label>
                            <select :name="`results[${index}][direction]`" x-model="row.direction" class="w-full rounded-2xl border border-light bg-white px-4 py-3 outline-none transition focus:border-accent">
                                <option value="increase">Increase</option>
                                <option value="decrease">Decrease</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4 text-right">
                        <button
                            type="button"
                            @click="results.length > 1 ? results.splice(index, 1) : results[index] = { metric: '', label: '', period: '', direction: 'increase' }"
                            class="text-sm font-medium text-red-600 transition hover:text-red-800"
                        >
                            Hapus baris
                        </button>
                    </div>
                </div>
            </template>
        </div>
    </section>

    <section class="rounded-[2rem] border border-light bg-white p-6 shadow-sm">
        <h3 class="font-serif text-2xl">SEO</h3>

        <div class="mt-6 grid gap-5">
            <div>
                <label class="mb-2 block font-mono text-label text-charcoal">Meta Title</label>
                <input name="meta_title" value="{{ old('meta_title', $project->meta_title) }}" class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent">
            </div>

            <div>
                <label class="mb-2 block font-mono text-label text-charcoal">Meta Description</label>
                <textarea name="meta_description" rows="3" class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent">{{ old('meta_description', $project->meta_description) }}</textarea>
            </div>
        </div>
    </section>

    <div class="flex justify-end">
        <button type="submit" class="rounded-full bg-charcoal px-8 py-3 font-semibold text-white transition hover:bg-accent">
            {{ $mode === 'create' ? 'Simpan Project' : 'Update Project' }}
        </button>
    </div>
</form>
@endsection
