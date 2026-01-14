<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\KycStatus;
use App\Enums\UserType;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

/**
 * User Model
 * 
 * Represents both customers and vendors in the platform
 * User type determines access level and features
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_path',
        'username',
        'user_type',
        'is_active',
        'approved_by',
        'preferred_currency',
        'preferred_language',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    /**
     * Get the admin who approved this vendor
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Admin, User>
     */
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'approved_by');
    }

    /** 
     * Get the user's store (for vendors)
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Store>
     */
    public function store(): HasOne
    {
        return $this->hasOne(Store::class);
    }

    /**
     * Get the user's KYC record
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Kyc>
     */
    public function kyc(): HasOne
    {
        return $this->hasOne(Kyc::class);
    }

    /**
     * Check is user is a customer
     * 
     * @return bool
     */
    public function isCustomer(): bool
    {
        return $this->user_type === UserType::CUSTOMER->value;
    }

    /**
     * Check if user is a vendor.
     * 
     * @return bool
     */
    public function isVendor(): bool
    {
        return $this->user_type === UserType::VENDOR->value;
    }

    /**
     * Check if vendor is approved.
     * 
     * @return bool
     */
    public function isApprovedVendor(): bool
    {
        return $this->isVendor() && $this->kyc?->status === KycStatus::APPROVED->value;
    }

    /**
     * Check if user account is active
     * 
     * @return bool
     */
    public function isActiveUser(): bool
    {
        return $this->is_active && $this->deleted_at === null;
    }

    /**
     * Check if user has verified their email
     * 
     * @return bool
     */
    public function hasVerifiedEmail(): bool
    {
        return parent::hasVerifiedEmail() || $this->email_varified_at !== null;
    }

    /**
     * Check if user has verified their phone.
     * 
     * @return bool
     */
    public function hasVerifiedPhone(): bool
    {
        return $this->phone_verified_at !== null;
    }

    /**
     * Check if user has completed KYC varification.
     * 
     * @return bool
     */
    public function hasCompletedKyc(): bool
    {
        return $this->kyc_verified === true;
    }

    /**
     * Get the user's full avatar URL.
     * 
     * @return string
     */
    public function getAvatarUrlAttributes(): string
    {
        return $this->avatar_path
            ? asset('storage/' . $this->avatar_path)
            : asset('storage/defaults/avatar.png');
    }

    /**
     * Scope query to only customers
     * 
     * @param \Illuminate\Database\Eloquent\Builder<User> $query
     * @param \Illuminate\Database\Eloquent\Builder<User>
     */
    #[Scope]
    public function customers(Builder $query)
    {
        return $query->where('user_type', UserType::CUSTOMER->value);
    }

    /**
     * Scope query to only vendors
     * 
     * @param \Illuminate\Database\Eloquent\Builder<User> $query
     * @return \Illuminate\Database\Eloquent\Builder<User>
     */
    #[Scope]
    public function vendors(Builder $query)
    {
        return $query->where('user_type', UserType::VENDOR->value);
    }

    /**
     * Scope query to only approved vendors.
     * 
     * @param \Illuminate\Database\Eloquent\Builder<User> $query
     * @return \Illuminate\Database\Eloquent\Builder<User>
     */
    #[Scope]
    public function approvedVendors(Builder $query)
    {
        return $query->vendors()->where('status', KycStatus::APPROVED->value);
    }

    /**
     * Scope to only active users.
     * 
     * @param \Illuminate\Database\Eloquent\Builder<User> $query
     * @return \Illuminate\Database\Eloquent\Builder<User>
     */
    #[Scope]
    public function active(Builder $query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('banned_unit')
                    ->orWhere('banned_until', '<', now());
            });
    }

    /**
     * Scope query to only KYC verified users.
     * 
     * @param \Illuminate\Database\Eloquent\Builder<User> $query
     * @return \Illuminate\Database\Eloquent\Builder<User>
     */
    public function scopeKycVerified(Builder $query)
    {
        return $query->where('kyc_verified', true);
    }
}
