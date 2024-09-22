<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscription.index');
Route::get('/subscription', [SubscriptionController::class, 'show'])->name('subscription.show');

Route::get('/terms-of-use', )->name('terms');

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/{product}/products', [ProductController::class, 'show'])->name('product.show');
Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::post('/{product}/cart', [CartController::class, 'store'])->name('cart.store');



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


