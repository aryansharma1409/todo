<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


Route::get('/login', [LoginController::class, 'index']);

Route::post('/login', [LoginController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/register', [RegisterController::class,'index']);
Route::post('/register', [RegisterController::class,'store']);
