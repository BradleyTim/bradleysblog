<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;

Route::get('/', function () {
    return view('index', ['greeting' => 'Hello', 'name' => 'Bradley']);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/blog', function () {
    return view('blogs.index', [
        'blogs' => Blog::all()
    ]);
});

Route::get('/blog/{id}', function ($id) {
    return view('blogs.show', ['blog' => Blog::findOrFail($id)]);
});
