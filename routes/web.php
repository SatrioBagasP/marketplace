<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/register', [LoginController::class, 'register']);
Route::get('/', [MainController::class, 'index']);
Route::get('/singleproduct/{id?}', [MainController::class, 'single'])->middleware('auth');
// Route::get('/singleproduct/{id?}', [MainController::class, 'single']);
