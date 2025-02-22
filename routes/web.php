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
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserHistoryController;



// Home Index
Route::resource('/', IndexController::class);

// About
Route::resource('/about', AboutController::class);

// Menu
Route::resource('/menu', MenuController::class);
//order
Route::post('/newers', [OrderController::class, 'storeOrder'])->name('order.store'); // Create an order
Route::get('/orders/{order}', [OrderController::class, 'show']); // View a specific order
Route::get('/orders', [OrderController::class, 'index']); // View all orders


// Reservation
Route::resource('/reservation', ReservationController::class);
Route::post('/newres', [ReservationController::class, 'store'])->name('reservation.store');

// Feedback
Route::resource('feedback', FeedbackController::class);
Route::post('/newfeedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Chatbot
Route::post('/sendchat', [ChatbotController::class, 'SendChat'])->name('chatbot.send');
Route::get('/chatbot', function () {
    return view('pages.chatbot'); });

//chatbot get data
Route::get('/reservationsdb', [ChatbotController::class, 'getAllReservations']);
Route::get('/eventsdb', [ChatbotController::class, 'getAllEvents']);
Route::get('/offersdb', [ChatbotController::class, 'getAllOffers']);
Route::get('/productsdb', [ChatbotController::class, 'getAllProducts']);

//user history
Route::get('/history', [UserHistoryController::class, 'index'])->name('history');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Admin Routes
Auth::routes(['register' => false]);

//admin register
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('newregister', [RegisterController::class, 'register'])->name('newregister');
//user register
Route::get('UserRegister', [RegisterController::class, 'showUserRegistrationForm'])->name('UserRegister');
Route::post('NewUserRegister', [RegisterController::class, 'registerUser'])->name('createUser');


Route::middleware(['auth'])->group(function () {

    Route::post('register', [RegisterController::class, 'register']);

    // Admin Access (Feedback, Reservations, Product, Offers, Events, Statistics)
    //feedback
    Route::resource('/feedbackview', 'App\Http\Controllers\adminfeedbackController');
    //reservations
    Route::resource('/reservationview', 'App\Http\Controllers\adminreservationController');
    Route::get('/reservations/data', [ReservationController::class, 'getReservationsData']);
    //product
    Route::resource('/product', 'App\Http\Controllers\ProductController');
    Route::post('/newproduct', 'App\Http\Controllers\ProductController@store');
    Route::get('deletep/{id}', 'App\Http\Controllers\ProductController@destroy');
    //offers
    Route::resource('/offers', 'App\Http\Controllers\offersController');
    Route::post('/newoffer', 'App\Http\Controllers\offersController@store');
    Route::get('delete1/{id}', 'App\Http\Controllers\offersController@destroy');
    //events
    Route::resource('/events', 'App\Http\Controllers\eventsController');
    Route::post('/newevent', 'App\Http\Controllers\eventsController@store');
    Route::get('delete/{id}', 'App\Http\Controllers\eventsController@destroy');
    //statistics
    Route::get('/statistics', [StatisticsController::class, 'statisticsPage'])->name('statistics');

});


