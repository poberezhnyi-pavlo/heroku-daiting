<?php

namespace App\Repositories\Admin;

use App\Models\Woman;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\Helpers\ImageHelper;

/**
 * Class WomanRepository
 * @package App\Repositories\Admin
 */
class WomanRepository extends BaseRepository
{
    /** @var VideoRepository $videoRepository */
    protected VideoRepository $videoRepository;

    /**
     * WomanRepository constructor.
     * @param Woman $woman
     * @param VideoRepository $videoRepository
     */
    public function __construct(
        Woman $woman,
        VideoRepository $videoRepository
    )
    {
        $this->model = $woman;
        $this->videoRepository = $videoRepository;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function storeWoman(array $data): Model
    {
        /** @var Woman $woman */
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
                $path = ImageHelper::storeImage($image, Woman::IMAGES_PATH);

                ImageHelper::setImageWatermark(
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

    /**
     * @param array $data
     * @param Woman $woman
     * @return bool
     */
    public function updateWoman(array $data, Woman $woman): bool
    {
        $woman->videos()->delete();

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
                $path = ImageHelper::storeImage($image, Woman::IMAGES_PATH);

                ImageHelper::setImageWatermark(
                    $path,
                    env('WATERMARK_PATH')
                );

                $woman->images()->create([
                    'order' => $key,
                    'uri' => $path,
                ]);
            }
        }

        return $woman->update($data);
    }
}
