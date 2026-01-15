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


/**
 * KYC Wizard Routes (Middleware NOT applied here)
 */
Route::middleware(['auth', 'redirect.kyc'])->prefix('vendor/kyc')->name('vendor.kyc.')->group(function () {
    Route::get('/step-1', Step1PersonalDetails::class)->name('create');
    Route::get('/step-2', Step2Documents::class)->name('step2');
    Route::get('/step-3', Step3Address::class)->name('step3');
    Route::get('/step-4', Step4Review::class)->name('step4');
    Route::get('/pending', KycPending::class)->name('pending');
    // Route::get('/pending', Step3Review::class)->name('pending');
    // Route::get('/rejected', KycRejected::class)->name('rejected');
});

/** Vendor Routes */
Route::group(['prefix' => 'vendor', 'as' => 'vendor.', 'middleware' => ['auth', 'verified', 'vendor.kyc']], function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
});

// Route::middleware(['auth', 'verified', 'vendor.kyc'])->prefix('vendor')->as('vendor.')->group(function () {
//     Route::get('dashboard', Dashboard::class)->name('dashboard');
// })->name('vendor.');

require __DIR__ . '/auth.php';
