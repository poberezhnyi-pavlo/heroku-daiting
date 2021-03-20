<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SlideTranslation
 * @package App\Models
 */
class SlideTranslation extends Model
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
        'body',
        'slide_id',
    ];

    /**
     * @param string|null $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value === 'null' ? null : $value;
    }

    /**
     * @param string|null $value
     */
    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = $value === 'null' ? null : $value;
    }
}
