<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Auth
Route::get('/login', [LoginController::class,'show'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'login'])->name('login.attempt')->middleware('guest');
Route::get('/logout', [LoginController::class,'logout'])->name('logout')->middleware('auth');

Route::get('/register', [RegisterController::class,'show'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class,'register'])->name('register.store')->middleware('guest');

// Dashboard (auth)
Route::get('/dashboard', DashboardController::class)->name('dashboard')->middleware('auth');

// Posts CRUD (auth)
Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
    // Route::post('/posts', [PostController::class,'store'])->name('posts.store');
    // Route::get('/posts/{post:slug}/edit', [PostController::class,'edit'])->name('posts.edit');
    // Route::put('/posts/{post:slug}', [PostController::class,'update'])->name('posts.update');
    // Route::delete('/posts/{post:slug}', [PostController::class,'destroy'])->name('posts.destroy');
    // Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
});

// Admin only (contoh tambah kategori)
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/categories/create', [CategoryController::class,'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class,'store'])->name('categories.store');
});

// Home (publik)
Route::get('/', [PostController::class,'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class,'show'])->name('posts.show');

// Kategori (publik + admin tambah)
Route::get('/categories', [CategoryController::class,'list'])->name('categories.list');
