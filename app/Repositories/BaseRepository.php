<?php

namespace App\Repositories;

use App\Models\Woman;
use App\Traits\VueTableRepositoryTrait;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Picture;
use Intervention\Image\Image;

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
    public function forceDestroy($id): ?bool
    {
        return $this->model
            ->withTrashed()
            ->find($id)
            ->forceDelete();
    }

    /**
     * Restore Model
     *
     * @param int $id
     * @return mixed
     */
    public function restore($id)
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

    /**
     * @param UploadedFile $img
     * @param string $path
     * @return mixed
     */
    public function storeImage(UploadedFile $img, string $path=''): ?string
    {
        $ext = $img->getClientOriginalExtension();

        return $img->storeAs(
            $path,
            Str::random(16) . '.' . $ext,
            'public'
        );
    }

    /**
     * @param string $imgPath
     * @param string $watermarkPath
     * @return bool
     */
    protected function setImageWatermark(string $imgPath, string $watermarkPath): bool
    {
        $waterMark = Storage::disk('public')->url($watermarkPath);
        $fullImgPath = Storage::disk('public')->url($imgPath);
        $image = Picture::make($fullImgPath);

        $image->insert($waterMark, 'bottom-right', 5, 5);

        return Storage::disk('public')->put( $imgPath, $image->stream());
    }
}
