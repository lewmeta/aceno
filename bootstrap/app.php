<?php

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckVendorKycStatus;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfKycStepIncomplete;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__.'/../routes/web.php',
            __DIR__.'/../routes/admin.php'
        ],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Register middleware
        $middleware->alias([
            'auth' => Authenticate::class,
            'guest' => RedirectIfAuthenticated::class,
            'vendor.kyc' => CheckVendorKycStatus::class,
            'redirect.kyc' => RedirectIfKycStepIncomplete::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
