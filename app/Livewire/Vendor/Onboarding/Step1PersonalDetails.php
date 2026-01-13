<?php

namespace App\Livewire\Vendor\Onboarding;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.vendor')]
class Step1PersonalDetails extends Component
{
    public function render()
    {
        return view('livewire.vendor.step1-personal-details');
    }
}
