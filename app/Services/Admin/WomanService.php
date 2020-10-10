<?php

namespace App\Services\Admin;

use App\Models\Woman;
use App\Repositories\Admin\WomanRepository;
use App\Services\BaseService;

/**
 * Class WomanService
 * @package App\Services\Admin
 */
class WomanService extends BaseService
{
    /**
     * @var WomanRepository
     */
    protected $repository;

    /**
     * WomanService constructor.
     * @param WomanRepository $repository
     */
    public function __construct(WomanRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @param Woman $woman
     * @return mixed
     */
    public function update(array $data, Woman $woman)
    {
        return $this->repository->updateWoman($data, $woman);
    }
}
