<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Users\CartController;
use App\Http\Controllers\Users\UserContactController;
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

Auth::routes();

Route::get('/home',[HomeController::class , 'index'])->name('index');


//'@'

Route::get( 'contact',[UserContactController::class , 'index'])->middleware('auth');
Route::post('contact',[UserContactController::class , 'create'])->middleware('auth');


Route::get('/',[HomeController::class , 'index']);
Route::get('/about_us',[HomeController::class , 'about_us'])->middleware('auth');
Route::get('/show_product/{id}',[CategoryController::class , 'show_product'])->middleware('auth');
Route::get('/show_product_details/show_product/{id}',[CategoryController::class , 'show_product'])->middleware('auth');
Route::get('/show_product_details/{id}',[ProductController::class , 'show_product_details'])->middleware('auth');

Route::get('add-product/{product_id}',[CartController::class , 'addProduct'])->name('user.addProduct');
Route::post('add-product/{product_id}',[CartController::class , 'addProduct'])->name('user.addProduct');
Route::get('show-products',[CartController::class , 'showProducts'])->name('user.showProduct');

Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

