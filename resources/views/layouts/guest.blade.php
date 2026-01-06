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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="flex min-h-screen flex-col items-center bg-gray-100 sm:justify-center sm:pt-0 dark:bg-zinc-900">
        {{-- <div>
                <a href="/" wire:navigate>
                    <x-application-logo class="h-20 w-20 fill-current text-gray-500" />
                </a>
            </div> --}}

        <div
            class="min-h-screen w-full overflow-hidden flex items-center justify-center bg-white shadow-md dark:bg-zinc-800">
            {{ $slot }}
        </div>
    </div>

    @livewireScripts
</body>

</html>
