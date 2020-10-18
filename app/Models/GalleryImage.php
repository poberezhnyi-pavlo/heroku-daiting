<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

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

    /**
     * @param string $uri
     * @return string
     */
    public function getUriAttribute(string $uri): string
    {
        return Storage::url($uri);
    }
}
