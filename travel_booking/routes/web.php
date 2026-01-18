<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [AuthController::class, 'showSignUpForm']);
Route::post('/signup', [AuthController::class, 'signUp']);



Route::get('/dashboard' ,function(){
    return view('dashboard');
});

