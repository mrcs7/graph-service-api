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

Route::group(['namespace' => 'Person'], function () {
    Route::post('persons/shortest_path', 'PersonController@shortest_path');
    Route::resource('persons', 'PersonController');
    Route::post('persons/follow', 'PersonController@follow');
    Route::post('persons/unfollow', 'PersonController@unfollow');

});

