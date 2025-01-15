<?php

use Illuminate\Support\Facades\Route;

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
