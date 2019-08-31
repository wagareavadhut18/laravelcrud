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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post', 'PostController@index')->name('post');
Route::get('/post/create', 'PostController@create')->name('create-post');
Route::post('/post/store', 'PostController@store')->name('posts-store');
Route::post('/post/destroy/{id}', 'PostController@destroy')->name('posts-destroy');
// Route::get('/post/edit{id}','PostController@edit')->name('posts-edit');
Route::post('/post/update', 'PostController@update')->name('posts-update');
Route::get('/users/profile', 'UserController@showuserdetails')->name('user-profile');
Route::post('/users/updateusername', 'UserController@updateusername')->name('username-update');
Route::get('/blog', 'PostController@showpostsinblog')->name('blog');
Route::get('/blog/post/{id}', 'PostController@showsinglepostinblog')->name('blog-post');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/users', 'AdminController@getUsers')->name('get-users');
Route::get('/userposts/{id}', 'AdminController@getUserposts')->name('get-userposts');





