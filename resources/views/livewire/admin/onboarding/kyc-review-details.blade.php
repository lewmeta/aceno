<div class="overflow-auto">
    {{-- Header --}}
    <div class="border-b border-gray-200 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <button wire:click="goBack" class="text-gray-400 hover:text-gray-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </button>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Review KYC Submission</h1>
                        <p class="mt-1 text-sm text-gray-500">{{ $this->kyc->user->name }} ·
                            {{ $this->kyc->user->email }}</p>
                    </div>
                </div>

                {{-- Status Badge --}}
                @php
                    $statusColors = [
                        'pending' => 'bg-yellow-100 text-yellow-800',
                        'approved' => 'bg-green-100 text-green-800',
                        'rejected' => 'bg-red-100 text-red-800',
                    ];
                    $color = $statusColors[$this->kyc->status] ?? 'bg-gray-100 text-gray-800';
                @endphp
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $color }}">
                    {{ ucfirst($this->kyc->status) }}
                </span>
            </div>
        </div>
    </div>

    <div class="mx-auto h-full max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        {{-- Flash Messages --}}
        @if (session()->has('success'))
            <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {{-- Main Content: Two-Column Layout --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            {{-- LEFT COLUMN: KYC Details & Decision Form --}}
            <div class="space-y-6">
                {{-- Personal Information --}}
                <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-lg font-semibold text-gray-900">Personal Information</h2>
                    </div>
                    <div class="space-y-4 px-6 py-4">
                        <div>
                            <label class="text-xs font-medium uppercase text-gray-500">Full Name</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $this->kyc->full_name }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs font-medium uppercase text-gray-500">Date of Birth</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $this->kyc->date_of_birth->format('M d, Y') }}
                                </p>
                                <p class="text-xs text-gray-500">Age: {{ $this->kyc->date_of_birth->age }} years</p>
                            </div>
                            <div>
                                <label class="text-xs font-medium uppercase text-gray-500">Gender</label>
                                <p class="mt-1 text-sm text-gray-900">{{ ucfirst($this->kyc->gender?->value ?? 'N/A') }}
                                </p>
                            </div>
                        </div>
                        <div>
                            <label class="text-xs font-medium uppercase text-gray-500">Nationality</label>
                            <p class="mt-1 text-sm text-gray-900">{{ strtoupper($this->kyc->nationality ?? 'N/A') }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Document Information --}}
                <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-lg font-semibold text-gray-900">Document Information</h2>
                    </div>
                    <div class="space-y-4 px-6 py-4">
                        <div>
                            <label class="text-xs font-medium uppercase text-gray-500">Document Type</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $this->kyc->document_type }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs font-medium uppercase text-gray-500">Issue Date</label>
                                <p class="mt-1 text-sm text-gray-900">
                                    {{ $this->kyc->document_issue_date?->format('M d, Y') ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-medium uppercase text-gray-500">Expiry Date</label>
                                <p class="mt-1 text-sm text-gray-900">
                                    {{ $this->kyc->document_expiry_date?->format('M d, Y') ?? 'N/A' }}</p>
                                @if ($this->kyc->isDocumentExpired())
                                    <p class="text-xs font-medium text-red-600">⚠️ Expired</p>
                                @endif
                            </div>
                        </div>
                        <div>
                            <label class="text-xs font-medium uppercase text-gray-500">Issuing Country</label>
                            <p class="mt-1 text-sm text-gray-900">
                                {{ strtoupper($this->kyc->document_issuing_country ?? 'N/A') }}</p>
                        </div>
                    </div>
                </div>

                {{-- Submission Metadata --}}
                <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-lg font-semibold text-gray-900">Submission Details</h2>
                    </div>
                    <div class="space-y-4 px-6 py-4">
                        <div>
                            <label class="text-xs font-medium uppercase text-gray-500">Submitted At</label>
                            <p class="mt-1 text-sm text-gray-900">
                                {{ $this->kyc->submitted_at?->format('M d, Y H:i') ?? 'Not submitted' }}</p>
                            <p class="text-xs text-gray-500">{{ $this->kyc->submitted_at?->diffForHumans() }}</p>
                        </div>
                        <div>
                            <label class="text-xs font-medium uppercase text-gray-500">IP Address</label>
                            <p class="mt-1 font-mono text-sm text-gray-900">{{ $this->kyc->ip_address ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Decision Form (Only if PENDING) --}}
                @if ($this->kyc->isPending())
                    <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
                        <div class="border-b border-gray-200 px-6 py-4">
                            <h2 class="text-lg font-semibold text-gray-900">Make Decision</h2>
                        </div>
                        <div class="space-y-4 px-6 py-4">
                            {{-- Decision Radio Buttons --}}
                            <div class="space-y-3">
                                <label
                                    class="flex items-center p-3 border-2 rounded-lg cursor-pointer transition
                                    {{ $decision === 'approve' ? 'border-green-500 bg-green-50' : 'border-gray-200 hover:border-gray-300' }}">
                                    <input type="radio" wire:model.live="decision" value="approve"
                                        class="h-4 w-4 text-green-600 focus:ring-green-500">
                                    <span class="ml-3 text-sm font-medium text-gray-900">
                                        ✅ Approve KYC
                                    </span>
                                </label>

                                <label
                                    class="flex items-center p-3 border-2 rounded-lg cursor-pointer transition
                                    {{ $decision === 'reject' ? 'border-red-500 bg-red-50' : 'border-gray-200 hover:border-gray-300' }}">
                                    <input type="radio" wire:model.live="decision" value="reject"
                                        class="h-4 w-4 text-red-600 focus:ring-red-500">
                                    <span class="ml-3 text-sm font-medium text-gray-900">
                                        ❌ Reject KYC
                                    </span>
                                </label>
                            </div>

                            {{-- Rejection Reason (Show only if rejecting) --}}
                            @if ($decision === 'reject')
                                <div class="animate-fade-in space-y-3">
                                    <label class="text-sm font-medium text-gray-700">Rejection Reason</label>

                                    {{-- Quick Rejection Buttons --}}
                                    <div class="grid grid-cols-2 gap-2">
                                        @foreach ($quickReasons as $reason)
                                            <button type="button" wire:click="setQuickReason('{{ $reason }}')"
                                                class="px-3 py-2 text-xs text-left border rounded-lg hover:bg-gray-50 transition
                                                    {{ $rejectionReason === $reason ? 'border-red-500 bg-red-50 text-red-700' : 'border-gray-300 text-gray-700' }}">
                                                {{ $reason }}
                                            </button>
                                        @endforeach
                                    </div>

                                    {{-- Custom Reason Textarea --}}
                                    <textarea wire:model="rejectionReason" rows="3" placeholder="Or type a custom rejection reason..."
                                        class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-transparent focus:ring-2 focus:ring-red-500"></textarea>

                                    @error('rejectionReason')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            @endif

                            {{-- Submit Button --}}
                            <div class="flex gap-3 border-t pt-4">
                                <button wire:click="submitDecision" wire:loading.attr="disabled"
                                    wire:loading.class="opacity-50 cursor-not-allowed"
                                    @if (!$decision) disabled @endif
                                    class="flex-1 px-6 py-3 rounded-lg font-medium transition
                                        {{ $decision === 'approve' ? 'bg-green-600 hover:bg-green-700 text-white' : ($decision === 'reject' ? 'bg-red-600 hover:bg-red-700 text-white' : 'bg-gray-300 text-gray-500 cursor-not-allowed') }}">
                                    <span wire:loading.remove>
                                        {{ $decision === 'approve' ? 'Approve KYC' : ($decision === 'reject' ? 'Reject KYC' : 'Select Decision') }}
                                    </span>
                                    <span wire:loading>Processing...</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Audit Trail --}}
                @if ($this->auditLogs->isNotEmpty())
                    <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
                        <div class="border-b border-gray-200 px-6 py-4">
                            <h2 class="text-lg font-semibold text-gray-900">Audit Trail</h2>
                        </div>
                        <div class="px-6 py-4">
                            <div class="space-y-3">
                                @foreach ($this->auditLogs as $log)
                                    <div class="flex gap-3 text-sm">
                                        <div class="mt-1.5 h-2 w-2 flex-shrink-0 rounded-full bg-gray-400"></div>
                                        <div class="flex-1">
                                            <p class="text-gray-900">
                                                <span class="font-medium">{{ $log->admin->name }}</span>
                                                {{ $log->action }} this KYC
                                            </p>
                                            <p class="text-xs text-gray-500">{{ $log->created_at->diffForHumans() }}
                                            </p>
                                            @if ($log->reason)
                                                <p class="mt-1 text-xs italic text-gray-600">"{{ $log->reason }}"</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {{-- RIGHT COLUMN: Document Viewer --}}
            <div class="space-y-6">
                {{-- Document Front --}}
                <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-lg font-semibold text-gray-900">Document Front</h2>
                    </div>
                    <div class="p-6">
                        @if ($this->kyc->document_front_path)
                            <div class="group relative">
                                <img src="{{ $this->kyc->document_front_url }}" alt="Document Front"
                                    class="w-full rounded-lg border border-gray-200">

                                {{-- Download Button Overlay --}}
                                <a href="{{ $this->kyc->document_front_url }}" download
                                    class="absolute right-4 top-4 rounded-lg bg-white/90 px-4 py-2 text-sm font-medium text-gray-700 opacity-0 shadow-lg backdrop-blur-sm transition hover:bg-white group-hover:opacity-100">
                                    Download
                                </a>
                            </div>
                        @else
                            <div class="py-12 text-center text-gray-400">
                                <p>No document uploaded</p>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Document Back (if applicable) --}}
                @if ($this->kyc->document_type)
                    <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
                        <div class="border-b border-gray-200 px-6 py-4">
                            <h2 class="text-lg font-semibold text-gray-900">Document Back</h2>
                        </div>
                        <div class="p-6">
                            @if ($this->kyc->document_back_path)
                                <div class="group relative">
                                    <img src="{{ $this->kyc->document_back_url }}" alt="Document Back"
                                        class="w-full rounded-lg border border-gray-200">

                                    <a href="{{ $this->kyc->document_back_url }}" download
                                        class="absolute right-4 top-4 rounded-lg bg-white/90 px-4 py-2 text-sm font-medium text-gray-700 opacity-0 shadow-lg backdrop-blur-sm transition hover:bg-white group-hover:opacity-100">
                                        Download
                                    </a>
                                </div>
                            @else
                                <div class="py-12 text-center text-gray-400">
                                    <p>No back side uploaded</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                {{-- Selfie (if uploaded) --}}
                @if ($this->kyc->selfie_path)
                    <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
                        <div class="border-b border-gray-200 px-6 py-4">
                            <h2 class="text-lg font-semibold text-gray-900">Selfie Verification</h2>
                        </div>
                        <div class="p-6">
                            <div class="group relative">
                                <img src="{{ $this->kyc->selfie_url }}" alt="Selfie"
                                    class="w-full rounded-lg border border-gray-200">

                                <a href="{{ $this->kyc->selfie_url }}" download
                                    class="absolute right-4 top-4 rounded-lg bg-white/90 px-4 py-2 text-sm font-medium text-gray-700 opacity-0 shadow-lg backdrop-blur-sm transition hover:bg-white group-hover:opacity-100">
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
