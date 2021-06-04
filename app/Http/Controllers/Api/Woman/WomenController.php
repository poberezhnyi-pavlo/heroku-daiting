<?php

namespace App\Http\Controllers\Api\Woman;

use App\Http\Controllers\BaseController;
use App\Http\Requests\User\Get\WomenGetScrollRequest;
use App\Http\Resources\Main\Women\WomenScrollResource;
use App\Services\User\WomanService;
use Illuminate\Http\JsonResponse;

class WomenController extends BaseController
{
    public function __construct(WomanService $service)
    {
        $this->service = $service;
    }

    public function getWoman(WomenGetScrollRequest $request): JsonResponse
    {
        return response()->json(WomenScrollResource::collection($this->service->getWoman($request->validated())));
    }
}
