<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('blog.index')->with('posts', Post::all());
    }

    public function show($slug, $id): View
    {
        return view('blog.show')->with('post', Post::findOrFail($id));
    }
}
