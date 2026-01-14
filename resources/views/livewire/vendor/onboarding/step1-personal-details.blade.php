<div class="min-h-screen flex items-center justify-center pt-10">
    <!--
// Make sure to change  "open: false",  to  open: true. On the z-data="{}".
-->
    <div class="w-full max-w-3xl" x-data="{
        open: true,
        drag: false,
        submitting: false,
        show() {
            this.reset();
            this.open = true;
            this.$nextTick(() => this.$refs.name?.focus());
        },
        close() {
            if (this.submitting) return;
            this.open = false;
        },
    }">
        <div class="px-4 text-zinc-900 dark:text-white font-bold">
            {{ __('Set up your KYC') }}
        </div>

        <!-- Dialog -->
        <div
            class="flex items-center justify-center inset-0 z-50 sm:items-center p-4 pt-2" role="dialog"
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
                <form wire:submit="saveAndContinue">
                    <!-- Content -->
                    <div class="px-6 py-5 space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Full name -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Legal Full
                                    Name*</label>
                                <input wire:model="form.full_name" id="full_name" type="text" placeholder="e.g. MetaStark"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />

                                <!-- Error message display -->
                                <x-input-error :messages="$errors->get('form.full_name')" class="mt-2" />
                            </div>

                            <!-- Date of Birth -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Date of
                                    Birth*</label>
                                <input type="date" wire:model='form.date_of_birth' {{-- x-model="form.website"  --}}
                                    type="text" placeholder="19/03/9999"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />

                                <!-- Error message display -->
                                <x-input-error :messages="$errors->get('form.date_of_birth')" class="mt-2" />
                            </div>
                            <!-- Logo dropzone spans two cols -->
                            {{-- <div class="md:col-span-2">
                                <label class="sr-only">Logo*</label>
                                <div class="mt-1 grid grid-cols-[96px_1fr] gap-3 items-start">
                                    <div
                                        class="size-24 rounded-xl overflow-hidden ring-1 ring-zinc-200 dark:ring-zinc-700 bg-zinc-100 dark:bg-zinc-700 grid place-items-center">
                                        <img x-show="form.logo" :src="form.logo" alt="Logo"
                                            class="size-full object-cover" />
                                        <div x-show="!form.logo" class="text-zinc-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="icon icon-tabler-accessibility size-5">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z">
                                                </path>
                                                <path
                                                    d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1">
                                                </path>
                                                <path d="M17 7h.01"></path>
                                                <path d="M7 13l3.644 -3.644a1.21 1.21 0 0 1 1.712 0l3.644 3.644"></path>
                                                <path d="M15 12l1.644 -1.644a1.21 1.21 0 0 1 1.712 0l2.644 2.644"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="sr-only">Profile image</label>
                                        <div @dragover.prevent @dragenter.prevent="drag=true"
                                            @dragleave.prevent="drag=false" @drop="drop($event)"
                                            :class="drag ? 'ring-2 ring-indigo-500 bg-indigo-50/40 dark:bg-indigo-400/10' :
                                                'ring-1 ring-zinc-200 dark:ring-zinc-700'"
                                            class="rounded-xl p-4 bg-white dark:bg-zinc-800 text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="icon icon-tabler-accessibility size-4 text-zinc-500 dark:text-zinc-30 mx-auto mb-1">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z">
                                                </path>
                                                <path
                                                    d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1">
                                                </path>
                                                <path d="M17 7h.01"></path>
                                                <path d="M7 13l3.644 -3.644a1.21 1.21 0 0 1 1.712 0l3.644 3.644"></path>
                                                <path d="M15 12l1.644 -1.644a1.21 1.21 0 0 1 1.712 0l2.644 2.644"></path>
                                            </svg>
                                            <label
                                                class="text-xs text-blue-600 dark:text-blue-400 cursor-pointer font-medium">
                                                <input type="file" class="sr-only" accept="image/*"
                                                    @change="pick($event)" />Click to upload
                                            </label>
                                            <span class="text-xs text-zinc-500 font-medium">
                                                or drag & drop</span>
                                            <div class="mt-1 text-[0.70rem] text-zinc-500 font-medium">
                                                SVG, PNG, JPG, GIF (max 800×400px)
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- Slug -->
                            {{-- <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Public
                                    URL*</label>
                                <div class="mt-1 grid grid-cols-[minmax(120px,180px)_1fr] items-center">
                                    <div
                                        class="block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg rounded-r-none appearance-none bg-zinc-50 dark:bg-white/5 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm">
                                        example.com/org/
                                    </div>
                                    <input x-model="form.slug" type="text" placeholder="acme"
                                        class="block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg rounded-l-none appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />
                                </div>
                                <p class="mt-1 text-[0.70rem]"
                                    :class="slugOk(form.slug) ? 'text-green-600 dark:text-green-400' :
                                        'text-red-600 dark:text-red-400'"
                                    x-text="slugOk(form.slug) ? 'Looks good' : 'Use 3–30 lowercase letters or dashes' ">
                                </p>
                            </div> --}}
                            <!-- Industry -->
                            <div>
                                <label
                                    class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Gender*</label>
                                <select wire:model="form.gender"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm">
                                    <option>Select Gender</option>
                                    @foreach (\App\Enums\Gender::cases() as $gender)
                                        <option wire:key="{{ $gender->value }}" value="{{ $gender->value }}">
                                            {{ $gender->label() }}</option>
                                    @endforeach
                                </select>
                                <!-- Error message display -->
                                <x-input-error :messages="$errors->get('form.gender')" class="mt-2" />

                            </div>

                            <!-- Nationality -->
                            <div>
                                <label
                                    class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Nationality*</label>
                                <input wire:model='form.nationality' type="text" placeholder="e.g. USA"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />

                                <!-- Error message display -->
                                <x-input-error :messages="$errors->get('form.nationality')" class="mt-2" />
                            </div>
                            {{-- <!-- HQ -->
                            <div class="md:col-span-2">
                                <label
                                    class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Headquarters</label>
                                <div class="mt-1 flex items-center gap-2">
                                    <div class="text-zinc-500 dark:text-zinc-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="icon icon-tabler-arrow-map-pin size-4">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                            <path
                                                d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                                            </path>
                                        </svg>
                                    </div>
                                    <input x-model="form.hq" type="text" placeholder="City, Country"
                                        class="flex-1 mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />
                                </div>
                            </div>
                            <!-- Tags -->
                            <div class="md:col-span-2">
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Keywords
                                    (1–10)</label>
                                <div class="mt-1 flex items-end gap-2">
                                    <input x-model="form.tagInput" @keydown.enter.prevent="addTag()" type="text"
                                        placeholder="e.g. b2b, saas, marketplace"
                                        class="flex-1 mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />
                                    <button
                                        class="relative flex items-center justify-center text-center font-medium transition-colors duration-200 ease-in-out select-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:z-10 justify-center rounded-md text-zinc-700 bg-white outline outline-zinc-200 hover:shadow-sm hover:bg-zinc-50 focus-visible:outline-zinc-900 dark:text-zinc-100 dark:bg-zinc-800 dark:outline-zinc-600 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-400 h-10 px-5 text-sm"
                                        type="button" :disabled="!form.tagInput" @click="addTag()">
                                        Add
                                    </button>
                                </div>
                                <div class="mt-2 flex flex-wrap gap-2">
                                    <template x-for="(t,i) in form.tags" :key="t">
                                        <span
                                            class="inline-flex items-center gap-1 text-xs px-2 py-1 rounded-full bg-zinc-100 dark:bg-zinc-700 text-zinc-700 dark:text-zinc-200">
                                            <span x-text="t"></span>
                                            <button type="button"
                                                class="text-zinc-500 hover:text-zinc-700 dark:hover:text-zinc-300"
                                                @click="rmTag(i)">
                                                ×
                                            </button>
                                        </span>
                                    </template>
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="md:col-span-2">
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">About the
                                    organization*</label>
                                <textarea x-model="form.description" rows="4" placeholder="What do you build? Who do you help?"
                                    class="mt-1 block w-full px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm"></textarea>
                            </div> --}}
                        </div>
                    </div>
                    <!-- Footer -->
                    <div class="px-6 py-4 border-t border-zinc-100 dark:border-zinc-700 flex items-center gap-3">
                        <button
                            class="relative flex items-center  text-center font-medium transition-colors duration-200 ease-in-out select-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:z-10 justify-center rounded-md text-zinc-700 bg-white outline outline-zinc-200 hover:shadow-sm hover:bg-zinc-50 focus-visible:outline-zinc-900 dark:text-zinc-100 dark:bg-zinc-800 dark:outline-zinc-600 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-400 h-7 px-3 text-xs"
                            type="button" @click="close()" :disabled="submitting">
                            {{ __('Cancel') }}
                        </button>
                        <div class="ml-auto flex items-center gap-2">
                            <button
                                class="relative flex items-center text-center font-medium transition-colors duration-200 ease-in-out select-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:z-10 justify-center rounded-md text-zinc-700 bg-white outline outline-zinc-200 hover:shadow-sm hover:bg-zinc-50 focus-visible:outline-zinc-900 dark:text-zinc-100 dark:bg-zinc-800 dark:outline-zinc-600 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-400 h-7 px-3 text-xs"
                                type="button"
                                 {{-- @click="close()" :disabled="submitting" --}}
                                >
                                {{ __('Back') }}
                            </button>
                            <button
                                class="relative flex items-center text-center font-medium transition-colors duration-200 ease-in-out select-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:z-10 justify-center rounded-md text-white bg-blue-700 outline outline-blue-700 hover:bg-blue-600 focus-visible:outline-blue-600 dark:bg-blue-600 dark:text-zinc-100 dark:outline-blue-600 dark:hover:bg-blue-700 dark:focus-visible:outline-blue-500 h-7 px-3 text-xs"
                                type="submit" 
                                {{-- @click="submit()" :disabled="!valid() || submitting" --}}
                                >
                                {{ __('Next') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
