<div>
    <div class="lg:hidden sticky top-0 z-40 bg-white dark:bg-zinc-800 border-b border-zinc-200 dark:border-zinc-800">
        <div class="flex items-center justify-between px-4 h-12">
            <div class="flex items-center gap-2">
                <img src="{{ asset('favicon.webp') }}" alt="Logo" class="size-6 object-contain rounded">
                <span class="text-sm font-semibold text-zinc-800 dark:text-zinc-100">Aceno inc.</span>
            </div>
            <button
                class="flex items-center justify-center text-center shadow-subtle font-medium duration-500 ease-in-out transition-colors focus:outline-2 focus:outline-offset-2 text-zinc-600 bg-zinc-50 outline outline-zinc-50 hover:bg-zinc-200 focus:outline-zinc-600 dark:text-zinc-100 dark:bg-zinc-800 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus:outline-zinc-700 size-7 p-0.5 text-xs rounded-md"
                x-data="true" @click="$dispatch('sb02-toggle')" aria-label="Open navigation">
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
    <!-- Shell -->
    <div x-data="{
        open: false,
        active: 'inbox',
        sections: { queues: true, knowledge: false, tools: false },
        search: '',
        filters: { mine: true, unassigned: false, sla: false },
        tags: { billing: true, bug: false, feature: false }
    }" @sb02-toggle.window="open=true" @keydown.escape.window="open=false" class="relative">
        <!-- Overlay -->
        <div class="fixed inset-0 z-40 bg-black/40 dark:bg-white/10 transition-opacity duration-200 lg:hidden"
            x-show="open" x-transition.opacity @click="open=false" aria-hidden="true"></div>
        <!-- Sidebar panel (distinct from 01: narrower + support use case) -->
        <aside
            class="fixed inset-y-0 left-0 z-50 w-72 lg:w-80 h-dvh lg:h-dvh lg:relative lg:inset-auto lg:left-auto transform transition-transform duration-200 -translate-x-full lg:translate-x-0 bg-white dark:bg-zinc-900 outline outline-zinc-200 dark:outline-zinc-800 flex flex-col overflow-hidden"
            :class="open ? 'translate-x-0' : ''">
            <!-- Header -->
            <div
                class="h-14 shrink-0 flex items-center justify-between px-4 border-b border-zinc-100 dark:border-zinc-800">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('favicon.webp') }}" alt="Logo" class="size-8 object-contain rounded">
                    <div>
                        <p class="text-sm font-semibold text-zinc-900 dark:text-zinc-100 leading-tight">
                           Aceno .inc
                        </p>
                        <p class="text-[0.70rem] text-zinc-500 dark:text-zinc-400">
                            Support Console
                        </p>
                    </div>
                </div>
                <button
                    class="flex items-center justify-center text-center shadow-subtle font-medium duration-500 ease-in-out transition-colors focus:outline-2 focus:outline-offset-2 text-zinc-600 bg-zinc-50 outline outline-zinc-50 hover:bg-zinc-200 focus:outline-zinc-600 dark:text-zinc-100 dark:bg-zinc-800 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus:outline-zinc-700 size-7 p-0.5 text-xs rounded-md lg:hidden"
                    @click="open=false" aria-label="Close navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler-wave-x size-4">
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
                        class="absolute inset-y-0 left-0 pl-3 flex items-center text-zinc-500 dark:text-zinc-400"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler-arrow-search size-4">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg></span>
                    <input x-model="search" placeholder="Search tickets"
                        class="h-9 pl-9 pr-3 block w-full px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />
                </label>
            </div>

            <!-- Navigation (scroll area; min-h-0 ensures inner overflow works in flex) -->
            <nav class="flex-1 min-h-0 px-2 lg:px-3 pb-10 overflow-y-auto">
                <p class="px-3 lg:px-4 text-[0.70rem] font-semibold tracking-wide text-zinc-500 dark:text-zinc-400">
                    Support
                </p>
                <ul class="mt-1 space-y-1">
                    <li>
                        <a href="{{ route('admin.kyc.pending') }}" wire:navigate
                            class="w-full h-9 px-3 rounded-md flex items-center gap-2 text-sm outline-1 outline-transparent hover:bg-zinc-50 dark:hover:bg-white/5 {{ request()->routeIs('admin.kyc.pending') ? 'bg-white text-zinc-900 dark:bg-white/10 dark:text-white outline-white/10' :
                                'text-zinc-700 dark:text-zinc-300'  }}"
                            @click="active='inbox'">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler-arrow-mail size-4">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                                </path>
                                <path d="M3 7l9 6l9 -6"></path>
                            </svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4 icon icon-tabler icons-tabler-outline icon-tabler-user-scan"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 9a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M4 8v-2a2 2 0 0 1 2 -2h2" /><path d="M4 16v2a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v2" /><path d="M16 20h2a2 2 0 0 0 2 -2v-2" /><path d="M8 16a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2" /></svg>
                            <span>Kyc Requests</span>
                            <span
                                class="ml-auto text-[0.70rem] px-1.5 py-0.5 rounded bg-white text-zinc-900 outline-1 outline-zinc-200 dark:bg-white/10 dark:text-white dark:outline-white/10">10</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.dashboard') }}" wire:navigate
                            class="w-full h-9 px-3 rounded-md flex items-center gap-2 text-sm outline-1 outline-transparent hover:bg-zinc-50 dark:hover:bg-white/5"
                            :class="active === 'dashboard' ?
                                'bg-white text-zinc-900 dark:bg-white/10 dark:text-white outline-white/10' :
                                'text-zinc-700 dark:text-zinc-300'"
                            @click="active='dashboard'">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler-arrow-home size-4">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                </ul>
                <div class="pt-3 mt-3 border-t border-zinc-100 dark:border-zinc-800">
                    <p
                        class="px-3 lg:px-4 text-[0.70rem] font-semibold tracking-wide text-zinc-500 dark:text-zinc-400">
                        Queues
                    </p>
                    <ul class="mt-1 space-y-1">
                        <li>
                            <button
                                class="w-full h-9 px-3 rounded-md flex items-center justify-between text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-white/5"
                                @click="sections.queues=!sections.queues" :aria-expanded="sections.queues">
                                <span class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler-clipboard size-4">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                                        </path>
                                        <path
                                            d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z">
                                        </path>
                                    </svg>
                                    Ticket queues</span>
                                <span class="text-zinc-500 dark:text-zinc-400"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler-chevron-down size-4" x-show="sections.queues">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M6 9l6 6l6 -6"></path>
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="icon icon-tabler-chevron-right size-4"
                                        x-show="!sections.queues">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 6l6 6l-6 6"></path>
                                    </svg></span>
                            </button>
                            <div x-show="sections.queues" x-collapse x-cloak>
                                <ul class="mt-1 pl-2 space-y-1">
                                    <li>
                                        <a href="#_"
                                            class="flex items-center justify-between h-9 px-3 rounded-md text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-white/5">Unassigned</a>
                                    </li>
                                    <li>
                                        <a href="#_"
                                            class="flex items-center justify-between h-9 px-3 rounded-md text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-white/5">My
                                            team</a>
                                    </li>
                                    <li>
                                        <a href="#_"
                                            class="flex items-center justify-between h-9 px-3 rounded-md text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-white/5">Escalations
                                            <span
                                                class="text-[0.70rem] px-1.5 py-0.5 rounded bg-white text-zinc-900 outline outline-1 outline-zinc-200 dark:bg-white/10 dark:text-white dark:outline-white/10">3</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#_"
                                class="flex items-center gap-2 h-9 px-3 rounded-md text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-white/5"><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler-arrow-tool size-4">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6 -6a6 6 0 0 1 -8 -8l3.5 3.5">
                                    </path>
                                </svg>
                                Macros</a>
                        </li>
                        <li>
                            <a href="#_"
                                class="flex items-center gap-2 h-9 px-3 rounded-md text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-white/5"><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler-report size-4">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697"></path>
                                    <path d="M18 14v4h4"></path>
                                    <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2"></path>
                                    <path
                                        d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z">
                                    </path>
                                    <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                    <path d="M8 11h4"></path>
                                    <path d="M8 15h3"></path>
                                </svg>
                                Reports</a>
                        </li>
                    </ul>
                </div>

                <!-- Administration -->
                <div class="pt-3 mt-3 border-t border-zinc-100 dark:border-zinc-800">
                    <p
                        class="px-3 lg:px-4 text-[0.70rem] font-semibold tracking-wide text-zinc-500 dark:text-zinc-400">
                        Administration
                    </p>
                    <ul class="mt-1 space-y-1">
                        <li>
                            <a href="#_"
                                class="flex items-center gap-2 h-9 px-3 rounded-md text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-white/5"><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
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
                                Teams</a>
                        </li>
                        <li>
                            <a href="#_"
                                class="flex items-center gap-2 h-9 px-3 rounded-md text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-white/5"><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler-layout-settings size-4">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                    </path>
                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                </svg>
                                Preferences</a>
                        </li>
                        <li>
                            <a href="#_"
                                class="flex items-center gap-2 h-9 px-3 rounded-md text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-white/5"><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
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
                                Help Center</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Sticky footer: pinned at bottom; dropdown overlays upward -->
            <div class="sticky bottom-0 z-10 bg-white dark:bg-zinc-900 border-t border-zinc-100 dark:border-zinc-800">
                <div class="p-3 lg:p-4 space-y-3">
                    <div
                        class="rounded-lg outline outline-1 outline-zinc-200 dark:outline-zinc-800 bg-white dark:bg-zinc-900 p-3">
                        <p class="text-xs font-medium text-zinc-700 dark:text-zinc-200">
                            Status
                        </p>
                        <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400">
                            Queue health is stable. 2 open incidents.
                        </p>
                        <div class="mt-2 flex items-center justify-between">
                            <button
                                class="relative flex items-center justify-center text-center font-medium transition-colors duration-200 ease-in-out select-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:z-10 justify-center rounded-md text-zinc-700 bg-white outline outline-zinc-200 hover:shadow-sm hover:bg-zinc-50 focus-visible:outline-zinc-900 dark:text-zinc-100 dark:bg-zinc-800 dark:outline-zinc-600 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-400 h-7 px-3 text-xs"
                                type="button">
                                View report
                            </button>
                            <button
                                class="relative flex items-center justify-center text-center font-medium transition-colors duration-200 ease-in-out select-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:z-10 justify-center rounded-md text-zinc-600 bg-zinc-50 outline outline-zinc-100 hover:bg-zinc-200 focus-visible:outline-zinc-600 dark:text-zinc-100 dark:bg-zinc-800 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-700 h-7 px-3 text-xs"
                                type="button">
                                Dismiss
                            </button>
                        </div>
                    </div>
                </div>
                <div class="px-3 pb-3 lg:px-4 lg:pb-4">
                    <div x-data="{ open: false }" class="relative">
                        <button
                            class="w-full flex items-center justify-between gap-3 p-2 rounded-lg hover:bg-zinc-50 dark:hover:bg-white/5"
                            @click="open=!open">
                            <span class="flex items-center gap-3">
                                <img src="https://cdn.devdojo.com/images/may2023/adam.jpeg" alt="Avatar" class="size-8 rounded-full" />
                                <span class="text-left">
                                    <span class="block text-sm font-medium text-zinc-900 dark:text-zinc-100">{{ auth('admin')->user()->name }}</span>
                                    <span
                                        class="block text-xs text-zinc-500 dark:text-zinc-400">{{ auth('admin')->user()->email }}</span>
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
                            class="absolute  dark:border-gray-900 border-gray-300 left-0 right-0 bottom-14 border z-50 rounded-lg bg-white dark:bg-zinc-900 shadow-xl overflow-hidden">
                            <div class="p-2 text-sm">
                                <a href="#_"
                                    class="flex items-center h-9 px-2 rounded-md text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-white/5">View
                                    profile</a>
                                <a href="#_"
                                    class="flex items-center h-9 px-2 rounded-md text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-white/5">Account</a>
                                <a href="#_"
                                    class="flex items-center h-9 px-2 rounded-md text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-white/5">Docs</a>
                            </div>
                            <div class="border-t border-zinc-100 dark:border-zinc-800 p-2">
                                <button
                                    class="relative flex items-center justify-center text-center font-medium transition-colors duration-200 ease-in-out select-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:z-10 justify-center rounded-md text-zinc-600 bg-zinc-50 outline outline-zinc-100 hover:bg-zinc-200 focus-visible:outline-zinc-600 dark:text-zinc-100 dark:bg-zinc-800 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-700 h-7 px-3 text-xs w-full"
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

<!-- Mobile top bar -->
