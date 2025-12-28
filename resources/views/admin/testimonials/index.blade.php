@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Testimonials</h1>
        <a href="{{ route('admin.testimonials.create') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
            + Add New
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Approved</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Content</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($testimonials as $testimonial)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $testimonial->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $testimonial->location ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form action="{{ route('admin.testimonials.toggleApproval', $testimonial) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                        class="px-2 py-1 rounded-lg text-white font-semibold
                                        {{ $testimonial->approved ? 'bg-green-600 hover:bg-green-700' : 'bg-red-600 hover:bg-red-700' }}">
                                    {{ $testimonial->approved ? 'Yes' : 'No' }}
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ Str::limit($testimonial->content, 50) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end space-x-2">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>

                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No testimonials found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $testimonials->links() }}
    </div>
</div>
@endsection
