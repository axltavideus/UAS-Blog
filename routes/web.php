<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;

Route::get('/', function () {
    return view('home');
});

Route::resource('posts', postController::class);

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/post', function () {
    return view('post');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

