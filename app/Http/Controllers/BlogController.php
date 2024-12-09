<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            'blogs' => Blog::with('user')->latest()->simplePaginate(10)
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', ['blog' => $blog]);
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
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
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit', ['blog' => $blog]);
    }

    public function update(Blog $blog)
    {
        //todo: authorize 

        request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'slug' => ['required', 'min:3', 'max:255'],
            'body' => ['required', 'min:3']
        ]);

        $blog->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'body' => request('body'),
        ]);

        return redirect("/blog/{$blog->id}");
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect('/blog');
    }
}
