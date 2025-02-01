<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\ChatbotController;

// Home Index
Route::resource('/', IndexController::class);

// About
Route::resource('/about', AboutController::class);

// Menu
Route::resource('/menu', MenuController::class);
Route::get('/', [MenuController::class, 'index'])->name('menu.index');
Route::post('/menu/add/{productId}', [MenuController::class, 'addProduct'])->name('menu.add');
Route::post('/menu/remove/{productId}', [MenuController::class, 'removeProduct'])->name('menu.remove');



// Reservation
Route::resource('/reservation', ReservationController::class);
Route::post('/newres', [ReservationController::class, 'store'])->name('reservation.store');

// Feedback
Route::resource('feedback', FeedbackController::class);
Route::post('/newfeedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Chatbot Route
Route::post('/sendchat', [ChatbotController::class, 'SendChat'])->name('chatbot.send');

// Admin Routes
Auth::routes(['register' => false]);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::post('register', [RegisterController::class, 'register']);
    Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('adminHome', 'App\Http\Controllers\HomeController@adminView')->name('admin.view');

    // Admin Feedback
    Route::resource('/feedbackview', 'App\Http\Controllers\adminfeedbackController');
    // Feedback chart
    Route::get('/statistics', [StatisticsController::class, 'statisticsPage'])->name('statistics');

    // Admin Reservation
    Route::resource('/reservationview', 'App\Http\Controllers\adminreservationController');
    Route::get('/reservations/data', [ReservationController::class, 'getReservationsData']);

    // Admin Product
    Route::resource('/product', 'App\Http\Controllers\ProductController');
    Route::post('/newproduct', 'App\Http\Controllers\ProductController@store');
    Route::get('deletep/{id}', 'App\Http\Controllers\ProductController@destroy');

    // Admin Offers
    Route::resource('/offers', 'App\Http\Controllers\offersController');
    Route::post('/newoffer', 'App\Http\Controllers\offersController@store');
    Route::get('delete1/{id}', 'App\Http\Controllers\offersController@destroy');

    // Admin Events
    Route::resource('/events', 'App\Http\Controllers\eventsController');
    Route::post('/newevent', 'App\Http\Controllers\eventsController@store');
    Route::get('delete/{id}', 'App\Http\Controllers\eventsController@destroy');

    // Chatbot
    Route::get('/chatbot', function () {
        return view('chatbot');
    });
});
