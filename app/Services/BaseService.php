<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Exception;

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
     * @param bool $withTrashed
     * @return mixed
     */
    public function index(bool $withTrashed = false) {
        return $this->repository->getAll($withTrashed);
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

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function updateWhere(array $data, int $id): bool
    {
        return $this->repository
            ->updateModelWhere(
                $data,
                [
                    'id' => $id,
                ],
            );
    }

    /**
     * @param int $id
     * @return bool|null
     * @throws Exception
     */
    public function disable($id): ?bool
    {
        return $this->repository->remove($id);
    }

    /**
     * @param $id
     * @return bool|null
     * @throws Exception
     */
    public function remove($id): ?bool
    {
        return $this->repository->forceDestroy($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function restore($id)
    {
        return $this->repository->restore($id);
    }

    /**
     * @param int $id
     * @param bool $trashed
     * @return mixed
     */
    public function getItem(int $id, bool $trashed = false)
    {
        return $this->repository->getById($id, $trashed);
    }
}
