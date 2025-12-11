<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('welcome');
});

// CRUD کاربران (در صورت نیاز)
Route::resource('users', UserController::class);

// CRUD فروشگاه
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('orders', OrderController::class);
Route::resource('order-items', OrderItemController::class);
Route::resource('carts', CartController::class);
Route::resource('cart-items', CartItemController::class);
Route::resource('addresses', AddressController::class);
Route::resource('payments', PaymentController::class);
Route::resource('coupons', CouponController::class);
Route::resource('reviews', ReviewController::class);
