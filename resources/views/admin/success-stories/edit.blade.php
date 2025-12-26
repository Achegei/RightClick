@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-6">
    <h1 class="text-3xl font-bold mb-6">Edit Success Story</h1>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded-lg">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.success-stories.update', $successStory) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-xl rounded-2xl p-8 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="{{ old('title', $successStory->title) }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm p-3">
        </div>

        <div>
            <label class="block font-medium text-gray-700">Author</label>
            <input type="text" name="author" value="{{ old('author', $successStory->author) }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm p-3">
        </div>

        <div>
            <label class="block font-medium text-gray-700">Summary</label>
            <textarea name="summary" rows="2" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm p-3">{{ old('summary', $successStory->summary) }}</textarea>
        </div>

        <div>
            <label class="block font-medium text-gray-700">Content</label>
            <textarea name="content" rows="6" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm p-3">{{ old('content', $successStory->content) }}</textarea>
        </div>

        <div>
            <label class="block font-medium text-gray-700">Image</label>
            @if($successStory->image)
                <img src="{{ asset('storage/'.$successStory->image) }}" class="mb-2 w-32 h-32 object-cover rounded-lg">
            @endif
            <input type="file" name="image" class="mt-1 block w-full">
        </div>

        <div class="flex items-center space-x-6">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_premium" class="form-checkbox" value="1" {{ $successStory->is_premium ? 'checked' : '' }}>
                <span class="ml-2">Premium (Pro Users Only)</span>
            </label>

            <label class="inline-flex items-center">
                <input type="checkbox" name="published" class="form-checkbox" value="1" {{ $successStory->published ? 'checked' : '' }}>
                <span class="ml-2">Published</span>
            </label>
        </div>

        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg shadow">
            Update Story
        </button>
    </form>
</div>
@endsection
