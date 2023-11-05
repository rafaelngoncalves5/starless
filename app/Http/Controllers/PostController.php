<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(): View
    {
        $posts = Post::all();
        return view("posts.index", ['posts' => $posts]);
    }

    public function create(Post $post, Request $request): view
    {
        if ($request->method() == 'GET') {

            return view("posts.create");

        } else if ($request->method() == "POST") {

            $request->validate([
                "title" => "required|max:50|filled|string|",
                "body" => "required|filled|string",
            ]);

            $data = $request->all();

            $title = $data["title"];
            $body = $data["body"];

            $new_post = Post::create(["title" => $title, "body" => $body, "user_id" => 1]);

            return view("success", ['feedback' => "Post {$new_post->body} created with success!"]);

        } else {
            // Could place for a custom not allowed view
            return view(abort(405, "Error: method not allowed!"));
        }
    }

    public function update(int $id, Request $request) : view
    {
        if ($request->method() == "GET") {

            $post = Post::findOrFail($id);

            return view("posts.update", ['post' => $post]);

        } else if ($request->method() == 'POST' || $request->method() == 'PUT') {

            $post = Post::findOrFail($id);

            // Validates, and throw it all to the session
            $request->validate([
                "title" => ["required", "max:50", "filled", "string"],
                "body" => ["required", "filled", "string"]
            ]);

            $data = $request->all();

            $post->update(['title' => $data['title'], 'body' => $data['body']]);

            return view('success', ['feedback' => "Post {$post->title} updated with success!"]);
        } else {
            return view(abort(405, "Error: method not allowed!"));
        }
    }

    public function delete(int $id, Request $request) : view
    {
        Post::findOrFail($id)->delete();

        return view("success", ["feedback" => "The post $id was deleted with success!"]);
    }
}

; ?>