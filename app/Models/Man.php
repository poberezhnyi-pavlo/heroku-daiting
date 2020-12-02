<?php

namespace App\Models;

use Carbon\Carbon;

/**
 * Class Man
 * @package App\Models
 *
 * @property double credits
 * @property string country
 * @property string city
 * @property string address
 * @property integer post_index
 * @property Carbon birth_day
 * @property float height
 * @property float weight
 * @property string eye_color
 * @property string hair_color
 * @property string about_myself
 * @property string interests
 * @property string education
 * @property string job
 * @property string creed
 * @property string bad_habits
 * @property string langs
 * @property integer age_of_woman
 * @property integer about_woman
 * @property Carbon created_at
 * @property Carbon edited_at
 * @property Carbon deleted_at
 */
final class Man extends BaseHuman
{
    /**
     * @var string
     */
    protected $table = 'men';

    /**
     * @var string[]
     */
    public $fillable = [
        'country',
        'city',
        'address',
        'post_index',
        'birth_day',
        'height',
        'weight',
        'eye_color',
        'hair_color',
        'about_myself',
        'interests',
        'education',
        'job',
        'creed',
        'bad_habits',
        'langs',
        'age_of_woman',
        'about_woman',
        'credits',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'birth_day' => 'date',
    ];
}
