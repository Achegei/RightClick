@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Success Story</h1>

    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded-lg">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('admin.success-stories.update', $successStory->id) }}"
          class="bg-white p-6 rounded-xl shadow space-y-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div>
            <label class="block font-semibold mb-1">Title</label>
            <input name="title"
                   value="{{ old('title', $successStory->title) }}"
                   class="w-full border p-3 rounded"
                   required>
        </div>

        {{-- Excerpt --}}
        <div>
            <label class="block font-semibold mb-1">Excerpt</label>
            <textarea name="excerpt" rows="3"
                      class="w-full border p-3 rounded">{{ old('excerpt', $successStory->excerpt) }}</textarea>
        </div>

        {{-- Content --}}
        <div>
            <label class="block font-semibold mb-1">Content</label>
            <textarea name="content" rows="8"
                      class="w-full border p-3 rounded">{{ old('content', $successStory->content) }}</textarea>
        </div>

        {{-- Featured Image --}}
        <div>
            <label class="block font-semibold mb-1">Featured Image</label>
            <input type="file" name="featured_image" class="w-full">
            @if($successStory->featured_image)
                <img src="{{ asset('storage/'.$successStory->featured_image) }}" class="mt-2 h-24 rounded">
            @endif
        </div>

        {{-- Tier --}}
        <div class="flex gap-6 items-center">
            <div>
                <label class="block font-semibold mb-1">Tier</label>
                <select name="tier" class="border p-3 rounded">
                    @foreach(['free', 'pro', 'premium'] as $tier)
                        <option value="{{ $tier }}" @selected($successStory->tier === $tier)>
                            {{ ucfirst($tier) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Status --}}
            <label class="flex items-center gap-2 mt-6">
                <input type="checkbox" name="status" value="published"
                       @checked($successStory->status === 'published')>
                Published
            </label>
        </div>

        {{-- Submit --}}
        <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg mt-4">
            Update Story
        </button>
    </form>
</div>
@endsection
