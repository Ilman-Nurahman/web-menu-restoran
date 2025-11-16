<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DashboardController;

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
    return redirect('/menu');
});

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::post('/order', [MenuController::class, 'storeOrder'])->name('order.store');
Route::get('/order/confirmation/{id}', [MenuController::class, 'orderConfirmation'])->name('order.confirmation');

// Login routes
Route::get('/login', [MenuController::class, 'showLogin'])->name('login');
Route::post('/login', [MenuController::class, 'processLogin'])->name('login.post');
Route::post('/logout', [MenuController::class, 'logout'])->name('logout');

// Dashboard routes (protected by auth and kasir middleware)
Route::middleware(['auth', 'kasir'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/orders', [DashboardController::class, 'orders'])->name('dashboard.orders');
    Route::post('/dashboard/orders/{id}/complete', [DashboardController::class, 'completeOrder'])->name('order.complete');
});
