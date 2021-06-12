<?php

namespace App\Http\Controllers\Api\Woman;

use App\Exceptions\CanPayException;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Gift\GiftSendToWomanRequest;
use App\Http\Resources\Main\Women\GiftResource;
use App\Services\User\Profile\GiftService;
use Illuminate\Http\JsonResponse;

class GiftController extends BaseController
{
    public function __construct(GiftService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json(GiftResource::collection($this->service->getGifts()));
    }

    /**
     * @throws CanPayException
     */
    public function store(GiftSendToWomanRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json();
    }
}
