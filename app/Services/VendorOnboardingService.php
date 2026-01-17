<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\KycStatus;
use App\Models\{Kyc, KycAuditLog };
use App\Support\Result;
use Illuminate\Support\Facades\{DB, Log };

/**
 * KYC Onboarding Service
 */
final class VendorOnboardingService
{
    /**
     * Approve a KYC submission.
     * 
     * @param Kyc $kyc KYC record to approve
     * @param int $adminId Admin making the decision
     * @return Result
     */
    public function approve(Kyc $kyc, int $adminId): Result
    {
        if ($kyc->status !== KycStatus::PENDING->value) {
            return Result::fail('KYC must be pending to approve');
        }

        try {
            DB::beginTransaction();

            $oldStatus = $kyc->status;

            // Upate kYC status
            $kyc->approve($adminId);

            // Log the action
            KycAuditLog::logAction(
                kycId: $kyc->id,
                adminId: $adminId,
                action: 'approved',
                metadata: [
                    'previous_status' => $oldStatus,
                    'new_status' => KycStatus::APPROVED->value,
                ]
            );

            // Send notifications

            // Broadcast real-time event

            Log::info('KYC Approved', [
                'kyc_id' => $kyc->id,
                'user_id' => $kyc->user_id,
                'admin_id' => $adminId,
            ]);

            DB::commit();

            return Result::success($kyc);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error("KYC approval failed", [
                'kyc_id' => $kyc->id,
                'admin_id' => $adminId
            ]);

            return Result::fail('Failed to approve KYC. Please try again. ');
        }
    }

    /**
     * Reject a KYC submission with reason
     * 
     * @param Kyc $kyc KYC record to reject
     * @param int $adminId Admin peforming action
     * @param string $reason Rejection reason (required)
     * @return Result
     */
    public function reject(Kyc $kyc, int $adminId, string $reason): Result
    {
        if ($kyc->status !== KycStatus::PENDING->value) {
            return Result::fail('KYC just be pending to reject');
        }

        try {
            DB::transaction();

            // Update KYC status
            $kyc->reject($reason);

            // Log the action
            KycAuditLog::logAction(
                kycId: $kyc->id,
                adminId: $adminId,
                action: 'rejected',
                metadata: [
                    'previous_status' => KycStatus::PENDING->value,
                    'new_status' => KycStatus::REJECTED->value,
                ],
            );

            // Send notifications

            // Broadcast real-time event

            DB::commit();

            Log::info('KYC rejected', [
                'kyc_id' => $kyc->id,
                'admin_id' => $adminId,
                'reason' => $reason,
            ]);

            return Result::success($kyc);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('KYC rejection failed', [
                'kyc_id' => $kyc->id,
                'admin_id' => $adminId,
                'error' => $e->getMessage(),
            ]);

            return Result::fail('Failed to reject KYC. Please try again.');
        }
    }

    /**
     * Flag KYC as potential fraud (optional - for future).
     * 
     * @param Kyc $kyc
     * @param int $adminId
     * @param string $reason
     * @return Result
     */
    public function flasAsFraud(Kyc $kyc, int $adminId, string $reason): Result
    {
        try {
            DB::beginTransaction();

            // Log action (don't change status yet - for super admin review)
            KycAuditLog::logAction(
                kycId: $kyc->id,
                adminId: $adminId,
                action: 'flagged',
                reason: $reason,
                metadata: [
                    'flagged_at' => now()->toIso8601String(),
                ]
            );

            DB::commit();

            Log::warning('KYC flagged for fraud review', [
                'kyc_id' => $kyc->id,
                'admin_id' => $adminId,
                'reason' => $reason,
            ]);

            return Result::success($kyc);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('KYC fraud flag failed', [
                'kyc_id' => $kyc->id,
                'admin_id' => $adminId,
                'error' => $e->getMessage(),
            ]);

            return Result::fail('Failed to flag KYC. Please try again.');
        }
    }
}
