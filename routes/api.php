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
    return response()->json("Welcome to our REST API");
});

// Users
Route::post('/user/token', [UserAPIController::class, 'token']);
Route::post('/user/logout', [UserAPIController::class,'logout']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});

// Posts
Route::controller(PostAPIController::class)->group(function () {
    Route::get('/posts', 'index');
});