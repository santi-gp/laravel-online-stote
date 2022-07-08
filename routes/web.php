<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])
    ->name('home.index'); // this name will be used to call the link 'Inicio'
Route::get('/products', [ProductController::class, 'index'])
    ->name('product.index'); // this name will be used to call the link 'Productos'    
Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('product.show');

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');
Route::get('/cart/delete', [CartController::class, 'delete'])
    ->name('cart.delete');
Route::post('/cart/add/{id}', [CartController::class, 'add'])
    ->name('cart.add');

Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', [CartController::class, 'purchase'])
        ->name('cart.purchase');
    Route::get('/account/orders', [MyAccountController::class, 'orders'])
        ->name('account.orders');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminHomeController::class, 'index'])
        ->name('admin.home.index');
    Route::get('/admin/products', [AdminProductController::class, 'index'])
        ->name('admin.product.index');
    Route::post('/admin/prodcuts/store', [AdminProductController::class, 'store'])
        ->name('admin.product.store');
    Route::delete('/admin/products/{product}/delete', [AdminProductController::class, 'destroy'])
        ->name('admin.product.delete');
    Route::get('/admin/products/{product}/edit', [AdminProductController::class, 'edit'])
        ->name("admin.product.edit");
    Route::put('/admin/products/{product}/update', [AdminProductController::class, 'update'])
        ->name('admin.product.update');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
