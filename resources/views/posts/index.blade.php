@extends('layouts.app')

@section('content')
<div class="px-4 pt-6">
    <div class="text-center mb-12">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">New Article</h1>
        <p class="text-lg text-gray-600">Temukan cerita menarik, ide kreatif, dan inspirasi terbaru kami setiap hari.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($posts as $post)
            <div class="bg-white rounded-lg shadow-xl overflow-hidden hover:shadow-2xl transition duration-300">
                @if ($post->image_path)
                    <img src="{{ route('tampilkan.gambar', ['filename' => $post->image_path]) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400">
                        <svg class="h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
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
        @empty
            <div class="col-span-full text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No posts found</h3>
                <p class="mt-1 text-sm text-gray-500">Check back later for new updates.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $posts->links() }}
    </div>
</div>
@endsection
