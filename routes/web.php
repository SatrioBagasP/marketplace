<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/', [MainController::class, 'index']);
Route::get('/singleproduct/{id?}', [MainController::class, 'single']);
