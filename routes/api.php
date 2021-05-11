<?php

use Illuminate\Support\Facades\Route;

// Controllers imports
use App\Http\Controllers\DeliverableStatusController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\DeliverableController;
use App\Http\Controllers\SaleHeaderController;
use App\Http\Controllers\SaleStatusController;
use App\Http\Controllers\SaleDetailController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\WeekDayController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});

Route::prefix('public')->group(function () {
    Route::get('/semesters', [SemesterController::class, 'getALl']);
    Route::get('/user-types', [UserTypeController::class, 'getAll']);
});

Route::group(['middleware' => 'auth:api'], function () {

    Route::prefix('user-types')->group(function () {
        Route::get('', [UserTypeController::class, 'getAll']);

        Route::group(['middleware' => ['auth', 'checkUserType:Admin']], function () {
            Route::post('', [UserTypeController::class, 'create']);
            Route::put('/{id}', [UserTypeController::class, 'update']);
            Route::get('/{id}', [UserTypeController::class, 'getById']);
            Route::delete('/{id}', [UserTypeController::class, 'delete']);
        });

    });

    Route::prefix('semesters')->group(function () {
        Route::get('', [SemesterController::class, 'getALl']);

        Route::group(['middleware' => ['auth', 'checkUserType:Admin']], function () {
            Route::post('', [SemesterController::class, 'create']);
            Route::put('/{id}', [SemesterController::class, 'update']);
            Route::get('/{id}', [SemesterController::class, 'getById']);
            Route::delete('/{id}', [SemesterController::class, 'delete']);
        });
    });

    Route::prefix('activities')->group(function () {
        Route::get('', [ActivityController::class, 'getAll']);
        Route::get('/{id}', [ActivityController::class, 'getById']);

        Route::group(['middleware' => ['auth', 'checkUserType:Admin,Teacher']], function () {
            Route::post('', [ActivityController::class, 'create']);
            Route::put('/{id}', [ActivityController::class, 'update']);
            Route::delete('/{id}', [ActivityController::class, 'delete']);
        });
    });

    Route::prefix('courses')->group(function () {
        Route::get('', [CourseController::class, 'getAll']);
        Route::get('/{id}', [CourseController::class, 'getById']);

        Route::group(['middleware' => ['auth', 'checkUserType:Admin,Teacher']], function () {
            Route::post('', [CourseController::class, 'create']);
            Route::put('/{id}', [CourseController::class, 'update']);
            Route::delete('/{id}', [CourseController::class, 'delete']);
        });
    });

    Route::prefix('deliverables')->group(function () {
        Route::get('', [DeliverableController::class, 'getAll']);
        Route::post('', [DeliverableController::class, 'create']);
        Route::put('/{id}', [DeliverableController::class, 'update']);
        Route::get('/{id}', [DeliverableController::class, 'getById']);
        Route::delete('/{id}', [DeliverableController::class, 'delete']);
    });

    Route::prefix('deliverable-statuses')->group(function () {
        Route::get('', [DeliverableStatusController::class, 'getAll']);
        Route::get('/{id}', [DeliverableStatusController::class, 'getById']);

        Route::group(['middleware' => ['auth', 'checkUserType:Admin']], function () {
            Route::post('', [DeliverableStatusController::class, 'create']);
            Route::put('/{id}', [DeliverableStatusController::class, 'update']);
            Route::delete('/{id}', [DeliverableStatusController::class, 'delete']);
        });
    });

    Route::prefix('prices')->group(function () {
        Route::get('', [PriceController::class, 'getAll']);
        Route::get('/{id}', [PriceController::class, 'getById']);

        Route::group(['middleware' => ['auth', 'checkUserType:Admin,Teacher']], function () {
            Route::post('', [DeliverableStatusController::class, 'create']);
            Route::put('/{id}', [DeliverableStatusController::class, 'update']);
            Route::delete('/{id}', [DeliverableStatusController::class, 'delete']);
        });
    });

    Route::prefix('rewards')->group(function () {
        Route::get('', [RewardController::class, 'getAll']);
        Route::get('/{id}', [RewardController::class, 'getById']);

        Route::group(['middleware' => ['auth', 'checkUserType:Admin,Teacher']], function () {
            Route::post('', [RewardController::class, 'create']);
            Route::put('/{id}', [RewardController::class, 'update']);
            Route::delete('/{id}', [RewardController::class, 'delete']);
        });
    });

    Route::prefix('sale-details')->group(function () {
        Route::get('', [SaleDetailController::class, 'getAll']);
        Route::post('', [SaleDetailController::class, 'create']);
        Route::put('/{id}', [SaleDetailController::class, 'update']);
        Route::get('/{id}', [SaleDetailController::class, 'getById']);

        Route::group(['middleware' => ['auth', 'checkUserType:Admin,Teacher']], function () {
            Route::delete('/{id}', [SaleDetailController::class, 'delete']);
        });
    });

    Route::prefix('sale-headers')->group(function () {
        Route::get('', [SaleHeaderController::class, 'getAll']);
        Route::post('', [SaleHeaderController::class, 'create']);
        Route::put('/{id}', [SaleHeaderController::class, 'update']);
        Route::get('/{id}', [SaleHeaderController::class, 'getById']);

        Route::group(['middleware' => ['auth', 'checkUserType:Admin,Teacher']], function () {
            Route::delete('/{id}', [SaleHeaderController::class, 'delete']);
        });
    });

    Route::prefix('sale-statuses')->group(function () {
        Route::get('', [SaleStatusController::class, 'getAll']);
        Route::get('/{id}', [SaleStatusController::class, 'getById']);

        Route::group(['middleware' => ['auth', 'checkUserType:Admin']], function () {
            Route::post('', [SaleStatusController::class, 'create']);
            Route::put('/{id}', [SaleStatusController::class, 'update']);
            Route::delete('/{id}', [SaleStatusController::class, 'delete']);
        });
    });

    Route::prefix('shops')->group(function () {
        Route::get('', [ShopController::class, 'getAll']);
        Route::get('/{id}', [ShopController::class, 'getById']);

        Route::group(['middleware' => ['auth', 'checkUserType:Admin,Teacher']], function () {
            Route::post('', [ShopController::class, 'create']);
            Route::put('/{id}', [ShopController::class, 'update']);
            Route::delete('/{id}', [ShopController::class, 'delete']);
        });
    });

    Route::prefix('student-courses')->group(function () {
        Route::get('', [StudentCourseController::class, 'getAll']);
        Route::post('', [StudentCourseController::class, 'create']);
        Route::put('/{id}', [StudentCourseController::class, 'update']);
        Route::get('/{id}', [StudentCourseController::class, 'getById']);
        Route::delete('/{id}', [StudentCourseController::class, 'delete']);
    });

    Route::prefix('users')->group(function () {
        Route::get('', [UserController::class, 'getAll']);
        Route::get('/{id}', [UserController::class, 'getById']);

        Route::group(['middleware' => ['auth', 'checkUserType:Admin']], function () {
            Route::post('', [UserController::class, 'create']);
            Route::put('/{id}', [UserController::class, 'update']);
            Route::delete('/{id}', [UserController::class, 'delete']);
        });
    });

    Route::prefix('week-days')->group(function () {
        Route::get('', [WeekDayController::class, 'getAll']);
        Route::get('/{id}', [WeekDayController::class, 'getById']);

        Route::group(['middleware' => ['auth', 'checkUserType:Admin']], function () {
            Route::post('', [WeekDayController::class, 'create']);
            Route::put('/{id}', [WeekDayController::class, 'update']);
            Route::delete('/{id}', [WeekDayController::class, 'delete']);
        });
    });

});

