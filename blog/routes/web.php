<?php
Route::group(['middleware' => 'auth'], function()
{
    Route::get('/add', ['as' => 'addPost', 'uses' => 'PostsController@add']);
    Route::post('/add', ['as' => 'submitPost', 'uses' => 'PostsController@addData']);
    Route::get('/edit/{postId}', ['as' => 'editPost', 'uses' => 'PostsController@edit']);
    Route::post('/edit/{postId}', ['as' => 'editData', 'uses' => 'PostsController@editData']);
    Route::get('/delete/{postId}', ['as' => 'deletePost', 'uses' => 'PostsController@delete']);
    Route::post('/posts/{post}/comments', ['as' => 'addComment', 'uses' => 'CommentsController@store']);
    Route::post('/posts/{post}/comments_reply', ['as' => 'replyToComment', 'uses' => 'CommentsController@reply']);
    Route::post('/posts/{post}/delete_comment', ['as' => 'deleteComment', 'uses' => 'CommentsController@delete']);
    Route::get('/upload_avatar', ['as' => 'avatarForm', 'uses' => 'HomeController@uploadAvatar']);
    Route::post('/upload_avatar', ['as' => 'addAvatar', 'uses' => 'HomeController@addAvatar']);
    Route::get('/home/upload_userinfo', ['as' => 'infoForm', 'uses' => 'HomeController@uploadInfo']);
    Route::post('/home/upload_userinfo', ['as' => 'addInfo', 'uses' => 'HomeController@addInfo']);
    Route::get('/home/edit_userinfo', ['as' => 'infoFormEdit', 'uses' => 'HomeController@editInfoForm']);
    Route::post('/home/edit_userinfo', ['as' => 'editInfo', 'uses' => 'HomeController@editInfo']);
    Route::get('/delete_avatar', ['as' => 'deleteAvatar', 'uses' => 'HomeController@deleteAvatar']);
});

Route::get('/', 'PostsController@index')->name('index');
Route::get('/posts/{post}', 'PostsController@show')->name('showPost');
Route::get('/posts/tags/{tag}', 'TagsController@index')->name('showByTag');

//Route::get('/add', 'PostsController@add')->name('addPost');
//Route::post('/add', 'PostsController@addData')->name('submitPost');
//Route::get('/edit/{postId}', 'PostsController@edit')->name('editPost');
//Route::post('/edit/{postId}', 'PostsController@editData')->name('editData');
Route::get('/test', 'TagsController@index');
//Route::any('/add', 'PostsController@add');

//Route::resource('posts', 'PostsController');

Route::get('/contact', 'FeedbackController@index')->name('contact');
Route::post('/contact', 'FeedbackController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/change-language', 'LocalizationController@navPanel')->name('navPanel');
