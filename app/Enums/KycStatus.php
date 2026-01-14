<?php

declare(strict_types=1);

namespace App\Enums;

enum KycStatus: string
{
    case DRAFT = 'draft';
    case PENDING = 'pending';
    case UNDER_REVIEW = 'under_review';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    case EXPIRED = 'expired'; // Documents expired
    case RESUBMITED = 'resubmitted'; // User resubmitted after rejection

    /**
     * Get human-readable label
     */
    public function label(): string
    {
        return match ($this) {
            self::DRAFT => 'draft',
            self::PENDING => 'Pending Submission',
            self::UNDER_REVIEW => 'Under Review',
            self::APPROVED => 'Approved',
            self::REJECTED => 'Rejected',
            self::EXPIRED => 'Expired',
            self::RESUBMITED => 'Resubmitted',
        };
    }

    /**
     * Get badge color for UI
     */
    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'gray',
            self::UNDER_REVIEW => 'blue',
            self::APPROVED => 'green',
            self::REJECTED => 'red',
            self::EXPIRED => 'orange',
            self::RESUBMITED => 'yellow',
        };
    }

    /**
     * Check if KYC is approved
     */
    public function isApproved(): bool
    {
        return $this === self::APPROVED;
    }
}
