<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/category', [SiteController::class, 'category'])->name('category');
Route::get('/journalist', [SiteController::class, 'journalist'])->name('journalist');
Route::post('/journalist', [SiteController::class, 'store'])->name('journalist.store');
Route::get('/admin', [SiteController::class, 'admin'])->name('admin');
Route::delete('/admin/{id}', [SiteController::class, 'destroy'])->name('admin.destroy');