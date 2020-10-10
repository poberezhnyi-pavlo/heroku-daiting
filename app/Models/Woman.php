<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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
 */
class Woman extends Model
{
    public const EYE_BROWN = 'brown';
    public const EYE_BLUE = 'blue';
    public const EYE_GREEN = 'green';
    public const EYE_HAZEL = 'hazel';
    public const EYE_AMBER = 'amber';
    public const EYE_GREY = 'grey';
    public const EYE_OTHER = 'other';

    /**
     * Eye colors.
     *
     * @var string[]
     */
    public const EYE_COLORS = [
        self::EYE_BROWN,
        self::EYE_BLUE,
        self::EYE_GREEN,
        self::EYE_HAZEL,
        self::EYE_AMBER,
        self::EYE_GREY,
        self::EYE_OTHER,
    ];

    /**
     * Hair colors
     *
     * @var string[]
     */
    public const HAIR_BROWN = 'brown';
    public const HAIR_BLONDE = 'blonde';
    public const HAIR_BLACK = 'black';
    public const HAIR_AUBURN = 'auburn';
    public const HAIR_RED = 'red';
    public const HAIR_GREY = 'grey';
    public const HAIR_WHITE = 'white';
    public const HAIR_OTHER = 'other';

    /**
     * @var string[]
     */
    public const HAIR_COLORS = [
        self::HAIR_BROWN,
        self::HAIR_BLONDE,
        self::HAIR_BLACK,
        self::HAIR_AUBURN,
        self::HAIR_RED,
        self::HAIR_GREY,
        self::HAIR_WHITE,
        self::HAIR_OTHER,
    ];

    /**
     * @var string
     */
    public const IMAGES_PATH = 'women/images';

    public const VIDEOS_PATH = 'women/videos';

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
     * Role relation
     *
     * @return MorphOne
     */
    public function user():MorphOne
    {
        return $this->morphOne(
            User::class,
            'user'
        );
    }

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
     * @param array $langs
     * @return void
     */
    public function setLangsAttribute(array $langs): void
    {
        $this->attributes['langs'] = json_encode($langs);
    }

    /**
     * @param $langs
     * @return false|string
     */
    public function getLangsAttribute(?string $langs)
    {
        return json_decode($langs, true);
    }

    /**
     * @param array $countries
     * @return void
     */
    public function setTravelCountriesAttribute(array $countries): void
    {
        $this->attributes['travel_countries'] = json_encode($countries);
    }

    /**
     * @param $countries
     * @return false|string
     */
    public function getTravelCountriesAttribute(?string $countries)
    {
        return json_decode($countries, true);
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
