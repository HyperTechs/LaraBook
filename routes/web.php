<?php

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

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function(){

    Route::name('profile_path')->get('/profile/{slug}', 'ProfileController@index');
    Route::name('change_photo_path')->get('/changePhoto', 'ProfileController@changePhoto');
    Route::name('photo_path')->post('/uploadPhoto', 'ProfileController@uploadPhoto');

});

