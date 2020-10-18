<?php

namespace App\Repositories\Admin;

use App\Models\GalleryImage;
use App\Repositories\BaseRepository;

/**
 * Class GalleryImageRepository
 * @package App\Repositories\Admin
 */
class GalleryImageRepository extends BaseRepository
{
    /**
     * GalleryImageRepository constructor.
     * @param GalleryImage $galleryImage
     */
    public function __construct(GalleryImage $galleryImage)
    {
        $this->model = $galleryImage;
    }
}
