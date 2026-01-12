<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="/favicon.webp?crop=center&amp;height=32&amp;v=1732673457&amp;width=32" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Prevent FOUC (Flash of unstalyed content) - runs before any rendering -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @livewireStyles
    @fluxAppearance

</head>

<body class="font-sans antialiased" x-cloak x-data="{ darkMode: $persist(false) }" :class="{ 'dark': darkMode === true }">
    <div class="min-h-screen bg-gray-100 dark:bg-zinc-900">
        {{-- <livewire:layout.navigation /> --}}

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow dark:bg-zinc-800">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
    @fluxScripts
    {{-- <!--This tells Livewire "Don't inject your own Alpine; I've already bundled it in my JS file --> --}}
</body>

</html>
