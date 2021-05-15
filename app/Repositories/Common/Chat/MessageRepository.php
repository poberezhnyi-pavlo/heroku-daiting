<?php

namespace App\Repositories\Common\Chat;

use App\Repositories\BaseRepository;
use Cmgmyr\Messenger\Models\Message;

/**
 * Class MessageRepository
 * @package App\Repositories\Common
 */
class MessageRepository extends BaseRepository
{
    /**
     * MessageRepository constructor.
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->model = $message;
;    }
}
