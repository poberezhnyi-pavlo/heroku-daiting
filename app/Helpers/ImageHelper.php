<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Picture;

/**
 * Class ImageHelper
 * @package App\Helpers
 */
final class ImageHelper
{
    /**
     * @param UploadedFile $img
     * @param string $path
     * @return mixed
     */
    public static function storeImage(UploadedFile $img, string $path=''): ?string
    {
        $ext = $img->getClientOriginalExtension();

        return $img->storeAs(
            $path,
            Str::random(16) . '.' . $ext,
            'public'
        );
    }

    /**
     * @param string $imgPath
     * @param string $watermarkPath
     * @return bool
     */
    public static function setImageWatermark(
        string $imgPath,
        string $watermarkPath
    ): bool
    {
        $waterMark = Storage::disk('public')->url($watermarkPath);
        $fullImgPath = Storage::disk('public')->url($imgPath);
        $image = Picture::make($fullImgPath);

        $image->insert($waterMark, 'bottom-right', 5, 5);

        return Storage::disk('public')->put( $imgPath, $image->stream());
    }

    /**
     * @param string $path
     * @param string $disk
     * @return bool
     */
    public static function removeImage(
        string $path,
        string $disk = 'public'
    ): bool
    {
        return Storage::disk($disk)->delete($path);
    }
}
