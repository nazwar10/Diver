@extends('admin.layouts.app')

@section('title', 'Login Admin')

@section('content')
<div class="mx-auto max-w-md pt-10">
    <div class="rounded-[2rem] border border-light bg-white p-8 shadow-sm">
        <p class="font-mono text-label text-accent">Akses Admin</p>
        <h2 class="mt-3 font-serif text-4xl">Login</h2>
        <p class="mt-3 text-sm text-mid">Masuk dengan akun admin untuk mengelola detail project dari database.</p>

        <form method="POST" action="{{ route('admin.login.store') }}" class="mt-8 space-y-6">
            @csrf

            <div>
                <label for="email" class="mb-2 block font-mono text-label text-charcoal">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent"
                >
            </div>

            <div>
                <label for="password" class="mb-2 block font-mono text-label text-charcoal">Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    class="w-full rounded-2xl border border-light bg-cream px-4 py-3 outline-none transition focus:border-accent"
                >
            </div>

            <label class="flex items-center gap-3 text-sm text-mid">
                <input type="checkbox" name="remember" value="1" class="h-4 w-4 accent-accent">
                <span>Ingat saya</span>
            </label>

            <button type="submit" class="w-full rounded-full bg-charcoal px-5 py-3 font-semibold text-white transition hover:bg-accent">
                Masuk
            </button>
        </form>
    </div>
</div>
@endsection
