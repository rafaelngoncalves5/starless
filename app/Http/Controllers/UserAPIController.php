<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Response;

class UserAPIController extends Controller
{
    public function register(Request $request): Response
    {
        if ($request->method() == "POST") {
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
                return $user->createToken($user->email)->plainTextToken;

            } else {
                return response()->json("Error: invalid username or password!", 400);
            }

        } else {
            return response()->json('Error: method not allowed!', 405);
        }
    }

    public function logout(Request $request)
    {
        /*
        Auth::logout();

        $request->user()->tokens->delete();

        return redirect('api/');
        */

        return response()->json($request->all()['username'], 200);
    }

}

