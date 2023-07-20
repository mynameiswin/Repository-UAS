<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AuthController;

Route::get('/book', [BookController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('book', [BookController::class, 'store']);
    Route::delete('book/{id}', [BookController::class, 'destroy']);
    Route::put('book/{id}', [BookController::class, 'update']);

    Route::resource('member', MemberController::class);
    Route::resource('peminjaman', PeminjamanController::class);
});

Route::post('/register', [AuthController::class, 'registrasi']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
