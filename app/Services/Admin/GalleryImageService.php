<?php

namespace App\Services\Admin;

use App\Helpers\ImageHelper;
use App\Models\GalleryImage;
use App\Repositories\Admin\GalleryImageRepository;
use App\Services\BaseService;
use Illuminate\Support\Collection;

/**
 * Class GalleryImageService
 * @package App\Services\Admin
 */
class GalleryImageService extends BaseService
{
    /**
     * GalleryImageService constructor.
     * @param GalleryImageRepository $imageRepository
     */
    public function __construct(GalleryImageRepository $imageRepository)
    {
        $this->repository = $imageRepository;
    }

    /**
     * @param $data
     * @return Collection
     */
    public function updateOrder($data): Collection
    {
        return collect($data)->each(function ($item, $key) {
            /** @var GalleryImage */
            $model = $this->repository->getById($item['id']);

            return $model->update([
                'order' => $key,
            ]);
        });
    }

    /**
     * @param int $imageId
     * @return bool|null
     */
    public function removeImage(int $imageId): ?bool
    {
        try {
            $image = $this->repository->getById($imageId);
            ImageHelper::removeImage($image->uri);

            return $image->delete();
        } catch (\Exception $e) {
            return false;
        }
    }
}
