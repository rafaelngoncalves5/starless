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
    return response()->json([
        "Welcome to our API!" => "List of available endpoints: ",
        [
            "Users" => [
                "/user/token" => "Generates an user's token. Accepts `POST`. Receives login and password.",
                "/user/logout" => "Logout an user, previously logged. Accepts `GET`.",
            ],

            "Posts" => [
                "/posts" => "Displays a list of all available posts. Accepts `GET`."
            ]
        ]
    ]);
});

// Users
Route::post('/user/token', [UserAPIController::class, 'token']);
Route::get('/user/logout', [UserAPIController::class, 'logout'])->middleware('auth:sanctum');

// Posts
Route::controller(PostAPIController::class)->prefix('posts')->group(function () {
    Route::get('', 'index');
});