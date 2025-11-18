<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;

Route::get('/', function () {
    return view('porfolio');
});

Route::get('/register',[AuthController::class,'showRegister'])->name('register.form');
Route::post('/register',[AuthController::class,'performRegister'])->name('register');

Route::get('/login',[AuthController::class,'showLogin'])->name('login.form');
Route::post('/login',[AuthController::class,'performLogin'])->name('login');

Route::get('/logout',function(){

});