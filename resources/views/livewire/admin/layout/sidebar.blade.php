<!-- Mobile top bar -->
<div>
    <div class="sticky top-0 z-40 border-b border-zinc-200 bg-white lg:hidden dark:border-zinc-800 dark:bg-zinc-800">
        <div class="flex h-12 items-center justify-between px-4">
            <div class="flex items-center gap-2">
                <svg class="h-6 text-zinc-900 dark:text-white" viewBox="0 0 2895 2895" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
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
                </svg>
                <span class="text-sm font-bold text-zinc-800 dark:text-zinc-100">Aceno</span>
            </div>
            <button
                class="shadow-subtle flex size-7 items-center justify-center rounded-md bg-zinc-50 p-0.5 text-center text-xs font-medium text-zinc-600 outline outline-zinc-50 transition-colors duration-500 ease-in-out hover:bg-zinc-200 focus:outline-2 focus:outline-offset-2 focus:outline-zinc-600 dark:bg-zinc-800 dark:text-zinc-100 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus:outline-zinc-700"
                x-data="true" @click="$dispatch('sidebar-toggle')" aria-label="Open navigation">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler-layout-grid size-4" x-data="{ open: false }">
                    <!-- Paths for burger icon -->
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                    <!-- Paths for close icon (toggle icon) -->
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    <!-- Shell manages sidebar open/close -->
    <div x-data="{
        open: false,
        sections: { collections: true, recent: false, team: false },
        search: '',
        active: 'overview',
        recent: [
            { title: 'Getting Started Guide', type: 'guide', time: '2h ago' },
            { title: 'API Documentation', type: 'doc', time: '1d ago' },
            { title: 'User Onboarding Flow', type: 'article', time: '3d ago' },
        ],
        notifications: 5,
    }" @sidebar-toggle.window="open = true" @keydown.escape.window="open=false"
        class="relative">
        <!-- Overlay for mobile -->
        <div class="fixed inset-0 z-40 bg-black/40 transition-opacity duration-200 lg:hidden dark:bg-white/10"
            x-show="open" x-transition.opacity @click="open=false" aria-hidden="true"></div>
        <!-- Sidebar panel -->
        <aside
            class="fixed inset-y-0 left-0 z-50 flex w-72 -translate-x-full transform flex-col bg-white outline outline-zinc-200 transition-transform duration-200 lg:static lg:w-80 lg:translate-x-0 lg:opacity-100 dark:bg-zinc-900 dark:outline-zinc-800"
            :class="open ? 'translate-x-0' : ''" x-trap.noscroll.inert="open && window.innerWidth < 1024">
            <div class="sticky top-0 z-10 bg-white dark:bg-zinc-900 dark:outline-zinc-800">
                <!-- Header -->
                <div
                    class="flex h-14 shrink-0 items-center justify-between border-b border-zinc-100 px-4 lg:px-5 dark:border-zinc-800">
                    <div class="flex items-center gap-2">
                        <svg class="h-8 text-zinc-900 dark:text-white" viewBox="0 0 2895 2895" fill="white"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1936.72 1316.69V1677.28L1700.54 1540.97V1452.99L1537.73 1359.06L1461.65 1315.07V1042.46L1536.29 1085.55L1773.92 1222.76L1936.72 1316.69Z"
                                stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M988.017 1041.56V1315.79L913.191 1359.06L753.454 1451.19V1537.55L516.003 1674.75V1314.16L675.746 1221.85L911.752 1085.55L988.017 1041.56Z"
                                stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round">
                            </path>
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
                                stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M1700.55 1452.99V1813.58L1228.54 2086.18V1725.59L1388.28 1633.28L1624.47 1496.98L1700.55 1452.99Z"
                                stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M1700.55 1452.99L1624.47 1496.98L1388.28 1633.28L1228.54 1725.59L1065.74 1631.48L828.288 1494.46L753.468 1451.19L913.207 1359.06L988.031 1315.79L1149.39 1222.75L1224.03 1179.66L1225.48 1178.76L1300.12 1221.85L1461.66 1315.07L1537.75 1359.06L1700.55 1452.99Z"
                                fill="#17181B" stroke="#17181B" stroke-width="18.0294" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path
                                d="M1228.54 1725.59V2086.18L753.468 1811.77V1451.19L828.288 1494.46L1065.74 1631.48L1228.54 1725.59Z"
                                stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path d="M516.012 1314.16V1674.75L40.9387 1400.34V1039.76L353.21 1220.05L516.012 1314.16Z"
                                stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M1696.22 632.651V907.059L1621.58 950.149L1461.66 1042.46V1128.64L1300.12 1221.85L1225.47 1178.76L1224.03 1179.66V905.256L1383.95 812.945L1696.22 632.651Z"
                                stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M1224.03 905.257V1179.66L1149.39 1222.75L988.03 1129.54V1041.56L825.225 947.626L748.96 903.634V631.029L1061.23 811.323L1224.03 905.257Z"
                                stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold leading-tight text-zinc-900 dark:text-zinc-100">
                                Aceno
                            </p>
                            <p class="text-[0.70rem] text-zinc-500 dark:text-zinc-400">
                                Knowledge Studio
                            </p>
                        </div>
                    </div>
                    <button
                        class="rounded-md p-2 text-zinc-700 outline outline-zinc-200 lg:hidden dark:text-zinc-200 dark:outline-zinc-700"
                        @click="open=false" aria-label="Close navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler-wave-x">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M18 6l-12 12"></path>
                            <path d="M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <!-- Search -->
                <div class="p-3 lg:p-4">
                    <label class="relative block">
                        <span
                            class="absolute inset-y-0 left-0 flex items-center pl-3 text-zinc-500 dark:text-zinc-400"><svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler-arrow-search size-4">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                <path d="M21 21l-6 -6"></path>
                            </svg></span>
                        <input x-model="search" placeholder="Find anything…"
                            class="block h-9 w-full appearance-none rounded-lg border border-transparent bg-white px-4 py-2 pl-9 pr-3 text-xs text-zinc-700 placeholder-zinc-400 ring-1 ring-zinc-200 duration-300 focus:border-zinc-300 focus:bg-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:text-sm dark:bg-zinc-800 dark:text-zinc-300 dark:placeholder-zinc-500 dark:ring-zinc-700 dark:focus:border-blue-700" />
                        <!-- Shortcut hint intentionally omitted for demo scope -->
                    </label>
                </div>
            </div>
            <!-- Nav (make this the scrolling region; leave room for sticky footer) -->
            <nav class="flex-1 overflow-y-auto px-2 pb-40 lg:px-3">
                <ul class="space-y-1">
                    <li>
                        <button
                            class="flex h-9 w-full items-center gap-2 rounded-md px-3 text-sm outline outline-transparent hover:bg-zinc-50 dark:hover:bg-white/5"
                            :class="active === 'overview' ?
                                'bg-white text-zinc-900 dark:bg-white/10 dark:text-white outline-white/10' :
                                'text-zinc-700 dark:text-zinc-300'"
                            @click="active='overview'">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler-arrow-home size-4">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                            </svg>
                            <span>Overview</span>
                        </button>
                    </li>
                    <li>
                        <button
                            class="flex h-9 w-full items-center gap-2 rounded-md px-3 text-sm outline outline-transparent hover:bg-zinc-50 dark:hover:bg-white/5"
                            :class="active === 'workspace' ?
                                'bg-white text-zinc-900 dark:bg-white/10 dark:text-white outline-white/10' :
                                'text-zinc-700 dark:text-zinc-300'"
                            @click="active='workspace'">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler-heart size-4">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                </path>
                                <path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                </path>
                                <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                </path>
                                <path
                                    d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                </path>
                            </svg>
                            <span>Workspace</span>
                        </button>
                    </li>
                    <!-- Collections collapsible -->
                    <li class="mt-2 border-t border-zinc-100 pt-2 dark:border-zinc-800">
                        <button
                            class="flex h-9 w-full items-center justify-between rounded-md px-3 text-sm text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5"
                            @click="sections.collections = !sections.collections"
                            :aria-expanded="sections.collections">
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler-clipboard size-4">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                                    </path>
                                    <path
                                        d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z">
                                    </path>
                                </svg>
                                <span>Collections</span>
                            </span>
                            <span class="text-zinc-500 dark:text-zinc-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler-chevron-down size-4"
                                    x-show="sections.collections">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 9l6 6l6 -6"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler-chevron-right size-4"
                                    x-show="!sections.collections">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 6l6 6l-6 6"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="sections.collections" x-collapse>
                            <ul class="mt-1 space-y-1 pl-2">
                                <li>
                                    <a href="#_"
                                        class="group flex h-9 items-center justify-between rounded-md px-3 text-sm text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5">
                                        <span class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler-external-file-dots size-4">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                <path
                                                    d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                                </path>
                                                <path d="M9 14v.01"></path>
                                                <path d="M12 14v.01"></path>
                                                <path d="M15 14v.01"></path>
                                            </svg>
                                            Drafts</span>
                                        <span
                                            class="rounded bg-white px-1.5 py-0.5 text-[0.70rem] text-zinc-900 outline outline-zinc-200 dark:bg-white/10 dark:text-white dark:outline-white/10">18</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#_"
                                        class="group flex h-9 items-center justify-between rounded-md px-3 text-sm text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5">
                                        <span class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler-external-file-dots size-4">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                <path
                                                    d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                                </path>
                                                <path d="M9 14v.01"></path>
                                                <path d="M12 14v.01"></path>
                                                <path d="M15 14v.01"></path>
                                            </svg>
                                            Published</span>
                                        <span
                                            class="rounded bg-white px-1.5 py-0.5 text-[0.70rem] text-zinc-900 outline outline-zinc-200 dark:bg-white/10 dark:text-white dark:outline-white/10">64</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#_"
                                        class="group flex h-9 items-center justify-between rounded-md px-3 text-sm text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5">
                                        <span class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler-external-file-dots size-4">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                <path
                                                    d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                                </path>
                                                <path d="M9 14v.01"></path>
                                                <path d="M12 14v.01"></path>
                                                <path d="M15 14v.01"></path>
                                            </svg>
                                            Archived</span>
                                        <span
                                            class="rounded bg-white px-1.5 py-0.5 text-[0.70rem] text-zinc-900 outline outline-zinc-200 dark:bg-white/10 dark:text-white dark:outline-white/10">7</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mt-2 border-t border-zinc-100 pt-2 dark:border-zinc-800">
                        <button
                            class="flex h-9 w-full items-center justify-between rounded-md px-3 text-sm text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5"
                            @click="sections.recent = !sections.recent" :aria-expanded="sections.recent">
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler-external-file-dots size-4">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                    </path>
                                    <path d="M9 14v.01"></path>
                                    <path d="M12 14v.01"></path>
                                    <path d="M15 14v.01"></path>
                                </svg>
                                <span>Recent</span>
                            </span>
                            <span class="text-zinc-500 dark:text-zinc-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler-chevron-down size-4"
                                    x-show="sections.recent">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 9l6 6l6 -6"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler-chevron-right size-4"
                                    x-show="!sections.recent">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 6l6 6l-6 6"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="sections.recent" x-collapse>
                            <ul class="mt-1 space-y-1 pl-2">
                                <template x-for="item in recent" :key="item.title">
                                    <li>
                                        <a href="#_"
                                            class="group flex h-9 items-center justify-between rounded-md px-3 text-sm text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5">
                                            <span class="flex items-center gap-2"><svg
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler-external-file-dots size-4">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                    <path
                                                        d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                                    </path>
                                                    <path d="M9 14v.01"></path>
                                                    <path d="M12 14v.01"></path>
                                                    <path d="M15 14v.01"></path>
                                                </svg>
                                                <span x-text="item.title"></span></span>
                                            <span class="text-[0.70rem] text-zinc-500 dark:text-zinc-400"
                                                x-text="item.time"></span>
                                        </a>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button
                            class="flex h-9 w-full items-center justify-between rounded-md px-3 text-sm text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5"
                            @click="sections.team = !sections.team" :aria-expanded="sections.team">
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler-layout-users-group size-4">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                    <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                                    <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                    <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                                    <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                    <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                                </svg>
                                <span>Team</span>
                                <span x-show="notifications > 0"
                                    class="rounded bg-rose-500 px-1.5 py-0.5 text-[0.70rem] text-white"
                                    x-text="notifications"></span>
                            </span>
                            <span class="text-zinc-500 dark:text-zinc-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler-chevron-down size-4"
                                    x-show="sections.team">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 9l6 6l6 -6"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler-chevron-right size-4"
                                    x-show="!sections.team">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 6l6 6l-6 6"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="sections.team" x-collapse>
                            <ul class="mt-1 space-y-1 pl-2">
                                <li>
                                    <a href="#_"
                                        class="group flex h-9 items-center justify-between rounded-md px-3 text-sm text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5">
                                        <span class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler-layout-users-group size-4">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                                                <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                                                <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                                            </svg>
                                            Members</span>
                                        <span
                                            class="rounded bg-white px-1.5 py-0.5 text-[0.70rem] text-zinc-900 outline outline-zinc-200 dark:bg-white/10 dark:text-white dark:outline-white/10">12</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#_"
                                        class="group flex h-9 items-center justify-between rounded-md px-3 text-sm text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5">
                                        <span class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler-layout-settings size-4">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                                </path>
                                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                            </svg>
                                            Roles</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#_"
                                        class="group flex h-9 items-center justify-between rounded-md px-3 text-sm text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5">
                                        <span class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler-circle-info size-4">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                                <path d="M12 9h.01"></path>
                                                <path d="M11 12h1v4h1"></path>
                                            </svg>
                                            Permissions</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#_"
                            class="flex h-9 items-center gap-2 rounded-md px-3 text-sm text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler-report size-4">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697"></path>
                                <path d="M18 14v4h4"></path>
                                <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2"></path>
                                <path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z">
                                </path>
                                <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                <path d="M8 11h4"></path>
                                <path d="M8 15h3"></path>
                            </svg>
                            <span>Insights</span>
                        </a>
                    </li>
                    <li>
                        <a href="#_"
                            class="flex h-9 items-center gap-2 rounded-md px-3 text-sm text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler-heart size-4">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                </path>
                                <path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                </path>
                                <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                </path>
                                <path
                                    d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                </path>
                            </svg>
                            <span>Integrations</span>
                        </a>
                    </li>
                    <li>
                        <a href="#_"
                            class="flex h-9 items-center gap-2 rounded-md px-3 text-sm text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler-clipboard size-4">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                                </path>
                                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z">
                                </path>
                            </svg>
                            <span>API</span>
                        </a>
                    </li>
                    <li>
                        <a href="#_"
                            class="flex h-9 items-center gap-2 rounded-md px-3 text-sm text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler-arrow-lifebuoy size-4">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                <path d="M15 15l3.35 3.35"></path>
                                <path d="M9 15l-3.35 3.35"></path>
                                <path d="M5.65 5.65l3.35 3.35"></path>
                                <path d="M18.35 5.65l-3.35 3.35"></path>
                            </svg>
                            <span>Help Center</span>
                            <span
                                class="ml-auto rounded bg-white px-1.5 py-0.5 text-[0.70rem] text-zinc-900 outline outline-zinc-200 dark:bg-white/10 dark:text-white dark:outline-white/10">Online</span>
                        </a>
                    </li>
                    <li class="mt-2 border-t border-zinc-100 pt-2 dark:border-zinc-800">
                        <a href="#_"
                            class="flex h-9 items-center gap-2 rounded-md px-3 text-sm text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler-external-link size-4">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                                <path d="M11 13l9 -9"></path>
                                <path d="M15 4h5v5"></path>
                            </svg>
                            <span>Open site</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler-external-link ml-auto size-3 opacity-60">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                                <path d="M11 13l9 -9"></path>
                                <path d="M15 4h5v5"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Sticky footer (status + account); stays pinned and dropdown overlays upward -->
            <div class="sticky bottom-0 z-10 border-t border-zinc-100 bg-white dark:border-zinc-800 dark:bg-zinc-900">
                <div class="space-y-3 p-3 lg:p-4">
                    <div
                        class="rounded-xl bg-white p-3 outline outline-zinc-200 dark:bg-zinc-900 dark:outline-zinc-800">
                        <p class="text-xs font-medium text-zinc-700 dark:text-zinc-200">
                            System Status
                        </p>
                        <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400">
                            All services operational. Last updated 5 min ago.
                        </p>
                        <div class="mt-2 flex items-center justify-between">
                            <button
                                class="h-8 rounded-md bg-white px-3 text-xs text-zinc-900 outline outline-zinc-200 dark:bg-white/10 dark:text-white dark:outline-white/10">
                                View dashboard
                            </button>
                            <div class="flex items-center gap-1">
                                <div class="size-2 rounded-full bg-emerald-500"></div>
                                <span class="text-xs text-zinc-600 dark:text-zinc-300">Online</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Account / footer -->
                <div class="px-3 pb-3 lg:px-4 lg:pb-4">
                    <div x-data="{ open: false }" class="relative">
                        <button
                            class="flex w-full items-center justify-between gap-3 rounded-lg p-2 outline outline-zinc-200 hover:bg-zinc-50 dark:outline-zinc-700 dark:hover:bg-white/5"
                            @click="open=!open">
                            <span class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/40?img=12" alt="Avatar"
                                    class="size-8 rounded-full" />
                                <span class="text-left">
                                    <span class="block text-sm font-medium text-zinc-900 dark:text-zinc-100">Alex
                                        W.</span>
                                    <span
                                        class="block text-xs text-zinc-500 dark:text-zinc-400">alex@orbitkit.dev</span>
                                </span>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler-chevron-down size-4 text-zinc-600 dark:text-zinc-300">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M6 9l6 6l6 -6"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition.opacity @click.outside="open=false"
                            class="absolute bottom-14 left-0 right-0 z-50 overflow-hidden rounded-xl bg-white shadow-xl outline outline-zinc-200 dark:bg-zinc-900 dark:outline-zinc-700">
                            <div class="p-2 text-sm">
                                <a href="{{ route('admin.profile') }}"
                                    class="flex h-9 items-center justify-between rounded-md px-2 text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5">
                                    <span class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler-circle-info size-4">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                            <path d="M12 9h.01"></path>
                                            <path d="M11 12h1v4h1"></path>
                                        </svg>
                                        View profile</span>
                                </a>
                                <a href="#_"
                                    class="flex h-9 items-center justify-between rounded-md px-2 text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5">
                                    <span class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler-layout-settings size-4">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                            </path>
                                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                        </svg>
                                        Account</span>
                                </a>
                                <a href="#_"
                                    class="flex h-9 items-center justify-between rounded-md px-2 text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-white/5">
                                    <span class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler-arrow-lifebuoy size-4">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                            <path d="M15 15l3.35 3.35"></path>
                                            <path d="M9 15l-3.35 3.35"></path>
                                            <path d="M5.65 5.65l3.35 3.35"></path>
                                            <path d="M18.35 5.65l-3.35 3.35"></path>
                                        </svg>
                                        Docs</span>
                                </a>
                            </div>
                            <div class="border-t border-zinc-100 p-2 dark:border-zinc-800">
                                <button
                                    class="relative flex h-7 w-full select-none items-center justify-center rounded-md bg-zinc-50 px-3 text-center text-xs font-medium text-zinc-600 outline outline-zinc-100 transition-colors duration-200 ease-in-out hover:bg-zinc-200 focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-600 dark:bg-zinc-800 dark:text-zinc-100 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-700"
                                    type="button">
                                    Sign out
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
