<?php

use App\Http\Controllers\UserAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function (Request $request) {
    return response()->json(
        [
            "Welcome to our REST API!" => "List of available endpoints:",

            "Endpoints" => [

                "Users" => [
                    "/user/token" => "Generates an user's token. Accepts `POST`. Receives `login` and `password`.",
                    "/user/logout" => "Logout an user, previously logged. Accepts `GET`. Receives a `bearer token`.",
                    "/user/register" => "Register a new user. Accepts `POST`. Receives `username`, `email` and `password`.",
                ],

                "Posts" => [
                    "/posts" => "Displays a list of all available posts. Accepts `GET`.",
                    "/posts/create" => "Creates a new post. Accepts `POST`. Receives `Title` and `Body`."
                ]

            ]
        ]
    );
});

// Users
Route::controller(UserAPIController::class)->prefix('user')->group(function () {
    Route::post('token', 'token');
    Route::get('logout', 'logout')->middleware('auth:sanctum');
    Route::post('register', 'register');
});

// Posts
Route::controller(PostAPIController::class)->prefix('posts')->group(function () {
    Route::get('', 'index');
    Route::post('create', 'create')->middleware('auth:sanctum');
    Route::match(['put', 'post'], 'update/{id}', 'update')->middleware('auth:sanctum');
});