<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ThreadController extends Controller
{
    public function index(): View
    {
        return view('forum.index')->with('threads', Thread::all());
    }

    public function show($slug, $id): View
    {
        return view('thread.show')->with('threads', Thread::findOrFail($id));
    }
}
