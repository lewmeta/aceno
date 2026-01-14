<?php

namespace App\Livewire\Vendor;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.vendor')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.vendor.dashboard');
    }
}
