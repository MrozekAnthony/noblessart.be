<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', ['tab' => 'dashboard']);
    }

    public function blog()
    {
        return view('dashboard.index', ['tab' => 'blog']);
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
