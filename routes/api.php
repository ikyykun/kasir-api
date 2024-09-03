<?php

use App\Http\Controllers\API\MenuController;
use App\Http\Controllers\API\PBOController;
use App\Http\Controllers\API\PesananController;
use App\Http\Controllers\API\UsersController;
use App\Http\Middleware\CorsMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [UsersController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [UsersController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UsersController::class);
});

Route::get('/menu', [MenuController::class, 'show']);
Route::get('/menu/{id}', [MenuController::class, 'getmenu']);
Route::post('/update/{id}', [PBOController::class, 'update']);
Route::post('/delete/{id}', [PBOController::class, 'destroy']);
Route::post('/store', [PBOController::class, 'store']);

Route::post('/pesanan/order', [PesananController::class, 'store']);
Route::get('/pesanan/{id}', [PesananController::class, 'show']);

Route::get('/kasir/{id}', [PesananController::class, 'show']);
Route::get('/kasir', [PesananController::class, 'index']);
Route::post('/kasir/bayar/{id}', [PesananController::class, 'bayar']);

http://127.0.0.1:8000/api/kasir/{id}