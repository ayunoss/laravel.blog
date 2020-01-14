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

Route::get('/', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/add', 'PostsController@add')->name('addPost');
Route::post('/add', 'PostsController@addData')->name('submitPost');
Route::get('/test', 'PostsController@test');
//Route::any('/add', 'PostsController@add')->name('postData');
Route::get('/contact', 'FeedbackController@index');
Route::post('/contact', 'FeedbackController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
