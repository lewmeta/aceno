<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KycAuditLog extends Model
{
    use HasFactory;

    /**
     * Disable updated_at - audit logs are immutable.
     */
    public const UPDATED_AT = null;

    /**
     * Mass assignable attributes
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'kyc_id',
        'admin_id',
        'action',
        'reason',
        'metadata',
        'ip_address',
        'user_agent',
        'review_duration_seconds',
    ];

    /**
     * Get the attributes that should be cast.
     * 
     * @var array<string, string>
     */
    protected function cast(): array
    {
        return [
            'metadata' => 'array',
            'review_duration_seconds' => 'integer',
        ];
    }

    /**
     * Scope: Approval actions only.
     * 
     * @return void
     */
    #[Scope]
    protected function approvals(Builder $query): void
    {
        $query->where('action', 'approved');
    }

    /**
     * Scope: Rejection actions only.
     */
    #[Scope]
    protected function rejections(Builder $query): void
    {
        $query->where('action', 'rejected');
    }

    /**
     * Scope: View actions only.
     */
    #[Scope]
    protected function views(Builder $query): void
    {
        $query->where('action', 'viewed');
    }

    /**
     * Scope: Fraud flag actions.
     */
    #[Scope]
    protected function fraudFlags(Builder $query): void
    {
        $query->where('action', 'flagged');
    }

    /**
     * Scope: Logs for specific admin.
     * 
     * @param Builder $query
     * @param int $adminId
     */
    #[Scope]
    protected function byAdmin(Builder $query, int $adminId): void
    {
        $query->where('admin_id', $adminId);
    }

    /**
     * Create a log entry for KYC action.
     *
     * @param int $kycId
     * @param int $adminId
     * @param string $action
     * @param string|null $reason
     * @param array|null $metadata
     * @param int|null $durationSeconds
     * @return self
     */
    public static function logAction(
        int $kycId,
        int $adminId,
        string $action,
        ?string $reason = null,
        ?array $metadata = null,
        ?int $durationSeconds = null,
    ): self {
        return self::create([
            'kyc_id' => $kycId,
            'kyc_admin' => $kycId,
            'admin_id' => $adminId,
            'action' => $action,
            'reason' => $reason,
            'metadata' => $metadata,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'review_duration_seconds' => $durationSeconds,
        ]);
    }

    /**
     * Relationship: Log belongs to KYC.
     */
    public function kyc(): BelongsTo
    {
        return $this->belongsTo(Kyc::class);
    }

    /**
     * Relationship: Log belongs to admin.
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
