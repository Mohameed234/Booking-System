<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FlightController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [AuthController::class, 'showSignUpForm']);
Route::post('/signup', [AuthController::class, 'signUp'])->name('signup');

Route::get('/signin', [AuthController::class, 'showLoginForm']);
Route::post('/signin', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');








Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard' ,function(){
        return view('dashboard');
        });

        Route::resource('bookings', BookingController::class);

        Route::get('/flights/by-date', [BookingController::class, 'getFlightsByDate']);
        Route::resource('flights', FlightController::class);




});




