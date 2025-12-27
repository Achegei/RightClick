@extends('layouts.front')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
    <h1 class="text-5xl font-extrabold text-gray-900 mb-4">{{ $program->name }}</h1>
    <p class="text-gray-600 text-lg mb-6">{{ $program->description }}</p>

    <div class="flex items-center mb-8 space-x-6">
        <span class="text-gray-900 font-bold text-xl">${{ number_format($program->price, 0) }}</span>
        <span class="text-gray-700">Duration: {{ $program->duration_days }} days</span>
        <a href="#enroll" class="ml-auto bg-indigo-600 text-white px-6 py-3 rounded-xl hover:bg-indigo-700 transition">
            Enroll Now
        </a>
    </div>

    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Courses Included</h2>
    <ul class="space-y-3">
        @foreach($program->courses as $course)
            <li class="bg-gray-50 p-4 rounded-xl shadow-sm hover:shadow-md transition">
                <h3 class="font-medium text-indigo-600">{{ $course->name }}</h3>
                <p class="text-gray-700">{{ $course->description ?? 'No description available.' }}</p>
            </li>
        @endforeach
    </ul>

    @if($program->courses->isEmpty())
        <p class="mt-6 text-gray-500 italic">No courses have been added to this program yet.</p>
    @endif
</div>
@endsection
