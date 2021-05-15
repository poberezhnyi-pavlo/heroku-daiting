<?php

namespace App\Services\Common\Chat;

use App\Repositories\Common\Chat\MessageRepository;
use App\Repositories\Common\Chat\ParticipantRepository;
use App\Repositories\Common\Chat\ThreadRepository;
use App\Services\BaseService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class MessageService
 * @package App\Services\Common
 */
class MessageService extends BaseService
{

    private ThreadRepository $threadRepository;
    private ParticipantRepository $participantRepository;

    /**
     * MessageService constructor.
     * @param MessageRepository $repository
     * @param ThreadRepository $threadRepository
     * @param ParticipantRepository $participantRepository
     */
    public function __construct(
        MessageRepository $repository,
        ThreadRepository $threadRepository,
        ParticipantRepository $participantRepository
    ) {
        $this->repository = $repository;
        $this->threadRepository = $threadRepository;
        $this->participantRepository = $participantRepository;
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->threadRepository
            ->getThreads();
    }

    /**
     * @param array $params
     * @return Model
     */
    public function saveMessage(array $params): Model
    {
        $thread = $this->threadRepository->store([
            'subject' => $params['subject'],
        ]);

        // Sender
        $this->participantRepository->store([
            'thread_id' => $thread->getKey(),
            'user_id' => $params['from'],
            'last_read' => new Carbon,
        ]);

        $thread->addParticipant($params['to']);

        //Message
        return $this->repository->store([
            'thread_id' => $thread->getKey(),
            'user_id' => $params['from'], //TODO: WTF?
            'body' => $params['message'],
        ]);
    }
}
