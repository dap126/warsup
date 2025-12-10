@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-xl overflow-hidden">
    @if ($post->image_path)
        <img class="mx-auto block" src="{{ route('tampilkan.gambar', ['filename' => $post->image_path]) }}" width="800">
    @endif
    
    <div class="p-8">
        <h1 class="text-3xl font-bold mb-4 text-gray-800">{{ $post->title }}</h1>
        <div class="flex justify-between items-center mb-6">
            <div class="text-sm text-gray-500">
                Oleh <span class="font-semibold text-gray-700">{{ $post->user->username ?? 'Unknown' }}</span> • Diposting pada {{ $post->created_at->format('d M Y') }}
            </div>
            
            @auth
                @if(Auth::id() === $post->user_id || Auth::user()->role === 'admin')
                    <div class="flex space-x-2">
                        <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600 transition">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus post ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600 transition">Hapus</button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
        
        <div class="prose max-w-none text-gray-700 leading-relaxed">
            {!! nl2br(e($post->content)) !!}
        </div>

        <div class="mt-8 pt-8 border-t border-white">
            <a href="{{ route('posts.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">&larr; Kembali ke Daftar Post</a>
        </div>
    </div>
</div>
@endsection
