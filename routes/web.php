<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\UiController;
use App\Http\Controllers\SuperAdmin\LoginController;
use App\Http\Controllers\SuperAdmin\ShopController;
use App\Http\Controllers\SuperAdmin\LocationController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UiController::class, 'dashboard'])->name('dashboard');
    Route::get('/add_shop', [UiController::class, 'add_shop'])->name('add_shop');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/shop_upload', [ShopController::class, 'saveData'])->name('shop_upload');
    Route::post('/search_shop', [LocationController::class, 'search'])->name('search_shop');
});

Route::get('/signin', [UiController::class, 'index'])->name('signin');

Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');

