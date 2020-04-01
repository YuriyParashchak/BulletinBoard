<?php

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

Auth::routes(['reset' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::put('profile/update', 'ProfileController@update')->name('profile.update');
    Route::get('cabinet', 'CabinetController@index')->name('cabinet');
    Route::post('post/store', 'PostController@store')->name('post.store');
});
