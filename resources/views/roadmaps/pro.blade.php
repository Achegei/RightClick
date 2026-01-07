@extends('layouts.front')

@section('title', 'Pro Roadmap — Unlock Premium Freelance Insights')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12 space-y-16">

    {{-- Hero --}}
    <section class="text-center mb-16">
        <h1 class="text-5xl font-extrabold mb-4 text-gray-200">Your Pro 90-Day Freelance Roadmap</h1>
        <p class="text-lg text-gray-400 mb-8">
            You now have access to Free + Pro content. Dive deeper into actionable lessons, premium business ideas, and videos.
        </p>
        <a href="#roadmap" class="inline-block bg-cyan-400 text-gray-900 px-8 py-3 rounded-lg font-semibold hover:bg-cyan-500 transition">
            Explore Pro Content
        </a>
    </section>

    {{-- Lessons --}}
    <section id="roadmap">
        <h2 class="text-2xl font-bold mb-6 text-gray-200">🚀 Lessons</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($lessons as $lesson)
                <div class="bg-gray-900 p-6 rounded-2xl shadow hover:shadow-lg border border-gray-800 transition">
                    <h3 class="font-semibold text-lg mb-2 text-gray-200">{{ $lesson->title }}</h3>
                    <p class="text-gray-400 text-sm line-clamp-3">{{ Str::limit(strip_tags($lesson->content), 120) }}</p>
                    <span class="text-magenta-500 text-sm font-semibold">{{ ucfirst($lesson->tier) }}</span>
                </div>
            @endforeach
        </div>
        <div class="mt-6">{{ $lessons->links() }}</div>
    </section>

    {{-- Business Ideas --}}
    <section>
        <h2 class="text-2xl font-bold mb-6 text-gray-200">💡 Business Ideas</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($businessIdeas as $idea)
                <div class="bg-gray-900 p-6 rounded-2xl shadow hover:shadow-2xl border border-gray-800 transition transform hover:-translate-y-1">
                    <h3 class="font-semibold text-lg mb-2 text-gray-200">{{ $idea->title }}</h3>
                    <p class="text-gray-400 text-sm mb-4">{{ Str::limit($idea->summary, 120) }}</p>
                    <span class="text-magenta-500 font-semibold text-sm">{{ ucfirst($idea->tier) }}</span>
                </div>
            @endforeach
        </div>
        <div class="mt-6">{{ $businessIdeas->links() }}</div>
    </section>

    {{-- Videos --}}
    <section>
        <h2 class="text-2xl font-bold mb-6 text-gray-200">🎥 Videos</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($videos as $video)
                <div class="bg-gray-900 p-4 rounded-2xl shadow hover:shadow-2xl border border-gray-800 transition transform hover:-translate-y-1">
                    <iframe class="w-full rounded mb-3" height="180"
                        src="https://www.youtube.com/embed/{{ $video->youtube_id }}" allowfullscreen></iframe>
                    <h4 class="font-semibold text-sm text-gray-200">{{ $video->title }}</h4>
                    <span class="text-magenta-500 text-sm">{{ ucfirst($video->tier) }}</span>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Go Premium CTA --}}
    <section class="bg-gray-800 text-gray-200 p-10 rounded-2xl text-center border border-gray-700">
        <h2 class="text-3xl font-bold mb-4">Want More?</h2>
        <p class="mb-6">Upgrade to Premium for the full suite of lessons, videos, and business ideas.</p>
        <a href="{{ route('checkout.show', ['tier' => 'premium']) }}" class="inline-block bg-cyan-400 text-gray-900 font-bold px-6 py-3 rounded-xl hover:bg-cyan-500 transition">
            Upgrade to Premium
        </a>
    </section>

</div>
@endsection
