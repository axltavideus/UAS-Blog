<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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

Route::get('/posts/{post}/edit', [postController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [postController::class, 'update'])->name('posts.update');

Route::get('/posts/{post}', [PostController::class, 'showPost'])->name('posts.show');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/profile', function () {
    return view('profile');
});
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/categories/{category}/tags', [postController::class, 'getTags']);

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::get('/failed', function () {
    return view('failed');
});


Route::get('/profile', [LoginController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('/forget', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forget', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');