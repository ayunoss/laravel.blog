<?php
Route::get('/', 'PostsController@index')->name('index');
Route::get('/posts/{post}', 'PostsController@show')->name('showPost');
Route::get('/add', 'PostsController@add')->name('addPost');
Route::post('/add', 'PostsController@addData')->name('submitPost');
Route::get('/edit/{postId}', 'PostsController@edit')->name('editPost');
Route::post('/edit/{postId}', 'PostsController@editData')->name('editData');
Route::get('/test', 'PostsController@test');
Route::any('/add', 'PostsController@add')->name('postData');

//Route::resource('posts', 'PostsController');

Route::get('/contact', 'FeedbackController@index');
Route::post('/contact', 'FeedbackController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/change-language', 'LocalizationController@navPanel')->name('navPanel');
