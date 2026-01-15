<?php

namespace App\Livewire\Vendor\Onboarding;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.vendor')]
#[Title('KYC Pending - Awaiting approval')]
class KycPending extends Component
{
    public function render()
    {
        return view('livewire.vendor.onboarding.kyc-pending');
    }
}
