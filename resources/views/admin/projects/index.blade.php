@extends('admin.layouts.app')

@section('title', 'Admin Projects')

@section('content')
<div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
    <div>
        <p class="font-mono text-label text-accent">Projects</p>
        <h2 class="font-serif text-4xl">Kelola Project</h2>
        <p class="mt-2 text-sm text-mid">Semua data halaman `work` sekarang bersumber dari tabel project dan project_results.</p>
    </div>

    <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center justify-center rounded-full bg-charcoal px-6 py-3 font-semibold text-white transition hover:bg-accent">
        Tambah Project
    </a>
</div>

<div class="mt-8 overflow-hidden rounded-[2rem] border border-light bg-white shadow-sm">
    <table class="min-w-full divide-y divide-light">
        <thead class="bg-cream-2/70">
            <tr>
                <th class="px-6 py-4 text-left font-mono text-label text-mid">Title</th>
                <th class="px-6 py-4 text-left font-mono text-label text-mid">Slug</th>
                <th class="px-6 py-4 text-left font-mono text-label text-mid">Service</th>
                <th class="px-6 py-4 text-left font-mono text-label text-mid">Sector</th>
                <th class="px-6 py-4 text-left font-mono text-label text-mid">Status</th>
                <th class="px-6 py-4 text-right font-mono text-label text-mid">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-light">
            @forelse ($projects as $project)
                <tr>
                    <td class="px-6 py-4">
                        <p class="font-semibold text-charcoal">{{ $project->title }}</p>
                        <p class="text-sm text-mid">{{ $project->year }}{{ $project->client_name ? ' · ' . $project->client_name : '' }}</p>
                    </td>
                    <td class="px-6 py-4 text-sm text-mid">{{ $project->slug }}</td>
                    <td class="px-6 py-4 text-sm text-mid">{{ $project->service ?: '-' }}</td>
                    <td class="px-6 py-4 text-sm text-mid">{{ $project->sector ?: '-' }}</td>
                    <td class="px-6 py-4 text-sm">
                        <span class="rounded-full px-3 py-1 {{ $project->published_at ? 'bg-green-50 text-green-700' : 'bg-yellow-50 text-yellow-700' }}">
                            {{ $project->published_at ? 'Published' : 'Draft' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="font-medium text-accent hover:text-charcoal transition-colors">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-sm text-mid">
                        Belum ada project. Tambahkan project pertama dari tombol di atas.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
