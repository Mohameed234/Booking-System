<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [AuthController::class, 'showSignUpForm']);
Route::post('/signup', [AuthController::class, 'signUp'])->name('signup');

Route::get('/signin', [AuthController::class, 'showLoginForm']);
Route::post('/signin', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');








// Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard' ,function(){
            return view('dashboard');
    });


// });




