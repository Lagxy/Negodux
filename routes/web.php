<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UmkmController;

Route::get('/', function () {
    return view('welcome');
});

// UMKM Routes
Route::get('/umkm', [UmkmController::class, 'index']);
Route::get('/umkm/create', [UmkmController::class, 'create']);
Route::post('/umkm', [UmkmController::class, 'store']);
Route::get('/umkm/{id}', [UmkmController::class, 'show']);

// Mentor Routes
Route::get('/mentors', [\App\Http\Controllers\MentorController::class, 'index']);
Route::get('/mentors/create', [\App\Http\Controllers\MentorController::class, 'create']);
Route::post('/mentors', [\App\Http\Controllers\MentorController::class, 'store']);
Route::get('/mentors/{id}', [\App\Http\Controllers\MentorController::class, 'show']);

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/faq', function () {
    return view('faq');
});