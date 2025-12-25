@extends('layouts.admin')

@section('title', 'Courses')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900">Courses</h1>
        <a href="{{ route('admin.courses.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded transition">
            + Add Course
        </a>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($courses as $course)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration + ($courses->currentPage() - 1) * $courses->perPage() }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $course->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ Str::limit($course->description, 50) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                            <a href="{{ route('admin.courses.edit', $course->id) }}" 
                               class="text-blue-600 hover:text-blue-800">Edit</a>
                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this course?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">No courses found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $courses->links() }}
    </div>
</div>
@endsection
