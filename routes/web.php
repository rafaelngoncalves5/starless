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

// Posts
Route::get('/posts/', [PostController::class, 'index'])->name('post_index');
Route::match(['get', 'post'], '/posts/create', [PostController::class, 'create'])->name('post_create');

// Users
Route::match(['get', 'post'], '/users/create', [UserController::class, 'create'])->name('user_create');