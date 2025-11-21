<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\JackpotController;
use App\Models\Jackpot;


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
    $jackpot_actif = Jackpot::where('status', 'Lancer')->first();
    return view('home', compact('jackpot_actif'));
});



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

//jackpots
Route::middleware(['auth:admin'])->group(function () {

    Route::get('/admin/dashboard', [JackpotController::class, 'index'])->name('admin.dashboard');

    Route::post('/admin/jackpot/store', [JackpotController::class, 'store'])->name('jackpot.store');

    Route::post('/admin/jackpot/update/{jackpot}', [JackpotController::class, 'update'])->name('jackpot.update');

    Route::post('/admin/jackpot/delete/{jackpot}', [JackpotController::class, 'destroy'])->name('jackpot.delete');

});
