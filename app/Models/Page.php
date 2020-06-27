<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Page
 * @package App\Models
 * @property string title
 * @property string body
 * @property int order
 * @property bool show_in_menu
 * @property bool published
 * @property string slug
 */
class Page extends Model
{
    public $fillable = [
        'title',
        'body',
        'published',
        'slug',
    ];
}
