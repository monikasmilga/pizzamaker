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

        Route::get('/', ['as' => 'app.cheeses.index','uses' => 'DTCheesesController@adminIndex']);

        Route::get('/create', ['as' => 'app.cheeses.create','uses' => 'DTCheesesController@adminCreate']);
        Route::post('/create', [ 'as' => 'app.cheeses.store', 'uses' => 'DTCheesesController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'app.cheeses.edit', 'uses' => 'DTCheesesController@adminEdit']);
            Route::post('/edit', ['uses' => 'DTCheesesController@adminUpdate']);

            Route::get('/', ['uses' => 'DTCheesesController@adminShow']);
            Route::delete('/', ['as' => 'app.cheeses.show', 'uses' => 'DTCheesesController@adminDestroy']);

        });
    });

    Route::group(['prefix' => 'ingredients'], function () {

        Route::get('/', ['as' => 'app.ingredients.index','uses' => 'DTIngredientsController@adminIndex']);

        Route::get('/create', ['as' => 'app.ingredients.create','uses' => 'DTIngredientsController@adminCreate']);
        Route::post('/create', [ 'uses' => 'DTIngredientsController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'app.ingredients.edit', 'uses' => 'DTIngredientsController@adminEdit']);
            Route::post('/edit', ['uses' => 'DTIngredientsController@adminUpdate']);

            Route::get('/', ['uses' => 'DTIngredientsController@adminShow']);
            Route::delete('/', ['as' => 'app.ingredients.show', 'uses' => 'DTIngredientsController@adminDestroy']);

        });
    });

    Route::group(['prefix' => 'pads'], function () {

        Route::get('/', ['as' => 'app.pads.index','uses' => 'DTPadsController@adminIndex']);

        Route::get('/create', ['as' => 'app.pads.create','uses' => 'DTPadsController@adminCreate']);
        Route::post('/create', [ 'uses' => 'DTPadsController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'app.pads.edit', 'uses' => 'DTPadsController@adminEdit']);
            Route::post('/edit', ['uses' => 'DTPadsController@adminUpdate']);

            Route::get('/', ['uses' => 'DTPadsController@adminShow']);
            Route::delete('/', ['as' => 'app.pads.show', 'uses' => 'DTPadsController@adminDestroy']);

        });
    });

    Route::group(['prefix' => 'permissions'], function () {

        Route::get('/', ['as' => 'app.permissions.index','uses' => 'DTPermissionsController@adminIndex']);

        Route::get('/create', ['as' => 'app.permissions.create','uses' => 'DTPermissionsController@adminCreate']);
        Route::post('/create', [ 'uses' => 'DTPermissionsController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'app.permissions.edit', 'uses' => 'DTPermissionsController@adminEdit']);
            Route::post('/edit', ['uses' => 'DTPermissionsController@adminUpdate']);

            Route::get('/', ['uses' => 'DTPermissionsController@adminShow']);
            Route::delete('/', ['as' => 'app.permissions.show', 'uses' => 'DTPermissionsController@adminDestroy']);

        });
    });

    Route::group(['prefix' => 'pizzas'], function () {

        Route::get('/', ['as' => 'app.pizzas.index','uses' => 'DTPizzasController@adminIndex']);

        Route::get('/create', ['as' => 'app.pizzas.create','uses' => 'DTPizzasController@adminCreate']);
        Route::post('/create', [ 'uses' => 'DTPizzasController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'app.pizzas.edit', 'uses' => 'DTPizzasController@adminEdit']);
            Route::post('/edit', ['uses' => 'DTPizzasController@adminUpdate']);

            Route::get('/', ['uses' => 'DTPizzasController@adminShow']);
            Route::delete('/', ['as' => 'app.pizzas.show', 'uses' => 'DTPizzasController@adminDestroy']);

        });
    });

    Route::group(['prefix' => 'roles'], function () {

        Route::get('/', ['as' => 'app.roles.index','uses' => 'DTRolesController@adminIndex']);

        Route::get('/create', ['as' => 'app.roles.create','uses' => 'DTRolesController@adminCreate']);
        Route::post('/create', [ 'uses' => 'DTRolesController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'app.roles.edit', 'uses' => 'DTRolesController@adminEdit']);
            Route::post('/edit', ['uses' => 'DTRolesController@adminUpdate']);

            Route::get('/', ['uses' => 'DTRolesController@adminShow']);
            Route::delete('/', ['as' => 'app.roles.show', 'uses' => 'DTRolesController@adminDestroy']);

        });
    });

    Route::group(['prefix' => 'users'], function () {

        Route::get('/', ['as' => 'app.users.index','uses' => 'DTUsersController@adminIndex']);

        Route::get('/create', ['as' => 'app.users.create','uses' => 'DTUsersController@adminCreate']);
        Route::post('/create', [ 'uses' => 'DTUsersController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'app.users.edit', 'uses' => 'DTUsersController@adminEdit']);
            Route::post('/edit', ['uses' => 'DTUsersController@adminUpdate']);

            Route::get('/', ['uses' => 'DTUsersController@adminShow']);
            Route::delete('/', ['as' => 'app.users.show', 'uses' => 'DTUsersController@adminDestroy']);

        });
    });

});


Route::group(['prefix' => 'pizzas'], function () {

    Route::get('/', ['as' => 'front-end.pizzas.index','uses' => 'DTPizzasController@index']);

    Route::get('/create', ['as' => 'front-end.pizzas.create','uses' => 'DTPizzasController@create']);
    Route::post('/create', [ 'uses' => 'DTPizzasController@store']);

    Route::group(['prefix' => '{id}'], function () {

        Route::get('/edit', ['as' => 'front-end.pizzas.edit', 'uses' => 'DTPizzasController@edit']);
        Route::post('/edit', ['uses' => 'DTPizzasController@update']);

        Route::get('/', ['uses' => 'DTPizzasController@show']);
        Route::delete('/', ['as' => 'front-end.pizzas.show', 'uses' => 'DTPizzasController@destroy']);

    });
});