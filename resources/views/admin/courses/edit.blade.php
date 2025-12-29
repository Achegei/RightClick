@extends('layouts.admin')

@section('title', 'Edit Course')

@section('content')
<div class="container mx-auto px-4 py-6">
    {{-- Header --}}
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900">Edit Course</h1>
        <a href="{{ route('admin.courses.index') }}" 
           class="text-blue-600 hover:underline">&larr; Back to Courses</a>
    </div>

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Edit Form --}}
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Program --}}
            <div class="mb-4">
                <label for="program_id" class="block text-gray-700 font-semibold mb-2">
                    Program <span class="text-red-500">*</span>
                </label>
                <select name="program_id" id="program_id" required
                        class="w-full border border-gray-300 rounded px-3 py-2
                               focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach($programs as $program)
                        <option value="{{ $program->id }}" 
                            {{ old('program_id', $course->program_id) == $program->id ? 'selected' : '' }}>
                            {{ $program->name }}
                        </option>
                    @endforeach
                </select>
                @error('program_id') 
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                @enderror
            </div>

            {{-- Course Title --}}
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">
                    Course Title <span class="text-red-500">*</span>
                </label>
                <input type="text" name="title" id="title" 
                       value="{{ old('title', $course->title) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2
                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Enter course title" required>
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">
                    Description
                </label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2
                                 focus:outline-none focus:ring-2 focus:ring-blue-500"
                          placeholder="Enter course description">{{ old('description', $course->description) }}</textarea>
            </div>

            {{-- Tier --}}
            <div class="mb-4">
                <label for="tier" class="block text-gray-700 font-semibold mb-2">
                    Access Tier <span class="text-red-500">*</span>
                    <span class="text-sm text-gray-500 italic ml-2">
                        Determines which checkout route this course uses.
                    </span>
                </label>
                <select name="tier" id="tier" required
                        class="w-full border border-gray-300 rounded px-3 py-2
                               focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach(['free', 'pro', 'premium'] as $tier)
                        <option value="{{ $tier }}" 
                            {{ old('tier', $course->tier) === $tier ? 'selected' : '' }}>
                            {{ ucfirst($tier) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.courses.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold px-6 py-2 rounded transition">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded transition">
                    Update Course
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
