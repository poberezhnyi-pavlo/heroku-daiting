<?php

namespace App\Repositories\Admin;

use App\Models\Slide;
use App\Repositories\BaseRepository;

/**
 * Class HomePageSlideRepository
 * @package App\Repositories\Admin
 */
class HomePageSlideRepository extends BaseRepository
{
    /**
     * HomePageSlideRepository constructor.
     * @param Slide $slide
     */
    public function __construct(Slide $slide)
    {
        $this->model = $slide;
    }

    /**
     * @return int|null
     */
    public function getMaxOrderValue(): ?int
    {
        return $this->model::max('order');
    }

    /**
     * @param Slide $slide
     * @return array
     */
    public function getTranslatedSlide(Slide $slide): array
    {
        return $slide->getTranslationsArray();
    }
}
