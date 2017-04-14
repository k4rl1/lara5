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

Route::group(['namespace' => 'Api'], function() {
    Route::group(
        ['namespace' => 'v1', 'prefix' => 'v1'],
        function () {
            Route::get('epg', 'JsonEPGController@get');
            Route::get('/', 'JsonHomeController@get');
        }
    );

    Route::group(
        ['namespace' => 'v2', 'prefix' => 'v2'],
        function () {
            Route::get('epg', 'JsonEPGController@get');
            Route::get('/', 'JsonHomeController@get');
        }
    );
});