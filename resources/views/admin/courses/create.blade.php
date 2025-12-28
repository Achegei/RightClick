@extends('layouts.admin')

@section('title', 'Create Course')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-4xl">

    {{-- Header --}}
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900">Create Course</h1>
        <a href="{{ route('admin.courses.index') }}"
           class="text-blue-600 hover:underline">
            &larr; Back to Courses
        </a>
    </div>

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.courses.store') }}" method="POST">
            @csrf

            {{-- Program --}}
            <div class="mb-4">
                <label for="program_id" class="block text-gray-700 font-semibold mb-2">
                    Program <span class="text-red-500">*</span>
                </label>
                <select name="program_id"
                        id="program_id"
                        class="w-full border border-gray-300 rounded px-3 py-2
                               focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    <option value="">-- Select Program --</option>
                    @foreach($programs as $program)
                        <option value="{{ $program->id }}"
                            {{ old('program_id') == $program->id ? 'selected' : '' }}>
                            {{ $program->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Course Title --}}
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">
                    Course Title <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       name="title"
                       id="title"
                       value="{{ old('title') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2
                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Enter course title"
                       required>
            </div>

            {{-- Description --}}
            <div class="mb-6">
                <label for="description" class="block text-gray-700 font-semibold mb-2">
                    Description
                </label>
                <textarea name="description"
                          id="description"
                          rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2
                                 focus:outline-none focus:ring-2 focus:ring-blue-500"
                          placeholder="Enter course description">{{ old('description') }}</textarea>
            </div>

            {{-- Tier --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">
                    Access Tier <span class="text-red-500">*</span>
                </label>
                <select name="tier"
                        class="w-full border border-gray-300 rounded px-3 py-2
                            focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @foreach(['free', 'pro', 'premium'] as $tier)
                        <option value="{{ $tier }}" {{ old('tier') === $tier ? 'selected' : '' }}>
                            {{ ucfirst($tier) }}
                        </option>
                    @endforeach
                </select>
            </div>


            {{-- Submit --}}
            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold
                               px-6 py-2 rounded transition">
                    Save Course
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
