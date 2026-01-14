<?php

namespace App\Http\Middleware;

use App\Enums\KycStatus;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Strictly enforces the sequential order of the KYC wizard based on DB state
 */
class RedirectIfKycStepIncomplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $kyc = $user->kyc;

        // Route names;
        // Step 1: vendor.kyc.create
        // Step 2: vendor.kyc.step2
        // Step 3: vendor.kyc.step3

        // Rule: To access Step 2, Step 1 must be finished (full_name exists)
        if ($request->routeIs('vendor.kyc.step2')) {
            if (!$kyc || empty($kyc->full_name)) {
                return redirect()->route('vendor.kyc.create')->with('error', 'Complete step 1 first');
                // return redirect()->route('vendor.kyc.create');
            }
        }

        // Rule: To access Step 3, Step 2 must be finished (document_type exists)
        if ($request->routeIs('vendor.kyc.step3')) {
            if (!$kyc || empty($kyc->document_type)) {
                return redirect()->route('vendor.kyc.step2')->with('error', 'Complete Step 2 first.');
            }
        }

        // Rule: If KYC is already PENDING/APPROVED, don't let them back into the wizard
        if ($request->routeIs('vendor.kyc.create', 'vendor.kyc.step2', 'vendor.kyc.step3')) {
            if ($kyc && $kyc->status !== KycStatus::DRAFT) {
                return redirect()->route('vendor.kyc.pending');
            }
        }

        return $next($request);
    }
}
