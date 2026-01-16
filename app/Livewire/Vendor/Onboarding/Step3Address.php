<?php

namespace App\Livewire\Vendor\Onboarding;

use App\Livewire\Forms\KycForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.vendor')]
#[Title('KYC - Step 3: Address')]
class Step3Address extends Component
{
    public KycForm $form;

    public function mount(): void
    {
        $user = auth('web')->user();
        $kyc = $user->kyc;

        // Ensure they completed the documents step
        if (!$kyc || empty($kyc->document_type)) {
            $this->redirectRoute('vendor.kyc.step2', navigate: true);
            return;
        }

        $this->form->fill($kyc->toArray());
    }

    public function proceedToStep4(): void
    {
        $this->form->validate($this->form->step3Rules());

        // Update draft with address info
        auth('web')->user()->kyc->update($this->form->getMappedData());

        $this->redirectRoute('vendor.kyc.step4', navigate: true);
    }

    /**
     * Go back
     */
    public function goBack(): void
    {
        $this->redirectRoute('vendor.kyc.step2', navigate: true);
    }

    /**
     * Cancel
     */
    public function cancel(): void
    {
        $this->redirectRoute('home', navigate: true);
    }

    public function render()
    {
        return view('livewire.vendor.onboarding.step3-address');
    }
}
