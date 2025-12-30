@extends('layouts.admin')

@section('title', 'Create Blog')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="mb-6">
        <h1 class="text-3xl font-extrabold text-gray-900">Create Blog</h1>
        <p class="text-gray-500 mt-1">
            Enter all details, add a CTA, and optimize SEO for your blog.
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow border border-gray-200 p-6">
        <form method="POST" action="{{ route('admin.blogs.store') }}">
            @csrf

            {{-- Include the blog form partial --}}
            @include('admin.blogs.partials.form', ['blog' => null])

            <div class="flex justify-end mt-6">
                <button type="submit"
                        class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white px-6 py-2 rounded-xl font-semibold hover:opacity-90 transition">
                    Save Blog
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
