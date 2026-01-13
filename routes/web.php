<?php

use App\Livewire\Frontend\Home;
use App\Livewire\Vendor\Dashboard;
use App\Livewire\Vendor\Onboarding\Step1PersonalDetails;
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
Route::middleware(['auth'])->prefix('vendor/kyc')->name('vendor.kyc.')->group(function () {
    Route::get('/step-1', Step1PersonalDetails::class)->name('create');
});

    /** Vendor KYC wizard */
    // Route::prefix('vendor/kyc')->name('vendor.kyc.')->group(function () {
    //     Route::get('/step-1', Dashboard::class)->name('create');
    //     Route::get('/pending', Dashboard::class)->name('pending');
    //     Route::get('/rejected', Dashboard::class)->name('rejected');
    // });

/** Vendor Routes */
Route::group(['prefix' => 'vendor', 'as' => 'vendor.', 'middleware' => ['auth', 'verified', 'vendor.kyc']], function() {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
});

require __DIR__.'/auth.php';
