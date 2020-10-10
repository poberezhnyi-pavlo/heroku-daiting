<?php

namespace App\Repositories\Admin;

use App\Models\Video;
use App\Repositories\BaseRepository;

/**
 * Class VideoRepository
 * @package App\Repositories\Admin
 */
class VideoRepository extends BaseRepository
{
    /**
     * VideoRepository constructor.
     * @param Video $video
     */
    public function __construct(Video $video)
    {
        $this->model = $video;
    }

    /**
     * @param int $order
     * @param string $video
     * @return Video
     */
    public function createVideo(int $order, string $video): Video
    {
        return $this->model::create([
            'order' => $order,
            'youtube_video_id' => $video,
        ]);
    }
}
