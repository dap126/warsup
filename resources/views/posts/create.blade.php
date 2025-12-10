@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-xl">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Buat Post Baru</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium mb-2">Judul</label>
            <input type="text" name="title" id="title" class="w-full px-3 py-2 border border-white rounded shadow-sm focus:outline-none focus:border-blue-500" value="{{ old('title') }}" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-medium mb-2">Gambar</label>
            <input type="file" name="image" id="image" class="w-full text-gray-700 border border-white rounded shadow-sm py-2 px-3 focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-6">
            <label for="content" class="block text-gray-700 font-medium mb-2">Isi Konten</label>
            <textarea name="content" id="content" rows="6" class="w-full px-3 py-2 border border-white rounded shadow-sm focus:outline-none focus:border-blue-500" required>{{ old('content') }}</textarea>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-200">
            Publish Post
        </button>
    </form>
</div>
@endsection
