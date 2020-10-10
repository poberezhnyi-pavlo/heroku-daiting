<?php

namespace App\Repositories;

use App\Traits\VueTableRepositoryTrait;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Class BaseRepository
 * @package App\Repositories
 */
abstract class BaseRepository
{
    use VueTableRepositoryTrait;

    /**
     * @var Model
     */
    public $model;

    /**
     * @param int $id
     * @return bool|null
     * @throws Exception
     */
    public function remove(int $id): ?bool
    {
        return $this->model->destroy($id);
    }

    /**
     * Permanently Deleting Model
     *
     * @param int $id
     * @return bool|null
     */
    public function forceDestroy(int $id): ?bool
    {
        $model = $this->model::withTrashed()->findOrFail($id);
        if(!$model->trashed()){
            return $model->delete();
        }

        return $model->forceDelete();
    }

    /**
     * @param Model $model
     * @return bool|null
     * @throws Exception
     */
    public function forceDestroyByModel(Model $model): ?bool
    {
        if(!$model->trashed()){
            return $model->delete();
        }

        return $model->forceDelete();
    }

    /**
     * Restore Model
     *
     * @param int $id
     * @return mixed
     */
    public function restore(int $id)
    {
        return $this->model
            ->withTrashed()
            ->find($id)
            ->restore();
    }

    /**
     * @param array $where
     * @return mixed
     */
    public function geCount(array $where = [])
    {
        return $this->model
            ->where($where)
            ->withTrashed()
            ->count();
    }

    /**
     * @param array $data
     * @param array $where
     * @return bool
     */
    public function updateModelWhere(array $data, array $where): bool
    {
        return $this->model
            ->withTrashed()
            ->where($where)
            ->update($data);
    }

    /**
     * @param Model $model
     * @param Request $request
     * @return bool
     */
    public function updateModel(Model $model, Request $request): bool
    {
        return $model->update($request->all());
    }

    /**
     * @param array $collection
     * @return Collection
     */
    public function massUpdate(array $collection): Collection
    {
        return collect($collection)->each(function ($item) {
            return $this->updateModelWhere($item, [
                'id' =>$item['id'],
            ]);
        });
    }

    /**
     * @param array $where
     * @return mixed
     */
    public function getOneModelWhere(array $where = [])
    {
        return $this->model->firstWhere($where);
    }

    /**
     * @param int $id
     * @param bool $trashed
     * @return mixed
     */
    public function getById(int $id, bool $trashed = false)
    {
        $q = $this->model->where('id' , $id);

        if ($trashed) {
            $q->withTrashed();
        }

        return $q->firstOrFail();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->get();
    }

    /**
     * @param array $fields
     * @return Model
     */
    public function store(array $fields): Model
    {
        return $this->model->create($fields);
    }
}
