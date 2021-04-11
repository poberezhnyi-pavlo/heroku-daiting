<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gift
 * @package App\Models
 * @property string image
 * @property float price
 * @property Carbon created_at
 * @property Carbon edited_at
 * @property Carbon deleted_at
 *
 * Relations
 * @property Collection women
 */
class Gift extends Model implements TranslatableContract
{
    use Translatable;
    use SoftDeletes;

    public const GIFT_IMG_PATH = 'gifts';

    /**
     * @var string[]
     */
    public array $translatedAttributes = [
        'title',
        'description',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'image',
        'price',
        'deleted_at',
    ];

    /**
     * @return HasManyThrough
     */
    public function women(): HasManyThrough
    {
        return $this->hasManyThrough(
            Woman::class,
            GiftWoman::class,
        );
    }
}
