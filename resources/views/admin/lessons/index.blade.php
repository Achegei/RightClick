@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Lessons</h1>
        <a href="{{ route('admin.lessons.create') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
            + Add Lesson
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Course</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tier</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($lessons as $lesson)
                    <tr>
                        <td class="px-6 py-4">{{ $lesson->title }}</td>

                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ optional($lesson->course)->title ?? '—' }}
                        </td>

                        <td class="px-6 py-4 capitalize font-medium">
                            {{ $lesson->tier }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $lesson->order }}
                        </td>

                        <td class="px-6 py-4 text-right flex justify-end space-x-3">
                            <a href="{{ route('admin.lessons.edit', $lesson->id) }}"
                               class="text-indigo-600 hover:text-indigo-900">
                                Edit
                            </a>

                            <form action="{{ route('admin.lessons.destroy', $lesson->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this lesson?');">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:text-red-900">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            No lessons found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $lessons->links() }}
    </div>
</div>
@endsection
