<?php

namespace App\Http\Controllers;

use App\Models\Post;

// use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post', compact('post'));
    }
}