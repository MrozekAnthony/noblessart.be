<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\ThreadCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\BannedWord;
use App\Models\CommentThread;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function index(Request $request)
    {
        $threads = Thread::query()
            ->where('quarantine', false);

        if ($request->filled('title')) {
            $threads->where('title', 'LIKE', '%' . $request->title . '%');
        }

        if ($request->filled('author')) {
            $threads->whereHas('user', function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->author . '%');
            });
        }

        if ($request->filled('category')) {
            $threads->where('thread_category_id', $request->category);
        }

        return view('forum.index')->with('threads', $threads->get())
            ->with('categories', ThreadCategory::all());
    }

    public function show($slug, $id): View
    {
        $thread = Thread::findOrFail($id);
        if (!$thread->quarantine) {
            $thread->views_count = $thread->views_count ? $thread->views_count + 1 : 1;
            $thread->save();
            return view('forum.show')->with('thread', Thread::findOrFail($id));
        }
        return view('forum.index')->with('threads', Thread::where('quarantine', false)->get())
        ->with('error', 'Le thread que vous souhaitez voir est en quarantaine');

    }

    public function create(): View
    {
        return view('forum.create')->with('categories', ThreadCategory::all());
    }

    public function doCreate(Request $request): View
    {
        $thread = new Thread();
        $thread->title = $request->input('title');
        $thread->content = $request->input('content');
        $thread->slug = str_replace("'","-",str_replace(' ', '-', strtolower($request->title)));
        $searchThread = Thread::where('slug', $thread->slug)->first();
        if ($searchThread) {
            $thread->slug = $thread->slug . '-' . time();
        }
        $thread->thread_category_id = $request->input('category_id');
        $thread->created_by = 2;
        $thread->updated_by = 2;
        $thread->created_at = time();
        $thread->updated_at = time();

        $bannedWords = new BannedWord();
        $bannedWords = $bannedWords->all()->pluck('word')->toArray();
        // Utilisez une expression régulière pour vérifier la présence des mots interdits
        $regex = '/\b(' . implode('|', array_map('preg_quote', $bannedWords)) . ')\b/i';
        if (preg_match($regex, $thread->content)) {
            $thread->quarantine = true;
        }

        $thread->save();
        return view('forum.index')->with('threads', Thread::where('quarantine', false)->get())
        ->with('categories', ThreadCategory::all());
    }

    public function addComment(Request $request)
    {
        $post = Thread::findOrFail($request->thread_id);
        $comment = new CommentThread();
        $comment->comment = $request->content;
        $comment->user_id = Auth::id();
        $comment->thread_id = $request->thread_id;
        $comment->parent_id = $request->comment_id;
        $comment->save();
        return redirect()->route('forum.show', ['slug' => $thread->slug, 'id' => $thread->id]);
    }

    public function destroyComment($id)
    {
        $comment = CommentThread::findOrFail($id);
        $comment->delete();
        return redirect()->back();
    }
}
