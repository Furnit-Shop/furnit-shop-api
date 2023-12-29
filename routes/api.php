<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\Auth;
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
//
Route::post('/register', [Auth\AutCostumerController::class, 'register']);
Route::post('/login', [Auth\AutCostumerController::class, 'login']);
Route::get('/test-res', [Testing\TestController::class, 'TestApp']);

Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('/get_all', [Auth\AuthUserController::class, 'getAllUser']);
    Route::get('/profile_user', [Auth\AuthUserController::class, 'profileUser']);
    Route::get('/get_product',[Product\ProductController::class, 'getProduct']);
    Route::post('/product/post', [Product\ProductController::class, 'postProduct']);
    Route::get('/product/get_product', [Product\ProductController::class, 'getProduct']);
});

