<?php

namespace App\Http\Resources\Messages;

use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Thread */
class ThreadResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->getKey(),
            'subject' => $this->subject,
            'body' => $this->latestMessage->body,
            'creator' => $this->creator(),
            'created_at' => $this->created_at,
        ];
    }
}
