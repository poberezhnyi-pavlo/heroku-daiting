<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Class Man
 * @package App\Models
 * @property double credits
 */
class Man extends Model
{
    public $fillable = [
        'credits',
    ];

    /**
     * Role relation
     *
     * @return MorphOne
     */
    public function user():MorphOne
    {
        return $this->morphOne(User::class, 'user_type');
    }
}
