<?php

namespace App\Repositories\Common\Chat;

use App\Models\User;
use App\Models\Woman;
use App\Repositories\BaseRepository;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;

/**
 * Class ThreadRepository
 * @package App\Repositories\Common
 */
class ThreadRepository extends BaseRepository
{
    /**
     * ThreadRepository constructor.
     * @param Thread $thread
     */
    public function __construct(Thread $thread)
    {
        $this->model = $thread;
    }

    /**
     * @return Collection
     */
    public function getThreads(): Collection
    {
        return $this->model
            ::getAllLatest()
            ->get();
    }

    public function getThreadsForMan(User $user): Collection
    {
        return Thread::forUser($user->getKey())
            ->get()
        ;
    }
}
