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

Auth::routes();
Route::get('/', function () {
    return view('admin.login');
});
// Route::get('/', 'DashBoardAdimController@index');

// Route::get('/home', 'DashBoardAdimController@index')->name('home');

// Route::resource('/book', 'BookControllerAdmin');
// Route::resource('/borrow', 'BorrowControllerAdmin');
// Route::resource('/category', 'CategoriesAdminController');
// Route::resource('/users', 'UserAdminController');
Route::resource('/result', 'ResultController');

// Route::resource('/dashboard', 'DashBoardAdimController');

// Route::get('/borrow2','DashBoardAdimController@index2')->name('borrow2');;

// //For adding an image
// Route::get('/add-image','PostController@addImage')->name('images.add');

// //For storing an image
// Route::post('/store-image','PostController@storeImage')->name('images.store');

// //For showing an image
// Route::get('/view-image','PostController@viewImage')->name('images.view');
   

Route::prefix('admin')->group(function () {

    Route::get('/login','AdminController@showLoginForm')->name('admin.login.form');
    Route::post('/login','AdminController@login')->name('admin.login');
    Route::post('/logout','AdminController@logout')->name('admin.logout');  
});

Route::group(['prefix'=>'admin','middleware'=>'auth:admin'], function(){
    
    Route::get('/', 'DashBoardAdimController@index')->name('admin');
    Route::resource('/book', 'BookControllerAdmin');
    Route::resource('/borrow', 'BorrowControllerAdmin');
    Route::resource('/category', 'CategoriesAdminController');
    Route::resource('/users', 'UserAdminController');
    Route::resource('/dashboard', 'DashBoardAdimController');

    Route::get('/borrow2','DashBoardAdimController@index2')->name('borrow2');;

});