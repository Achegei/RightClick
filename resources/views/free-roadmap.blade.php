@extends('layouts.front')

@section('title', 'Free Roadmap — Land Your First Freelance Client')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16 space-y-20">

    {{-- Hero --}}
    <section class="text-center max-w-3xl mx-auto">
        <h1 class="text-5xl sm:text-6xl font-extrabold mb-4 leading-tight">
            Your Free 90-Day Freelance Roadmap
        </h1>
        <p class="text-lg sm:text-xl text-gray-600 mb-8">
            Learn actionable lessons, explore real business ideas, watch success stories, and dive into videos and blogs. Start free today — upgrade to Pro when ready.
        </p>
        <a href="#roadmap" class="inline-block bg-indigo-600 text-white px-8 py-4 rounded-xl font-semibold shadow hover:bg-indigo-700 transition">
            Start Learning Free
        </a>
    </section>

    {{-- Free Lessons --}}
    <section id="roadmap">
        <h2 class="text-3xl font-bold mb-6">🚀 Free Lesson Snippets</h2>
        @if($lessons->isEmpty())
            <p class="text-gray-500">No free lessons available yet.</p>
        @else
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($lessons as $lesson)
                    <div class="bg-white p-6 rounded-3xl shadow-lg hover:shadow-xl border border-gray-100 transition">
                        <h3 class="font-semibold text-lg mb-2">{{ $lesson->title }}</h3>
                        <p class="text-gray-700 text-sm line-clamp-3">{{ Str::limit(strip_tags($lesson->content), 120) }}</p>
                        <span class="text-green-600 text-sm font-bold mt-3 inline-block">Free</span>
                    </div>
                @endforeach
            </div>
            <div class="mt-6">{{ $lessons->links() }}</div>
        @endif
    </section>

    {{-- Business Ideas --}}
    <section>
        <h2 class="text-3xl font-bold mb-6">💡 Business Ideas</h2>
        @if($businessIdeas->isEmpty())
            <p class="text-gray-500">No business ideas published yet.</p>
        @else
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($businessIdeas as $idea)
                    <div class="bg-white p-6 rounded-3xl shadow hover:shadow-xl border border-gray-100 transition">
                        <h3 class="font-semibold text-lg mb-2">{{ $idea->title }}</h3>
                        <p class="text-gray-700 text-sm mb-4">{{ Str::limit($idea->summary, 120) }}</p>
                        <span class="text-green-600 font-bold text-sm">Free</span>
                    </div>
                @endforeach
            </div>
            <div class="mt-6">{{ $businessIdeas->links() }}</div>
        @endif
    </section>

    {{-- Success Stories --}}
    <section>
        <h2 class="text-3xl font-bold mb-6">🏆 Success Stories</h2>
        @if($successStories->isEmpty())
            <p class="text-gray-500">No success stories yet.</p>
        @else
            <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($successStories as $story)
                    <div class="bg-white p-6 rounded-3xl shadow hover:shadow-xl border border-gray-100 transition">
                        <h3 class="font-semibold text-lg mb-2">{{ $story->title }}</h3>
                        <p class="text-gray-700 mb-4">{{ Str::limit($story->excerpt ?? $story->content, 160) }}</p>
                        <span class="text-green-600 font-bold">Free</span>
                    </div>
                @endforeach
            </div>
            <div class="mt-6">{{ $successStories->links() }}</div>
        @endif
    </section>

    {{-- Videos --}}
    <section>
        <h2 class="text-3xl font-bold mb-6">🎥 Learning Videos</h2>
        @if($videos->isEmpty())
            <p class="text-gray-500">No videos uploaded yet.</p>
        @else
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($videos as $video)
                    <div class="bg-white p-4 rounded-3xl shadow hover:shadow-xl border border-gray-100 transition">
                        <iframe class="w-full rounded-xl mb-3" height="180"
                            src="https://www.youtube.com/embed/{{ $video->youtube_id }}" allowfullscreen></iframe>
                        <h4 class="font-semibold text-sm">{{ $video->title }}</h4>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    {{-- Blogs --}}
    <section>
        <h2 class="text-3xl font-bold mb-6">📝 Blog Articles</h2>
        @if($blogs->isEmpty())
            <p class="text-gray-500">No blogs available yet.</p>
        @else
            <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($blogs as $blog)
                    <div class="bg-white p-6 rounded-3xl shadow hover:shadow-xl border border-gray-100 transition">
                        <h3 class="font-semibold text-lg mb-2">{{ $blog->title }}</h3>
                        <p class="text-gray-700 text-sm mb-4">{{ Str::limit(strip_tags($blog->content), 150) }}</p>
                        <a href="{{ route('blogs.show', $blog->slug) }}" class="text-indigo-600 font-semibold hover:underline">
                            Read More →
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="mt-6">{{ $blogs->links() }}</div>
        @endif
    </section>

    {{-- Programs --}}
    <section>
        <h2 class="text-3xl font-bold mb-6">🎓 Programs & Courses</h2>
        @if($programs->isEmpty())
            <p class="text-gray-500">No programs currently active.</p>
        @else
            <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($programs as $program)
                    <div class="bg-white p-6 rounded-3xl shadow hover:shadow-xl border border-gray-100 transition">
                        <h3 class="font-semibold text-lg mb-2">{{ $program->title }}</h3>
                        <p class="text-gray-700 mb-2">Starts: {{ \Carbon\Carbon::parse($program->start_date)->format('M d, Y') }}</p>
                        <a href="{{ route('program.show', $program->slug) }}" class="text-indigo-600 font-semibold hover:underline">
                            View Program →
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="mt-6">{{ $programs->links() }}</div>
        @endif
    </section>

    {{-- Go Pro CTA --}}
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white p-12 rounded-3xl text-center shadow-lg">
        <h2 class="text-4xl font-extrabold mb-4">Ready to Go Pro?</h2>
        <p class="text-lg mb-6">Unlock full roadmaps, premium ideas, templates, and client-winning systems.</p>
        <a href="{{ route('checkout.show', ['tier' => 'pro']) }}" class="inline-block bg-white text-indigo-700 font-bold px-8 py-4 rounded-xl hover:bg-gray-100 transition">
            Join Pro
        </a>
    </section>

</div>
@endsection
