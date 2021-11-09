<?php

use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PostsController::class, 'index'])->name('home');

Route::get('posts/{posts:slug}', [PostsController::class, 'show']);

Route::get('/authors/{author:user_name}', function (User $author) {
    return view('posts',
        ['posts' => $author->post,
            'categories' => Category::all()]);
});
