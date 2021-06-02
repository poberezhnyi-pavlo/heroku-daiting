<?php

namespace App\Services\User;

use App\Repositories\User\ImageRepository;
use App\Services\BaseService;
use Illuminate\Support\Collection;

class ImageService extends BaseService
{
    public function __construct(ImageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getImages(int $womanId): Collection
    {
        return $this->repository->getImagesForWoman($womanId);
    }
}
