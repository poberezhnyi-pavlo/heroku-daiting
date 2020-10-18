<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\ImageOrderRequest;
use App\Services\Admin\GalleryImageService;
use Illuminate\Support\Collection;

/**
 * Class GalleryImageController
 * @package App\Http\Controllers\Admin
 */
class GalleryImageController extends BaseController
{
    /**
     * GalleryImageController constructor.
     * @param GalleryImageService $imageService
     */
    public function __construct(GalleryImageService $imageService)
    {
        $this->service = $imageService;
    }

    /**
     * @param ImageOrderRequest $request
     * @return Collection
     */
    public function changeOrder(ImageOrderRequest $request): Collection
    {
        return $this->service->updateOrder($request->all());
    }

    /**
     * @param int $image
     * @return bool|null
     */
    public function removeImage(int $image): ?bool
    {
        return $this->service->removeImage($image);
    }
}
