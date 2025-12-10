@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-xl">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Post</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium mb-2">Judul</label>
            <input type="text" name="title" id="title" class="w-full px-3 py-2 border border-white rounded shadow-sm focus:outline-none focus:border-blue-500" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-medium mb-2">Gambar (Opsional)</label>
            <input type="file" name="image" id="image" class="w-full text-gray-700 border border-white rounded shadow-sm py-2 px-3 focus:outline-none focus:border-blue-500">
            @if ($post->image_path)
                <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                <div class="mt-2 text-sm text-gray-600">
                    Gambar saat ini: <br>
                    <img src="{{ route('tampilkan.gambar', ['filename' => $post->image_path]) }}" width="100" class="mt-1 rounded">
                </div>
            @endif
        </div>

        <div class="mb-6">
            <label for="content" class="block text-gray-700 font-medium mb-2">Isi Konten</label>
            <textarea name="content" id="content" rows="6" class="w-full px-3 py-2 border border-white rounded shadow-sm focus:outline-none focus:border-blue-500" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-800 font-medium py-2 px-4">Batal</a>
            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-200">
                Update Post
            </button>
        </div>
    </form>
</div>
@endsection
