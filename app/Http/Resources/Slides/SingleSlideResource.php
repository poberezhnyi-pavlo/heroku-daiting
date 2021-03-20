<?php

namespace App\Http\Resources\Slides;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Storage;

/** @mixin Slide */
class SingleSlideResource extends JsonResource
{
    /**
     * @var array
     */
    private array $translate;

    /**
     * SingleSlideResource constructor.
     * @param $resource
     * @param array $translate
     */
    public function __construct($resource, array $translate)
    {
        parent::__construct($resource);

        $this->resource = $resource;
        $this->translate = $translate;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return array_merge([
            'order' => $this->order,
            'uri' => asset(Storage::url($this->uri)),
        ], $this->translate);
    }
}
