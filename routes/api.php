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

Route::group(['prefix' => 'api/v1'], function () {

    Route::group(['prefix' => 'pizzas'], function () {

        Route::get('/', ['as' => 'api.pizzas.index', 'uses' => 'DTPizzasAPIController@index']);

        Route::get('/create', ['as' => 'api.pizzas.create', 'uses' => 'DTPizzasAPIController@create']);
        Route::post('/create', ['uses' => 'DTPizzasAPIController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'api.pizzas.edit', 'uses' => 'DTPizzasAPIController@edit']);
            Route::post('/edit', ['uses' => 'DTPizzasAPIController@update']);

            Route::get('/', ['uses' => 'DTPizzasAPIController@show']);
            Route::delete('/', ['as' => 'api.pizzas.delete', 'uses' => 'DTPizzasAPIController@destroy']);
        });
    });
});