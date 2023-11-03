<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create(Request $request, User $user)
    {
        if ($request->method() === 'GET') {
            return view('users.create');

        } else if ($request->method() === 'POST') {
            $new_user = User::create($request->all());
            return view('users.create', ['new_user' => $new_user]);
        } else {
            return view(abort(405, "Erros: method not allowed!"));
        }
    }
}
