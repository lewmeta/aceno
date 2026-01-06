<?php

use App\Livewire\Admin\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/admin/login', navigate: true);
};

?>

<header
    class="sticky top-0 hidden w-full border-b border-zinc-200 bg-white dark:border-zinc-800 dark:bg-zinc-900 lg:block">
    <div x-data="{ open: false, user: false, dark: document.documentElement.classList.contains('dark') }" class="mx-auto max-w-7xl px-6 md:px-10 lg:px-8">
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
            {{-- <nav aria-label="Primary" class="hidden items-center gap-4 md:flex">
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
            </nav> --}}
            <div class="hidden items-center gap-2 md:flex">
                <button
                    class="relative flex h-8 select-none items-center justify-center rounded-md bg-zinc-50 px-3.5 text-center text-xs font-medium text-zinc-600 outline outline-zinc-100 transition-colors duration-200 ease-in-out hover:bg-zinc-200 focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-600 dark:bg-zinc-800 dark:text-zinc-100 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-700"
                    @click="dark=!dark; document.documentElement.classList.toggle('dark', dark)">
                    Toggle theme
                </button>

                {{-- <div x-data="{ open: false }" class="relative">
                    <button
                        class="shadow-subtle size-8 flex items-center justify-center rounded-md bg-zinc-50 p-0.5 text-center text-xs font-medium text-zinc-600 outline outline-zinc-50 transition-colors duration-500 ease-in-out hover:bg-zinc-200 focus:outline-2 focus:outline-offset-2 focus:outline-zinc-600 dark:bg-zinc-800 dark:text-zinc-100 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus:outline-zinc-700"
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
                                class="size-11 flex flex-none items-center justify-center rounded-lg bg-zinc-50 duration-300 group-hover:bg-white dark:bg-white/5 dark:group-hover:bg-white/10">
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
                                class="size-11 flex flex-none items-center justify-center rounded-lg bg-zinc-50 duration-300 group-hover:bg-white dark:bg-white/5 dark:group-hover:bg-white/10">
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
                                class="size-11 flex flex-none items-center justify-center rounded-lg bg-zinc-50 duration-300 group-hover:bg-white dark:bg-white/5 dark:group-hover:bg-white/10">
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
                </div> --}}

                <!-- Profile menu option -->
                <div x-data="{
                    dropdownOpen: false
                }" class="relative">
                    <button x-on:click="dropdownOpen=true"
                        class="inline-flex h-11 items-center justify-center rounded-md py-2 pl-3 pr-12 text-sm font-medium text-zinc-600 outline outline-zinc-50 transition-colors duration-500 ease-in-out hover:bg-zinc-200 focus:outline-2 focus:outline-offset-2 focus:outline-zinc-600 disabled:pointer-events-none disabled:opacity-50 dark:bg-zinc-800 dark:text-zinc-100 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus:outline-zinc-700">
                        <img src="https://cdn.devdojo.com/images/may2023/adam.jpeg"
                            class="h-8 w-8 rounded-full border border-neutral-200 object-cover" />
                        <span class="ml-2 flex h-full shrink-0 translate-y-px flex-col items-start leading-none">
                            <span>Adam Wathan</span>
                            <span class="text-xs font-light text-neutral-400">@adamwathan</span>
                        </span>
                        <svg class="absolute right-0 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                        </svg>
                    </button>

                    <div x-show="dropdownOpen" x-on:click.away="dropdownOpen=false"
                        x-transition:enter="ease-out duration-200" x-transition:enter-start="-translate-y-2"
                        x-transition:enter-end="translate-y-0"
                        class="absolute left-1/2 top-0 z-50 mt-12 w-56 -translate-x-1/2" x-cloak>
                        <div
                            class="mt-1 rounded-md border border-neutral-200/70 bg-white p-1 text-neutral-700 shadow-md">
                            <div class="px-2 py-1.5 text-sm font-semibold">My Account</div>
                            <div class="-mx-1 my-1 h-px bg-neutral-200"></div>
                            <a href="#_"
                                class="data-disabled:pointer-events-none data-disabled:opacity-50 relative flex cursor-default select-none items-center rounded px-2 py-1.5 text-sm outline-none transition-colors hover:bg-neutral-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span>Profile</span>
                                <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘P</span>
                            </a>
                            <a href="#_"
                                class="data-disabled:pointer-events-none data-disabled:opacity-50 relative flex cursor-default select-none items-center rounded px-2 py-1.5 text-sm outline-none transition-colors hover:bg-neutral-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
                                    <rect width="20" height="14" x="2" y="5" rx="2"></rect>
                                    <line x1="2" x2="22" y1="10" y2="10"></line>
                                </svg>
                                <span>Billing</span><span class="ml-auto text-xs tracking-widest opacity-60">⌘B</span>
                            </a>
                            <a href="#_"
                                class="data-disabled:pointer-events-none data-disabled:opacity-50 relative flex cursor-default select-none items-center rounded px-2 py-1.5 text-sm outline-none transition-colors hover:bg-neutral-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
                                    <path
                                        d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z">
                                    </path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                <span>Settings</span>
                                <span class="ml-auto text-xs tracking-widest opacity-60">⌘S</span>
                            </a>
                            <div class="-mx-1 my-1 h-px bg-neutral-200"></div>
                            <div
                                class="data-disabled:pointer-events-none data-disabled:opacity-50 relative flex cursor-default select-none items-center rounded px-2 py-1.5 text-sm outline-none transition-colors hover:bg-neutral-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span>Team</span>
                            </div>
                            <div class="group relative">
                                <div
                                    class="data-disabled:pointer-events-none data-disabled:opacity-50 relative flex cursor-default select-none items-center rounded px-2 py-1.5 text-sm outline-none transition-colors hover:bg-neutral-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <line x1="19" x2="19" y1="8" y2="14"></line>
                                        <line x1="22" x2="16" y1="11" y2="11"></line>
                                    </svg>
                                    <span>Invite users</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="ml-auto h-4 w-4">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                                <div data-submenu
                                    class="righ-auto -left-82.5 invisible absolute top-0 mr-1 translate-x-full opacity-0 duration-200 ease-out group-hover:visible group-hover:mr-0 group-hover:opacity-100">
                                    <div
                                        class="animate-in slide-in-from-left-1 min-w-32 z-50 w-40 overflow-hidden rounded-md border bg-white p-1 shadow-md">
                                        <div x-on:click="dropdownOpen=false"
                                            class="data-disabled:pointer-events-none data-disabled:opacity-50 relative flex cursor-default select-none items-center rounded px-2 py-1.5 text-sm outline-none hover:bg-neutral-100">
                                            <svg class="mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <rect width="20" height="16" x="2" y="4" rx="2">
                                                </rect>
                                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                            </svg>
                                            <span>Email</span>
                                        </div>
                                        <div x-on:click="dropdownOpen=false"
                                            class="data-disabled:pointer-events-none data-disabled:opacity-50 relative flex cursor-default select-none items-center rounded px-2 py-1.5 text-sm outline-none hover:bg-neutral-100">
                                            <svg class="mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z">
                                                </path>
                                            </svg>
                                            <span>Message</span>
                                        </div>
                                        <div class="-mx-1 my-1 h-px bg-neutral-200"></div>
                                        <div x-on:click="dropdownOpen=false"
                                            class="data-disabled:pointer-events-none data-disabled:opacity-50 relative flex cursor-default select-none items-center rounded px-2 py-1.5 text-sm outline-none hover:bg-neutral-100">
                                            <svg class="mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="12" x2="12" y1="8" y2="16">
                                                </line>
                                                <line x1="8" x2="16" y1="12" y2="12">
                                                </line>
                                            </svg>
                                            <span>More...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="data-disabled:pointer-events-none data-disabled:opacity-50 relative flex cursor-default select-none items-center rounded px-2 py-1.5 text-sm outline-none transition-colors hover:bg-neutral-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
                                    <line x1="12" x2="12" y1="5" y2="19"></line>
                                    <line x1="5" x2="19" y1="12" y2="12"></line>
                                </svg>
                                <span>New Team</span>
                                <span class="ml-auto text-xs tracking-widest opacity-60">⌘+T</span>
                            </div>
                            <div class="-mx-1 my-1 h-px bg-neutral-200"></div>
                            <a href="#_"
                                class="focus:bg-accent focus:text-accent-foreground data-disabled:pointer-events-none data-disabled:opacity-50 relative flex cursor-default select-none items-center rounded px-2 py-1.5 text-sm outline-none transition-colors hover:bg-neutral-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
                                    <path
                                        d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4">
                                    </path>
                                    <path d="M9 18c-4.51 2-5-2-7-2"></path>
                                </svg>
                                <span>GitHub</span>
                            </a>
                            <a href="#_"
                                class="focus:bg-accent focus:text-accent-foreground data-disabled:pointer-events-none data-disabled:opacity-50 relative flex cursor-default select-none items-center rounded px-2 py-1.5 text-sm outline-none transition-colors hover:bg-neutral-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <circle cx="12" cy="12" r="4"></circle>
                                    <line x1="4.93" x2="9.17" y1="4.93" y2="9.17"></line>
                                    <line x1="14.83" x2="19.07" y1="14.83" y2="19.07"></line>
                                    <line x1="14.83" x2="19.07" y1="9.17" y2="4.93"></line>
                                    <line x1="14.83" x2="18.36" y1="9.17" y2="5.64"></line>
                                    <line x1="4.93" x2="9.17" y1="19.07" y2="14.83"></line>
                                </svg>
                                <span>Support</span>
                            </a>
                            <div class="-mx-1 my-1 h-px bg-neutral-200"></div>
                            <div wire:click="logout"
                                class="focus:bg-accent focus:text-accent-foreground data-disabled:opacity-50 relative flex cursor-default select-none items-center rounded px-2 py-1.5 text-sm outline-none transition-colors hover:bg-neutral-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" x2="9" y1="12" y2="12"></line>
                                </svg>
                                <span>Log out</span>
                                <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘Q</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <button
                class="shadow-subtle size-8 flex items-center justify-center rounded-md bg-zinc-50 p-0.5 text-center text-xs font-medium text-zinc-600 outline outline-zinc-50 transition-colors duration-500 ease-in-out hover:bg-zinc-200 focus:outline-2 focus:outline-offset-2 focus:outline-zinc-600 dark:bg-zinc-800 dark:text-zinc-100 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus:outline-zinc-700 md:hidden"
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
        {{-- <div id="nav-06" :class="{ 'grid': open, 'hidden': !open }"
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
        </div> --}}
    </div>
</header>
