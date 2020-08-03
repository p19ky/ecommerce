<?php

use App\Http\Controllers\EcommerceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//Route::get('/create', 'BookController@index')->name('create');              // books page

//Route::post('/create', 'BookController@store')->name('store');              // add book to db


Route::get('/dashboard', 'AdminCrudController@index')->name('dashboard');       // dashboard provizoriu..

Route::get('/genres', 'GenreController@index')->name('genres');             // genres page
Route::post('/createGenre', 'GenreController@store')->name('storeG');       // add genre to db method
Route::get('/createGenre', 'GenreController@displayTable')->name('displayTableG'); // add genre to db input
Route::get('/editG/{id}', 'GenreController@edit')->name('editG');             // edit genre page
Route::post('/updateG/{id}', 'GenreController@update')->name('updateG');       // update genre page
Route::delete('/delete/{id}', 'GenreController@delete')->name('deleteG');       // delete genre page





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'user']], function () {
    Route::get('index', 'UsersController@index')->name('index');
});

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'AdminController@index')->name('index');
});

// Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
//     Route::resource('/user', 'AdminController', ['except' => ['show', 'create', 'store']]);
// });

// Route::namespace('User')->prefix('user')->name('user.')->group(function(){
//     Route::resource('/index', 'UsersController', ['except' => ['show', 'create', 'store']]);
// });

Route::get('/shcart', 'ShoppingCartController@index')->name('shcart');    // shopping cart page

Route::get('/allBooks', 'AllBooksController@index')->name('allBooks');    // all books page