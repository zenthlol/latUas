<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ShopController::class, 'welcome'])->name('welcome');

Route::get('/product/{id}', [ShopController::class, 'productById'])->name('productById');

Route::get('/login', [AuthController::class, 'login'])
->name('login');

Route::post('/login-process', [AuthController::class, 'login_process'])->name('login_process');

Route::get('/register/{locale?}', [AuthController::class, 'register'])
->name('register');

Route::post('/register-process', [AuthController::class, 'register_process'])->name('register_process');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){

    Route::get('/cart', [ShopController::class, 'cart'])->name('cart');

    Route::post('/add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('addToCart');

    Route::delete('/delete-cart/{id}', [ShopController::class, 'deleteCart'])->name('deleteCart');

    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::delete('/delete-all-carts', [ShopController::class, 'deleteAllCart'])->name('deleteAllCart');

    Route::middleware('isAdmin')->group(function(){

        Route::prefix('/product')->group(function(){
            Route::get('/create', [ProductController::class, 'createProduct'])->name('createProduct');
            Route::post('/store', [ProductController::class, 'storeProduct'])->name('storeProduct');

            Route::get('/edit/{id}', [ProductController::class, 'editProduct'])->name('editProduct');
            Route::patch('/update/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct');

            Route::delete('/delete/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
            Route::get('/view/{id}', [ProductController::class, 'viewProductById'])->name('viewProductById');
            Route::get('/views', [ProductController::class, 'viewProducts'])->name('viewProducts');
        });
    });

});
