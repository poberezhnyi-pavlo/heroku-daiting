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
        Route::post('uploadImage', 'ImageController@uploadImage');
        Route::delete('deleteImage', 'ImageController@deleteImage');
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
        //Slides
        Route::put('slides/changeOrder', 'Admin\SlidesController@changeOrder');
        Route::resource('slides', 'Admin\SlidesController');
    }
);

Route::group([
    'prefix' => 'common',
//        'middleware' => [
//            'auth',
//        ],
],
    static function () {
        //Messages
        Route::resource('messages', 'Common\MessagesController');
    }
);

Route::namespace('Api')
    ->group(function () {
        Route::prefix('messages')
            ->group(function () {
                Route::get('{user}/participants', 'ParticipantController@getParticipants');
                Route::get('participants/{participant}', 'ParticipantController@getParticipant');

                Route::get('/{thread}', 'MessageController@getMessages');
                Route::post('send', 'MessageController@sendMessage');
            })
        ;

        Route::prefix('woman')
            ->namespace('Woman')
            ->group(function () {
                Route::get('/scroll', 'WomenController@getWoman');
                Route::get('{womanId}/images', 'ImageController@getImages');
                Route::get('{womanId}/videos', 'VideoController@getVideos');

                Route::get('/gifts', 'GiftController@index');
                Route::post('/gifts', 'GiftController@store');
            })
        ;
    })
;
