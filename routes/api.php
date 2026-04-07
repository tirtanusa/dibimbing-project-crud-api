<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


// Public routes
Route::get('/courses/top-rated', [CourseController::class, 'topRated']);
Route::get('/courses/lowest-price', [CourseController::class, 'lowestPrice']);
Route::apiResource('courses', CourseController::class)->only(['index','show']);
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::apiResource('categories', CategoryController::class)->only(['index','show']);


// Authenticated routes
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/me', [\App\Http\Controllers\AuthController::class, 'me']);
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

    Route::apiResource('/users', UserController::class)->except(['edit','create']);



    // Instructor only
    Route::middleware('role:instructor')->group(function () {
        Route::post('/courses', [CourseController::class, 'store']);
        Route::match(['PUT','PATCH'], '/courses/{course}', [CourseController::class, 'update']);
        Route::delete('/courses/{course}', [CourseController::class, 'destroy']);
    });

    Route::middleware('role:admin')->group(function () {
        // Student only routes can be added here in the future
        Route::apiResource('/categories', CategoryController::class)->except(['index','show']);
    });
});


