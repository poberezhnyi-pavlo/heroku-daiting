<?php

namespace App\Repositories\Admin;

use App\Models\Woman;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

/**
 * Class WomanRepository
 * @package App\Repositories\Admin
 */
class WomanRepository extends BaseRepository
{
    /**
     * WomanRepository constructor.
     * @param Woman $woman
     */
    public function __construct(Woman $woman)
    {
        $this->model = $woman;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function storeWoman(array $data): Model
    {
        $woman = $this->store($data);

        if (Arr::exists($data, 'video')) {
            foreach ($data['video'] as $key=>$video) {
                if (empty($video)) {
                    continue;
                }
                $woman->videos()->create([
                    'order' => $key,
                    'youtube_video_id' => $video,
                ]);
            }
        }

        if (Arr::exists($data, 'image')) {
            foreach ($data['image'] as $key=>$image) {
                $path = $this->storeImage($image, Woman::IMAGES_PATH);

                $this->setImageWatermark(
                    $path,
                    env('WATERMARK_PATH')
                );

                $woman->images()->create([
                    'order' => $key,
                    'uri' => $path,
                ]);
            }
        }

        return $woman;
    }
}
