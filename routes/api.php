<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers imports
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\SemesterController;


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});


Route::prefix('user-types')->group(function () {
    Route::get('', [UserTypeController::class, 'getAll']);
    Route::post('', [UserTypeController::class, 'create']);
    Route::put('/{id}', [UserTypeController::class, 'update']);
    Route::get('/{id}', [UserTypeController::class, 'getById']);
    Route::delete('/{id}', [UserTypeController::class, 'delete']);
});

Route::prefix('semesters')->group(function () {
    Route::get('', [SemesterController::class, 'getALl']);
    Route::post('', [SemesterController::class, 'create']);
    Route::put('/{id}', [SemesterController::class, 'update']);
    Route::get('/{id}', [SemesterController::class, 'getById']);
    Route::delete('/{id}', [SemesterController::class, 'delete']);
});
