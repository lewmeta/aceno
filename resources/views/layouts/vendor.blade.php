<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased">
    @if (session('error_message'))
        <div class="my-2 text-red-700">
            {{ session('error_message') }}
        </div>
    @endif
    <div class="min-h-screen w-full bg-gray-100 dark:bg-zinc-900">
        <div class="block w-full lg:flex">

            <!-- Sidebar navigation -->
            @if (auth()->user('web')->isApprovedVendor())
                <livewire:vendor.layout.sidebar />
            @endif

            <!-- Page Content -->
            <main class="w-full overflow-y-auto">
                <!-- Navigation -->
                @if (auth()->user('web')->isApprovedVendor())
                    <livewire:vendor.layout.header />
                @endif
                {{ $slot }}
            </main>

        </div>
        {{-- <livewire:layout.navigation /> --}}

        <!-- Page Heading -->
        {{-- @if (isset($header))
            <header class="bg-white shadow dark:bg-zinc-800">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif --}}

    </div>

    @livewireScripts
</body>

</html>
