<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('home');
});

Route::resource('posts', postController::class);

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/post', function () {
    return view('post');
});

Route::get('/profile', function () {
    return view('profile');
});

