<?php

namespace App\Http\Controllers;

use App\Models\Posts;

class PostsController extends Controller
{
    public function index()
    { 
        return view('posts.index',
            ['posts' => Posts::latest()->filter(request(['search', 'category', 'authors']))->paginate(6)]);
    }

    public function show(Posts $posts)
    {
        return view('posts.show', ['posts' => $posts]);
    }
}
