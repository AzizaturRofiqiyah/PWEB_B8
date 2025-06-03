<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\SocialAuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/konten',[KontenController::class,'index'])->name('konten.index');
Route::get('/konten/{konten}',[KontenController::class,'show'])->name('konten.show');
Route::get('/konten/create', [KontenController::class, 'create'])->name('konten.create');
Route::post('/konten', [KontenController::class, 'store'])->name('konten.store');
Route::get('/konten/{id}/edit', [KontenController::class, 'edit'])->name('konten.edit');
Route::put('/konten/{id}', [KontenController::class, 'update'])->name('konten.update');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::get('/register/admin', [AuthController::class, 'showRegistrationFormAdmin']);
Route::post('/register/admin', [AuthController::class, 'registerAdmin'])->name('register-admin');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/oauth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/oauth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);
Route::get('/school', function(){
    return view('user.schoolarship.show');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
});
