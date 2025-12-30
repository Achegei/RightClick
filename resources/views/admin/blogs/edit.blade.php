@extends('layouts.admin')

@section('title', 'Edit Blog')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-3xl font-extrabold text-gray-900">Edit Blog</h1>
        <p class="text-gray-500 mt-1">
            Refine content, optimize CTA, and improve conversions.
        </p>
    </div>

    {{-- Form container --}}
    <div class="bg-white rounded-2xl shadow border border-gray-200 p-6">
        <form method="POST" action="{{ route('admin.blogs.update', $blog) }}">
            @csrf
            @method('PUT')

            {{-- Blog form partial --}}
            @include('admin.blogs.partials.form', ['blog' => $blog])

            {{-- Form actions --}}
            <div class="flex justify-end mt-6 gap-3">
                <a href="{{ route('admin.blogs.index') }}"
                   class="px-6 py-2 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-50 transition">
                    Cancel
                </a>

                <button type="submit"
                        class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white px-6 py-2 rounded-xl font-semibold hover:opacity-90 transition">
                    Update Blog
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
