<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::resource('produits', ProductController::class);
Route::resource('commandes', OrderController::class);

Route::get('/cart', [CartController::class, 'index'])->name("cart.index");
Route::get('/cart/delete', [CartController::class, 'delete'])->name("cart.delete");
Route::post('/cart/add/{id}',  [CartController::class, 'add'])->name("cart.add");
