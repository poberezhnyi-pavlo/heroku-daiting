<?php

namespace App\Models;

use Carbon\Carbon;
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
 * @property string vizes
 * @property string creed
 * @property string bad_habits
 * @property string ideal_man
 * @property string about_myself
 * @property string city
 * @property string video_url
 * @property bool is_show_in_gallery
 * @property Carbon created_at
 * @property Carbon edited_at
 * @property Carbon deleted_at
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
     * @var array
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
     * @var array
     */
    public const HAIR_BROWN = 'brown';
    public const HAIR_BLONDE = 'blonde';
    public const HAIR_BLACK = 'black';
    public const HAIR_AUBURN = 'auburn';
    public const HAIR_RED = 'red';
    public const HAIR_GREY = 'grey';
    public const HAIR_WHITE = 'white';
    public const HAIR_OTHER = 'other';

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
        'vizes',
        'creed',
        'bad_habits',
        'ideal_man',
        'about_myself',
        'city',
        'video_url',
        'is_show_in_gallery',
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
        return $this->hasMany(GalleryImage::class);
    }
}
