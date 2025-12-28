{{-- resources/views/frontend/business-ideas/index.blade.php --}}
@extends('layouts.front')

@section('title', 'All Business Ideas')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16 space-y-12">

    {{-- Hero --}}
    <div class="text-center mb-12">
        <h1 class="text-5xl font-extrabold leading-tight text-gray-900">Discover Top Business Ideas</h1>
        <p class="mt-4 text-lg text-gray-600">Browse curated business concepts, unlock actionable insights, and scale like a Silicon Valley founder.</p>
    </div>

    {{-- Cards Grid --}}
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($businessIdeas as $idea)
            <a href="{{ route('business_ideas.show', $idea->slug) }}" 
               class="group block bg-white rounded-3xl shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                
                <div class="p-6 flex flex-col justify-between h-full">
                    {{-- Title --}}
                    <h2 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors">
                        {{ $idea->title }}
                    </h2>

                    {{-- Snippet --}}
                    <p class="text-gray-600 mb-4">{{ Str::limit($idea->content, 120) }}</p>

                    {{-- Footer Badges --}}
                    <div class="flex justify-between items-center mt-auto">
                        @if($idea->isUnlocked)
                            <span class="inline-block px-3 py-1 text-sm font-semibold bg-green-100 text-green-800 rounded-full">Unlocked</span>
                        @else
                            <span class="inline-block px-3 py-1 text-sm font-semibold bg-gray-200 text-gray-700 rounded-full">Locked</span>
                        @endif

                        <span class="text-sm text-gray-400">{{ $idea->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    {{-- Pagination --}}
    @if($businessIdeas->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $businessIdeas->links('vendor.pagination.tailwind') }}
        </div>
    @endif

</div>
@endsection
