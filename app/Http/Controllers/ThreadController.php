<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\ThreadCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\BannedWord;

class ThreadController extends Controller
{
    public function index(): View
    {
        return view('forum.index')->with('threads', Thread::all());
    }

    public function show($slug, $id): View
    {
        return view('forum.show')->with('threads', Thread::findOrFail($id));
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
        $thread->slug = str_replace(' ', '-', strtolower($request->title));
        $searchThread = Thread::where('slug', $thread->slug)->first();
        if ($searchThread) {
            $thread->slug = $thread->slug . '-' . time();
        }
        $thread->thread_category_id = 1;
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
        return view('forum.show');
    }
}
