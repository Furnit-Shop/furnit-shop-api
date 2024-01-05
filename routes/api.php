<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\Auth;
use App\Http\Controllers\seller\Booking;
use App\Http\Controllers\seller\Product;
use App\Http\Controllers\Testing;

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

Route::post('/register', [Auth\AutCostumerController::class, 'register']);
Route::post('/login', [Auth\AutCostumerController::class, 'login']);
Route::get('/test-res', [Testing\TestController::class, 'TestApp']);

Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('/get_all', [Auth\AuthUserController::class, 'getAllUser']);
    Route::get('/profile_user', [Auth\AuthUserController::class, 'profileUser']);
    Route::get('product/get_product',[Product\ProductController::class, 'getProduct']);
    Route::post('/product/post', [Product\ProductController::class, 'postProduct']);
    Route::get('/product/get_booking', [Booking\BookingController::class, 'bookingProduct']);
    Route::delete('/product/delete/{id}', [Product\ProductController::class, 'deletePrduct']);
    Route::get('/product/search_pro', [Product\ProductController::class, 'search']);
    Route::get('/product/get_productCard', [Product\ProductController::class, 'productCard']);
    Route::put('/product/search_q/{query}', [Product\ProductController::class, 'searchQuery']);
    Route::get('/product/search_t', [Product\ProductController::class, 'searchText']);
});

