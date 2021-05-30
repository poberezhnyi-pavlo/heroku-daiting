<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Messages\ParticipantResource;
use App\Models\User;
use App\Services\User\Messages\ParticipantService;
use Cmgmyr\Messenger\Models\Participant;
use Illuminate\Http\JsonResponse;

class ParticipantController extends BaseController
{
    public function __construct(ParticipantService $service)
    {
        $this->service = $service;
    }

    public function getParticipants(User $user): JsonResponse
    {
        return response()->json(ParticipantResource::collection($this->service->getParticipants($user)));
    }

    public function getParticipant(Participant $participant): JsonResponse
    {
        return response()->json(new ParticipantResource($this->service->getParticipant($participant)));
    }
}
