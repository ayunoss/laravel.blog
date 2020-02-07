<?php
Route::group(['middleware' => 'auth'], function()
{
    Route::get('/add', ['as' => 'addPost', 'uses' => 'PostsController@add']);
    Route::post('/add', ['as' => 'submitPost', 'uses' => 'PostsController@addData']);
    Route::get('/edit/{postId}', ['as' => 'editPost', 'uses' => 'PostsController@edit']);
    Route::get('/edit/{postId}', ['as' => 'editData', 'uses' => 'PostsController@editData']);
});
Route::get('/', 'PostsController@index')->name('index');
Route::get('/posts/{post}', 'PostsController@show')->name('showPost');
//Route::get('/add', 'PostsController@add')->name('addPost');
//Route::post('/add', 'PostsController@addData')->name('submitPost');
//Route::get('/edit/{postId}', 'PostsController@edit')->name('editPost');
//Route::post('/edit/{postId}', 'PostsController@editData')->name('editData');
Route::get('/test', 'PostsController@test');
//Route::any('/add', 'PostsController@add');

//Route::resource('posts', 'PostsController');

Route::get('/contact', 'FeedbackController@index')->name('contact');
Route::post('/contact', 'FeedbackController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/change-language', 'LocalizationController@navPanel')->name('navPanel');
