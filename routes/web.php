<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;

// Public Routes (Only Auth)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (All Users)
Route::middleware(['auth'])->group(function () {
    // Home & List Post (User & Admin)
    Route::get('/', function () {
        $recentPosts = \App\Models\Post::latest()->take(3)->get();
        return view('home', compact('recentPosts'));
    });
    // Create Posts (All Authenticated Users)
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    
    // Edit & Delete (Protected by Controller Logic)
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

    // Admin Only Routes
    Route::middleware([\App\Http\Middleware\IsAdmin::class])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/posts', [DashboardController::class, 'posts'])->name('dashboard.posts');
        
        // User Management
        Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
        Route::patch('/users/{user}/verify', [\App\Http\Controllers\UserController::class, 'verify'])->name('users.verify');
        Route::delete('/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
        Route::patch('/users/{user}/password', [\App\Http\Controllers\UserController::class, 'updatePassword'])->name('users.password');
    });
});

Route::get('/uploads/{filename}', function ($filename) {
    
    $disk = Storage::disk('google');

    $path1 = $filename;
    $path2 = 'uploads/' . $filename;

    $finalPath = null;

    if ($disk->exists($path1)) {
        $finalPath = $path1;
    } elseif ($disk->exists($path2)) {
        $finalPath = $path2;
    }

    // Optimization: Check for optimized version for web display
    if ($finalPath && !request()->has('original')) {
        $pathParts = explode('/', $finalPath);
        $filename = end($pathParts);
        $directory = count($pathParts) > 1 ? dirname($finalPath) . '/' : '';
        $optimizedPath = $directory . 'optimized_' . $filename;

        if ($disk->exists($optimizedPath)) {
            $finalPath = $optimizedPath;
        }
    }

    if (!$finalPath) {
        Log::error("Gagal load gambar Google Drive. Mencoba: $path1, $path2, dan $path3. Hasil: Nihil.");
        abort(404);
    }

    // Low Memory Usage: Stream the file instead of loading it all into RAM
    $type = $disk->mimeType($finalPath);
    
    return response()->stream(function() use ($disk, $finalPath) {
        $stream = $disk->readStream($finalPath);
        fpassthru($stream);
        if (is_resource($stream)) {
            fclose($stream);
        }
    }, 200, [
        'Content-Type' => $type,
        'Cache-Control' => 'public, max-age=86400',
    ]);

})->where('filename', '.*')->name('tampilkan.gambar');
