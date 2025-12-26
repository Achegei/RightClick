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

    <div class="bg-white shadow rounded-lg">
        <table class="w-full text-left">
            <thead class="border-b">
                <tr class="text-gray-600">
                    <th class="p-4">Title</th>
                    <th>Premium</th>
                    <th>Status</th>
                    <th class="text-right p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ideas as $idea)
                <tr class="border-b">
                    <td class="p-4 font-medium">{{ $idea->title }}</td>
                    <td>{{ $idea->is_premium ? 'Yes' : 'No' }}</td>
                    <td>{{ $idea->published ? 'Published' : 'Draft' }}</td>
                    <td class="p-4 text-right space-x-2">
                        <a href="{{ route('admin.business-ideas.edit', $idea) }}"
                           class="text-indigo-600">Edit</a>

                        <form method="POST"
                              action="{{ route('admin.business-ideas.destroy', $idea) }}"
                              class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-600"
                                    onclick="return confirm('Delete this idea?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-4">
            {{ $ideas->links() }}
        </div>
    </div>
</div>
@endsection
