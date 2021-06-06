<?php

namespace App\Services\User;

use App\Repositories\User\WomenRepository;
use App\Services\BaseService;
use Illuminate\Support\Collection;

final class WomanService extends BaseService
{
    public function __construct(WomenRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getWoman(array $params): Collection
    {
        return $this->repository->getWoman($params);
    }
}
