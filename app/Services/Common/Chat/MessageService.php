<?php

namespace App\Services\Common\Chat;

use App\Exceptions\CanPayException;
use App\Repositories\Admin\ManRepository;
use App\Repositories\Common\Chat\MessageRepository;
use App\Repositories\Common\Chat\ParticipantRepository;
use App\Repositories\Common\Chat\ThreadRepository;
use App\Services\BaseService;
use App\Services\Common\PayService;
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
    private ManRepository $manRepository;
    private PayService $payService;

    /**
     * MessageService constructor.
     *
     * @param MessageRepository $repository
     * @param ThreadRepository $threadRepository
     * @param ParticipantRepository $participantRepository
     * @param ManRepository $manRepository
     * @param PayService $payService
     */
    public function __construct(
        MessageRepository $repository,
        ThreadRepository $threadRepository,
        ParticipantRepository $participantRepository,
        ManRepository $manRepository,
        PayService $payService
    ) {
        $this->repository = $repository;
        $this->threadRepository = $threadRepository;
        $this->participantRepository = $participantRepository;
        $this->manRepository = $manRepository;
        $this->payService = $payService;
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
     *
     * @return Model
     * @throws CanPayException
     */
    public function saveMessage(array $params): Model
    {
        $man = $this->manRepository->getById($params['from']);

        if (!$this->payService->canPayMessage($man, $params['subject'])) {
            throw new CanPayException();
        }

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
