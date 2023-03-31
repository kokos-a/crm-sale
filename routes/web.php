<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(['register' => false, 'reset' => false,'verify' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::resources([
        'clients' => ClientController::class,
        'clients.orders' => ClientOrderController::class,
        'orders' => OrderController::class,
        'users' => UserController::class,
        'products' => ProductController::class,
        'products.orders' => ProductOrderController::class,
    ]);
});
