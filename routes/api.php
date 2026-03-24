<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/user',[UserController::class, 'index']);


//Courses CRUD
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);
Route::post('/courses', [CourseController::class, 'store']);
Route::put('/courses/{id}', [CourseController::class, 'update']);
Route::delete('/courses/{id}', [CourseController::class, 'destroy']);
//Courses CRUD

//Users CRUD
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
//Users CRUD

//Category CRUD
Route::get('/users', [CategoryController::class, 'index']);
Route::post('/users', [CategoryController::class, 'store']);
//Category CRUD


