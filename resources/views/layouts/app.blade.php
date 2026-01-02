<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel Blog') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <script src="//unpkg.com/alpinejs" defer></script>

</head>
<body class="{{ (Request::is('dashboard*') || Request::is('users*')) ? 'bg-white' : 'bg-white font-sans antialiased' }}">
    


    @if(Request::is('dashboard*') || Request::is('users*'))
        <!-- Admin Layout Structure -->
        <nav class="fixed z-30 w-full bg-white border-b border-white">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start">
                        <a class="flex ml-2 md:mr-24">
                            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">Admin</span>
                        </a>
                    </div>
                    <!-- Admin Top Right Menu -->
                    <div class="flex items-center">
                        <!-- User Menu -->
                        <div class="flex items-center ml-3">
                            <a href="{{ url('/dashboard-home') }}" class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-white hover:shadow-sm group {{ request()->routeIs('dashboard') ? 'bg-white shadow-sm' : '' }}">
                                <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /> </svg>
                            </a>
                        </div>
                        <div class="flex items-center ml-3">
                            <div>
                                <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300" id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
                                    <span class="sr-only">Open user menu</span>
                                    <div class="w-8 h-8 rounded-full bg-gray-500 flex items-center justify-center text-white">
                                        {{ substr(Auth::user()->username ?? 'A', 0, 1) }}
                                    </div>
                                </button>
                            </div>
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-white rounded shadow" id="dropdown-2">
                                <div class="px-4 py-3" role="none">
                                    <p class="text-sm text-gray-900" role="none">
                                        {{ Auth::user()->username ?? 'User' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="flex pt-16 overflow-hidden bg-white">
            <aside id="sidebar" class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width" aria-label="Sidebar">
                <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-white">
                    <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
                        <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-white">
                            <ul class="pb-2 space-y-2">
                                <li>
                                    <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-white hover:shadow-sm group {{ request()->routeIs('dashboard') ? 'bg-white shadow-sm' : '' }}">
                                        <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                                        <span class="ml-3">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboard.posts') }}" class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-white hover:shadow-sm group {{ request()->routeIs('dashboard.posts') ? 'bg-white shadow-sm' : '' }}">
                                        <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path></svg>
                                        <span class="ml-3">Posts</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboard.services') }}" class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-white hover:shadow-sm group {{ request()->routeIs('services*') ? 'bg-white shadow-sm' : '' }}">
                                        <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path></svg>
                                        <span class="ml-3">Services</span>
                                    </a>
                                </li>
                                @if(Auth::check() && Auth::user()->role === 'admin')
                                <li>
                                    <a href="{{ route('users.index') }}" class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-white hover:shadow-sm group {{ request()->routeIs('users*') ? 'bg-white shadow-sm' : '' }}">
                                        <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                        <span class="ml-3">Users</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="fixed inset-0 z-10 hidden bg-gray-900/50" id="sidebarBackdrop"></div>

            <div id="main-content" class="relative w-full h-full overflow-y-auto bg-white lg:ml-64">
                <main>
                    @yield('content')
                </main>
                
                <footer class="p-4 bg-white md:p-6 mt-4">
                    <div class="mx-auto max-w-screen-xl text-center">
                        <span class="text-sm text-gray-500 sm:text-center">© 2024 <a href="#" class="hover:underline">Warsup</a>. All Rights Reserved.</span>
                    </div>
                </footer>
            </div>
        </div>

    @else
        <!-- Public Layout Structure -->
        <div class="min-h-screen">
            <nav class="bg-white shadow mb-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="flex-shrink-0 flex items-center">
                                <a href="{{ url('/dashboard-home') }}" class="text-2xl font-extrabold text-blue-600 tracking-tight">Warsup</a>
                            </div>
                            <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                                <a href="{{ url('/dashboard-home') }}" class="border-transparent text-gray-500 hover:border-white hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Beranda
                                </a>
                                <a href="{{ route('posts.index') }}" class="border-transparent text-gray-500 hover:border-white hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Article
                                </a>
                                <a href="{{ route('services.index') }}" class="border-transparent text-gray-500 hover:border-white hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Services
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center">

                            @auth
                                <div class="flex items-center space-x-4">
                                    <span class="text-gray-700 text-sm font-medium">{{ Auth::user()->username }} ({{ ucfirst(Auth::user()->role) }})</span>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" title="Keluar" class="text-red-500 hover:text-red-900 transition duration-150">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                
                @yield('content')
            </main>
        </div>

        @auth
            @if(Auth::user()->role === 'admin')
                <div class="fixed bottom-6 right-6 z-50">
                    <a href="{{ route('dashboard') }}" class="flex items-center justify-center w-14 h-14 bg-gray-800 text-white rounded-full shadow-lg hover:bg-gray-700 transition focus:outline-none focus:ring-4 focus:ring-gray-300 transform hover:scale-110" title="Admin Dashboard">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </a>
                </div>
            @endif
        @endauth

    @endif


    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <script src="{{ asset('js/utils.js') }}" defer></script>
    <script>
        // Use window.addEventListener to ensure Toast is available after defer loaded? 
        // Actually defer scripts execute in order. 
        // But inline scripts execute immediately (or after parsing).
        // If external scripts are defer, inline scripts might run BEFORE them if not also deferred or if they don't wait for DOMContentLoaded.
        // Wait, 'defer' scripts run after HTML parsing. Inline scripts run immediately as encountered.
        // So inline script will run BEFORE deferred scripts define 'Toast'.
        // FIX: Wrap inline script in DOMContentLoaded or window.onload, or remove 'defer' from utils?
        // 'defer' is good. We should wrap inline usage in 'DOMContentLoaded'.
        
        document.addEventListener('DOMContentLoaded', function() {
            // Check for Session Messages
            @if(session('success'))
                Toast.fire({
                    icon: 'success',
                    title: "{{ session('success') }}"
                });
            @endif

            @if(session('error'))
                Toast.fire({
                    icon: 'error',
                    title: "{{ session('error') }}"
                });
            @endif
        });
    </script>
    @stack('scripts')
</body>
</html>
