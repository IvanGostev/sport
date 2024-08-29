<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::controller(ContactController::class)
        ->prefix('contacts')
        ->name('contact.')
        ->group(function () {
            Route::post('/', 'store')->name('store');
            Route::delete('/{contact}', 'delete')->name('delete');
        });
    Route::controller(ProfileController::class)
        ->prefix('profile')
        ->name('profile.')
        ->group(function () {
            Route::get('/', 'show')->name('show');
            Route::patch('/', 'update')->name('update');
        });

});

Route::controller(MainController::class)
    ->prefix('users')
    ->name('main.')
    ->group(function () {
        Route::get('/{user}', 'show')->name('show');
    });






Auth::routes();


