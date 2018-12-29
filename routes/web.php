<?php

Route::get('/', 'StaticPagesController@home')->name('static.home');
Route::get('/help', 'StaticPagesController@help')->name('static.help');
Route::get('/about', 'StaticPagesController@about')->name('static.about');

Route::get('/signup', 'UsersController@create')->name('signup');
Route::resource('users', 'UsersController');

Route::get('/login', 'SessionsController@create')->name('sessions.login');
Route::post('login', 'SessionsController@store')->name('sessions.login');
Route::delete('logout', 'SessionsController@destroy')->name('sessions.logout');
