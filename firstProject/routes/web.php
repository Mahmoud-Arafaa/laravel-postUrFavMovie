<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'pageController@index' );
Route::get('/about', 'pageController@about' );
Route::get('/services', 'pageController@services' );

//posts routs 
Route::get('/Posts', 'postController@index')->name('Posts.index');
Route::get('/Posts/create', 'postController@create')->name('Posts.create');

Route::post('/Posts', 'postController@store')->name('Posts.store');
Route::get('/Posts/{id}', 'postController@show')->name('Posts.show');


Route::get('/Posts/{id}/edit', 'postController@edit')->name('Posts.edit');
Route::put('/Posts/{id}', 'postController@update')->name('Posts.update');

Route::delete('/Posts/{id}', 'postController@destroy')->name('Posts.destroy');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
