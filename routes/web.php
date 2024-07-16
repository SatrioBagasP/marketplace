<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/keranjang', [MainController::class, 'keranjang'])->middleware('auth');
Route::post('/addtocart', [MainController::class, 'addToCart'])->middleware('auth');
Route::post('/delcart', [MainController::class, 'delcart'])->middleware('auth');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/register', [DashboardController::class, 'register'])->middleware(['auth', 'alreadyShop']);
Route::post('/dashboard/register', [DashboardController::class, 'register'])->middleware(['auth', 'alreadyShop']);

Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->middleware(['auth', 'isShop']);
Route::get('/dashboard/product', [DashboardController::class, 'product'])->middleware(['auth', 'isShop']);
Route::get('/dashboard/create', [DashboardController::class, 'addproduct'])->middleware(['auth', 'isShop']);
Route::post('/dashboard/create', [DashboardController::class, 'addproduct'])->middleware(['auth', 'isShop']);
Route::get('/dashboard/edit/{id?}', [DashboardController::class, 'editproduct'])->middleware(['auth', 'isShop', 'productOwnerShip']);
Route::post('/dashboard/edit/{id?}', [DashboardController::class, 'updateproduct'])->middleware(['auth', 'isShop']);
Route::get('/dashboard/editprofile', [DashboardController::class, 'editprofile'])->middleware(['auth', 'isShop']);
Route::post('/dashboard/editprofile', [DashboardController::class, 'editprofile'])->middleware(['auth', 'isShop']);
Route::delete('/dashboard/product/{id?}', [DashboardController::class, 'delete_product'])->middleware(['auth', 'isShop']);

// Route::get('/singleproduct/{id?}', [MainController::class, 'single']);
