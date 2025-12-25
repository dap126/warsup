@extends('layouts.app')

@section('content')
<div class="px-4 pt-6">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
    </div>



    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-2">
        <!-- Users Stat Card -->
        <div class="bg-white rounded-lg shadow-xl p-6 border-l-4 border-blue-500">
            <div class="flex items-center">
                <div class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-blue-600 rounded-lg shadow-md">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
                </div>
                <div class="ml-6">
                    <p class="text-sm font-medium text-gray-500 truncate mb-1">Total Users</p>
                    <div class="text-2xl font-bold text-gray-900">{{ $usersCount }}</div>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('users.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500 hover:underline">View all users &rarr;</a>
            </div>
        </div>

        <!-- Posts Stat Card -->
        <div class="bg-white rounded-lg shadow-xl p-6 border-l-4 border-green-500">
            <div class="flex items-center">
                <div class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-green-600 rounded-lg shadow-md">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                </div>
                <div class="ml-6">
                    <p class="text-sm font-medium text-gray-500 truncate mb-1">Total Articles</p>
                    <div class="text-2xl font-bold text-gray-900">{{ $postsCount }}</div>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('dashboard.posts') }}" class="text-sm font-medium text-green-600 hover:text-green-500 hover:underline">Manage posts &rarr;</a>
            </div>
        </div>

        <!-- Services Stat Card -->
        <div class="bg-white rounded-lg shadow-xl p-6 border-l-4 border-indigo-500">
            <div class="flex items-center">
                <div class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-indigo-600 rounded-lg shadow-md">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path></svg>
                </div>
                <div class="ml-6">
                    <p class="text-sm font-medium text-gray-500 truncate mb-1">Total Services</p>
                    <div class="text-2xl font-bold text-gray-900">{{ $servicesCount }}</div>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('services.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500 hover:underline">Manage services &rarr;</a>
            </div>
        </div>
    </div>
</div>
@endsection
