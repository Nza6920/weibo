<?php

// 静态界面
Route::get('/', 'StaticPagesController@home')->name('static.home');
Route::get('/help', 'StaticPagesController@help')->name('static.help');
Route::get('/about', 'StaticPagesController@about')->name('static.about');

Route::get('/signup', 'UsersController@store')->name('signup');