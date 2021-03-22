<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

/**
 * Class Page
 * @package App\Models
 * @property bool published
 * @property string slug
 * @property Carbon created_at
 * @property Carbon edited_at
 */
class Page extends Model implements TranslatableContract
{
    use Translatable;

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
        'published',
        'slug',
    ];

    /**
     * @param string $value
     * @return void
     */
    public function setPublishedAttribute(string $value): void
    {
        $this->attributes['published'] = $value ? 1 : 0;
    }
}
