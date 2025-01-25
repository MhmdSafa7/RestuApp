<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FeedbackController;

// Home Index
Route::resource('/', IndexController::class);

// About
Route::resource('/about', AboutController::class);

// Menu
Route::resource('/menu', MenuController::class);

// Reservation
Route::resource('/reservation', ReservationController::class);
Route::post('/newres', [ReservationController::class, 'store'])->name('reservation.store');

// Feedback
Route::resource('feedback', FeedbackController::class);
Route::post('/newfeedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Authentication Routes
Auth::routes();

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    // Other admin routes...
});

// Editor Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/editor/home', [HomeController::class, 'adminHome'])->name('editor.home');
    // Other editor routes...
});

// Moderator Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/moderator/home', [HomeController::class, 'adminHome'])->name('moderator.home');
    // Other moderator routes...
});
