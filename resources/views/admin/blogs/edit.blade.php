@extends('layouts.admin')

@section('title', 'Edit Blog')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Blog</h1>

    <form method="POST" action="{{ route('admin.blogs.update', $blog) }}">
        @csrf
        @method('PUT')

        @include('admin.blogs.partials.form', ['blog' => $blog])

        <button class="bg-blue-600 text-white px-6 py-2 rounded mt-4">
            Update Blog
        </button>
    </form>
</div>
@endsection
