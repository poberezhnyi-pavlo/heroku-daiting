<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        return $this->morphOne(User::class, 'user_type');
    }

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(GalleryImage::class);
    }
}
