<?php

namespace App\Services\User\Messages;

use App\Repositories\Common\Chat\MessageRepository;
use App\Services\BaseService;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Support\Collection;

final class MessageService extends BaseService
{
    public function __construct(MessageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getMessages(Thread $thread): Collection
    {
        return $this->repository->getMessages($thread);
    }

    public function sendMessage(array $message): bool
    {
        if (Message::create($message)) {
            return true;
        }

        return false;
    }
}
