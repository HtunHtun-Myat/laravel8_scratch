<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index()
    { 
        return view('posts',
            ['posts' => Posts::latest()->filter(request(['search']))->get(),
             'categories' => Category::all()]);
    }

    public function show(Posts $posts)
    {
        return view('post', ['posts' => $posts]);
    }
}