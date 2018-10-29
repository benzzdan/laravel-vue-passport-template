<?php

use Illuminate\Http\Request;

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

# We specify the 'as' for naming the route and avouding the Route['login'] error
Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);

Route::post('register', 'AuthController@register');

#in order to logout we need to be logged in
Route::middleware('auth:api')->post('logout', 'AuthController@logout');

