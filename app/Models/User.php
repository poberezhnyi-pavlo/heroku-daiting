<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App\Models
 *
 * @property string $role
 * @property string $status
 * @property string $avatar
 * @property string $name
 * @property string $email
 */
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

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

    public const DEFAULT_AVATAR = 'images/user.png';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
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
    public function isSuperAdmin(): bool
    {
        return $this->role === self::ROLE_SUPER_ADMIN;
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
        return !$this->trashed();
    }

    /**
     * @param string $url
     * @return string
     */
    public function getAvatarAttribute($url): string
    {
        return $url ?: self::DEFAULT_AVATAR;
    }
}
