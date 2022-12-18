<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[PublicController::class, 'index']);
//proses login dan registrasi
Route::middleware(['only_guest'])->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::POST('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});
//berhasil login
    Route::middleware(['auth'])->group(function () {
        Route::get('logout', [AuthController::class, 'logout']);

        Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['only_admin']);
        Route::get('profile', [UserController::class, 'profile'])->middleware(['only_client']);
    });