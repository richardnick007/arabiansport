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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'PostsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/newpost', 'PostsController@create')->name('newpost');
Route::post('/newpost', 'PostsController@store')->name('store');
Route::get('/postview', 'PostsController@index')->name('postview');
Route::get('/post/{post_id}', 'PostsController@show')->name('post');

// Route::get('/newcomment/{type?}', 'CommentsController@create')->name('newcomment');
Route::get('/newcomment/{type}/{post_id}', 'CommentsController@create')->name('newcomment');
Route::post('/newcomment', 'CommentsController@store')->name('commentstore');
Route::get('/commentview/{type}/{post_id}', 'CommentsController@index')->name('commentview');

Route::get('/like/{post_id}', 'LikesController@like')->name('like');

Route::get('/saved/{post_id}', 'SavedsController@saved')->name('save');
Route::get('/savedpost/{user_id}', 'SavedsController@index')->name('savedposts');
Route::get('/admin/blog');