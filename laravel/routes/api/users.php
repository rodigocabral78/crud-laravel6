<?php

/**
* Module Route User
*/

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => '\App\Modules\Api\User\Controllers',
    'prefix' => 'v1/users',
], function () {
    # Route::apiResource('users', UserController::class);
    Route::get('', UserController::class . '@index');
    Route::post('', UserController::class . '@store');

    # Required Parameters
    Route::get('{id}', UserController::class . '@show');
    Route::put('{id}', UserController::class . '@update');
    Route::patch('{id}', UserController::class . '@update');
    Route::delete('{id}', UserController::class . '@destroy');
});
