<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $validated_attr = request()->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(8)->max(254)->letters()->numbers()],
        ]);

        if (!Auth::attempt($validated_attr)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match!'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/blog/create');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/login');
    }
}
