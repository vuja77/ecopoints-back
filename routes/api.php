<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
Route::middleware('auth:sanctum')->post('buy', [Controllers\ProductController::class, 'buy']);
Route::middleware('auth:sanctum')->post('buys', [Controllers\ProductController::class, 'buyedProduct']);
Route::resource('products', Controllers\ProductController::class);
Route::resource('sponsor', Controllers\SponsorController::class);
Route::middleware('auth:sanctum')->post('points', [Controllers\PointsController::class, "addPoints"]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});
