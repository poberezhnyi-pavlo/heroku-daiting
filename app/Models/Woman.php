<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * Class Woman
 * @package App\Models
 * @property Carbon birth_date
 * @property int amount_of_children
 * @property int height
 * @property float weight
 * @property string eye_color
 * @property string hair_color
 * @property string education
 * @property string langs
 * @property string job
 * @property string travel_countries
 * @property string vises
 * @property string creed
 * @property string bad_habits
 * @property string ideal_man
 * @property string about_myself
 * @property string city
 * @property bool is_show_in_gallery
 * @property Carbon created_at
 * @property Carbon edited_at
 * @property Carbon deleted_at
 *
 * Relations
 * @property Collection images
 * @property Collection videos
 * @property Collection gifts
 */
final class Woman extends BaseHuman
{
    /** @var string IMAGES_PATH */
    public const IMAGES_PATH = 'women/images';

    /** @var string VIDEOS_PATH */
    public const VIDEOS_PATH = 'women/videos';

    /**
     * @var string
     */
    protected $table = 'women';

    /**
     * @var string[]
     */
    public $fillable = [
        'birth_date',
        'amount_of_children',
        'height',
        'weight',
        'eye_color',
        'hair_color',
        'education',
        'langs',
        'job',
        'travel_countries',
        'vises',
        'creed',
        'bad_habits',
        'ideal_man',
        'about_myself',
        'city',
        'is_show_in_gallery',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'birth_date' => 'date',
    ];

    /**
     * @var string[]
     */
    protected $with = [
        'videos',
        'images',
    ];

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(GalleryImage::class)
            ->orderBy('order');
    }

    /**
     * @return HasMany
     */
    public function videos(): HasMany
    {
        return $this
            ->hasMany(Video::class)
            ->orderBy('order');
    }

    /**
     * @return HasManyThrough
     */
    public function gifts(): HasManyThrough
    {
        return $this->hasManyThrough(
            Gift::class,
            GiftWoman::class
        );
    }

    /**
     * @param array $countries
     * @return void
     * @throws \JsonException
     */
    public function setTravelCountriesAttribute(array $countries): void
    {
        $this->attributes['travel_countries'] = json_encode($countries, JSON_THROW_ON_ERROR);
    }

    /**
     * @param $countries
     * @return false|string
     * @throws \JsonException
     */
    public function getTravelCountriesAttribute(?string $countries)
    {
        return json_decode($countries, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @param $value
     * @return void
     */
    public function setIsShowInGalleryAttribute($value): void
    {
        $this->attributes['is_show_in_gallery'] = !empty($value);
    }
}
