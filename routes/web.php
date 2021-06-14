<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'namespace' => 'User',
        'prefix' => LaravelLocalization::setLocale(),
        'where' => [
            'lang' => 'en|es|fr|it',
        ],
        'middleware' => ['localize'],
    ],
    static function () {
        Route::get('/', 'HomeController')->name('user.index');
        Route::get('ladies', 'WomanController@index')->name('user.woman.index');
        Route::get('ladies/{womanId}', 'WomanController@show')->name('user.woman.show');

        Route::get('about', 'PageController@about')->name('user.pages.about');
        Route::get('services', 'PageController@services')->name('user.pages.services');
        Route::get('information', 'PageController@information')->name('user.pages.information');

        Route::namespace('Profile')
            ->prefix('profile')
            ->group(static function() {
                Route::get('login', 'LoginController@showForm')->name('user.profile.showLoginFrom');
                Route::post('login', 'LoginController@login')->name('user.profile.login');

                Route::middleware('auth')
                    ->group(function () {
                        Route::post('logout', 'LogoutController@logout')->name('user.profile.logout');
                        Route::get('messages', 'MessageController@index')->name('user.profile.messages.index');

                        Route::get('/{user}', 'ProfileController@showForm')->name('user.profile.show');
                        Route::post('/{user}/store', 'ProfileController@store')->name('user.profile.store');
                        Route::put('/{user}/update', 'ProfileController@update')->name('user.profile.update');
                    });
            });
    })
;

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

        //Users
        Route::group(['prefix' => 'users'], static function () {
            Route::get('fetch', 'UserController@fetch');
            Route::delete('deactivate/{id}', 'UserController@deactivate')
                ->name('deactivate');
            Route::post('activate/{id}', 'UserController@activate')
                ->name('activate');
            Route::put('updateJson/{id}', 'UserController@updateJson');
        });
        Route::resource('users', 'UserController');
        Route::get('women', 'UserController@womanIndex')
            ->name('admin.woman.index');
        Route::get('men', 'UserController@manIndex')
            ->name('admin.man.index');

        //Settings
        Route::group(['prefix' => 'settings'], static function () {
            Route::get('/', 'SettingController@index')
                ->name('admin.settings.index');
            Route::post('update', 'SettingController@update')
                ->name('admin.settings.update');
        });

        //Homepage
        Route::group(['prefix' => 'homepage'], static function () {
            Route::get('/', 'HomepageController@index')
                ->name('admin.homepage.index');
        });

        //Pages
        Route::resource('pages', 'PageController');

        //Gifts
        Route::resource('gifts', 'GiftController');

        //Messages
        Route::group(['prefix' => 'messages'], static function () {
            Route::get('/', 'MessageController@index')
                ->name('admin.message.index');
        });
    }
);
