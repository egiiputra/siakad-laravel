<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AuthController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login']);

Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
Route::get('/pendaftaran/add', [PendaftaranController::class, 'create']);
Route::post('/pendaftaran/add', [PendaftaranController::class, 'store']);