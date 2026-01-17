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
            <div></div>
            <div class="hidden items-center gap-2 md:flex">
                <button
                    class="relative flex h-10 select-none items-center justify-center rounded-md bg-zinc-50 px-3.5 text-center font-medium text-zinc-600 outline outline-zinc-100 transition-colors duration-200 ease-in-out hover:bg-zinc-200 focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-600 dark:bg-zinc-800 dark:text-zinc-100 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-700 text-lg"
                    @click="dark=!dark; document.documentElement.classList.toggle('dark', dark)">
                    🌛
                </button>

                <!-- Profile menu option -->
                <div x-data="{
                    dropdownOpen: false
                }" class="relative">
                    <button x-on:click="dropdownOpen=true"
                        class="inline-flex h-11 items-center justify-center rounded-md py-2 pl-3 pr-12 text-sm font-medium text-zinc-600 outline outline-zinc-50 transition-colors duration-500 ease-in-out hover:bg-zinc-200 focus:outline-2 focus:outline-offset-2 focus:outline-zinc-600 disabled:pointer-events-none disabled:opacity-50 dark:bg-zinc-800 dark:text-zinc-100 dark:outline-zinc-800 dark:hover:bg-zinc-700 dark:focus:outline-zinc-700">
                        <img src="https://cdn.devdojo.com/images/may2023/adam.jpeg"
                            class="h-8 w-8 rounded-full border border-neutral-200 object-cover" />
                        <span class="ml-2 flex h-full shrink-0 translate-y-px flex-col items-start leading-none">
                            <span>{{ auth('admin')->user()->name }}</span>
                            <span class="text-xs font-light text-neutral-400">{{ auth('admin')->user()->email }}</span>
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
    </div>
</header>
