<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;
use App\Models\CommentPost;
use Illuminate\Support\Facades\Auth;


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

    public function addComment(Request $request)
    {
        $post = Post::findOrFail($request->post_id);
        $comment = new CommentPost();
        $comment->comment = $request->content;
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->parent_id = $request->comment_id;
        $comment->save();
        return redirect()->route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
    }

    public function destroyComment($id)
    {
        $comment = CommentPost::findOrFail($id);
        $comment->delete();
        return redirect()->back();
    }
}
