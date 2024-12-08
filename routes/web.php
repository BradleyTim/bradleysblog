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
        'blogs' => Blog::with('user')->latest()->simplePaginate(10)
    ]);
});

Route::get('/blog/create', function () {
    return view('blogs.create');
});

Route::get('/blog/{id}', function ($id) {
    $blog = Blog::with('user')->findOrFail($id);
    return view('blogs.show', ['blog' => $blog]);
});

Route::post('/blog', function () {
    
    request()->validate([
        'title' => ['required', 'min:3', 'max:255'],
        'slug' => ['required', 'min:3', 'max:255'],
        'body' => ['required', 'min:3']
    ]);

    Blog::create([
        'title' => request('title'),
        'slug' => request('slug'),
        'body' => request('body'),
        'user_id' => 1
    ]);

    return redirect('/blog');
});
