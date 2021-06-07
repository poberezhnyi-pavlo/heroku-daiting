<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\BaseController;
use App\Models\User;
use App\Services\Common\Chat\MessageService;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class MessageController extends BaseController
{
    public function __construct(MessageService $messageService)
    {
        $this->service = $messageService;
    }

    public function index(): Response
    {
        $threads = $this->service->getAllForMan();

        return response()->view('site.pages.profile.messages.index', ['threads' => $threads]);
    }

    public function chat(): Response
    {
        return response()->view('site.pages.profile.messages.chat');
    }
}
