<?php

use App\Http\Controllers\EcommerceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'EcommerceController@index')->name('home');
Route::get('/create', 'BookController@index')->name('create');              // create book
Route::get('/createGenre', 'GenreController@index')->name('createG');              // create genre

Route::post('/create', 'BookController@store')->name('store');              // add book to db
Route::post('/createGenre', 'GenreController@store')->name('storeG');       // add genre to db

Route::get('/genres', 'GenreController@index')->name('genres');    // genres page

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('/admin/users','Admin\UsersController',['except' => ['show','create', 'store']]);

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/users','UsersController',['except' => ['show','create', 'store']]);

});
