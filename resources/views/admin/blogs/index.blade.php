@extends('layouts.admin')

@section('title', 'Blogs')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900">Blogs</h1>
            <p class="text-gray-500 mt-1">
                Manage content funnels and learning series.
            </p>
        </div>

        <a href="{{ route('admin.blogs.create') }}"
           class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white px-5 py-2 rounded-xl font-semibold hover:opacity-90 transition">
            + New Blog
        </a>
    </div>

    {{-- Blogs table --}}
    <div class="bg-white rounded-2xl shadow border border-gray-200 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 text-sm text-gray-600 uppercase">
                <tr>
                    <th class="p-4 text-left">Title</th>
                    <th class="p-4 text-left">Tier</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Published</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach($blogs as $blog)
                    <tr class="hover:bg-gray-50 transition">
                        {{-- Title + Featured badge --}}
                        <td class="p-4 font-medium text-gray-900">
                            {{ $blog->title }}
                            @if($blog->featured)
                                <span class="ml-2 text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded">
                                    Featured
                                </span>
                            @endif
                        </td>

                        {{-- Tier badge --}}
                        <td class="p-4">
                            <span class="text-xs font-semibold px-2 py-1 rounded
                                {{ $blog->tier === 'free' ? 'bg-green-100 text-green-700' : '' }}
                                {{ $blog->tier === 'pro' ? 'bg-blue-100 text-blue-700' : '' }}
                                {{ $blog->tier === 'premium' ? 'bg-purple-100 text-purple-700' : '' }}">
                                {{ ucfirst($blog->tier) }}
                            </span>
                        </td>

                        {{-- Status --}}
                        <td class="p-4">
                            @if($blog->published_at)
                                <span class="text-green-600 font-semibold">Published</span>
                            @else
                                <span class="text-gray-500">Draft</span>
                            @endif
                        </td>

                        {{-- Published date --}}
                        <td class="p-4 text-gray-600">
                            {{ $blog->published_at?->format('M d, Y') ?? '—' }}
                        </td>

                        {{-- Actions --}}
                        <td class="p-4 text-right">
                            <a href="{{ route('admin.blogs.edit', $blog) }}"
                               class="text-indigo-600 font-semibold hover:underline mr-4">
                                Edit
                            </a>

                            <form action="{{ route('admin.blogs.destroy', $blog) }}"
                                  method="POST"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    onclick="return confirm('Delete this blog?')"
                                    class="text-red-600 font-semibold hover:underline">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $blogs->links() }}
    </div>
</div>
@endsection
