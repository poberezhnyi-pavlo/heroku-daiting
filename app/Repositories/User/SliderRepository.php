<?php

namespace App\Repositories\User;

use App\Models\Slide;
use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;

class SliderRepository extends BaseRepository
{
    public function __construct(Slide $slide)
    {
        $this->model = $slide;
    }

    public function getSlides(string $lang): Collection
    {
        app()->setLocale($lang);

        return Slide::all();
    }
}
