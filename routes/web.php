<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;


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
    return view('home');
})->name('home');




Route::get('/auth', [AuthController::class, 'showAuthPage'])->name('auth.page');
Route::post('/register', [AuthController::class, 'register'])->name('user.register');
Route::post('/login', [AuthController::class, 'login'])->name('user.login');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Page login admin
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.action');

// Dashboard admin (protégé)
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('admin.auth')->name('admin.dashboard');

// Déconnexion admin
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
