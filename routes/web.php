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

    Route::get('/', \App\Livewire\Admin\Home::class);

});


/**
 *
 *
 * APP/CUSTOMER PANEL ROUTES
 *
 *
 */
Route::group([
    'prefix' => 'customer'
], function () {

    Route::get('/', \App\Livewire\Customer\Home::class);

});
