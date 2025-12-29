@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-6">
    <h1 class="text-2xl font-bold mb-6">Edit Lesson</h1>

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
          action="{{ route('admin.lessons.update', $lesson->id) }}"
          class="bg-white p-6 rounded-xl shadow space-y-5">
        @csrf
        @method('PUT')

        {{-- Course --}}
        <div>
            <label class="block font-semibold mb-1">Course</label>
            <select name="course_id" class="w-full border p-3 rounded" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}"
                        @selected($lesson->course_id === $course->id)>
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Title --}}
        <div>
            <label class="block font-semibold mb-1">Title</label>
            <input name="title"
                   value="{{ old('title', $lesson->title) }}"
                   class="w-full border p-3 rounded"
                   required>
        </div>

        {{-- Content --}}
        <div>
            <label class="block font-semibold mb-1">Content</label>
            <textarea name="content" rows="8"
                      class="w-full border p-3 rounded">{{ old('content', $lesson->content) }}</textarea>
        </div>

        {{-- Tier + Order --}}
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold mb-1">Tier</label>
                <select name="tier" class="w-full border p-3 rounded">
                    @foreach(['free', 'pro', 'premium'] as $tier)
                        <option value="{{ $tier }}" @selected($lesson->tier === $tier)>
                            {{ ucfirst($tier) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Order</label>
                <input type="number"
                       name="order"
                       value="{{ old('order', $lesson->order) }}"
                       class="w-full border p-3 rounded">
            </div>
        </div>

        {{-- Submit --}}
        <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg">
            Update Lesson
        </button>
    </form>
</div>
@endsection
