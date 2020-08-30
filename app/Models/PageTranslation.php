<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PageTranslation
 * @package App\Models
 * @property string title
 * @property string body
 */
class PageTranslation extends Model
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
        'page_id',
    ];
}
