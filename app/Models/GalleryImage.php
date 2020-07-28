<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GalleryImage
 * @package App\Models
 * @property int order
 * @property string uri
 * @property int woman_id
 */
class GalleryImage extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'uri',
        'order',
        'woman_id',
    ];
}
