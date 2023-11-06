<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

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

    public function login(Request $request, User $user): mixed
    {
        if ($request->method() === "GET") {
            return view("users.login");
        } else if ($request->method() === 'POST') {

            $credentials = $request->validate([
                'username' => ['required', 'filled'],
                'password' => ['required', 'filled']
            ]);

            if (Auth::attempt($credentials)) {

                $request->session()->regenerate();
                return redirect()->intended('/');

            } else {

                return back()->withErrors([
                    "username" => "Error: your username or password is invalid!"
                ]);
            }

        } else {
            return view(abort(405, "Error: method not allowed!"));
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        if (Auth::check()) {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerate();

            return redirect('/');
        } else {
            return redirect('/users/login');
        }
    }
}
