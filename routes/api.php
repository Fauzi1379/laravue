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

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::get('/restaurants', 'RestaurantsController@index');
Route::get('/restaurants/{id?}', 'RestaurantsController@show');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/restaurants/store', 'RestaurantsController@store');
    Route::post('/restaurants/update/{id?}', 'RestaurantsController@update');
    Route::delete('/restaurants/{id?}', 'RestaurantsController@destroy');
    Route::post('/logout', 'AuthController@logout');
});