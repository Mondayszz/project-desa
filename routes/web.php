<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Route utama (Halaman depan)
Route::get('/', [PageController::class, 'index'])->name('home');

// Halaman lainnya
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/statistik', [PageController::class, 'statistik'])->name('statistik');
Route::get('/potensi', [PageController::class, 'potensi'])->name('potensi');
Route::get('/wilayah', [PageController::class, 'wilayah'])->name('wilayah');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');


// Authentication routes
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Admin routes (protected)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Potensi routes
    Route::get('/potensi', [AdminController::class, 'potensi'])->name('admin.potensi');
    Route::get('/potensi/create', [AdminController::class, 'potensiCreate'])->name('admin.potensi.create');
    Route::post('/potensi', [AdminController::class, 'potensiStore'])->name('admin.potensi.store');
    Route::get('/potensi/{id}/edit', [AdminController::class, 'potensiEdit'])->name('admin.potensi.edit');
    Route::put('/potensi/{id}', [AdminController::class, 'potensiUpdate'])->name('admin.potensi.update');
    Route::delete('/potensi/{id}', [AdminController::class, 'potensiDestroy'])->name('admin.potensi.destroy');

    // Statistik routes
    Route::get('/statistik', [AdminController::class, 'statistik'])->name('admin.statistik');
    Route::put('/statistik', [AdminController::class, 'statistikUpdate'])->name('admin.statistik.update');

    // Profil routes
    Route::get('/profil', [AdminController::class, 'profil'])->name('admin.profil');
    Route::put('/profil', [AdminController::class, 'profilUpdate'])->name('admin.profil.update');

    // Kontak routes
    Route::get('/kontak', [AdminController::class, 'kontak'])->name('admin.kontak');
    Route::put('/kontak', [AdminController::class, 'kontakUpdate'])->name('admin.kontak.update');

    // Wilayah routes
    Route::get('/wilayah', [AdminController::class, 'wilayah'])->name('admin.wilayah');
    Route::put('/wilayah', [AdminController::class, 'wilayahUpdate'])->name('admin.wilayah.update');

    // Struktur Organisasi routes
    Route::get('/struktur', [AdminController::class, 'struktur'])->name('admin.struktur');
    Route::get('/struktur/create', [AdminController::class, 'strukturCreate'])->name('admin.struktur.create');
    Route::post('/struktur', [AdminController::class, 'strukturStore'])->name('admin.struktur.store');
    Route::get('/struktur/{id}/edit', [AdminController::class, 'strukturEdit'])->name('admin.struktur.edit');
    Route::put('/struktur/{id}', [AdminController::class, 'strukturUpdate'])->name('admin.struktur.update');
    Route::delete('/struktur/{id}', [AdminController::class, 'strukturDestroy'])->name('admin.struktur.destroy');

    // Profile Admin routes
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/profile', [AdminController::class, 'profileUpdate'])->name('admin.profile.update');
});
