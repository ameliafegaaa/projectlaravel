<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShoesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Route::get('/order_status', function () {
    return view('order');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/dashboard/users', [DashboardController::class, 'users']);
Route::post('/dashboard/users/delete', [DashboardController::class, 'users_delete']);

Route::get('/dashboard/shoes', [DashboardController::class, 'shoes']);
Route::post('/dashboard/shoes/delete', [DashboardController::class, 'shoes_delete']);
Route::post('/dashboard/shoes/insert', [DashboardController::class, 'shoes_insert']);
Route::post('/dashboard/shoes/update', [DashboardController::class, 'shoes_update']);

Route::get('/dashboard/sales', [DashboardController::class, 'sales']);

Route::get('/shoeslist', [ShoesController::class, 'index']);
Route::get('/shoeslist/{brand}', [ShoesController::class, 'list_by_brand']);

Route::get('/details/{id}', [ShoesController::class, 'details']);
Route::get('/order_history', [ShoesController::class, 'order_history']);
Route::post('/checkout', [ShoesController::class, 'checkout']);
Route::post('/checkout/process', [ShoesController::class, 'checkout_process']);

Route::post('/auth/signin', [AuthController::class, 'signin']);
Route::post('/auth/signup', [AuthController::class, 'signup']);
Route::get('/logout', [AuthController::class, 'signout']);