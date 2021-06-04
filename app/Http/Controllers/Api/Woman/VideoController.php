<?php

namespace App\Http\Controllers\Api\Woman;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Main\Women\VideoResource;
use App\Services\User\VideoService;
use Illuminate\Http\JsonResponse;

class VideoController extends BaseController
{
    public function __construct(VideoService $service)
    {
        $this->service = $service;
    }

    public function getVideos(int $womanId): JsonResponse
    {
        return response()->json(VideoResource::collection($this->service->getVideos($womanId)));
    }
}
