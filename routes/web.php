<?php

use App\Http\Controllers\AccountController;
use App\Http\Middleware\CheckUserLogin;
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
Route::get('/login', [AccountController::class, 'login'])->name('login');
Route::get('/register', [AccountController::class, 'register'])->name('register');
Route::post('/checkUserLogin', [AccountController::class, 'checkUserLogin'])->name('checkUserLogin');
Route::post('/storeRegistration', [AccountController::class, 'storeRegistration'])->name('storeRegistration');
Route::middleware(CheckUserLogin::class)->group(function () {
    Route::post('/logout', [AccountController::class, 'logout'])->name('logout');
    Route::get('/home', [AccountController::class, 'home'])->name('home');
});

