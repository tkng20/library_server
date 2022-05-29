<?php

use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/book', 'BookControllerAdmin');
Route::resource('/borrow', 'BorrowControllerAdmin');
Route::resource('/category', 'CategoriesAdminController');
Route::resource('/users', 'UserAdminController');
Route::resource('/result', 'ResultController');

//For adding an image
Route::get('/add-image','PostController@addImage')->name('images.add');

//For storing an image
Route::post('/store-image','PostController@storeImage')->name('images.store');

//For showing an image
Route::get('/view-image','PostController@viewImage')->name('images.view');
