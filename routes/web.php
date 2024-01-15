<?php

use Illuminate\Support\Facades\Route;
use App\Http\Admin\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\QrController;

Route::get('/generate-qrcode', [QrController::class, 'generateQRCode']);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sponsort', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
    Route::get('product', 'index')->name('product-index');
    Route::get('product/new', 'create')->name('product-create');
    Route::get('product/{id}', 'show')->name('product-show');
    Route::get('product/edit/{id}', 'edit')->name('product-edit');
    Route::post('product/update/{id}', 'update')->name('product-update');
    Route::post('product/new', 'store')->name('product-store');
    Route::delete('product/{id}', 'destroy')->name('product-destroy');
});
Route::controller(App\Http\Controllers\Admin\SponsorController::class)->group(function () {
    Route::get('sponsor', 'index')->name('sponsor-index');
    Route::get('sponsor/new', 'create')->name('sponsor-create');
    Route::get('sponsor/{id}', 'show')->name('sponsor-show');
    Route::get('sponsor/edit/{id}', 'edit')->name('sponsor-edit');
    Route::post('sponsor/update/{id}', 'update')->name('sponsor-update');
    Route::post('sponsor/new', 'store')->name('sponsor-store');
    Route::delete('sponsor/{id}', 'destroy')->name('sponsor-destroy');
});

Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
    Route::get('category', 'index')->name('category-index');
    Route::get('category/new', 'create')->name('category-create');
    Route::get('category/{id}', 'show')->name('category-show');
    Route::get('category/edit/{id}', 'edit')->name('category-edit');
    Route::post('category/update/{id}', 'update')->name('category-update');
    Route::post('category/new', 'store')->name('category-store');
    Route::delete('category/{id}', 'destroy')->name('category-destroy');
});
Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
    Route::get('users', 'index')->name('user-index');
    Route::get('users/new', 'create')->name('user-create');
    Route::get('users/{id}', 'show')->name('user-show');
    Route::get('users/edit/{id}', 'edit')->name('user-edit');
    Route::post('users/update/{id}', 'update')->name('user-update');
    Route::post('users/new', 'store')->name('user-store');
    Route::delete('users/{id}', 'destroy')->name('user-destroy');
});
Route::controller(App\Http\Controllers\Admin\PurchasedProductController::class)->group(function () {
    Route::get('PurchasedProduct', 'index')->name('PurchasedProduct-index');
    Route::get('PurchasedProduct/new', 'create')->name('PurchasedProduct-create');
    Route::get('PurchasedProduct/{id}', 'show')->name('PurchasedProduct-show');
    Route::get('PurchasedProduct/edit/{id}', 'edit')->name('PurchasedProduct-edit');
    Route::post('PurchasedProduct/update/{id}', 'update')->name('PurchasedProduct-update');
    Route::post('PurchasedProduct/new', 'store')->name('PurchasedProduct-store');
    Route::delete('PurchasedProduct/{id}', 'destroy')->name('PurchasedProduct-destroy');
});

Route::controller(App\Http\Controllers\Admin\FavoriteController::class)->group(function () {
    Route::get('favorite', 'index')->name('favorite-index');
    Route::get('favorite/new', 'create')->name('favorite-create');
    Route::get('favorite/{id}', 'show')->name('favorite-show');
    Route::get('favorite/edit/{id}', 'edit')->name('favorite-edit');
    Route::post('favorite/update/{id}', 'update')->name('favorite-update');
    Route::post('favorite/new', 'store')->name('favorite-store');
    Route::delete('favorite/{id}', 'destroy')->name('favorite-destroy');

});