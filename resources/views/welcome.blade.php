{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- For a quick demo/dev: CDN. For production, prefer Vite build. --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- If using Vite/Tailwind pipeline, remove the CDN above and use this: --}}
    {{-- @vite('resources/css/app.css') --}}

    <style>
        /* Optional: Tailwind tweak for focus ring in dark backgrounds */
        :root { color-scheme: light; }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-slate-100 text-slate-800 antialiased">
    <div class="container mx-auto max-w-3xl px-4 py-12">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-semibold tracking-tight">Contact Form</h1>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-2xl border border-slate-200 bg-white/80 shadow-xl backdrop-blur-sm">
            <form method="POST" action="{{ route('contact.store') }}" class="p-6 sm:p-10">
                @csrf

                {{-- Name --}}
                <div class="mb-5">
                    <label for="name" class="mb-2 block text-sm font-medium text-slate-700">
                        Full Name
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        required
                        class="block w-full rounded-xl border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder-slate-400 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 @error('name') border-rose-400 focus:border-rose-500 focus:ring-rose-500/30 @enderror"
                        placeholder="Enter Your Full Name Here"
                        autocomplete="name"
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-5">
                    <label for="email" class="mb-2 block text-sm font-medium text-slate-700">
                        Email
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        class="block w-full rounded-xl border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder-slate-400 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 @error('email') border-rose-400 focus:border-rose-500 focus:ring-rose-500/30 @enderror"
                        placeholder="you@example.com"
                        autocomplete="email"
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Subject --}}
                <div class="mb-5">
                    <label for="subject" class="mb-2 block text-sm font-medium text-slate-700">
                        Subject
                    </label>
                    <input
                        id="subject"
                        name="subject"
                        type="text"
                        value="{{ old('subject') }}"
                        required
                        class="block w-full rounded-xl border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder-slate-400 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 @error('subject') border-rose-400 focus:border-rose-500 focus:ring-rose-500/30 @enderror"
                    >
                    @error('subject')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Message --}}
                <div class="mb-6">
                    <label for="message" class="mb-2 block text-sm font-medium text-slate-700">
                        Message
                    </label>
                    <textarea
                        id="message"
                        name="message"
                        rows="6"
                        required
                        class="block w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-400 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 @error('message') border-rose-400 focus:border-rose-500 focus:ring-rose-500/30 @enderror"
                    >{{ old('message') }}</textarea>
                    @error('message')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="mt-6 flex items-center justify-between gap-3">
                    <p class="text-xs text-slate-500">
                        By sending, you agree to our terms and privacy policy.
                    </p>
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-md transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 active:scale-[.98]"
                    >
                        Send Message
                    </button>
                </div>
            </form>
        </div>

        {{-- Footer --}}
        <div class="mt-8 text-center text-xs text-slate-400">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>
</html>
