<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\KycDocumentType;
use App\Enums\KycStatus;
use App\Policies\KycPolicy;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * KYC (Know Your Customer) Model
 * 
 * Handles vendor identity verification similar to Stripe/Shopify compliance.
 * Supports GDPR auto-purge and legal holds for audits.
 */
#[UsePolicy(KycPolicy::class)]
class Kyc extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Attributes that are mass assignable
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'user_type',
        'status',
        'rejection_reason',
        'submitted_at',
        'full_name',
        'date_of_birth',
        'gender',
        'nationality',
        'document_type',
        'document_number',
        'document_issue_date',
        'document_expiry_date',
        'document_issuing_country',
        'document_front_path',
        'document_back_path',
        'selfie_path',
        'ip_address',
        'user_agent',
        'verification_notes',
        'attempt_number',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postal_code'
    ];

    /**
     * Get the attributes that should be cast.
     * 
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // 'status' => KycStatus::class,
            // 'gender' => Gender::class,
            // 'document_type' => KycDocumentType::class,
            'submitted_at' => 'datetime',
            'verified_at' => 'datetime',
            'date_of_birth' => 'date:Y-m-d',
            'document_issue_date' => 'date:Y-m-d',
            'document_expiry_date' => 'date:Y-m-d',
            'verification_notes' => 'array',
            'attempt_number' => 'integer',
            'verification_notes' => 'array',
            'attempt_number' => 'integer',
            'eligible_for_purge_at' => 'datetime',
            'legal_hold' => 'boolean',
        ];
    }

    /**
     * Scope: Pending KYC submissions awaiting review.
     */
    #[Scope]
    protected function pending(Builder $query): void
    {
        $query->where('status', KycStatus::PENDING->value);
    }

    /**
     * Scope: Approved KYC records
     */
    #[Scope]
    protected function approved(Builder $query): void
    {
        $query->where('status', KycStatus::APPROVED->value);
    }

    /**
     * Scope: Rejected KYC submissions.
     */
    #[Scope]
    protected function rejected(Builder $query): void
    {
        $query->where('status', KycStatus::REJECTED->value);
    }

    /**
     * Scope: Draft KYC records (incomplete wizard).
     */
    #[Scope]
    protected function drafts(Builder $query): void
    {
        $query->where('status', KycStatus::DRAFT->value);
    }

    /**
     * Scope: KYC records eligible for GDPR purge.
     */
    #[Scope]
    protected function eligibleForPurge(Builder $query): void
    {
        $query->where('legal_hold', false)
            ->whereNotNull('eligible_for_purge_at')
            ->where('eligible_for_purge_at', '<=', now());
    }

    /**
     * Check if KYC is approved.
     */
    public function isApproved(): bool
    {
        return $this->status === KycStatus::APPROVED->value;
    }

    /**
     * Check if KYC is pending.
     */
    public function isPending(): bool
    {
        return $this->status === KycStatus::PENDING->value;
    }

    /**
     * Check if KYC is rejected.
     */
    public function isRejected(): bool
    {
        return $this->status === KycStatus::REJECTED->value;
    }

    /**
     * Check if KYC is a draft.
     */
    public function isDraft(): bool
    {
        return $this->status === KycStatus::DRAFT->value;
    }

    /**
     * Check if document is expired.
     */
    public function isDocumentExpired(): bool
    {
        return $this->document_expiry_date?->isPast() ?? false;
    }

    /**
     * Accessor: Full document front URL.
     */
    protected function documentFrontUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->document_front_path
                ? asset("storage/{$this->document_front_path}")
                : null,
        );
    }

    /**
     * Accessor: Full document back URL.
     */
    protected function documentBackUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->document_back_path
                ? asset("storage/{$this->document_back_path}")
                : null,
        );
    }

    /**
     * Accessor: Full selfie URL.
     */
    protected function selfieUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->selfie_path
                ? asset("storage/{$this->selfie_path}")
                : null,
        );
    }

    /**
     * Mark KYC as submitted and ready for review.
     */
    public function markAsSubmitted(): void
    {
        $this->update([
            'status' => KycStatus::PENDING->value,
            'submitted_at' => now(),
        ]);
    }

    /**
     * Approve KYC verification.
     *
     * @param int $adminId ID of admin who verified
     */
    public function approve(int $adminId): void
    {
        $this->update([
            'status' => KycStatus::APPROVED->value,
            'verified_at' => now(),
            'verified_by' => $adminId,
            'rejection_reason' => null,
        ]);
    }

    /**
     * Reject KYC verification with reason.
     *
     * @param string $reason Why KYC was rejected
     */
    public function reject(string $reason): void
    {
        $this->update([
            'status' => KycStatus::REJECTED->value,
            'rejection_reason' => $reason,
            'verified_at' => null,
            'verified_by' => null,
        ]);
    }

    /**
     * Get the user who submitted this KYC.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, Kyc>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the admin who verified this KYC
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Admin, Kyc>
     */
    public function verifier(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'verified_by');
    }
}
