<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Video
 * @package App\Models
 * @property int order
 * @property string youtube_video_id
 * @property int woman_id
 */
class Video extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'order',
        'youtube_video_id',
        'woman_id',
    ];
}
