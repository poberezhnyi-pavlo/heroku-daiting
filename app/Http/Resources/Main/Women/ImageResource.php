<?php

namespace App\Http\Resources\Main\Women;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'src' => $this->uri,
            'title' => $this->woman_name,
        ];
    }
}
