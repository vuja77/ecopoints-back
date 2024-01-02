<?php

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */
Route::post('register', [Controllers\UserController::class, 'register']);
Route::post('login', [Controllers\UserController::class, 'login']);
Route::get('sendMail', [Controllers\UserController::class, 'sendEmail']);
Route::resource('categories', Controllers\CategoryController::class,);
Route::resource('products', Controllers\ProductController::class);
Route::resource('sponsor', Controllers\SponsorController::class);
Route::resource('qrcodes', Controllers\ScanQrcodeController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('buy', [Controllers\ProductController::class, 'buy']);
    Route::get('PurchasedProduct', [Controllers\ProductController::class, 'buyedProduct']);
    Route::post('points', [Controllers\PointsController::class, "addPoints"]);
    Route::resource('favorite', Controllers\FavoriteController::class);
});
