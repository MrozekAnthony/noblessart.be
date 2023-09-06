<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Parameter;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', ['tab' => 'dashboard']);
    }

    public function blog()
    {
        // dd(Post::all());
        // return view('dashboard.index', ['tab' => 'blog', 'posts' => Post::all()]);
        return view('dashboard.index', ['tab' => 'blog'])
            ->with('posts', Post::with('category')->get())
            ->with('categories', Category::all());
    }

    public function createBlog(Request $request)
    {
        $post = $request->all();

        $post = new Post();
        $post->title = $request->title;
        $post->slug = str_replace(' ', '-', strtolower($request->title));
        $post->content = $request->content;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = 'images/' . $imageName;
        }

        $post->is_published = $request->is_published || false;
        $post->category_id = $request->category_id;
        $post->created_by = Auth::id();
        $post->updated_by = Auth::id();
        $post->save();
        return redirect()->route('dashboard.blog');
    }

    public function updateBlog(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = str_replace(' ', '-', strtolower($request->title));
        $post->content = $request->content;
        $post->image = $request->image;
        $post->is_published = $request->is_published || false;
        $post->category_id = $request->category_id;
        $post->updated_by = Auth::id();
        $post->save();
        return redirect()->route('dashboard.blog');
    }

    public function destroyBlog($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('dashboard.blog');
    }

    public function gallery()
    {
        return view('dashboard.index', ['tab' => 'gallery'])
            ->with('galleries', Gallery::all());
    }

    public function parameter()
    {
        return view('dashboard.index', ['tab' => 'parameter']);
        //->with('parameters', Parameter::all());
    }

    public function user()
    {
        return view('dashboard.index', ['tab' => 'user'])
            ->with('users', User::all());
    }
}
