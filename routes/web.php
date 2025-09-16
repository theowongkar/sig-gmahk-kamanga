<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\CongregationController as DashboardCongregationController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PostController as DashboardPostController;
use App\Http\Controllers\Dashboard\WorshipController as DashboardWorshipController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WorshipController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/dashboard/jemaat/{id}/ubah', [DashboardCongregationController::class, 'edit'])->name('dashboard.congregation.edit');
    Route::put('/dashboard/jemaat/{id}/ubah', [DashboardCongregationController::class, 'update'])->name('dashboard.congregation.update');
    Route::delete('/dashboard/jemaat/{id}/hapus', [DashboardCongregationController::class, 'destroy'])->name('dashboard.congregation.destroy');

    // Dashboard Berita
    Route::get('/dashboard/berita', [DashboardPostController::class, 'index'])->name('dashboard.post.index');
    Route::get('/dashboard/berita/tambah', [DashboardPostController::class, 'create'])->name('dashboard.post.create');
    Route::post('/dashboard/berita/tambah', [DashboardPostController::class, 'store'])->name('dashboard.post.store');
    Route::get('/dashboard/berita/{slug}/ubah', [DashboardPostController::class, 'edit'])->name('dashboard.post.edit');
    Route::put('/dashboard/berita/{slug}/ubah', [DashboardPostController::class, 'update'])->name('dashboard.post.update');
    Route::delete('/dashboard/berita/{slug}/hapus', [DashboardPostController::class, 'destroy'])->name('dashboard.post.destroy');

    // Dashboard Ibadah
    Route::get('/dashboard/ibadah', [DashboardWorshipController::class, 'index'])->name('dashboard.worship.index');
    Route::get('/dashboard/ibadah/tambah', [DashboardWorshipController::class, 'create'])->name('dashboard.worship.create');
    Route::post('/dashboard/ibadah/tambah', [DashboardWorshipController::class, 'store'])->name('dashboard.worship.store');
    Route::get('/dashboard/ibadah/{id}/ubah', [DashboardWorshipController::class, 'edit'])->name('dashboard.worship.edit');
    Route::put('/dashboard/ ibadah/{id}/ubah', [DashboardWorshipController::class, 'update'])->name('dashboard.worship.update');
    Route::delete('/dashboard/ibadah/{id}/hapus', [DashboardWorshipController::class, 'destroy'])->name('dashboard.worship.destroy');

    // Dashboard Ajukan Ibadah
    Route::get('/dashboard/ajukan-ibadah', [DashboardWorshipController::class, 'requestIndex'])->name('dashboard.request-worship.index');
    Route::get('/dashboard/ajukan-ibadah/{id}/ubah', [DashboardWorshipController::class, 'requestEdit'])->name('dashboard.request-worship.edit');
    Route::put('/dashboard/ajukan-ibadah/{id}/ubah', [DashboardWorshipController::class, 'requestUpdate'])->name('dashboard.request-worship.update');
    Route::delete('/dashboard/ajukan-ibadah/{id}/hapus', [DashboardWorshipController::class, 'requestDestroy'])->name('dashboard.request-worship.destroy');
});
