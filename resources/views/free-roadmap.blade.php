@extends('layouts.front')
@section('title', 'Free Roadmap — Land Your First Freelance Client')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16 space-y-24">

    {{-- HERO --}}
    <section class="text-center max-w-3xl mx-auto">
        <h1 class="text-5xl sm:text-6xl font-extrabold mb-6 leading-tight">
            Your Free 90-Day Freelance Roadmap
        </h1>
        <p class="text-lg sm:text-xl text-gray-600 mb-8">
            Lessons, business ideas, programs, videos, and blogs.
            <span class="font-semibold text-gray-900">Start free. Upgrade only when ready.</span>
        </p>
        <a href="#roadmap"
           class="inline-flex items-center justify-center bg-indigo-600 text-white px-10 py-4 rounded-xl font-semibold shadow-lg hover:bg-indigo-700 transition">
            Start Learning Free →
        </a>
    </section>

    {{-- ========================= --}}
    {{-- LESSONS (FREE BY DEFAULT) --}}
    {{-- ========================= --}}
    <section id="roadmap">
        <h2 class="text-3xl font-bold mb-6">🚀 Lessons</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($lessons as $lesson)
                <div class="bg-white p-6 rounded-2xl shadow border hover:shadow-xl transition">
                    <h3 class="font-semibold text-lg mb-2">{{ $lesson->title }}</h3>
                    <p class="text-sm text-gray-700">
                        {{ Str::limit(strip_tags($lesson->content), 140) }}
                    </p>
                    <span class="inline-block mt-4 text-green-600 font-semibold text-sm">
                        Free
                    </span>
                </div>
            @empty
                <p class="text-gray-500">No lessons yet.</p>
            @endforelse
        </div>
        <div class="mt-6">{{ $lessons->links() }}</div>
    </section>

    {{-- ================= --}}
    {{-- BUSINESS IDEAS --}}
    {{-- ================= --}}
    <section>
        <h2 class="text-3xl font-bold mb-6">💡 Business Ideas</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($businessIdeas as $idea)
                @php $canAccess = $idea->canAccess(auth()->user()); @endphp
                <div class="relative bg-white p-6 rounded-2xl shadow border hover:shadow-xl transition group">
                    <h3 class="font-semibold text-lg mb-2">{{ $idea->title }}</h3>
                    <p class="text-sm text-gray-700 mb-4">
                        {{ Str::limit(strip_tags($idea->summary ?? $idea->content), $canAccess ? 240 : 120) }}
                    </p>

                    @if($canAccess)
                        <a href="{{ route('business_ideas.show', ['businessIdea' => $idea->slug]) }}"
                           class="font-semibold text-indigo-600 hover:underline">
                            Read Full →
                        </a>
                        <span class="block mt-3 text-green-600 font-semibold text-sm">
                            {{ ucfirst($idea->tier) }} • Unlocked
                        </span>
                    @else
                        <x-locked-button :tier="$idea->tier" :contentType="'business_idea'" :contentId="$idea->slug"/>
                        <div class="absolute top-0 right-0 p-4 text-indigo-600 text-xl">
                            🔒
                        </div>
                    @endif
                </div>
            @empty
                <p class="text-gray-500">No business ideas yet.</p>
            @endforelse
        </div>
        <div class="mt-6">{{ $businessIdeas->links() }}</div>
    </section>

    {{-- ================= --}}
    {{-- SUCCESS STORIES --}}
    {{-- ================= --}}
    <section class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ url()->previous() }}"
               class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-800 rounded-lg hover:bg-gray-200 transition">
                ← Back
            </a>
        </div>

        <h2 class="text-3xl font-bold mb-6">🌟 Success Stories</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($successStories as $story)
                @php $canAccess = $story->canAccess(auth()->user()); @endphp
                <div class="relative bg-white p-6 rounded-2xl shadow border hover:shadow-xl transition group">
                    <h3 class="font-semibold text-lg mb-2">{{ $story->title }}</h3>
                    <p class="text-sm text-gray-700 mb-4">
                        {{ Str::limit(strip_tags($story->content), $canAccess ? 240 : 120) }}
                    </p>

                    @if($canAccess)
                        <a href="{{ route('success_stories.show', $story->slug) }}"
                           class="font-semibold text-indigo-600 hover:underline">
                            Read Full →
                        </a>
                        <span class="block mt-3 text-green-600 font-semibold text-sm">
                            {{ ucfirst($story->tier) }} • Unlocked
                        </span>
                    @else
                        <x-locked-button :tier="$story->tier" :contentType="'success_story'" :contentId="$story->id"/>
                        <div class="absolute top-0 right-0 p-4 text-indigo-600 text-xl">
                            🔒
                        </div>
                    @endif
                </div>
            @empty
                <p class="text-gray-500">No success stories yet.</p>
            @endforelse
        </div>
        <div class="mt-6">{{ $successStories->links() }}</div>
    </section>

    {{-- ========= --}}
    {{-- VIDEOS --}}
    {{-- ========= --}}
    <section>
        <h2 class="text-3xl font-bold mb-6">🎥 Videos</h2>
        <div class="grid md:grid-cols-2 gap-6">
            @forelse($videos as $video)
                @php $canAccess = $video->canAccess(auth()->user()); @endphp
                <div class="relative rounded-2xl overflow-hidden shadow bg-black group">
                    @if($canAccess)
                        <iframe class="w-full aspect-video rounded-lg"
                                src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                                title="{{ $video->title }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                        </iframe>
                    @else
                        <div class="relative bg-gray-800 text-white p-4 rounded-lg h-48 flex flex-col justify-center items-center">
                            <h3 class="font-semibold text-lg mb-2 text-center">{{ $video->title }}</h3>
                            <p class="text-sm text-gray-200 text-center">
                                {{ Str::limit(strip_tags($video->description), 100) }}
                            </p>
                            <x-locked-button :tier="$video->tier" :contentType="'video'" :contentId="$video->id" class="mt-4"/>
                            <div class="absolute top-0 right-0 p-4 text-indigo-400 text-xl">
                                🔒
                            </div>
                        </div>
                    @endif
                </div>
            @empty
                <p class="text-gray-500">No videos yet.</p>
            @endforelse
        </div>
    </section>

    {{-- ===== --}}
    {{-- BLOGS --}}
    {{-- ===== --}}
    <section>
        <h2 class="text-3xl font-bold mb-6">📝 Blog Articles</h2>
        <div class="grid md:grid-cols-2 gap-6">
            @forelse($blogs as $blog)
                @php $canAccess = $blog->canAccess(auth()->user()); @endphp
                <div class="relative bg-white p-6 rounded-2xl shadow border hover:shadow-xl transition group">
                    <h3 class="font-semibold text-lg mb-2">{{ $blog->title }}</h3>
                    <p class="text-sm text-gray-700 mb-4">
                        {{ Str::limit(strip_tags($blog->content), $canAccess ? 260 : 120) }}
                    </p>
                    @if($canAccess)
                        <a href="{{ route('blogs.show', $blog->slug ?? $blog->id) }}"
                           class="font-semibold text-indigo-600 hover:underline">
                            Read Full →
                        </a>
                        <span class="block mt-3 text-green-600 font-semibold text-sm">
                            {{ ucfirst($blog->tier) }} • Unlocked
                        </span>
                    @else
                        <x-locked-button :tier="$blog->tier" :contentType="'blog'" :contentId="$blog->id"/>
                        <div class="absolute top-0 right-0 p-4 text-indigo-600 text-xl">🔒</div>
                    @endif
                </div>
            @empty
                <p class="text-gray-500">No blogs yet.</p>
            @endforelse
        </div>
        <div class="mt-6">{{ $blogs->links() }}</div>
    </section>

    {{-- ========= --}}
    {{-- PROGRAMS --}}
    {{-- ========= --}}
    <section>
        <h2 class="text-3xl font-bold mb-6">🎓 Programs & Courses</h2>
        <div class="grid md:grid-cols-2 gap-6">
            @forelse($programs as $program)
                @php $canAccess = $program->canAccess(auth()->user()); @endphp
                <div class="relative bg-white p-6 rounded-2xl shadow border hover:shadow-xl transition group">
                    <h3 class="font-semibold text-lg mb-2">{{ $program->name }}</h3>
                    <p class="text-gray-700 mb-3">
                        {{ $program->tier === 'free' ? 'Free Program' : 'Paid Program' }}
                    </p>
                    @if($canAccess)
                        <a href="{{ route('programs.show', $program->slug ?? $program->id) }}"
                           class="font-semibold text-indigo-600 hover:underline">
                            View Program →
                        </a>
                        <span class="block mt-3 text-green-600 font-semibold text-sm">
                            {{ ucfirst($program->tier) }} • Unlocked
                        </span>
                    @else
                        <x-locked-button :tier="$program->tier" :contentType="'program'" :contentId="$program->id"/>
                        <div class="absolute top-0 right-0 p-4 text-indigo-600 text-xl">🔒</div>
                    @endif
                </div>
            @empty
                <p class="text-gray-500">No programs yet.</p>
            @endforelse
        </div>
        <div class="mt-6">{{ $programs->links() }}</div>
    </section>

    {{-- CTA --}}
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white p-14 rounded-3xl text-center shadow-xl">
        <h2 class="text-4xl font-extrabold mb-4">
            Ready to Go Pro?
        </h2>
        <p class="text-lg mb-8 max-w-2xl mx-auto">
            Unlock premium systems, deep-dive programs, client-winning playbooks,
            and real business execution frameworks.
        </p>

        <a href="{{ route('checkout.show', ['tier' => 'pro']) }}"
           class="inline-block bg-white text-indigo-700 font-bold px-10 py-4 rounded-xl hover:bg-gray-100 transition">
            Upgrade to Pro →
        </a>
    </section>

</div>
@endsection
