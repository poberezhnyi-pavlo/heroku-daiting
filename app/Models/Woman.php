<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Woman extends Model
{
    /**
     * Role relation
     *
     * @return MorphOne
     */
    public function user():MorphOne
    {
        return $this->morphOne(User::class, 'role');
    }
}
