<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/oauth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/oauth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);


Route::get('/dashboard', function () {
    return view('user.dashboard');
});
