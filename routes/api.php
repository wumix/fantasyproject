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

 Route::group(['prefix' => 'v1'], function () {
    /**
     * Auth
     */
    Route::post('login', 'Api\UserController@authenticate');
    Route::post('register', 'Api\UserController@create');
    Route::post('password/email', 'Auth\ForgotPasswordController@getResetToken');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::any('/sendpush', 'Api\OrdersController@sendPushMessage');
    /**
     * Product
     */
     Route::resource('tournaments', 'Api\TournamentsController', ['only' => [ 'index'
     ]]);
    /**
     * Laundries
     */
    //Route::post('nearest-laundry', 'Api\LaundryController@getNearByLocation');
    Route::get('laundries', 'Api\LaundryController@laundries');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::resource('tournaments', 'Api\TournamentsController',['except' => [ 'index'
        ]]);
    });
});