<?php


Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin', function () {
    return view('admin.index');
});

Route::group(['middleware' => 'admin'], function () {
    
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::get('admin/posts/{posts}/delete', 'AdminPostsController@destroy')->name('admin.posts.delete');
    Route::resource('admin/categories', 'AdminCategoriesController');
    Route::get('admin/categories/{id}/delete', 'AdminCategoriesController@destroy')->name('admin.categories.delete');

    Route::get('admin/media','AdminMediaController@index')->name('admin.media.index');
    Route::get('admin/media/upload', 'AdminMediaController@upload')->name('admin.media.upload');
    Route::post('admin/media','AdminMediaController@store');
    Route::get('admin/media/{id}/delete', 'AdminMediaController@destroy')->name('admin.media.delete');
    
});