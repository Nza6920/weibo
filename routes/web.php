<?php

Route::get('/', 'StaticPagesController@home')->name('static.home');
Route::get('/help', 'StaticPagesController@help')->name('static.help');
Route::get('/about', 'StaticPagesController@about')->name('static.about');

Route::get('/signup', 'UsersController@create')->name('signup');
Route::resource('users', 'UsersController');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');

Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');
