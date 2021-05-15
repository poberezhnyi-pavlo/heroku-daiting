<?php

namespace App\Repositories\Common\Chat;

use App\Repositories\BaseRepository;
use Cmgmyr\Messenger\Models\Participant;

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
}
