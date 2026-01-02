<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('front.index', compact('posts'));
    }

    public function service()
    {
        $service = Service::latest()->paginate(10);
        return view('front.pages.service', compact('service'));
    }
}
