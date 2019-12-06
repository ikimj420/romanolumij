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
Route::resource('/blog', 'BlogsController');
//Albums
Route::resource('/album', 'AlbumsController');
//Add Image
Route::post('/album/{album}', 'ImagesController@store');
//Images
Route::resource('/image', 'ImagesController');
//Contact Send Mail
Route::get('/contact', 'ContactsController@index');
Route::post('/contact', 'ContactsController@store');
//Show Group Of Tags
Route::get('/tag/tags/{tag}', 'TagsController@index');
//search
Route::get('/search', 'SearchController@index')->name('search');
//showByCategory
Route::get('/album/showByCategory/{album}', 'AlbumsController@showByCategory');
Route::get('/lexicon/showByCategory/{lexicon}', 'LexiconsController@showByCategory');
Route::get('/poem/showByCategory/{poem}', 'PoemsController@showByCategory');
Route::get('/story/showByCategory/{story}', 'StoriesController@showByCategory');



//this link wil add session og lang when they click to change lang
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});
