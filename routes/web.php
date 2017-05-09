<?php

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
    return view('welcome');
});

/**
 * Routes for admin role only
 */
Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'cheeses'], function () {

        Route::get('/', ['as' => 'app.cheeses.index','uses' => 'DTCheesesController@index']);

        Route::get('/create', ['as' => 'app.cheeses.create','uses' => 'DTCheesesController@create']);

        Route::post('/create', [ 'uses' => 'DTCheesesController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'app.cheeses.edit', 'uses' => 'DTCheesesController@edit']);

            Route::post('/edit', ['uses' => 'DTCheesesController@update']);

            Route::get('/', ['uses' => 'DTCheesesController@show']);

            Route::delete('/', ['as' => 'app.cheeses.delete', 'uses' => 'DTCheesesController@destroy']);

        });

    });

    Route::group(['prefix' => 'cheeses'], function () {

        Route::get('/', ['as' => 'app.cheeses.index','uses' => 'DTCheesesController@index']);

        Route::get('/create', ['as' => 'app.cheeses.create','uses' => 'DTCheesesController@create']);

        Route::post('/create', [ 'uses' => 'DTCheesesController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'app.cheeses.edit', 'uses' => 'DTCheesesController@edit']);

            Route::post('/edit', ['uses' => 'DTCheesesController@update']);

            Route::get('/', ['uses' => 'DTCheesesController@show']);

            Route::delete('/', ['as' => 'app.cheeses.delete', 'uses' => 'DTCheesesController@destroy']);

        });

    });







});


/**
 * Routes for users
 */
Route::group(['prefix' => 'user'], function () {


});