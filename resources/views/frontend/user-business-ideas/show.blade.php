@extends('layouts.front')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-6">

    {{-- ========================= --}}
    {{-- CREATE NEW IDEA BUTTON --}}
    {{-- ========================= --}}
    @auth
        <div class="mb-8 text-center">
            <a href="{{ route('frontend.user-business-ideas.create') }}"
               class="inline-block px-6 py-3 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700 transition">
                Submit Your Idea & Proposal
            </a>
        </div>
    @endauth

    {{-- ========================= --}}
    {{-- IDEA CONTENT --}}
    {{-- ========================= --}}
    <h1 class="text-3xl font-bold mb-2">{{ $businessIdea->title }}</h1>
    <p class="text-sm text-gray-500 mb-4">
        Submitted by {{ $businessIdea->user?->name ?? 'Unknown User' }} |
        Tier: {{ ucfirst($businessIdea->tier) }}
    </p>

    @if($businessIdea->tier !== 'free' && !$businessIdea->canAccess(auth()->user()))
        <div class="bg-yellow-100 p-6 rounded-lg text-center">
            <p class="mb-4 font-medium">This is {{ $businessIdea->tier }} content. Unlock it to view full details.</p>
            @auth
                <a href="{{ route('checkout.show', $businessIdea->tier) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg">
                    Unlock Content
                </a>
            @else
                <a href="{{ route('login') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg">
                    Login to Unlock
                </a>
            @endauth
        </div>
    @else
        @if($businessIdea->featured_image)
            <img src="{{ asset('storage/'.$businessIdea->featured_image) }}" class="w-full rounded-lg mb-6">
        @endif
        <p class="text-gray-700 whitespace-pre-line">{{ $businessIdea->content }}</p>

        @if($businessIdea->tier !== 'free')
            <div class="mt-6 p-4 bg-gray-100 rounded-lg text-sm text-gray-600">
                Creator Share: {{ $businessIdea->creator_share ?? 'TBD' }}%
            </div>
        @endif
    @endif
</div>
@endsection
