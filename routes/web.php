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

Route::get('/test', function () {
    return Auth::user()->test();
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function(){

    Route::name('profile_path')->get('/profile/{slug}', 'ProfileController@index');
    Route::name('change_photo_path')->get('/changePhoto', 'ProfileController@changePhoto');
    Route::name('photo_path')->post('/uploadPhoto', 'ProfileController@uploadPhoto');
    Route::name('edit_profile_path')->get('/editProfile', 'ProfileController@EditProfile');
    Route::name('update_profile_path')->post('/updateProfile', 'ProfileController@UpdateProfile');
    Route::name('find_friend_path')->get('/findfriends', 'FriendController@index');
    Route::name('add_friends_path')->get('/addfriend/{id}', 'FriendController@addfriend');
    Route::name('requests_path')->get('/requests', 'FriendController@requests');
    Route::name('accept_friends_path')->get('/acceptfriends/{id}', 'FriendController@acceptfriends');

});

