<?php

use Illuminate\Support\Facades\Route;

/**
 *
 *
 * FRONT ROUTES
 *
 *
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 *
 *
 * ADMIN PANEL ROUTES
 *
 *
 */
Route::group([
    'prefix' => 'admin'
], function () {

    Route::get('/', function () {
        echo 'admin';
    });

});


/**
 *
 *
 * APP/CUSTOMER PANEL ROUTES
 *
 *
 */
Route::group([
    'prefix' => 'app'
], function () {

    Route::get('/', function () {
        echo 'app';
    });

});
