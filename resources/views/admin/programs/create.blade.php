@extends('layouts.front')

@section('title', $program->name)

@section('content')
<div class="max-w-4xl mx-auto px-6 py-12 space-y-8">

    {{-- Program Header --}}
    <div class="space-y-4">
        <h1 class="text-5xl font-extrabold text-gray-900">{{ $program->name }}</h1>
        <p class="text-gray-600 text-lg">{{ $program->description }}</p>
    </div>

    {{-- Program Info & Enroll --}}
    <div class="flex flex-wrap items-center gap-4 mt-4">
        <span class="text-gray-900 font-bold text-xl">${{ number_format($program->price, 0) }}</span>
        <span class="text-gray-700">Duration: {{ $program->duration_days }} days</span>

        @php
            switch($program->tier) {
                case 'free':
                    $enrollUrl = route('roadmap.free');
                    $enrollText = 'Start Free →';
                    break;
                case 'pro':
                    $enrollUrl = route('checkout.show', ['tier' => 'pro']);
                    $enrollText = 'Enroll Now →';
                    break;
                case 'premium':
                    $enrollUrl = route('checkout.show', ['tier' => 'premium']);
                    $enrollText = 'Enroll Now →';
                    break;
                default:
                    $enrollUrl = '#';
                    $enrollText = 'Enroll →';
                    break;
            }
        @endphp

        <a href="{{ $enrollUrl }}"
           class="ml-auto bg-indigo-600 text-white px-6 py-3 rounded-xl hover:bg-indigo-700 transition">
            {{ $enrollText }}
        </a>
    </div>

    {{-- Courses Included --}}
    <section class="mt-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Courses Included</h2>
        @if($program->courses->isEmpty())
            <p class="text-gray-500 italic">No courses have been added to this program yet.</p>
        @else
            <div class="grid md:grid-cols-2 gap-6">
                @foreach($program->courses as $course)
                    <div class="bg-gray-50 p-6 rounded-2xl shadow hover:shadow-md transition group relative">
                        <h3 class="text-indigo-600 font-semibold text-lg mb-2">{{ $course->name }}</h3>
                        <p class="text-gray-700 mb-3">
                            {{ Str::limit(strip_tags($course->description ?? 'No description available.'), 180) }}
                        </p>

                        @if($course->tier !== 'free')
                            <span class="absolute top-4 right-4 text-indigo-600 text-xl">🔒</span>
                        @endif

                        <span class="block mt-2 text-sm font-semibold text-gray-500">
                            Tier: {{ ucfirst($course->tier) }}
                        </span>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
</div>
@endsection
