@extends('layouts.admin')

@section('title', 'Blogs')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Blogs</h1>
        <a href="{{ route('admin.blogs.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + New Blog
        </a>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Title</th>
                <th>Status</th>
                <th>Published</th>
                <th class="text-right p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr class="border-t">
                <td class="p-3">{{ $blog->title }}</td>
                <td>
                    @if($blog->published_at)
                        <span class="text-green-600 font-semibold">Published</span>
                    @else
                        <span class="text-gray-500">Draft</span>
                    @endif
                </td>
                <td>
                    {{ $blog->published_at?->format('M d, Y') ?? '—' }}
                </td>
                <td class="p-3 text-right">
                    <a href="{{ route('admin.blogs.edit', $blog) }}"
                       class="text-blue-600 mr-3">Edit</a>

                    <form action="{{ route('admin.blogs.destroy', $blog) }}"
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600"
                                onclick="return confirm('Delete this blog?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $blogs->links() }}
    </div>
</div>
@endsection
