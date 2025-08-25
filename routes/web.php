<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [PostController::class, 'guest'])->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Session routes
Route::get('/session/select', [SessionController::class, 'selectRole'])->name('session.select');
Route::post('/session/set', [SessionController::class, 'setRole'])->name('session.set');

// Admin only routes
Route::middleware(['role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class)->except(['show']);
});

// Author and Admin routes
Route::middleware(['role:author,admin'])->group(function () {
    Route::resource('posts', PostController::class);
});
