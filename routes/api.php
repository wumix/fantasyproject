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
    Route::get('product', 'Api\ProductController@index');
    /**
     * Laundries
     */
    //Route::post('nearest-laundry', 'Api\LaundryController@getNearByLocation');
    Route::get('laundries', 'Api\LaundryController@laundries');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('order/get-detail', 'Api\OrdersController@getById');
        Route::resource('order', 'Api\OrdersController');

        Route::post('change/password', 'Api\UserController@changePasswordWhenLogin');
        Route::get('client-orders', 'Api\OrdersController@orderHistory');
        Route::post('password/change', 'Api\UserController@changePassword');
        Route::post('nearest-drivers', 'Api\UserController@getNearByDriver');

        Route::get('order-history', 'Api\DriverController@orderHistory');
        Route::get('client-location/{order_id}', 'Api\DriverController@clientLocation');
        Route::post('driver-orders', 'Api\DriverController@searchOrder');
        Route::group(['prefix' => 'driver'], function () {
            Route::get('orders-drivers', 'Api\DriverController@driverOrders');//Driver orders with status
        });
        Route::group(['prefix' => 'order'], function () {
            Route::get('/', 'Api\OrdersController@getById');
            Route::post('update-status', 'Api\OrdersController@updateOrderStatus');
        });

        Route::resource('user', 'Api\UserController');
        Route::resource('driver', 'Api\DriverController');
    });
});