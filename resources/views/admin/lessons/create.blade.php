@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">Add Lesson</h1>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.lessons.store') }}"
          class="bg-white p-8 rounded-2xl shadow space-y-6">
        @csrf

        {{-- Course --}}
        <div>
            <label class="font-semibold">Course</label>
            <select name="course_id" class="w-full border p-3 rounded">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>

        {{-- Title --}}
        <div>
            <label class="font-semibold">Title</label>
            <input name="title" class="w-full border p-3 rounded" required>
        </div>

        {{-- Content --}}
        <div>
            <label class="font-semibold">Lesson Content</label>
            <textarea name="content" rows="6" class="w-full border p-3 rounded"></textarea>
        </div>

        {{-- Phase --}}
        <div>
            <label class="font-semibold">Phase</label>
            <input name="phase" placeholder="Discovery / Skill Building / Client Acquisition"
                   class="w-full border p-3 rounded">
        </div>

        {{-- Lesson Type --}}
        <div>
            <label class="font-semibold">Lesson Type</label>
            <select name="lesson_type" class="w-full border p-3 rounded">
                <option value="mindset">Mindset</option>
                <option value="strategy">Strategy</option>
                <option value="skill">Skill</option>
                <option value="execution">Execution</option>
                <option value="system">System</option>
            </select>
        </div>

        {{-- Action Step --}}
        <div>
            <label class="font-semibold">Action Step (What must the student DO?)</label>
            <textarea name="action_step" rows="2" class="w-full border p-3 rounded"></textarea>
        </div>

        {{-- Outcome --}}
        <div>
            <label class="font-semibold">Expected Outcome</label>
            <textarea name="outcome" rows="2" class="w-full border p-3 rounded"></textarea>
        </div>

        {{-- Tier + Order --}}
        <div class="flex gap-6">
            <div class="flex-1">
                <label class="font-semibold">Tier</label>
                <select name="tier" class="w-full border p-3 rounded">
                    <option value="free">Free</option>
                    <option value="pro">Pro</option>
                    <option value="premium">Premium</option>
                </select>
            </div>

            <div class="w-32">
                <label class="font-semibold">Order</label>
                <input type="number" name="order" value="0" class="w-full border p-3 rounded">
            </div>
        </div>

        {{-- Status --}}
        <div>
            <label class="font-semibold">Status</label>
            <select name="status" class="w-full border p-3 rounded">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>

        <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg">
            Save Lesson
        </button>
    </form>
</div>
@endsection
