@extends('layouts.front')

@section('title', 'Your Learning Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">

    <h1 class="text-4xl font-extrabold mb-10 text-gray-900">Welcome back, {{ $user->name }} 👋</h1>

    @forelse($programs as $program)
    <div class="mb-16 rounded-2xl shadow-xl overflow-hidden bg-gradient-to-r from-purple-50 via-white to-blue-50 transition hover:scale-105">
        {{-- Program Header --}}
        <div class="p-8 flex flex-col md:flex-row md:justify-between md:items-center bg-white">
            <h2 class="text-3xl font-bold text-gray-900">{{ $program->name }}</h2>
            <span class="mt-2 md:mt-0 text-gray-500">{{ $program->duration_days ?? '90' }} Days</span>
        </div>

        {{-- Animated Pie Progress --}}
        @php
            $totalLessons = $program->courses->sum(fn($c) => $c->lessons->count());
            $completedLessons = $program->courses->sum(fn($c) => $c->lessons->filter(fn($l) => $l->pivot->completed ?? false)->count());
            $progressPercent = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100) : 0;
        @endphp
        <div class="flex justify-center my-8">
            <div class="relative w-40 h-40">
                <svg class="w-40 h-40 transform -rotate-90">
                    <circle cx="80" cy="80" r="70" stroke="#e5e7eb" stroke-width="20" fill="none"></circle>
                    <circle cx="80" cy="80" r="70" stroke="url(#gradient)" stroke-width="20" fill="none"
                        stroke-dasharray="{{ 2 * pi() * 70 }}"
                        stroke-dashoffset="{{ 2 * pi() * 70 * (1 - $progressPercent/100) }}"
                        stroke-linecap="round"
                        style="transition: stroke-dashoffset 1s ease"></circle>
                    <defs>
                        <linearGradient id="gradient" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0%" stop-color="#6366f1"/>
                            <stop offset="100%" stop-color="#3b82f6"/>
                        </linearGradient>
                    </defs>
                </svg>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="text-3xl font-bold text-gray-800">{{ $progressPercent }}%</span>
                </div>
            </div>
        </div>

        {{-- Courses Grid --}}
        <div class="grid md:grid-cols-2 gap-8 p-8">
            @foreach($program->courses as $course)
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition transform hover:-translate-y-1">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $course->title }}</h3>
                <p class="text-gray-500 mb-4">{{ $course->description }}</p>

                {{-- Lessons List --}}
                <ul class="space-y-2">
                    @foreach($course->lessons as $lesson)
                    @php
                        $isCompleted = $lesson->pivot->completed ?? false;
                    @endphp
                    <li class="flex items-center justify-between p-2 rounded-lg bg-gradient-to-r {{ $isCompleted ? 'from-green-100 to-green-200' : 'from-gray-50 to-white' }} shadow-sm hover:shadow-md transition">
                        <div class="flex items-center space-x-3">
                            <input type="checkbox" class="lesson-complete w-5 h-5 accent-indigo-500" data-lesson-id="{{ $lesson->id }}" {{ $isCompleted ? 'checked' : '' }}>
                            <span class="{{ $isCompleted ? 'line-through text-gray-400 font-medium' : 'text-gray-800 font-medium' }}">{{ $lesson->title }}</span>
                        </div>
                        @if($isCompleted)
                        <span class="text-green-600 font-bold text-lg">✔</span>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
    @empty
    <p class="text-gray-500 text-lg text-center mt-12">
        You are not enrolled in any programs yet. <a href="{{ route('register') }}" class="text-indigo-600 underline font-semibold">Enroll now</a> to start learning!
    </p>
    @endforelse
</div>

{{-- AJAX for lesson completion --}}
<script>
    document.querySelectorAll('.lesson-complete').forEach(cb => {
        cb.addEventListener('change', async (e) => {
            const lessonId = e.target.dataset.lessonId;
            const completed = e.target.checked;

            const res = await fetch(`/lessons/${lessonId}/complete`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ completed })
            });

            if(res.ok){
                location.reload();
            }
        });
    });
</script>
@endsection
