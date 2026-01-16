<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Kyc;
use App\Models\User;

/**
 * KYC Policy
 * 
 * Authorization rules for KYC document access.
 * Ensures only authorized users can view/download sensitive documents.
 */
class KycPolicy
{
    /**
     * Determine if user can view KYC details
     * 
     * @param User|Admin $user Authenticated user or admin
     * @param Kyc $kyc KYC record to view
     * @return bool
     */
    public function view(User|Admin $user, Kyc $kyc): bool
    {
        // Admins can view all KYCs
        if ($user instanceof Admin) {
            return true;
        }

        // Users can only view their own KYC
        return $user->id === $kyc->user_id;
    }

    /**
     * Determine if user can downalod KYC documents.
     * 
     * @param User|Admin $user Authenticated user or admin
     * @param Kyc $kyc KYC record containing documents
     * @return bool
     */
    public function download(User|Admin $user, Kyc $kyc): bool
    {
        // Admins can download all documents
        if ($user instanceof Admin) {
            return true;
        }

        // Users can only dowload their own documents.
        return $user->id === $kyc->user_id;
    }

    /**
     * Determine if user can update KYC
     * 
     * Only users can edit their own DRAFT KYC.
     * Admins cannot edit user KYCs (they can only approve/reject).
     * 
     * @param User $user Authenticated user
     * @param Kyc $kyc KYC record to update
     * @return bool
     */
    public function update(User $user, Kyc $kyc): bool
    {
        // Must be the owner
        if ($user->id !== $kyc->user_id) {
            return false;
        }

        // Can only edit DRAFT or REJECTED KYCs
        return $kyc->isDraft() || $kyc->isRejected();
    }

    /**
     * Determine if admin can approve
     * 
     * @param Admin $admin Authenticated admin
     * @param Kyc $kyc KYC record to approve
     * @return bool
     */
    public function approve(Admin $admin, Kyc $kyc): bool
    {
        // Only admins can approve, and KYC must be PENDING
        return $kyc->isPending();
    }

    /**
     * Determine if admin can reject KYC.
     * 
     * @param Admin $admin Authenticated admin
     * @param Kyc $kyc KYC record to reject
     * @return bool
     */
    public function reject(Admin $admin, Kyc $kyc): bool
    {
        // Only admins can reject, and KYC must be PENDING
        return $kyc->isPending();
    }
}
