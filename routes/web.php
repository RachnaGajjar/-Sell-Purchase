<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function() 
{

	Route::resource('/books', 'BookController');
	Route::post('/books/sold/{book}', 'BookController@sold')->name('books.sold');
	Route::get('/profile', 'UserController@profile')->name('user.profile');
	Route::post('/profile', 'UserController@saveProfile');
});

Route::get('/search', 'GuestController@search')->name('books.search');
Route::get('/searched-book/{book}', 'GuestController@details')->name('books.details');
Route::get('/user-profile/{user}', 'GuestController@user')->name('user.details');
