@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto py-8">

    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Business Ideas</h1>
        <a href="{{ route('admin.business-ideas.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg">
            + New Idea
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full text-left min-w-[600px]">
            <thead class="border-b bg-gray-50">
                <tr class="text-gray-600">
                    <th class="p-4">Title</th>
                    <th>Tier</th>
                    <th>Status</th>
                    <th class="text-right p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ideas as $idea)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4 font-medium">{{ $idea->title }}</td>
                    <td>{{ ucfirst($idea->tier ?? 'Free') }}</td>
                    <td>{{ $idea->published ? 'Published' : 'Draft' }}</td>
                    <td class="p-4 text-right space-x-2">
                        <a href="{{ route('admin.business-ideas.edit', $idea->id) }}"
                           class="text-indigo-600 hover:underline">Edit</a>

                        <form method="POST"
                              action="{{ route('admin.business-ideas.destroy', $idea->id) }}"
                              class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline"
                                    onclick="return confirm('Delete this idea?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">
                        No business ideas found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="p-4 flex justify-center">
            {{ $ideas->links() }}
        </div>
    </div>
</div>
@endsection
