<?php

namespace App\Repositories\Common\Chat;

use App\Repositories\BaseRepository;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Support\Collection;

final class MessageRepository extends BaseRepository
{
    public function __construct(Message $message)
    {
        $this->model = $message;
    }

    public function getMessages(Thread $thread): Collection
    {
        return $this
            ->model
            ->where('thread_id', $thread->getKey())
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get()
        ;
    }
}
