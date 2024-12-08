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
        'blogs' => Blog::with('user')->simplePaginate(3)
    ]);
});

Route::get('/blog/{id}', function ($id) {
    $blog = Blog::with('user')->findOrFail($id);
    return view('blogs.show', ['blog' => $blog]);
});
