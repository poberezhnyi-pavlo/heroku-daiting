<?php

namespace App\Services\User\Messages;

use App\Exceptions\CanPayException;
use App\Repositories\Admin\ManRepository;
use App\Repositories\Common\Chat\MessageRepository;
use App\Services\BaseService;
use App\Services\Common\PayService;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Support\Collection;

final class MessageService extends BaseService
{
    private PayService $payService;
    private ManRepository $manRepository;

    public function __construct(
        MessageRepository $repository,
        PayService $payService,
        ManRepository $manRepository
    ) {
        $this->repository = $repository;
        $this->payService = $payService;
        $this->manRepository = $manRepository;
    }

    public function getMessages(Thread $thread): Collection
    {
        return $this->repository->getMessages($thread);
    }

    /**
     * @throws CanPayException
     */
    public function sendMessage(array $message): bool
    {
        $man = $this->manRepository->getMan($message['user_id']);

        if (!$this->payService->canPayMessage($man, $message['body'])) {
             throw new CanPayException();
        }

        if (Message::create($message)) {
            $this->payService->payMessage($man, $message['body']);

            return true;
        }

        return false;
    }
}
