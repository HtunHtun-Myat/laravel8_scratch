<?php

use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostsController::class, 'index'])->name('home');

Route::get('posts/{posts:slug}', [PostsController::class, 'show']);
