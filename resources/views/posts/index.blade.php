@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($posts as $post)
        <div class="bg-white rounded-lg shadow-xl overflow-hidden hover:shadow-2xl transition duration-300">
            @if ($post->image_path)
                <img src="{{ route('tampilkan.gambar', ['filename' => $post->image_path]) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
            @else
                <div class="w-full h-48 bg-white flex items-center justify-center text-gray-400 border-b border-white">
                    No Image
                </div>
            @endif
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">{{ $post->title }}</h2>
                <div class="text-xs text-gray-500 mb-2">
                    Oleh <span class="font-semibold text-gray-700">{{ $post->user->username ?? 'Unknown' }}</span> • {{ $post->created_at->diffForHumans() }}
                </div>
                <p class="text-gray-600 mb-4">{{ Str::limit($post->content, 100) }}</p>
                <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:text-blue-800 font-medium">Baca Selengkapnya &rarr;</a>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-8">
    {{ $posts->links() }}
</div>
@endsection
