<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;

// Home Index
Route::resource('/', 'App\Http\Controllers\indexcontroller');

// About
Route::resource('/about', 'App\Http\Controllers\aboutcontroller');

// Menu
Route::resource('/menu', 'App\Http\Controllers\MenuController');

// Reservation
Route::resource('/reservation', 'App\Http\Controllers\reservationcontroller');
Route::post('/newres', 'App\Http\Controllers\reservationController@store');

// Feedback
Route::resource('feedback', 'App\Http\Controllers\feedbackController');
Route::post('/newfeedback', 'App\Http\Controllers\feedbackController@store');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin routes
Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    // Other admin routes...
});

// Editor routes
Route::group(['middleware' => ['auth', 'isEditor']], function () {
    Route::get('/editor/home', [HomeController::class, 'editorHome'])->name('editor.home');
    // Other editor routes...
});

// Moderator routes
Route::group(['middleware' => ['auth', 'isModerator']], function () {
    Route::get('/moderator/home', [HomeController::class, 'moderatorHome'])->name('moderator.home');
    // Other moderator routes...
});
