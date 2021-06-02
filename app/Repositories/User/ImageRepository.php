<?php

namespace App\Repositories\User;

use App\Models\GalleryImage;
use App\Models\Woman;
use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;

class ImageRepository extends BaseRepository
{
    public function __construct(GalleryImage $image)
    {
        $this->model = $image;
    }

    public function getImagesForWoman(int $womanId): Collection
    {
        return $this
            ->model
            ->newQuery()
            ->where('woman_id', $womanId)
            ->join('users', function ($query) {
                $query->on('gallery_images.woman_id', '=', 'users.user_id');
                $query->where('users.user_type', Woman::class);
            })
            ->orderBy('order', 'asc')
            ->select(['gallery_images.id as id', 'gallery_images.uri as uri', 'users.name as woman_name'])
            ->get()
        ;
    }
}
