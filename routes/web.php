<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

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
        'blogs' => [
            [
                'id' => 1,
                'title' => 'first blog',
                'body' => 'first blog body'
            ],
            [
                'id' => 2,
                'title' => 'second blog',
                'body' => 'second blog body'
            ],
            [
                'id' => 3,
                'title' => 'third blog',
                'body' => 'third blog body'
            ]
        ]
    ]);
});

Route::get('/blog/{id}', function ($id) {
    $blogs = [
            [
                'id' => 1,
                'title' => 'first blog',
                'body' => 'first blog body'
            ],
            [
                'id' => 2,
                'title' => 'second blog',
                'body' => 'second blog body'
            ],
            [
                'id' => 3,
                'title' => 'third blog',
                'body' => 'third blog body'
            ]
        ];

    $blog = Arr::first($blogs, fn($blog) => $blog['id'] == $id);

    if (!$blog) {
        abort(404);
    }

    return view('blogs.show', ['blog' => $blog]);
});
