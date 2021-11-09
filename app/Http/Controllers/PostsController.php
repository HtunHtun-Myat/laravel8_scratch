<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index()
    { 
        return view('posts.index',
            ['posts' => Posts::latest()->filter(request(['search', 'category']))->get()]);
    }

    public function show(Posts $posts)
    {
        return view('posts.show', ['posts' => $posts]);
    }
}
