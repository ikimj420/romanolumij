<?php

Auth::routes();
//Home
Route::get('/', 'HomeController@index')->name('welcome');
//
Route::get('/index', 'HomeController@indexv');
//History
Route::resource('/history', 'HistoriesController');
//User Level
Route::resource('/role', 'RolesController');



//this link wil add session og lang when they click to change lang
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});
