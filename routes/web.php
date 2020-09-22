<?php

use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', 'HomeController@index');

Route::get('post/{id}', 'AdminPostsController@post')->name('home.post');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'AdminController@index');

    Route::resource('admin/users', 'AdminUsersController',['names'=>[
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'show' => 'admin.users.show',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit'
    ]]);
    Route::resource('admin/posts', 'AdminPostsController',['names' =>[
        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'show' => 'admin.posts.show',
        'store' => 'admin.posts.store',
        'edit' => 'admin.posts.edit'
    ]]);
    Route::get('admin/posts/{posts}/delete', 'AdminPostsController@destroy')->name('admin.posts.delete');
    Route::resource('admin/categories', 'AdminCategoriesController',['names' =>[
        'index' => 'admin.categories.index',
        'show' => 'admin.categories.show',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit'
    ]]);
    Route::get('admin/categories/{id}/delete', 'AdminCategoriesController@destroy')->name('admin.categories.delete');

    Route::get('admin/media','AdminMediaController@index')->name('admin.media.index');
    Route::get('admin/media/upload', 'AdminMediaController@upload')->name('admin.media.upload');
    Route::post('admin/media','AdminMediaController@store');
    Route::get('admin/media/{id}/delete', 'AdminMediaController@destroy')->name('admin.media.delete');
    Route::delete('admin/delete/media', 'AdminMediaController@deleteMedia');
    
    Route::resource('admin/comments', 'PostCommentsController',['names' =>[
        'index' => 'admin.comments.index',
        'create' => 'admin.comments.create',
        'show' => 'admin.comments.show',
        'store' => 'admin.comments.store',
        'edit' => 'admin.comments.edit'
    ]]);
    Route::resource('admin/comment/replies', 'CommentRepliesController',['names' =>[
        'index' => 'admin.comment.replies.index',
        'create' => 'admin.comment.replies.create',
        'show' => 'admin.comment.replies.show',
        'store' => 'admin.comment.replies.store',
        'edit' => 'admin.comment.replies.edit'
    ]]);
});

Route::group(['middleware'=>'auth'], function () {
    Route::post('comment/reply', 'CommentRepliesController@createReply');
});