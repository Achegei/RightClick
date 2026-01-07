@extends('layouts.front')

@section('title', $businessIdea->title)

@section('content')
<div class="max-w-4xl mx-auto px-6 py-16 space-y-12">

    {{-- Title --}}
    <h1 class="text-4xl sm:text-5xl font-extrabold mb-6 leading-tight text-gray-900">
        {{ $businessIdea->title }}
    </h1>

    {{-- Tier Badge --}}
    <div class="mb-6">
        @if($canAccess)
            <span class="inline-block px-3 py-1 text-sm font-semibold bg-green-100 text-green-800 rounded-full">
                {{ ucfirst($businessIdea->tier) }} • Unlocked
            </span>
        @else
            <span class="inline-block px-3 py-1 text-sm font-semibold bg-gray-200 text-gray-700 rounded-full">
                {{ ucfirst($businessIdea->tier) }} • Locked
            </span>
        @endif
    </div>

    {{-- Content --}}
    <div class="relative bg-white p-8 rounded-3xl shadow-xl overflow-hidden">
        @if($canAccess)
            <div class="prose max-w-none text-gray-800">
                {!! nl2br(e($businessIdea->content)) !!}
            </div>
        @else
            <div class="blur-sm pointer-events-none">
                <div class="prose max-w-none text-gray-700">
                    {!! Str::limit(strip_tags($businessIdea->content), 200) !!}
                </div>
            </div>

            {{-- Lock Overlay --}}
            <div class="absolute inset-0 flex flex-col justify-center items-center bg-black/40 text-white px-6 text-center">
                <div class="mb-4 text-2xl">🔒 Locked Content</div>
                <p class="mb-6 text-lg">
                    Upgrade to unlock the full business idea and access actionable insights.
                </p>
                <a href="{{ route('checkout.show', [
                        'tier' => $businessIdea->tier,
                        'content_type' => 'business_idea',
                        'content_id' => $businessIdea->id
                    ]) }}"
                   class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-8 py-3 rounded-xl shadow-lg transition">
                    Unlock Full Idea →
                </a>
            </div>
        @endif
    </div>

    {{-- Back Link --}}
    <div class="mt-8">
        <a href="{{ route('frontend.user-business-ideas.index') }}"
           class="text-indigo-600 hover:underline font-semibold">
            ← Back to All Ideas
        </a>
    </div>
</div>
@endsection
