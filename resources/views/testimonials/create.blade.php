@extends('layouts.front') {{-- your public layout --}}

@section('title', 'Submit a Testimonial')

@section('content')
<div class="max-w-2xl mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6 text-gray-200">Submit Your Testimonial</h1>

    <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-gray-900 p-6 rounded-2xl shadow-lg border border-gray-800">
        @csrf

        <div>
            <label class="block font-medium text-gray-400">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border-gray-700 bg-gray-800 text-gray-200 rounded-lg shadow-sm focus:ring-cyan-400 focus:border-cyan-400" required>
            @error('name') <p class="text-magenta-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-400">Location (optional)</label>
            <input type="text" name="location" value="{{ old('location') }}" class="w-full border-gray-700 bg-gray-800 text-gray-200 rounded-lg shadow-sm focus:ring-cyan-400 focus:border-cyan-400">
            @error('location') <p class="text-magenta-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-400">Testimonial</label>
            <textarea name="content" rows="4" class="w-full border-gray-700 bg-gray-800 text-gray-200 rounded-lg shadow-sm focus:ring-cyan-400 focus:border-cyan-400" required>{{ old('content') }}</textarea>
            @error('content') <p class="text-magenta-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-400">Avatar (optional)</label>
            <input type="file" name="avatar" class="w-full text-gray-200">
            @error('avatar') <p class="text-magenta-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-cyan-400 hover:bg-cyan-500 text-gray-900 font-semibold py-2 px-4 rounded-lg shadow transition">
            Submit Testimonial
        </button>

        <p class="text-sm text-gray-400 mt-2">Your testimonial will be reviewed by admin before it appears publicly.</p>
    </form>
</div>
@endsection
