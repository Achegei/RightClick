@extends('layouts.admin')

@section('title', 'Edit Program')

@section('content')
<div class="container mx-auto px-4 py-6">
    {{-- Header --}}
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900">Edit Program</h1>
        <a href="{{ route('admin.programs.index') }}" 
           class="text-blue-600 hover:underline">&larr; Back to Programs</a>
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
        <form action="{{ route('admin.programs.update', $program->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Program Name --}}
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">
                    Program Name <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" id="name" 
                       value="{{ old('name', $program->name) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2
                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Enter program name" required>
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">
                    Description
                </label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2
                                 focus:outline-none focus:ring-2 focus:ring-blue-500"
                          placeholder="Enter program description">{{ old('description', $program->description) }}</textarea>
            </div>

            {{-- Tier --}}
            <div class="mb-4">
                <label for="tier" class="block text-gray-700 font-semibold mb-2">
                    Access Tier <span class="text-red-500">*</span>
                    <span class="text-sm text-gray-500 italic ml-2">
                        Select the program tier to determine which checkout route is used.
                    </span>
                </label>
                <select name="tier" id="tier"
                        class="w-full border border-gray-300 rounded px-3 py-2
                               focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @foreach(['free', 'pro', 'premium'] as $tier)
                        <option value="{{ $tier }}" 
                            {{ old('tier', $program->tier) === $tier ? 'selected' : '' }}>
                            {{ ucfirst($tier) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.programs.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold px-6 py-2 rounded transition">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded transition">
                    Update Program
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
