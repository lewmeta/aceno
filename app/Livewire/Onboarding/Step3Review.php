<?php

namespace App\Livewire\Onboarding;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.vendor')]
class Step3Review extends Component
{
    public function render()
    {
        return view('livewire.onboarding.step3-review');
    }
}
