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
 * AUTH ROUTES
 *
 *
 */
Route::get('/auth/login', \App\Livewire\Auth\Login::class)
    ->middleware(['guest'])->name('auth.login');

/**
 *
 *
 * ADMIN PANEL ROUTES
 *
 *
 */
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth']
], function () {

    Route::get('/', \App\Livewire\Admin\Home::class)->name('admin.home');

    /**
     * Users
     */
    Route::group([
        'prefix' => 'users',
    ], function () {

        Route::get('/', \App\Livewire\Admin\Users\Index::class)->name('admin.users.index');
        Route::get('/create', \App\Livewire\Admin\Users\Create::class)->name('admin.users.create');
        Route::get('/edit/{user}', \App\Livewire\Admin\Users\Edit::class)->name('admin.users.edit');

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
    'prefix' => 'customer',
    'middleware' => ['auth']
], function () {

    Route::get('/', \App\Livewire\Customer\Home::class)->name('customer.home');

});
