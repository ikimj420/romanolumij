<?php

Auth::routes();
//Home
Route::get('/', 'HomeController@index')->name('welcome');
//
Route::get('/index', 'HomeController@indexv');
//History
Route::get('/history', 'HomeController@history')->name('history');
