@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Edit Testimonial</h1>

    <div class="bg-white shadow-md rounded-2xl p-8 border border-gray-200">
        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Name --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input type="text" name="name" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('name', $testimonial->name) }}">
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Location --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                <input type="text" name="location" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('location', $testimonial->location) }}">
                @error('location') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Content --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                <textarea name="content" rows="5" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('content', $testimonial->content) }}</textarea>
                @error('content') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Avatar --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Avatar</label>
                <input type="file" name="avatar" class="block w-full text-gray-700">
                @if($testimonial->avatar)
                    <img src="{{ asset('storage/' . $testimonial->avatar) }}" class="mt-3 w-20 h-20 rounded-full object-cover border border-gray-200">
                @endif
                @error('avatar') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Approved --}}
            <div>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="approved" value="1" {{ $testimonial->approved ? 'checked' : '' }}>
                    <span class="ml-2">Approved</span>
                </label>
            </div>

            {{-- Submit --}}
            <div class="pt-4">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg shadow">
                    Update Testimonial
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
