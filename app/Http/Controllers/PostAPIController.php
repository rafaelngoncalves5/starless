<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

class PostAPIController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy("created_at", "ASC")->get();

        return response()->json(["posts" => $posts], 200);
    }

    public function Create(Request $request)
    {
        $request->validate([
            "title" => ["required", "max:50", "filled", "string"],
            "body" => ["required", "filled", "string"]
        ]);


        Post::create(["title" => $request->title, "body" => $request->body, "user_id" => $request->user()->id]);

        return response()->json("Post `{$request->title}` created with success!", 200);

    }
}
/*
{
    "title": "Bem vindos à singapura",
    "body": "Para lá de bom grado, eu vou!"
}
*/