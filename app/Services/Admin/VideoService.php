<?php

namespace App\Services\Admin;

use App\Repositories\Admin\VideoRepository;
use App\Services\BaseService;

/**
 * Class VideoService
 * @package App\Services\Admin
 */
class VideoService extends BaseService
{
    /**
     * VideoService constructor.
     * @param VideoRepository $videoRepository
     */
    public function __construct(VideoRepository $videoRepository)
    {
        $this->repository = $videoRepository;
    }
}
