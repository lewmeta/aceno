<div class="min-h-screen flex flex-col items-center justify-center pt-10">
    <div class="w-full max-w-3xl" x-data="{}">
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
                                {{ __('Identity Verification') }}
                            </h2>
                            <p class="text-xs text-zinc-600 dark:text-zinc-300">
                                {{ __('Upload a clear photo of your government ID.') }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- @dump(['Doc type' => $form->document_type]) --}}
                <form wire:submit="proceedToStep3">
                    <!-- Content -->
                    <div class="px-6 py-5 space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Document type -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Document
                                    type*</label>
                                <select wire:model.live="form.document_type"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm">
                                    <option>Select Document Type</option>
                                    @foreach (\App\Enums\KycDocumentType::cases() as $type)
                                        <option wire:key="{{ $type->value }}" value="{{ $type->value }}">
                                            {{ $type->label() }}</option>
                                    @endforeach
                                </select>
                                <!-- Error message display -->
                                <x-input-error :messages="$errors->get('form.document_type')" class="mt-2" />

                            </div>

                            <!-- Issue date -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Issue
                                    date*</label>
                                <input wire:model='form.document_issue_date' type="date"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />

                                <!-- Error message display -->
                                <x-input-error :messages="$errors->get('form.document_issue_date')" class="mt-2" />
                            </div>

                            <!-- Front -->
                            <div class="md:col-span-3">
                                <label class="sr-only">Logo*</label>
                                @if ($this->shouldShowBackSide())
                                    <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Upload
                                        front side*</label>
                                @endif

                                {{-- @dump(['doc type' => $form->document_type, 'kyc id' => auth('web')->user()->kyc->id]) --}}
                                {{-- @dump(['link' => route('vendor.kyc.documents.download', $kycId)]) --}}
                                {{-- <img src="{{ route('vendor.kyc.documents.download', 1) }}" alt=""
                                    class="size-20 object-cover"> --}}
                                <div class="mt-1 grid grid-cols-[96px_1fr] gap-3 items-start">
                                    <div
                                        class="size-24 rounded-xl overflow-hidden ring-1 ring-zinc-200 dark:ring-zinc-700 bg-zinc-100 dark:bg-zinc-700 grid place-items-center">

                                        <div
                                            class="relative h-48 border-2 border-dashed rounded-xl flex items-center justify-center overflow-hidden">
                                            @php
                                                $preview = $form->getPreviewUrl(
                                                    'document_front',
                                                    auth()->user()->kyc->id,
                                                );
                                            @endphp

                                            @if ($preview)
                                                <img src="{{ $preview }}"
                                                    class="size-40 object-center w-full h-full object-cover">
                                                <div
                                                    class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 hover:opacity-100 transition">
                                                    <label
                                                        class="cursor-pointer bg-white text-gray-900 px-4 py-2 rounded-lg font-bold text-sm">
                                                        Change Photo
                                                        <input type="file" wire:model="form.document_front"
                                                            class="hidden">
                                                    </label>
                                                </div>
                                            @else
                                                <input type="file" wire:model="form.document_front"
                                                    class="absolute inset-0 opacity-0 cursor-pointer">
                                                <div class="text-center">
                                                    <span class="text-blue-600 font-bold">Click to upload Front
                                                        Side</span>
                                                </div>
                                            @endif
                                        </div>

                                        {{-- @if ($form->document_front || $form->document_type)
                                            <img src="{{ $form->document_front instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile
                                                ? $form->document_front->temporaryUrl()
                                                : route('vendor.kyc.documents.download', $kycId) }}"
                                                alt="Document Front" class="size-full object-cover" />
                                        @else
                                            <div class="text-zinc-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler-accessibility size-5">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z">
                                                    </path>
                                                    <path
                                                        d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1">
                                                    </path>
                                                    <path d="M17 7h.01"></path>
                                                    <path d="M7 13l3.644 -3.644a1.21 1.21 0 0 1 1.712 0l3.644 3.644">
                                                    </path>
                                                    <path d="M15 12l1.644 -1.644a1.21 1.21 0 0 1 1.712 0l2.644 2.644">
                                                    </path>
                                                </svg>
                                            </div>
                                        @endif --}}
                                    </div>
                                    <div>
                                        <label class="sr-only">Profile image</label>
                                        <div
                                            class="rounded-xl p-4 bg-white dark:bg-zinc-800 text-center ring-1 ring-zinc-200 dark:ring-zinc-700">
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
                                                <path d="M15 12l1.644 -1.644a1.21 1.21 0 0 1 1.712 0l2.644 2.644">
                                                </path>
                                            </svg>
                                            <label
                                                class="text-xs text-blue-600 dark:text-blue-400 cursor-pointer font-medium">
                                                <input type="file" class="sr-only" accept="image/*"
                                                    wire:model="form.document_front" />
                                                Click to upload
                                            </label>
                                            <div class="mt-1 text-[0.70rem] text-zinc-500 font-medium">
                                                SVG, PNG, JPG, GIF (max 800×400px)
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Error message display -->
                                <x-input-error :messages="$errors->get('form.document_front')" class="mt-2" />
                            </div>

                            <!-- Back -->
                            @if ($this->shouldShowBackSide())
                                <!-- Logo dropzone spans two cols -->
                                <div class="md:col-span-3">
                                    <label class="sr-only">Logo*</label>
                                    <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Upload
                                        back side*</label>
                                    <div class="mt-1 grid grid-cols-[96px_1fr] gap-3 items-start">
                                        <div
                                            class="size-24 rounded-xl overflow-hidden ring-1 ring-zinc-200 dark:ring-zinc-700 bg-zinc-100 dark:bg-zinc-700 grid place-items-center">
                                            @if ($form->document_back)
                                                <img src="{{ $form->document_back->temporaryUrl() }}" alt="back"
                                                    class="size-full object-cover" />
                                            @else
                                                <div class="text-zinc-400">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler-accessibility size-5">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path
                                                            d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z">
                                                        </path>
                                                        <path
                                                            d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1">
                                                        </path>
                                                        <path d="M17 7h.01"></path>
                                                        <path
                                                            d="M7 13l3.644 -3.644a1.21 1.21 0 0 1 1.712 0l3.644 3.644">
                                                        </path>
                                                        <path
                                                            d="M15 12l1.644 -1.644a1.21 1.21 0 0 1 1.712 0l2.644 2.644">
                                                        </path>
                                                    </svg>
                                                </div>
                                            @endif

                                        </div>
                                        <div>
                                            <label class="sr-only">Profile image</label>
                                            <div {{-- :class="drag ? 'ring-2 ring-indigo-500 bg-indigo-50/40 dark:bg-indigo-400/10' :
                                                'ring-1 ring-zinc-200 dark:ring-zinc-700'" --}}
                                                class="rounded-xl p-4 bg-white dark:bg-zinc-800 text-center ring-1 ring-zinc-200 dark:ring-zinc-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler-accessibility size-4 text-zinc-500 dark:text-zinc-30 mx-auto mb-1">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z">
                                                    </path>
                                                    <path
                                                        d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1">
                                                    </path>
                                                    <path d="M17 7h.01"></path>
                                                    <path d="M7 13l3.644 -3.644a1.21 1.21 0 0 1 1.712 0l3.644 3.644">
                                                    </path>
                                                    <path d="M15 12l1.644 -1.644a1.21 1.21 0 0 1 1.712 0l2.644 2.644">
                                                    </path>
                                                </svg>
                                                <label
                                                    class="text-xs text-blue-600 dark:text-blue-400 cursor-pointer font-medium">
                                                    <input type="file" class="sr-only"
                                                        wire:model="form.document_back" accept="image/*"
                                                        @change="pick($event)" />Click to upload
                                                </label>
                                                {{-- <span class="text-xs text-zinc-500 font-medium">
                                                or drag & drop</span> --}}
                                                <div class="mt-1 text-[0.70rem] text-zinc-500 font-medium">
                                                    SVG, PNG, JPG, GIF (max 800×400px)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Error message display -->
                                    <x-input-error :messages="$errors->get('form.document_back')" class="mt-2" />
                                </div>
                            @endif

                            {{-- <!-- Description -->
                            <div class="md:col-span-2">
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">About the
                                    organization*</label>
                                <textarea x-model="form.description" rows="4" placeholder="What do you build? Who do you help?"
                                    class="mt-1 block w-full px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm"></textarea>
                            </div> --}}

                            <!-- Nationality -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Document
                                    issuing country
                                    (ISO 3-Letter)*</label>
                                <input wire:model='form.document_issuing_country' type="text"
                                    placeholder="e.g. USA"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />

                                <!-- Error message display -->
                                <x-input-error :messages="$errors->get('form.document_issuing_country')" class="mt-2" />
                            </div>

                            <!-- Exporation date -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Document
                                    expiry date*</label>
                                <input wire:model='form.document_expiry_date' type="date"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />

                                <!-- Error message display -->
                                <x-input-error :messages="$errors->get('form.document_expiry_date')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="px-6 py-4 border-t border-zinc-100 dark:border-zinc-700 flex items-center gap-3">
                        <button
                            class="relative flex items-center  text-center font-medium transition-colors duration-200 ease-in-out select-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:z-10 justify-center rounded-md text-zinc-700 bg-white outline outline-zinc-200 hover:shadow-sm hover:bg-zinc-50 focus-visible:outline-zinc-900 dark:text-zinc-100 dark:bg-zinc-800 dark:outline-zinc-600 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-400 h-7 px-3 text-xs"
                            type="button" wire:click="cancel">
                            {{ __('Cancel') }}
                        </button>
                        <div class="ml-auto flex items-center gap-2">
                            <button
                                class="relative flex items-center text-center font-medium transition-colors duration-200 ease-in-out select-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:z-10 justify-center rounded-md text-zinc-700 bg-white outline outline-zinc-200 hover:shadow-sm hover:bg-zinc-50 focus-visible:outline-zinc-900 dark:text-zinc-100 dark:bg-zinc-800 dark:outline-zinc-600 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-400 h-7 px-3 text-xs"
                                wire:click="goBack" type="button">
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
