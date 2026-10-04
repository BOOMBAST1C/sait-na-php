<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JournalistController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// --- МАРШРУТЫ АВТОРИЗАЦИИ ---
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- ОСНОВНЫЕ МАРШРУТЫ ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/journalist', [JournalistController::class, 'create'])->name('journalist');
Route::post('/journalist', [JournalistController::class, 'store'])->name('journalist.store');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');