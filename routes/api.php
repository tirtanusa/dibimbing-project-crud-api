<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/user',[UserController::class, 'index']);


//Courses CRUD
Route::apiResource('courses', CourseController::class)->except(['edit', 'create']);
Route::middleware(['role:instructor'])->group(function () {
    Route::post('/courses', [CourseController::class, 'store']);
    Route::match(['PUT', 'PATCH'], '/courses/{course}', [CourseController::class, 'update']);
    Route::delete('/courses/{course}', [CourseController::class, 'destroy']);
});
//Courses CRUD

//Users CRUD
Route::apiResource('users', UserController::class)->except(['edit', 'create']);
//Users CRUD

//Category CRUD
Route::apiResource('categories', CategoryController::class)->except(['edit', 'create']);
//Category CRUD


