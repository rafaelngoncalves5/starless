<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

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
    public function Update(Request $request, int $id)
    {

        $post = Post::findOrFail($id);

        if (!Gate::allows("update-post", $post) && !$request->user()->is_admin) {
            return response()->json("Error: you are not allowed to access this resource!", 403);
        }

        $request->validate([
            "title" => ["required", "max:50", "filled", "string"],
            "body" => ["required", "filled", "string"]
        ]);

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        return response()->json("Post `{$request->title}` changed with success!", 200);
    }

    public function delete(Request $request, int $id)
    {
        $post = Post::findOrFail($id);
        // Reminder: test Gate::allows later!
        if (!Gate::allows('update-post', $post) && !$request->user()->is_admin) {
            return response()->json("Error: you are not allowed to access this resource!", 403);
        }

        $post->delete();
        return response()->json("Post `$post->title` deleted with success!", 200);
    }

    public function details(Request $request, int $id) {
        $post = Post::findOrFail($id);

        return response()->json($post, 200);
    }
}
/*
{
    "title": "Bem vindos à singapura",
    "body": "Para lá de bom grado, eu vou!"
}
*/