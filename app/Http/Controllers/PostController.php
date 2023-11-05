<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

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

            $new_post = Post::create(["title" => $title, "body" => $body, "user_id" => Auth::user()->id]);

            return view("success", ['feedback' => "Post {$new_post->body} created with success!"]);

        } else {
            // Could place for a custom not allowed view
            return abort(405, "Error: method not allowed!");
        }
    }

    public function update(int $id, Request $request): view
    {
        $post = Post::findOrFail($id);

        // Autorização
        if (!Gate::allows('update-post', $post)) {
            return abort(403, "Error: not authorized!");
        }

        if ($request->method() == "GET") {
            return view("posts.update", ['post' => $post]);

        } else if ($request->method() == 'POST' || $request->method() == 'PUT') {
            // Validates, and throw it all to the session
            $request->validate([
                "title" => ["required", "max:50", "filled", "string"],
                "body" => ["required", "filled", "string"]
            ]);

            $data = $request->all();

            $post->update(['title' => $data['title'], 'body' => $data['body']]);

            return view('success', ['feedback' => "Post {$post->title} updated with success!"]);
        } else {
            return abort(405, "Error: method not allowed!");
        }
    }

    public function delete(int $id, Request $request): view
    {
        $post = Post::findOrFail($id);

        if (!Gate::allows("update-post", $post)) {
            return abort(403, "Error: method not allowed!");
        }

        Post::findOrFail($id)->delete();

        return view("success", ["feedback" => "The post $id was deleted with success!"]);
    }
}

; ?>