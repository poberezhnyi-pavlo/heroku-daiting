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
        return response()->view('site.pages.profile.messages.chat');
    }
}
