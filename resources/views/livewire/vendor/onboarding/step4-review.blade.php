{{-- <div class="max-w-3xl mx-auto py-10">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center">Final Review</h2>
        <p class="text-gray-500 text-center mt-2">Please double-check everything before submitting for review.</p>
    </div>

    <div class="space-y-6">
        <!-- Section: Personal & Address -->
        <div class="bg-white rounded-2xl border shadow-sm divide-y">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-gray-800">Identity & Residence</h3>
                    <a href="{{ route('vendor.kyc.create') }}" wire:navigate
                        class="text-blue-600 text-sm font-medium">Edit</a>
                </div>
                <dl class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <dt class="text-gray-500">Full Name</dt>
                        <dd class="text-gray-900 font-medium">{{ $form->full_name }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-500">Address</dt>
                        <dd class="text-gray-900 font-medium">{{ $form->address_line1 }}, {{ $form->city }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Section: Documents -->
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-gray-800">Documents</h3>
                    <a href="{{ route('vendor.kyc.step2') }}" wire:navigate
                        class="text-blue-600 text-sm font-medium">Edit</a>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-gray-50 rounded-lg border">
                        <span
                            class="text-sm font-medium text-gray-900">{{ \App\Enums\KycDocumentType::tryFrom($form->document_type)?->label() }}</span>
                    </div>
                    @if ($form->document_front)
                        <img src="{{ $form->document_front->temporaryUrl() }}"
                            class="w-20 h-14 object-cover rounded-md shadow-sm border">
                    @endif
                </div>
            </div>
        </div>

        @error('submit')
            <div class="p-3 bg-red-50 text-red-700 rounded-lg text-sm">{{ $message }}</div>
        @enderror

        <div class="flex flex-col gap-4">
            <button wire:click="submit" wire:loading.attr="disabled"
                class="w-full bg-green-600 text-white py-4 rounded-xl font-extrabold text-lg shadow-xl hover:bg-green-700 transition-all active:scale-95">
                <span wire:loading.remove>Submit My Application</span>
                <span wire:loading>Processing Verification...</span>
            </button>
            <p class="text-center text-xs text-gray-400">By clicking submit, you agree to our Terms of Service regarding
                data processing.</p>
        </div>
    </div>
</div> --}}

<div class="min-h-screen flex items-center justify-center pt-10">
    <div class="w-full max-w-3xl">
        <div
            class="px-4 w-full mb-2 text-center flex flex-col items-center justify-center text-zinc-900 dark:text-white font-bold">
            {{ __('Final Review') }}
            <p class="text-gray-500 text-base text-center mt-1">Please double-check everything before submitting for
                review.</p>
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
                <form wire:submit="submit">
                    <!-- Content -->
                    <div class="px-6 py-5 space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Full name -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Full
                                    name*</label>
                                <dd type="text"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm">
                                    {{ $form->full_name }}
                                </dd>
                            </div>

                            <!-- Date of Birth -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Date of
                                    Birth*</label>
                                <dd type="text"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm">
                                    {{ $form->date_of_birth }}
                                </dd>
                            </div>

                            <!-- Gender -->
                            <div>
                                <label
                                    class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Gender*</label>
                                <dd type="text"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm">
                                    {{ $form->gender }}
                                </dd>
                            </div>

                            <!-- Nationality -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Nationality
                                    (ISO 3-Letter)*</label>
                                <dd type="text"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm">
                                    {{ $form->nationality }}
                                </dd>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Document type -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Document
                                    type*</label>
                                <dd
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm">
                                    {{ $form->document_type }}
                                </dd>
                            </div>

                            <!-- Issue date -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Issue
                                    date*</label>
                                <dd
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm">
                                    {{ $form->document_issue_date }}
                                </dd>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Front -->
                            <div class="md:col-span-3">
                                <label class="sr-only">Logo*</label>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Upload
                                    front side*</label>
                                <div class="mt-1 grid grid-cols-[96px_1fr] gap-3 items-start">
                                    <div
                                        class="size-24 rounded-xl overflow-hidden ring-1 ring-zinc-200 dark:ring-zinc-700 bg-zinc-100 dark:bg-zinc-700 grid place-items-center">

                                        <div
                                            class="relative size-48 border-2 border-dashed rounded-xl flex items-center justify-center ">
                                            @php
                                                $preview = $form->getPreviewUrl(
                                                    'document_front',
                                                    auth()->user()->kyc->id,
                                                );
                                            @endphp

                                            @if ($preview)
                                                <img src="{{ $preview }}" class="w-full h-full object-contain">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Nationality -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Document
                                    issuing country
                                    (ISO 3-Letter)*</label>
                                <input wire:model='form.document_issuing_country' type="text" placeholder="e.g. USA"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />
                            </div>

                            <!-- Exporation date -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Document
                                    expiry date*</label>
                                <input wire:model='form.document_expiry_date' type="date"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Full name -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Address
                                    line1*</label>
                                <input wire:model="form.address_line1" id="address_line1" type="text"
                                    placeholder="e.g. Some 123 @_line1"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />
                            </div>

                            <!-- Address line2 -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Address
                                    line2*</label>
                                <input wire:model="form.address_line1" id="address_line1" type="text"
                                    placeholder="e.g. Some 123 @_line2"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />
                            </div>

                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- City -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">City*</label>
                                <input wire:model="form.city" id="city" type="text"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />
                            </div>

                            <!-- Address line2 -->
                            <div>
                                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-200">Postal
                                    code*</label>
                                <input wire:model="form.postal_code" type="text"
                                    placeholder="e.g. PO Box 4343. In Kstreet"
                                    class="mt-1 block w-full h-10 px-4 py-2 text-xs bg-white border border-transparent rounded-lg appearance-none dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 duration-300 ring-1 ring-zinc-200 dark:ring-zinc-700 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-300 dark:focus:border-blue-700 focus:bg-transparent focus:outline-none focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 sm:text-sm" />
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
                                type="button" wire:click="goBack">
                                {{ __('Back') }}
                            </button>
                            <button
                                class="relative flex items-center text-center font-medium transition-colors duration-200 ease-in-out select-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:z-10 justify-center rounded-md text-white bg-blue-700 outline outline-blue-700 hover:bg-blue-600 focus-visible:outline-blue-600 dark:bg-blue-600 dark:text-zinc-100 dark:outline-blue-600 dark:hover:bg-blue-700 dark:focus-visible:outline-blue-500 h-7 px-3 text-xs"
                                type="submit">
                                {{ __('Submit and review') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
