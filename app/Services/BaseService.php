<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class BaseService
 * @package App\Services
 */
abstract class BaseService
{
    /**
     * @var BaseRepository
     */
    protected $repository;

    /**
     * @return mixed
     */
    public function index() {
        return $this->repository->getAll();
    }

    /**
     * @param Request $request
     * @param Model $model
     * @return bool
     */
    public function saveModel(Request $request, Model $model): bool
    {
        return $this->repository->updateModel($model, $request);
    }
}
