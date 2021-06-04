<?php

namespace App\Services\User;

use App\Repositories\User\VideoRepository;
use App\Services\BaseService;
use Illuminate\Support\Collection;

class VideoService extends BaseService
{
    public function __construct(VideoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getVideos(int $womanId): Collection
    {
        return  $this->repository->getVideos($womanId);
    }
}
