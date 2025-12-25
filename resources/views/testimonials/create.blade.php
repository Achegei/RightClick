@extends('layouts.front') {{-- your public layout --}}

@section('title', 'Submit a Testimonial')

@section('content')
<div class="max-w-2xl mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6">Submit Your Testimonial</h1>

    <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded-2xl shadow-md border border-gray-200">
        @csrf

        <div>
            <label class="block font-medium text-gray-700">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700">Location (optional)</label>
            <input type="text" name="location" value="{{ old('location') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('location') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700">Testimonial</label>
            <textarea name="content" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('content') }}</textarea>
            @error('content') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700">Avatar (optional)</label>
            <input type="file" name="avatar" class="w-full">
            @error('avatar') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
            Submit Testimonial
        </button>

        <p class="text-sm text-gray-500 mt-2">Your testimonial will be reviewed by admin before it appears publicly.</p>
    </form>
</div>
@endsection
