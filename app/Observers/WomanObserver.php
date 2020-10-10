<?php

namespace App\Observers;

use App\Helpers\ImageHelper;
use App\Models\GalleryImage;
use App\Models\Woman;
use Log;

class WomanObserver
{
    /**
     * Handle the woman "created" event.
     *
     * @param  Woman  $woman
     * @return void
     */
    public function created(Woman $woman)
    {
        //
    }

    /**
     * Handle the woman "updated" event.
     *
     * @param  Woman  $woman
     * @return void
     */
    public function updated(Woman $woman)
    {
        //
    }

    /**
     * Handle the woman "deleted" event.
     *
     * @param  Woman  $woman
     * @return void
     */
    public function deleted(Woman $woman): void
    {
        $woman->images->each(static function (GalleryImage $image) {
            return ImageHelper::removeImage($image->uri);
        });
    }

    /**
     * Handle the woman "restored" event.
     *
     * @param  Woman  $woman
     * @return void
     */
    public function restored(Woman $woman)
    {
        //
    }

    /**
     * Handle the woman "force deleted" event.
     *
     * @param  Woman  $woman
     * @return void
     */
    public function forceDeleted(Woman $woman)
    {
        dd('forceDeleted Woman');
    }
}
