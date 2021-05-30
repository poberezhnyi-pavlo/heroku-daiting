<?php

namespace App\Repositories\Common\Chat;

use App\Models\User;
use App\Repositories\BaseRepository;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Support\Collection;

/**
 * Class ParticipantRepository
 * @package App\Repositories\Common\Chat
 */
class ParticipantRepository extends BaseRepository
{
    /**
     * ParticipantRepository constructor.
     * @param Participant $participant
     */
    public function __construct(Participant $participant)
    {
        $this->model = $participant;
    }

    public function getParticipants(User $user): Collection
    {
         $threads = $user->threads;
         $threadIds = $threads->pluck('id')->values();

         return Participant::query()
             ->whereIn('thread_id', $threadIds)
             ->where('user_id', '<>', $user->getKey())
             ->get()
         ;
    }

    public function getParticipant(Participant $participant): Participant
    {
        return $participant->load(['user']);
    }

}
