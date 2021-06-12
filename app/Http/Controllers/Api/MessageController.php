<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\CanPayException;
use App\Http\Requests\Message\SendMessageRequest;
use App\Http\Resources\Messages\MessagesResource;
use App\Services\BaseService;
use App\Services\User\Messages\MessageService;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Http\JsonResponse;

class MessageController extends BaseService
{
    private MessageService $service;

    public function __construct(MessageService $service)
    {
        $this->service = $service;
    }

    public function getMessages(Thread $thread): JsonResponse
    {
        return response()->json(MessagesResource::collection($this->service->getMessages($thread)));
    }

    /**
     * @throws CanPayException
     */
    public function sendMessage(SendMessageRequest $request): JsonResponse
    {
        $this->service->sendMessage($request->validated());

        return response()->json();
    }
}
