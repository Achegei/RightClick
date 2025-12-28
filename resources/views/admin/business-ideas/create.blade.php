@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-6">
    <h1 class="text-3xl font-bold mb-6">Add Business Idea</h1>

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

    <form action="{{ route('admin.business-ideas.store') }}" method="POST" class="bg-white shadow-xl rounded-2xl p-8 space-y-6">
        @csrf

        {{-- Title --}}
        <div>
            <label class="block font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm p-3">
        </div>

        {{-- Summary --}}
        <div>
            <label class="block font-medium text-gray-700">Summary</label>
            <textarea name="summary" rows="3" required
                      class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm p-3">{{ old('summary') }}</textarea>
        </div>

        {{-- Content --}}
        <div>
            <label class="block font-medium text-gray-700">Content</label>
            <textarea name="content" rows="6" required
                      class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm p-3">{{ old('content') }}</textarea>
        </div>

        {{-- Tier --}}
        <div>
            <label class="block font-medium text-gray-700">Tier</label>
            <select name="tier" required class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm p-3">
                @foreach(['free', 'pro', 'premium'] as $tier)
                    <option value="{{ $tier }}" {{ old('tier') === $tier ? 'selected' : '' }}>
                        {{ ucfirst($tier) }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Status --}}
        <div class="flex items-center space-x-6">
            <label class="inline-flex items-center">
                <input type="checkbox" name="published" value="1"
                       class="form-checkbox" {{ old('published', true) ? 'checked' : '' }}>
                <span class="ml-2">Published</span>
            </label>
        </div>

        {{-- Submit --}}
        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg shadow">
            Save Idea
        </button>
    </form>
</div>
@endsection
