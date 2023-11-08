<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostAPIController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return response()->json(["posts" => $posts], 200);
    }
}
