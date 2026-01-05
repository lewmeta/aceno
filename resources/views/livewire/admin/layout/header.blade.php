<?php

use App\Livewire\Admin\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
};

?>

<header class="sticky top-0 hidden w-full border-b border-zinc-200 bg-white lg:block dark:border-zinc-800 dark:bg-zinc-900">
    <div x-data="{ open: false, user: false, dark: document.documentElement.classList.contains('dark') }" class="mx-auto max-w-screen-xl px-6 md:px-10 lg:px-16">
        <div class="flex h-14 items-center justify-between gap-3">
            <a href="#_" class="inline-flex items-center gap-2"><svg class="h-7 text-black dark:text-white"
                    viewBox="0 0 2895 2895" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1936.72 1316.69V1677.28L1700.54 1540.97V1452.99L1537.73 1359.06L1461.65 1315.07V1042.46L1536.29 1085.55L1773.92 1222.76L1936.72 1316.69Z"
                        stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                        d="M988.017 1041.56V1315.79L913.191 1359.06L753.454 1451.19V1537.55L516.003 1674.75V1314.16L675.746 1221.85L911.752 1085.55L988.017 1041.56Z"
                        stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                        d="M2408.73 1044.08L2096.46 1224.38L1936.72 1316.69L1773.92 1222.75L1536.29 1085.55L1461.65 1042.46L1621.57 950.15L1696.21 907.06L1933.65 769.856L2408.73 1044.08Z"
                        fill="#17181B" stroke="#17181B" stroke-width="18.0294" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                    <path
                        d="M1696.23 632.653L1383.96 812.947L1224.03 905.257L1061.23 811.324L748.96 631.03L1221.15 358.425L1696.23 632.653Z"
                        fill="#17181B" stroke="#17181B" stroke-width="18.0294" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                    <path
                        d="M988.023 1041.56L911.761 1085.55L675.754 1221.85L516.012 1314.16L353.21 1220.05L40.9387 1039.76L512.947 767.333L748.954 903.635L825.218 947.627L988.023 1041.56Z"
                        fill="#17181B" stroke="#17181B" stroke-width="18.0294" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                    <path d="M2408.73 1044.08V1404.67L1936.72 1677.28V1316.69L2096.46 1224.38L2408.73 1044.08Z"
                        stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                        d="M1700.55 1452.99V1813.58L1228.54 2086.18V1725.59L1388.28 1633.28L1624.47 1496.98L1700.55 1452.99Z"
                        stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                        d="M1700.55 1452.99L1624.47 1496.98L1388.28 1633.28L1228.54 1725.59L1065.74 1631.48L828.288 1494.46L753.468 1451.19L913.207 1359.06L988.031 1315.79L1149.39 1222.75L1224.03 1179.66L1225.48 1178.76L1300.12 1221.85L1461.66 1315.07L1537.75 1359.06L1700.55 1452.99Z"
                        fill="#17181B" stroke="#17181B" stroke-width="18.0294" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                    <path
                        d="M1228.54 1725.59V2086.18L753.468 1811.77V1451.19L828.288 1494.46L1065.74 1631.48L1228.54 1725.59Z"
                        stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M516.012 1314.16V1674.75L40.9387 1400.34V1039.76L353.21 1220.05L516.012 1314.16Z"
                        stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                        d="M1696.22 632.651V907.059L1621.58 950.149L1461.66 1042.46V1128.64L1300.12 1221.85L1225.47 1178.76L1224.03 1179.66V905.256L1383.95 812.945L1696.22 632.651Z"
                        stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                        d="M1224.03 905.257V1179.66L1149.39 1222.75L988.03 1129.54V1041.56L825.225 947.626L748.96 903.634V631.029L1061.23 811.323L1224.03 905.257Z"
                        stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg><span class="sr-only">Home</span></a>
            <nav aria-label="Primary" class="hidden items-center gap-4 md:flex">
                <a class="text-sm font-medium text-zinc-600 hover:text-zinc-900 dark:text-zinc-300 dark:hover:text-white"
                    href="#_">
                    Dashboard
                </a>
                <a class="text-sm font-medium text-zinc-600 hover:text-zinc-900 dark:text-zinc-300 dark:hover:text-white"
                    href="#_">
                    Projects
                </a>
                <a class="text-sm font-medium text-zinc-600 hover:text-zinc-900 dark:text-zinc-300 dark:hover:text-white"
                    href="#_">
                    Teams
                </a>
            </nav>
            <div class="hidden items-center gap-2 md:flex">
                <button
                    class="relative flex h-8 select-none items-center justify-center rounded-md bg-zinc-50 px-3.5 text-center text-xs font-medium text-zinc-600 outline outline-zinc-100 transition-colors duration-200 ease-in-out hover:bg-zinc-200 focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-600 dark:bg-zinc-800 dark:text-zinc-100 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-700"
                    @click="dark=!dark; document.documentElement.classList.toggle('dark', dark)">
                    Toggle theme
                </button>
                <div x-data="{ open: false }" class="relative">
                    <button
                        class="shadow-subtle flex size-8 items-center justify-center rounded-md bg-zinc-50 p-0.5 text-center text-xs font-medium text-zinc-600 outline outline-zinc-50 transition-colors duration-500 ease-in-out hover:bg-zinc-200 focus:outline-2 focus:outline-offset-2 focus:outline-zinc-600 dark:bg-zinc-800 dark:text-zinc-100 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus:outline-zinc-700"
                        @click="open=!open" @keydown.escape.window="open=false" :aria-expanded="open">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler-layout-user size-4" slot="icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition @click.outside="open=false"
                        class="absolute right-0 top-full z-30 mt-2 flex w-72 flex-col gap-4 rounded-xl bg-white p-4 shadow-lg outline outline-zinc-900/5 dark:bg-zinc-800 dark:outline-white/10">
                        <a class="group flex w-full items-center gap-2 text-sm" href="#_">
                            <div
                                class="flex size-11 flex-none items-center justify-center rounded-lg bg-zinc-50 duration-300 group-hover:bg-white dark:bg-white/5 dark:group-hover:bg-white/10">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler-arrow-refresh size-5 text-zinc-500 group-hover:text-zinc-500 dark:text-zinc-400 dark:group-hover:text-zinc-400"
                                    slot="left-icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                </svg>
                            </div>
                            <div>
                                <h3
                                    class="flex w-full items-center gap-2 text-base font-medium text-zinc-900 group-hover:text-zinc-500 dark:text-white dark:group-hover:text-zinc-400">
                                    Profile
                                </h3>
                                <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400">
                                    Update your profile
                                </h3>
                            </div>
                        </a>
                        <a class="group flex w-full items-center gap-2 text-sm" href="#_">
                            <div
                                class="flex size-11 flex-none items-center justify-center rounded-lg bg-zinc-50 duration-300 group-hover:bg-white dark:bg-white/5 dark:group-hover:bg-white/10">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler-arrow-refresh size-5 text-zinc-500 group-hover:text-zinc-500 dark:text-zinc-400 dark:group-hover:text-zinc-400"
                                    slot="left-icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                </svg>
                            </div>
                            <div>
                                <h3
                                    class="flex w-full items-center gap-2 text-base font-medium text-zinc-900 group-hover:text-zinc-500 dark:text-white dark:group-hover:text-zinc-400">
                                    Settings
                                </h3>
                                <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400">
                                    Update your settings
                                </h3>
                            </div>
                        </a>
                        <a class="group flex w-full items-center gap-2 text-sm" href="#_" wire:click="logout">
                            <div
                                class="flex size-11 flex-none items-center justify-center rounded-lg bg-zinc-50 duration-300 group-hover:bg-white dark:bg-white/5 dark:group-hover:bg-white/10">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler-arrow-refresh size-5 text-zinc-500 group-hover:text-zinc-500 dark:text-zinc-400 dark:group-hover:text-zinc-400"
                                    slot="left-icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                </svg>
                            </div>
                            <div>
                                <h3
                                    class="flex w-full items-center gap-2 text-base font-medium text-zinc-900 group-hover:text-zinc-500 dark:text-white dark:group-hover:text-zinc-400">
                                    Sign out
                                </h3>
                                <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400">
                                    Sign out from your accoiunt
                                </h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <button
                class="shadow-subtle flex size-8 items-center justify-center rounded-md bg-zinc-50 p-0.5 text-center text-xs font-medium text-zinc-600 outline outline-zinc-50 transition-colors duration-500 ease-in-out hover:bg-zinc-200 focus:outline-2 focus:outline-offset-2 focus:outline-zinc-600 md:hidden dark:bg-zinc-800 dark:text-zinc-100 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus:outline-zinc-700"
                @click="open=!open" :aria-expanded="open" aria-controls="nav-06">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler-layout-grid size-3" x-data="{ open: false }">
                    <!-- Paths for burger icon -->
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                    <!-- Paths for close icon (toggle icon) -->
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div id="nav-06" :class="{ 'grid': open, 'hidden': !open }"
            class="hidden grid-cols-1 gap-2 pb-4 md:hidden">
            <button
                class="relative flex h-8 select-none items-center justify-center rounded-md bg-zinc-50 px-3.5 text-center text-xs font-medium text-zinc-600 outline outline-zinc-100 transition-colors duration-200 ease-in-out hover:bg-zinc-200 focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-600 dark:bg-zinc-800 dark:text-zinc-100 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-700">
                Dashboard
            </button>
            <button
                class="relative flex h-8 select-none items-center justify-center rounded-md bg-zinc-50 px-3.5 text-center text-xs font-medium text-zinc-600 outline outline-zinc-100 transition-colors duration-200 ease-in-out hover:bg-zinc-200 focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-600 dark:bg-zinc-800 dark:text-zinc-100 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-700">
                Projects
            </button>
            <button
                class="relative flex h-8 select-none items-center justify-center rounded-md bg-zinc-50 px-3.5 text-center text-xs font-medium text-zinc-600 outline outline-zinc-100 transition-colors duration-200 ease-in-out hover:bg-zinc-200 focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-600 dark:bg-zinc-800 dark:text-zinc-100 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-700">
                Teams
            </button>
            <button
                class="relative flex h-8 select-none items-center justify-center rounded-md bg-zinc-50 px-3.5 text-center text-xs font-medium text-zinc-600 outline outline-zinc-100 transition-colors duration-200 ease-in-out hover:bg-zinc-200 focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-600 dark:bg-zinc-800 dark:text-zinc-100 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-700"
                @click="dark=!dark; document.documentElement.classList.toggle('dark', dark)">
                Toggle theme
            </button>
            <button
                class="relative flex h-8 select-none items-center justify-center rounded-md bg-zinc-900 px-3.5 text-center text-xs font-medium text-white outline outline-zinc-900 transition-colors duration-200 ease-in-out hover:bg-zinc-950 focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-950 dark:bg-zinc-100 dark:text-zinc-900 dark:outline-zinc-100 dark:hover:bg-zinc-200 dark:focus-visible:outline-zinc-200">
                Sign out
            </button>
        </div>
    </div>
</header>
