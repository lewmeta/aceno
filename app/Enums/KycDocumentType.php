<?php

namespace App\Enums;

enum KycDocumentType: string
{
    case PASSPORT = 'passport';
    case NATIONAL_ID = 'national_id';
    case DRIVERS_LICENSE = 'drivers_license';
    case RESIDENCE_PERMIT = 'residence_permit';

    /**
     * Get human-readable label
     */
    public function label(): string
    {
        return match ($this) {
            self::PASSPORT => 'Passport',
            self::NATIONAL_ID => 'National ID Card',
            self::DRIVERS_LICENSE => "Driver's License",
            self::RESIDENCE_PERMIT => 'Residence Permit',
        };
    }

    /**
     * Check if document requires back side
     */
    public function requireBackSide(): bool
    {
        return match ($this) {
            self::NATIONAL_ID, self::DRIVERS_LICENSE => true,
            default => false,
        };
    }
}
