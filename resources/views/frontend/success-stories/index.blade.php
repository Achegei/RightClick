{{-- resources/views/frontend/success-stories/index.blade.php --}}
@extends('layouts.front')

@section('title', 'All Success Stories')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16 space-y-12">

    {{-- Hero --}}
    <div class="text-center mb-12">
        <h1 class="text-5xl font-extrabold leading-tight text-gray-900">Explore Success Stories</h1>
        <p class="mt-4 text-lg text-gray-600">Read inspiring stories from our members, unlock insights, and see what’s possible when you take action.</p>
    </div>

    {{-- Cards Grid --}}
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($successStories as $story)
            @php
                $canAccess = $story->canAccess(auth()->user());
            @endphp

            <a href="{{ route('success_stories.show', $story->slug) }}" 
               class="group block bg-white rounded-3xl shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden relative">
                
                <div class="p-6 flex flex-col justify-between h-full">
                    {{-- Title --}}
                    <h2 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors">
                        {{ $story->title }}
                    </h2>

                    {{-- Snippet --}}
                    <p class="text-gray-600 mb-4">
                        @if($canAccess)
                            {!! Str::limit($story->content, 120) !!}
                        @else
                            {!! Str::limit($story->content, 80) !!}
                        @endif
                    </p>

                    {{-- Footer Badges --}}
                    <div class="flex justify-between items-center mt-auto">
                        @if($canAccess)
                            <span class="inline-block px-3 py-1 text-sm font-semibold bg-green-100 text-green-800 rounded-full">
                                Unlocked
                            </span>
                        @else
                            <span class="inline-block px-3 py-1 text-sm font-semibold bg-gray-200 text-gray-700 rounded-full">
                                Locked
                            </span>
                        @endif

                        <span class="text-sm text-gray-400">{{ $story->created_at->diffForHumans() }}</span>
                    </div>
                </div>

                {{-- Lock Overlay for Locked Stories --}}
                @unless($canAccess)
                    <div class="absolute inset-0 flex flex-col justify-center items-center bg-black/40 text-white px-6 text-center rounded-3xl">
                        <div class="text-2xl mb-2">🔒 Locked</div>
                        <p class="text-sm mb-4">Unlock to read the full story.</p>
                    </div>
                @endunless

            </a>
        @endforeach
    </div>

    {{-- Pagination --}}
    @if($successStories->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $successStories->links('vendor.pagination.tailwind') }}
        </div>
    @endif

</div>
@endsection
