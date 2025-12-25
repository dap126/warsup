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
        $servicesCount = \App\Models\Service::count();
        return view('dashboard.index', compact('usersCount', 'postsCount', 'servicesCount'));
    }

    public function posts()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return view('dashboard.posts.index', compact('posts'));
    }

    public function services()
    {
        $services = \App\Models\Service::latest()->paginate(10);
        return view('dashboard.services.index', compact('services'));
    }
}
