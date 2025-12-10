<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
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
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Ambil file dari form
        $file = $request->file('image');
        $nama_file = time() . '_' . $file->getClientOriginalName();
        $googlePath = 'uploads/' . $nama_file;

        // Upload ke Google Drive (Original & Optimized)
        Storage::disk('google')->putFileAs('uploads', $file, $nama_file);
        Storage::disk('google')->put('uploads/optimized_' . $nama_file, $this->compressImage($file));

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
            $googlePath = 'uploads/' . $nama_file;
            Storage::disk('google')->putFileAs('uploads', $file, $nama_file);
            Storage::disk('google')->put('uploads/optimized_' . $nama_file, $this->compressImage($file));
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

        // Optional: Delete image from Drive
        // if ($post->image_path) {
        //     Storage::disk('google')->delete($post->image_path);
        // }

        $post->delete();

        if (\Illuminate\Support\Facades\Auth::user()->role === 'admin') {
            return redirect()->route('dashboard')->with('success', 'Post deleted successfully.');
        }

        return redirect('/')->with('success', 'Post deleted successfully.');
    }
    private function compressImage($file)
    {
        // Get image info
        list($width, $height, $type) = getimagesize($file);
        
        // Load image based on type
        switch ($type) {
            case IMAGETYPE_JPEG:
                $source = imagecreatefromjpeg($file);
                break;
            case IMAGETYPE_PNG:
                $source = imagecreatefrompng($file);
                break;
            default:
                return file_get_contents($file); // Return original if not supported
        }

        // Calculate new dimensions (Max width 1200px)
        $maxWidth = 1200;
        if ($width > $maxWidth) {
            $newWidth = $maxWidth;
            $newHeight = ($height / $width) * $newWidth;
        } else {
            $newWidth = $width;
            $newHeight = $height;
        }

        // Create new true color image
        $destination = imagecreatetruecolor($newWidth, $newHeight);

        // Preserve transparency for PNG
        if ($type == IMAGETYPE_PNG) {
            imagealphablending($destination, false);
            imagesavealpha($destination, true);
        }

        // Copy and resize
        imagecopyresampled($destination, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        // Capture output buffer
        ob_start();
        if ($type == IMAGETYPE_PNG) {
            imagepng($destination, null, 8); // Compression level 0-9
        } else {
            imagejpeg($destination, null, 80); // Quality 0-100
        }
        $compressedImage = ob_get_clean();

        // Free memory
        imagedestroy($source);
        imagedestroy($destination);

        return $compressedImage;
    }
}
