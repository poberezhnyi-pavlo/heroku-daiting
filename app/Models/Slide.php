<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Slide
 * @package App\Models
 * @property int order
 * @property string uri
 */
class Slide extends Model implements TranslatableContract
{
    use Translatable;

    /** @var string */
    public const SLIDE_PATH = 'homeSlides';

    /**
     * @var string[]
     */
    public array $translatedAttributes = [
        'title',
        'body',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'uri',
        'order',
    ];

    protected static function boot(): void
    {
        parent::boot();

        // Order by 'order' ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('order', 'asc');
        });
    }
}
