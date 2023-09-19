<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Gallery;
use App\Models\User;

class GalleryController extends Controller
{
    public function index(): View
    {
        return view('gallery.index')->with('galleries', Gallery::with('images')->get());
    }
}
