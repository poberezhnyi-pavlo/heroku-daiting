<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App\Models
 *
 * @property string $role
 * @property string $status
 */
class User extends Authenticatable
{
    use Notifiable;

    public const ROLE_SUPER_ADMIN = 'superAdmin';
    public const ROLE_ADMIN = 'admin';
    public const ROLE_EDITOR = 'editor';
    public const ROLE_MAN = 'man';
    public const ROLE_WOMAN = 'woman';
    public const ROLES = [
        self::ROLE_SUPER_ADMIN,
        self::ROLE_ADMIN,
        self::ROLE_EDITOR,
        self::ROLE_MAN,
        self::ROLE_WOMAN,
    ];

    public const STATUS_ACTIVE = 'active';
    public const STATUS_UN_ACTIVE = 'unActive';
    public const STATUS = [
        self::STATUS_ACTIVE,
        self::STATUS_UN_ACTIVE,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Role relation
     *
     * @return MorphTo
     */
    public function userType(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return bool
     */
    public function isEditor(): bool
    {
        return $this->role === self::ROLE_EDITOR;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    /**
     * @return bool
     */
    public function isMan(): bool
    {
        return $this->role === self::ROLE_MAN;
    }

    /**
     * @return bool
     */
    public function isWoman(): bool
    {
        return $this->role === self::ROLE_WOMAN;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }
}
