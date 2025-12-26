@extends('layouts.front')

@section('title', 'Free Roadmap — Land Your First Paying Client')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-24 flex flex-col lg:flex-row gap-12">

    {{-- Sticky Sidebar --}}
    <aside class="hidden lg:block w-64 sticky top-24 self-start">
        <div class="bg-white shadow-md rounded-2xl p-6">
            <h2 class="text-xl font-bold mb-4">Roadmap Navigation</h2>
            <ul class="space-y-2">
                @foreach($lessons as $lesson)
                    <li>
                        <a href="#lesson-{{ $lesson->id }}" 
                           class="block px-3 py-2 rounded-lg hover:bg-blue-50 transition
                           {{ $lesson->is_free ? 'text-gray-900' : 'text-gray-400 cursor-not-allowed' }}">
                            @if($lesson->is_free)
                                ✅ 
                            @else
                                🔒
                            @endif
                            {{ $lesson->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1">

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
            $freeLessonsCompleted = $lessons->filter(fn($l) => $l->is_free && $l->completed_by_user)->count();
            $progressPercent = $totalLessons > 0 ? round(($freeLessonsCompleted / $totalLessons) * 100) : 0;
        @endphp
        <div class="mb-12">
            <p class="text-gray-700 font-medium mb-2">Free Roadmap Progress: <span id="progress-text">{{ $progressPercent }}</span>%</p>
            <div class="w-full bg-gray-200 h-4 rounded-full overflow-hidden shadow-inner">
                <div id="progress-bar" class="h-4 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full transition-all duration-700" style="width: {{ $progressPercent }}%"></div>
            </div>
        </div>

        {{-- Roadmap Lessons --}}
        <div class="grid md:grid-cols-2 gap-8 mb-16">
            @foreach($lessons as $lesson)
            <div id="lesson-{{ $lesson->id }}" class="bg-white rounded-2xl shadow-lg p-6 transition hover:shadow-2xl relative flex flex-col">
                
                @if($lesson->is_free)
                <button class="absolute top-4 right-4 text-sm px-3 py-1 rounded-lg font-semibold transition 
                               {{ $lesson->completed_by_user ? 'bg-green-500 text-white' : 'bg-blue-600 text-white hover:bg-blue-700' }}"
                        @if(!$lesson->completed_by_user) onclick="markCompleted({{ $lesson->id }})" @endif>
                    {{ $lesson->completed_by_user ? 'Completed' : 'Mark Completed' }}
                </button>
                @else
                <div class="absolute inset-0 bg-white/80 backdrop-blur-sm rounded-2xl flex flex-col items-center justify-center z-10">
                    <p class="text-gray-700 font-semibold mb-4 text-center">Unlock Pro to continue this lesson</p>
                    <a href="{{ route('checkout', ['tier' => 'pro']) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition">
                        Unlock Pro
                    </a>
                </div>
                @endif

                <h3 class="text-xl font-bold mb-2">{{ $lesson->title }}</h3>
                <p class="text-gray-600 flex-1">{{ $lesson->content }}</p>
            </div>
            @endforeach
        </div>

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
            <a href="{{ route('pricing') }}" class="inline-block bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold px-10 py-4 rounded-lg shadow-lg transition transform hover:scale-105">
                Check Out our offers
            </a>
        </div>

    </div>
</div>

{{-- AJAX Script --}}
<script>
function markCompleted(lessonId) {
    fetch("{{ route('free-roadmap.complete') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ lesson_id: lessonId })
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            const btn = document.querySelector(`#lesson-${lessonId} button`);
            btn.classList.remove('bg-blue-600','hover:bg-blue-700');
            btn.classList.add('bg-green-500','text-white');
            btn.innerText = 'Completed';

            // Update progress
            const progressText = document.getElementById('progress-text');
            const progressBar = document.getElementById('progress-bar');
            progressText.innerText = data.progress_percent;
            progressBar.style.width = data.progress_percent + '%';
        }
    })
    .catch(err => console.error(err));
}
</script>

@endsection
