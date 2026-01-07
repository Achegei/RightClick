@extends('layouts.front')
@section('title', 'Free Roadmap — Land Your First Freelance Client')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16 space-y-32">

    {{-- HERO --}}
<section class="text-center max-w-3xl mx-auto">
    <h1 class="text-5xl sm:text-6xl font-extrabold mb-6 leading-tight text-gray-200">
        Turn Skills Into Income.<br class="hidden sm:block">
        Not Hype.
    </h1>

    <p class="text-lg sm:text-xl text-gray-400 mb-8">
        A proven 90-day freelance blueprint with lessons, real business ideas,
        and practical execution —
        <span class="font-semibold text-gray-100">
            built for people starting from zero.
        </span>
    </p>

    <a href="#roadmap"
       class="inline-flex items-center justify-center bg-cyan-400 text-black px-10 py-4 rounded-3xl font-semibold shadow-xl hover:bg-cyan-500 transition transform hover:-translate-y-1">
        Start Free Today →
    </a>
</section>

    {{-- ===== --}}
    {{-- BLOGS --}}
    {{-- ===== --}}
<section>
    <h2 class="text-3xl sm:text-4xl font-bold mb-10 text-center text-cyan-400">Best Ways to Make Money in Kenya in 2026</h2>
    <div class="grid md:grid-cols-2 gap-8">
        @forelse($blogs as $blog)
            @php $canAccess = $blog->canAccess(auth()->user()); @endphp
            <div class="relative bg-gray-900 p-6 rounded-3xl shadow-lg hover:shadow-2xl transition group">
                <h3 class="font-semibold text-xl mb-3 group-hover:text-cyan-400 transition text-gray-200">{{ $blog->title }}</h3>
                <p class="text-gray-400 mb-4 text-sm">
                    {{ Str::limit(strip_tags($blog->content), $canAccess ? 260 : 120) }}
                </p>
                @if($canAccess)
                    <a href="{{ route('blogs.show', $blog->slug ?? $blog->id) }}"
                       class="font-semibold text-cyan-400 hover:underline">
                        Read Full →
                    </a>
                    <span class="block mt-3 text-green-400 font-semibold text-sm">
                        {{ ucfirst($blog->tier) }} • Unlocked
                    </span>
                @else
                    <x-locked-button :tier="$blog->tier" :contentType="'blog'" :contentId="$blog->id"/>
                    <div class="absolute top-0 right-0 p-4 text-cyan-400 text-xl">🔒</div>
                @endif
            </div>
        @empty
            <p class="text-gray-500 col-span-full text-center">No blogs yet.</p>
        @endforelse
    </div>
    <div class="mt-8 text-center">{{ $blogs->links() }}</div>
</section>

{{-- PROGRAMS & COURSES --}}
<section>
    <h2 class="text-3xl sm:text-4xl font-bold mb-10 text-center text-cyan-400">Choose Your Income Path</h2>
    <p class="text-center text-gray-400 mb-10 max-w-2xl mx-auto">
        Start with clarity, build real skills, and accelerate with mentorship.
        Pick the path that matches where you are — and where you want to go.
    </p>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($programs as $program)
            @php $canAccess = $program->canAccess(auth()->user()); @endphp
            <div class="relative bg-gray-900 p-6 rounded-3xl shadow-lg hover:shadow-2xl transition group">
                <h3 class="font-semibold text-xl mb-2 group-hover:text-cyan-400 transition text-gray-200">{{ $program->name }}</h3>
                <p class="text-gray-400 mb-3">
                    {{ $program->tier === 'free' ? 'Free Program' : 'Paid Program' }}
                </p>

                {{-- Courses --}}
                @if($program->courses->count())
                    <ul class="mb-4 space-y-2">
                        @foreach($program->courses as $course)
                            @php $courseAccess = $course->canAccess(auth()->user()); @endphp
                            <li class="bg-gray-800 p-4 rounded-lg shadow-inner hover:bg-gray-700 transition">
                                <h4 class="font-semibold text-md mb-1 text-gray-200">{{ $course->title }}</h4>
                                <p class="text-sm text-gray-400 mb-2">
                                    {!! \Illuminate\Support\Str::words(strip_tags($course->description), 40, '...') !!}
                                    @if($course->description && $course->description !== strip_tags($course->description))
                                        <a href="{{ route('courses.show', $course->slug ?? $course->id) }}"
                                           class="text-cyan-400 font-semibold hover:underline">
                                           Read Full →
                                        </a>
                                    @endif
                                </p>
                                <span class="inline-block mt-1 text-sm text-green-400 font-semibold">
                                    {{ ucfirst($course->tier) }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @endif

                @if($canAccess)
                    <a href="{{ route('programs.show', $program->slug ?? $program->id) }}"
                       class="font-semibold text-cyan-400 hover:underline">
                        View Program →
                    </a>
                    <span class="block mt-3 text-green-400 font-semibold text-sm">
                        {{ ucfirst($program->tier) }} • Unlocked
                    </span>
                @else
                    <x-locked-button :tier="$program->tier" :contentType="'program'" :contentId="$program->id"/>
                    <div class="absolute top-0 right-0 p-4 text-cyan-400 text-xl">🔒</div>
                @endif
            </div>
        @empty
            <p class="text-gray-500 col-span-full text-center">No programs yet.</p>
        @endforelse
    </div>
    <div class="mt-8 text-center">{{ $programs->links() }}</div>
</section>

{{-- LESSONS --}}
<section id="roadmap">
    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-200 mb-10 text-center">
        The Online Income Foundation
    </h2>
    <p class="text-center text-gray-400 mb-10 max-w-2xl mx-auto">
        Understand how online income really works before choosing a skill,
        platform, or tool. These lessons save you months of confusion.
    </p>

    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
        @forelse($lessons as $lesson)
            <div class="bg-gray-900 p-6 rounded-3xl shadow-lg border border-gray-800 hover:shadow-2xl transition flex flex-col group">
                {{-- Tier Badge --}}
                <div class="mb-3">
                    @if($lesson->tier === 'free')
                        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-green-400 text-black">
                            Free
                        </span>
                    @elseif($lesson->tier === 'pro')
                        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-cyan-400 text-black">
                            Pro
                        </span>
                    @elseif($lesson->tier === 'premium')
                        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-magenta-500 text-black">
                            Premium
                        </span>
                    @endif
                </div>

                {{-- Title --}}
                <h3 class="font-semibold text-xl text-gray-200 mb-2 group-hover:text-cyan-400 transition">
                    {{ $lesson->title }}
                </h3>

                {{-- Preview --}}
                <p class="text-gray-400 mb-6 text-sm">
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
                           class="inline-flex items-center text-cyan-400 font-semibold hover:text-cyan-600 transition">
                            Read lesson →
                        </a>
                    @else
                        <a href="{{ route('checkout.show', ['tier' => $lesson->tier]) }}"
                           class="inline-flex items-center text-gray-500 font-semibold hover:text-cyan-400 transition">
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
{{-- ================= --}}
{{-- VIDEOS --}}
{{-- ================= --}}
<section>
    <h2 class="text-3xl sm:text-4xl font-bold mb-10 text-center text-cyan-400">Video Academy</h2>
    <p class="text-center text-gray-400 max-w-2xl mx-auto mb-10">
        Watch actionable videos that take you from beginner to pro. 
        Each lesson complements our blogs, courses, and programs — implement what you learn immediately.
    </p>
    <div class="grid md:grid-cols-2 gap-8">
        @forelse($videos as $video)
            @php $canAccess = $video->canAccess(auth()->user()); @endphp
            <div class="relative rounded-3xl overflow-hidden shadow-lg bg-gray-900 group">
                @if($canAccess)
                    <iframe class="w-full aspect-video rounded-lg"
                            src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                            title="{{ $video->title }}"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>
                @else
                    <div class="relative bg-gray-800 text-gray-200 p-6 rounded-lg h-60 flex flex-col justify-center items-center">
                        <h3 class="font-semibold text-lg mb-2 text-center text-gray-200">{{ $video->title }}</h3>
                        <p class="text-sm text-gray-400 text-center">
                            {{ Str::limit(strip_tags($video->description), 100) }}
                        </p>
                        <x-locked-button :tier="$video->tier" :contentType="'video'" :contentId="$video->id" class="mt-4"/>
                        <div class="absolute top-0 right-0 p-4 text-cyan-400 text-xl">
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
{{-- BUSINESS HUSTLES --}}
{{-- ================= --}}
<section>
    <h2 class="text-3xl sm:text-4xl font-bold mb-10 text-center text-cyan-400">Hustles That Actually Work in Kenya</h2>
    <p class="text-center text-gray-400 max-w-2xl mx-auto mb-10">
        Real stories, real results. From street-side mandazis to small-scale rentals, see how everyday Kenyans start small, earn consistently, and scale their businesses.
    </p>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
        @forelse($businessIdeas as $idea)
            @php $canAccess = $idea->canAccess(auth()->user()); @endphp
            <div class="relative bg-gray-900 p-6 rounded-3xl shadow-lg hover:shadow-2xl transition group">
                <h3 class="font-semibold text-xl mb-3 group-hover:text-cyan-400 transition text-gray-200">{{ $idea->title }}</h3>
                <p class="text-gray-400 mb-4 text-sm">
                    {{ Str::limit(strip_tags($idea->summary ?? $idea->content), $canAccess ? 240 : 120) }}
                </p>

                @if($canAccess)
                    <a href="{{ route('business_ideas.show', ['businessIdea' => $idea->slug]) }}"
                       class="font-semibold text-cyan-400 hover:underline">
                        Read Full →
                    </a>
                    <span class="block mt-3 text-green-400 font-semibold text-sm">
                        {{ ucfirst($idea->tier) }} • Unlocked
                    </span>
                @else
                    <x-locked-button :tier="$idea->tier" :contentType="'business_idea'" :contentId="$idea->slug"/>
                    <div class="absolute top-0 right-0 p-4 text-cyan-400 text-xl">🔒</div>
                @endif
            </div>
        @empty
            <p class="text-gray-500 col-span-full text-center">No business ideas yet.</p>
        @endforelse
    </div>
    <div class="mt-8 text-center">{{ $businessIdeas->links() }}</div>
</section>

{{-- ================= --}}
{{-- USER SUCCESS IDEAS --}}
{{-- ================= --}}
<section>
    <h2 class="text-3xl sm:text-4xl font-bold mb-6 text-center text-cyan-400">
        User Success Ideas
    </h2>

    @auth
        <div class="mb-8 text-center">
            <a href="{{ route('frontend.user-business-ideas.create') }}"
               class="inline-block px-6 py-3 bg-green-400 text-black font-semibold rounded-xl hover:bg-green-500 transition">
                Submit Your Idea & Proposal
            </a>
        </div>
    @endauth

    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
        @forelse($userGeneratedBusinessIdeas as $idea)
            @php $canAccess = $idea->canAccess(auth()->user()); @endphp
            <div class="relative bg-gray-900 p-6 rounded-3xl shadow-lg hover:shadow-2xl transition group">
                <h3 class="font-semibold text-xl mb-3 group-hover:text-cyan-400 transition text-gray-200">
                    {{ $idea->title }}
                </h3>
                <p class="text-gray-400 mb-4 text-sm">
                    {{ Str::limit(strip_tags($idea->content), $canAccess ? 240 : 120) }}
                </p>

                @if($canAccess && $idea instanceof \App\Models\UserGeneratedBusinessIdea && !empty($idea->slug))
                    <a href="{{ route('frontend.user-business-ideas.show', ['businessIdea' => $idea]) }}"
                       class="font-semibold text-cyan-400 hover:underline">
                        Read Full →
                    </a>
                    <span class="block mt-3 text-green-400 font-semibold text-sm">
                        {{ ucfirst($idea->tier) }} • Unlocked
                    </span>
                @else
                    <x-locked-button :tier="$idea->tier" contentType="user_business_idea" :contentId="$idea->id"/>
                    <div class="absolute top-0 right-0 p-4 text-cyan-400 text-xl">🔒</div>
                @endif
            </div>
        @empty
            <p class="text-gray-500 col-span-full text-center">No user success ideas yet.</p>
        @endforelse
    </div>

    @if(method_exists($userGeneratedBusinessIdeas, 'links'))
        <div class="mt-8 text-center">
            {{ $userGeneratedBusinessIdeas->links() }}
        </div>
    @endif
</section>

{{-- ================= --}}
{{-- CTA SECTION --}}
{{-- ================= --}}
<section class="bg-gray-900 text-gray-200 p-14 rounded-3xl text-center shadow-xl">
    <h2 class="text-4xl font-extrabold mb-4 text-cyan-400">
        Ready to Go Pro?
    </h2>
    <p class="text-lg mb-8 max-w-2xl mx-auto text-gray-400">
        Unlock premium systems, deep-dive programs, client-winning playbooks,
        and real business execution frameworks.
    </p>

    <a href="{{ route('checkout.show', ['tier' => 'pro']) }}"
       class="inline-block bg-cyan-400 text-black font-bold px-10 py-4 rounded-xl hover:bg-cyan-500 transition transform hover:-translate-y-1">
        Upgrade to Pro →
    </a>
</section>
@endsection
