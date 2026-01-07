@extends('layouts.front')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Business Ideas</h1>
        @auth
            <a href="{{ route('frontend.user-business-ideas.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
                + Submit Idea
            </a>
        @endauth
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @forelse($ideas as $idea)
        <div class="bg-white shadow-lg rounded-2xl p-6 mb-4">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold">{{ $idea->title }}</h2>
                <span class="px-2 py-1 rounded text-sm font-medium
                    {{ $idea->tier === 'free' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    {{ ucfirst($idea->tier) }}
                </span>
            </div>
            <p class="mt-2 text-gray-700">{{ Str::limit($idea->excerpt, 120) }}</p>
            <div class="mt-4 flex justify-between items-center">
            @if($idea instanceof \App\Models\UserGeneratedBusinessIdea && filled($idea->slug))
                    <a href="{{ route('frontend.user-business-ideas.show', ['businessIdea' => $idea]) }}"
                    class="text-indigo-600 hover:text-indigo-900 font-medium">
                        View Idea
                    </a>
                @endif
                <span class="text-sm text-gray-500">
                    Submitted by {{ $idea->user?->name ?? 'Unknown User' }}
                </span>
            </div>
        </div>
    @empty
        <p class="text-gray-500 text-center">No business ideas found.</p>
    @endforelse

    <div class="mt-6">
        {{ $ideas->links() }}
    </div>
</div>
@endsection
