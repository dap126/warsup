@extends('layouts.app')

@section('content')
<div class="px-4 pt-6">
    <div class="text-center mb-12">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">Our Services</h1>
        <p class="text-lg text-gray-600">Temukan apa yang kami tawarkan untuk membantu Anda.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($services as $service)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                @if ($service->image_path)
                    <div class="h-48 overflow-hidden">
                        <img src="{{ route('tampilkan.gambar', ['filename' => $service->image_path]) }}" alt="{{ $service->title }}" class="w-full h-full object-cover transition duration-300 hover:scale-105">
                    </div>
                @else
                    <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400">
                        <svg class="h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-3 text-gray-900">{{ $service->title }}</h2>
                    <p class="text-gray-600 leading-relaxed min-h-[4.5rem]">{{ Str::limit($service->content, 100) }}</p>
                    
                    {{-- Optional: Read More Link --}}
                    {{-- 
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('services.show', $service) }}" class="text-blue-600 font-semibold hover:text-blue-800 flex items-center">
                            Learn More 
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div> 
                    --}}
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No services found</h3>
                <p class="mt-1 text-sm text-gray-500">Check back later for new services.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $services->links() }}
    </div>
</div>
@endsection
