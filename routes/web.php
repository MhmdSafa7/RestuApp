<?php

<<<<<<< HEAD
use App\Http\Controllers\orderController;
use Illuminate\Support\Facades\Route;

// Home Index
Route::resource('/', 'App\Http\Controllers\indexcontroller');

// About
Route::resource('/about', 'App\Http\Controllers\aboutcontroller');

// Menu
Route::resource('/menu', 'App\Http\Controllers\MenuController');
Route::post('/order/add', [orderController::class, 'addToOrder'])->name('order.add');

// Reservation
Route::resource('/reservation', 'App\Http\Controllers\reservationcontroller');
Route::post('/newres', 'App\Http\Controllers\reservationController@store');

// Feedback
Route::resource('feedback', 'App\Http\Controllers\feedbackController');
Route::post('/newfeedback', 'App\Http\Controllers\feedbackController@store');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

=======
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
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    // Other admin routes...
});

// Editor Routes
Route::middleware(['auth', 'isEditor'])->group(function () {
    Route::get('/editor/home', [HomeController::class, 'editorHome'])->name('editor.home');
    // Other editor routes...
});

// Moderator Routes
Route::middleware(['auth', 'isModerator'])->group(function () {
    Route::get('/moderator/home', [HomeController::class, 'moderatorHome'])->name('moderator.home');
    // Other moderator routes...
});
>>>>>>> fafad3d9bb1ebe1d47cd1dfe745a38b46e59e29e
