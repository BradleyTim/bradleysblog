<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validated_attr = request()->validate([
            'username' => ['required', 'min:3', 'max:254'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(8)->max(254)->letters()->numbers(), 'confirmed'],
        ]);

        $user = User::create($validated_attr);

        Auth::login($user);

        return redirect('/blog/create');
    }
}
