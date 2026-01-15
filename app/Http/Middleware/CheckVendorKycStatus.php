<?php

namespace App\Http\Middleware;

use App\Enums\KycStatus;
use App\Enums\UserType;
use App\Models\Kyc;
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
        // dd(['name' => $user->name, 'KYC' => $user->kyc, 'user_type' => $user->user_type, 'status' => $user->kyc->status]);

        // Not a vendor - pass through
        if ($user->isCustomer()) {
            return redirect()->route('home', 403);
        }

        // No KYC submitted - redirect to wizard
        if (!$user->kyc) {
            return redirect()->route('vendor.kyc.create');
        }
        if ($user->kyc && $user->kyc->status === KycStatus::DRAFT->value) {
            return redirect()->route('vendor.kyc.step2');
        }

        // KYC pending/under review - show waiting screen
        // dd(['name' => $user->name, 'user_type' => $user->user_type, 'status' => $user->kyc->status]);
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
