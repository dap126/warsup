<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $googlePath = null;

        if ($request->hasFile('image')) {
            // Ambil file dari form
            $file = $request->file('image');
            $nama_file = time() . '_' . $file->getClientOriginalName();
            $folder = 'uploads/posts';
            $googlePath = $folder . '/' . $nama_file;

            // Upload ke Google Drive (Original Only)
            Storage::disk('google')->putFileAs($folder, $file, $nama_file);
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image_path' => $googlePath,
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== \Illuminate\Support\Facades\Auth::id() && \Illuminate\Support\Facades\Auth::user()->role !== 'admin') {
            abort(403);
        }
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== \Illuminate\Support\Facades\Auth::id() && \Illuminate\Support\Facades\Auth::user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $googlePath = $post->image_path;

        if ($request->hasFile('image')) {
            
            // Upload new image
            $file = $request->file('image');
            $nama_file = time() . '_' . $file->getClientOriginalName();
            $folder = 'uploads/posts';
            $googlePath = $folder . '/' . $nama_file;

            // Upload Original Only
            Storage::disk('google')->putFileAs($folder, $file, $nama_file);

            // Delete old image if exists
            if ($post->image_path && Storage::disk('google')->exists($post->image_path)) {
                Storage::disk('google')->delete($post->image_path);
            }
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image_path' => $googlePath,
        ]);

        if (\Illuminate\Support\Facades\Auth::user()->role === 'admin') {
            return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
        }
        
        return redirect('/')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== \Illuminate\Support\Facades\Auth::id() && \Illuminate\Support\Facades\Auth::user()->role !== 'admin') {
            abort(403);
        }

        // Delete image from Drive
        if ($post->image_path && Storage::disk('google')->exists($post->image_path)) {
            Storage::disk('google')->delete($post->image_path);
        }

        $post->delete();

        if (\Illuminate\Support\Facades\Auth::user()->role === 'admin') {
            return redirect()->route('dashboard')->with('success', 'Post deleted successfully.');
        }

        return redirect('/')->with('success', 'Post deleted successfully.');
    }
}
