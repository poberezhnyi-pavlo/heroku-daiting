<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', static function (Request $request) {
    return $request->user();
});

Route::group(
    [
        'prefix' => 'stuff',
        'name' => 'stuff',
        'namespace' => 'Stuff',
//        'middleware' => [ //TODO: resolve middleware
//            'auth',
//            'can:admin-panel',
//        ],
    ],
    static function () {
        Route::middleware('optimizeImages')->group(static function () {
            // all images will be optimized automatically
            Route::post('uploadImage', 'ImageController@uploadImage');
        });
        Route::post('deleteImage', 'ImageController@deleteImage');
    }
);

Route::group([
        'prefix' => 'admin',
//        'middleware' => [
//            'auth',
//            'can:admin-panel',
//        ],
    ],
    static function () {
        Route::put('changeImageOrder', 'Admin\GalleryImageController@changeOrder');
        Route::delete('removeImage/{id}', 'Admin\GalleryImageController@removeImage');
    }
);
