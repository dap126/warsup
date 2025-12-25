@extends('layouts.app')

@section('content')
<div class="px-4 pt-6">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold text-gray-900">Edit Service</h1>
        <a href="{{ route('services.index') }}" class="text-gray-600 hover:text-gray-900">
            &larr; Back to List
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-xl p-6">
        <form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Service Title" required value="{{ old('title', $service->title) }}">
                @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Content</label>
                <textarea id="content" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Service Description" required>{{ old('content', $service->content) }}</textarea>
                @error('content')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="image">Upload Image</label>
                
                @if($service->image_path)
                    <div class="mb-2">
                        <img src="{{ route('tampilkan.gambar', ['filename' => $service->image_path]) }}" alt="Current Image" class="h-20 w-auto rounded border">
                        <p class="text-xs text-gray-500 mt-1">Current Image</p>
                    </div>
                @endif

                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="image" name="image" type="file">
                <p class="mt-1 text-sm text-gray-500">Leave blank to keep current image. (MAX. 2MB)</p>
                @error('image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update Service</button>
        </form>
    </div>
</div>
@endsection
