<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HelloWorldController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Register hello route
Route::get('/hello', function () {
    return 'Hello, World!';
});


Route::get('/dashboard', function () {
    return 'Welcome to your Dashboard!';
})->middleware('auth');

Route::get('/hello-controller', [HelloWorldController::class, 'index']);


Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Logout route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
