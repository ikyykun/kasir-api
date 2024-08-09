<?php

use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\MasterUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// data user
Route::resource('data-users', App\Http\Controllers\MasterUserController::class);

// data barang
Route::resource('data-barang', App\Http\Controllers\MasterBarangController::class);