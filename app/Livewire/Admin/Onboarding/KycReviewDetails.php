<?php

namespace App\Livewire\Admin\Onboarding;

use App\Models\Kyc;
use App\Models\KycAuditLog;
use App\Services\VendorOnboardingService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

/**
 * KYC Review details component
 */
#[Layout('layouts.admin')]
#[Title('KYC Review Queue')]
class KycReviewDetails extends Component
{
    /**
     * KYC being reviewed (locked to prevent tampering).
     */
    #[Locked]
    public int $kycId;

    /**
     * Decision: 'approve' or 'reject'.
     */
    public string $decision = '';

    /**
     * Rejection reason (required if rejecting)
     */
    #[Validate('required_if:decision,reject|max:500')]
    public string $rejectionReason = '';

    /**
     * Quick rejection reasons (buttons).
     */
    public array $quickReasons = [
        'Document is blurry or unreadable',
        'Document has expired',
        'Name mismatch between form and document',
        'Applicant appears to be under 18',
        'Document appears to be fake or altered',
        'Poor photo quality - please resubmit',
    ];

    /**
     * Track review start time for analytics.
     */
    public ?int $reviewStartedAt = null;

    /**
     * Mount and log view action
     */
    public function mount(Kyc $kyc): void
    {
        $this->kycId = $kyc->id;
        // dd($kyc->id);
        $this->reviewStartedAt = now()->timestamp;

        // Log that admin viewed this KYC
        KycAuditLog::logAction(
            kycId: $kyc->id,
            adminId: auth('admin')->id(),
            action: 'viewed'
        );
    }

    /**
     * Get KYC record with relationships.
     */
    #[Computed]
    public function kyc(): Kyc
    {
        return Kyc::with(['user', 'verifier'])
            ->findOrFail($this->kycId);
    }

    /**
     * Get audit trai for this KYC.
     */
    #[Computed]
    public function auditLogs()
    {
        return KycAuditLog::where('kyc_id', $this->kycId)
            ->with('admin:id,name')
            ->latest()
            ->get();
    }

    /**
     * Set quick rejection reason.
     */
    public function setQuickReason(string $reason): void
    {
        $this->rejectionReason = $reason;
        $this->decision = 'reject';
    }

    /**
     * Submit decision (approve or reject).
     */
    public function submitDecision(VendorOnboardingService $service): void
    {
        $this->validate();

        $kyc = $this->kyc;
        $adminId = auth('admin')->id();

        // Calculate review duration
        $durationSeconds = $this->reviewStartedAt
            ? (now()->timestamp - $this->reviewStartedAt)
            : null;

        if ($this->decision === 'approve') {
            $result = $service->approve($kyc, $adminId);

            if ($result->success) {
                session()->flash('success', 'KYC approved successfully');
                $this->redirectRoute('admin.kyc.index', navigate: true);
            } else {
                $this->addError('decision', $result->message);
            }
        } elseif ($this->decision === 'reject') {
            $result = $service->reject($kyc, $adminId, $this->rejectionReason);

            if ($result->success) {
                session()->flash('success', 'KYC rejected and user notified');
            } else {
                $this->addError('decision', $result->message);
            }
        }
    }

    /**
     * Navigate back to KYC queue.
     */
    public function goBack(): void
    {
        $this->redirectRoute('admin.kyc.pending', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.onboarding.kyc-review-details');
    }
}
