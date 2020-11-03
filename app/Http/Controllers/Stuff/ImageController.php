<?php

namespace App\Http\Controllers\Stuff;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Image\ImageRequest;
use App\Http\Requests\Image\RemoveImageRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

/**
 * Class ImageController
 * @package App\Http\Controllers\Stuff
 */
class ImageController extends Controller
{
    /**
     * @var ImageHelper
     */
    private ImageHelper $imageHelper;

    /**
     * @var string
     */
    private const PATH = 'images/';

    /**
     * ImageController constructor.
     * @param ImageHelper $imageHelper
     */
    public function __construct(ImageHelper $imageHelper)
    {
        $this->imageHelper = $imageHelper;
    }

    /**
     * @param ImageRequest $request
     * @return JsonResponse
     */
    public function uploadImage(ImageRequest $request): JsonResponse
    {
        /**
         * @var UploadedFile $uploaded
         */
        $uploaded = $request['file-0'];

        $imageName = Str::random(16).'.'.$uploaded->getClientOriginalExtension();

        $uri = $uploaded->storeAs('images', $imageName, [
            'disk' => 'public',
        ]);

        return response()->json([
            'errorMessage' => $uri ? null : 'Something went wrong :(',
            'result' => [
                [
                    'url' => asset('/storage/'.$uri),
                    'name' => $imageName,
                    'size' => $uploaded->getSize()
                ]
            ]
        ]);
    }

    /**
     * @param RemoveImageRequest $request
     * @return bool
     */
    public function deleteImage(RemoveImageRequest $request): bool
    {
//        dd($request->image);
        return $this
            ->imageHelper::removeImage(self::PATH.$request->image);
    }
}
