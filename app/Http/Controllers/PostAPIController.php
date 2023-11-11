<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;

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

    public function details(Request $request, int $id)
    {
        $post = Post::findOrFail($id);

        return response()->json($post, 200);
    }

    public function like(Request $request, int $id)
    {
        $post = Post::findOrFail($id);

        if ($request->user()->id == $post->user_id) {
            return response()->json("Error: you are the owner of the resource (post), therefore, you're not allowed to proceed that operation!", 403);
        }

        $post->likes_counter += 1;
        $post->users()->attach($request->user());
        $post->save();

        return response()->json("Post `{$post->title}` liked with success!", 200);
    }

    public function upload(Request $request, int $id)
    {
        $post = Post::findOrFail($id);

        if (!Gate::allows('update-post', $post) && !$request->user()->is_admin) {
            return response()->json("Error: you are not allowed to access this resource!", 403);
        }

        $request->validate([
            'picture' => [
                'required',
                File::image()
                    ->max(12 * 1024)
                    ->dimensions(Rule::dimensions()->maxWidth(1000)->maxHeight(500)),
            ]
        ]);

        if (!$request->hasFile('picture')) {
            return response()->json("Error: the correct file name is `picture`!", 400);
        }

        if ($request->file('picture')->isValid()) {
            // Inserir na model depois a requisição
            $path = public_path("uploads");

            $filename = $request->file("picture")->getClientOriginalName();
            $filename = date('Ydmhms') . $filename;

            $request->file('picture')->move($path, $filename);
            
            // Relative pathing, which means, you should only use it with the asset() helper function!
            // Like: ... src="{{ asset('/uploads/' . $post->picture) }}"
            $post->picture = "$filename";
            $post->save();
            
            return response()->json("Image $filename saved with success!", 200);
        }
    }
}
/*
{
    "title": "Bem vindos à singapura",
    "body": "Para lá de bom grado, eu vou!"
}
*/