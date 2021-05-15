<?php

namespace App\Services\Admin;

use App\Repositories\Admin\ManRepository;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ManService
 * @package App\Services\Admin
 */
class ManService extends BaseService
{
    /**
     * ManService constructor.
     * @param ManRepository $repository
     */
    public function __construct(ManRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Builder[]|Collection
     */
    public function getAllMen(): Collection
    {
        return $this->repository->getAll();
    }
}
