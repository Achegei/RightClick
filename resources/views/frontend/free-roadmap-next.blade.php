@extends('layouts.front')

@section('title', 'Free Roadmap — Land Your First Paying Client')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-24">

    {{-- Hero --}}
    <div class="text-center mb-16">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-4">Your Free 90-Day Freelance Roadmap</h1>
        <p class="text-gray-600 text-lg max-w-2xl mx-auto">
            Get started with actionable lessons and exercises. Complete free snippets today and unlock the full roadmap with Pro!
        </p>
    </div>

    {{-- Gamified Progress Bar --}}
    @php
        $totalLessons = $lessons->count();
        $freeLessons = $lessons->filter(fn($l) => $l->is_free)->count();
        $progressPercent = $totalLessons > 0 ? round(($freeLessons / $totalLessons) * 100) : 0;
    @endphp
    <div class="mb-12">
        <p class="text-gray-700 font-medium mb-2">Free Roadmap Progress: {{ $progressPercent }}%</p>
        <div class="w-full bg-gray-200 h-4 rounded-full overflow-hidden shadow-inner">
            <div class="h-4 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full transition-all duration-700" style="width: {{ $progressPercent }}%"></div>
        </div>
    </div>

    {{-- Roadmap Lessons --}}
    <div class="grid md:grid-cols-2 gap-8 mb-16">
        @foreach($lessons as $lesson)
        <div class="bg-white rounded-2xl shadow-lg p-6 transition hover:shadow-2xl relative">
            @if(!$lesson->is_free)
            <div class="absolute inset-0 bg-white/80 backdrop-blur-sm rounded-2xl flex flex-col items-center justify-center z-10">
                <p class="text-gray-700 font-semibold mb-4 text-center">Unlock Pro to continue this lesson</p>
                <a href="{{ route('checkout', ['tier' => 'pro']) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition">
                    Unlock Pro
                </a>
            </div>
            @endif
            <h3 class="text-xl font-bold mb-2">{{ $lesson->title }}</h3>
            <p class="text-gray-600">{{ $lesson->content }}</p>
        </div>
        @endforeach
    </div>

    {{-- Blogs --}}
    @if($blogs->count())
    <div class="mb-16">
        <h2 class="text-3xl font-bold mb-6 text-center">Latest Articles</h2>
        <div class="grid md:grid-cols-2 gap-8">
            @foreach($blogs as $blog)
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-xl font-bold mb-2">{{ $blog->title }}</h3>
                <p class="text-gray-600 mb-4">{{ $blog->excerpt }}</p>
                <a href="{{ route('blogs.show', $blog->slug) }}" class="text-blue-600 font-semibold hover:underline">Read more →</a>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Resources --}}
    @if($resources->count())
    <div class="mb-16">
        <h2 class="text-3xl font-bold mb-6 text-center">Free Resources</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($resources as $resource)
            <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-between">
                <h3 class="text-lg font-semibold mb-2">{{ $resource->title }}</h3>
                <p class="text-gray-600 mb-4">{{ ucfirst($resource->type) }}</p>
                <a href="{{ asset('storage/' . $resource->file_path) }}" class="mt-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg text-center transition" download>
                    Download
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Testimonials --}}
    @if($testimonials->count())
    <div class="mb-16">
        <h2 class="text-3xl font-bold mb-6 text-center">Success Stories</h2>
        <div class="grid md:grid-cols-2 gap-8">
            @foreach($testimonials as $testimonial)
            <div class="bg-white rounded-2xl shadow-lg p-6 flex items-start gap-4">
                @if($testimonial->avatar)
                <img src="{{ asset('storage/' . $testimonial->avatar) }}" class="w-12 h-12 rounded-full object-cover" alt="{{ $testimonial->name }}">
                @endif
                <div>
                    <p class="text-gray-700 italic mb-2">"{{ $testimonial->content }}"</p>
                    <p class="text-gray-900 font-semibold">— {{ $testimonial->name }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Newsletter Signup --}}
    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl p-12 text-center text-white mb-16">
        <h2 class="text-3xl font-bold mb-4">Join Our Newsletter</h2>
        <p class="mb-6">Subscribe to get free templates, PDFs, and roadmap updates straight to your inbox.</p>
        @if(session('success'))
        <p class="bg-green-500 text-white rounded p-2 mb-4 inline-block">{{ session('success') }}</p>
        @endif
        <form action="{{ route('free-roadmap.subscribe') }}" method="POST" class="flex flex-col md:flex-row justify-center gap-4">
            @csrf
            <input type="text" name="name" placeholder="Your Name" class="p-3 rounded-lg text-gray-900 flex-1" required>
            <input type="email" name="email" placeholder="Your Email" class="p-3 rounded-lg text-gray-900 flex-1" required>
            <button type="submit" class="bg-white text-blue-600 font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition">Subscribe</button>
        </form>
    </div>

    {{-- CTA --}}
    <div class="text-center mb-16">
        <h2 class="text-3xl font-bold mb-4">Unlock the Full Roadmap</h2>
        <p class="text-gray-700 mb-6 max-w-2xl mx-auto">Free lessons give you a taste — Pro and Premium give you the full system, templates, exercises, and client-winning skills.</p>
        <a href="{{ route('checkout', ['tier' => 'pro']) }}" class="inline-block bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold px-10 py-4 rounded-lg shadow-lg transition transform hover:scale-105">
            Upgrade to Pro
        </a>
    </div>
</div>
@endsection
