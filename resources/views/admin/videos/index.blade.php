@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Videos</h1>

<a href="{{ route('admin.videos.create') }}" class="mb-4 inline-block px-4 py-2 bg-green-600 text-white rounded">Add Video</a>

@if(session('success'))
    <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">
        {{ session('success') }}
    </div>
@endif

<table class="w-full border-collapse border">
    <thead>
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Title</th>
            <th class="border px-4 py-2">YouTube ID</th>
            <th class="border px-4 py-2">Created At</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($videos as $video)
        <tr>
            <td class="border px-4 py-2">{{ $video->id }}</td>
            <td class="border px-4 py-2">{{ $video->title }}</td>
            <td class="border px-4 py-2">{{ $video->youtube_id }}</td>
            <td class="border px-4 py-2">{{ $video->created_at->format('Y-m-d') }}</td>
            <td class="border px-4 py-2 space-x-2">
                <a href="{{ route('admin.videos.edit', $video) }}" class="px-2 py-1 bg-blue-600 text-white rounded">Edit</a>
                <form action="{{ route('admin.videos.destroy', $video) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $videos->links() }}
</div>
@endsection
