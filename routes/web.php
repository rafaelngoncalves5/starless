<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::view("/", 'index')->name("index");
Route::view("/success", 'success')->name("success");

// Posts
Route::controller(PostController::class)->group(function () {
    Route::get("/posts/", "index")->name("post_index");
    Route::match(['get', 'post'], '/posts/create', 'create')->name('post_create')->middleware('auth');
    Route::match(['get', 'post', 'put'], '/posts/update/{id}', 'update')->name('post_update')->middleware('auth');
    Route::match(['delete', 'post'], '/posts/delete/{id}', 'delete')->name('post_delete')->middleware('auth');
    
    Route::get("/posts/like/{id}", 'like_post')->middleware('auth')->name('post_like');
});

// Users
Route::controller(UserController::class)->group(function () {
    Route::match(['get', 'post',], '/users/create', 'create')->name('user_create');
    Route::match(['get', 'post'], '/users/login', 'login')->name('login');
    Route::get('/users/logout', 'logout')->name('logout');
});