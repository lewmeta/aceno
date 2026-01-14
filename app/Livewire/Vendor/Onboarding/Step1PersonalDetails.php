<?php

declare(strict_types=1);

namespace App\Livewire\Vendor\Onboarding;

use App\Enums\KycStatus;
use App\Livewire\Forms\KycForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.vendor')]
class Step1PersonalDetails extends Component
{
    /**
     * Form object handlindng validation & state.
     */
    public KycForm $form;

    /**
     * Initialize component & hydrate form with existing data.
     * 
     * @return void
     */
    public function mount(): void
    {
        $kyc = auth('web')->user()->kyc;

        if ($kyc) {
            // Fill form object properties with existing data.
            $this->form->fill($kyc->toArray());
        }
    }

    /**
     * Validate the current step and persist the progress as a Draft.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveAndContinue(): mixed
    {
        // dd(['Mapped data:']);
        Log::debug("Clicked next step!");
        // Execute Step 1 specific validation
        // $this->validate($this->form->step1Rules());

        // Call validate directly on the form object
        $this->form->validate($this->form->step1Rules());

        /** @var \App\Models\User $user */
        $user = auth('web')->user();

        // update or Create the KYC record as a Draft.
        $user->kyc()->updateOrCreate(
            ['user_id' => $user->id],
            array_merge($this->form->getMappedData(), [
                'status' => KycStatus::PENDING->value,
            ]),
        );

        return redirect()->route('vendor.kyc.step2');
    }

    public function render()
    {
        return view('livewire.vendor.onboarding.step1-personal-details');
    }
}
