<?php

namespace App\Livewire\Vendor\Onboarding;

use App\Enums\KycStatus;
use App\Livewire\Forms\KycForm;
use App\Services\KycService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.vendor')]
#[Title('KYC Verification - Step 4: Review & Submit')]
class Step4Review extends Component
{
    use WithFileUploads;

    /**
     * FOrm object handling validation & state.
     */
    public KycForm $form;

    /**
     * Initialize
     */
    public function mount(): void
    {
        /** @var \App\Models\User $user */
        $user = auth('web')->user();
        $kyc = $user->kyc;

        // Enforce step 2 completion
        if (!$kyc || empty($kyc->document_type)) {
            session()->flash('warning', 'Please complete document upload first');
            $this->redirectRoute('vendor.kyc.step2', navigate: true);
        }

        // Prevent access if KYC already submitted
        if ($kyc->status !== KycStatus::DRAFT->value) {
            $this->redirectRoute('vendor.kyc.pending', navigate: true);
        }

        // Load complete KYC data for preview
        $this->form->fill($kyc->toArray());
    }

    /**
     * Final submission: Save files to PRIVATE storage and mark as PENDING.
     * 
     * Files are stored in: storage/app/private/kyc/{user_id}/{filename}
     * Access only via: /vendor/kyc/documents/{file} (with authorization)
     */
    public function submit(KycService $service): void
    {
        // validate step 3 fields.
        $this->form->validate($this->form->step3Rules());

        // Defensive check for Livewire temp files
        if (!$this->form->document_front) {
            $this->addError('submit', 'Session expired. Please re-upload your files');
            return;
        }

        try {
            $service->finalizeSubmission(auth('web')->user(), $this->form);

            session()->flash('success', 'Application submitted');
            $this->redirectRoute('vendor.kyc.pending', navigate:true);
        } catch (\Exception $e) {
            Log::error("KYC Submission Error: " . $e->getMessage());
            $this->addError('submit', 'We could not process your request. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.vendor.onboarding.step4-review');
    }
}
