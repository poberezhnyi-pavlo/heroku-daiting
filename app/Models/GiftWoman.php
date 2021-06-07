<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class GiftWoman
 * @package App\Models
 */
class GiftWoman extends Pivot
{
    protected $fillable = [
        'woman_id',
        'gift_id',
    ];

    protected $table = 'gift_women';
}
