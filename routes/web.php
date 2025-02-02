<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['greeting' => 'Hello', 'name' => 'Bradley']);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/blog', [BlogController::class, 'index']);
Route::post('/blog', [BlogController::class, 'store']);
Route::get('/blog/create', [BlogController::class, 'create']);
Route::get('/blog/{blog}', [BlogController::class, 'show']);
Route::get('/blog/{blog}/edit', [BlogController::class, 'edit']);
Route::patch('/blog/{blog}', [BlogController::class, 'update']);
Route::delete('/blog/{blog}', [BlogController::class, 'destroy']);

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);