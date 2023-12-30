<?php

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

Route::post('/register', [Auth\AuthUserController::class, 'register']);
Route::post('/login', [Auth\AuthUserController::class, 'login']);
Route::get('/test', function (){
    return "Hello World";
});

Route::group(['middleware' => ['auth:sanctum']], function (){
   Route::get('/get_all', [Auth\AuthUserController::class, 'getAllUser']);
   Route::get('/profile_user', [Auth\AuthUserController::class, 'profileUser']);
   Route::get('/get_product', [Booking\BookingController::class, 'bookingProduct']);
   Route::post('/product/post', [Product\ProductController::class, 'postProduct']);
   Route::get('/product/get_product', [Product\ProductController::class, 'getProduct']);
});

Route::prefix("seller")->group(function () {
    foreach (glob(dirname(__FILE__) . "/API/seller/*.php") as $filename) {
        include $filename;
    }
});
Route::prefix("user")->group(function () {
    foreach (glob(dirname(__FILE__) . "/API/user/*.php") as $filename) {
        include $filename;
    }
});
