@extends('layouts.admin')

@section('title', 'Create Program')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900">Create Program</h1>
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

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.programs.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Program Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Enter program name" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                          placeholder="Enter program description">{{ old('description') }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded transition">
                    Save Program
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
