<?php

namespace App\Http\Middleware;

use App\Enums\KycStatus;
use App\Enums\UserType;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Ensure vendor has completed and approved KYC 
 * - before accessing vendor routes.
 */
class CheckVendorKycStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Not a vendor - pass through
        if ($user->user_type !== UserType::VENDOR->value || $request->routeIs('vendor.kyc.*')) {
            return $next($request);
        }

        // No KYC submitted - redirect to wizard
        if (!$user->kyc) {
            return redirect()->route('vendor.kyc.create');
        }

        // KYC pending/under review - show waiting screen
        if (in_array($user->kyc->status, [KycStatus::PENDING->value, KycStatus::UNDER_REVIEW->value])) {
            redirect()->route('vendor.kyc.pending');
        }

        // KYC rejected - redirect to resubmit
        if ($user->kyc->status === KycStatus::REJECTED->value) {
            return redirect()->route('vendor.kyc.rejected');
        }

        return $next($request);
    }
}
