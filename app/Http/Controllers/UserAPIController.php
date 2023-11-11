<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserAPIController extends Controller
{
    public function register(Request $request)
    {
        if ($request->method() == "POST") {
            $request->validate([
                'username' => 'required|unique:users|filled|string',
                'email' => ['required', 'email', 'unique:users', 'filled'],
                'password' => [
                    'required',
                    'filled',
                    'string',
                    Password::min(8)
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()
                ]
            ]);
            return response()->json("User $request->username created with success!", 200);
        } else {
            return response()->json('Error: method not allowed!', 403);
        }
    }

    public function token(Request $request)
    {
        if ($request->method() === "POST") {

            // Check
            $user = User::where("username", $request->username)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                // Generate token
                return $user->createToken($user->username)->plainTextToken;

            } else {
                return response()->json("Error: invalid username or password!", 400);
            }

        } else {
            return response()->json('Error: method not allowed!', 405);
        }
    }

    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->tokens()->delete();

            return response()->json('Logged out with success', 200);
        } else {
            return response()->json("Error: you're not logged in", 400);
        }
    }

}

