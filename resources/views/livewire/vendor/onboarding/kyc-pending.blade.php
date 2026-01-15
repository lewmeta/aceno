<div class="max-w-2xl mx-auto py-16 text-center">
    <div class="mb-6 inline-flex items-center justify-center w-20 h-20 bg-blue-100 rounded-full">
        <svg class="w-10 h-10 text-blue-600 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>

    <h1 class="text-3xl font-bold text-gray-900 mb-4">Application Under Review</h1>
    <p class="text-gray-600 mb-8 leading-relaxed">
        Thank you for submitting your identity documents. Our compliance team is currently verifying your information.
        This process typically takes <strong>24 to 48 hours</strong>.
    </p>

    <div class="bg-white border rounded-2xl p-6 shadow-sm mb-8 text-left">
        <h3 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4">Current Status</h3>
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                <span class="font-semibold text-gray-700">Verification Pending</span>
            </div>
            <span class="text-xs text-gray-400">Submitted
                {{ auth()->user('web')->kyc->submitted_at?->diffForHumans() }}</span>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="{{ route('home') }}"
            class="px-8 py-3 bg-gray-900 text-white rounded-xl font-bold hover:bg-black transition shadow-lg">
            Return to Dashboard
        </a>
        <button
            class="px-8 py-3 bg-white border border-gray-300 text-gray-600 rounded-xl font-bold hover:bg-gray-50 transition">
            Contact Support
        </button>
    </div>
</div>
