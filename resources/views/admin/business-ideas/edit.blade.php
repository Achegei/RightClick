@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Business Idea</h1>

    <form method="POST"
          action="{{ route('admin.business-ideas.update', $businessIdea) }}"
          class="bg-white p-6 rounded-xl shadow space-y-4">
        @csrf @method('PUT')

        <input name="title"
               value="{{ $businessIdea->title }}"
               class="w-full border p-3 rounded" required>

        <textarea name="summary" rows="3"
                  class="w-full border p-3 rounded">{{ $businessIdea->summary }}</textarea>

        <textarea name="content" rows="8"
                  class="w-full border p-3 rounded">{{ $businessIdea->content }}</textarea>

        <div class="flex gap-6">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="is_premium" value="1"
                       @checked($businessIdea->is_premium)>
                Premium
            </label>

            <label class="flex items-center gap-2">
                <input type="checkbox" name="published" value="1"
                       @checked($businessIdea->published)>
                Published
            </label>
        </div>

        <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg">
            Update
        </button>
    </form>
</div>
@endsection
