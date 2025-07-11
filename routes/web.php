<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PendaftaranController;
// use App\Http\Controllers\AuthController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/layout', function () {
    return view('layouts/dashboard');
});


Route::middleware('guest')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::get('/', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('/', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
    Route::get('/pendaftaran/add', [PendaftaranController::class, 'create']);
    Route::post('/pendaftaran/add', [PendaftaranController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});