<?php

namespace App\Services\User;

use App\Repositories\User\SliderRepository;
use App\Services\BaseService;
use Illuminate\Support\Collection;

final class SliderService extends BaseService
{
    public function __construct(SliderRepository $sliderRepository)
    {
        $this->repository = $sliderRepository;
    }

    public function getAll(): Collection
    {
        return $this->repository->getSlides();
    }
}
