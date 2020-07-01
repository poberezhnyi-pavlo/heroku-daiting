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
    public function remove($id): ?bool
    {
        return $this->model->destroy($id);
    }

    /**
     * Permanently Deleting Model
     *
     * @param int $id
     * @return bool|null
     */
    public function forceDestroy($id)
    {
        return $this->model->forceDelete($id);
    }

    /**
     * Restore Model
     *
     * @param int $id
     * @return mixed
     */
    public function restore($id)
    {
        return $this->model->restore($id);
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

        return $q->first();
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
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->get();
    }

    /**
     * @param array $data
     * @param array $where
     * @return bool
     */
    public function updateModelWhere(array $data, array $where = []): bool
    {
        return $this->model->where($where)->update($data);
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

}
