<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;

Route::apiResource('users', UserController::class);
Route::apiResource('stocks', StockController::class);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users', [UserController::class, 'index']); // Ambil daftar user
Route::delete('/users/{id}', [UserController::class, 'destroy']); // Hapus user
Route::put('/users/{id}', [UserController::class, 'update']); // Update user
