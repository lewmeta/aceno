<?php

namespace App\Livewire\Vendor\Onboarding;

use App\Enums\KycDocumentType;
use App\Enums\KycStatus;
use App\Livewire\Forms\KycForm;
use App\Services\KycService;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.vendor')]
#[Title('KYC Verification - Step 2')]
class Step2Documents extends Component
{
    use WithFileUploads;

    /**
     * Form object handling validation & state.
     */
    public KycForm $form;

    /**
     * Initialize component
     * 
     * @return void
     */
    public function mount(): void
    {
        $user = auth('web')->user();
        $kyc = $user->kyc;

        // Enfornce Step 1 completion
        if (!$kyc || empty($kyc->full_name) || empty($kyc->date_of_birth)) {
            session()->flash('warning', 'Please complete your personal details first.');
            $this->redirectRoute('vendor.kyc.create', navigate: true);
            return;
        }

        // Prevent access if KYC already submitted
        if ($kyc->status !== KycStatus::DRAFT->value) {
            $this->redirectRoute('vendor.kyc.pending', navigate: true);
            return;
        }

        // Fill form object properties with existing data.
        $this->form->fill($kyc->toArray());

        // Explicitly set the paths if fill() missed them
        $this->form->document_front = $kyc->document_front_path;
        $this->form->document_back = $kyc->document_back_path;
    }

    /**
     * Validate and proceed to Step 3 (Review and submit)
     * Files are not saved - only validated
     * Actual storage happens in Step 3 to prevent orphaned files.
     */
    public function proceedToStep3(KycService $service): void
    {
        // Validate document uploads
        $this->form->validate($this->form->step2Rules());

        /** @var \App\Models\User $user */
        $user = auth('web')->user();

        $service->saveStep2($user, $this->form);

        // Save metadata only (no file storage yet!)
        // $user->kyc->update([
        //     'document_type' => $this->form->document_type,
        //     'document_issue_date' => $this->form->document_issue_date,
        //     'document_expiry_date' => $this->form->document_expiry_date,
        //     'document_issuing_country' => $this->form->document_issuing_country,
        // ]);

        // Files stay in Livewire's temporary storage until Step 3
        $this->redirectRoute('vendor.kyc.step3', navigate: true);
    }

    /**
     * Helper for the Blade view to toggle the back-side upload area.
     */
    public function shouldShowBackSide(): bool
    {
        $type = KycDocumentType::tryFrom($this->form->document_type);
        return $type ? $type->requireBackSide() : false;
    }

    /**
     * Navigate back to Step 1.
     */
    public function goBack(): void
    {
        $this->redirectRoute('vendor.kyc.create', navigate: true);
    }

    /**
     * Cancel wizard and return to home.
     */
    public function cancel(): void
    {
        $this->redirectRoute('home', navigate: true);
    }

    public function render()
    {
        return view('livewire.vendor.onboarding.step2-documents');
    }
}
