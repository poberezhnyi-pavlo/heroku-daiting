<?php

namespace App\Repositories\User;

use App\Models\Video;
use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;

class VideoRepository extends BaseRepository
{
    public function __construct(Video $model)
    {
        $this->model = $model;
    }

    public function getVideos(int $womanId): Collection
    {
        return $this
            ->model
            ->where('woman_id', $womanId)
            ->orderBy('order', 'asc')
            ->get()
        ;
    }
}
