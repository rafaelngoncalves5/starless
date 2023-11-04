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

    public function create(Post $post, Request $request): View
    {
        if ($request->method() == 'GET') {

            return view("posts.create");

        } else if ($request->method() == "POST") {
            $data = $request->all();

            $title = $data["title"];
            $body = $data["body"];

            $new_post = Post::create(["title" => $title, "body" => $body, "user_id" => 1]);

            return view("posts.create", ['new_post' => $new_post]);

        } else {
            // Could place for a custom not allowed view
            return view(abort(405, "Error: method not allowed!"));
        }
    }

    public function delete(int $id, Request $request)
    {
        Post::findOrFail($id)->delete();

        return view("success", ["feedback" => "The post $id was deleted with success!"]);
    }
}

; ?>