<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\PostUser;
use App\Models\User;

class PostController extends Controller
{

    public function index(): View
    {
        $posts = Post::all();
        $users = User::all();
        return view("posts.index", ['posts' => $posts, 'users' => $users]);
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
            
            // Fiz esse tipo de coisa antes de ler a documentação das Requests, por isso tão deselegante
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
        if (!Gate::allows('update-post', $post) && !Auth::user()->is_admin) {
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

        if (!Gate::allows("update-post", $post) && !Auth::user()->is_admin) {
            return abort(403, "Error: method not allowed!");
        }

        Post::findOrFail($id)->delete();

        return view("success", ["feedback" => "The post $id was deleted with success!"]);
    }

    public function like_post(Request $request, int $id): RedirectResponse
    {
        if ($request->method() !== 'GET') {
            return abort(403, "Error: method not allowed!");
        }

        $post = Post::findOrFail($id);

        // Only likes the first time
        if (PostUser::where("post_id", $post->id)->where("user_id", Auth::user()->id)->count() == 0) {
            $post->likes_counter += 1;
            $post->users()->attach(Auth::user());

            $post->save();
        }

        return redirect("/posts/");
    }
}

; ?>