<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Posts;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('posts', ['posts' => Posts::latest('created_at')->get()]);
});

Route::get('posts/{posts:slug}', function (Posts $posts) {
    return view('post', ['post' => $posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['posts' => $category->post]);
});

Route::get('/authors/{author:user_name}', function (User $author) {
    return view('posts', ['posts' => $author->post]);
});