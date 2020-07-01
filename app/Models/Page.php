<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Page
 * @package App\Models
 * @property string title
 * @property string body
 * @property bool published
 * @property string slug
 * @property Carbon created_at
 * @property Carbon edited_at
 */
class Page extends Model
{
    public $fillable = [
        'title',
        'body',
        'published',
        'slug',
    ];

    /**
     * @param string $value
     * @return void
     */
    public function setPublishedAttribute($value): void
    {
        $this->attributes['published'] = $value ? 1 : 0;
    }
}
