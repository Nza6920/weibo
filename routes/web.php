<?php

Route::get('/', 'StaticPagesController@home')->name('static.home');
Route::get('/help', 'StaticPagesController@help')->name('static.help');
Route::get('/about', 'StaticPagesController@about')->name('static.about');
