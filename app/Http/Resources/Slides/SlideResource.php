<?php

namespace App\Http\Resources\Slides;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Storage;

/** @mixin Slide */
class SlideResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'order' => $this->order,
            'url' => asset(Storage::url($this->uri)),
        ];
    }
}
