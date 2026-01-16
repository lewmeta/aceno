<?php

declare(strict_types=1);

use App\Http\Controllers\Vendor\KycDocumentController;
use App\Livewire\Vendor\Dashboard;
use App\Livewire\Vendor\Onboarding\KycPending;
use App\Livewire\Vendor\Onboarding\Step1PersonalDetails;
use App\Livewire\Vendor\Onboarding\Step2Documents;
use App\Livewire\Vendor\Onboarding\Step3Address;
use App\Livewire\Vendor\Onboarding\Step4Review;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| KYC Wizard Routes
|--------------------------------------------------------------------------
|
| Sequential wizard for vendor identity verification.
| Middleware 'redirect.kyc' enforces step-by-step completion.
 */

Route::middleware(['auth', 'redirect.kyc'])
    ->prefix('vendor/kyc')
    ->name('vendor.kyc.')
    ->group(function () {
        Route::get('/step-1', Step1PersonalDetails::class)->name('create');
        Route::get('/step-2', Step2Documents::class)->name('step2');
        Route::get('/step-3', Step3Address::class)->name('step3');
        Route::get('/step-4', Step4Review::class)->name('step4');
        Route::get('/pending', KycPending::class)->name('pending');
        // Route::get('/pending', Step3Review::class)->name('pending');
        // Route::get('/rejected', KycRejected::class)->name('rejected');
    });


/*
|--------------------------------------------------------------------------
| Secure KYC Document Download Routes
|--------------------------------------------------------------------------
|
| Protected routes for accessing KYC documents from private storage.
| Authorization enforced via KycPolicy.
 */

Route::middleware(['auth:web'])
    ->prefix('vendor/kyc/documents')
    ->name('vendor.kyc.documents.')
    ->group(function () {

        /**
         * Download KYC document
         * 
         * Example: /vendor/kyc/documents/123/front
         * 
         * @param int $kyc KYC record ID
         * @param string $type Document type: front, back, or selfie
         */
        Route::get('/{kyc}/{type}', [KycDocumentController::class, 'download'])
            ->name('download')
            ->where('type', 'front|back|selfie');
    });

/*
|--------------------------------------------------------------------------
| Vendor Routes (Protected)
|--------------------------------------------------------------------------
|
| Accessible only to vendors with approved KYC.
| Middleware 'vendor.kyc' checks KYC status.
 */
Route::middleware(['auth:web', 'verified', 'vendor.kyc'])
    ->prefix('vendor')
    ->name('vendor.')
    ->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
    });
