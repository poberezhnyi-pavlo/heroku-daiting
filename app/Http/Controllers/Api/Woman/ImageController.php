<?php

namespace App\Http\Controllers\Api\Woman;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Main\Women\ImageResource;
use App\Services\User\ImageService;
use Illuminate\Http\JsonResponse;

class ImageController extends BaseController
{
    public function __construct(ImageService $service)
    {
        $this->service = $service;
    }

    public function getImages(int $womanId): JsonResponse
    {
        return response()->json(ImageResource::collection($this->service->getImages($womanId)));
    }
}
