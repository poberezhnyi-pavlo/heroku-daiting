<?php

namespace App\Http\Resources\Main\Women;

use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

/**
 * Class GiftResource
 * @mixin Gift
 * @package App\Http\Resources\Main\Women
 */
class GiftResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'url' => Storage::disk()->url($this->image),
            'name' => $this->title,
        ];
    }
}
