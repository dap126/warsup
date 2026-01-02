<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FrontController;

// Public Routes (Only Auth)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [FrontController::class, 'index'])->name('front');
Route::get('/about-pages', function () {
    return view('front.pages.about');
})->name('about');
Route::get('/service-pages', [FrontController::class, 'service'])->name('service');

// Protected Routes (All Users)
Route::middleware(['auth'])->group(function () {
    // Home & List Post (User & Admin)
    Route::get('/dashboard-home', function () {
        $recentPosts = \App\Models\Post::with('user')->latest()->take(3)->get();
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

    // Public Service List
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    // We can add show route if needed, but for now redirecting to index in controller
    // Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

    // Admin Only Routes
    Route::middleware([\App\Http\Middleware\IsAdmin::class])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/posts', [DashboardController::class, 'posts'])->name('dashboard.posts');
        Route::get('/dashboard/services', [DashboardController::class, 'services'])->name('dashboard.services');
        
        // Service Management (CRUD Actions)
        // Note: 'index' is taken by public route above, but inside resource it would be 'services.index'.
        // Since we manually defined public 'services.index' above, we should be careful.
        // We will stick to using specific routes or allowing resource to register but knowing 'services.index' might conflict.
        // Actually, Laravel route priority matters. The public one is defined first? No, last defined wins if names match?
        // Let's be explicit to avoid confusion:
        
        Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
        Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
        Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
        Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
        
        // User Management
        Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
        Route::patch('/users/{user}/verify', [\App\Http\Controllers\UserController::class, 'verify'])->name('users.verify');
        Route::delete('/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
        Route::patch('/users/{user}/password', [\App\Http\Controllers\UserController::class, 'updatePassword'])->name('users.password');
    });
});

Route::get('/uploads/{filename}', function ($filename) {
    
    $disk = Storage::disk('google');

    // Logic: 
    // $filename could be 'image.jpg' or 'posts/image.jpg' or 'services/image.jpg'
    // We check various possibilities.

    $possiblePaths = [
        $filename,                          // As provided (standard usage)
        'uploads/' . $filename,             // In uploads root
        'uploads/posts/' . $filename,       // Fallback for just filename provided
        'uploads/services/' . $filename,    // Fallback for just filename provided
    ];

    $finalPath = null;

    foreach ($possiblePaths as $path) {
        if ($disk->exists($path)) {
            $finalPath = $path;
            break;
        }
    }

    // Optimization check removed as requested. Only serving original files.

    if (!$finalPath) {
        Log::error("Gagal load gambar Google Drive. Filename: $filename");
        abort(404);
    }

    // Low Memory Usage: Stream the file
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
