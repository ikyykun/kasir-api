<?php

use App\Http\Controllers\API\MenuController;
use App\Http\Controllers\API\UsersController;
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

http://127.0.0.1:8000/api/login