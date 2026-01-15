<div class="min-h-screen flex items-center justify-center pt-10">
    <div class="w-full max-w-3xl">
        <div class="px-4 text-zinc-900 dark:text-white font-bold">
            {{ __('Set up your KYC') }}
        </div>

        <!-- Dialog -->
        <div class="flex items-center justify-center inset-0 z-50 sm:items-center p-4 pt-2" role="dialog"
            aria-modal="true" aria-labelledby="org-title">
            <div
                class="w-full sm:max-w-3xl rounded-2xl bg-white dark:bg-zinc-800 shadow-xl  outline-1 outline-black/5 dark:-outline-offset-1 dark:outline-white/10">
                <!-- Header -->
                <div class="flex items-center justify-between px-6 py-4 border-b border-zinc-100 dark:border-zinc-700">
                    <div class="flex items-start gap-2">
                        <div
                            class="size-9 rounded-lg grid place-items-center bg-zinc-100 dark:bg-zinc-700 text-zinc-700 dark:text-zinc-200">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler-circle-info size-4">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                <path d="M12 9h.01"></path>
                                <path d="M11 12h1v4h1"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-sm font-semibold text-zinc-900 dark:text-white" id="org-title">
                                {{ __('Personal Information') }}
                            </h2>
                            <p class="text-xs text-zinc-600 dark:text-zinc-300">
                                {{ __('Please provide your legal details as they appear on your identification.') }}
                            </p>
                        </div>
                    </div>
                </div>
                <form wire:submit="">
                    <!-- Content -->
                    <div class="px-6 py-5 space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Full name -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Legal Full
                                    Name*</label>
                                <input wire:model="form.full_name" id="full_name" type="text"
                                    placeholder="e.g. MetaStark"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />

                                <!-- Error message display -->
                                <x-input-error :messages="$errors->get('form.full_name')" class="mt-2" />
                            </div>

                            <!-- Date of Birth -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Date of
                                    Birth*</label>
                                <input type="date" wire:model='form.date_of_birth' type="text"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />

                                <!-- Error message display -->
                                <x-input-error :messages="$errors->get('form.date_of_birth')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <!-- Footer -->
                    <div class="px-6 py-4 border-t border-zinc-100 dark:border-zinc-700 flex items-center gap-3">
                        <button
                            class="relative flex items-center  text-center font-medium transition-colors duration-200 ease-in-out select-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:z-10 justify-center rounded-md text-zinc-700 bg-white outline outline-zinc-200 hover:shadow-sm hover:bg-zinc-50 focus-visible:outline-zinc-900 dark:text-zinc-100 dark:bg-zinc-800 dark:outline-zinc-600 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-400 h-7 px-3 text-xs"
                            type="button"wire:click="goBack">
                            {{ __('Cancel') }}
                        </button>
                        <div class="ml-auto flex items-center gap-2">
                            <button
                                class="relative flex items-center text-center font-medium transition-colors duration-200 ease-in-out select-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:z-10 justify-center rounded-md text-zinc-700 bg-white outline outline-zinc-200 hover:shadow-sm hover:bg-zinc-50 focus-visible:outline-zinc-900 dark:text-zinc-100 dark:bg-zinc-800 dark:outline-zinc-600 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-400 h-7 px-3 text-xs"
                                type="button" wire:click="goBack" {{-- @click="close()" :disabled="submitting" --}}>
                                {{ __('Back') }}
                            </button>
                            <button
                                class="relative flex items-center text-center font-medium transition-colors duration-200 ease-in-out select-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:z-10 justify-center rounded-md text-white bg-blue-700 outline outline-blue-700 hover:bg-blue-600 focus-visible:outline-blue-600 dark:bg-blue-600 dark:text-zinc-100 dark:outline-blue-600 dark:hover:bg-blue-700 dark:focus-visible:outline-blue-500 h-7 px-3 text-xs"
                                type="submit" {{-- @click="submit()" :disabled="!valid() || submitting" --}}>
                                {{ __('Next') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
