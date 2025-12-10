@extends('layouts.app')

@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Manage Posts</h1>
            <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Create New Post
            </a>
        </div>
        
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="flex flex-col">
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow-xl sm:rounded-lg">
                        <table class="min-w-full divide-y divide-white">
                            <thead class="bg-white">
                                <tr>
                                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Image
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Title & Snippet
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Author
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Created At
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($posts as $post)
                                    <tr class="hover:bg-gray-50 transition duration-150">
                                        <td class="p-4 whitespace-nowrap">
                                            <div class="w-16 rounded-lg overflow-hidden border border-gray-200">
                                                @if ($post->image_path)
                                                    <img class="w-16 object-cover rounded-md shadow-sm" src="{{ route('tampilkan.gambar', ['filename' => $post->image_path]) }}" alt="{{ $post->title }}">
                                                @else
                                                    <div class="w-16 bg-white flex items-center justify-center text-gray-500 text-xs text-center border border-gray-100">No Image</div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <div class="text-sm font-semibold text-gray-900">{{ $post->title }}</div>
                                            <div class="text-xs text-gray-500 mt-1">{{ Str::limit($post->content, 50) }}</div>
                                        </td>
                                        <td class="p-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 font-medium">{{ $post->user->username ?? 'Unknown' }}</div>
                                        </td>
                                        <td class="p-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">{{ $post->created_at->format('d M Y') }}</div>
                                        </td>
                                        <td class="p-4 whitespace-nowrap space-x-2">
                                            <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:text-blue-900 font-medium text-sm">View</a>
                                            <a href="{{ route('posts.edit', $post) }}" class="text-yellow-600 hover:text-yellow-900 font-medium text-sm">Edit</a>
                                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium text-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            @if($posts->isEmpty())
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">No posts found.</p>
                </div>
            @endif

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
