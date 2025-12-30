@extends('layouts.front')
@section('title', 'Free Roadmap — Land Your First Freelance Client')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16 space-y-32">

    {{-- HERO --}}
<section class="text-center max-w-3xl mx-auto">
    <h1 class="text-5xl sm:text-6xl font-extrabold mb-6 leading-tight text-gray-900">
        Turn Skills Into Income.<br class="hidden sm:block">
        Not Hype.
    </h1>

    <p class="text-lg sm:text-xl text-gray-600 mb-8">
        A proven 90-day freelance blueprint with lessons, real business ideas,
        and practical execution —
        <span class="font-semibold text-gray-900">
            built for people starting from zero.
        </span>
    </p>

    <a href="#roadmap"
       class="inline-flex items-center justify-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-10 py-4 rounded-3xl font-semibold shadow-xl hover:from-indigo-700 hover:to-purple-700 transition transform hover:-translate-y-1">
        Start Free Today →
    </a>
</section>


    {{-- ===== --}}
    {{-- BLOGS --}}
    {{-- ===== --}}
    <section>
        <h2 class="text-3xl sm:text-4xl font-bold mb-10 text-center text-indigo-900">Best Ways to Make Money in Kenya in 2026</h2>
        <div class="grid md:grid-cols-2 gap-8">
            @forelse($blogs as $blog)
                @php $canAccess = $blog->canAccess(auth()->user()); @endphp
                <div class="relative bg-white p-6 rounded-3xl shadow-lg hover:shadow-2xl transition group">
                    <h3 class="font-semibold text-xl mb-3 group-hover:text-indigo-600 transition">{{ $blog->title }}</h3>
                    <p class="text-gray-700 mb-4 text-sm">
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
                <p class="text-gray-500 col-span-full text-center">No blogs yet.</p>
            @endforelse
        </div>
        <div class="mt-8 text-center">{{ $blogs->links() }}</div>
    </section>

     {{-- ========= --}}
{{-- PROGRAMS & COURSES --}}
{{-- ========= --}}
<section>
    <h2 class="text-3xl sm:text-4xl font-bold mb-10 text-center">🎓 Programs & Courses</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($programs as $program)
            @php $canAccess = $program->canAccess(auth()->user()); @endphp
            <div class="relative bg-white p-6 rounded-3xl shadow-lg hover:shadow-2xl transition group">
                <h3 class="font-semibold text-xl mb-2 group-hover:text-indigo-600 transition">{{ $program->name }}</h3>
                <p class="text-gray-700 mb-3">
                    {{ $program->tier === 'free' ? 'Free Program' : 'Paid Program' }}
                </p>

                {{-- Courses under program --}}
                @if($program->courses->count())
                    <ul class="mb-4 space-y-2">
                        @foreach($program->courses as $course)
                            @php $courseAccess = $course->canAccess(auth()->user()); @endphp
                            <li class="bg-gray-50 p-4 rounded-lg shadow-inner hover:bg-gray-100 transition">
                                <h4 class="font-semibold text-md mb-1">{{ $course->title }}</h4>
                                <p class="text-sm text-gray-700 mb-2">
                                    {!! \Illuminate\Support\Str::words(strip_tags($course->description), 40, '...') !!}
                                    @if($course->description && $course->description !== strip_tags($course->description))
                                        <a href="{{ route('courses.show', $course->slug ?? $course->id) }}"
                                           class="text-indigo-600 font-semibold hover:underline">
                                           Read Full →
                                        </a>
                                    @endif
                                </p>
                                <span class="inline-block mt-1 text-sm text-green-600 font-semibold">
                                    {{ ucfirst($course->tier) }}
                                </span>

                                {{-- Lessons under course --}}
                                @if($course->lessons->count())
                                    <ul class="mt-3 space-y-2 pl-4">
                                        @foreach($course->lessons as $lesson)
                                            <li class="border-l-2 border-indigo-200 pl-3">
                                                <h5 class="font-medium text-sm mb-1">{{ $lesson->title }}</h5>
                                                <p class="text-xs text-gray-700">
                                                    {!! \Illuminate\Support\Str::words(strip_tags($lesson->content), 30, '...') !!}
                                                    @if($lesson->content && $lesson->content !== strip_tags($lesson->content))
                                                        <a href="{{ route('lessons.show', $lesson->id) }}"
                                                           class="text-indigo-600 font-semibold hover:underline">
                                                           Read Full →
                                                        </a>
                                                    @endif
                                                </p>
                                                <span class="inline-block mt-1 text-xs text-green-600 font-semibold">
                                                    {{ ucfirst($lesson->tier) }}
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif

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
            <p class="text-gray-500 col-span-full text-center">No programs yet.</p>
        @endforelse
    </div>
    <div class="mt-8 text-center">{{ $programs->links() }}</div>
</section>

    {{-- ========================= --}}
    {{-- LESSONS --}}
    {{-- ========================= --}}
    <section id="roadmap">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-10 text-center">
            🚀 Lessons
        </h2>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
            @forelse($lessons as $lesson)
                <div class="bg-white p-6 rounded-3xl shadow-lg border border-gray-100 hover:shadow-2xl transition flex flex-col group">
                    {{-- Tier Badge --}}
                    <div class="mb-3">
                        @if($lesson->tier === 'free')
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                                Free
                            </span>
                        @elseif($lesson->tier === 'pro')
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-indigo-100 text-indigo-700">
                                Pro
                            </span>
                        @elseif($lesson->tier === 'premium')
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">
                                Premium
                            </span>
                        @endif
                    </div>

                    {{-- Title --}}
                    <h3 class="font-semibold text-xl text-gray-900 mb-2 group-hover:text-indigo-600 transition">
                        {{ $lesson->title }}
                    </h3>

                    {{-- Preview --}}
                    <p class="text-gray-600 mb-6 text-sm">
                        {{ Str::limit(strip_tags($lesson->content), 120) }}
                    </p>

                    {{-- CTA --}}
                    <div class="mt-auto">
                        @php
                            $canAccess =
                                $lesson->tier === 'free'
                                || (auth()->check() && auth()->user()->tier === $lesson->tier)
                                || (auth()->check() && auth()->user()->tier === 'premium');
                        @endphp

                        @if($canAccess)
                            <a href="{{ route('lessons.show', $lesson->slug) }}"
                               class="inline-flex items-center text-indigo-600 font-semibold hover:text-indigo-800 transition">
                                Read lesson →
                            </a>
                        @else
                            <a href="{{ route('checkout.show', ['tier' => $lesson->tier]) }}"
                               class="inline-flex items-center text-gray-400 font-semibold hover:text-indigo-600 transition">
                                Unlock {{ ucfirst($lesson->tier) }} →
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-gray-500 col-span-full text-center">No lessons yet.</p>
            @endforelse
        </div>

        <div class="mt-12 text-center">
            {{ $lessons->links() }}
        </div>
    </section>

    {{-- ========= --}}
    {{-- VIDEOS --}}
    {{-- ========= --}}
    <section>
        <h2 class="text-3xl sm:text-4xl font-bold mb-10 text-center">🎥 Videos</h2>
        <div class="grid md:grid-cols-2 gap-8">
            @forelse($videos as $video)
                @php $canAccess = $video->canAccess(auth()->user()); @endphp
                <div class="relative rounded-3xl overflow-hidden shadow-lg bg-black group">
                    @if($canAccess)
                        <iframe class="w-full aspect-video rounded-lg"
                                src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                                title="{{ $video->title }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                        </iframe>
                    @else
                        <div class="relative bg-gray-900 text-white p-6 rounded-lg h-60 flex flex-col justify-center items-center">
                            <h3 class="font-semibold text-lg mb-2 text-center">{{ $video->title }}</h3>
                            <p class="text-sm text-gray-300 text-center">
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
                <p class="text-gray-500 col-span-full text-center">No videos yet.</p>
            @endforelse
        </div>
    </section>


    {{-- ================= --}}
    {{-- BUSINESS IDEAS --}}
    {{-- ================= --}}
    <section>
        <h2 class="text-3xl sm:text-4xl font-bold mb-10 text-center">💡 Business Ideas</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
            @forelse($businessIdeas as $idea)
                @php $canAccess = $idea->canAccess(auth()->user()); @endphp
                <div class="relative bg-white p-6 rounded-3xl shadow-lg hover:shadow-2xl transition group">
                    <h3 class="font-semibold text-xl mb-3 group-hover:text-indigo-600 transition">{{ $idea->title }}</h3>
                    <p class="text-gray-700 mb-4 text-sm">
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
                <p class="text-gray-500 col-span-full text-center">No business ideas yet.</p>
            @endforelse
        </div>
        <div class="mt-8 text-center">{{ $businessIdeas->links() }}</div>
    </section>

    {{-- ================= --}}
    {{-- SUCCESS STORIES --}}
    {{-- ================= --}}
    <section>
        <h2 class="text-3xl sm:text-4xl font-bold mb-10 text-center">🌟 Success Stories</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
            @forelse($successStories as $story)
                @php $canAccess = $story->canAccess(auth()->user()); @endphp
                <div class="relative bg-white p-6 rounded-3xl shadow-lg hover:shadow-2xl transition group">
                    <h3 class="font-semibold text-xl mb-3 group-hover:text-indigo-600 transition">{{ $story->title }}</h3>
                    <p class="text-gray-700 mb-4 text-sm">
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
                <p class="text-gray-500 col-span-full text-center">No success stories yet.</p>
            @endforelse
        </div>
        <div class="mt-8 text-center">{{ $successStories->links() }}</div>
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
           class="inline-block bg-white text-indigo-700 font-bold px-10 py-4 rounded-xl hover:bg-gray-100 transition transform hover:-translate-y-1">
            Upgrade to Pro →
        </a>
    </section>

</div>
@endsection
