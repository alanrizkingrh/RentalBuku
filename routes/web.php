<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CategoryController;
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

        Route::get('profile', [UserController::class, 'profile'])->middleware(['only_client']);

        Route::middleware(['only_admin'])->group(function () {
            Route::get('dashboard', [DashboardController::class, 'index']);
    
            Route::get('books', [BookController::class, 'index']);
            Route::get('book-add', [BookController::class, 'add']);
            Route::post('book-add', [BookController::class, 'store']);
            Route::get('book-edit/{slug}', [BookController::class, 'edit'])->name('book-edit');
            Route::post('book-edit/{slug}', [BookController::class, 'update'])->name('book-update');
            Route::get('book-delete/{slug}', [BookController::class, 'delete'])->name('book-delete');
            Route::get('book-destroy/{slug}', [BookController::class, 'destroy'])->name('book-destroy');
            Route::get('book-deleted', [BookController::class, 'deletedBook'])->name('list-deletedBook');
            Route::get('book-restore/{slug}', [BookController::class, 'restore'])->name('book-restore');

            Route::get('categories', [CategoryController::class, 'index']);
            Route::get('category-add', [CategoryController::class, 'add']);
            Route::POST('category-add', [CategoryController::class, 'store']);
            Route::get('category-edit/{slug}', [CategoryController::class,'edit'])->name('category-edit');
            Route::put('category-edit/{slug}', [CategoryController::class, 'update'])->name('category-update');
            Route::get('category-delete/{slug}', [CategoryController::class, 'delete'])->name('category-delete');
            Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy'])->name('category-destroy');
            Route::get('category-deleted', [CategoryController::class, 'deletedCategory'])->name('list-deletedCategory');
            Route::get('category-restore/{slug}', [CategoryController::class, 'restore'])->name('category-restore');
            
            Route::get('users', [UserController::class, 'index']);

            Route::get('book-rent', [BookRentController::class, 'index']);
            Route::get('book-return', [BookRentController::class, 'store']);
    
            Route::get('rent-logs', [RentLogController::class, 'index']);

            });
        });