<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'admins';

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
        'is_super_admin',
        'last_login_at',
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
            'is_super_admin' => 'boolean',
            'last_login_at' => 'datetime',
        ];
    }

    /**
     * Get KYC verified by this admin.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Kyc>
     */
    public function verifiedKycs(): HasMany
    {
        return $this->hasMany(Kyc::class, 'verified_by');
    }

    /**
     * Check if admin is a super admin
     * 
     * @return bool
     */
    public function isSuperAdmin(): bool
    {
        return $this->is_super_admin === true;
    }

    /**
     * Get the admin's full avatar URL
     * 
     * @return string
     */
    public function getAvatarUrlAttribute(): string
    {
        return $this->avatar_path
            ? asset('storage/' . $this->avatar_path)
            : asset('storage/defaults/avatar.png');
    }

    /**
     * Scope query to only super admins
     * 
     * @param \Illuminate\Database\Eloquent\Builder<Admin> $query
     * @param \Illuminate\Database\Eloquent\Builder<Admin>
     */
    #[Scope]
    public function superAdmins($query)
    {
        return $query->where('is_super_admin', true);
    }
}
