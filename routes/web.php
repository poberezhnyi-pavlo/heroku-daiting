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
        'namespace' => 'Admin',
        'middleware' => [
            'auth',
            'can:admin-panel',
        ],
    ],
    static function () {
        Route::get('dashboard', 'DashboardController@dashboard')->name('admin.dashboard');
        Route::get('men', 'DashboardController@men')->name('admin.men');
        Route::get('women', 'DashboardController@women')->name('admin.women');
        Route::get('settings', 'DashboardController@settings')->name('admin.settings');
    }
);
