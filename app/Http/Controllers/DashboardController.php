<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', ['tab' => 'dashboard']);
    }

    public function blog()
    {
        $blog = Post::all();
        return view('dashboard.index', ['tab' => 'blog', 'blog' => $blog]);
    }

    public function createBlog(Request $request)
    {
        $post = $request->all();

        $post = new Post();
        $post->title = $request->title;
        $post->slug = str_replace(' ', '-', strtolower($request->title));
        $post->content = $request->content;
        $post->image = $request->image;
        $post->is_published = $request->is_published || false;
        $post->category_id = $request->category_id || 1;
        $post->created_by = Auth::id();
        $post->updated_by = Auth::id();
        $post->save();
        return redirect()->route('dashboard.blog');
    }

    public function gallery()
    {
        return view('dashboard.index', ['tab' => 'gallery']);
    }

    public function parameter()
    {
        return view('dashboard.index', ['tab' => 'parameter']);
    }

    public function user()
    {
        return view('dashboard.index', ['tab' => 'user']);
    }
}
