<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('home');
});

Route::resource('posts', postController::class);

Route::get('/post', function () {
    return view('post');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::get('/categories/{category}/tags', [postController::class, 'getTags']);

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('home', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::get('/failed', function () {
    return view('failed');
});