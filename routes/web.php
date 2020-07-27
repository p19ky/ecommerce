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
Route::get('/create', 'BookController@index')->name('create');

Route::post('/create', 'BookController@store')->name('store');
Route::post('/createGenre', 'GenreController@store')->name('storeG');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('/admin/users','Admin\UsersController',['except' => ['show','create', 'store']]);

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/users','UsersController',['except' => ['show','create', 'store']]);

});
