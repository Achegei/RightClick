@extends('layouts.front')

@section('title', 'Pro Roadmap — Unlock Premium Freelance Insights')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12 space-y-16">

    {{-- Hero --}}
    <section class="text-center mb-16">
        <h1 class="text-5xl font-extrabold mb-4">Your Pro 90-Day Freelance Roadmap</h1>
        <p class="text-lg text-gray-700 mb-8">
            You now have access to Free + Pro content. Dive deeper into actionable lessons, premium business ideas, and videos.
        </p>
        <a href="#roadmap" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
            Explore Pro Content
        </a>
    </section>

    {{-- Lessons --}}
    <section id="roadmap">
        <h2 class="text-2xl font-bold mb-6">🚀 Lessons</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($lessons as $lesson)
                <div class="bg-white p-6 rounded-2xl shadow border">
                    <h3 class="font-semibold text-lg mb-2">{{ $lesson->title }}</h3>
                    <p class="text-gray-600 text-sm line-clamp-3">{{ Str::limit(strip_tags($lesson->content), 120) }}</p>
                    <span class="text-green-600 text-sm font-semibold">{{ ucfirst($lesson->tier) }}</span>
                </div>
            @endforeach
        </div>
        <div class="mt-6">{{ $lessons->links() }}</div>
    </section>

    {{-- Business Ideas --}}
    <section>
        <h2 class="text-2xl font-bold mb-6">💡 Business Ideas</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($businessIdeas as $idea)
                <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg border transition">
                    <h3 class="font-semibold text-lg mb-2">{{ $idea->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($idea->summary, 120) }}</p>
                    <span class="text-green-600 font-semibold text-sm">{{ ucfirst($idea->tier) }}</span>
                </div>
            @endforeach
        </div>
        <div class="mt-6">{{ $businessIdeas->links() }}</div>
    </section>

    {{-- Videos --}}
    <section>
        <h2 class="text-2xl font-bold mb-6">🎥 Videos</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($videos as $video)
                <div class="bg-white p-4 rounded-2xl shadow hover:shadow-lg border transition">
                    <iframe class="w-full rounded mb-3" height="180"
                        src="https://www.youtube.com/embed/{{ $video->youtube_id }}" allowfullscreen></iframe>
                    <h4 class="font-semibold text-sm">{{ $video->title }}</h4>
                    <span class="text-green-600 text-sm">{{ ucfirst($video->tier) }}</span>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Go Premium CTA --}}
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white p-10 rounded-2xl text-center">
        <h2 class="text-3xl font-bold mb-4">Want More?</h2>
        <p class="mb-6">Upgrade to Premium for the full suite of lessons, videos, and business ideas.</p>
        <a href="{{ route('checkout.show', ['tier' => 'premium']) }}" class="inline-block bg-white text-indigo-700 font-bold px-6 py-3 rounded-xl hover:bg-gray-100 transition">
            Upgrade to Premium
        </a>
    </section>

</div>
@endsection
