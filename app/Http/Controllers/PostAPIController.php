<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostAPIController extends Controller
{
    public function index()
    {
        return response()->json(["msg" => "welcome to posts!"]);
    }
}
