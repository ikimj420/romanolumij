<?php

Auth::routes();
//Home
Route::get('/', 'HomeController@index')->name('welcome');
//
Route::get('/index', 'HomeController@indexv');
//History
Route::resource('/history', 'HistoriesController');
//Role
Route::resource('/role', 'RolesController');
//User Level
Route::resource('/userLevel', 'UserLevelsController');
//Category
Route::resource('/category', 'CategoriesController');
//Friend
Route::resource('/friend', 'FriendsController');
//Profile
Route::resource('/profile', 'ProfilesController');
//Poems
Route::resource('/poem', 'PoemsController');
//Story
Route::resource('/story', 'StoriesController');
//Lexicon
Route::resource('/lexicon', 'LexiconsController');
//Albums
Route::resource('/album', 'AlbumsController');
//Add Image
Route::post('/album/{album}', 'ImagesController@store');
//Images
Route::resource('/image', 'ImagesController');




//this link wil add session og lang when they click to change lang
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});
