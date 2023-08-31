<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $auth = Auth::attempt(['email' => 'info@digam.be', 'password' => 'password']);
        $user = Auth::user();
        //dd($user);
        return view('dashboard.index', ['tab' => 'dashboard', 'user' => $user]);
    }

    public function blog()
    {
        $auth = Auth::attempt(['email' => 'info@digam.be', 'password' => 'password']);
        $user = Auth::user();
        return view('dashboard.index', ['tab' => 'blog', 'user' => $user]);
    }

    public function gallery()
    {
        $auth = Auth::attempt(['email' => 'info@digam.be', 'password' => 'password']);
        $user = Auth::user();
        return view('dashboard.index', ['tab' => 'gallery', 'user' => $user]);
    }

    public function parameter()
    {
        $auth = Auth::attempt(['email' => 'info@digam.be', 'password' => 'password']);
        $user = Auth::user();
        return view('dashboard.index', ['tab' => 'parameter', 'user' => $user]);
    }

    public function user()
    {
        $auth = Auth::attempt(['email' => 'info@digam.be', 'password' => 'password']);
        $user = Auth::user();
        return view('dashboard.index', ['tab' => 'user', 'user' => $user]);
    }
}
