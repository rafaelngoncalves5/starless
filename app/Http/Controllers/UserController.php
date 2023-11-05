<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function create(Request $request, User $user): view
    {
        if ($request->method() === 'GET') {
            return view('users.create');

        } else if ($request->method() === 'POST') {

            $request->validate([
                'username' => 'required|unique:users|filled|string',
                'email' => ['required', 'email', 'unique:users', 'filled', 'confirmed'],
                'password' => [
                    'required',
                    'filled',
                    'string',
                    'confirmed',
                    Password::min(8)
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()
                ]
            ]);

            $new_user = User::create($request->all());
            return view('success', ['feedback' => "User $new_user->username created with success!"]);

        } else {
            return view(abort(405, "Error: method not allowed!"));
        }
    }
}
