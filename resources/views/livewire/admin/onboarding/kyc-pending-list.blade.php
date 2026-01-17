<div class="">
    {{-- Header --}}
    <div class="border-b border-gray-200 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">KYC Review Queue</h1>
                    <p class="mt-1 text-sm text-gray-500">Review and approve vendor identity verifications</p>
                </div>
                
                {{-- Stats Cards --}}
                <div class="flex gap-4">
                    <div class="min-w-[100px] rounded-lg bg-blue-50 px-4 py-3 text-center">
                        <div class="text-2xl font-bold text-blue-600">{{ $this->stats['pending'] }}</div>
                        <div class="text-xs font-medium text-blue-600">Pending</div>
                    </div>
                    <div class="min-w-[100px] rounded-lg bg-green-50 px-4 py-3 text-center">
                        <div class="text-2xl font-bold text-green-600">{{ $this->stats['approved_today'] }}</div>
                        <div class="text-xs font-medium text-green-600">Approved Today</div>
                    </div>
                    <div class="min-w-[100px] rounded-lg bg-red-50 px-4 py-3 text-center">
                        <div class="text-2xl font-bold text-red-600">{{ $this->stats['rejected_today'] }}</div>
                        <div class="text-xs font-medium text-red-600">Rejected Today</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        {{-- Filters & Search --}}
        <div class="mb-6 rounded-lg border border-gray-200 bg-white shadow-sm">
            <div class="flex items-center justify-between gap-4 p-4">
                {{-- Status Filters --}}
                <div class="flex gap-2">
                    <button 
                        wire:click="filterByStatus('pending')"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition
                            {{ $status === 'pending' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Pending
                    </button>
                    <button 
                        wire:click="filterByStatus('approved')"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition
                            {{ $status === 'approved' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Approved
                    </button>
                    <button 
                        wire:click="filterByStatus('rejected')"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition
                            {{ $status === 'rejected' ? 'bg-red-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Rejected
                    </button>
                </div>

                {{-- Search --}}
                <div class="max-w-md flex-1">
                    <input 
                        type="text" 
                        wire:model.live.debounce.300ms="search"
                        placeholder="Search by name or email..."
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-transparent focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>

        {{-- KYC List --}}
        <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
            @if($this->kycs->isEmpty())
                {{-- Empty State --}}
                <div class="py-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No KYC submissions</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        @if($status === 'pending')
                            All caught up! No pending reviews.
                        @else
                            No {{ $status }} KYC submissions found.
                        @endif
                    </p>
                </div>
            @else
                {{-- Table Header --}}
                <div class="border-b border-gray-200 bg-gray-50 px-6 py-3">
                    <div class="grid grid-cols-12 gap-4 text-xs font-medium uppercase tracking-wider text-gray-500">
                        <div class="col-span-3">User</div>
                        <div class="col-span-2">Document Type</div>
                        <div class="col-span-2">
                            <button wire:click="sortBy('submitted_at')" class="flex items-center gap-1 hover:text-gray-700">
                                Submitted
                                @if($sortBy === 'submitted_at')
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                        @if($sortDirection === 'asc')
                                            <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                        @else
                                            <path d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"/>
                                        @endif
                                    </svg>
                                @endif
                            </button>
                        </div>
                        <div class="col-span-2">Status</div>
                        <div class="col-span-3 text-right">Actions</div>
                    </div>
                </div>

                {{-- Table Body --}}
                <div class="divide-y divide-gray-200">
                    @foreach($this->kycs as $kyc)
                        <div class="px-6 py-4 transition hover:bg-gray-50">
                            <div class="grid grid-cols-12 items-center gap-4">
                                {{-- User Info --}}
                                <div class="col-span-3">
                                    <div class="flex items-center gap-3">
                                        <div class="shrink-0">
                                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-blue-500 to-purple-600 text-sm font-semibold text-white">
                                                {{ substr($kyc->user->name, 0, 2) }}
                                            </div>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <p class="truncate text-sm font-medium text-gray-900">
                                                {{ $kyc->user->name }}
                                            </p>
                                            <p class="truncate text-sm text-gray-500">
                                                {{ $kyc->user->email }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Document Type --}}
                                <div class="col-span-2">
                                    <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-800">
                                        {{ $kyc->document_type }}
                                    </span>
                                </div>

                                {{-- Submitted Date --}}
                                <div class="col-span-2">
                                    <p class="text-sm text-gray-900">{{ $kyc->submitted_at?->format('M d, Y') ?? 'Draft' }}</p>
                                    <p class="text-xs text-gray-500">{{ $kyc->submitted_at?->diffForHumans() ?? '-' }}</p>
                                </div>

                                {{-- Status Badge --}}
                                <div class="col-span-2">
                                    @php
                                        $statusColors = [
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'approved' => 'bg-green-100 text-green-800',
                                            'rejected' => 'bg-red-100 text-red-800',
                                            'draft' => 'bg-gray-100 text-gray-800',
                                        ];
                                        $color = $statusColors[$kyc->status] ?? 'bg-gray-100 text-gray-800';
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $color }}">
                                        {{ ucfirst($kyc->status) }}
                                    </span>
                                </div>

                                {{-- Actions --}}
                                <div class="col-span-3 text-right">
                                    <button 
                                        wire:click="reviewKyc({{ $kyc->id }})"
                                        class="inline-flex items-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Review
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Pagination --}}
        @if($this->kycs->hasPages())
            <div class="mt-6">
                {{ $this->kycs->links() }}
            </div>
        @endif
    </div>
</div>