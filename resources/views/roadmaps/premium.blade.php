@extends('layouts.front')

@section('title', 'Premium Roadmap — All Access Pass')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12 space-y-16">

    {{-- Hero --}}
    <section class="text-center mb-16">
        <h1 class="text-5xl font-extrabold mb-4">Your Premium 90-Day Freelance Roadmap</h1>
        <p class="text-lg text-gray-700 mb-8">
            Full access unlocked! Free + Pro + Premium lessons, ideas, videos, blogs, and programs.
        </p>
        <a href="#roadmap" class="inline-block bg-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-purple-700 transition">
            Explore Everything
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

    {{-- Programs --}}
    <section>
        <h2 class="text-2xl font-bold mb-6">🎓 Programs & Courses</h2>
        <div class="grid md:grid-cols-2 gap-6">
            @foreach($programs as $program)
                <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg border transition">
                    <h3 class="font-semibold text-lg mb-2">{{ $program->title }}</h3>
                    <p class="text-gray-600 mb-2">Starts: {{ \Carbon\Carbon::parse($program->start_date)->format('M d, Y') }}</p>
                    <span class="text-green-600 font-semibold">{{ ucfirst($program->tier) }}</span>
                    <a href="{{ route('program.show', $program->slug) }}" class="text-blue-600 font-semibold hover:underline">
                        View Program →
                    </a>
                </div>
            @endforeach
        </div>
        <div class="mt-6">{{ $programs->links() }}</div>
    </section>

</div>
@endsection
