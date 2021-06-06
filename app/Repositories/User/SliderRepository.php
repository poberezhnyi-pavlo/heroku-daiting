<?php

namespace App\Repositories\User;

use App\Models\Slide;
use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;

final class SliderRepository extends BaseRepository
{
    public function __construct(Slide $slide)
    {
        $this->model = $slide;
    }

    public function getSlides(): Collection
    {
        return Slide::all();
    }
}
