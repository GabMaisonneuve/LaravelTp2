<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\ForumPostController;
use App\Http\Controllers\SharedFileController;

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Language switch
Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

// Student routes (all CRUD) - only accessible if authenticated
Route::middleware('auth')->group(function () {
    Route::resource('student', StudentController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('forum', ForumPostController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('files', SharedFileController::class);
});
// Home page points to students list
Route::get('/', [StudentController::class, 'index'])->name('home');

