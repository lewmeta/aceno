<?php

namespace App\Livewire\Vendor\Onboarding;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.vendor')]
class Step2Documents extends Component
{

    /**
     * Initialize component
     * 
     * @return void
     */
    public function mount(): void
    {
        $kyc = auth('web')->user()->kyc;

        // Check if Step 1 is incomplete (e.g., no full_name or dob)
        if (!$kyc || empty($kyc->full_name) || empty($kyc->date_of_birth)) {
            session()->flash('warning', 'Please complete your personal details first.');
            // $this->redirectRoute('vendor.kyc.create', navigate: true);
            request()->userAgent();
            request()->ip();
            return;
        }
    }

    public function render()
    {
        return view('livewire.vendor.onboarding.step2-documents');
    }
}
