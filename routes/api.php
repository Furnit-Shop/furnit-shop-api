<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use  App\Http\Controllers\Product;
use App\Http\Controllers\Booking;
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
/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
Route::get('/test', function (){
    return "Hello World";
});

Route::post('/register', [Auth\AuthUserController::class, 'register']);
Route::get('/get_all', [Auth\AuthUserController::class, 'getAllUser']);
Route::post('/login', [Auth\AuthUserController::class, 'login']);
Route::get('/profile_user', [Auth\AuthUserController::class, 'profileUser']);

Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('/get_product', [Booking\BookingController::class, 'bookingProduct']);
    Route::post('/product/post', [Product\ProductController::class, 'postProduct']);
    Route::get('/product/get_product', [Product\ProductController::class, 'getProduct']);
});

