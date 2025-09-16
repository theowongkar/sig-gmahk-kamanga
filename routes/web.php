<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\CongregationController as DashboardCongregationController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WorshipController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Tentang Kami
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');

// Berita
Route::get('/berita', [PostController::class, 'index'])->name('post.index');
Route::get('/berita/{slug}', [PostController::class, 'show'])->name('post.show');

// Ibadah
Route::get('/ibadah', [WorshipController::class, 'index'])->name('worship.index');
Route::get('/ajukan-ibadah', [WorshipController::class, 'create'])->name('worship.create');
Route::post('/ajukan-ibadah', [WorshipController::class, 'store'])->name('worship.store')->middleware('throttle:5,5');

Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->middleware('throttle:5,1');
});

Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Dashboard Jemaat
    Route::get('/dashboard/jemaat', [DashboardCongregationController::class, 'index'])->name('dashboard.congregation.index');
    Route::get('/dashboard/jemaat/tambah', [DashboardCongregationController::class, 'create'])->name('dashboard.congregation.create');
    Route::post('/dashboard/jemaat/tambah', [DashboardCongregationController::class, 'store'])->name('dashboard.congregation.store');
    Route::get('/dashboard/jemaat/{id}', [DashboardCongregationController::class, 'show'])->name('dashboard.congregation.show');
    Route::get('/dashboard/jemaat/{id}/ubah', [DashboardCongregationController::class, 'edit'])->name('dashboard.congregation.edit');
    Route::put('/dashboard/jemaat/{id}/ubah', [DashboardCongregationController::class, 'update'])->name('dashboard.congregation.update');
    Route::delete('/dashboard/jemaat/{id}/hapus', [DashboardCongregationController::class, 'destroy'])->name('dashboard.congregation.destroy');
});
