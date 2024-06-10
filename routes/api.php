<?php

use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });

    Route::prefix('address')->group(function () {
       Route::get('', [AddressController::class, 'getAddressByZipcode']);
    });
});

Route::get('unauthenticate', function () {
    return response()->json(['Não autenticado'], 403);
})->name('unauthenticate');
