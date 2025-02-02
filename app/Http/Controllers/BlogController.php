<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('edit-blog', function(User $user=null, Blog $blog) {
            return $blog->user->is($user); 
        });

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
            'user_id' => request()->user()->id,
        ]);
    
        return redirect('/blog');
    }

    public function edit(Blog $blog)
    {
        Gate::define('edit-blog', function(User $user, Blog $blog) {
            return $blog->user->is($user); 
        });

        if(Auth::guest()) {
            return redirect('/login');
        }

        Gate::authorize('edit-blog', $blog);

        // if($blog->user->isNot(Auth::user())) {
        //     abort(403);
        // }

        return view('blogs.edit', ['blog' => $blog]);
    }

    public function update(Blog $blog)
    {
        if(Auth::guest()) {
            return redirect('/login');
        }

        Gate::define('edit-blog', function(User $user, Blog $blog) {
            return $blog->user->is($user); 
        });
        //todo: authorize 
        Gate::authorize('edit-blog', $blog);

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
        Gate::define('edit-blog', function(User $user, Blog $blog) {
            return $blog->user->is($user); 
        });

        if(Auth::guest()) {
            return redirect('/login');
        }
        
        Gate::authorize('edit-blog', $blog);
        
        $blog->delete();
        return redirect('/blog');
    }
}
