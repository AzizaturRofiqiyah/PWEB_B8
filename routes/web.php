<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\InformasiBeasiswaController;

Route::get('/', [DashboardController::class,'welcome']);

Route::prefix('notifikasi')->group(function () {
    Route::get('/', [NotifikasiController::class, 'index'])->name('notifications.index');
    Route::post('/{notifikasi}/dibaca', [NotifikasiController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::post('/tandai-dibaca-semua', [NotifikasiController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
    Route::get('/{notification}', [NotifikasiController::class, 'show'])->name('notifications.show');
    Route::delete('/{notification}', [NotifikasiController::class, 'destroy'])->name('notifications.destroy');
});

Route::get('/konten',[KontenController::class,'index'])->name('konten.index');
Route::get('/konten/{konten}',[KontenController::class,'show'])->name('konten.show');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::get('/register/admin', [AuthController::class, 'showRegistrationFormAdmin'])->name('register-admin');
Route::post('/register/admin', [AuthController::class, 'registerAdmin'])->name('register-admin.store');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::get('/oauth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/oauth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::post('/komentar', [KomentarController::class, 'store'])->name('comment.store');
    Route::delete('/komentar/{komentar}', [KomentarController::class, 'destroy'])->name('comment.destroy');

    Route::middleware('super admin')->group(function(){

        Route::delete('/beasiswa/{beasiswa}', [InformasiBeasiswaController::class, 'destroy'])->name('beasiswa.destroy');
        Route::post('/beasiswa/{beasiswa}/approve', [InformasiBeasiswaController::class, 'approve'])->name('beasiswa.approve');
        Route::prefix('konten')->group(function(){
            Route::delete('/{id}', [KontenController::class, 'destroy'])->name('konten.destroy');
            Route::get('/create', [KontenController::class, 'create'])->name('konten.create');
            Route::post('/', [KontenController::class, 'store'])->name('konten.store');
            Route::get('/{id}/edit', [KontenController::class, 'edit'])->name('konten.edit');
            Route::put('/{id}', [KontenController::class, 'update'])->name('konten.update');
        });
        Route::prefix('institutions')->group(function () {
            Route::get('/', [InstitutionController::class, 'index'])->name('institutions.index');
            Route::get('/{institution}', [InstitutionController::class, 'show'])->name('institutions.show');
            Route::post('/{institution}/approve', [InstitutionController::class, 'approve'])->name('institutions.approve');});
    });

    Route::middleware('admin')->group(function(){
        Route::get('/beasiswa/create', [InformasiBeasiswaController::class, 'create'])->name('beasiswa.create');
        Route::post('/beasiswa', [InformasiBeasiswaController::class, 'store'])->name('beasiswa.store');
        Route::get('/beasiswa/{beasiswa}/edit', [InformasiBeasiswaController::class, 'edit'])->name('beasiswa.edit');
        Route::put('/beasiswa/{beasiswa}', [InformasiBeasiswaController::class, 'update'])->name('beasiswa.update');
    });
});


Route::get('/beasiswa', [InformasiBeasiswaController::class, 'index'])->name('beasiswa.index');
Route::get('/beasiswa/{beasiswa}', [InformasiBeasiswaController::class, 'show'])->name('beasiswa.show');
