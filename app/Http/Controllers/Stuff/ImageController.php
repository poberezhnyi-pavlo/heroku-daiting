<?php

namespace App\Http\Controllers\Stuff;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
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
     * @param UploadedFile $image
     */
    public function deleteImage(UploadedFile $image): UploadedFile
    {

    }
}
