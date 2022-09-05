<?php

/**
* Module Route User
*/

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => '\App\Modules\Api\User\Controllers',
    'prefix' => 'v1/users',
], function () {
    // Route::apiResource('users', UserController::class);
    Route::get('', UserController::class . '@index')->name('users.index');
    Route::post('', UserController::class . '@store')->name('users.store');

    # Required Parameters
    Route::get('{id}', UserController::class . '@show')->name('users.show');
    // Route::put('{id}', UserController::class . '@update')->name('users.update');
    // Route::patch('{id}', UserController::class . '@update')->name('users.update');
    Route::match(['put', 'patch'], '{id}', UserController::class . '@update')->name('users.update');
    Route::delete('{id}', UserController::class . '@destroy')->name('users.destroy');
});
