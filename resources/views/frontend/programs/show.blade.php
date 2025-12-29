@extends('layouts.front')

@section('title', $program->name)

@section('content')
<div class="container mx-auto px-4 py-12 max-w-5xl">

    {{-- Back to Programs --}}
    <div class="mb-6">
        <a href="{{ route('admin.programs.index') }}" 
           class="text-indigo-600 hover:text-indigo-800 font-semibold text-sm inline-flex items-center">
            &larr; Back to Programs
        </a>
    </div>

    {{-- Program Header --}}
    <div class="bg-white shadow-xl rounded-2xl p-8 mb-10 border border-gray-100">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-2">{{ $program->name }}</h1>
        <p class="text-gray-600 text-lg mb-4">{{ $program->description }}</p>

        {{-- Badges --}}
        <div class="flex items-center space-x-3 mb-6">
            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm font-medium">
                {{ ucfirst($program->tier) }} Tier
            </span>
            <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm font-medium">
                Duration: {{ $program->duration_days }} days
            </span>
        </div>

        {{-- Pricing & CTA --}}
        <div class="flex items-center space-x-6">
            <span class="text-gray-900 font-bold text-2xl">${{ number_format($program->price, 0) }}</span>

            @php
                if($program->tier === 'free') {
                    $enrollUrl = route('free-roadmap');
                } elseif($program->tier === 'pro') {
                    $enrollUrl = route('checkout.show', ['tier' => 'pro']);
                } elseif($program->tier === 'premium') {
                    $enrollUrl = route('checkout.show', ['tier' => 'premium']);
                } else {
                    $enrollUrl = '#';
                }
            @endphp

            <a href="{{ $enrollUrl }}" 
               class="ml-auto bg-indigo-600 text-white font-semibold px-8 py-3 rounded-xl shadow-md hover:bg-indigo-700 transition">
                Enroll Now
            </a>
        </div>
    </div>

    {{-- Optional Sections (features, testimonials, roadmap) --}}
    <div class="grid md:grid-cols-2 gap-8">
        {{-- Example Feature --}}
        <div class="bg-white p-6 rounded-2xl shadow border border-gray-100">
            <h3 class="text-xl font-bold text-gray-900 mb-2">What You’ll Learn</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
                <li>Master the key concepts in {{ $program->name }}</li>
                <li>Hands-on exercises and case studies</li>
                <li>Step-by-step roadmap for success</li>
            </ul>
        </div>

        {{-- Example Testimonial --}}
        <div class="bg-white p-6 rounded-2xl shadow border border-gray-100">
            <h3 class="text-xl font-bold text-gray-900 mb-2">Student Success</h3>
            <p class="text-gray-700 italic">“This program transformed how I approach {{ $program->name }}. Highly recommended!”</p>
            <p class="text-gray-900 font-semibold mt-2">— Alex S., YC Founder</p>
        </div>
    </div>
</div>
@endsection
