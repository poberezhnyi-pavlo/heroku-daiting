<?php

namespace App\Services\User\Messages;

use App\Models\User;
use App\Repositories\Common\Chat\ParticipantRepository;
use App\Services\BaseService;
use Cmgmyr\Messenger\Models\Participant;
use Illuminate\Support\Collection;

final class ParticipantService extends BaseService
{
    public function __construct(ParticipantRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getParticipants(User $user): Collection
    {
        return $this->repository->getParticipants($user);
    }

    public function getParticipant(Participant $participant): Participant
    {
        return $this->repository->getParticipant($participant);
    }
}
