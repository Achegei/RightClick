@extends('layouts.front')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">
        Explore Our Programs
    </h1>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($programs as $program)
            <div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition duration-300">
                <h2 class="text-2xl font-semibold text-indigo-600 mb-2">{{ $program->name }}</h2>
                <p class="text-gray-700 mb-4 line-clamp-3">{{ $program->description }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-gray-900 font-bold">${{ number_format($program->price, 0) }}</span>
                    <a href="{{ route('programs.show', $program->slug) }}"
                       class="bg-indigo-600 text-white px-4 py-2 rounded-xl hover:bg-indigo-700 transition">
                        View Program
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
