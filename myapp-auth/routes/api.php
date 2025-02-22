<?php
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//protected
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::post('/logout', [AuthController::class,'logout']);
});
//testing
Route::get('products/index', [ProductController::class, 'index']);
//public route
Route::post('/register',[AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

