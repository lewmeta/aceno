<?php

use App\Livewire\Frontend\Home;
use App\Livewire\Vendor\Dashboard;
use App\Livewire\Vendor\Onboarding\KycPending;
use App\Livewire\Vendor\Onboarding\Step1PersonalDetails;
use App\Livewire\Vendor\Onboarding\Step2Documents;
use App\Livewire\Vendor\Onboarding\Step3Address;
use App\Livewire\Vendor\Onboarding\Step4Review;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
