<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register','UserController@register');
Route::post('login','UserController@login');
Route::post('logout','UserController@logout');
Route::post('checkpassword','UserController@checkpassword');
Route::get('show/{id}','UserController@show');
Route::put('update/{user}','UserController@update');
Route::put('updateavatar/{user}','UserController@updateavatar');
Route::put('updatepassword/{user}','UserController@updatepassword');
Route::get('getbook/{id}','UserController@getbook');
Route::get('getbook1/{id}','UserController@getbook1');
Route::get('getbook2/{id}','UserController@getbook2');
Route::get('getbook3/{id}','UserController@getbook3');
Route::get('getfavorite/{id}','UserController@getfavorite');

Route::resource('categories', CategoriesController::class);
Route::resource('books', BookController::class);
Route::resource('borrows', BorrowController::class);
Route::resource('favorites', FavoriteController::class);

Route::resource('posts', PostController::class);

Route::post('forgotpassword','NewpasswordController@forgotPassword');