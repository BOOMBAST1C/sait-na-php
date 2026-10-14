<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JournalistController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// --- МАРШРУТЫ АВТОРИЗАЦИИ (доступны всем) ---
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- ОБЩИЕ МАРШРУТЫ (Главная и Категория) ---
// Доступны всем, но если нужно ограничить только авторизованными, добавьте 'auth'
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category', [CategoryController::class, 'index'])->name('category');

// --- МАРШРУТЫ ДЛЯ ЖУРНАЛИСТА И АДМИНА ---
// Доступ имеют пользователи с ролью 'journalist' ИЛИ 'admin'
Route::middleware(['auth', 'role:journalist|admin'])->group(function () {
    Route::get('/journalist', [JournalistController::class, 'create'])->name('journalist');
    Route::post('/journalist', [JournalistController::class, 'store'])->name('journalist.store');
});

// --- МАРШРУТЫ ТОЛЬКО ДЛЯ АДМИНА ---
// Доступ имеет только пользователь с ролью 'admin'
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::post('/admin/user/{userId}/role', [AdminController::class, 'assignRole'])->name('admin.assignRole');
});
// Просмотр отдельной статьи
Route::get('/text/{id}', [HomeController::class, 'show'])->name('text.show');