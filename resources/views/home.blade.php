@extends('layouts.app')

@section('content')
<div class="space-y-12">
    <!-- Hero Section -->
    <div class="text-center py-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-3xl shadow-xl text-white">
        <h1 class="text-4xl md:text-6xl font-extrabold mb-4 tracking-tight">Selamat Datang di MyBlog</h1>
        <p class="text-lg md:text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
            Temukan cerita menarik, ide kreatif, dan inspirasi terbaru kami setiap hari.
        </p>
        <a href="{{ route('posts.index') }}" class="inline-block bg-white text-blue-600 font-bold py-3 px-8 rounded-full shadow-lg hover:bg-gray-100 transition transform hover:scale-105 duration-200">
            Mulai Membaca
        </a>
    </div>

    <!-- Latest Posts Section -->
    <div>
        <div class="flex justify-between items-end mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Artikel Terbaru</h2>
            <a href="{{ route('posts.index') }}" class="text-blue-600 font-medium hover:text-blue-800 flex items-center">
                Lihat Semua <span class="ml-1">&rarr;</span>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($recentPosts as $post)
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                    <a href="{{ route('posts.show', $post) }}">
                        @if ($post->image_path)
                            <img src="{{ route('tampilkan.gambar', ['filename' => $post->image_path]) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-white flex items-center justify-center text-gray-400 border-b border-white">
                                <span class="text-4xl">📷</span>
                            </div>
                        @endif
                    </a>
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">
                            {{ $post->created_at->diffForHumans() }} • Oleh <span class="font-semibold text-gray-700">{{ $post->user->username ?? 'Unknown' }}</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900 line-clamp-2">
                            <a href="{{ route('posts.show', $post) }}" class="hover:text-blue-600 transition">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed">{{ Str::limit($post->content, 120) }}</p>
                        <a href="{{ route('posts.show', $post) }}" class="text-blue-600 font-semibold text-sm hover:underline">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
