<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin routes
Route::group(
    [
        'prefix' => 'admin',
        'name' => 'admin',
        'namespace' => 'Admin',
        'middleware' => [
            'auth',
            'can:admin-panel',
        ],
    ],
    static function () {
        Route::get('/', 'DashboardController@index')
            ->name('admin.dashboard');
//        Route::get('men', 'DashboardController@men')->name('admin.men');
//        Route::get('women', 'DashboardController@women')->name('admin.women');

        //Users
        Route::group(['prefix' => 'users'], static function () {
            Route::get('fetch', 'UserController@fetch');
            Route::delete('deactivate/{id}', 'UserController@deactivate');
        });
        Route::resource('users', 'UserController');

        //Settings
        Route::group(['prefix' => 'settings'], static function () {
            Route::get('/', 'SettingController@index')
                ->name('admin.settings.index');
            Route::post('update', 'SettingController@update')
                ->name('admin.settings.update');
        });

        //Pages
        Route::resource('pages', 'PageController');
    }
);
