<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class giftTranslation
 * @package App\Models
 * @property string title
 * @property string description
 */
class GiftTranslation extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'gift_id',
    ];
}
