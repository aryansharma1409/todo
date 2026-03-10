<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;


Route::get('/login', [LoginController::class, 'index']);

Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [TaskController::class,'index'])->middleware('auth');

Route::get('/register', [RegisterController::class,'index'])->middleware('guest');
Route::post('/register', [RegisterController::class,'store']);

Route::put('/profile/update', [UserController::class, 'update']);

Route::get('/', [TaskController::class,'index']);

Route::get('/tasks', [TaskController::class,'index']);

Route::post('/tasks', [TaskController::class,'store']);

Route::put('/tasks/{task}', [TaskController::class,'update']);

Route::delete('/tasks/{task}', [TaskController::class,'destroy']);

Route::post('/tasks/{task}/toggle', [TaskController::class,'toggle']);
