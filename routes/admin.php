<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Onboarding\KycPendingList;
use App\Livewire\Admin\Onboarding\KycReviewDetails;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest:admin')->prefix('admin')->as('admin.')->group(function () {
    Volt::route('register', 'pages.admin.register')
        ->name('register');

    Volt::route('login', 'pages.admin.login')
        ->name('login');

    Volt::route('forgot-password', 'pages.admin.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.admin.reset-password')
        ->name('password.reset');
});

Route::middleware('auth:admin')
    ->prefix('admin')->as('admin.')
    ->group(function () {
        Volt::route('verify-email', 'pages.admin.verify-email')
            ->name('verification.notice');

        Route::get('dashboard', Dashboard::class)
            ->name('dashboard');

        Route::get('admin.profile')
            ->name('profile');

        Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

        Volt::route('confirm-password', 'pages.admin.confirm-password')
            ->name('password.confirm');
    });

/*
|--------------------------------------------------------------------------
| Admin KYC Management Routes
|--------------------------------------------------------------------------
|
| Routes for admin panel KYC review workflow.
| Protected by 'auth:admin' middleware.
*/
Route::middleware([''])
    ->prefix('admin/kyc')
    ->name('admin.kyc.')
    ->group(function () {

        // KYC Queue Dashboard
        Route::get('/pending', KycPendingList::class)
            ->name('pending');

        // Single KYC Review
        Route::get('/{kyc}/review', KycReviewDetails::class)
        ->name('review');

    });
