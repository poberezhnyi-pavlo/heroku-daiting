<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Message\CreateMessageRequest;
use App\Http\Resources\Messages\ThreadResource;
use App\Services\Common\Chat\MessageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class MessagesController
 * @package App\Http\Controllers\Common
 */
class MessagesController extends BaseController
{
    /**
     * MessagesController constructor.
     * @param MessageService $messageService
     */
    public function __construct(MessageService $messageService)
    {
        $this->service = $messageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $threads = $this->service->getAll();

        return response()->json(
            ThreadResource::collection($threads)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateMessageRequest $request
     * @return JsonResponse
     */
    public function store(CreateMessageRequest $request): JsonResponse
    {
       return response()->json(
           $this->service->saveMessage($request->all())
       );
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendMessage(SendMessageRequest $request): JsonResponse
    {
        $this->service->sendMessage($request->validated());

        return response()->json();
    }
}
