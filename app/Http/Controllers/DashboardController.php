<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = \App\Models\User::count();
        $postsCount = Post::count();
        return view('dashboard.index', compact('usersCount', 'postsCount'));
    }

    public function posts()
    {
        $posts = Post::latest()->paginate(10);
        return view('dashboard.posts.index', compact('posts'));
    }
}
