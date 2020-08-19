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

// Rute admmin:


// genres
Route::get('/allGenres', 'GenreController@index')->name('allGenres');             // genres page - USER

// genres route for the advanced search
//Route::get('/', 'GenreController@getGenre')->name('adS');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    // books
    Route::get('books', 'AllBooksController@indexAdmin')->name('books');      // books page - ADMIN
    Route::post('createBook', 'AllBooksController@store')->name('storeB');       // add book to db method
    Route::get('createBook', 'AllBooksController@displayTable')->name('displayTableB'); // add book to db input
    Route::get('editB/{id}', 'AllBooksController@edit')->name('editB');             // edit book page
    Route::post('updateB/{id}', 'AllBooksController@update')->name('updateB');       // update book page
    Route::delete('deleteB/{id}', 'AllBooksController@delete')->name('deleteB');       // delete book route
    //Route::get('autocomplete', 'AllBooksController@autocompleteAuthor')->name('autocompleteAuthor');  // autocomplete authors filter 
    // genres
    Route::get('genres', 'GenreController@indexAdmin')->name('genres');             // genres page - ADMIN
    Route::post('createGenre', 'GenreController@store')->name('storeG');       // add genre to db method
    Route::get('createGenre', 'GenreController@displayTable')->name('displayTableG'); // add genre to db input
    Route::get('editG/{id}', 'GenreController@edit')->name('editG');             // edit genre page
    Route::post('updateG/{id}', 'GenreController@update')->name('updateG');       // update genre page
    Route::delete('deleteG/{id}', 'GenreController@delete')->name('deleteG');       // delete genre route
    
    //orders
    Route::get('allOrders', 'AllBooksController@indexOrders')->name('orders');
   
});
Route::any('/allBooks', 'AllBooksController@index')->name('allBooks');    //  books page - USER
// orders

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'user']], function () {
    Route::get('index', 'UsersController@index')->name('index');
    Route::get('profile', 'UsersController@show')->name('profile');
    Route::post('profile/update', 'UsersController@update')->name('profile.update');

    
});

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'AdminController@index')->name('index');
    Route::get('users', 'AdminController@get_all')->name('users');
    Route::get('create', 'AdminController@create')->name('create');
    Route::post('store', 'AdminController@store')->name('store');
    Route::get('edit/{id}', 'AdminController@edit')->name('edit');
    Route::post('update/{id}', 'AdminController@update')->name('update');
    Route::delete('delete/{id}', 'AdminController@delete')->name('delete');
    Route::get('profile', 'CustomersController@index')->name('profile');
    Route::post('profile/update', 'CustomersController@update')->name('profile.update');
   
});

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Auth', 'middleware' => ['auth', 'admin']], function () {
    Route::get('change-password', 'ChangePasswordController@index')->name('password.change');
    Route::post('change-password', 'ChangePasswordController@changepassword')->name('password.update');
});

Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'Auth', 'middleware' => ['auth', 'user']], function () {
    Route::get('change-password', 'ChangePasswordController@index')->name('password.change');
    Route::post('change-password', 'ChangePasswordController@changepassword')->name('password.update');
});



// Route::namespace('User')->prefix('user')->name('user.')->group(function(){
//     Route::resource('/index', 'UsersController', ['except' => ['show', 'create', 'store']]);
// });

Route::get('/shcart/{id}', 'ShoppingCartController@index')->name('shcart');    // shopping cart page
Route::post('/order{id}', 'AllBooksController@storeOrder')->name('storeO');  // add order to db
Route::get('/product/{id}', 'ProductController@index')->name('product');    // shopping cart page
